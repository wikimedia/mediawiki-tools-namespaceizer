<?php

namespace MediaWiki\Tool\Namespaceizer;

use PhpParser\Lexer;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor;
use PhpParser\Parser;
use PhpParser\PrettyPrinter;
use PhpParser\Comment;

class FileHeaderFixer {
	private $text;
	private $errorCallback;

	/**
	 * Fix PHP code and return the result
	 *
	 * @param string $text
	 * @param callable $errorCallback A function called to report errors. The
	 *   first parameter is the line number in $text, and the second parameter
	 *   is the message text.
	 * @return string
	 */
	public static function fix( $text, $errorCallback ) {
		$fixer = new self( $text, $errorCallback );
		try {
			return $fixer->execute();
		} catch ( Error $error ) {
			return false;
		}
	}

	private function __construct( $text, $errorCallback ) {
		$this->text = $text;
		$this->errorCallback = $errorCallback;
	}

	private function execute() {
		$lexer = new Lexer\Emulative( [
			'usedAttributes' => [
				'comments',
				'startLine', 'endLine',
				'startTokenPos', 'endTokenPos',
			],
		] );
		$parser = new Parser\Php7( $lexer );
		$oldAst = $parser->parse( $this->text );

		$traverser = new NodeTraverser;
		$traverser->addVisitor( new NodeVisitor\CloningVisitor );
		$newAst = $traverser->traverse( $oldAst );

		if ( count( $newAst ) < 1 ) {
			$this->fatal( 0, "empty file" );
		}

		$nonClass = $this->findNonClassCode( $newAst );
		if ( $nonClass ) {
			$this->fatal( $nonClass->getLine(), "non-class code found" );
		}

		$firstNode = $newAst[0];
		$comments = $firstNode->getAttribute( 'comments' );
		if ( !count( $comments ) ) {
			$this->error( $firstNode->getLine(), "First node has no comments" );
			return $this->text;
		}

		$commentText = $comments[0]->getText();
		$parts = $this->splitComment( $firstNode->getLine(), $commentText );

		if ( isset( $parts['start'] ) ) {
			$parts['start'] = $this->removeCreationDate( $parts['start'] );
		}

		$ingroup = false;
		if ( isset( $parts['end'] ) ) {
			$ingroup = $this->getAnnotation( $parts['end'], 'ingroup' );
			$parts['end'] = $this->removeAnnotation( $parts['end'], 'ingroup' );
		}
		if ( isset( $parts['license'] ) ) {
			$newLicenseComment = "/*\n" . $parts['license'] . " */\n";
		} else {
			$newLicenseComment = null;
		}

		if ( isset( $parts['license'] ) && ( isset( $parts['start'] ) || isset( $parts['end'] ) ) ) {
			$newFileComment = "/**\n";
			if ( isset( $parts['start'] ) ) {
				$newFileComment .= $parts['start'];
			}
			if ( isset( $parts['end'] ) ) {
				$newFileComment .= $parts['end'];
			}
			$newFileComment .= " */";

			$newComments = [];
			if ( !$this->isPracticallyEmpty( $newFileComment ) ) {
				$newComments[] = new Comment( $newFileComment );
			}
			$newComments[] = new Comment( $newLicenseComment );
			array_splice( $comments, 0, 1, $newComments );
		} elseif ( isset( $parts['license'] ) ) {
			$comments[0] = new Comment( $newLicenseComment );
		}

		$firstNode->setAttribute( 'comments', $comments );

		if ( $ingroup !== false ) {
			$this->forEachClass( $newAst, function ( $node ) use ( $ingroup ) {
				$this->addAnnotation( $node, 'ingroup', $ingroup );
			} );
		}

		$printer = new PrettyPrinter\Standard();
		return $printer->printFormatPreserving( $newAst, $oldAst, $lexer->getTokens() );
	}

	/**
	 * Split a string into an array of lines, assuming that the final line is
	 * terminated by an LF character
	 */
	private function explodeLines( $text ) {
		$lines = explode( "\n", $text );
		if ( end( $lines ) === '' ) {
			array_pop( $lines );
		}
		return $lines;
	}

	/**
	 * Reassemble a string from an array of lines, adding a trailing line break
	 */
	private function implodeLines( $lines ) {
		return $lines ? implode( "\n", $lines ) . "\n" : '';
	}

	/**
	 * Split a file comment into three parts:
	 *
	 *  - Before the license ("start")
	 *  - The license itself ("license")
	 *  - After the license ("end")
	 *
	 * @param integer $startLine The line number at which the comment starts
	 * @param string $text
	 * @return string[]
	 */
	private function splitComment( $startLine, $text ) {
		$lines = $this->explodeLines( $text );
		$n = count( $lines );
		if ( $lines[0] !== '/**' ) {
			$this->fatal( $startLine, "File starts with non-doc comment" );
		}
		if ( $lines[$n - 1] !== ' */' ) {
			$this->fatal( $startLine + $n - 1, "Unexpected comment end" );
		}

		$licenseStart = $licenseEnd = null;
		for ( $i = 1; $i < $n - 1; $i++ ) {
			if ( strpos( $lines[$i], 'This program is free software' ) !== false ) {
				// Include copyright notices immediately before the license in the license section
				if ( $i >= 3 && $lines[$i - 1] === ' *'
					&& $this->isCopyright( $lines[$i - 2] )
				) {
					$i -= 2;
				}
				while ( $i >= 2 && $this->isCopyright( $lines[$i - 1] ) ) {
					$i--;
				}
				$licenseStart = $i;
				break;
			}
		}
		if ( $licenseStart !== null ) {
			for ( ; $i < $n - 1; $i++ ) {
				if ( strpos( $lines[$i], '51 Franklin Street' ) !== false ) {
					if ( strpos( $lines[$i + 1], 'www.gnu.org' ) !== false ) {
						$i++;
					}
					$licenseEnd = $i;
					if ( $lines[$i + 1] === ' *' ) {
						$i++;
					}
					$footerStart = $i + 1;
					break;
				}
			}
		}

		$parts = [];
		if ( $licenseStart === null ) {
			$parts['start'] = $this->implodeLines(
				array_slice( $lines, 1, $n - 2 ) );
		} else {
			if ( $licenseStart > 1 ) {
				$parts['start'] = $this->implodeLines(
					array_slice( $lines, 1, $licenseStart - 1 ) );
			}
			if ( $licenseEnd === null ) {
				$parts['license'] = $this->implodeLines(
					array_slice( $lines, $licenseStart, $n - $licenseStart - 1 ) );
			} else {
				$parts['license'] = $this->implodeLines(
					array_slice( $lines, $licenseStart, $licenseEnd - $licenseStart + 1 ) );
				$parts['end'] = $this->implodeLines(
					array_slice( $lines, $footerStart, $n - $footerStart - 1 ) );
			}
		}

		return $parts;
	}

	/**
	 * Return true if a given comment line is a copyright notice which should
	 * be included in the license header.
	 *
	 * @param string $line
	 * @return bool
	 */
	private function isCopyright( $line ) {
		return !!preg_match( '!' .
			'copyright|' . // Regular
			'https://www.mediawiki.org/\s*$|' . // Brionic
			'You may copy this code freely' . // Dairikite
			'!i', $line );
	}

	/**
	 * Get doxygen command parameters from a comment line
	 *
	 * @param string $text The comment line
	 * @param string $name The annotation name
	 * @return string
	 */
	private function getAnnotation( $text, $name ) {
		foreach ( explode( "\n", $text ) as $line ) {
			if ( preg_match( "/@" . preg_quote( $name, '/' ) . '\s+(.*)$/', $line, $m ) ) {
				return $m[1];
			}
		}
		return false;
	}

	/**
	 * Remove a named annotation from the comment text, if there is such an
	 * annotation. If there is no such annotation, the input is passed through
	 * unmodified.
	 *
	 * @param string $text
	 * @param string $name
	 * @return string
	 */
	private function removeAnnotation( $text, $name ) {
		$lines = $this->explodeLines( $text );
		$removeStart = null;
		$removeLength = 1;
		foreach ( $lines as $i => $line ) {
			$pos = strpos( $line, "@$name" );
			if ( $pos !== false ) {
				$removeStart = $i;
				if ( $i > 0 && $i < count( $lines ) - 2
					&& $line[$i - 1] === ' *'
					&& $line[$i + 1] === ' *'
				) {
					$removeLength = 2;
				}
				break;
			}
		}

		if ( $removeStart !== null ) {
			array_splice( $lines, $removeStart, $removeLength );
		}
		return $this->implodeLines( $lines );
	}

	/**
	 * Add an annotation to a PHP-Parser node. If it already has an attached
	 * comment, the annotation will be added to the end of it. If not, a new
	 * comment is created.
	 *
	 * @param \PhpParser\Node $node
	 * @param string $name
	 * @param string $value The doxygen command parameters
	 */
	private function addAnnotation( $node, $name, $value ) {
		$comments = $node->getComments();
		if ( $comments ) {
			$lastIndex = count( $comments ) - 1;
			$lastComment = (string)$comments[$lastIndex];

			if ( strpos( $lastComment, "@$name $value" ) !== false ) {
				// Don't add duplicate
				return;
			}

			if ( strpos( $lastComment, '@file' ) !== false
				|| strpos( $lastComment, 'This program is free software' ) !== false
			) {
				$comments[] = new Comment( "/**\n * @$name $value\n */" );
			} else {
				$lastComment = str_replace( "\n */", "\n * @$name $value\n */", $lastComment );
				array_splice( $comments, $lastIndex, 1, [
					new Comment( $lastComment )
				] );
			}
		} else {
			$comments = [
				new Comment( "/**\n * @$name $value\n */" )
			];
		}
		$node->setAttribute( 'comments', $comments );
	}

	/**
	 * Determine if a full comment string has nothing useful in it
	 */
	private function isPracticallyEmpty( $text ) {
		foreach ( $this->explodeLines( $text ) as $line ) {
			if ( $line !== ''
				&& $line !== ' *'
				&& $line !== ' * @file'
				&& $line !== '/**'
				&& $line !== ' */'
			) {
				return false;
			}
		}
		return true;
	}

	/**
	 * Remove a notice giving the creation date of the file, and surrounding
	 * blank lines, from the given comment text.
	 *
	 * @param string $text
	 * @return string
	 */
	private function removeCreationDate( $text ) {
		$lines = $this->explodeLines( $text );
		$n = count( $lines );
		foreach ( $lines as $i => $line ) {
			if ( preg_match( '/^ \* Created on .*20\d\d$/', $line ) ) {
				// Comments of this kind usually have an excess of empty lines
				// preceding them. Remove those lines.
				$startBlock = $i;
				while ( $startBlock > 0 && $lines[$startBlock - 1] === ' *' ) {
					$startBlock--;
				}

				array_splice( $lines, $startBlock, $i - $startBlock + 1, [] );
				return $this->implodeLines( $lines );
			}
		}
		return $text;
	}

	/**
	 * Call the error callback
	 *
	 * @param integer $line
	 * @param string $msg
	 */
	private function error( $line, $msg ) {
		if ( $this->errorCallback ) {
			call_user_func( $this->errorCallback, $line, $msg );
		}
	}

	/**
	 * Call the error callback, and throw an exception such that fix()
	 * immediately returns false.
	 *
	 * @param integer $line
	 * @param string $msg
	 */
	private function fatal( $line, $msg ) {
		$this->error( $line, $msg );
		throw new Error( $msg );
	}

	/**
	 * Search the PHP-Parser AST for file-level executable code. Return the
	 * node of the first such code, or false if there was none.
	 *
	 * @param \PhpParser\Node[] $ast
	 * @return \PhpParser\Node|false
	 */
	private function findNonClassCode( $ast ) {
		foreach ( $ast as $node ) {
			$type = $node->getType();
			if ( in_array( $type, [
				'Stmt_Class',
				'Stmt_Interface',
				'Stmt_Trait',
				'Stmt_Namespace',
				'Stmt_Use'] )
			) {
				continue;
			}
			if ( $type === 'Stmt_Expression' ) {
				if ( $node->expr->getType() === 'Expr_FuncCall'
					&& !empty( $node->args )
					&& $node->args[0]->getType() === 'Scalar_String'
					&& $node->args[0]->value === 'class_alias'
				) {
					continue;
				}
			}
			return $node;
		}
		return false;
	}

	/**
	 * Call a callback for each class-like top-level node in the AST
	 *
	 * @param \PhpParser\Node[] $nodeList
	 * @param callable $callback
	 */
	private function forEachClass( $nodeList, $callback ) {
		foreach ( $nodeList as $node ) {
			if ( in_array( $node->getType(), [
				'Stmt_Class',
				'Stmt_Interface',
				'Stmt_Trait' ] )
			) {
				$callback( $node );
			}
		}
	}
}

<?php

namespace MediaWiki\Tool\Namespaceizer;

class ReservedWords {
	private static $words = [
		'__halt_compiler',
		'abstract',
		'and',
		'array',
		'as',
		'bool',
		'break',
		'callable',
		'case',
		'catch',
		'class',
		'clone',
		'const',
		'continue',
		'declare',
		'default',
		'die',
		'do',
		'echo',
		'else',
		'elseif',
		'empty',
		'enddeclare',
		'endfor',
		'endforeach',
		'endif',
		'endswitch',
		'endwhile',
		'eval',
		'exit',
		'extends',
		'false',
		'final',
		'finally',
		'float',
		'for',
		'foreach',
		'function',
		'global',
		'goto',
		'if',
		'implements',
		'include',
		'include_once',
		'instanceof',
		'insteadof',
		'int',
		'interface',
		'isset',
		'iterable',
		'list',
		'mixed',
		'namespace',
		'new',
		'null',
		'numeric',
		'object',
		'or',
		'print',
		'private',
		'protected',
		'public',
		'require',
		'require_once',
		'resource',
		'return',
		'static',
		'string',
		'switch',
		'throw',
		'trait',
		'true',
		'try',
		'unset',
		'use',
		'var',
		'void',
		'while',
		'xor',
		'yield',
	];

	public function isReserved( $word ) {
		return in_array( strtolower( $word ), self::$words );
	}
}

<?php

use MediaWiki\Tool\Namespaceizer\FileHeaderFixer;

if ( PHP_SAPI !== 'cli' ) {
	exit( 1 );
}

require __DIR__ .'/../vendor/autoload.php';

function fixFileHeader( $argv ) {
	if ( count( $argv ) < 2 ) {
		echo "Usage: {$argv[0]} <file> ...\n";
		exit( 1 );
	}
	$files = array_slice( $argv, 1 );

	foreach ( $files as $fileName ) {
		$input = file_get_contents( $fileName );
		$result = FileHeaderFixer::fix( $input, function ( $line, $msg ) use ( $fileName ) {
			echo "$fileName:$line: $msg\n";
		} );
		if ( $result !== false && $input !== $result ) {
			file_put_contents( $fileName, $result );
		}
	}
}

fixFileHeader( $argv );

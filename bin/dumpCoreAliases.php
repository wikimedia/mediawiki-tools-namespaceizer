<?php

use MediaWiki\Tool\Namespaceizer\AutoloadLoader;
use MediaWiki\Tool\Namespaceizer\CoreAliases;

if ( PHP_SAPI !== 'cli' ) {
	exit( 1 );
}

require __DIR__ . '/../vendor/autoload.php';

$self = array_shift( $argv );

if ( !count( $argv ) ) {
	echo "Usage: $self <autoload file>\n";
	exit( 1 );
}

if ( $argv[0] === '--counts' ) {
	$report = 'counts';
	array_shift( $argv );
} elseif ( $argv[0] === '--3col' ) {
	$report = '3col';
	array_shift( $argv );
} elseif ( $argv[0] === '--classes' ) {
	$report = 'classes';
	array_shift( $argv );
} else {
	$report = 'php';
}

if ( !count( $argv ) ) {
	echo "Usage: $self <autoload file>\n";
	exit( 1 );
}

$file = $argv[0];

$autoload = AutoloadLoader::getAutoloadClasses( $file );
if ( $autoload === false ) {
	echo "Unable to open autoload file $file\n";
	exit( 1 );
}

$ca = new CoreAliases( $autoload );
$aliases = $ca->getAliases();

asort( $aliases );

$counts = [];
if ( $report === 'php' ) {
	print "<?php\n\nreturn [\n";
}
foreach ( $aliases as $old => $new ) {
	if ( $report === 'classes' ) {
		print "$old\t$new\n";
	} elseif ( $report === 'php' ) {
		print "\t'" .
			strtr( $old, [ "\\" => "\\\\", "'" => "\\'" ] ) .
			"' => '" .
			strtr( $new, [ "\\" => "\\\\", "'" => "\\'" ] ) .
			"',\n";
	} else {
		if ( preg_match( '/(.*)\\\\([^\\\\]*)$/', $new, $m ) ) {
			if ( $report === 'counts' ) {
				if ( !isset( $counts[$m[1]] ) ) {
					$counts[$m[1]] = 0;
				}
				$counts[$m[1]]++;
			} elseif ( $report === '3col' ) {
				print "$old\t{$m[1]}\t{$m[2]}\n";
			}
		}
	}
}
if ( $report === 'php' ) {
	print "];\n";
}

if ( $report === 'counts' ) {
	foreach ( $counts as $ns => $count ) {
		print "$ns\t$count\n";
	}
}

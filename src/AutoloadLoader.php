<?php

namespace MediaWiki\Tool\Namespaceizer;

class AutoloadLoader {
	public static function getAutoloadClasses( $file ) {
		$autoload = file_get_contents( $file );
		if ( $autoload === false ) {
			return false;
		}
		$autoload = str_replace( "__DIR__ . '/", "'", $autoload );
		$autoload = str_replace( '<?php', '', $autoload );
		eval( $autoload );
		return $wgAutoloadLocalClasses;
	}
}

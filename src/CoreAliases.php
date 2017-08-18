<?php

namespace MediaWiki\Tool\Namespaceizer;

class CoreAliases {
	static $namespacesByDir = [
		'includes' => 'MediaWiki',
		'includes/actions' => 'MediaWiki\Action',
		'includes/api' => null,
		'includes/auth' => 'MediaWiki\Auth',
		'includes/cache' => 'MediaWiki', // to parent
		'includes/cache/localisation' => 'MediaWiki\Language\LocalisationCache',
		'includes/changes' => 'MediaWiki\Changes',
		'includes/changetags' => 'MediaWiki\ChangeTags',
		'includes/clientpool' => 'MediaWiki', // to parent
		'includes/collation' => 'MediaWiki\Collation',
		'includes/compat' => 'MediaWiki', // to parent
		'includes/compat/normal' => 'MediaWiki', // to parent
		'includes/composer' => null,
		'includes/config' => 'MediaWiki\Config',
		'includes/content' => 'MediaWiki\Content',
		'includes/context' => 'MediaWiki\Context',
		'includes/dao' => 'MediaWiki\Dao',
		'includes/db' => 'MediaWiki\Db',
		'includes/debug' => 'MediaWiki', // to parent
		'includes/debug/logger' => 'MediaWiki\Logger', // to parent
		'includes/debug/logger/monolog' => 'MediaWiki\Logger\Monolog', // to parent
		'includes/deferred' => 'MediaWiki\Deferred',
		'includes/diff' => 'MediaWiki\Diff',
		'includes/edit' => 'MediaWiki\Edit', // single class
		'includes/editpage' => 'MediaWiki\EditPage',
		'includes/exception' => 'MediaWiki\Exception',
		'includes/export' => 'MediaWiki\Export',
		'includes/externalstore' => 'MediaWiki\ExternalStore',
		'includes/filebackend' => 'MediaWiki\FileBackend',
		'includes/filebackend/filejournal' => 'MediaWiki\FileBackend\FileJournal',
		'includes/filebackend/lockmanager' => 'MediaWiki\FileBackend\LockManager',
		'includes/filerepo' => 'MediaWiki\FileRepo',
		'includes/filerepo/file' => 'MediaWiki\FileRepo\File',
		'includes/gallery' => 'MediaWiki\Gallery',
		'includes/htmlform' => 'MediaWiki\HTMLForm',
		'includes/htmlform/fields' => 'MediaWiki\HTMLForm\Fields',
		'includes/http' => 'MediaWiki\Http',
		'includes/import' => 'MediaWiki\Import',
		'includes/installer' => 'MediaWiki\Installer',
		'includes/interwiki' => 'MediaWiki\Interwiki',
		'includes/jobqueue' => 'MediaWiki\JobQueue',
		'includes/jobqueue/aggregator' => 'MediaWiki\JobQueue\Aggregator',
		'includes/jobqueue/jobs' => 'MediaWiki\JobQueue\Job',
		'includes/jobqueue/utils' => 'MediaWiki\JobQueue\Utils',
		'includes/json' => 'MediaWiki', // to parent
		'includes/libs' => null,
		'includes/libs/composer' => 'Wikimedia\Composer',
		'includes/libs/eventrelayer' => 'Wikimedia\EventRelayer',
		'includes/libs/filebackend' => 'Wikimedia\FileBackend',
		'includes/libs/filebackend/filejournal' => 'Wikimedia\FileBackend\FileJournal',
		'includes/libs/filebackend/fileop' => 'Wikimedia\FileBackend\FileOp',
		'includes/libs/filebackend/fsfile' => 'Wikimedia\FileBackend\FSFile',
		'includes/libs/http' => 'Wikimedia\Http',
		'includes/libs/iterators' => 'Wikimedia\Iterators',
		'includes/libs/lockmanager' => 'Wikimedia\LockManager',
		'includes/libs/mime' => 'Wikimedia\Mime',
		'includes/libs/objectcache' => 'Wikimedia\ObjectCache',
		'includes/libs/rdbms' => 'Wikimedia\Rdbms',
		'includes/libs/rdbms/connectionmanager' => 'Wikimedia\Rdbms\ConnectionManager',
		'includes/libs/rdbms/database' => 'Wikimedia\Rdbms\Database',
		'includes/libs/rdbms/database/position' => 'Wikimedia\Rdbms\Database\Position',
		'includes/libs/rdbms/database/resultwrapper' => 'Wikimedia\Rdbms\Database\ResultWrapper',
		'includes/libs/rdbms/database/utils' => 'Wikimedia\Rdbms\Database\Utils',
		'includes/libs/rdbms/encasing' => 'Wikimedia\Rdbms\Encasing',
		'includes/libs/rdbms/exception' => 'Wikimedia\Rdbms\Exception',
		'includes/libs/rdbms/field' => 'Wikimedia\Rdbms\Field',
		'includes/libs/rdbms/lbfactory' => 'Wikimedia\Rdbms\LBFactory',
		'includes/libs/rdbms/loadbalancer' => 'Wikimedia\Rdbms\LoadBalancer',
		'includes/libs/rdbms/loadmonitor' => 'Wikimedia\Rdbms\LoadMonitor',
		'includes/libs/redis' => 'Wikimedia\Redis',
		'includes/libs/replacers' => 'Wikimedia\StringUtils', // reorg
		'includes/libs/stats' => 'Wikimedia\Stats',
		'includes/libs/virtualrest' => 'Wikimedia\VirtualREST',
		'includes/libs/xmp' => 'Wikimedia\XMP',
		'includes/linkeddata' => null,
		'includes/linker' => 'MediaWiki\Linker',
		'includes/logging' => 'MediaWiki\Logging',
		'includes/mail' => 'MediaWiki\Mail',
		'includes/media' => 'MediaWiki\Media',
		'includes/objectcache' => 'MediaWiki\ObjectCache',
		'includes/page' => 'MediaWiki\Page',
		'includes/pager' => 'MediaWiki\Pager',
		'includes/parser' => 'MediaWiki\Parser',
		'includes/password' => 'MediaWiki\Password',
		'includes/poolcounter' => 'MediaWiki\PoolCounter',
		'includes/profiler' => 'MediaWiki\Profiler',
		'includes/profiler/output' => 'MediaWiki\Profiler', // to parent
		'includes/rcfeed' => 'MediaWiki\RCFeed',
		'includes/registration' => 'MediaWiki\Registration',
		'includes/resourceloader' => 'MediaWiki\ResourceLoader',
		'includes/revisiondelete' => 'MediaWiki\RevisionDelete',
		'includes/search' => 'MediaWiki\Search',
		'includes/services' => 'MediaWiki\Services',
		'includes/session' => 'MediaWiki\Session',
		'includes/shell' => 'MediaWiki\Shell',
		'includes/site' => 'MediaWiki\Site',
		'includes/skins' => 'MediaWiki\Skin', // deplural
		'includes/specialpage' => 'MediaWiki\Special', // reorg
		'includes/specials' => 'MediaWiki\Special', // deplural
		'includes/specials/helpers' => 'MediaWiki\Special', // reorg
		'includes/specials/pagers' => 'MediaWiki\Special\Pager', // deplural
		'includes/specials/forms' => 'MediaWiki\Special\Form', // deplural
		'includes/specials/formfields' => 'MediaWiki\Special\FormField', // deplural
		'includes/tidy' => 'MediaWiki\Tidy',
		'includes/title' => 'MediaWiki\Title',
		'includes/upload' => 'MediaWiki\Upload',
		'includes/user' => 'MediaWiki\User',
		'includes/utils' => 'MediaWiki\Utils',
		'includes/watcheditem' => 'MediaWiki\WatchedItem',
		'includes/widget' => 'MediaWiki\Widget',
		'includes/widget/search' => 'MediaWiki\Widget\Search',
		'languages' => 'MediaWiki\Language',
		'languages/data' => 'MediaWiki\Language\Data',
	];

	static $deprefixesByDir = [
		'includes/api' => [ 'MediaWiki\Api', 'Api' ],
		'includes/specials' => [ 'MediaWiki\Special\Page', 'Special' ],
		'includes/composer' => [ 'MediaWiki\Composer', 'Composer' ],
		'languages/classes' => [ 'MediaWiki\Language\ByCode', 'Language' ],
	];

	static $namespacesByClass = [
		// Some extra classes for the Parser namespace
		'Sanitizer' => 'MediaWiki\Parser',
		'MagicWord' => 'MediaWiki\Parser',
		'MagicWordArray' => 'MediaWiki\Parser',

		// New Languages namespace
		'MessageCache' => 'MediaWiki\Language',
		'Message' => 'MediaWiki\Language',
		'RawMessage' => 'MediaWiki\Language',

		// New WebApp namespace
		'PathRouter' => 'MediaWiki\WebApp',
		'AjaxDispatcher' => 'MediaWiki\WebApp',
		'AjaxResponse' => 'MediaWiki\WebApp',
		'WebRequest' => 'MediaWiki\WebApp',
		'WebRequestUpload' => 'MediaWiki\WebApp',
		'FauxRequest' => 'MediaWiki\WebApp',
		'DerivativeRequest' => 'MediaWiki\WebApp',
		'WebResponse' => 'MediaWiki\WebApp',
		'OutputPage' => 'MediaWiki\WebApp',
		'HeaderCallback' => 'MediaWiki\WebApp',

		// New ArticleStore namespace
		'Revision' => 'MediaWiki\ArticleStore',
		'RevisionList' => 'MediaWiki\ArticleStore',
		'MergeHistory' => 'MediaWiki\ArticleStore',
		'MovePage' => 'MediaWiki\ArticleStore',
		'HistoryBlob' => 'MediaWiki\ArticleStore',
		'LinkBatch' => 'MediaWiki\ArticleStore',
		'LinkCache' => 'MediaWiki\ArticleStore',

		// HistoryBlob, was a file with many classes
		'HistoryBlob' => 'MediaWiki\ArticleStore\HistoryBlob',
		'HistoryBlobCurStub' => 'MediaWiki\ArticleStore\HistoryBlob',
		'HistoryBlobStub' => 'MediaWiki\ArticleStore\HistoryBlob',
		'ConcatenatedGzipHistoryBlob' => 'MediaWiki\ArticleStore\HistoryBlob',
		'DiffHistoryBlob' => 'MediaWiki\ArticleStore\HistoryBlob',

		// Feed, was mostly in Feed.php
		'AtomFeed' => 'MediaWiki\Feed',
		'ChannelFeed' => 'MediaWiki\Feed',
		'FeedItem' => 'MediaWiki\Feed',
		'RSSFeed' => 'MediaWiki\Feed',
		'ChangesFeed' => 'MediaWiki\Feed', // moved from changes
		'FeedUtils' => 'MediaWiki\Feed',

		// libs reorg
		'Cookie' => 'Wikimedia\Http',
		'CookieJar' => 'Wikimedia\Http',
		'ExplodeIterator' => 'Wikimedia\StringUtils',
		'GenericArrayObject' => 'Wikimedia\ArrayUtils',
		'HttpStatus' => 'Wikimedia\Http',
		'JSCompilerContext' => 'Wikimedia\JSMinPlus',
		'JSMinPlus' => 'Wikimedia\JSMinPlus',
		'JSNode' => 'Wikimedia\JSMinPlus',
		'JSParser' => 'Wikimedia\JSMinPlus',
		'JSToken' => 'Wikimedia\JSMinPlus',
		'JSTokenizer' => 'Wikimedia\JSMinPlus',
		'MappedIterator' => 'Wikimedia\Iterators',
		'ReverseArrayIterator' => 'Wikimedia\Iterators',
		'MultiHttpClient' => 'Wikimedia\Http',
		'MapCacheLRU' => 'Wikimedia\LRU',
		'ProcessCacheLRU' => 'Wikimedia\LRU',
		'ReplacementArray' => 'Wikimedia\StringUtils',
		'Xhprof' => 'Wikimedia\Xhprof',
		'XhprofData' => 'Wikimedia\Xhprof',

		// libs trivial breakup
		'ArrayUtils' => 'Wikimedia\ArrayUtils',
		'CryptHKDF' => 'Wikimedia\CryptHKDF',
		'CryptRand' => 'Wikimedia\CryptRand',
		'CSSMin' => 'Wikimedia\CSSMin',
		'DeferredStringifier' => 'Wikimedia\DeferredStringifier',
		'DnsSrvDiscoverer' => 'Wikimedia\DnsSrvDiscoverer',
		'HashRing' => 'Wikimedia\HashRing',
		'HtmlArmor' => 'Wikimedia\HtmlArmor',
		'IEUrlExtension' => 'Wikimedia\IEUrlExtension',
		'IP' => 'Wikimedia\IP',
		'JavaScriptMinifier' => 'Wikimedia\JavaScriptMinifier',
		'MemoizedCallable' => 'Wikimedia\MemoizedCallable',
		'MessageSpecifier' => 'Wikimedia\MessageSpecifier',
		'ObjectFactory' => 'Wikimedia\ObjectFactory',
		'RiffExtractor' => 'Wikimedia\RiffExtractor',
		'StatusValue' => 'Wikimedia\StatusValue',
		'StringUtils' => 'Wikimedia\StringUtils',
		'Timing' => 'Wikimedia\Timing',
		'UDPTransport' => 'Wikimedia\UDPTransport',
		
		// Special page helpers formerly in specials/ and linkeddata/
		'EditWatchlistNormalHTMLForm' => 'MediaWiki\Special',
		'EditWatchlistCheckboxSeriesField' => 'MediaWiki\Special',
		'ImportReporter' => 'MediaWiki\Special',
		'MovePageForm' => 'MediaWiki\Special',
		'UploadForm' => 'MediaWiki\Special',
		'UploadSourceField' => 'MediaWiki\Special',
		'PageDataRequestHandler' => 'MediaWiki\Special',

		// Language converter reorg
		'ConverterRule' => 'MediaWiki\Language\Converter',
		'LanguageConverter' => 'MediaWiki\Language\Converter',
		'FakeConverter' => 'MediaWiki\Language\Converter',
		'EnConverter' => 'MediaWiki\Language\Converter',
		'GanConverter' => 'MediaWiki\Language\Converter',
		'IuConverter' => 'MediaWiki\Language\Converter',
		'KkConverter' => 'MediaWiki\Language\Converter',
		'KuConverter' => 'MediaWiki\Language\Converter',
		'ShiConverter' => 'MediaWiki\Language\Converter',
		'SrConverter' => 'MediaWiki\Language\Converter',
		'TgConverter' => 'MediaWiki\Language\Converter',
		'UzConverter' => 'MediaWiki\Language\Converter',
		'ZhConverter' => 'MediaWiki\Language\Converter',
	];

	static $renamedClasses = [
		// Rename the MediaWiki class after the entry point it serves
		'MediaWiki' => 'MediaWiki\WebApp\Index',

		// API query
		'ApiQueryAllCategories' => 'MediaWiki\Api\Query\AllCategories',
		'ApiQueryAllDeletedRevisions' => 'MediaWiki\Api\Query\AllDeletedRevisions',
		'ApiQueryAllImages' => 'MediaWiki\Api\Query\AllImages',
		'ApiQueryAllLinks' => 'MediaWiki\Api\Query\AllLinks',
		'ApiQueryAllMessages' => 'MediaWiki\Api\Query\AllMessages',
		'ApiQueryAllPages' => 'MediaWiki\Api\Query\AllPages',
		'ApiQueryAllRevisions' => 'MediaWiki\Api\Query\AllRevisions',
		'ApiQueryAllUsers' => 'MediaWiki\Api\Query\AllUsers',
		'ApiQueryAuthManagerInfo' => 'MediaWiki\Api\Query\AuthManagerInfo',
		'ApiQueryBacklinks' => 'MediaWiki\Api\Query\Backlinks',
		'ApiQueryBacklinksprop' => 'MediaWiki\Api\Query\BacklinksProp',
		'ApiQueryBlocks' => 'MediaWiki\Api\Query\Blocks',
		'ApiQueryCategories' => 'MediaWiki\Api\Query\Categories',
		'ApiQueryCategoryInfo' => 'MediaWiki\Api\Query\CategoryInfo',
		'ApiQueryCategoryMembers' => 'MediaWiki\Api\Query\CategoryMembers',
		'ApiQueryContributions' => 'MediaWiki\Api\Query\UserContribs', // renamed to match action
		'ApiQueryContributors' => 'MediaWiki\Api\Query\Contributors',
		'ApiQueryDeletedRevisions' => 'MediaWiki\Api\Query\DeletedRevisions',
		'ApiQueryDeletedrevs' => 'MediaWiki\Api\Query\DeletedRevs',
		'ApiQueryDisabled' => 'MediaWiki\Api\Query\Disabled',
		'ApiQueryDuplicateFiles' => 'MediaWiki\Api\Query\DuplicateFiles',
		'ApiQueryExtLinksUsage' => 'MediaWiki\Api\Query\ExtLinksUsage',
		'ApiQueryExternalLinks' => 'MediaWiki\Api\Query\ExternalLinks',
		'ApiQueryFileRepoInfo' => 'MediaWiki\Api\Query\FileRepoInfo',
		'ApiQueryFilearchive' => 'MediaWiki\Api\Query\FileArchive',
		'ApiQueryIWBacklinks' => 'MediaWiki\Api\Query\IWBacklinks',
		'ApiQueryIWLinks' => 'MediaWiki\Api\Query\IWLinks',
		'ApiQueryImageInfo' => 'MediaWiki\Api\Query\ImageInfo',
		'ApiQueryImages' => 'MediaWiki\Api\Query\Images',
		'ApiQueryInfo' => 'MediaWiki\Api\Query\Info',
		'ApiQueryLangBacklinks' => 'MediaWiki\Api\Query\LangBacklinks',
		'ApiQueryLangLinks' => 'MediaWiki\Api\Query\LangLinks',
		'ApiQueryLinks' => 'MediaWiki\Api\Query\Links',
		'ApiQueryLogEvents' => 'MediaWiki\Api\Query\LogEvents',
		'ApiQueryMyStashedFiles' => 'MediaWiki\Api\Query\MyStashedFiles',
		'ApiQueryPagePropNames' => 'MediaWiki\Api\Query\PagePropNames',
		'ApiQueryPageProps' => 'MediaWiki\Api\Query\PageProps',
		'ApiQueryPagesWithProp' => 'MediaWiki\Api\Query\PagesWithProp',
		'ApiQueryPrefixSearch' => 'MediaWiki\Api\Query\PrefixSearch',
		'ApiQueryProtectedTitles' => 'MediaWiki\Api\Query\ProtectedTitles',
		'ApiQueryQueryPage' => 'MediaWiki\Api\Query\QueryPage',
		'ApiQueryRandom' => 'MediaWiki\Api\Query\Random',
		'ApiQueryRecentChanges' => 'MediaWiki\Api\Query\RecentChanges',
		'ApiQueryRevisions' => 'MediaWiki\Api\Query\Revisions',
		'ApiQuerySearch' => 'MediaWiki\Api\Query\Search',
		'ApiQuerySiteinfo' => 'MediaWiki\Api\Query\SiteInfo',
		'ApiQueryStashImageInfo' => 'MediaWiki\Api\Query\StashImageInfo',
		'ApiQueryTags' => 'MediaWiki\Api\Query\Tags',
		'ApiQueryTokens' => 'MediaWiki\Api\Query\Tokens',
		'ApiQueryUserInfo' => 'MediaWiki\Api\Query\UserInfo',
		'ApiQueryUsers' => 'MediaWiki\Api\Query\Users',
		'ApiQueryWatchlist' => 'MediaWiki\Api\Query\Watchlist',
		'ApiQueryWatchlistRaw' => 'MediaWiki\Api\Query\WatchlistRaw',

		// API actions
		'ApiAMCreateAccount' => 'MediaWiki\Api\Action\CreateAccount', // remove legacy "AM" prefix
		'ApiBlock' => 'MediaWiki\Api\Action\Block',
		'ApiChangeAuthenticationData' => 'MediaWiki\Api\Action\ChangeAuthenticationData',
		'ApiCheckToken' => 'MediaWiki\Api\Action\CheckToken',
		'ApiClearHasMsg' => 'MediaWiki\Api\Action\ClearHasMsg',
		'ApiClientLogin' => 'MediaWiki\Api\Action\ClientLogin',
		'ApiComparePages' => 'MediaWiki\Api\Action\ComparePages',
		'ApiCSPReport' => 'MediaWiki\Api\Action\CSPReport',
		'ApiDelete' => 'MediaWiki\Api\Action\Delete',
		'ApiDisabled' => 'MediaWiki\Api\Action\Disabled',
		'ApiEditPage' => 'MediaWiki\Api\Action\Edit', // rename to match action name
		'ApiEmailUser' => 'MediaWiki\Api\Action\EmailUser',
		'ApiExpandTemplates' => 'MediaWiki\Api\Action\ExpandTemplates',
		'ApiFeedContributions' => 'MediaWiki\Api\Action\FeedContributions',
		'ApiFeedRecentChanges' => 'MediaWiki\Api\Action\FeedRecentChanges',
		'ApiFeedWatchlist' => 'MediaWiki\Api\Action\FeedWatchlist',
		'ApiFileRevert' => 'MediaWiki\Api\Action\FileRevert',
		'ApiHelp' => 'MediaWiki\Api\Action\Help',
		'ApiImageRotate' => 'MediaWiki\Api\Action\ImageRotate',
		'ApiImport' => 'MediaWiki\Api\Action\Import',
		'ApiLinkAccount' => 'MediaWiki\Api\Action\LinkAccount',
		'ApiLogin' => 'MediaWiki\Api\Action\Login',
		'ApiLogout' => 'MediaWiki\Api\Action\Logout',
		'ApiManageTags' => 'MediaWiki\Api\Action\ManageTags',
		'ApiMergeHistory' => 'MediaWiki\Api\Action\MergeHistory',
		'ApiMove' => 'MediaWiki\Api\Action\Move',
		'ApiOpenSearch' => 'MediaWiki\Api\Action\OpenSearch',
		'ApiOptions' => 'MediaWiki\Api\Action\Options',
		'ApiParamInfo' => 'MediaWiki\Api\Action\ParamInfo',
		'ApiParse' => 'MediaWiki\Api\Action\Parse',
		'ApiPatrol' => 'MediaWiki\Api\Action\Patrol',
		'ApiProtect' => 'MediaWiki\Api\Action\Protect',
		'ApiPurge' => 'MediaWiki\Api\Action\Purge',
		'ApiQuery' => 'MediaWiki\Api\Action\Query',
		'ApiRemoveAuthenticationData' => 'MediaWiki\Api\Action\RemoveAuthenticationData',
		'ApiResetPassword' => 'MediaWiki\Api\Action\ResetPassword',
		'ApiRevisionDelete' => 'MediaWiki\Api\Action\RevisionDelete',
		'ApiRollback' => 'MediaWiki\Api\Action\Rollback',
		'ApiRsd' => 'MediaWiki\Api\Action\Rsd',
		'ApiSetNotificationTimestamp' => 'MediaWiki\Api\Action\SetNotificationTimestamp',
		'ApiSetPageLanguage' => 'MediaWiki\Api\Action\SetPageLanguage',
		'ApiStashEdit' => 'MediaWiki\Api\Action\StashEdit',
		'ApiTag' => 'MediaWiki\Api\Action\Tag',
		'ApiTokens' => 'MediaWiki\Api\Action\Tokens',
		'ApiUnblock' => 'MediaWiki\Api\Action\Unblock',
		'ApiUndelete' => 'MediaWiki\Api\Action\Undelete',
		'ApiUpload' => 'MediaWiki\Api\Action\Upload',
		'ApiUserrights' => 'MediaWiki\Api\Action\UserRights',
		'ApiValidatePassword' => 'MediaWiki\Api\Action\ValidatePassword',
		'ApiWatch' => 'MediaWiki\Api\Action\Watch',

		// API format
		'ApiFormatFeedWrapper' => 'MediaWiki\Api\Format\FeedWrapper',
		'ApiFormatJson' => 'MediaWiki\Api\Format\Json',
		'ApiFormatNone' => 'MediaWiki\Api\Format\None',
		'ApiFormatPhp' => 'MediaWiki\Api\Format\Php',
		'ApiFormatRaw' => 'MediaWiki\Api\Format\Raw',
		'ApiFormatXml' => 'MediaWiki\Api\Format\Xml',
		'ApiOpenSearchFormatJson' => 'MediaWiki\Api\Format\OpenSearchJson',
		'ApiFormatXmlRsd' => 'MediaWiki\Api\Format\XmlRsd',

		// Other API classes
		'ApiBase' => 'MediaWiki\Api\ActionBase',
		'UsageException' => 'MediaWiki\Api\MWUsageException',

		// Standardize special pages with class names ending in "Page"
		'AncientPagesPage' => 'MediaWiki\Special\Page\AncientPages',
		'BrokenRedirectsPage' => 'MediaWiki\Special\Page\BrokenRedirects',
		'DeadendPagesPage' => 'MediaWiki\Special\Page\DeadendPages',
		'DeletedContributionsPage' => 'MediaWiki\Special\Page\DeletedContributions',
		'DoubleRedirectsPage' => 'MediaWiki\Special\Page\DoubleRedirects',
		'EmailConfirmation' => 'MediaWiki\Special\Page\ConfirmEmail',
		'FewestrevisionsPage' => 'MediaWiki\Special\Page\FewestRevisions',
		'LinkSearchPage' => 'MediaWiki\Special\Page\LinkSearch',
		'ListDuplicatedFilesPage' => 'MediaWiki\Special\Page\ListDuplicatedFiles',
		'ListredirectsPage' => 'MediaWiki\Special\Page\ListRedirects',
		'LonelyPagesPage' => 'MediaWiki\Special\Page\LonelyPages',
		'LongPagesPage' => 'MediaWiki\Special\Page\LongPages',
		'MIMEsearchPage' => 'MediaWiki\Special\Page\MIMESearch',
		'MediaStatisticsPage' => 'MediaWiki\Special\Page\MediaStatistics',
		'MostcategoriesPage' => 'MediaWiki\Special\Page\MostCategories',
		'MostimagesPage' => 'MediaWiki\Special\Page\MostImages',
		'MostinterwikisPage' => 'MediaWiki\Special\Page\MostInterwikis',
		'MostlinkedCategoriesPage' => 'MediaWiki\Special\Page\MostLinkedCategories',
		'MostlinkedPage' => 'MediaWiki\Special\Page\MostLinked',
		'MostlinkedTemplatesPage' => 'MediaWiki\Special\Page\MostLinkedTemplates',
		'MostrevisionsPage' => 'MediaWiki\Special\Page\MostRevisions',
		'ShortPagesPage' => 'MediaWiki\Special\Page\ShortPages',
		'UncategorizedCategoriesPage' => 'MediaWiki\Special\Page\UncategorizedCategories',
		'UncategorizedImagesPage' => 'MediaWiki\Special\Page\UncategorizedImages',
		'UncategorizedPagesPage' => 'MediaWiki\Special\Page\UncategorizedPages',
		'UncategorizedTemplatesPage' => 'MediaWiki\Special\Page\UncategorizedTemplates',
		'UnusedCategoriesPage' => 'MediaWiki\Special\Page\UnusedCategories',
		'UnusedimagesPage' => 'MediaWiki\Special\Page\UnusedImages',
		'UnusedtemplatesPage' => 'MediaWiki\Special\Page\UnusedTemplates',
		'UnwatchedpagesPage' => 'MediaWiki\Special\Page\UnwatchedPages',
		'UserrightsPage' => 'MediaWiki\Special\Page\UserRights',
		'WantedCategoriesPage' => 'MediaWiki\Special\Page\WantedCategories',
		'WantedFilesPage' => 'MediaWiki\Special\Page\WantedFiles',
		'WantedPagesPage' => 'MediaWiki\Special\Page\WantedPages',
		'WantedTemplatesPage' => 'MediaWiki\Special\Page\WantedTemplates',
		'WithoutInterwikiPage' => 'MediaWiki\Special\Page\WithoutInterwiki',

		// Other non-camel-case special pages
		'SpecialProtectedpages' => 'MediaWiki\Special\Page\ProtectedPages',
		'SpecialProtectedtitles' => 'MediaWiki\Special\Page\ProtectedTitles',
		'SpecialPrefixindex' => 'MediaWiki\Special\Page\PrefixIndex',
		'SpecialNewpages' => 'MediaWiki\Special\Page\NewPages',
		'SpecialFilepath' => 'MediaWiki\Special\Page\FilePath',
		'SpecialLockdb' => 'MediaWiki\Special\Page\LockDB',
		'SpecialUnlockdb' => 'MediaWiki\Special\Page\UnlockDB',
		'SpecialRandomredirect' => 'MediaWiki\Special\Page\RandomRedirect',
		'SpecialRandomrootpage' => 'MediaWiki\Special\Page\RandomRootPage',
		'SpecialMycontributions' => 'MediaWiki\Special\Page\MyContributions',
		'SpecialMypage' => 'MediaWiki\Special\Page\MyPage',
		'SpecialMytalk' => 'MediaWiki\Special\Page\MyTalk',
		'SpecialMyuploads' => 'MediaWiki\Special\Page\MyUploads',
		'SpecialSpecialpages' => 'MediaWiki\Special\Page\SpecialPages',

		// Special page classes that weren't named after their page name
		'EmailInvalidation' => 'MediaWiki\Special\Page\InvalidateEmail',

		// deprefixing of classes with "MW" prefix
		'MWCallableUpdate' => 'MediaWiki\Deferred\CallableUpdate',
		'MWContentSerializationException' => 'MediaWiki\Exception\ContentSerializationException',
		'MWCryptHKDF' => 'MediaWiki\Utils\CryptHKDF',
		'MWCryptHash' => 'Wikimedia\CryptHash\CryptHash',
		'MWCryptRand' => 'MediaWiki\Utils\CryptRand',
		'MWDebug' => 'MediaWiki\Debug',
		'MWExceptionHandler' => 'MediaWiki\Exception\ExceptionHandler',
		'MWExceptionRenderer' => 'MediaWiki\Exception\ExceptionRenderer',
		'MWFileProps' => 'MediaWiki\Utils\FileProps',
		'MWGrants' => 'MediaWiki\Grants',
		'MWHttpRequest' => 'MediaWiki\Http\HttpRequest',
		'MWMessagePack' => 'Wikimedia\MessagePack\MessagePack',
		'MWOldPassword' => 'MediaWiki\Password\OldPassword',
		'MWSaltedPassword' => 'MediaWiki\Password\SaltedPassword',
		'MWRestrictions' => 'MediaWiki\Utils\Restrictions',
		'MWTimestamp' => 'MediaWiki\Timestamp',
		'MWUnknownContentModelException' => 'MediaWiki\Exception\UnknownContentModelException',
	];

	static $ignoreDirs = [
		'maintenance',
	];

	public function __construct( $autoloadClasses ) {
		$this->autoloadClasses = $autoloadClasses;
	}

	private function getAutoloadClasses() {
		$autoload = file_get_contents( $this->options['autoloadFile'] );
		str_replace( "__DIR__ . '/", "'", $autoload );
		eval( $autoload );
		return $wgAutoloadLocalClasses;
	}

	private function startsWith( $haystack, $needle ) {
		return substr( $haystack, 0, strlen( $needle ) ) === $needle;
	}

	public function getAliases() {
		$aliases = [];

		foreach ( $this->autoloadClasses as $class => $file ) {
			$dir = dirname( $file );

			if ( isset( self::$renamedClasses[$class] ) ) {
				$aliases[$class] = self::$renamedClasses[$class];
				continue;
			}
			
			if ( isset( self::$namespacesByClass[$class] ) ) {
				$aliases[$class] = self::$namespacesByClass[$class] . '\\' . $class;
				continue;
			}

			if ( isset( self::$deprefixesByDir[$dir] ) ) {
				list( $namespace, $prefix ) = self::$deprefixesByDir[$dir];
				if ( $this->startsWith( $class, $prefix ) ) {
					$aliases[$class] = $namespace . '\\' . substr( $class, strlen( $prefix ) );
					continue;
				} else {
					$aliases[$class] = $namespace . '\\' . $class;
					continue;
				}
			}

			if ( isset( self::$namespacesByDir[$dir] ) ) {
				$namespace = self::$namespacesByDir[$dir];
				$slashPos = strrpos( $class, '\\' );
				if ( $slashPos !== false ) {
					$priorNamespace = substr( $class, 0, $slashPos );
					$classPart = substr( $class, $slashPos + 1 );
					
					if ( $priorNamespace !== $namespace ) {
						$aliases[$class] = $namespace . '\\' . $classPart;
						continue;
					} else {
						continue;
					}
				} else {
					$aliases[$class] = $namespace . '\\' . $class;
					continue;
				}
			}

			foreach ( self::$ignoreDirs as $ignoreDir ) {
				if ( $this->startsWith( $dir, "$ignoreDir/" ) || $dir === $ignoreDir ) {
					continue 2;
				}
			}

			if ( $dir === '.' ) {
				// profileinfo.php
				continue;
			}

			throw new \Exception( "Don't know what to do with class $class in directory $dir" );
		}

		return $aliases;
	}
}

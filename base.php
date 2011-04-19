<?php

/**
 * Base Web Loader
 * @author gareth flowers
 */
// show any errors
error_reporting( E_ALL );


// set current timezone
date_default_timezone_set( 'UTC' );


// ensure correct request url
$_SERVER['REQUEST_URI'] = strtolower( str_replace( 'index.php', '', $_SERVER['REQUEST_URI'] ) );


// include required files
require_once('interfaces/IRenderable.php');
require_once('interfaces/IDbConnection.php');

require_once( 'helper/Db.php' );
require_once( 'helper/MySqlDb.php' );
require_once( 'helper/PgSqlDb.php' );
require_once( 'helper/Email.php' );
require_once( 'helper/BrowserDetect.php' );
require_once( 'helper/SiteMap.php' );
require_once( 'helper/Validation.php' );

require_once( 'element/Element.php' );
require_once( 'element/ContainerElement.php' );
require_once( 'element/H.php' );
require_once( 'element/Link.php' );
require_once( 'element/Page.php' );
require_once( 'element/PageHead.php' );
require_once( 'element/Form.php' );
require_once( 'element/Div.php' );
require_once( 'element/Image.php' );

require_once( 'html/JavaScript.php' );

// browser detection
$browser = BrowserDetect::IsMobile();
define( 'IS_MOBILE', $browser[0] );
define( 'PLATFORM', $browser[1] );

?>

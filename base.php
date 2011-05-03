<?php

/**
 * Base Web Loader
 * @author garethflowers
 */
// show any errors
error_reporting( E_ALL );


// set current timezone
date_default_timezone_set( 'UTC' );


// ensure correct request url
$_SERVER['REQUEST_URI'] = strtolower( str_replace( 'index.php', '', $_SERVER['REQUEST_URI'] ) );


// include required files
require_once( 'interfaces/IRenderable.php' );
require_once( 'interfaces/IDbConnection.php' );

require_once( 'helper/Db.php' );
require_once( 'helper/MySqlDb.php' );
require_once( 'helper/PgSqlDb.php' );
require_once( 'helper/Curl.php' );
require_once( 'helper/Email.php' );
require_once( 'helper/SiteMap.php' );
require_once( 'helper/Validation.php' );

require_once( 'Html.php' );
require_once( 'html/ContainerAbstract.php' );
require_once( 'html/H.php' );
require_once( 'html/Link.php' );
require_once( 'html/Header.php' );
require_once( 'html/Footer.php' );
require_once( 'html/PageHead.php' );
require_once( 'html/Form.php' );
require_once( 'html/Div.php' );
require_once( 'html/Image.php' );
require_once( 'html/JScript.php' );
require_once( 'html/Page.php' );

?>

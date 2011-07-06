<?php

/**
 * Base Web Loader
 *
 * @author garethflowers
 */
// show any errors
error_reporting( E_ALL );


// set current timezone
date_default_timezone_set( 'UTC' );


// ensure correct request url
$_SERVER['REQUEST_URI'] = strtolower( str_replace( 'index.php', '', $_SERVER['REQUEST_URI'] ) );


// include required files
require_once( 'config.php' );

require_once( 'interfaces/irenderable.php' );
require_once( 'interfaces/idbconnection.php' );

require_once( 'db/mysqldb.php' );
require_once( 'db/pgsqldb.php' );

require_once( 'helper/functions.php' );
require_once( 'helper/curl.php' );
require_once( 'helper/email.php' );
require_once( 'helper/sitemap.php' );
require_once( 'helper/validation.php' );

require_once( 'html/html.php' );
require_once( 'html/container.php' );
require_once( 'html/title.php' );
require_once( 'html/link.php' );
require_once( 'html/header.php' );
require_once( 'html/footer.php' );
require_once( 'html/list.php' );
require_once( 'html/nav.php' );
require_once( 'html/head.php' );
require_once( 'html/form.php' );
require_once( 'html/section.php' );
require_once( 'html/image.php' );
require_once( 'html/script.php' );
require_once( 'html/page.php' );
require_once( 'html/table.php' );
require_once( 'html/tablerow.php' );
require_once( 'html/tablecell.php' );

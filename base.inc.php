<?php

/**
 * Base Web Loader
 * @author Gareth Flowers (gareth@garethflowers.com)
 * @version 0.1
 */
// show any errors
error_reporting( E_ALL );

// set current timezone
date_default_timezone_set( 'UTC' );

// ensure correct request url
$_SERVER['REQUEST_URI'] = strtolower( str_replace( 'index.php', '', $_SERVER['REQUEST_URI'] ) );

// include required files
require_once('helper/db.class.php');
require_once('helper/email.class.php');
require_once('helper/browserdetect.class.php');
require_once('helper/sitemap.class.php');
require_once('helper/validation.class.php');

require_once('element/element.class.php');
require_once('element/textbox.class.php');
require_once('element/page.class.php');
require_once('element/page.head.class.php');

require_once('html/form.class.php');
require_once('html/javascript.class.php');

// browser detection
$browser = BrowserDetect::IsMobile();
define( 'IS_MOBILE', $browser[0] );
define( 'PLATFORM', $browser[1] );

?>
<?php

ini_set('memory_limit', '128M');

// require_once( dirname(__FILE__) . '/../inc/Smarty/libs/Smarty.class.php' );
require_once __DIR__ . '/../vendor/autoload.php';
require_once( dirname(__FILE__) . '/../inc/config.php' );
require_once( dirname(__FILE__) . '/../inc/function.php' );
require_once( dirname(__FILE__) . '/../inc/lib/str.reprace.class.php' );
require_once( dirname(__FILE__) . '/../inc/lib/queserser.FileIO.class.php' );
require_once( dirname(__FILE__) . '/../inc/lib/DB/.systemDB.class.php' );
/*
require_once( 'HTML/QuickForm.php' );
require_once( 'HTML/QuickForm/Renderer/ArraySmarty.php' );
require_once( 'Pager/Pager.php' );
*/


require_once( dirname(__FILE__) . '/../inc/HTML/QuickForm.php' );
require_once( dirname(__FILE__) . '/../inc/HTML/QuickForm/Renderer/ArraySmarty.php' );
require_once( dirname(__FILE__) . '/../inc/Pager/Pager.php' );



$weekArray = array( '日', '月', '火', '水', '木', '金', '土' );

define( 'TITLE', 'ウェブ システム　by morita aluminum industry ,inc.' );
define( 'FOOTER_COPYRIGHT', 'Copyright © ' . date( 'Y' ) . ' QUESERSER Co,Ltd. All Rights Reserved.' );
define( 'USER_NAME', $_SESSION['authUser']['name'] );
define( 'TODAY', date( 'Y.m.d', time() ) );
define( 'DAY_OF_WEEK', $weekArray[date( 'w', time() )] );

?>
<?php
require_once( dirname(__FILE__) . '/./config.php' );
require_once( dirname(__FILE__) . '/./lib/DB/.contentsDB.class.php' );
require_once( dirname(__FILE__) . '/./lib/DB/.systemDB.class.php' );
require_once( dirname(__FILE__) . '/./lib/str.reprace.class.php' );
require_once( dirname(__FILE__) . '/./Smarty/libs/Smarty.class.php' );
require_once( dirname(__FILE__) . '/./function.php' );
require_once( 'HTML/QuickForm.php' );
require_once( 'HTML/QuickForm/Renderer/ArraySmarty.php' );
require_once( dirname(__FILE__) . '/./Pager/Pager.php' );

//print_r($_SERVER);

$printEn = ( preg_match( '/\/en\//', $_SERVER['REQUEST_URI'] ) ) ? '/en' : '';

define( 'SMARTY_TEMPLATE_PATH',   ROOT_PATH . $printEn . '/templates/' );
define( 'SMARTY_TEMPLATE_C_PATH', ROOT_PATH . $printEn . '/templates_c/' );
define( 'SITE_TITLE',             '森田アルミ協業株式会社' );

session_start();


$query = new contentsDB();
/*
$sideMakerMenu    = $query->MakerList();
$sideCategoryMenu = categoryMasterArray();
*/


$smarty = new Smarty;

$smarty->assign( 'sideCategoryMenu', $sideCategoryMenu );
$smarty->assign( 'sideMakerMenu',    $sideMakerMenu );

//define( 'META_DESCRIPTION',       '' );
//define( 'META_KEYWORDS',          '' );

//if( preg_match( '/\/sp\//', $_SERVER['SCRIPT_NAME'] ) ) $spFlg++;
?>
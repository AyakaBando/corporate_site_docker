<?php
session_start();

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', '/var/www/html'); // Set ROOT_PATH manually if missing
}

require_once(ROOT_PATH . '/inc/config.php');
// require_once( dirname(__FILE__) . '/inc/config.php' );
// require_once( dirname(__FILE__) . '/inc/lib/DB/.contentsDB.class.php' );
// require_once( dirname(__FILE__) . '/inc/lib/DB/.systemDB.class.php' );
require_once(ROOT_PATH . '/inc/lib/DB/.contentsDB.class.php');
require_once( ROOT_PATH . '/inc/lib/DB/.systemDB.class.php' );
require_once( ROOT_PATH . '/inc/lib/str.reprace.class.php' );
// require_once( ROOT_PATH . '/inc/Smarty/libs/Smarty.class.php' );
require_once( ROOT_PATH . '/inc/function.php' );
require_once( 'HTML/QuickForm.php' );
require_once( 'HTML/QuickForm/Renderer/ArraySmarty.php' );
require_once( ROOT_PATH . '/inc/Pager/Pager.php' );

// require_once '/var/www/html/vendor/autoload.php';
require_once __DIR__ . '/../vendor/autoload.php';


set_include_path(get_include_path() . PATH_SEPARATOR . '/var/www/html/inc/lib/');



$printEn = ( preg_match( '/\/en\//', $_SERVER['REQUEST_URI'] ) ) ? '/en' : '';


define( 'SMARTY_TEMPLATE_PATH',   ROOT_PATH . $printEn . '/templates/' );
define( 'SMARTY_TEMPLATE_C_PATH', ROOT_PATH . $printEn . '/templates_c/' );

define( 'SITE_TITLE',             '森田アルミ協業株式会社' );


$query = new contentsDB();

// $sideMakerMenu    = $query->MakerList();
// $sideCategoryMenu = categoryMasterArray();


// $smarty = new Smarty;
$smarty = new Smarty;

$smarty->assign( 'sideCategoryMenu', $sideCategoryMenu );
$smarty->assign( 'sideMakerMenu',    $sideMakerMenu );

$smarty->setTemplateDir('/var/www/html/templates');
$smarty->setCompileDir('/var/www/html/templates_c');
// $smarty->setCacheDir('/var/www/html/cache');
// $smarty->setConfigDir('/var/www/html/configs/');

$smarty->debugging = true;

$smarty->assign('name', 'morita');
// $smarty->display('index.html');

//define( 'META_DESCRIPTION',       '' );
//define( 'META_KEYWORDS',          '' );

//if( preg_match( '/\/sp\//', $_SERVER['SCRIPT_NAME'] ) ) $spFlg++;

// contentsConfig.php の冒頭 or 最後に追加
error_log('✔ contentsConfig.php was loaded');
?>
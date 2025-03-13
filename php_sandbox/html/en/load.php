<?php
require_once( dirname(__FILE__) . '/../inc/config.php' );
require_once( dirname(__FILE__) . '/../inc/contentsConfig.php' );
//require_once( dirname(__FILE__) . '/./inc/lib/DB/.systemDB.class.php' );
require_once( dirname(__FILE__) . '/../inc/lib/DB/.contentsEnDB.class.php' );

define( 'THE_DIR_NAME',   '' );
define( 'THE_FILE_NAME',  'load' );

$query       = new contentsEnDB();
//$systemquery = new systemDB();



/*--------------------------------------------------
    >> »•i
--------------------------------------------------*/
//‰æ‘œŽæ“¾
$imgArray = $query->ProductImageList();


$data = $query->ProductList( 6, 1000, $_REQUEST );



$smarty->template_dir = SMARTY_TEMPLATE_PATH    . THE_DIR_NAME;
$smarty->compile_dir  = SMARTY_TEMPLATE_C_PATH  . THE_DIR_NAME;


$smarty->assign( 'productCategoryArray',  $productCategoryArray );
$smarty->assign( 'middleCategory',        $middleCategory );
$smarty->assign( 'imgArray',              $imgArray );
$smarty->assign( 'data',                  $data );

$smarty->display( THE_FILE_NAME . '.html' );
?>

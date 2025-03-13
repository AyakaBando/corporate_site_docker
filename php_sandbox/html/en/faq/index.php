<?php
require_once( dirname(__FILE__) . '/../../inc/config.php' );
require_once( dirname(__FILE__) . '/../../inc/contentsConfig.php' );
require_once( dirname(__FILE__) . '/../../inc/lib/DB/.systemDB.class.php' );
require_once( dirname(__FILE__) . '/../../inc/lib/DB/.contentsDB.class.php' );

define( 'THE_DIR_NAME',   'faq' );
define( 'THE_FILE_NAME',  'index' );

$query       = new contentsDB();
$systemquery = new systemDB();

$productCategoryArray = productCategoryArray();
$middleCategory       = $systemquery->GetCategory( 1 );

$imgArray = $query->ProductImageList();



$data = $query->FaqProductList( 0, 10000 );

//print_r( $puroductData );

$smarty->template_dir = SMARTY_TEMPLATE_PATH    . THE_DIR_NAME;
$smarty->compile_dir  = SMARTY_TEMPLATE_C_PATH  . THE_DIR_NAME;


$smarty->assign( 'productCategoryArray',  $productCategoryArray );
$smarty->assign( 'middleCategory',        $middleCategory );
$smarty->assign( 'puroductData',          $puroductData );
$smarty->assign( 'imgArray',              $imgArray );
$smarty->assign( 'data',                  $data );


$smarty->display( THE_FILE_NAME . '.html' );
?>

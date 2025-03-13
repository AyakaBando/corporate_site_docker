<?php
require_once( dirname(__FILE__) . '/../../inc/config.php' );
require_once( dirname(__FILE__) . '/../../inc/contentsConfig.php' );
require_once( dirname(__FILE__) . '/../../inc/lib/DB/.systemDB.class.php' );
require_once( dirname(__FILE__) . '/../../inc/lib/DB/.contentsDB.class.php' );
//print_r($_SESSION['member']);
define( 'THE_DIR_NAME',   'faq' );
define( 'THE_FILE_NAME',  'detail' );

//$evaluationArray = evaluationArray( 1 );
$query           = new contentsDB();
//$systemquery     = new systemDB();

$data        = $query->FaqDetail( $_GET['id'] );
$productData = $query->ContentsDetail( $_GET['id'] );

//print_r($data);
//print_r($_SESSION);


$smarty->template_dir = SMARTY_TEMPLATE_PATH    . THE_DIR_NAME;
$smarty->compile_dir  = SMARTY_TEMPLATE_C_PATH  . THE_DIR_NAME;

$smarty->assign( 'data',         $data );
$smarty->assign( 'productData',  $productData );

$smarty->display( THE_FILE_NAME . '.html' );
?>
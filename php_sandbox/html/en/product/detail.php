<?php
require_once( dirname(__FILE__) . '/../../inc/config.php' );
require_once( dirname(__FILE__) . '/../../inc/contentsConfig.php' );
//require_once( dirname(__FILE__) . '/../../inc/lib/DB/.systemSaveDB.class.php' );
require_once( dirname(__FILE__) . '/../../inc/lib/DB/.systemDB.class.php' );
require_once( dirname(__FILE__) . '/../../inc/lib/DB/.contentsEnDB.class.php' );
//print_r($_SESSION['member']);
define( 'THE_DIR_NAME',   'product' );
define( 'THE_FILE_NAME',  'detail' );

$query           = new contentsEnDB();
$systemquery     = new systemDB();

$data = $query->ContentsDetail( $_GET['id'] );


//print_r($data);
//print_r($_SESSION);
/*
if( $_SESSION['member']['flg'] )
{

    $query->_setQuery( 'query', "INSERT `memberPageView` ( `id`, `memberId`, `dateTime` ) VALUES ( ?, ?, ? )", 
        array( $_GET['id'],$_SESSION['member']['memberId'], date( 'Y-m-d H:i:s' ) ) );
}
*/


$smarty->template_dir = SMARTY_TEMPLATE_PATH    . THE_DIR_NAME;
$smarty->compile_dir  = SMARTY_TEMPLATE_C_PATH  . THE_DIR_NAME;

$smarty->assign( 'passwordStr',  $passwordStr );
$smarty->assign( 'flg',          $flg );
$smarty->assign( 'data',          $data );

$smarty->display( THE_FILE_NAME . '.html' );
?>
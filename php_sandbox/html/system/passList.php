<?php
require_once( '../inc/auth.php' );
require_once( './systemConsts.php' );
require_once( '../inc/lib/DB/.systemLoginDB.class.php' );

if( $_SESSION['authUser']['author'] != 1 )
{
    echo file_get_contents( '../404.html' );
    die;
}

//ページャー設定
$listCount = systemLoginDB::listCount( 'passWord' );
if( isset( $_REQUEST['ls'] ) ) $ls = $_REQUEST['ls'] * $limit - $limit;

$smarty = new Smarty;

$smarty->assign( 'data', systemLoginDB::PassList() );//DBデータ取得
$smarty->assign( 'listCount',          $listCount );

$smarty->display('passList.html');
?>
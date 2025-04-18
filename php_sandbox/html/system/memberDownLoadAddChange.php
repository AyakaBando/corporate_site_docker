<?php
require_once( '../inc/auth.php' );
require_once( './systemConsts.php' );
require_once( '../inc/lib/DB/.systemSaveDB.class.php' );
require_once( '../inc/lib/DB/.systemProductDB.class.php' );
require_once( '../inc/lib/DB/.systemMemberDB.class.php' );

define( 'SQL_TABLE_NAME',   'product' );
define( 'PAGE_TITLE',       '会員製品ダウンロード' );
define( 'FILE_CATEGORY',    'memberDownLoad' );
define( 'THE_FILE_NAME',    FILE_CATEGORY . 'AddChange' );
define( 'FILE_SESSION_KEY', FILE_CATEGORY . 'Image' );
define( 'PAGE_NUM',         2 );
define( 'CHENGE_FLG',       0 );
define( 'SORT_FLG',         0 );

//DBインスタンス
$query       = new systemContentsDB();
$systemquery = new systemDB();
$memberquery = new systemMemberDB();

$productCategoryArray  = productCategoryArray( 1 );
$categoryArray         = $systemquery->GetCategory( 1, null );
//$prtJson               = json_encode( $categoryArray );
$dataProduct           = $query->ProductDetailINmember( $_GET['id'], 1 );
$dataCnt               = $query->MemberDownLoadDetail( 0, 10000, $_GET['memberId'], $_GET );

if( $_REQUEST['id'] )
{
    //登録詳細データ
    $data       = $query->Detail( $_REQUEST['id'] );
    //$dataCnt    = $query->MemberCountList( $_GET );
    $dataMember = $memberquery->DataList( 0, 10000, $_GET );

    $setCategoryArray       = $makerArray['category'][$data['makerId']];
    $setSubCategoryArray    = $subCategoryArray[$data['makerId']][$data['category']];
}


$smarty = new Smarty;


$smarty->assign( 'flg',                  $flg );
$smarty->assign( 'data',                 $data );
$smarty->assign( 'image',                $data['image'] );
$smarty->assign( 'productCategoryArray', $productCategoryArray );
$smarty->assign( 'categoryArray',        $categoryArray);

$smarty->assign( 'dataCnt',              $dataCnt );
$smarty->assign( 'dataMember',           $dataMember );
$smarty->assign( 'dataProduct',          $dataProduct );

$smarty->display( THE_FILE_NAME . '.html' );
?>
<?php
require_once( '../inc/auth.php' );
require_once( './systemConsts.php' );
require_once( '../inc/lib/DB/.systemSaveDB.class.php' );
require_once( '../inc/lib/DB/.systemProductDB.class.php' );
require_once( '../inc/lib/DB/.systemMemberDB.class.php' );

define( 'SQL_TABLE_NAME',   'product' );
define( 'PAGE_TITLE',       '会員製品ページアクセス数' );
define( 'FILE_CATEGORY',    'memberPageView' );
define( 'THE_FILE_NAME',    FILE_CATEGORY . 'AddChange' );
define( 'FILE_SESSION_KEY', FILE_CATEGORY . 'Image' );
define( 'PAGE_NUM',         2 );
define( 'CHENGE_FLG',       1 );
define( 'SORT_FLG',         0 );

//DBインスタンス
$query       = new systemContentsDB();
$systemquery = new systemDB();
$memberquery = new systemMemberDB();

$productCategoryArray  = productCategoryArray( 1 );
$categoryArray         = $systemquery->GetCategory( 1, null );
$yearArray             = $query->MemberViewArchiveList( 1 );
$monthArray            = monthArray();



if( $_REQUEST['id'] )
{
    //登録詳細データ
    $data       = $query->Detail( $_REQUEST['id'] );
    $dataCnt    = $query->MemberCountList( $_GET );
    $dataMember = $memberquery->DataList( 0, 10000, $_GET );

    //$setCategoryArray       = $makerArray['category'][$data['makerId']];
    //$setSubCategoryArray    = $subCategoryArray[$data['makerId']][$data['category']];
}



//フォーム作成
$form = new HTML_QuickForm( 'item', 'get' );
$form->addElement( 'select',       'year',         '年',       $yearArray,  array( 'style' => 'max-width:300px;' ) );
$form->addElement( 'select',       'month',        '月',       $monthArray, array( 'style' => 'padding:1px 4px;' ) );
if( $_REQUEST['id'] ) $form->addElement( 'hidden',  'id',     $_REQUEST['id'] );


$form->addElement( 'submit',       'submitSearch', '絞込み',   array() );

//エラー追加処理
if( isset( $_GET['submitSearch'] ) )
{
    if( !$_GET['year'] && $_GET['month'] )
        $form->_errors['month'] = '年を選択してください。';

    if( !$_GET['year'] && !$_GET['month'] )
        $form->_errors['month'] = '年と月を選択してください。';
}

$form->setRequiredNote( '<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;">の項目は必ず入力してください。</span>' );
$form->setJsWarnings( '*の項目は必ず入力してください。', "\n\n" . TITLE );


$smarty = new Smarty;

$renderer = new HTML_QuickForm_Renderer_ArraySmarty( $smarty );
$form->accept( $renderer );
$smarty->assign( 'form', $renderer->toArray() );

$smarty->assign( 'flg',                  $flg );
$smarty->assign( 'data',                 $data );
$smarty->assign( 'image',                $data['image'] );
$smarty->assign( 'productCategoryArray', $productCategoryArray );
$smarty->assign( 'categoryArray',        $categoryArray );
$smarty->assign( 'dataCnt',              $dataCnt );
$smarty->assign( 'dataMember',           $dataMember );
$smarty->assign( 'dataMember',           $dataMember );


$smarty->display( THE_FILE_NAME . '.html' );
?>
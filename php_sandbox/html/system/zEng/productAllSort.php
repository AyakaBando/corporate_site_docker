<?php
require_once( '../../inc/auth.php' );
require_once( '../systemConsts.php' );
require_once( '../../inc/lib/DB/.systemEnProductDB.class.php' );

define( 'SQL_TABLE_NAME',  'en_product' );
define( 'PAGE_TITLE',      '英語サイト：製品' );
define( 'FILE_CATEGORY',   'product' );
define( 'THE_FILE_NAME',   FILE_CATEGORY . 'AllSort' );
define( 'PAGE_NUM',        4 );
define( 'CHENGE_FLG',      1 );
define( 'SORT_FLG',        1 );

define( 'CATEGORY_FLG',    1 );

//DBインスタンス
$query       = new systemContentsDB();
$systemquery = new systemDB();

$getLink              = createGetLink( array( 'mode', 'id', 'd', 't', 'r', 's', 'dispFlg', 'topFlg', 'sort', 'spotlight', 'cond' ), $_GET );
$sortLink             = createGetLink( array( 'mode', 'id', 'd', 't', 'r', 's', 'dispFlg', 'topFlg', 'sort', 'spotlight', 'cond' ), $_GET );

$productCategoryArray = productCategoryArray( 1 );
$middleCategory       = $systemquery->GetCategory( 1, 1 );
$prtJson              = json_encode( $middleCategory );
$setMiddleCategory    = array( '' );




if( $_GET['bicCategoryId'] )$setMiddleCategory = $middleCategory[$_GET['bicCategoryId']];


//if( $_GET['compId'] )
//    $title = systemCategoryDB::GetCulumnContents( SQL_TABLE_NAME, 'name', 'id', $_GET['compId'], 1 );




//フォーム作成
$form = new HTML_QuickForm( 'category', 'get' );

$form->addElement( 'select',       'bicCategoryId',   '大カテゴリ',    $productCategoryArray, array( 'style' => 'max-width:300px;', 'onchange' => 'changeCategory( this.value, "category" )' ) );
$form->addElement( 'select',       'category',        '中カテゴリ',    $setMiddleCategory,    array( 'style' => 'max-width:200px;' ) );
$form->addElement( 'text',         'categoryError',   'カテゴリエラー用',                     array( 'style' => 'width:100%;' ) );

$form->addElement( 'submit',    'submitConf',    '選択' );


$form->applyFilter( '__ALL__', 'trim' );


if( $_GET['submitConf'] && $form->validate() )
{

    if( !$_GET['bicCategoryId'] || !$_GET['category'] )
        $form->_errors['categoryError'] = 'カテゴリを選択してください。';
}

$form->setRequiredNote( '<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;">の項目は必ず入力してください。</span>' );
$form->setJsWarnings( '*の項目は必ず入力してください。', "\n\n" . TITLE );


$_GET['dispFlg'] = 1;
//$_GET['sort']    = 'priority';
//$_GET['cond']    = 'ASC';
//$_GET['topFlg']  = 1;
$data = $query->DataList( 0, 10000, $_GET, 1 );

if( $_GET['s'] == 1 )
{
/*
	echo '<pre>';
	print_r( $_POST );
	print_r( $_GET );
	echo '</pre>';
	die;
*/
    $query->SortAllSave( $_POST, $_GET );

    header( 'Location: ./' . THE_FILE_NAME . '.php' . $getLink['all'] . ( $getLink['all'] ? '&' : '?' ) . 'r=1' );
    die;
}


//print_r( systemOtherDB::CategoryGenreName( $_GET['adminGenre'] ) );
$smarty = new Smarty;

$renderer = new HTML_QuickForm_Renderer_ArraySmarty( $smarty );
$form->accept( $renderer );
$smarty->assign( 'form', $renderer->toArray() );

$smarty->assign( 'data',            $data );
$smarty->assign( 'getLink',         $getLink );
$smarty->assign( 'sortLink',        $sortLink );
$smarty->assign( 'middleCategory',  $middleCategory );
$smarty->assign( 'prtJson',         $prtJson );


$smarty->display( THE_FILE_NAME . '.html' );
?>
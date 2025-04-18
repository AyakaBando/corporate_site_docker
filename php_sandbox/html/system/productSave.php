<?php
require_once( '../inc/auth.php' );
require_once( './systemConsts.php' );
//require_once( '../inc/lib/DB/.itemMasterDB.class.php' );
//ini_set( 'error_reporting', E_ALL );
//ini_set( 'display_errors', 1 );


define( 'SQL_TABLE_NAME',  'product' );
define( 'PAGE_TITLE',      '商品' );
define( 'THE_FILE_NAME',   'productSave' );
define( 'FILE_CATEGORY',   'product' );
define( 'PAGE_NUM',        4 );
define( 'SORT_FLG',        0 );


$getLink  = createGetLink( array( 'mode', 'id', 'disp', 'd', 't', 'r', 'disp', 'spotlight' ), $_GET );
$sortLink = createGetLink( array( 'mode', 'id', 'disp', 'd', 't', 'r', 'disp', 'cond', 'sort', 'spotlight' ), $_GET );


$form = new HTML_QuickForm( 'item', 'post' );

//$form->addElement( 'file',   'csvExport',  'CSVエクスポート' );
$form->addElement( 'file',   'csvImport',  'CSVインポート' );
$form->addElement( 'submit', 'submitCsv',  'インポート', array() );

$form->addRule( 'csvImport', '登録するCSVファイルを選択してください。',          'uploadedfile' );
$form->addRule( 'csvImport', '拡張子が『csv』のファイルしかアップできません。',  'mimetype', array( 'application/csv', 'text/csv', 'application/vnd.ms-excel' ) );

if( $_POST['submitCsv'] )
{
}

$form->applyFilter( '__ALL__', 'trim' );

//_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/
    // #CSVインポート
//_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/
if( $form->validate() )
{

    if( isset( $_POST['submitCsv'] ) )
    {

        $baseFile = file_get_contents( $_FILES['csvImport']['tmp_name'] );

        $upFile = 'updata.csv';
        @unlink( './temp/' . $upFile );
        $fp = fopen( './temp/' . $upFile, 'w+' );
        fputs( $fp, $baseFile );
        fclose( $fp );

        require_once( './csvSave.php' );

        header( "Location: ./itemSave.php?r=2&c=" . urlencode( $baseTable ) );
        die;
    }

}


$smarty = new Smarty;

$renderer = new HTML_QuickForm_Renderer_ArraySmarty( $smarty );
$form->accept( $renderer );
$smarty->assign( 'form', $renderer->toArray() );


$smarty->assign( 'getLink',            $getLink );
$smarty->assign( 'sortLink',           $sortLink );

$smarty->display( THE_FILE_NAME . '.html' );
?>
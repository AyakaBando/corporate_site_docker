<?php
require_once( '../inc/auth.php' );
require_once( './systemConsts.php' );
require_once( '../inc/lib/DB/.systemFileUpDB.class.php' );


define( 'SQL_TABLE_NAME',   'product_catalog' );
define( 'PAGE_TITLE',       'カタログ' );
define( 'FILE_CATEGORY',    'product' );
define( 'THE_FILE_NAME',    FILE_CATEGORY . '_catalogAddChange' );
define( 'FILE_SESSION_KEY', FILE_CATEGORY . 'Image' );
define( 'PAGE_NUM',         2 );

$query = new systemFileUpDB();
$query->_setTableName( SQL_TABLE_NAME );

$data      = $query->FileList( $_REQUEST['id'] );

if( !$_POST )unset( $_SESSION[FILE_CATEGORY] );

$maxWidth    = array( 1 => 960 );
$maxHeight   = array( 1 => 395 );
$maxImageCnt = 1;

$itemName  = $query->GetCulumnContents( 'product', 'name',     'id', $_REQUEST['id'], 1 );
$itemName .= ' / ' . $query->GetCulumnContents( 'product', 'subName', 'id', $_REQUEST['id'], 1 );


if( $_REQUEST['imgId'] )
{
    $upDateImg  = $query->FileUpDate2( $_REQUEST['imgId'] );
}


$dataCnt   = count( $data );
$maxCount  = ( is_array( $data ) ) ? $dataCnt : 0;

if( !$_POST ) $getReferer = getReferer();
if( $_POST['referer'] )$getReferer = $_REQUEST['referer'];

//登録
if( isset( $_POST['reg'] ) )
{
  /*
    if( !$_POST['imgId'] && !$_FILES[1]['name'] )
    {
        $errors[] = 'ファイルを登録してください。';
    }
  */
    /*if( $_FILES[1]['error'] === 0 && !preg_match( '/(application\/pdf|application\/x-pdf)/', $_FILES[1]['type'] ) )
    {
        $errors[] = 'ファイルは『pdf』ファイルしかアップできません。';
    }
    */

    if( !$errors )
    {

        //仮ファイルをフォルダにアップ
        $fileFlg = fileTempUpload( $_FILES, './temp/'/*$tempPath*/, '../upImage/'/*$uploadPath*/, $maxWidth, $maxHeight, 200/*$smallWidth*/, 200/*$smallHeight*/ );
/*
echo '<pre>';
print_r($fileFlg);
print_r($_FILES);
*/
        //画像処理
        $_POST['fileName'][1] = $_SESSION[FILE_SESSION_KEY][1]['fileName'];
        $fileArray = fileUpload( $_POST, $upDateImg, $maxImageCnt );

        // セールスフォース切り替え設定
        if (!isset($_POST['changeFlg']) && !$_POST['changeFlg']) $_POST['changeFlg'] = 0;

//echo '<pre>';
//print_r($_SESSION);
//print_r($_POST);
//print_r($fileArray);
//echo '</pre>';
//die;
        $query->FileSave2( $_POST, $fileArray );

        unset( $_SESSION[FILE_SESSION_KEY] );

        tempFileClean();

        header( 'Location: ./' . THE_FILE_NAME . '.php?id=' . $_REQUEST['id'] . '&r=1' );
        die;
    }
}


//表示切り替え処理
if( isset( $_POST['disp'] ) )
{
    $query->FileDispChange2( $_POST );

    header( 'Location: ./' . THE_FILE_NAME . '.php?id=' . $_REQUEST['id'] . '&r=3' );
    die;
}


//削除処理
if( isset( $_POST['del'] ) )
{
    $query->FileDelete2( $_POST['imgId'] );
       if( $_POST['fileName'] )@unlink( '../upImage/' . FILE_CATEGORY . '/' . $_POST['fileName'] );
    header( 'Location: ./' . THE_FILE_NAME . '.php?id=' . $_REQUEST['id'] . '&d=1' );
    die;
}


//ソート設定処理
if( is_array( $_POST['reNewId'] ) && $_GET['s'] == 1 )
{

    $dispChange = $query->FileSort2( $_POST );
    header( 'Location: ./' . THE_FILE_NAME . '.php?id=' . $_REQUEST['id'] . '&r=2' );
    die;
}


$smarty = new Smarty;

$smarty->assign( 'getLink',    $getLink );
$smarty->assign( 'referer',    $referer );
$smarty->assign( 'maxWidth',   $maxWidth );
$smarty->assign( 'maxHeight',  $maxHeight );
$smarty->assign( 'maxCount',   $maxCount );
$smarty->assign( 'itemName',   $itemName );
$smarty->assign( 'data',       $data );
$smarty->assign( 'upDateImg',  $upDateImg );
$smarty->assign( 'dataCnt',    $dataCnt );
$smarty->assign( 'errors',     $errors );
$smarty->assign( 'pageData',   $pageData );
$smarty->assign( 'getReferer', $getReferer );


$smarty->display( THE_FILE_NAME . '.html' );
?>
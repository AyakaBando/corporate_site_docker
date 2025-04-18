<?php
require_once( '../../inc/auth.php' );
require_once( '../systemConsts.php' );
require_once( '../../inc/lib/DB/.systemFileUpDB.class.php' );


define( 'SQL_TABLE_NAME',   'en_product_caseImg' );
define( 'PAGE_TITLE',       '英語サイト：設置事例' );
define( 'FILE_CATEGORY',    'product' );
define( 'THE_FILE_NAME',    FILE_CATEGORY . '_imgAddChange' );
define( 'FILE_SESSION_KEY', 'en_' . FILE_CATEGORY . 'Image' );
define( 'PAGE_NUM',         1 );

$query = new systemFileUpDB();
$query->_setTableName( SQL_TABLE_NAME );

$data      = $query->FileList( $_REQUEST['id'] );

if( !$_POST )unset( $_SESSION[FILE_CATEGORY] );

$maxWidth    = array( 1 => 960 );
$maxHeight   = array( 1 => 395 );
$maxImageCnt = 1;

$itemName  = $query->GetCulumnContents( 'en_product', 'name',     'id', $_REQUEST['id'], 1 );
$itemName  .= ' / ' . $query->GetCulumnContents( 'en_product', 'subName', 'id', $_REQUEST['id'], 1 );


if( $_REQUEST['imgId'] )
{
    $upDateImg  = $query->FileUpDate( $_REQUEST['imgId'] );
}


$dataCnt   = count( $data );
$maxCount  = ( is_array( $data ) ) ? $dataCnt : 0;


//登録
if( isset( $_POST['reg'] ) )
{
    if( !$_POST['imgId'] && !$_FILES[1]['name'] )
    {
        $errors[] = 'ファイルを登録してください。';
    }

    if( $_FILES[1]['error'] === 0 && !preg_match( '/(image\/x-png|image\/png|image\/jpeg|image\/pjpeg|image\/jpg|image\/gif)/', $_FILES[1]['type'] ) )
    {
        $errors[] = 'ファイルは画像ファイルしかアップできません。';
    }

    if( !$errors )
    {
        //仮ファイルをフォルダにアップ
        $fileFlg = fileTempUpload( $_FILES, '../temp/'/*$tempPath*/, '../../upImage/'/*$uploadPath*/, $maxWidth, $maxHeight, 200/*$smallWidth*/, 200/*$smallHeight*/ );

        //画像処理
        $_POST['fileName'][1] = $_SESSION[FILE_SESSION_KEY][1]['fileName'];
        $fileArray = fileUpload( $_POST, $upDateImg, $maxImageCnt, '../temp/', '../../upImage/' );

        $query->FileSave( $_POST, $fileArray );

        //unset( $_SESSION[FILE_SESSION_KEY] );

        tempFileClean( '../temp' );

        header( 'Location: ./' . THE_FILE_NAME . '.php?id=' . $_REQUEST['id'] . '&r=1' );
        die;
    }
}


//表示切り替え処理
if( isset( $_POST['disp'] ) )
{
    $query->FileDispChange( $_POST );

    header( 'Location: ./' . THE_FILE_NAME . '.php?id=' . $_REQUEST['id'] . '&r=3' );
    die;
}


//削除処理
if( isset( $_POST['del'] ) )
{
    $query->FileDelete( $_POST['imgId'] );
       if( $_POST['fileName'] )@unlink( '../../upImage/' . FILE_CATEGORY . '/' . $_POST['fileName'] );
    header( 'Location: ./' . THE_FILE_NAME . '.php?id=' . $_REQUEST['id'] . '&d=1' );
    die;
}


//ソート設定処理
if( is_array( $_POST['reNewId'] ) && $_GET['s'] == 1 )
{
	
    $dispChange = $query->FileSort( $_POST );
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


$smarty->display( THE_FILE_NAME . '.html' );
?>
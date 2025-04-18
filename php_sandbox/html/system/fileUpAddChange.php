<?php
require_once( '../inc/auth.php' );
require_once( './systemConsts.php' );
require_once( '../inc/lib/DB/.systemFileUpDB.class.php' );


define( 'SQL_TABLE_NAME',   'contents' );
define( 'PAGE_TITLE',       'ファイルアップ' );
define( 'FILE_CATEGORY',    'fileUp' );
define( 'THE_FILE_NAME',    FILE_CATEGORY . 'AddChange' );
define( 'FILE_SESSION_KEY', FILE_CATEGORY . 'Image' );
define( 'PAGE_NUM',         4 );

//DBインスタンス
$query       = new systemFileUpDB();
/*
if( $_POST['reg'] )
{
	echo '<pre>';
	echo '-------------';
    print_r($_POST);
    echo '-------------';
    print_r($_FILES);
    echo '</pre>';
    die;
}
*/
//$pageData  = systemContentsDB::Detail( $_REQUEST['id'], 0 );
$data      = $query->FileList( $_REQUEST['id'] );

if( !$_POST )unset( $_SESSION[FILE_CATEGORY] );

$maxWidth    = array( 1 => 960 );
$maxHeight   = array( 1 => 395 );
$maxImageCnt = 1;

$itemName  = $query->GetCulumnContents( SQL_TABLE_NAME, 'title',     'id', $_REQUEST['id'], 1 );

if( $_REQUEST['imgId'] )
{
    $upDateImg  = $query->FileUpDate( $_REQUEST['imgId'] );
}


$dataCnt   = count( $data );
$maxCount  = ( is_array( $data ) ) ? $dataCnt : 0;


//登録
if( isset( $_POST['reg'] ) )
{
    if( !$_POST['imgId'] && !$_FILES['userFile']['name'][0] )
    {
        $errors[] = 'ファイルを登録してください。';
    }
/*
    if( $_FILES[1]['error'] === 0 && !preg_match( '/(application\/pdf|application\/x-pdf)/', $_FILES[1]['type'] ) )
    {
        $errors[] = 'ファイルは『pdf』ファイルしかアップできません。';
    }
*/
    if( !$errors )
    {
        //仮ファイルをフォルダにアップ
        $fileFlg = fileTempUploadMultiple( $_FILES, './temp/'/*$tempPath*/, '../upImage/'/*$uploadPath*/, $maxWidth, $maxHeight, 200/*$smallWidth*/, 200/*$smallHeight*/, 'userFile', 1 );



        //画像処理
        foreach( $fileFlg AS $key => $value )
        {
            if( $fileFlg[$key] )
                $_POST['fileName'][$key] = $_SESSION[FILE_SESSION_KEY][$key]['fileName'];
            else
                $_POST['fileName'][$key] = '';
        }

	echo '<pre>';
	echo '-------------' . "\n";
    echo 'post' . "\n";
    print_r($_POST);
    echo '-------------' . "\n";
    echo 'fileFlg' . "\n";
    print_r($fileFlg);
    echo '-------------' . "\n";
    echo 'files' . "\n";
    print_r($_FILES);
    echo '</pre>';
    die;

        $fileArray = fileUpload( $_POST, $upDateImg, $maxImageCnt );

        $query->FileSave( $_POST, $fileArray );

        //unset( $_SESSION[FILE_SESSION_KEY] );

        tempFileClean();

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
       if( $_POST['fileName'] )@unlink( '../upImage/' . FILE_CATEGORY . '/' . $_POST['fileName'] );
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
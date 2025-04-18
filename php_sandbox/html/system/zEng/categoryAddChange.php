<?php
require_once( '../../inc/auth.php' );
require_once( '../systemConsts.php' );
require_once( '../../inc/lib/DB/.systemSaveDB.class.php' );
require_once( '../../inc/lib/DB/.systemEnCategoryDB.class.php' );


define( 'SQL_TABLE_NAME',  'en_product_category' );
define( 'PAGE_TITLE',      '英語サイト：製品カテゴリ' );
define( 'FILE_CATEGORY',   'category' );
define( 'THE_FILE_NAME',    FILE_CATEGORY . 'AddChange' );
define( 'FILE_SESSION_KEY', FILE_CATEGORY . 'Image' );
define( 'PAGE_NUM',         2 );
define( 'CHENGE_FLG',       1 );
define( 'SORT_FLG',         0 );

//DBインスタンス
$query       = new systemCategoryDB();
$systemquery = new systemDB();

$getLink  = createGetLink( array( 'mode', 'categoryId', 'compId', 'd', 't', 'r', 's', 'disp', 'spotlight', 'cp', 'dispFlg' ), $_GET );
$sortLink = createGetLink( array( 'mode', 'categoryId', 'compId', 'd', 't', 'r', 's', 'disp', 'cond', 'sort', 'spotlight', 'cp' ), $_GET );

$productCategoryArray = En_productCategoryArray( 1 );

$setCategory = array( '' );


if( $_GET['compId'] )
{
    $title = $query->GetCulumnContents( SQL_TABLE_NAME, 'name', 'categoryId', $_GET['compId'], 1 );
}


//並び替え処理
if( isset( $_GET['s'] ) && $_GET['s'] == 1 && is_array( $_POST['id'] ) )
{
    $query->categorySortSave( $_POST, $_GET );
    header( 'Location: ./' . THE_FILE_NAME . '.php' . $getLink['all'] . ( $getLink['all'] ? '&' : '?' ) . 'd=3' );
    die;
}


//削除処理
if( isset( $_POST['del_x'] ) )
{
    $delet = $query->DataDelete( SQL_TABLE_NAME, $_POST, array( 'title' => 'name', 'id' => 'categoryId' ) );
    if( $_POST['fileName'] )@unlink( '../upImage/' . FILE_CATEGORY . '/' . $_POST['fileName'] );
    header( 'Location: ./' . THE_FILE_NAME . '.php' . $getLink['all'] . ( $getLink['all'] ? '&' : '?' ) . 'd=1&t=' . $delet );
    die;
}


//表示設定処理
if( isset( $_POST['dispButton_x'] ) )
{
    $dispChange = $query->DispChange( SQL_TABLE_NAME, $_POST, array( 'dispFlg' => 'dispFlg', 'title' => 'name', 'id' => 'categoryId' ) );
    header( 'Location: ./' . THE_FILE_NAME . '.php' . $getLink['all'] . ( $getLink['all'] ? '&' : '?' ) . 'd=2&compId=' . $dispChange . '&dispFlg=' . $_POST['dispFlg'] );
    die;
}


$dataList      = $query->CategoryList( 0, 10000, $_GET );
$maxWidth      = array( 1 => 168 );
$maxHeight     = array( 1 => 111 );
$maxImageCnt   = 1;


/*
//FCK用文字列置換
if( isset( $_POST['comment'] ) && $_POST['comment'] )
{
    $_POST['comment']  = strReprace::FCK_QuotesReprace( $_POST['comment'], 1 );
    $confComment       = strReprace::FCK_QuotesReprace( $_POST['comment'], 1 );
    $hiddenValue       = strReprace::FCK_QuotesReprace( $_POST['comment'] );
}
*/

if( $_REQUEST['categoryId'] )
{
    $data              = $query->CategoryDetail( $_REQUEST['categoryId'] );
    if( !$_POST['submitConf'] && !$_POST['submitReg'] && !$_POST['submitReturn'] )$_POST = $data;
}
else
{
    $data['dispFlg']       = 1;
    $data['bigCategoryId'] = $_REQUEST['bigCategoryId'];
}


//確認用画像のカスがあった場合の削除
if( !$_POST ) unset( $_SESSION[FILE_SESSION_KEY] );

//フォーム作成
$categoryform = new HTML_QuickForm( 'category', 'get' );
$categoryform->addElement( 'select',       'bigCategoryId',     '大カテゴリ',    $productCategoryArray,  array( 'style' => 'max-width:300px;' ) );


//フォーム作成
$form = new HTML_QuickForm( 'item', 'post', THE_FILE_NAME . '.php' . $getLink['all'] );
$form->addElement( 'select',       'bigCategoryId',    '大カテゴリ',     $productCategoryArray, array( 'style' => 'max-width:300px;' ) );
$form->addElement( 'text',         'name',             'カテゴリ名',     array( 'size' => 60 ) );


//$form->addElement( 'text',         'itemNum',   '品番',                    array( 'size' => 40 ) );
//$form->addElement( 'textarea',     'explanat',  '説明文',                  array( 'style' => 'width:100%;height:100px;' ) );


$form->addElement( 'advcheckbox', 'dispFlg',   '公開する',  ' 公開する',  array( 0, 1 ) );
/*
//画像
for( $i = 1; $i <= $maxImageCnt; $i++ )
{
    $form->addElement( 'file', $i, '画像' );
    if( $data['image'][$i]['fileName'] || $_POST['fileName'][$i] )
        $form->addElement( 'advcheckbox', 'imageDel[' . $i . ']',  null,  '画像を削除する', array( 0, 1 ) );
}
*/
if( $_REQUEST['categoryId'] ) $form->addElement( 'hidden',  'categoryId',     $_REQUEST['categoryId'] );

$form->addElement( 'submit',    'submitConf',    '確認',     array( 'class' => 'submits' ) );
$form->addElement( 'submit',    'submitReg',     '更新',     array( 'class' => 'submits' ) );
$form->addElement( 'submit',    'submitReturn',  '戻る',     array( 'class' => 'submits' ) );

$form->applyFilter( '__ALL__', 'trim' );

//エラー処理
$form->addRule( 'name',           'カテゴリ名を入力してください。',     'required', null );
$form->addRule( 'bigCategoryId',  '大カテゴリを選択してください。',     'nonzero',  null );

for( $i = 1; $i <= $maxImageCnt; $i++ )
{
    $form->addRule( $i, '『jpg』『gif』『png』ファイルしかアップできません。', 'mimetype', array( 'image/x-png', 'image/png', 'image/jpeg', 'image/pjpeg', 'image/jpg', 'image/gif' ) );
}

//エラー追加処理
if( $_POST['submitReg'] )
{
}

$form->setRequiredNote( '<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;">の項目は必ず入力してください。</span>' );
$form->setJsWarnings( '*の項目は必ず入力してください。', "\n\n" . TITLE );

$form->setDefaults( $data );

if ( $form->validate() )
{
    //登録処理
    if( isset( $_POST['submitReg'] ) )
    {
        /*
        //画像処理
        $fileFlg = fileTempUpload( $_FILES, './temp/', '../upImage/', $maxWidth, $maxHeight, 200, 200 );

        foreach( (array)$_SESSION[FILE_SESSION_KEY] AS $key => $value )
            $_POST['fileName'][$key] = $value['fileName'];

        $fileArray = fileUpload( $_POST, $data, $maxImageCnt );
        */

        //DB登録修正処理
        $saveParam = array(
            'tableName'     => SQL_TABLE_NAME, 
            'data'          => $_POST, 
            'anData'        => array( 'submitConf', 'submitReg', 'submitReturn', 'reset', 'id', 'MAX_FILE_SIZE', 'imageDel', 'fileName'  ), 
            'connectionKey' => array(), 
            'timeKey'       => array(), 
            'dateKey'       => array(), 
            'dateTimeKey'   => array( /*'dateTime'*/ ), 
            'fileArray'     => $fileArray, 
            'fileAnData'    => array( 'imageDel', 'pictureOutsideFlg' ), 
            'lastFlg'       => 1, 
            'id'            => $_POST['categoryId'], 
            'idName'        => 'categoryId', 
            'limitFlg'      => 1, 
        );

        $save = new CreatQueryDB();
        $save->_setParam( $saveParam );
        $compId = $save->Save();

        unset( $_SESSION[FILE_SESSION_KEY] );

        tempFileClean( '../temp' );

        header( 'Location: ./' . THE_FILE_NAME . '.php?r=' . ( $_POST['id'] ? '2' : '1' ) . $getLink['addition'] . '&compId=' . $compId . '&bigCategoryId=' . $_POST['bigCategoryId'] );
        die;
    }
}

$smarty = new Smarty;

$renderer = new HTML_QuickForm_Renderer_ArraySmarty( $smarty );
$form->accept( $renderer );
$smarty->assign( 'form', $renderer->toArray() );

$categoryform->accept( $renderer );
$smarty->assign( 'categoryform', $renderer->toArray() );


$smarty->assign( 'data',          $data );
$smarty->assign( 'list',          $dataList );
$smarty->assign( 'title',         $title );
$smarty->assign( 'flg',           $flg );
$smarty->assign( 'hiddenValue',   $hiddenValue );
$smarty->assign( 'confComment',   $confComment );
$smarty->assign( 'fileFlg',       $fileFlg );
$smarty->assign( 'fileName',      $fileName );
$smarty->assign( 'image',         $data['image'] );
$smarty->assign( 'maxWidth',      $maxWidth );
$smarty->assign( 'maxHeight',     $maxHeight );
$smarty->assign( 'maxImageCnt',   $maxImageCnt );
$smarty->assign( 'getLink',       $getLink );
$smarty->assign( 'sortLink',      $sortLink );
$smarty->assign( 'bigCategory',   $contents_BigCategory );
$smarty->assign( 'prtJson',       $prtJson );


$smarty->display( THE_FILE_NAME . '.html' );
?>
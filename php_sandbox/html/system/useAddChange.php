<?php
require_once( '../inc/auth.php' );
require_once( './systemConsts.php' );
require_once( '../inc/lib/DB/.systemSaveDB.class.php' );
require_once( '../inc/lib/DB/.systemCategoryDB.class.php' );
require_once( '../inc/lib/DB/.systemDB.class.php' );

define( 'SQL_TABLE_NAME',  'matex_use' );
define( 'PAGE_TITLE',      '用途' );
define( 'FILE_CATEGORY',   'use' );
define( 'THE_FILE_NAME',    FILE_CATEGORY . 'AddChange' );
define( 'FILE_SESSION_KEY', FILE_CATEGORY . 'Image' );
define( 'PAGE_NUM',         2 );
define( 'CHENGE_FLG',       1 );
define( 'SORT_FLG',         0 );

//DBインスタンス
$query      = new systemCategoryDB();

$getLink  = createGetLink( array( 'mode', 'useId', 'd', 't', 'r', 'disp', 'spotlight', 'cp', 'dispFlg' ), $_GET );
$sortLink = createGetLink( array( 'mode', 'useId', 'd', 't', 'r', 'disp', 'cond', 'sort', 'spotlight', 'cp' ), $_GET );
if( $_GET['compId'] )
    $title = systemCategoryDB::GetCulumnContents( SQL_TABLE_NAME, 'name', 'useId', $_GET['compId'], 1 );

//並び替え処理
if( isset( $_GET['s'] ) && $_GET['s'] == 1 && is_array( $_POST['id'] ) )
{

    systemCategoryDB::UseSortSave( $_POST );
    header( 'Location: ./' . THE_FILE_NAME . '.php' . $getLink['all'] . ( $getLink['all'] ? '&' : '?' ) . 'd=3' );
    die;
}

//削除処理
if( isset( $_POST['del_x'] ) )
{
    $delet = systemCategoryDB::DataDelete( SQL_TABLE_NAME, $_POST, array( 'title' => 'name', 'id' => 'useId' ) );
    if( $_POST['fileName'] )@unlink( '../upImage/' . FILE_CATEGORY . '/' . $_POST['fileName'] );
    header( 'Location: ./' . THE_FILE_NAME . '.php' . $getLink['all'] . ( $getLink['all'] ? '&' : '?' ) . 'd=1&t=' . $delet );
    die;
}
//表示設定処理
if( isset( $_POST['dispButton_x'] ) )
{
    $dispChange = systemCategoryDB::DispChange( SQL_TABLE_NAME, $_POST, array( 'dispFlg' => 'dispFlg', 'title' => 'name', 'id' => 'useId' ) );
    header( 'Location: ./' . THE_FILE_NAME . '.php' . $getLink['all'] . ( $getLink['all'] ? '&' : '?' ) . 'd=2&t=' . $dispChange . '&dispFlg=' . $_POST['dispFlg'] );
    die;
}

$dataList      = $query->UseList( 0, 10000, $_GET );
$maxWidth      = array( 1 => 600 );
$maxHeight     = array( 1 => 422 );
$maxImageCnt   = 1;
//$partArray     = systemDB::GetPart( 1 );

//FCK用文字列置換
if( isset( $_POST['comment'] ) && $_POST['comment'] )
{
    $_POST['comment']  = strReprace::FCK_QuotesReprace( $_POST['comment'], 1 );
    $confComment       = strReprace::FCK_QuotesReprace( $_POST['comment'], 1 );
    $hiddenValue       = strReprace::FCK_QuotesReprace( $_POST['comment'] );
}


if( $_REQUEST['useId'] )
{
    $data              = systemCategoryDB::UseDetail( $_REQUEST['useId'] );
    if( !$_POST['submitConf'] && !$_POST['submitReg'] && !$_POST['submitReturn'] )$_POST = $data;
}
else
    $data['dispFlg']       = 1;



//確認用画像のカスがあった場合の削除
if( !$_POST ) unset( $_SESSION[FILE_SESSION_KEY] );


//フォーム作成
$form = new HTML_QuickForm( 'item', 'post' );

$form->addElement( 'text',        'name',      '用途名',                  array( 'size' => 60 ) );

foreach( (array)$partArray AS $key => $value )
    $partGroup[] = $form->createElement( 'advcheckbox', $key, null, $value, array( 0, 1 ) );
$form->addGroup( $partGroup, 'part', '部位', array( '</p><p style="width:33%;">' ) );

$form->addElement( 'advcheckbox', 'dispFlg',   '公開する',  ' 公開する',  array( 0, 1 ) );

//画像
for( $i = 1; $i <= $maxImageCnt; $i++ )
{
    $form->addElement( 'file', $i, '画像' );
    if( $data['image'][$i]['fileName'] || $_POST['fileName'][$i] )
        $form->addElement( 'advcheckbox', 'imageDel[' . $i . ']',  null,  '画像を削除する', array( 0, 1 ) );
}

if( $_REQUEST['useId'] ) $form->addElement( 'hidden',  'useId',     $_REQUEST['useId'] );

$form->addElement( 'submit',    'submitConf',    '確認',     array( 'class' => 'submits') );
$form->addElement( 'submit',    'submitReg',     '更新',     array( 'class' => 'submits') );
$form->addElement( 'submit',    'submitReturn',  '戻る',     array( 'class' => 'submits') );

$form->applyFilter( '__ALL__', 'trim' );

//エラー処理
$form->addRule( 'name',    '●用途名を入力してください。',           'required', null );

for( $i = 1; $i <= $maxImageCnt; $i++ )
{
    $form->addRule( $i, '●『jpg』『gif』『png』ファイルしかアップできません。', 'mimetype', array( 'image/x-png', 'image/png', 'image/jpeg', 'image/pjpeg', 'image/jpg', 'image/gif' ) );
}

//エラー追加処理
if( $_POST['submitReg'] )
{
    //if( !array_sum( $_POST['part'] ) )
    //   $form->_errors['part'] = '●部位を一つ以上選択してください。';
}

$form->setRequiredNote( '<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;">の項目は必ず入力してください。</span>' );
$form->setJsWarnings( '*の項目は必ず入力してください。', "\n\n" . TITLE );

$form->setDefaults( $data );

if ( $form->validate() )
{
    //登録処理
    if( isset( $_POST['submitReg'] ) )
    {
        //画像処理
        $fileFlg = fileTempUpload( $_FILES, './temp/', '../upImage/', $maxWidth, $maxHeight, 200, 200 );

        foreach( $_SESSION[FILE_SESSION_KEY] AS $key => $value )
            $_POST['fileName'][$key] = $value['fileName'];

        $_POST['dateTime'] = date( 'Y-m-d H:i:s' );

        $fileArray = fileUpload( $_POST, $data, $maxImageCnt );

        //DB登録修正処理
        $compId = systemSaveDB::Save( SQL_TABLE_NAME,        //$tableName
                            $_POST,                //$data
                            array( 'submitConf', 'submitReg', 'submitReturn', 'reset', 'useId', 'MAX_FILE_SIZE', 'imageDel', 'addItem', 'fileName', 'addContents' ), //$anData
                            array( 'part' ),               //$connectionKey
                            array(),               //$timeKey
                            array(),               //$dateKey
                            array(),               //$dateTimeKey
                            array( 'fileName', 'width', 'height' ), //$anotherKey
                            $_POST['useId'],      //$id
                            null,                  //$fileTable
                            $fileArray,            //$fileArray
                            array( 'imageDel' ),   //$fileAnData
                            1,                     //$lastFlg
                            'useId',              //$idName
                            '',                    //$addTable
                            array(),               //$addArray
                            null                   //$addAnData
                          );

        unset( $_SESSION[FILE_SESSION_KEY] );

        tempFileClean();

        header( 'Location: ./' . THE_FILE_NAME . '.php?r=' . ( $_POST['useId'] ? '2' : '1' ) . '&compId=' . $compId );
        die;
    }
}

$smarty = new Smarty;

$renderer = new HTML_QuickForm_Renderer_ArraySmarty( $smarty );
$form->accept( $renderer );
$smarty->assign( 'form', $renderer->toArray() );

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


$smarty->display( THE_FILE_NAME . '.html' );
?>
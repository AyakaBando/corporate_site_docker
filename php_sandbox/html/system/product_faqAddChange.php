<?php
require_once( '../inc/auth.php' );
require_once( '../inc/lib/DB/.systemSaveDB.class.php' );
require_once( '../inc/lib/DB/.systemProductFaqDB.class.php' );
require_once( './systemConsts.php' );

define( 'SQL_TABLE_NAME',    'product_faq' );
define( 'PAGE_TITLE',        '製品FAQ' );
define( 'FILE_CATEGORY',     'product' );
define( 'SUB_FILE_CATEGORY', '_faq' );
define( 'IMG_FILE_CATEGORY', 'productFaq' );
define( 'THE_FILE_NAME',     FILE_CATEGORY . SUB_FILE_CATEGORY . 'AddChange' );
define( 'FILE_SESSION_KEY',  FILE_CATEGORY . 'pdf' );
define( 'IMG_SESSION_KEY',   FILE_CATEGORY . 'img' );
define( 'PAGE_NUM',          4 );
define( 'SUB_PAGE_NUM',      2 );
define( 'SUB_CATEGORY_FLG',  1 );

if( !$_POST )unset( $_SESSION[FILE_SESSION_KEY], $_SESSION[IMG_SESSION_KEY] );
$maxWidth     = array( 1 => 400 );
$maxHeight    = array( 1 => 300 );
$maxImageCnt  = 0;

//DBインスタンス
$query       = new systemProductFaqDB();
$systemquery = new systemDB();

$itemName   = $query->GetCulumnContents( 'product', 'name', 'id', $_REQUEST['id'], 1 );
$itemName  .= ' / ' . $query->GetCulumnContents( 'product', 'subName', 'id', $_REQUEST['id'], 1 );


//FCK用設定
if( isset( $_POST['comment'] ) )
{
    $_POST['comment']   = htmlspecialchars_decode( str_replace( array( '\"', "\'" ), array( '"', "'" ), $_POST['comment'] ) );
    $confContents       = htmlspecialchars_decode( str_replace( array( '\"', "\'" ), array( '"', "'" ), $_POST['comment'] ) );
    $hiddenValue        = htmlspecialchars( $_POST['comment'] );
}


if( !$_REQUEST['faqId'] )
{
    $data['dateTime']['Y']    = date('Y');
    $data['dateTime']['m']    = date('m');
    $data['dateTime']['d']    = date('d');
    $data['dateTime']['H']    = date('H');
    $data['dateTime']['i']    = date('i');
    $data['dispFlg']          = 1;
}
else
    $data = $query->Detail( $_REQUEST['faqId'] );


$categoryArray = $systemquery->GetFAQCategory( $_REQUEST['id'], 1, 1 );

//フォーム作成
$form = new HTML_QuickForm( 'item', 'post' );

$form->addElement( 'date',        'dateTime',      '日時',                dateOptionsArray() );
$form->addElement( 'select',      'category',      'カテゴリ',            $categoryArray );
$form->addElement( 'text',        'title',         'タイトル',            array( 'style' => 'width:100%;' ) );
//$form->addElement( 'text',        'url',           'URL',                 array( 'size' => 80 ) );
$form->addElement( 'textarea',    'comment',       '内容',                array( 'id' => 'comment', 'class' => '', 'style' => 'width:100%;height:120px;' ) );
$form->addElement( 'advcheckbox', 'dispFlg',       '公開',  '公開',       array( 0, 1 ) );

/*
//画像
for( $i = 1; $i <= $maxImageCnt; $i++ )
{
    $form->addElement( 'file', $i, '画像' );
    if( $data['image'][$i]['fileName'] || $_POST['fileName'][$i] )
        $form->addElement( 'advcheckbox', 'imageDel[' . $i . ']',  null,  '画像を削除する', array( 0, 1 ) );
}
*/

if( $_REQUEST['id'] )    $form->addElement( 'hidden',      'id',       $_REQUEST['id'] );
if( $_REQUEST['faqId'] ) $form->addElement( 'hidden',      'faqId',    $_REQUEST['faqId'] );

$form->addElement( 'submit',    'submitConf',      '確認',             array( 'class' => 'submits' ) );
$form->addElement( 'submit',    'submitReg',       '登録',             array( 'class' => 'submits' ) );
$form->addElement( 'submit',    'submitReturn',    '戻る',             array( 'class' => 'submits' ) );

$form->applyFilter( '__ALL__', 'trim');

//エラー処理
$form->addRule( 'title',             'タイトルを入力してください',     'required', null );
$form->addRule( 'category',          'カテゴリを選択してください',     'nonzero',  null );
$form->addRule( 'comment',           '内容を入力してください',         'required', null );
/*
for( $i = 1; $i <= $maxImageCnt; $i++ )
{
    $form->addRule( $i, '★『jpg』『gif』『png』ファイルしかアップできません。', 'mimetype', array( 'image/x-png', 'image/png', 'image/jpeg', 'image/pjpeg', 'image/jpg', 'image/gif' ) );
}
*/



//エラー追加処理
if( $_POST['submitConf'] )
{
}

$form->setRequiredNote( '<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;">の項目は必ず入力してください。</span>' );
$form->setJsWarnings( '*の項目は必ず入力してください。', "\n\n" . TITLE );


$form->setDefaults( $data );

if ( $form->validate() )
{
    //確認
    if( isset( $_POST['submitConf'] ) )
    {
        $form->freeze();

        $flg++;
    }

    //登録処理
    if( isset( $_POST['submitReg'] ) )
    {
        //DB登録修正処理
        $saveParam = array(
            'tableName'     => SQL_TABLE_NAME, 
            'data'          => $_POST, 
            'anData'        => array( 'submitConf', 'submitReg', 'submitReturn', 'reset', 'faqId', 'MAX_FILE_SIZE', 'imageDel', 'fileName' ), 
            'connectionKey' => array(), 
            'timeKey'       => array(), 
            'dateKey'       => array(), 
            'dateTimeKey'   => array( 'dateTime' ), 
            'fileArray'     => array(), 
            'fileAnData'    => array(), 
            'lastFlg'       => 1, 
            'id'            => $_POST['faqId'], 
            'idName'        => 'faqId', 
            'limitFlg'      => 1, 
        );

        $save = new CreatQueryDB();
        $save->_setParam( $saveParam );
        $compId = $save->Save();

        unset( $_SESSION[FILE_SESSION_KEY], $_SESSION[IMG_SESSION_KEY] );

        $flg = 2;

        header( "Location: ./" . FILE_CATEGORY . "_faqList.php?r=1&id=" . $_POST['id'] );
        exit;
    }

}

$smarty = new Smarty;

$renderer = new HTML_QuickForm_Renderer_ArraySmarty( $smarty );
$form->accept( $renderer );
$smarty->assign( 'form', $renderer->toArray() );

$smarty->assign( 'flg',                    $flg );
$smarty->assign( 'pdfFlg',                 $pdfFlg );
$smarty->assign( 'confContents',           $confContents );
$smarty->assign( 'hiddenValue',            $hiddenValue );
$smarty->assign( 'data',                   $data );
$smarty->assign( 'whatsNewCategoryArray',  $whatsNewCategoryArray );
$smarty->assign( 'maxWidth',               $maxWidth );
$smarty->assign( 'maxHeight',              $maxHeight );
$smarty->assign( 'maxImageCnt',            $maxImageCnt );
$smarty->assign( 'itemName',               $itemName );

$smarty->display( THE_FILE_NAME . '.html' );
?>
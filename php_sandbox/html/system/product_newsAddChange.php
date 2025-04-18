<?php
require_once( '../inc/auth.php' );
require_once( '../inc/lib/DB/.systemProductNewsDB.class.php' );
require_once( './systemConsts.php' );

define( 'SQL_TABLE_NAME',    'product_news' );
define( 'PAGE_TITLE',        '製品 ニュース&リリース' );
define( 'FILE_CATEGORY',     'product' );
define( 'SUB_FILE_CATEGORY', '_news' );
define( 'IMG_FILE_CATEGORY', 'productNews' );
define( 'THE_FILE_NAME',     FILE_CATEGORY . SUB_FILE_CATEGORY . 'AddChange' );
define( 'FILE_SESSION_KEY',  FILE_CATEGORY . 'pdf' );
define( 'IMG_SESSION_KEY',   FILE_CATEGORY . 'img' );
define( 'PAGE_NUM',          5 );
define( 'SUB_PAGE_NUM',      2 );
define( 'SUB_CATEGORY_FLG',  null );

if( !$_POST )unset( $_SESSION[FILE_SESSION_KEY], $_SESSION[IMG_SESSION_KEY] );
$maxWidth     = array( 1 => 400 );
$maxHeight    = array( 1 => 300 );
$maxImageCnt  = 1;

//DBインスタンス
$query       = new systemProductNewsDB();

$itemName   = $query->GetCulumnContents( 'product', 'name', 'id', $_REQUEST['id'], 1 );
$itemName  .= ' / ' . $query->GetCulumnContents( 'product', 'subName', 'id', $_REQUEST['id'], 1 );


//FCK用設定
if( isset( $_POST['comment'] ) )
{
    $_POST['comment']   = htmlspecialchars_decode( str_replace( array( '\"', "\'" ), array( '"', "'" ), $_POST['comment'] ) );
    $confContents       = htmlspecialchars_decode( str_replace( array( '\"', "\'" ), array( '"', "'" ), $_POST['comment'] ) );
    $hiddenValue        = htmlspecialchars( $_POST['comment'] );
}


if( !$_REQUEST['newsId'] )
{
    $data['dateTime']['Y']    = date('Y');
    $data['dateTime']['m']    = date('m');
    $data['dateTime']['d']    = date('d');
    $data['dateTime']['H']    = date('H');
    $data['dateTime']['i']    = date('i');
    $data['contentsCategory'] = 1;
    $data['dispFlg']          = 1;
}
else
    $data = $query->Detail( $_REQUEST['newsId'] );


$productNewsContentsCategory = productNewsContentsCategory();
$productNewsType             = productNewsType();
//$whatsNewContentsCategory = whatsNewContentsCategory();

//フォーム作成
$form = new HTML_QuickForm( 'item', 'post' );

$form->addElement( 'date',        'dateTime',     '日時',                dateOptionsArray() );

foreach( (array)$productNewsContentsCategory AS $key => $value )
    $contentsCategoryGroup[] = $form->createElement( 'radio', null, null, $value, $key, array( 'onclick' => 'categoryView(' . $key . ')' ) );
$form->addGroup( $contentsCategoryGroup, 'contentsCategory', 'コンテンツカテゴリ', array( "&nbsp;&nbsp;&nbsp;\n" ) );

foreach( (array)$productNewsType AS $key => $value )
    $newsTypeGroup[] = $form->createElement( 'radio', null, null, $value, $key, array() );
$form->addGroup( $newsTypeGroup, 'type', 'コンテンツカテゴリ', array( "&nbsp;&nbsp;&nbsp;\n" ) );

//$form->addElement( 'select',      'category',      'カテゴリ',           $productNewsType );
//$form->addElement( 'select',      'subCategory',   'サブカテゴリ',       $whatsNewSubCategory );
//$form->addElement( 'advcheckbox', 'productFlg',    'お知らせ',  'お知らせ',      array( 0, 1 ) );

$form->addElement( 'text',      'title',         'タイトル',                 array( 'style' => 'width:100%;' ) );
$form->addElement( 'text',      'url',           'URL',                  array( 'size' => 80 ) );

//画像
$form->addElement( 'file',        'userfile',    'PDF' );
if( $data['pdfFileName'] || $_POST['pdfFileName'] )
    $form->addElement( 'advcheckbox', 'pdfDel',  null,  'PDFを削除する', array( 0, 1 ) );


$form->addElement( 'textarea',    'comment',       '内容',               array( 'id' => 'comment', 'class' => '', 'style' => 'width:100%;height:120px;' ) );
$form->addElement( 'advcheckbox', 'dispFlg',       '公開',  '公開',      array( 0, 1 ) );

//画像
for( $i = 1; $i <= $maxImageCnt; $i++ )
{
    $form->addElement( 'file', $i, '画像' );
    if( $data['image'][$i]['fileName'] || $_POST['fileName'][$i] )
        $form->addElement( 'advcheckbox', 'imageDel[' . $i . ']',  null,  '画像を削除する', array( 0, 1 ) );
}

if( $_REQUEST['id'] )     $form->addElement( 'hidden',      'id',          $_REQUEST['id'] );
if( $_REQUEST['newsId'] ) $form->addElement( 'hidden',      'newsId',      $_REQUEST['newsId'] );

$form->addElement( 'submit',    'submitConf',      '確認',             array( 'class' => 'submits' ) );
$form->addElement( 'submit',    'submitReg',       '登録',             array( 'class' => 'submits' ) );
$form->addElement( 'submit',    'submitReturn',    '戻る',             array( 'class' => 'submits' ) );

$form->applyFilter( '__ALL__', 'trim');

//エラー処理
$form->addRule( 'title',             'タイトルを入力してください', 'required', null );
$form->addRule( 'contentsCategory',  '記事タイプを選択してください', 'required', null );
$form->addRule( 'userfile',          '『pdf』ファイルしかアップできません。', 'mimetype', array( 'application/pdf', 'application/x-pdf' ) );
for( $i = 1; $i <= $maxImageCnt; $i++ )
{
    $form->addRule( $i, '★『jpg』『gif』『png』ファイルしかアップできません。', 'mimetype', array( 'image/x-png', 'image/png', 'image/jpeg', 'image/pjpeg', 'image/jpg', 'image/gif' ) );
}

switch( $_POST['contentsCategory'] )
{
    case 1://タイトルのみ
        
        break;
    case 2:
        if( !$_SESSION[FILE_SESSION_KEY]['fileName'] && !$data['pdfFileName'] )
            $form->addRule( 'userfile',  'PDFファイルを選択してください。',  'uploadedfile' );
        break;
    case 3:
        $form->addRule( 'url',       'リンク先URLを入力してください',    'required', null );
        break;
    case 4:
        $form->addRule( 'comment',   '内容を入力してください',           'required', null );
        break;
}


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

        //仮ファイルをフォルダにアップ
        foreach( $_FILES AS $key => $value )
        {
            $microTimeArray = explode( ' ', microtime() );
            $unique = time() . '_' . str_replace( '.', '', $microTimeArray[0] );

            //PDFファイル
            if( $_FILES[$key]['error'] === 0 && $key == 'userfile' )
            {
                $_SESSION[FILE_SESSION_KEY]['fileName'] = 'pdf_' . time() . '.pdf';
                $fp = fopen( './temp/' . $_SESSION[FILE_SESSION_KEY]['fileName'], 'w+' );
                fputs( $fp, file_get_contents( $_FILES[$key]['tmp_name'] ) );
                fclose( $fp );

                $pdfFlg++;
            }

            if( $_FILES[$key]['error'] === 0 && $key >= 1 && $key <= $maxImageCnt )
            {
                @list( $width, $height ) = getimagesize( $_FILES[$key]['tmp_name'] );
                if( $width > $maxWidth[$key] || $height > $maxHeight[$key] )
                {
                    $file = imageResize( $maxWidth[$key], $width, $maxHeight[$key], $height, 100, $_FILES[$key] );
                    $matches[0] = '.jpg';
                }
                else
                {
                    $file = file_get_contents( $_FILES[$key]['tmp_name'] );
                    @preg_match( '/\.[a-z]+$/i', $_FILES[$key]['name'], $matches );
                }

                $_SESSION[IMG_SESSION_KEY][$key]['fileName'] = $unique . $matches[0];
                $fp = fopen( './temp/'. $_SESSION[IMG_SESSION_KEY][$key]['fileName'], 'w+' );
                fputs( $fp, $file );
                fclose( $fp );
                @list( $reWidth, $reHeightheight ) = getimagesize( './temp/' . $_SESSION[IMG_SESSION_KEY][$key]['fileName'] );
                $_SESSION[IMG_SESSION_KEY][$key]['img'] = resize( 200, $reWidth, 200, $reHeightheight );
            }
            $fileFlg[$key]++;
        }

        $flg++;
    }

    //登録処理
    if( isset( $_POST['submitReg'] ) )
    {
        //PDF削除
        if( $data['pdfFileName'] && $_POST['pdfFileName'] && ( $_POST['pdfDel'] || $data['pdfFileName'] != $_POST['pdfFileName'] ) )
        {
            @unlink( '../upImage/' . FILE_CATEGORY . '/' . $data['pdfFileName'] );
        }
        //PDFアップ処理
        if( $_POST['pdfFileName'] && !$_POST['pdfDel'] )
        {
            @copy( './temp/' . $_POST['pdfFileName'], '../upImage/' . FILE_CATEGORY . '/' . $_POST['pdfFileName'] );
        }

        for( $i = 1; $i <= $maxImageCnt; $i++ )
        {
            if( $_POST['fileName'][$i] )@list( $_POST['width'][$i], $_POST['height'][$i] ) = getimagesize( './temp/' . $_POST['fileName'][$i] );
            //画像削除
            if( $data['img'][$i]['fileName'] && ( $_POST['imageDel'][$i] || $data['img'][$i]['fileName'] != $_POST['fileName'][$i] ) )
                @unlink( '../upImage/' . FILE_CATEGORY . '/' . $data['img'][$i]['fileName'] );

            //画像アップ処理
            if( $_POST['fileName'][$i] && !$_POST['imageDel'][$i] && $_SESSION[IMG_SESSION_KEY][$i] )
                @copy( './temp/' . $_POST['fileName'][$i], '../upImage/' . FILE_CATEGORY . '/' . $_POST['fileName'][$i] );
        }

        $query->DataSave( $_POST );
        unset( $_SESSION[FILE_SESSION_KEY], $_SESSION[IMG_SESSION_KEY] );

        $flg = 2;

        //添付フォルダ内画像削除処理
        $resDir = opendir( './temp' );
        while( false !== $DelFileName = readdir( $resDir ) )
            if( $DelFileName != '..' && $DelFileName != '.' && filemtime( './temp/' . $DelFileName ) <= FILE_DELET_LIMIT_STUMP )
                @unlink( "./temp/$DelFileName" );
        closedir( $resDir );

        header( "Location: ./" . FILE_CATEGORY . "List.php?r=1&id=" . $_POST['id'] );
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
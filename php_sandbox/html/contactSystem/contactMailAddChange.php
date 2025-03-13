<?php
require_once( dirname(__FILE__) . '/../inc/auth.php' );
require_once( dirname(__FILE__) . '/./systemConsts.php' );
require_once( dirname(__FILE__) . '/../inc/lib/DB/.systemSaveDB.class.php' );
require_once( dirname(__FILE__) . '/../inc/lib/DB/contact/.systemContactDB.class.php' );
require_once( dirname(__FILE__) . '/../inc/Mail.php' );
require_once( dirname(__FILE__) . '/../inc/Mail/mime.php' );


define( 'SQL_TABLE_NAME',   'contactMail' );
define( 'PAGE_TITLE',       'MAIL' );
define( 'FILE_CATEGORY',    'contactMail' );
define( 'THE_FILE_NAME',    FILE_CATEGORY . 'AddChange' );
define( 'FILE_SESSION_KEY', FILE_CATEGORY . 'Image' );
define( 'PAGE_NUM',         2 );

define( 'SORT_FLG',         1 );
define( 'EDITOR_NAME',      'comment' );
//DBインスタンス
$query                 = new systemContactDB();

$maxWidth     = array( 1 => 10000, 2 => 10000, 3 => 10000 );
$maxHeight    = array( 1 => 10000, 2 => 10000, 3 => 10000 );
$imageTitle   = array( 1 => '添付ファイル1', 2 => '添付ファイル2', 3 => '添付ファイル3' );
$maxImageCnt  = 3;
$commentCnt   = 0;




//FCK用文字列置換
for( $i = 1; $i <= $commentCnt; $i++ )
{
    if( isset( $_POST['comment' . $i] ) )
    {
        $_POST['comment' . $i] = strReprace::FCK_QuotesReprace( $_POST['comment' . $i], 1 );
        $confComment[$i]       = strReprace::FCK_QuotesReprace( $_POST['comment' . $i], 1 );
        $hiddenValue[$i]       = strReprace::FCK_QuotesReprace( $_POST['comment' . $i] );
    }
}

if( $_REQUEST['id'] )
{
    $searchArry['id']      = $_REQUEST['id'];
    $treeData              = $query->DataList( 0, 1, $searchArry );
}

if( !$_REQUEST['childId'] )
{
    $data['eMail']                  = $treeData[0]['month'];
    $data['receptionDateTime']['Y'] = date( 'Y' );
    $data['receptionDateTime']['m'] = date( 'm' );
    $data['receptionDateTime']['d'] = date( 'd' );
    $data['receptionDateTime']['H'] = date( 'H' );
    $data['receptionDateTime']['i'] = date( 'i' );
}
else
    $data = $query->ChildDetail( $_REQUEST['childId'] );


for( $i = 1; $i <= $commentCnt; $i++ )
    unset( $_SESSION[EDITOR_NAME . $i] );
unset( $_SESSION['uniqCss'] );
//確認用画像のカスがあった場合の削除
if( !$_POST ) unset( $_SESSION[FILE_SESSION_KEY] );

//print_r($data);


//フォーム作成
$form = new HTML_QuickForm( 'item', 'post' );

$statusArray[''] = '';

$form->addElement( 'date',        'receptionDateTime', '受付日時',          dateOptionsArray( 2015, 1, false ) );
$form->addElement( 'text',        'chargePerson',      '担当者',            array( 'style' => 'width:20%;' ) );
$form->addElement( 'select',      'status',            'ステータス',        $statusArray, array() );
$form->addElement( 'text',        'eMail',             'あて先',            array( 'style' => 'width:100%;'/*, 'readonly' => 'readonly'*/ ) );
$form->addElement( 'text',        'cc',                'CC',                array( 'style' => 'width:100%;' ) );
$form->addElement( 'text',        'bcc',               'BCC',               array( 'style' => 'width:100%;' ) );
$form->addElement( 'text',        'from',              '差出人名',          array( 'style' => 'width:100%;' ) );
$form->addElement( 'select',      'importance',        '重要度',            $importantArray, array() );
$form->addElement( 'text',        'subject',           '件名',              array( 'style' => 'width:80%;' ) );
$form->addElement( 'textarea',    'comment',           '返信内容',          array( 'id' => 'comment5', 'class' => '', 'style' => 'width:100%;height:320px;' ) );
$form->addElement( 'textarea',    'signature',         '署名',              array( 'id' => 'comment5', 'class' => '', 'style' => 'width:100%;height:120px;' ) );
$form->addElement( 'textarea',    'memo',              'メモ',              array( 'id' => 'comment5', 'class' => '', 'style' => 'width:100%;height:320px;' ) );


//画像
for( $i = 1; $i <= $maxImageCnt; $i++ )
{
    $form->addElement( 'file', $i, '画像' );
    //if( ( $data['image'][$i]['fileName'] || $_POST['fileName'][$i] ) )
    if( $_POST['fileName'][$i] )
        $form->addElement( 'advcheckbox', 'imageDel[' . $i . ']',  null,  'ファイルを削除する', array( 0, 1 ) );
}



if( $_REQUEST['id'] )       $form->addElement( 'hidden',  'id',          $_REQUEST['id'] );
if( $_REQUEST['boxId'] )    $form->addElement( 'hidden',  'boxId',       $_REQUEST['boxId'] );
if( $_REQUEST['folderId'] ) $form->addElement( 'hidden',  'folderId',    $_REQUEST['folderId'] );
if( $_REQUEST['childId'] )  $form->addElement( 'hidden',  'childId',     $_REQUEST['childId'] );
if( $_REQUEST['sendFlg'] )  $form->addElement( 'hidden',  'sendFlg',     $_REQUEST['sendFlg'] );


$form->addElement( 'submit',    'submitConf',    '確認',     array( 'class'   => 'submits' ) );
$form->addElement( 'submit',    'submitReg',     '送信',     array( 'class'   => 'submits' ) );
$form->addElement( 'submit',    'submitReturn',  '戻る',     array( 'class'   => 'submits' ) );
if( !$_REQUEST['id'] )
    $form->addElement( 'reset',     'reset',         'リセット', array( 'class' => 'submits' ) );

$form->applyFilter( '__ALL__', 'trim' );

//エラー処理

$form->addRule( 'chargePerson',    '担当者を入力してください。',        'required', null );
$form->addRule( 'status',          'ステータスを選択してください。',    'required', null );
$form->addRule( 'comment',         '返信内容を入力してください。',      'required', null );
$form->addRule( 'from',            '差出人名を入力してください。',      'required', null );
$form->addRule( 'subject',         '件名を入力してください。',          'required', null );

/*
$form->addRule( 'shopNum',          '店舗コードを入力してください。',        'required', null );
$form->addRule( 'subject',          '店舗コードは半角数字4文字までです。',   'regex', '/^\d{4}$/' );
$form->addRule( 'zip',              '郵便番号の入力形式が違います。',        'regex', '/^\d{3}-?\d{4}$/' );
$form->addRule( 'pref',             '都道府県を選択てください。',            'nonzero', null );
$form->addRule( 'banti',            '町名番地を入力してください。',          'required', null );
$form->addRule( 'tel',              '電話番号を入力してください。',          'required', null );
$form->addRule( 'tel',              '電話番号の入力形式が違います。',        'regex', '/^\d+(-?\d+)*$/' );
*/
for( $i = 1; $i <= $maxImageCnt; $i++ )
{
    //if( $i == 1 )
    //    $form->addRule( $i, '『jpg』『gif』『png』ファイルしかアップできません。', 'mimetype', array( 'image/x-png', 'image/png', 'image/jpeg', 'image/pjpeg', 'image/jpg', 'image/gif' ) );
    //if( $i == 2 )
    //    $form->addRule( $i, '『pdf』ファイルしかアップできません。', 'mimetype', array( 'application/pdf', 'application/x-pdf' ) );
}

//仮ファイルをフォルダにアップ
$fileFlg = fileTempUpload( $_FILES, './temp/'/*$tempPath*/, '../upImage/'/*$uploadPath*/, $maxWidth, $maxHeight, 200/*$smallWidth*/, 200/*$smallHeight*/ );
for( $i = 1; $i <= $maxImageCnt; $i++ )
{
    if( $_FILES[$i]['error'] === 0 )
        $_SESSION[FILE_SESSION_KEY][$i]['baseName'] = $_FILES[$i]['name'];
}

//エラー追加処理
if( $_POST['submitConf'] )
{
    //if( !$_REQUEST['id'] && !$_SESSION[FILE_SESSION_KEY][2] )
    //    $form->_errors['2'] = 'PDFは必須です。';
    //else if( $_REQUEST['id'] && !$data['image'][2]['fileName'] && !$_SESSION[FILE_SESSION_KEY][2] )
    //    $form->_errors['2'] = 'PDFは必須です。';
    //if( $_POST['laundry'] && !$_POST['k_openTime'] )
    //    $form->_errors['k_openTime'] = 'クリーニング営業時間(平日)を入力してください。';

    //if( !$_POST['id'] && $_POST['shopNum'] && $query->_setQuery( 'getOne', " SELECT `shopNum` FROM `shop` WHERE `shopNum` LIKE ? ", array( $_POST['shopNum'] ) ) )
    //    $form->_errors['shopNum'] = '入力された店舗コードは登録されています。';

    //if( $_POST['id'] && $_POST['shopNum'] && $query->_setQuery( 'getOne', " SELECT `shopNum` FROM `shop` WHERE `shopNum` LIKE ? AND `id` <> ? LIMIT 1", array( $_POST['shopNum'], $_POST['id'] ) ) )
    //    $form->_errors['shopNum'] = '入力された店舗コードは登録されています。';
}


$form->setRequiredNote( '<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;">の項目は必ず入力してください。</span>' );
$form->setJsWarnings( '*の項目は必ず入力してください。', "\n\n" . TITLE );

$form->setDefaults( $data );

if( $data['id'] )
{
    $form->freeze();
    $flg++;
}
if ( $form->validate() )
{
    //確認
    if( isset( $_POST['submitConf'] ) )
    {
        $form->freeze();

        for( $i = 1; $i <= $commentCnt; $i++ )
            $_SESSION[EDITOR_NAME . $i] = $_POST[EDITOR_NAME . $i];

        //エディター確認用CSS設定
        //$_SESSION['uniqCss'] = '/lines/tourist/css/uniq.css';
        $flg++;
    }

    //登録処理
    if( isset( $_POST['submitReg'] ) )
    {
        $adminBody    = 'サイトよりお問い合せがありました。'                                      . "\n";
        $adminBody   .= 'お問合せ内容は以下の通りです。'                                          . "\n\n";

        $text      = $_POST['comment']            . "\n\n";

        $userBody .= '======================================'                . "\n";
        $userBody .= '森田アルミ工業株式会社'                                . "\n";
        $userBody .= '本社'                                                  . "\n";
        $userBody .= '〒599-0201'                                            . "\n";
        $userBody .= '大阪府阪南市尾崎町530-1'                               . "\n";
        $userBody .= 'TEL : 072-480-1400'                                    . "\n";
        $userBody .= 'URL : 072-480-1414'                                    . "\n";
        $userBody .= '======================================'                . "\n";

        //件名
        $subject      = "お問い合せありがとうございます";

        //$original = mb_internal_encoding();

        //$subject  = mb_convert_encoding( $subject, "ISO-2022-JP", "UTF8" );
        //mb_internal_encoding( "ISO-2022-JP" );
        //$subject  = mb_encode_mimeheader( $subject, "ISO-2022-JP" );
mb_internal_encoding( "UTF8" );
        //$adminSubject  = mb_convert_encoding( $adminSubject, "ISO-2022-JP", "UTF8" );
        //mb_internal_encoding( "ISO-2022-JP" );
        //$adminSubject  = mb_encode_mimeheader( $adminSubject, "ISO-2022-JP" );

        //mb_internal_encoding( $original );


        //$userBody   = mb_convert_encoding( $userBody, "ISO-2022-JP", "UTF8" );
        //$adminBody  = mb_convert_encoding( $adminBody, "ISO-2022-JP", "UTF8" );
        //$userFoot   = mb_convert_encoding( $userFoot, "ISO-2022-JP", "UTF8" );
        //$text       = mb_convert_encoding( $text, "ISO-2022-JP", "UTF8" );
        //$html = mb_convert_encoding( $html, "ISO-2022-JP", "UTF8" );

        //$extension1 = extension( $_SESSION['file'][1]['type'] );
        //$extension2 = extension( $_SESSION['file'][2]['type'] );
        //$extension3 = extension( $_SESSION['file'][3]['type'] );

        //$img  = 'my_baby.jpg'; // image/gif
        $crlf = "\n"; // 現在の改行コード


        $mailAddress = 'inquiry@moritaalumi.co.jp';


        $cc  = ( $_POST['cc'] )  ? $_POST['cc'] : null;
        $bcc = ( $_POST['bcc'] ) ? $_POST['bcc'] : null;
        // ヘッダー情報
        $hdrs = array(
            'From'        => mb_encode_mimeheader( $_POST['from'] ) . '<' . $mailAddress . '>', 
            'Cc'          => $cc, 
            'Bcc'         => $bcc, 
            'Sender'      => $mailAddress, 
            'Return-Path' => $mailAddress, 
            'Subject'     => '【' . $treeData[0]['number'] . '】' . $_POST['subject'], 
        );
/*
        $adminHdrs = array(
            'From'        => COMPANY_MAIL_FROM,
            'Cc'          => , 
            'Bcc'         => , 
            'Sender'      => COMPANY_MAIL_FROM,
            'Return-Path' => COMPANY_MAIL_FROM,
            'Subject'     => $adminSubject,
        );
*/


        // インスタンス生成
        //$adminMime = new Mail_mime( $crlf );
        $mime      = new Mail_mime( $crlf );

        //$adminMime->setTXTBody( $adminBody . $text );
        $mime->setTXTBody( $text . $userBody );
        //$mime->setHTMLBody( $html );

        if( $_SESSION[FILE_SESSION_KEY][1]['fileName'] )
        {
            $mime->addAttachment( './temp/' . $_SESSION[FILE_SESSION_KEY][1]['fileName'], $_SESSION['file'][1]['type'], $_SESSION[FILE_SESSION_KEY][1]['fileName'] );
            //$adminMime->addAttachment( './temp/' . $_SESSION[FILE_SESSION_KEY][1]['fileName'], $_SESSION['file'][1]['type'], $_SESSION[FILE_SESSION_KEY][1]['fileName'] );
        }
        if( $_SESSION[FILE_SESSION_KEY][2]['fileName'] )
        {
            $mime->addAttachment( './temp/' . $_SESSION[FILE_SESSION_KEY][2]['fileName'], $_SESSION['file'][2]['type'], 'file2' . $_SESSION[FILE_SESSION_KEY][2]['fileName'] );
            //$adminMime->addAttachment( './temp/' . $_SESSION[FILE_SESSION_KEY][2]['fileName'], $_SESSION['file'][2]['type'], $_SESSION[FILE_SESSION_KEY][2]['fileName'] );
        }
        if( $_SESSION[FILE_SESSION_KEY][3]['fileName'] )
        {
            $mime->addAttachment( './temp/' . $_SESSION[FILE_SESSION_KEY][3]['fileName'], $SESSION['file'][3]['type'], 'file3' . $_SESSION[FILE_SESSION_KEY][3]['fileName'] );
            //$adminMime->addAttachment( './temp/' . $_SESSION[FILE_CAFILE_SESSION_KEYTEGORY][3]['fileName'], $_SESSION['file'][3]['type'], $_SESSION[FILE_SESSION_KEY][3]['fileName'] );
        }


        // 出力用パラメータ
        $build_param = array(
            //"html_charset" => "ISO-2022-JP",
            //"text_charset" => "ISO-2022-JP",
            //"head_charset" => "ISO-2022-JP",
            "html_charset" => "UTF-8",
            "text_charset" => "UTF-8",
            "head_charset" => "UTF-8",
        );

        $body = $mime->get( $build_param );
        $hdrs = $mime->headers( $hdrs );

        //$adminBody = $adminMime->get( $build_param );
        //$adminHdrs = $adminMime->headers( $adminHdrs );

        $mail = Mail::factory( 'mail', ERROR_MAIL );
        $mail->send( $_POST['eMail'], $hdrs, $body );
        //$mail->send( 'yonekura@queserser.co.jp', $hdrs, $body );

        //$mail->send( 'info@tenpokagushop.com', $adminHdrs, $adminBody );
        //$mail->send( 'yonekura@queserser.co.jp', $adminHdrs, $adminBody );
        //$mail->send( 'miyashita@queserser.co.jp', $adminHdrs, $adminBody );





        //画像処理
        $fileArray = fileUpload( $_POST, $data, $maxImageCnt, './temp/', './mailFile/' );

        $_POST['dateTime']          = date( 'Y-m-d H:i:s' );
        $_POST['ownerId']   = $_REQUEST['id'];
        $_POST['ownerSend'] = 1;
        $_POST['mailBox']   = $_POST['boxId'];
        $_POST['subject']   = '【' . $treeData[0]['number'] . '】' . $_POST['subject'];

        $query->_setQuery( 'query', "UPDATE `contactMail` SET `status` = ? WHERE `id` = ? ", array( $_POST['status'], (int)$_POST['id'] ) );
        $query->_setQuery( 'query', "UPDATE `contactMail_child` SET `status` = ? WHERE `ownerId` = ? ", array( $_POST['status'], (int)$_POST['id'] ) );

        //DB登録修正処理
        $saveParam = array(
            'tableName'        => 'contactMail_child', 
            'data'             => $_POST, 
            'anData'           => array( 'submitConf', 'submitReg', 'submitReturn', 'reset', 'id', 'mailBox', 'boxId', 'childId', 'MAX_FILE_SIZE', 'sendFlg', 'imageDel', 'fileName' ), 
            'connectionKey'    => array(), 
            'timeKey'          => array(), 
            'dateKey'          => array(), 
            'dateTimeKey'      => array( 'receptionDateTime' ), 
            'connectionTxtKey' => array(), 
            'fileArray'        => array(), //$fileArray, 
            'fileAnData'       => array( 'imageDel', 'pictureOutsideFlg' ), 
            'lastFlg'          => 1, 
            'id'               => $_POST['childId'], 
            'idName'           => 'id', 
            'limitFlg'         => 1, 
        );

        $save = new CreatQueryDB();
        $save->_setParam( $saveParam );
        $id = $save->Save();

        //$query->_setQuery( 'query', " DELETE FROM `teacher_subject` WHERE `id` = ?  ", array( $id ) );


        $i = 1;
        foreach( (array)$_SESSION[FILE_SESSION_KEY] AS $key => $value )
        {
            if( $value['fileName'] )
            {
                $upId = $query->_setQuery( 'getOne', " SELECT `fileId` FROM `contactMail_child_file` WHERE `id` = ? AND `priority` = ? ", array( $id, $key ) );
                if( $upId )
                {
                    $queryStr = 
                        "UPDATE `contactMail_child_file` SET `fileName` = ?, `baseFileName` = ? WHERE `fileId` = ? ";
                    $insertArray = array( $value, $_SESSION[FILE_SESSION_KEY][$key]['baseName'], $upId );
                    $query->_setQuery( 'query', $queryStr, $insertArray );
                }
                else
                {
                    $queryStr = 
                        "INSERT INTO `contactMail_child_file` ( `ownerId`, `id`, `fileName`, `baseFileName`, `priority` ) 
                         VALUES ( ?, ?, ?, ?, ? ) ";
                    $insertArray = array( $_POST['ownerId'], $id, $value['fileName'], $_SESSION[FILE_SESSION_KEY][$key]['baseName'], $key );
                    $query->_setQuery( 'query', $queryStr, $insertArray );
                }
            }
        }

        $save->queryObj->DisConnect();

        unset( $_SESSION[FILE_SESSION_KEY] );

        for( $i = 1; $i <= $commentCnt; $i++ )
            unset( $_SESSION[EDITOR_NAME . $i] );

        tempFileClean();

        header( 'Location: ./' . FILE_CATEGORY . 'List.php?r=1' );
        die;
    }
}

for( $i = 1; $i <= $maxImageCnt; $i++ )
{
    if( $form->_errors[$i] )
        unset( $_SESSION[FILE_SESSION_KEY][$i] );
}


$renderer = new HTML_QuickForm_Renderer_ArraySmarty( $smarty );
$form->accept( $renderer );
$smarty->assign( 'form', $renderer->toArray() );

$smarty->assign( 'flg',               $flg );
$smarty->assign( 'data',              $data );
for( $i = 1; $i <= $commentCnt; $i++ )
{
    $smarty->assign( 'hiddenValue' . $i,       $hiddenValue[$i] );
    $smarty->assign( 'confComment' . $i,       $confComment[$i] );
}
$smarty->assign( 'fileFlg',           $fileFlg );
$smarty->assign( 'fileName',          $fileName );
$smarty->assign( 'image',             $data['image'] );
$smarty->assign( 'maxWidth',          $maxWidth );
$smarty->assign( 'maxHeight',         $maxHeight );
$smarty->assign( 'maxImageCnt',       $maxImageCnt );
$smarty->assign( 'imageTitle',        $imageTitle );
$smarty->assign( 'prtJson',           $shikusyousonJson );
$smarty->assign( 'treeData',          $treeData );

if( $_REQUEST['sendFlg'] )
    $smarty->display( THE_FILE_NAME . '.html' );
else
    $smarty->display( THE_FILE_NAME . 'User.html' );
?>
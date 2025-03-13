<?php
require_once( dirname(__FILE__) . '/../inc/config.php' );
require_once( dirname(__FILE__) . '/../inc/contentsConfig.php' );
require_once( dirname(__FILE__) . '/../inc/lib/DB/.systemSaveDB.class.php' );
//require_once( dirname(__FILE__) . '/../inc/lib/queserser.Cipher.class.php' );

session_start();

define( 'PAGE_TITLE',       'お問い合わせ' );
define( 'THE_FILE_NAME',    'index' );
define( 'THE_DIR_NAME',     'contact' );


$systemquery             = new systemDB();
$prefArray                = prefArray( 1 );        //都道府県
$contactBusinessCategory  = contactBusinessCategory();
$contactJobCategory       = contactJobCategory();
$contactCatalogArray      = contactCatalogArray();
$memberRegDowmArray       = memberRegDowmArray();

//フォーム作成
$form = new HTML_QuickForm( 'item', 'post' );

$form->addElement( 'text',        'companyName',    '会社名',               array( 'class' => 'wS imeOn' ) );
$form->addElement( 'text',        'sei',           'お名前',               array( 'class' => 'wSS imeOn' ) );
$form->addElement( 'text',        'mei',           'お名前',               array( 'class' => 'wSS imeOn' ) );

foreach( (array)$contactBusinessCategory AS $key => $value )
    $businessCategoryGroup[] = $form->createElement( 'radio', null, null, $value, $key, array( '' ) );
$form->addGroup( $businessCategoryGroup, 'businessCategory', '関連業種',  array( "<br>\n" ) );

foreach( (array)$contactJobCategory AS $key => $value )
    $jobCategoryGroup[] = $form->createElement( 'radio', null, null, $value, $key, array( '' ) );
$form->addGroup( $jobCategoryGroup, 'jobCategory',  '職種', array( "<br>\n" ) );

$form->addElement( 'text',        'busyo',          '部署名',               array( 'class' => 'wS imeOn' ) );
$form->addElement( 'text',        'month',          'メールアドレス',       array( 'class' => 'wS imeOff' ) );
$form->addElement( 'text',        'monthConf',      '確認用メールアドレス', array( 'class' => 'wS imeOff' ) );
$form->addElement( 'text',        'zip1',           '郵便番号',             array( 'class' => 'wSS imeOff',  'maxlength' => 3, 'onKeyUp' => "AjaxZip3.zip2addr( 'zip1', 'zip2', 'pref', 'address1', '' );" ) );
$form->addElement( 'text',        'zip2',           '郵便番号',             array( 'class' => 'wSS imeOff', 'maxlength' => 4, 'onKeyUp' => "AjaxZip3.zip2addr( 'zip1', 'zip2', 'pref', 'address1', '' );" ) );
$form->addElement( 'select',      'pref',           '都道府県',             $prefArray, array( 'class' => 'se01' ) );
$form->addElement( 'text',        'address1',       '住所',                 array( 'class' => 'wS imeOn' ) );
$form->addElement( 'text',        'address2',       '番地',                 array( 'class' => 'wS imeOn' ) );
$form->addElement( 'text',        'tel1',           '電話番号',             array( 'class' => 'wSSS imeOff', 'maxlength' => 5 ) );
$form->addElement( 'text',        'tel2',           '電話番号',             array( 'class' => 'wSSS imeOff', 'maxlength' => 5 ) );
$form->addElement( 'text',        'tel3',           '電話番号',             array( 'class' => 'wSSS imeOff', 'maxlength' => 5 ) );
$form->addElement( 'text',        'fax1',           'FAX番号',              array( 'class' => 'wSSS imeOff', 'maxlength' => 5 ) );
$form->addElement( 'text',        'fax2',           'FAX番号',              array( 'class' => 'wSSS imeOff', 'maxlength' => 5 ) );
$form->addElement( 'text',        'fax3',           'FAX番号',              array( 'class' => 'wSSS imeOff', 'maxlength' => 5 ) );
$form->addElement( 'text',        'url',            '御社URL',              array( 'class' => 'wS imeOff' ) );

foreach( (array)$memberRegDowmArray AS $key => $value )
    $memberRegDowmArrayGrp[] = $form->createElement( 'advcheckbox', $key, null, ' ' . $value, array( '' ) );
$form->addGroup( $memberRegDowmArrayGrp, 'know', '弊社ウェブサイトに来られたきっかけ', array( "<br>\n" ) );

/*
foreach( (array)$whatsNewContentsCategory AS $key => $value )
    $contentsCategoryGroup[] = $form->createElement( 'radio', null, null, $value, $key, array( 'onclick' => 'categoryView(' . $key . ')' ) );
$form->addGroup( $contentsCategoryGroup, 'contentsCategory', 'コンテンツカテゴリ', array( "&nbsp;&nbsp;&nbsp;\n" ) );
*/

$form->addElement( 'textarea',    'comment',        'その他コメントアンケート',   array( 'rows' => 4 ) );


//$form->addElement( 'advcheckbox', 'privacyFlg',     '',                     '',  array() );


/*
foreach( (array)$contactCategory AS $key => $value )
    $contactCategoryGroup[] = $form->createElement( 'radio', null, null, $value, $key, array( 'class' => 'input_hissu' ) );
$form->addGroup( $contactCategoryGroup, 'category', 'お問い合わせ種別', array( "<br class=\"sp\">\n" ) );

*/

$form->addElement( 'submit',      'submitConf',     '入力情報確認画面へ',      array( 'class'   => 'kakunin' ) );
$form->addElement( 'submit',      'submitReg',      '送信',                    array( 'class'   => 'kakunin' ) );
$form->addElement( 'submit',      'submitReturn',   '前のページへ戻る',        array( 'class'   => 'reset' ) );
$form->addElement( 'button',      'reset',          'リセット',                array( 'class'   => 'reset', 'onclick' => "javascript:location.href='./'" ) );

$form->applyFilter( '__ALL__', 'trim' );

//エラー処理
$form->addRule( 'companyName',      '会社名を入力してください。',                       'required', null );
$form->addRule( 'sei',             'お名前を入力してください。',                       'required', null );
$form->addRule( 'mei',             'お名前を入力してください。',                       'required', null );
$form->addRule( 'businessCategory', '関連業種を選択してください。',                     'required', null );
$form->addRule( 'jobCategory',      '職種を選択してください。',                         'required', null );
$form->addRule( 'month',            'メールアドレスを入力してください。',               'required', null );
$form->addRule( 'monthConf',        '確認用メールアドレスを入力してください。',         'required', null );
$form->addRule( 'zip1',             '郵便番号[上3桁]を入力してください。',              'required', null );
$form->addRule( 'zip1',             '郵便番号[上3桁]の入力形式が間違っています。',      'regex', '/^\d{3}$/' );
$form->addRule( 'zip2',             '郵便番号[下4桁]を入力してください。',              'required', null );
$form->addRule( 'zip2',             '郵便番号[下4桁]の入力形式が間違っています。',      'regex', '/^\d{4}$/' );
$form->addRule( 'pref',             '都道府県を選択してください。',                     'nonzero', null );
$form->addRule( 'address1',         '市区町村名を入力してください。',                   'required', null );
$form->addRule( 'address2',         '番地・ビル名を入力してください。',                 'required', null );
$form->addRule( 'comment',          'ご質問・お問合せ内容を入力してください。',         'required', null );


//$form->addRule( 'kana',             'よみがなを入力してください。',                     'required', null );
/*
$form->addRule( 'kana',             'よみがなはひらがな入力です。',                     'regex', '/^((\xe3(\x81[\x81-\xbf]|\x82[\x80-\x93]|\x83\xbc))|\s|\xE3\x80\x80)*$/' );
$form->addRule( 'tel',              '電話番号を入力してください。',                     'required', null );
$form->addRule( 'tel',              '電話番号の入力形式が間違っています。',             'regex', '/^\d+(-?\d+)*$/' );
$form->addRule( 'comment',          'お問い合わせ内容を入力してください。',             'required', null );
$form->addRule( 'privacyFlg',       '個人情報の取り扱いについてにチェックしていません。', 'required', null );
*/
//エラー追加処理
if( $_POST['submitConf'] )
{
    if( $_POST['month'] && !preg_match( '/^[^@]+@[^@]+$/', $_POST['month'] ) )
        $form->_errors['month'] = 'メールアドレスの入力形式が違います。';

    if( $_POST['month'] != $_POST['monthConf'] )
        $form->_errors['month'] = 'メールアドレスと確認用メールアドレスが一致しません。';

    if( !$_POST['tel1'] || !$_POST['tel2'] || !$_POST['tel3'] )
        $form->_errors['tel1'] = '電話番号を入力してください。';

    if( $_POST['tel1'] && $_POST['tel2'] && $_POST['tel3'] && !preg_match( '/\d+/', $_POST['tel1'] . $_POST['tel2'] . $_POST['tel3'] ) )
        $form->_errors['tel1'] = '電話番号の入力形式が違います。';

    if( $_POST['fax1'] && $_POST['fax2'] && $_POST['fax3'] && !preg_match( '/\d+/', $_POST['fax1'] . $_POST['fax2'] . $_POST['fax3'] ) )
        $form->_errors['fax1'] = 'FAX番号の入力形式が違います。';

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
        //管理者宛てメール用本文
        $mailSubject      = 'お問合せいただきありがとうございます。';
        //$adminMailSubject = 'WEBサイトよりお問合せがありました。';
        $adminMailSubject = /*'?UTF-8?B?' . */'WEBサイトよりお問合せがありました。';

      $mailFrom    = base64_encode( '森田アルミ工業株式会社' ) . '?= <info-inquiry@moritaalumi.co.jp>';

      $catalogArray = $regDowmArray = array();
        foreach( $contactCatalogArray AS $key => $value ) {
          if( $_POST['catalog'][$key] )$catalogStr .= '  ○' . $value . "\n";
          if( $_POST['catalog'][$key] )$catalogArray[] = $value;
          $catalogImplode = implode(';', $catalogArray);
        }

        foreach( $memberRegDowmArray AS $key => $value ) {
          if( $_POST['know'][$key] )$regDowmStr .= '  ○' . $value . "\n";
          if( $_POST['know'][$key] )$regDowmArray[] = $value;
          $regDowmImplode = implode(';', $regDowmArray);
        }
        $mailBody = $mailHeader = '';

        $mailBody .= '■会社名:'                    . "\n      " . $_POST['companyName']                                                . "\n";
        $mailBody .= '■お名前:'                    . "\n      " . $_POST['sei'] . $_POST['mei']                                        . "\n";
        $mailBody .= '■関連業種:'                  . "\n      " . $contactBusinessCategory[$_POST['businessCategory']]                 . "\n";
        $mailBody .= '■職種:'                      . "\n      " . $contactJobCategory[$_POST['jobCategory']]                           . "\n";
        $mailBody .= '■部署名:'                    . "\n      " . $_POST['busyo']                                                      . "\n";
        $mailBody .= '■メールアドレス:'            . "\n      " . $_POST['month']                                                      . "\n";
        $mailBody .= '■郵便番号:'                  . "\n      " . $_POST['zip1'] . '-' . $_POST['zip2']                                . "\n";
        $mailBody .= '■住所:'                      . "\n      " . $prefArray[$_POST['pref']] . $_POST['address1'] . $_POST['address2'] . "\n";
        $mailBody .= '■電話番号:'                  . "\n      " . $_POST['tel1'] . '-' . $_POST['tel2'] . '-' . $_POST['tel3']         . "\n";
        $mailBody .= '■FAX番号:'                   . "\n      " . $_POST['fax1'] . '-' . $_POST['fax2'] . '-' . $_POST['fax3']         . "\n";
        $mailBody .= '■御社URL:'                   . "\n      " . $_POST['url']                                                        . "\n";
        //$mailBody .= '■ご希望のカタログ:'          . "\n" . $catalogStr                                              . "\n";
        $mailBody .= '■弊社ウェブサイトに来られたきっかけ:'  . "\n" . $regDowmStr                                              . "\n";
        $mailBody .= '■ご質問・お問合せ内容:'      . "\n  "  . $_POST['comment']                                                       . "\n";


        $userHeader   = "From: =?UTF-8?B?"        . $mailFrom . "\n";
        $adminHeader  = "From: =?UTF-8?B?" . base64_encode( ' ' ) . "?= <mw2p80rqyi@moritaalimi.co.jp>" . "\n";

        $mailHeader  .= "Return-Path: info-inquiry@moritaalumi.co.jp\n";
        $mailHeader  .= "MIME-Version: 1.0\n";
        $mailHeader  .= 'Content-Type: text/plain; charset=UTF-8' . "\n";
        $mailHeader  .= "Content-Transfer-Encoding: 8bit\n";
        $mailHeader  .= "X-mailer: PHP/" . phpversion();

        $userHeader  = $userHeader  . $mailHeader;
        $adminHeader = $adminHeader . $mailHeader;


        $mailSubject = "=?UTF-8?B?" . base64_encode( $mailSubject ) . "?=";
        $adminMailSubject = "=?UTF-8?B?" . base64_encode( $adminMailSubject ) . "?=";

        $userBody  = '======================================'                . "\n";
        $userBody .= 'このメールは、森田アルミ工業株式会社の'                . "\n";
        $userBody .= 'ウェブシステムより自動的に送信されています。'          . "\n";
        $userBody .= '======================================'                . "\n";
        $userBody .= $mailBody                                               . "\n";
        $userBody .= '======================================'                . "\n";
        $userBody .= '森田アルミ工業株式会社'                                . "\n";
        $userBody .= '本社'                                                  . "\n";
        $userBody .= '〒599-0201'                                            . "\n";
        $userBody .= '大阪府阪南市尾崎町530-1'                               . "\n";
        $userBody .= 'TEL : 072-480-1400'                                    . "\n";
        $userBody .= 'URL : 072-480-1414'                                    . "\n";
        $userBody .= '======================================'                . "\n";


        $adminBody  = '下記内容のお問合せがありました。'                     . "\n";
        $adminBody .= '====================================='                . "\n";
        $adminBody .= $mailBody                                              . "\n";
        $adminBody .= '====================================='                . "\n";

        $_POST['dateTime'] = date('Y-m-d H:i:s');
        $_POST['mailBox']  = 1;
        $_POST['name']     = $_POST['sei'] . $_POST['mei'];

      $_SESSION['contact_form'] = $_POST;
      $zip = ($_POST['zip1'] && $_POST['zip2']) ? $_POST['zip1'] . '-' . $_POST['zip2'] : '';
      $tel = ($_POST['tel1'] && $_POST['tel2'] && $_POST['tel3']) ? $_POST['tel1'] . '-' . $_POST['tel2'] . '-' . $_POST['tel3'] : '';
      $fax = ($_POST['fax1'] && $_POST['fax2'] && $_POST['fax3']) ? $_POST['fax1'] . '-' . $_POST['fax2'] . '-' . $_POST['fax3'] : '';
      $_SESSION['contact_form']['businessCategory_data'] = $contactBusinessCategory[$_POST['businessCategory']];
      $_SESSION['contact_form']['jobCategory_data'] = $contactJobCategory[$_POST['jobCategory']];
      $_SESSION['contact_form']['address_data'] = $prefArray[$_POST['pref']] . $_POST['address1'] . $_POST['address2'];
      $_SESSION['contact_form']['zip_data'] = $zip;
      $_SESSION['contact_form']['tel_data'] = $tel;
      $_SESSION['contact_form']['fax_data'] = $fax;
      $_SESSION['contact_form']['catalog_data'] = $catalogImplode;
      $_SESSION['contact_form']['know_data'] = $regDowmImplode;
      unset($_POST['sei']);
      unset($_POST['mei']);        //$pass   = $systemquery->GetCipherKey();
        //$cipher = new Cipher( $_POST, $pass );
        //$cipher->_setAnKey( contactAnKey() );
        //$post = $cipher->Convert();
//echo '<pre>';
//        print_r($cipher);

//        print_r($post);
//echo '</pre>';
//die;
        //DB登録修正処理
        $saveParam = array(
            'tableName'     => 'contactMail',
            'data'          => $_POST,
            'anData'        => array( 'submitConf', 'submitReg', 'submitReturn', 'reset', 'id', 'MAX_FILE_SIZE', 'imageDel', 'fileName', 'privacyFlg', 'monthConf' ),
            'connectionKey' => array( 'know' ),
            'timeKey'       => array(),
            'dateKey'       => array(),
            'dateTimeKey'   => array(),
            'fileArray'     => /*$fileArray*/array(),
            'fileAnData'    => array( /*'imageDel', 'pictureOutsideFlg'*/ ),
            'lastFlg'       => 1,
            'id'            => $_POST['id'],
            'idName'        => 'id',
            'limitFlg'      => 1,
        );

        $save = new CreatQueryDB();
        $save->_setParam( $saveParam );
        $id = $save->Save();

        //ユーザーメール
        mail( $_POST['month'], $mailSubject, $userBody, $userHeader, ERROR_MAIL );

        //管理者メール
        //mail( '', $adminMailSubject, $adminBody, $mailHeader, ERROR_MAIL );
        //mail( 'nakai@queserser.co.jp', $adminMailSubject, $adminBody, $mailHeader, ERROR_MAIL );
        mail( 'info-inquiry@moritaalumi.co.jp', $adminMailSubject, $adminBody, $adminHeader, $errorMail );
        //mail( 'yonekura@queserser.co.jp', $adminMailSubject, $adminBody, $adminHeader, $errorMail );

        header( 'Location: ./thanks.php' );
        die;
    }
}


$smarty->template_dir = SMARTY_TEMPLATE_PATH    . THE_DIR_NAME;
$smarty->compile_dir  = SMARTY_TEMPLATE_C_PATH  . THE_DIR_NAME;

$renderer = new HTML_QuickForm_Renderer_ArraySmarty( $smarty );
$form->accept( $renderer );
$smarty->assign( 'form', $renderer->toArray() );

$smarty->assign( 'flg',                      $flg );
$smarty->assign( 'prefArray',                $prefArray );
$smarty->assign( 'contactBusinessCategory',  $contactBusinessCategory );
$smarty->assign( 'contactJobCategory',       $contactJobCategory );
$smarty->assign( 'contactCatalogArray',      $contactCatalogArray );
$smarty->assign( 'memberRegDowmArray',       $memberRegDowmArray );


$smarty->display( THE_FILE_NAME . '.html' );
?>
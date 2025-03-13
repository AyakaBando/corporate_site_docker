<?php
require_once(dirname(__FILE__) . '/../inc/config.php');
require_once(dirname(__FILE__) . '/../inc/contentsConfig.php');
require_once(dirname(__FILE__) . '/../inc/lib/DB/.systemSaveDB.class.php');
require_once(dirname(__FILE__) . '/../inc/lib/DB/.userDB.class.php');

if (!$_SESSION['member']['flg'] && !$_SESSION['member']['memberId']) {
    header('Location: /');
    die;
}

define('THE_DIR_NAME',   'change');
define('THE_FILE_NAME',  'index');


//$data['privacyFlg']    = 1;
$memberRegJobArray         = memberRegJobArray();
$memberRegDowmArray        = memberRegDowmArray();
$memberRegPdfCategoryArray = memberRegPdfCategoryArray();
$emailConsentArray = emailConsentArray();
$prefArray                 = prefArray();
$userquery                 = new userDB();


$form = new HTML_QuickForm('login', 'post');

$form->addElement('text',        'companyName',      '店舗名',                 array('class' => 'wS imeOn'));
$form->addElement('text',        'name',             'お名前',                 array('class' => 'wS imeOn'));

foreach ((array)$memberRegJobArray as $key => $value)
    $memberRegJobGroup[] = $form->createElement('radio', null, null, $value, $key, array());
$form->addGroup($memberRegJobGroup, 'job', '担当者職種', array("<br>\n"));


$form->addElement('text',        'eMail',            'メールアドレス',         array('class' => 'wS imeOff'));
$form->addElement('text',        'eMailConf',        '確認用メールアドレス',   array('class' => 'wS imeOff'));
// Add type attribute manually
$form->getElement('eMail')->setAttribute('type', 'email');
$form->getElement('eMailConf')->setAttribute('type', 'email');
// Add type attribute manually
$form->addElement('password',    'password',         'パスワード',             array('class' => 'wS imeOff'));
$form->addElement('password',    'passwordConf',     '確認用パスワード',       array('class' => 'wS imeOff'));
$form->addElement('text',        'zip1',             '郵便番号',               array('class' => 'wSS imeOff', 'maxlength' => 3, 'onKeyUp' => "AjaxZip3.zip2addr('zip1','zip2','pref','address1');"));
$form->addElement('text',        'zip2',             '郵便番号',               array('class' => 'wSS imeOff', 'maxlength' => 4, 'onKeyUp' => "AjaxZip3.zip2addr('zip1','zip2','pref','address1');"));
$form->addElement('select',      'pref',             '都道府県',               $prefArray, array('class' => 'se01'));
$form->addElement('text',        'address1',         '市区町村名',             array('class' => 'wS imeOn'));
$form->addElement('text',        'address2',         '番地・ビル名',           array('class' => 'wS imeOn'));
$form->addElement('text',        'tel1',             '電話番号',               array('class' => 'wSSS imeOff', 'maxlength' => 4));
$form->addElement('text',        'tel2',             '電話番号',               array('class' => 'wSSS imeOff', 'maxlength' => 4));
$form->addElement('text',        'tel3',             '電話番号',               array('class' => 'wSSS imeOff', 'maxlength' => 4));
$form->addElement('text',        'fax1',             'FAX番号',                array('class' => 'wSSS imeOff', 'maxlength' => 4));
$form->addElement('text',        'fax2',             'FAX番号',                array('class' => 'wSSS imeOff', 'maxlength' => 4));
$form->addElement('text',        'fax3',             'FAX番号',                array('class' => 'wSSS imeOff', 'maxlength' => 4));
$form->addElement('text',        'siteUrl',          '御社URL',                array('class' => 'wS imeOff'));

foreach ((array)$memberRegDowmArray as $key => $value)
    $memberRegDowmGrp[] = $form->createElement('checkbox', $key, null, ' ' . $value, array(0, 1));
$form->addGroup($memberRegDowmGrp, 'medium', '媒体', array("<br>\n"));

foreach ((array)$memberRegPdfCategoryArray as $key => $value)
    $memberRegPdfCategoryGrp[] = $form->createElement('checkbox', $key, null, ' ' . $value, array(0, 1));
$form->addGroup($memberRegPdfCategoryGrp, 'pdf', 'pdf', array("　\n"));

// メルマガ受け取りの確認
// foreach ((array)$emailConsentArray as $key => $value)
// $emailConsentGroup[] = $form->createElement('radio', null, null, $value, $key, array());
// $form->addGroup($emailConsentGroup, 'email_consent', '新製品情報の受け取り', array("<br>\n"));
foreach ((array)$emailConsentArray as $key => $value)
$emailConsentGroup[] = $form->createElement('radio', null, null, $value, $key, array());
$form->addGroup($emailConsentGroup, 'opted_out', '新製品情報の受け取り', array("<br>\n"));
// メルマガ受け取りの確認　ここまで

//$form->addElement( 'textarea',    'comment',          'コメント',               array( 'class' => 'wFull form01', 'rows' => 10, 'placeholder' => 'コメントを入力してください' ) );
//$form->addElement( 'advcheckbox', 'privacyFlg',       '',  ' 規約に同意する',   array( 0, 1 ) );


$form->addElement('submit',      'submitConf',       '入力情報確認画面へ',       array('class' => 'kakunin'));
$form->addElement('submit',      'submitReg',        '送信',                     array('class' => 'kakunin'));
$form->addElement('submit',      'submitReturn',     '前のページへ戻る',         array('class' => 'reset'));
$form->addElement('reset',       'reset',            'リセット',                 array('class' => 'reset'));

//$form->addRule( 'age',              '年齢を選択してください。',                    'nonzero',  null );
$form->addRule('companyName',      '会社名を入力してください。',                  'required', null);
$form->addRule('name',             'お名前を入力してください。',                  'required', null);
$form->addRule('job',              'ご担当者ご職業を選択してください。',          'required', null);
$form->addRule('eMail',            'メールアドレスを入力してください。',          'required', null);
$form->addRule('eMailConf',        '確認用メールアドレスを入力してください。',    'required', null);
$form->addRule('password',         'パスワードを入力してください。',              'required', null);
$form->addRule('password',         'パスワードは半角英数字4文字以上16文字以下で入力して下さい。', 'regex', '/^[0-9a-zA-z]{4,16}$/');
$form->addRule('passwordConf',     '確認用パスワードを入力してください。',        'required', null);
$form->addRule('zip1',             '郵便番号上3桁を入力してください。',           'required', null);
$form->addRule('zip1',             '郵便番号上3桁の入力形式が違います。',         'regex', '/^[0-9]{3}$/');
$form->addRule('zip2',             '郵便番号下4桁を入力してください。',           'required', null);
$form->addRule('zip2',             '郵便番号下4桁の入力形式が違います。',         'regex', '/^[0-9]{4}$/');
$form->addRule('pref',             '都道府県を選択してください。',                'nonzero', null);
$form->addRule('address1',         '市区町村名を入力してください。',              'required', null);
$form->addRule('address2',         '番地・ビル名 を入力してください。',           'required', null);
// $form->addRule('email_consent',     '新製品情報の受け取り可否を選択してください。', 'required', null);
// $form->addRule('opted_out',     '新製品情報の受け取り可否を選択してください。', 'required', null);


if ($_POST['submitConf']) {
    //if( !$_POST['privacyFlg'] )
    //    $form->_errors['privacyFlg']   = '規約に同意していません。';

    if (!$_POST['tel1'] || !$_POST['tel2'] || !$_POST['tel3'])
        $form->_errors['tel1']   = '電話番号を入力してください。';

    if (($_POST['tel1'] && $_POST['tel2'] && $_POST['tel3']) && !preg_match('/^\d+$/', $_POST['tel1'] . $_POST['tel2'] . $_POST['tel3']))
        $form->_errors['tel1']   = '電話番号は半角数字で入力してください。';

    if (($_POST['fax1'] && $_POST['fax2'] && $_POST['fax3']) && !preg_match('/^\d+$/', $_POST['fax1'] . $_POST['fax2'] . $_POST['fax3']))
        $form->_errors['fax1']   = 'FAX番号は半角数字で入力してください。';

    if ($_POST['eMail'] && !preg_match('/^[^@]+@[^@]+$/', $_POST['eMail']))
        $form->_errors['eMail'] = 'メールアドレスの入力形式が違います。';

    if ($_POST['eMail'] && $_POST['eMail'] != $_POST['eMailConf'])
        $form->_errors['eMail'] = 'メールアドレスと確認用メールアドレスが一致しません。';

    if ($userquery->UserMailChk($_POST['eMail'], $_SESSION['member']['memberId']) === true)
        $form->_errors['eMail']  = '入力されたメールアドレスは登録されています。';

    if ($_POST['password'] && $_POST['password'] != $_POST['passwordConf'])
        $form->_errors['eMail'] = 'パスワードと確認用パスワードが一致しません。';
}

//print_r($_SESSION['member']);
$form->setRequiredNote('<span style="font-size:80%; color:#ff0000;">下記</span><span style="font-size:80%;">の項目は必ず入力してください。</span>');
$form->setJsWarnings('下記の項目は必ず入力してください。', "\n\n" . TITLE);

$_SESSION['member']['eMailConf']    = $_SESSION['member']['eMail'];
$_SESSION['member']['passwordConf'] = $_SESSION['member']['password'];

$form->setDefaults($_SESSION['member']);

if ($form->validate()) {
    //確認
    if (isset($_POST['submitConf'])) {
        $form->freeze();
        $flg++;
    }

    ///////次へ処理///////
    if (isset($_POST['submitReg'])) {
        foreach ($memberRegDowmArray as $key => $value)
            if ($_POST['medium'][$key]) $regDowmStr .= '  ○' . $value . "\n";

        foreach ($memberRegPdfCategoryArray as $key => $value)
            if ($_POST['pdf'][$key]) $pdfStr .= '  ○' . $value . "\n";

        $inputBody .= '■会社名:'           . "\n  " . $_POST['companyName'] .                                                        "\n";
        $inputBody .= '■お名前:'           . "\n  " . $_POST['name'] .                                                               "\n";
        $inputBody .= '■ご担当者ご職業:'   . "\n  " . $memberRegJobArray[$_POST['job']] .                                            "\n";
        $inputBody .= '■メールアドレス:'   . "\n  " . $_POST['eMail'] .                                                              "\n";
        $inputBody .= '■パスワード:'       . "\n  " . $_POST['password'] .                                                           "\n";
        $inputBody .= '■郵便番号:'         . "\n  " . $_POST['zip1'] . '-' . $_POST['zip2'] .                                        "\n";
        $inputBody .= '■住所:'             . "\n  " . $prefArray[$_POST['pref']] . '　' . $_POST['address1'] . $_POST['address2'] .  "\n";
        $inputBody .= '■電話番号:'         . "\n  " . $_POST['tel1'] . '-' . $_POST['tel2'] . '-' . $_POST['tel3'] .                 "\n";
        $inputBody .= '■FAX番号:'          . "\n  " . $_POST['fax1'] . '-' . $_POST['fax2'] . '-' . $_POST['fax3'] .                 "\n";
        $inputBody .= '■御社URL:'          . "\n  " . $_POST['siteUrl'] .                                                            "\n";
       // $inputBody .= '■新商品のご案内:'   . "\n  " . $emailConsentArray[$_POST['email_consent']] .                                   "\n";
       $inputBody .= '■新商品のご案内:'   . "\n  " . $emailConsentArray[$_POST['opted_out']] .                                   "\n";

        // $inputBody .= '■PDFダウンロードのきっかけになった媒体:' . "\n" . $regDowmStr .                                               "\n";
        // $inputBody .= '■PDF:'              . "\n"   . $pdfStr .                                                                      "\n\n";


        $mailSubject      = "=?UTF-8?B?" . base64_encode('【会員情報を変更しました】森田アルミ工業株式会社') . "?=";
        $adminMailSubject = "=?UTF-8?B?" . base64_encode('会員登録がありました') . "?=";

        $userBody  = '======================================' . "\n";
        $userBody .= 'このメールは、森田アルミ工業株式会社の' . "\n";
        $userBody .= 'ウェブシステムより自動的に送信されています。' . "\n";
        $userBody .= '======================================' . "\n";
        $userBody .= '変更内容は以下の通りです。' . "\n\n";
        $userBody .= $inputBody . "\n";
        $userBody .= '======================================' . "\n";
        $userBody .= '森田アルミ工業株式会社' . "\n";
        $userBody .= '本社' . "\n";
        $userBody .= '〒599-0201' . "\n";
        $userBody .= '大阪府阪南市尾崎町530-1' . "\n";
        $userBody .= 'TEL : 072-480-1400' . "\n";
        $userBody .= 'FAX : 072-480-1414' . "\n";
        $userBody .= '======================================'    . "\n";

        $adminBody  = '========================================='       . "\n";
        $adminBody .= '会員登録がありました。'                          . "\n";
        $adminBody .= '========================================='       . "\n";
        $adminBody .= $_POST['name'] . '様よりの登録内容は'             . "\n";
        $adminBody .= '以下の通りです。'                                . "\n";
        $adminBody .= '========================================='       . "\n";
        $adminBody .= $inputBody                                        . "\n";
        $adminBody .= '========================================='       . "\n";

        $_POST['regDateTime'] = date('Y-m-d H:i:s');
        $_POST['memberId']    = $_SESSION['member']['memberId'];



        $saveParam = array(
            'tableName'     => 'memberMaster',
            'data'          => $_POST,
            'anData'        => array('submitConf', 'submitReg', 'submitReturn', 'reset', 'memberId', 'MAX_FILE_SIZE', 'eMailConf', 'passwordConf', 'fileName', 'addContents'),
            'connectionKey' => array( /*'medium', 'pdf'*/),
            'timeKey'       => array(),
            'dateKey'       => array(),
            'dateTimeKey'   => array(),
            'fileArray'     => array(),
            'fileAnData'    => array(),
            'lastFlg'       => 1,
            'id'            => $_POST['memberId'],
            'idName'        => 'memberId',
            'limitFlg'      => 1,
        );

        $save = new CreatQueryDB();
        $save->_setParam($saveParam);
        $id = $save->Save();

        $memberGet['account']  = $_POST['eMail'];
        $memberGet['password'] = $_POST['password'];

        $_SESSION['member']     = $userquery->GetMemberData($memberGet);
        $_SESSION['member']['flg'] = 1;

        //ユーザーメール
        mail($_POST['eMail'], $mailSubject, $userBody, $mailHeader, null);
        //管理者メール
        //mail( 'yonekura@queserser.co.jp', $adminMailSubject, $adminBody, $mailHeader, $errorMail );

        header('Location: ./thanks.php');
        die;
    }
}



$smarty->template_dir = SMARTY_TEMPLATE_PATH    . THE_DIR_NAME;
$smarty->compile_dir  = SMARTY_TEMPLATE_C_PATH  . THE_DIR_NAME;

$renderer = new HTML_QuickForm_Renderer_ArraySmarty($smarty);
$form->accept($renderer);
$smarty->assign('form', $renderer->toArray());


$smarty->assign('flg',       $flg);


$smarty->display(THE_FILE_NAME . '.html');

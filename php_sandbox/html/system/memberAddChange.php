<?php
require_once( '../inc/auth.php' );
require_once( './systemConsts.php' );
require_once( '../inc/lib/DB/.systemSaveDB.class.php' );
require_once( '../inc/lib/DB/.systemMemberDB.class.php' );


define( 'SQL_TABLE_NAME',   'memberMaster' );
define( 'PAGE_TITLE',       '会員' );
define( 'FILE_CATEGORY',    'member' );
define( 'THE_FILE_NAME',    FILE_CATEGORY . 'AddChange' );
define( 'FILE_SESSION_KEY', FILE_CATEGORY . 'Image' );
define( 'PAGE_NUM',         2 );
define( 'CHENGE_FLG',       1 );
define( 'SORT_FLG',         0 );

//DBインスタンス
$query       = new systemMemberDB();
$systemquery = new systemDB();

$memberRegJobArray         = memberRegJobArray();
$memberRegDowmArray        = memberRegDowmArray();
$memberRegPdfCategoryArray = memberRegPdfCategoryArray();
$prefArray                 = prefArray();

$memberRelationJobArray    = memberRelationJobArray();
$memberSubJobCategory      = memberSubJobCategory();

$maxWidth     = array( 1 => 240, 2 => 240, 3 => 1198, 4 => 670, 5 => 398, 6 => 670 );
$maxHeight    = array( 1 => 240, 2 => 240, 3 => 1000, 4 => 450, 5 => 800, 6 => 450 );
$maxImageCnt  = 5;

//登録詳細データ
if( $_REQUEST['memberId'] )
    $data              = $query->Detail( $_REQUEST['memberId'] );


//確認用画像のカスがあった場合の削除
if( !$_POST ) unset( $_SESSION[FILE_SESSION_KEY] );


//フォーム作成
$form = new HTML_QuickForm( 'item', 'post' );

$form->addElement( 'text',        'companyName',      '店舗名',                 array( 'class' => 'wS imeOn' ) );
$form->addElement( 'text',        'name',             'お名前',                 array( 'class' => 'wS imeOn' ) );

foreach( (array)$memberRegJobArray AS $key => $value )
    $memberRegJobGroup[] = $form->createElement( 'radio', null, null, $value, $key, array() );
$form->addGroup( $memberRegJobGroup, 'job', '担当者職種', array( "<br>\n" ) );

foreach( (array)$memberRelationJobArray AS $key => $value )
    $relationJobGroup[] = $form->createElement( 'radio', null, null, $value, $key, array() );
$form->addGroup( $relationJobGroup, 'relationJob', '関連業種', array( "<br>\n" ) );

foreach( (array)$memberSubJobCategory AS $key => $value )
    $memberSubJobCategoryGroup[] = $form->createElement( 'radio', null, null, $value, $key, array() );
$form->addGroup( $memberSubJobCategoryGroup, 'subJobCategory', '職種', array( "<br>\n" ) );

$form->addElement( 'text',        'busyo',            '部署名',                 array( 'class' => 'wS imeOn' ) );

$form->addElement( 'text',        'eMail',            'メールアドレス',         array( 'class' => 'wS imeOff' ) );
$form->addElement( 'password',    'password',         'パスワード',             array( 'class' => 'wS imeOff' ) );
$form->addElement( 'text',        'zip1',             '郵便番号',               array( 'class' => 'wSS imeOff', 'maxlength' => 3, 'onKeyUp' => "AjaxZip3.zip2addr('zip1','zip2','pref','address1');" ) );
$form->addElement( 'text',        'zip2',             '郵便番号',               array( 'class' => 'wSS imeOff', 'maxlength' => 4, 'onKeyUp' => "AjaxZip3.zip2addr('zip1','zip2','pref','address1');" ) );
$form->addElement( 'select',      'pref',             '都道府県',               $prefArray, array( 'class' => 'se01' ) );
$form->addElement( 'text',        'address1',         '市区町村名',             array( 'class' => 'wS imeOn' ) );
$form->addElement( 'text',        'address2',         '番地・ビル名',           array( 'class' => 'wS imeOn' ) );
$form->addElement( 'text',        'tel1',             '電話番号',               array( 'class' => 'wSSS imeOff', 'maxlength' => 4 ) );
$form->addElement( 'text',        'tel2',             '電話番号',               array( 'class' => 'wSSS imeOff', 'maxlength' => 4 ) );
$form->addElement( 'text',        'tel3',             '電話番号',               array( 'class' => 'wSSS imeOff', 'maxlength' => 4 ) );
$form->addElement( 'text',        'fax1',             'FAX番号',                array( 'class' => 'wSSS imeOff', 'maxlength' => 4 ) );
$form->addElement( 'text',        'fax2',             'FAX番号',                array( 'class' => 'wSSS imeOff', 'maxlength' => 4 ) );
$form->addElement( 'text',        'fax3',             'FAX番号',                array( 'class' => 'wSSS imeOff', 'maxlength' => 4 ) );
$form->addElement( 'text',        'siteUrl',          '御社URL',                array( 'class' => 'wS imeOff' ) );

foreach( (array)$memberRegDowmArray AS $key => $value )
    $memberRegDowmGrp[] = $form->createElement( 'checkbox', $key, null, ' ' . $value, array( 0, 1 ) );
$form->addGroup( $memberRegDowmGrp, 'medium', '媒体', array( "<br />\n" ) );

foreach( (array)$memberRegPdfCategoryArray AS $key => $value )
    $memberRegPdfCategoryGrp[] = $form->createElement( 'checkbox', $key, null, ' ' . $value, array( 0, 1 ) );
$form->addGroup( $memberRegPdfCategoryGrp, 'pdf', 'pdf', array( "<br />\n" ) );


if( $_REQUEST['id'] ) $form->addElement( 'hidden',  'memberId',     $_REQUEST['memberId'] );

$form->addElement( 'submit',    'submitConf',    '確認',     array( 'class'   => 'submits' ) );
$form->addElement( 'submit',    'submitReg',     '更新',     array( 'class'   => 'submits' ) );
$form->addElement( 'submit',    'submitReturn',  '戻る',     array( 'class'   => 'submits' ) );

$form->applyFilter( '__ALL__', 'trim' );

//エラー処理
$form->addRule( 'companyName',      '会社名を入力してください。',                  'required', null );
$form->addRule( 'name',             'お名前を入力してください。',                  'required', null );
$form->addRule( 'job',              'ご担当者ご職業を選択してください。',          'required', null );
$form->addRule( 'eMail',            'メールアドレスを入力してください。',          'required', null );
$form->addRule( 'eMailConf',        '確認用メールアドレスを入力してください。',    'required', null );
$form->addRule( 'password',         'パスワードを入力してください。',              'required', null );
$form->addRule( 'password',         'パスワードは半角英数字4文字以上16文字以下で入力して下さい。', 'regex', '/^[0-9a-zA-z]{4,16}$/' );



//エラー追加処理
if( $_POST['submitConf'] )
{
    if( !$_POST['tel1'] || !$_POST['tel2'] || !$_POST['tel3'] )
        $form->_errors['tel1']   = '電話番号を入力してください。';

    if( ( $_POST['tel1'] && $_POST['tel2'] && $_POST['tel3'] ) && !preg_match( '/^\d+$/', $_POST['tel1'] . $_POST['tel2'] . $_POST['tel3'] ) )
        $form->_errors['tel1']   = '電話番号は半角数字で入力してください。';

    if( ( $_POST['fax1'] && $_POST['fax2'] && $_POST['fax3'] ) && !preg_match( '/^\d+$/', $_POST['fax1'] . $_POST['fax2'] . $_POST['fax3'] ) )
        $form->_errors['fax1']   = 'FAX番号は半角数字で入力してください。';

    if( $_POST['eMail'] && !preg_match( '/^[^@]+@[^@]+$/', $_POST['eMail'] ) )
        $form->_errors['eMail'] = 'メールアドレスの入力形式が違います。';

}

$form->setRequiredNote( '<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;">の項目は必ず入力してください。</span>' );
$form->setJsWarnings( '*の項目は必ず入力してください。', "\n\n" . TITLE );

$form->setDefaults( $data );

$form->freeze();


if( $_POST['category'] != 8 )unset( $_FILES[5] );
//仮ファイルをフォルダにアップ
$fileFlg = fileTempUpload( $_FILES, './temp/'/*$tempPath*/, '../upImage/'/*$uploadPath*/, $maxWidth, $maxHeight, 200/*$smallWidth*/, 200/*$smallHeight*/ );

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
        //画像処理
        $fileArray = fileUpload( $_POST, $data, $maxImageCnt );

        //DB登録修正処理
        $saveParam = array(
            'tableName'     => SQL_TABLE_NAME, 
            'data'          => $_POST, 
            'anData'        => array( 'submitConf', 'submitReg', 'submitReturn', 'reset', 'memberId', 'MAX_FILE_SIZE', 'imageDel', 'fileName' ), 
            'connectionKey' => array( '', '' ), 
            'timeKey'       => array(), 
            'dateKey'       => array(), 
            'dateTimeKey'   => array(), 
            'fileArray'     => /*$fileArray*/array(), 
            'fileAnData'    => array( /*'imageDel', 'pictureOutsideFlg'*/ ), 
            'lastFlg'       => 1, 
            'id'            => $_POST['memberId'], 
            'idName'        => 'memberId', 
            'limitFlg'      => 1, 
        );

        $save = new CreatQueryDB();
        $save->_setParam( $saveParam );
        $id = $save->Save();

        $save->queryObj->DisConnect();

        //systemContentsDB::KindSave( $_POST['kind'], $_POST['stockNumber'], $id );
        unset( $_SESSION[FILE_SESSION_KEY] );

        tempFileClean();

        header( 'Location: ./' . FILE_CATEGORY . 'List.php?r=1' );
        die;
    }
}

$smarty = new Smarty;

$renderer = new HTML_QuickForm_Renderer_ArraySmarty( $smarty );
$form->accept( $renderer );
$smarty->assign( 'form', $renderer->toArray() );

$smarty->assign( 'flg',             $flg );
$smarty->assign( 'data',            $data );
$smarty->assign( 'hiddenValue',     $hiddenValue );
$smarty->assign( 'confComment',     $confComment );
$smarty->assign( 'fileFlg',         $fileFlg );
$smarty->assign( 'fileName',        $fileName );
$smarty->assign( 'image',           $data['image'] );
$smarty->assign( 'maxWidth',        $maxWidth );
$smarty->assign( 'maxHeight',       $maxHeight );
$smarty->assign( 'maxImageCnt',     $maxImageCnt );


$smarty->display( THE_FILE_NAME . '.html' );
?>
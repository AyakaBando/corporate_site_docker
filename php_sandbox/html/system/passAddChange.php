<?php
require_once( '../inc/auth.php' );
require_once( './systemConsts.php' );
require_once( '../inc/lib/DB/.systemLoginDB.class.php' );

//DBインスタンス
$query       = new systemLoginDB();

if( $_GET['id'] )
    $data = $query->GetManegerData( $_GET['id'] );

//フォーム作成
$form = new HTML_QuickForm( 'otoiawase', 'post' );
$form->addElement( 'text',        'name',     '管理者氏名',    array( 'size' => 26, 'maxlength' => 20 ) );
$form->addElement( 'text',        'account',  'アカウント名',  array( 'size' => 26, 'maxlength' => 20 ) );
$form->addElement( 'text',        'password', 'パスワード',    array( 'size' => 26, 'maxlength' => 20 ) );
$form->addElement( 'advcheckbox', 'dispFlg',  'このパスワードを使用する', 'このパスワードを使用する', array( 0, 1 ) );

$form->addElement( 'submit', 'submitConf',    '確認',          array( 'class' => 'submits' ) );
$form->addElement( 'submit', 'submitReg',     '更新',          array( 'class' => 'submits' ) );
$form->addElement( 'submit', 'submitReturn',  '戻る',          array( 'class' => 'submits' ) );
$form->addElement( 'reset',  'reset',         'リセット',      array( 'class' => 'submits' ) );

//エラー処理
$form->applyFilter( '__ALL__', 'trim');
$form->addRule( 'name',     '管理者指名を入力してください。',                          'required', null, 'client' );
$form->addRule( 'account',  'アカウント名を入力してください。',                        'required', null, 'client' );
$form->addRule( 'password', 'パスワードを入力してください。',                          'required', null, 'client' );
$form->addRule( 'account',  '★アカウント名は半角英数字のみで入力してください。',      'alphanumeric', null,   'client' );
$form->addRule( 'account',  '★アカウント名は4文字以上20文字以内で入力してください。', 'regex', '/^.{4,20}$/', 'client' );
$form->addRule( 'password', '★パスワードは半角英数字のみで入力してください。',        'alphanumeric', null,   'client' );
$form->addRule( 'password', '★パスワードは4文字以上20文字以内で入力してください。',   'regex', '/^.{4,20}$/', 'client' );

if( isset( $_REQUEST['id'] ) )
    $form->addElement( 'hidden',      'id',             $data['passwordId'] );

if( $_POST['submitConf'] )
{
    if( $checkAccount ) $form->_errors['account'] = '入力されたアカウントは登録されています。';
}

$form->setRequiredNote( '<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;">の項目は必ず入力してください。</span>' );
$form->setJsWarnings( '*の項目は必ず入力してください。', "\n\n" . TITLE );

$form->setDefaults( $data );

if ( $form->validate() )
{
    if( isset( $_POST['submitConf'] ) )
    {
        $form->freeze();
        $flg = 1;
    }

    if( isset( $_POST['submitReg'] ) )
    {
        //パスワード登録
        $query->PassSave( $_POST );
        header("Location: ./passAddChange.php?id=1&r=1");
        exit;
    }
}

$smarty = new Smarty;

$renderer = new HTML_QuickForm_Renderer_ArraySmarty( $smarty );
$form->accept( $renderer );
$smarty->assign( 'form', $renderer->toArray() );
$smarty->assign( 'flg', $flg );

$smarty->display( 'passAddChange.html' );
?>
<?php
//ini_set('error_reporting', E_ALL & ~E_NOTICE );
//ini_set('display_errors', 1);
session_start();
require_once( '../inc/lib/DB/.systemLoginDB.class.php' );
require_once( './systemConsts.php' );


$query = new systemLoginDB();

if( is_numeric( $_SESSION['authUser']['flg'] ) )
{
    header( "Location: ./login.php" );
    exit;
}

if( $_COOKIE['kaniChk'] )
{
    $data['account'] = $query->GetAccount();
    $data['kaniChk'] = 1;
}


$form = new HTML_QuickForm( 'login', 'post' );

$form->addElement( 'text',        'account',    'アカウント', array( 'size' => 32, 'id' => 'username' ) );
$form->addElement( 'password',    'password',   'パスワード', array( 'size' => 32, 'id' => 'userpw' ) );
$form->addElement( 'advcheckbox', 'kaniChk',    '次回からのIDの入力を省略', '次回からのIDの入力を省略', array( 0, 1 ) );
$form->addElement( 'submit',      'submitConf', 'LOGIN',      array( 'class' => 'submits minisubmit' ) );

$form->setDefaults( $data );

$form->addRule( 'account',  'アカウントを入力してください。', 'required', null, 'client' );
$form->addRule( 'password', 'パスワードを入力してください。', 'required', null, 'client' );

if( $_POST['submitConf'] )
{
    //$checkData = queserserDB::CheckAuthor( $_POST )
    if( $query->CheckAuthor( $_POST ) === false )
        $form->_errors['account']   = 'アカウントかパスワードがちがいます。';

    //if( !$checkData['account'] )  $form->_errors['account']   = 'アカウントがちがいます。';
    //if( !$checkData['password'] ) $form->_errors['password']  = 'パスワードが違います。';
}

$form->setRequiredNote( '<span style="font-size:80%; color:#ff0000;">下記</span><span style="font-size:80%;">の項目は必ず入力してください。</span>' );
$form->setJsWarnings( '下記の項目は必ず入力してください。', "\n\n" . TITLE );

if( $form->validate() )
{
    $_SESSION['authUser']           = $query->GetLoginParam( $_POST );
    $_SESSION['authUser']['flg']    = 1;

    if( $_POST['kaniChk'] )
        setcookie( 'kaniChk', 1,  time() + 3600 * 24 + 30 );
    else
        setcookie( 'kaniChk', '', time() - 3600 );

    header( "Location: ./login.php" );
    die;
}


$smarty = new Smarty;

$renderer = new HTML_QuickForm_Renderer_ArraySmarty( $smarty );
$form->accept( $renderer );
$smarty->assign( 'form', $renderer->toArray() );

$smarty->display('index.html');
?>
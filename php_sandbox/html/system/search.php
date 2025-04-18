<?php
require_once( dirname(__FILE__) . '/./systemConsts.php' );
require_once( dirname(__FILE__) . '/../inc/lib/DB/.systemProductDB.class.php' );

define( 'SQL_TABLE_NAME', 'product' );
define( 'PAGE_TITLE',     '検索' );
define( 'THE_FILE_NAME',  'search' );

$query       = new systemContentsDB();
$systemquery = new systemDB();

$makerArray          = $systemquery->GetMaker( null, 1 );
$categoryMasterArray = categoryMasterArray( 1 );
//$alphabetArray = alphabetArray();

{
    //$data = systemStaffDB::StaffDetail( $_GET['staffId'] );
}
if( $_GET['id'] )
    $_GET['unId'] = $_GET['id'];


switch( $_GET['t'] )
{
    case 'related':
        $_GET['unOption'] = 1;
        if( $_GET['word'] )$listData = $query->DataList( 0, 100000, $_GET );
        break;

    case 'option':
        $_GET['option'] = 1;
        if( $_GET['word'] )$listData = $query->DataList( 0, 100000, $_GET );
        break;

    default: break;
}


//print_r($listData);
//フォーム作成
$form = new HTML_QuickForm( 'item', 'get' );



$form->addElement( 'text',     'word',          'フリーワード',  array( 'size' => 34, 'id' => 'searchFreeWord' ) );
//$form->addElement( 'text',     'kana',          'カナ',          array( 'size' => 34, 'id' => 'searchKana', 'style' => 'ime-mode: active;' ) );
//$form->addElement( 'select',   'searchCampany', '企業',          systemDB::GetCampany(), array( 'id' => 'searchCampany', 'style' => 'padding:3px;' ) );
//$hardObj = $form->getElement( 'searchCampany' );
//$hardObj->setMultiple( true );
$form->addElement( 'hidden',  't',     $_REQUEST['t'] );
if( $_GET['id'] )$form->addElement( 'hidden',  'id',     $_REQUEST['id'] );

$form->addElement( 'submit',    'submitConf',    '確認',         array( 'class' => 'base01') );
$form->addElement( 'submit',    'submitReg',     '更新',         array( 'class' => 'base01') );
$form->addElement( 'submit',    'submitReturn',  '戻る',         array( 'class' => 'base02') );
//$form->addElement( 'reset',     'reset',         'リセット',     array( 'class' => 'submits' ) );

$form->applyFilter( '__ALL__', 'trim' );

//エラー処理
//$form->addRule( 'freeWord',   '名前[姓]を入力してください。',           'required',  null );


/*
//エラー追加処理
if( $_POST['submitConf'] )
{
    if( systemLoginDB::GetAccount( $_POST ) )
        $form->_errors['account'] = 'そのアカウントは既に登録されています。';
}
*/

$form->setRequiredNote( '<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;">の項目は必ず入力してください。</span>' );
$form->setJsWarnings( '*の項目は必ず入力してください。', "\n\n" . TITLE );

$form->setDefaults( $_GET );



$smarty = new Smarty;

$renderer = new HTML_QuickForm_Renderer_ArraySmarty( $smarty );
$form->accept( $renderer );
$smarty->assign( 'form', $renderer->toArray() );

$smarty->assign( 'flg',                 $flg );
$smarty->assign( 'listData',            $listData );
$smarty->assign( 'makerArray',          $makerArray );
$smarty->assign( 'categoryMasterArray', $categoryMasterArray );

$smarty->display( THE_FILE_NAME . '.html' );
?>
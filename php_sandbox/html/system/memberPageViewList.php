<?php
require_once( '../inc/auth.php' );
require_once( './systemConsts.php' );
require_once( '../inc/lib/DB/.systemProductDB.class.php' );

define( 'SQL_TABLE_NAME',  'product' );
define( 'PAGE_TITLE',      '会員製品ページアクセス数' );
define( 'FILE_CATEGORY',   'memberPageView' );
define( 'THE_FILE_NAME',   FILE_CATEGORY . 'List' );
define( 'PAGE_NUM',        1 );
define( 'CHENGE_FLG',      0 );
define( 'SORT_FLG',        0 );

unset( $_SESSION[FILE_CATEGORY] );
//DBインスタンス
$query       = new systemContentsDB();
$systemquery = new systemDB();


//ページャー設定
$listCount = $query->Datalist( SQL_TABLE_NAME, $query->ListWhere( $_GET ) );
$limit     = 30;
$ls        = 0;
if( isset( $_REQUEST['ls'] ) ) $ls = $_REQUEST['ls'] * $limit - $limit;

$cnt['start'] = $ls + 1;
if( !$listCount ) $cnt['start'] = 0;
$cnt['end']   = $cnt['start'] + $limit - 1;
if( $cnt['end'] > $listCount ) $cnt['end'] = $listCount;


//if( $_GET['compId'] )
//    $title = $query->GetCulumnContents( SQL_TABLE_NAME, 'name', 'id', $_GET['compId'], 1 );


$data     = $query->DataList( $ls, $limit, $_GET );
$dataCnt  = $query->DataCountList( $_GET );

$getLink              = createGetLink( array( 'mode', 'id', 'd', 't', 'r', 'disp', 'spotlight', 'cp' ), $_GET );
$sortLink             = createGetLink( array( 'mode', 'id', 'd', 't', 'r', 'disp', 'cond', 'sort', 'spotlight', 'cp' ), $_GET );
//$makerArray          = $systemquery->GetMaker( null, 1 );
$productCategoryArray = productCategoryArray( 1 );
$yearArray            = $query->MemberViewArchiveList( 1 );
$monthArray           = monthArray();

//削除処理
if( isset( $_POST['del_x'] ) )
{
    $delet = $query->ProductDataDelete( $_POST );
    //if( $_POST['fileName'] )@unlink( '../upImage/' . FILE_CATEGORY . '/' . $POST['fileName'] );
    header( 'Location: ./' . THE_FILE_NAME . '.php' . $getLink['all'] . ( $getLink['all'] ? '&' : '?' ) . 'd=1&t=' . $delet );
    die;
}
//表示設定処理
if( isset( $_POST['dispButton_x'] ) )
{
    $dispChange = $query->DispChange( SQL_TABLE_NAME, $_POST, array( 'dispFlg' => 'dispFlg', 'title' => 'name', 'id' => 'id' ) );
    header( 'Location: ./' . THE_FILE_NAME . '.php' . $getLink['all'] . ( $getLink['all'] ? '&' : '?' ) . 'd=2&compId=' . $dispChange . '&dispFlg=' . $_POST['dispFlg'] );
    die;
}
/*
//コピー処理
if( $_GET['cp'] == 1 )
{
    $title = systemContentsDB::CopyData( $_GET );
    header( 'Location: ./' . THE_FILE_NAME . '.php' . $getLink['all'] . ( $getLink['all'] ? '&' : '?' ) . 'd=3&t=' . $title );
    die;
}
*/

// $query->DisConnect();

//フォーム作成
$form = new HTML_QuickForm( 'item', 'get' );
$form->addElement( 'select',       'year',         '年',       $yearArray,  array( 'style' => 'max-width:300px;' ) );
$form->addElement( 'select',       'month',        '月',       $monthArray, array( 'style' => 'padding:1px 4px;' ) );
if( $_REQUEST['id'] ) $form->addElement( 'hidden',  'id',     $_REQUEST['id'] );


$form->addElement( 'submit',       'submitSearch', '絞込み',   array() );
/*
$form->addElement( 'text',    'dateStart[Y]',    '期間始[年]',      array( 'size' => 6, 'maxlength' => 4 ) );
$form->addElement( 'text',    'dateStart[m]',    '期間始[月]',      array( 'size' => 4, 'maxlength' => 2 ) );
$form->addElement( 'text',    'dateStart[d]',    '期間始[日]',      array( 'size' => 4, 'maxlength' => 2 ) );
$form->addElement( 'text',    'dateEnd[Y]',      '期間終[年]',      array( 'size' => 6, 'maxlength' => 4 ) );
$form->addElement( 'text',    'dateEnd[m]',      '期間終[月]',      array( 'size' => 4, 'maxlength' => 2 ) );
$form->addElement( 'text',    'dateEnd[d]',      '期間終[日]',      array( 'size' => 4, 'maxlength' => 2 ) );
*/

$form->applyFilter( '__ALL__', 'trim' );
//エラー追加処理
if( isset( $_GET['submitSearch'] ) )
{
    if( !$_GET['year'] && $_GET['month'] )
        $form->_errors['month'] = '年を選択してください。';

    if( !$_GET['year'] && !$_GET['month'] )
        $form->_errors['month'] = '年と月を選択してください。';
}


$pageParam = array(
    'totalItems' => $listCount, 
    'delta'      => 4, 
    'perPage'    => $limit, 
    'mode'       => 'Sliding', 
    'httpMethod' => 'GET',
    'altFirst'   => 'First', 
    'altPrev'    => 'PrevPage', 
    'prevImg'    => '&#139; PREV', 
    'altNext'    => 'NextPage', 
    'nextImg'    => 'NEXT &#155;', 
    'altLast'    => 'Last', 
    'altPage'    => '', 
    'separator'  => ' | ', 
    'append'     => 1, 
    'urlVar'     => 'ls', 
);

$pager      = pager::factory( $pageParam );
$pagerLinks = $pager->getLinks();

$smarty = new Smarty;

$renderer = new HTML_QuickForm_Renderer_ArraySmarty( $smarty );
$form->accept( $renderer );
$smarty->assign( 'form', $renderer->toArray() );

$smarty->assign( 'data',                $data );//DBデータ取得
$smarty->assign( 'pagerLinks',          $pagerLinks );
$smarty->assign( 'listCount',           $listCount );
$smarty->assign( 'cnt',                 $cnt );
$smarty->assign( 'getLink',             $getLink );
$smarty->assign( 'sortLink',            $sortLink );
$smarty->assign( 'referer',             $referer );
$smarty->assign( 'categoryMasterArray', $categoryMasterArray );
$smarty->assign( 'title',               $title );
$smarty->assign( 'dataCnt',             $dataCnt );


$smarty->display( THE_FILE_NAME . '.html' );
?>
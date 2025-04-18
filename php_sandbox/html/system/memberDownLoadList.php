<?php
require_once( '../inc/auth.php' );
require_once( './systemConsts.php' );
require_once( '../inc/lib/DB/.systemProductDB.class.php' );

define( 'SQL_TABLE_NAME',  'product' );
define( 'PAGE_TITLE',      '製品ダウンロード' );
define( 'FILE_CATEGORY',   'memberDownLoad' );
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
$limit     = 60;
$ls        = 0;
if( isset( $_REQUEST['ls'] ) ) $ls = $_REQUEST['ls'] * $limit - $limit;

$cnt['start'] = $ls + 1;
if( !$listCount ) $cnt['start'] = 0;
$cnt['end']   = $cnt['start'] + $limit - 1;
if( $cnt['end'] > $listCount ) $cnt['end'] = $listCount;


//if( $_GET['compId'] )
//    $title = $query->GetCulumnContents( SQL_TABLE_NAME, 'name', 'id', $_GET['compId'], 1 );


$data     = $query->DataList( $ls, $limit, $_GET );
$dataCnt  = $query->MemberDownLoadList( $_GET );

$getLink              = createGetLink( array( 'mode', 'id', 'd', 't', 'r', 'disp', 'spotlight', 'cp' ), $_GET );
$sortLink             = createGetLink( array( 'mode', 'id', 'd', 't', 'r', 'disp', 'cond', 'sort', 'spotlight', 'cp' ), $_GET );
//$makerArray           = $systemquery->GetMaker( null, 1 );
$productCategoryArray = productCategoryArray( 1 );


//print_r($data);
//print_r($dataCnt);


//検索
$form = new HTML_QuickForm( 'item', 'get' );

$form->addElement( 'select',  'makerId',         'メーカー',        $makerArray['maker'] );
$form->addElement( 'select',  'category',        'サブタイトル',    $categoryMasterArray );
$form->addElement( 'text',    'name',            '商品名',          array( 'size' => 80 ) );

/*
$form->addElement( 'text',    'dateStart[Y]',    '期間始[年]',      array( 'size' => 6, 'maxlength' => 4 ) );
$form->addElement( 'text',    'dateStart[m]',    '期間始[月]',      array( 'size' => 4, 'maxlength' => 2 ) );
$form->addElement( 'text',    'dateStart[d]',    '期間始[日]',      array( 'size' => 4, 'maxlength' => 2 ) );
$form->addElement( 'text',    'dateEnd[Y]',      '期間終[年]',      array( 'size' => 6, 'maxlength' => 4 ) );
$form->addElement( 'text',    'dateEnd[m]',      '期間終[月]',      array( 'size' => 4, 'maxlength' => 2 ) );
$form->addElement( 'text',    'dateEnd[d]',      '期間終[日]',      array( 'size' => 4, 'maxlength' => 2 ) );
*/

$form->applyFilter( '__ALL__', 'trim' );



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
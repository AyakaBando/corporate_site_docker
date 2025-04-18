<?php
require_once( '../../inc/auth.php' );
require_once( '../systemConsts.php' );
require_once( '../../inc/lib/DB/.systemEnProductDB.class.php' );

define( 'SQL_TABLE_NAME',  'en_product' );
define( 'PAGE_TITLE',      '英語サイト：製品' );
define( 'FILE_CATEGORY',   'product' );
define( 'THE_FILE_NAME',   FILE_CATEGORY . 'List' );
define( 'PAGE_NUM',        1 );
define( 'CHENGE_FLG',      1 );
define( 'SORT_FLG',        1 );

unset( $_SESSION[FILE_CATEGORY] );
//DBインスタンス
$query       = new systemContentsDB();
$systemquery = new systemDB();


//ページャー設定
$listCount = $query->listCount( SQL_TABLE_NAME, $query->ListWhere( $_GET ) );
$limit     = 20;
$ls        = 0;
if( isset( $_REQUEST['ls'] ) ) $ls = $_REQUEST['ls'] * $limit - $limit;

$cnt['start'] = $ls + 1;
if( !$listCount ) $cnt['start'] = 0;
$cnt['end']   = $cnt['start'] + $limit - 1;
if( $cnt['end'] > $listCount ) $cnt['end'] = $listCount;

//$useArray     = $systemquery->GetUse( 1, 1 );
//$partArray    = $systemquery->GetPart( 1, 1 );

if( $_GET['compId'] )
    $title = $query->GetCulumnContents( SQL_TABLE_NAME, 'name', 'id', $_GET['compId'], 1 );


$data = $query->DataList( $ls, $limit, $_GET );

$getLink             = createGetLink( array( 'mode', 'id', 'd', 't', 'r', 'disp', 'spotlight', 'cp' ), $_GET );
$sortLink            = createGetLink( array( 'mode', 'id', 'd', 't', 'r', 'disp', 'cond', 'sort', 'spotlight', 'cp' ), $_GET );
//$makerArray          = $systemquery->GetMaker( null, 1 );
$productCategoryArray  = En_productCategoryArray( 1 );
$categoryArray         = $systemquery->En_GetCategory( 1, null );


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

$pager      = Pager::factory( $pageParam );
$pagerLinks = $pager->getLinks();

$smarty = new Smarty;

$renderer = new HTML_QuickForm_Renderer_ArraySmarty( $smarty );
$form->accept( $renderer );
$smarty->assign( 'form', $renderer->toArray() );

$smarty->assign( 'data',                 $data );//DBデータ取得
$smarty->assign( 'pagerLinks',           $pagerLinks );
$smarty->assign( 'listCount',            $listCount );
$smarty->assign( 'cnt',                  $cnt );
$smarty->assign( 'getLink',              $getLink );
$smarty->assign( 'sortLink',             $sortLink );
$smarty->assign( 'referer',              $referer );
$smarty->assign( 'makerArray',           $makerArray );
$smarty->assign( 'title',                $title );
$smarty->assign( 'productCategoryArray', $productCategoryArray );
$smarty->assign( 'categoryArray',        $categoryArray);


$smarty->display( THE_FILE_NAME . '.html' );
?>
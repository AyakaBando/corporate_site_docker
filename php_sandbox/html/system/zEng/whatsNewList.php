<?php
require_once( '../../inc/auth.php' );
require_once( '../systemConsts.php' );
require_once( '../../inc/lib/DB/.systemEnWhatsNewDB.class.php' );

define( 'SQL_TABLE_NAME',    'en_whatsNew' );
define( 'PAGE_TITLE',        '英語サイト：ニュース' );
define( 'FILE_CATEGORY',     'whatsNew' );
define( 'THE_FILE_NAME',     FILE_CATEGORY . 'List' );
define( 'FILE_SESSION_KEY',  FILE_CATEGORY . 'pdf' );
define( 'IMG_SESSION_KEY',   FILE_CATEGORY . 'img' );
define( 'PAGE_NUM',          1 );

define( 'SORT_FLG',          null );

if( !$_POST )unset( $_SESSION[FILE_SESSION_KEY], $_SESSION[IMG_SESSION_KEY] );

//DBインスタンス
$query       = new systemWhatsNewDB();

$productNewsContentsCategory = productNewsContentsCategory();
$productNewsType             = productNewsType();



//ページャー設定
if( $_GET['category'] )
    $sqlWhere = " WHERE `category` = '" . $param['category'] . "' ";

$listCount = $query->Datalist( SQL_TABLE_NAME, $sqlWhere );
$limit     = 20;
$ls        = 0;
if( isset( $_REQUEST['ls'] ) ) $ls = $_REQUEST['ls'] * $limit - $limit;
$cnt['start'] = $ls + 1;
if( !$listCount ) $cnt['start'] = 0;
$cnt['end']   = $cnt['start'] + $limit - 1;
if( $cnt['end'] > $listCount ) $cnt['end'] = $listCount;


$getLink  = createGetLink( array( 'mode', 'id', 'disp', 'd', 't', 'r', 'dispFlg', 'spotlight' ), $_GET );
$sortLink = createGetLink( array( 'mode', 'id', 'disp', 'd', 't', 'r', 'dispFlg', 'cond', 'sort', 'spotlight' ), $_GET );

//フォーム作成
$form = new HTML_QuickForm( 'item', 'get' );
$form->addElement( 'select',    'category',        'カテゴリ',             $whatsNewCategory );
$form->addElement( 'submit',    'submitConf',      '絞り込む',             array() );


//_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/
    // #表示切替処理
//_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/
//通常サイト
if( $_GET['mode'] == 'disp' )
{
    $dispChange = $query->DispChange( SQL_TABLE_NAME, $_GET, array( 'dispFlg' => 'dispFlg', 'title' => 'title', 'id' => 'id' ) );
    $title = $query->GetCulumnContents( SQL_TABLE_NAME, 'title', 'id', $dispChange, null );
    header( 'Location: ./' . THE_FILE_NAME . '.php' . $getLink['all'] . ( $getLink['all'] ? '&' : '?' ) . 'd=1&disp=' . $_GET['dispFlg'] . '&t=' . $title );
    die;
}


//_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/
    // #削除処理
//_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/
if( $_GET['mode'] == 'del' )
{
    $delet = $query->DataDelete( SQL_TABLE_NAME, $_GET, array( 'title' => 'title', 'id' => 'id' ) );

    header( 'Location: ./' . THE_FILE_NAME . '.php' . $getLink['all']. ( $getLink['all'] ? '&' : '?' ) . 'd=2&t=' . $delet );
    die;
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

$smarty->assign( 'data',                        $query->DataList( $_GET['id'], $ls, $limit, $_GET ) );//DBデータ取得
$smarty->assign( 'pagerLinks',                  $pagerLinks );
$smarty->assign( 'listCount',                   $listCount );
$smarty->assign( 'cnt',                         $cnt );
$smarty->assign( 'getLink',                     $getLink );
$smarty->assign( 'sortLink',                    $sortLink );
$smarty->assign( 'whatsNewContentsCategory', whatsNewContentsCategory() );
$smarty->assign( 'whatsNewCategory',         whatsNewCategory() );



$smarty->display( THE_FILE_NAME . '.html' );
?>
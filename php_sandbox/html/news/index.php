<?php
require_once( dirname(__FILE__) . '/../inc/config.php' );
require_once( dirname(__FILE__) . '/../inc/contentsConfig.php' );
require_once( dirname(__FILE__) . '/../inc/lib/DB/.contentsDB.class.php' );

define( 'THE_DIR_NAME',   'news' );
define( 'THE_FILE_NAME',  'index' );

$query            = new contentsDB();
$whatsNewCategory = whatsNewCategory();

$limit     = 10;
$ls        = 0;

//if( !$_GET['y'] )$_GET['y'] = date( 'Y' );

if( !$_GET['c'] )$_GET['c'] = 1;

if( isset( $_REQUEST['ls'] ) ) $ls = $_REQUEST['ls'] * $limit - $limit;

$data = $query->NewsList( $ls, $limit, $_GET['y'], $_GET['c'] );
//if( $_GET['y'] && preg_match( '/^\d{4}$/', $_GET['y'] ) )
//    $sqlWhere .= " AND DATE_FORMAT( `dateTime`, '%Y' ) = '" . $_GET['y'] . "' ";

if( $_GET['c'] && preg_match( '/^\d{1}$/', $_GET['c'] ) )
    $sqlWhere .= " AND `category` = '" . $_GET['c'] . "' ";

$listCount            = $query->listCount( 'whatsNew', " WHERE `dispFlg` = 1 " . $sqlWhere );
//$archiveList          = $query->WhatsNewArchiveList( $_GET );

//$cnt['start'] = $ls + 1;
//if( !$listCount ) $cnt['start'] = 0;
//$cnt['end']   = $cnt['start'] + $limit - 1;
//if( $cnt['end'] > $listCount ) $cnt['end'] = $listCount;

$pageParam = array(
    'totalItems'            => $listCount, 
    'delta'                 => 4, 
    'perPage'               => $limit, 
    'mode'                  => 'Sliding', 
    'httpMethod'            => 'GET',
    'altFirst'              => 'First', 
    'altPrev'               => 'PrevPage', 
    'prevImg'               => '前の15件', 
    'altNext'               => 'NextPage', 
    'nextImg'               => '次の15件', 
    'altLast'               => 'Last', 
    'altPage'               => '', 
    'separator'             => '', 
    'append'                => 1, 
    'urlVar'                => 'ls', 
    'spacesBeforeSeparator' => 0, 
    'spacesAfterSeparator'  => 0, 
);

$pager         = pager::factory( $pageParam );
$pagerLinks    = $pager->getLinks();
$pagerLink_rep = pagerReplace( $pagerLinks, $pager );


$smarty->template_dir = SMARTY_TEMPLATE_PATH    . THE_DIR_NAME;
$smarty->compile_dir  = SMARTY_TEMPLATE_C_PATH  . THE_DIR_NAME;

$smarty->assign( 'list',             $data );
$smarty->assign( 'pagerLinks',       $pagerLink_rep );
//$smarty->assign( 'archiveList',      $archiveList );
$smarty->assign( 'whatsNewCategory', $whatsNewCategory );

$smarty->display( THE_FILE_NAME . '.html' );
?>
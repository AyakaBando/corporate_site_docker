<?php
require_once( dirname(__FILE__) . '/../../inc/config.php' );
require_once( dirname(__FILE__) . '/../../inc/contentsConfig.php' );
require_once( dirname(__FILE__) . '/../../inc/lib/DB/.contentsEnDB.class.php' );

define( 'THE_DIR_NAME',   'news' );
define( 'THE_FILE_NAME',  'detail' );

$query       = new contentsEnDB();


$whatsNewCategory    = En_whatsNewCategory();
$data                = $query->NewsDetail( $_GET['id'] );
//$archiveList         = $query->WhatsNewArchiveList( $_GET );
$_GET['y'] = substr( $data['dateTime'], 0, 4 );


$pageData = $query->NewsList( 0, 10000, null, $data['category'], 1 );
foreach( (array)$pageData AS $key => $value )
{
    if( $value['id'] == $_GET['id'] )
    {
        $baseKey = $key;
        break;
    }
}

$page['nextID'] = $pageData[$baseKey+1]['id'];
$page['bageID'] = $pageData[$baseKey-1]['id'];


$smarty->template_dir = SMARTY_TEMPLATE_PATH    . THE_DIR_NAME;
$smarty->compile_dir  = SMARTY_TEMPLATE_C_PATH  . THE_DIR_NAME;

$smarty->assign( 'data',               $data );
$smarty->assign( 'whatsNewCategory',   $whatsNewCategory );
$smarty->assign( 'archiveList',        $archiveList );
$smarty->assign( 'page',               $page );

$smarty->display( THE_FILE_NAME . '.html' );
?>
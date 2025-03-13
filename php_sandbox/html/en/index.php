<?php
require_once( dirname(__FILE__) . '/../inc/config.php' );
require_once( dirname(__FILE__) . '/../inc/contentsConfig.php' );
require_once( dirname(__FILE__) . '/../inc/lib/DB/.systemDB.class.php' );
require_once( dirname(__FILE__) . '/../inc/lib/DB/.contentsEnDB.class.php' );

define( 'THE_DIR_NAME',   '' );
define( 'THE_FILE_NAME',  'index' );

$query       = new contentsEnDB();
$systemquery = new systemDB();

$productCategoryArray = En_productCategoryArray();
$middleCategory       = $systemquery->En_GetCategory( 1 );

$whatsNewCategory     = En_whatsNewCategory();

/*--------------------------------------------------
    >> 製品
--------------------------------------------------*/
//画像取得
$imgArray = $query->ProductImageList();

foreach( (array)$productCategoryArray AS $bkey => $bvalue )
{
    foreach( (array)$middleCategory[$bkey] AS $key => $value )
    {
        $i['category'] = $key;
        $puroductData[$key] = $query->ProductList( 0, 7, $i );
    }
}

$data = $query->ProductList( 0, 1000 );

//print_r( $puroductData );

/*--------------------------------------------------
    >> 新着
--------------------------------------------------*/
foreach( (array)$whatsNewCategory AS $key => $value )
{
    $newsData[$key] = $query->NewsList( 0, 3, null, $key );
}


/*--------------------------------------------------
    >> メインビジュアル
--------------------------------------------------*/
$imgData = $query->MainVisualList();



$smarty->template_dir = SMARTY_TEMPLATE_PATH    . THE_DIR_NAME;
$smarty->compile_dir  = SMARTY_TEMPLATE_C_PATH  . THE_DIR_NAME;


$smarty->assign( 'productCategoryArray',  $productCategoryArray );
$smarty->assign( 'middleCategory',        $middleCategory );
$smarty->assign( 'puroductData',          $puroductData );
$smarty->assign( 'imgArray',              $imgArray );
$smarty->assign( 'data',                  $data );
$smarty->assign( 'whatsNewCategory',      $whatsNewCategory );
$smarty->assign( 'newsData',              $newsData );
$smarty->assign( 'imgData',               $imgData );

$smarty->display( THE_FILE_NAME . '.html' );
?>

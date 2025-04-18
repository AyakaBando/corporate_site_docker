<?php
require_once( dirname(__FILE__) . '/inc/config.php' );
require_once( dirname(__FILE__) . '/inc/contentsConfig.php' );
require_once( dirname(__FILE__) . '/inc/lib/DB/.systemDB.class.php' );
require_once( dirname(__FILE__) . '/inc/lib/DB/.contentsDB.class.php' );
require_once( dirname(__FILE__) . '/inc/lib/DB/.queserser.DB.class.php' );



// Initialize Smarty
$smarty = new Smarty;
$smarty->setTemplateDir('/var/www/html/templates');
$smarty->setCompileDir('/var/www/html/templates_c');
$smarty->setCacheDir('/var/www/html/cache');

define( 'THE_DIR_NAME',   '' );
define( 'THE_FILE_NAME',  'index' );

$query       = new contentsDB();
$systemquery = new systemDB();


/*--------------------------------------------------
    Import Products
--------------------------------------------------*/

$productCategoryArray = productCategoryArray();
$middleCategory       = $systemquery->GetCategory( 1 );

$whatsNewCategory     = whatsNewCategory();

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


/*--------------------------------------------------
    Import News
--------------------------------------------------*/
foreach( (array)$whatsNewCategory AS $key => $value )
{
    $newsData[$key] = $query->NewsList( 0, 3, null, $key );
}

$imgData = $query->MainVisualList();


$smarty->assign( 'productCategoryArray',  $productCategoryArray );
$smarty->assign( 'middleCategory',        $middleCategory );
$smarty->assign( 'puroductData',          $puroductData );
$smarty->assign( 'imgArray',              $imgArray );
$smarty->assign( 'data',                  $data );
$smarty->assign( 'whatsNewCategory',      $whatsNewCategory );
$smarty->assign( 'newsData',              $newsData );
$smarty->assign( 'imgData',               $imgData );

$smarty->display( THE_FILE_NAME . '.html' );


// Display the template
// $smarty->display('index.html');
<?php
require_once( dirname(__FILE__) . '/../../../inc/config.php' );
require_once( dirname(__FILE__) . '/../../../inc/contentsConfig.php' );
//require_once( dirname(__FILE__) . '/../inc/lib/DB/.contentsDB.class.php' );

define( 'THE_DIR_NAME',   'common' );
define( 'THE_FILE_NAME',  'header' );


$smarty->template_dir = SMARTY_TEMPLATE_PATH    . THE_DIR_NAME;
$smarty->compile_dir  = SMARTY_TEMPLATE_C_PATH  . THE_DIR_NAME;

$smarty->display( THE_FILE_NAME . '.html' );
?>
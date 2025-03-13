<?php
require_once( dirname(__FILE__) . '/../inc/config.php' );
require_once( dirname(__FILE__) . '/../inc/contentsConfig.php' );
require_once( dirname(__FILE__) . '/../inc/lib/DB/.systemSaveDB.class.php' );

if( !$_SESSION['member']['flg'] )
{
    header( 'Location: /' );
    die;
}

define( 'THE_DIR_NAME',   'change' );
define( 'THE_FILE_NAME',  'thanks' );


$smarty->template_dir = SMARTY_TEMPLATE_PATH    . THE_DIR_NAME;
$smarty->compile_dir  = SMARTY_TEMPLATE_C_PATH  . THE_DIR_NAME;

$smarty->display( THE_FILE_NAME . '.html' );
?>

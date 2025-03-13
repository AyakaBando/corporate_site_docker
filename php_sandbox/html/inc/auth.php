<?php
ini_set( 'error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED );// & ~E_USER_DEPRECATED
ini_set( 'display_errors', 1 );
session_start();
$adminFlg = 0;
if( $_SESSION['authUser']['flg'] != 1 )
{
    header( "Location: ./index.php" );
    exit;
}
if( $_SESSION['authUser']['author'] == 1 )
    $adminFlg++;
?>

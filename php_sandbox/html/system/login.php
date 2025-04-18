<?php
require_once( '../inc/auth.php' );
require_once( './systemConsts.php' );

//print_r($_SESSION);
$smarty = new Smarty;

$smarty->display('login.html');
?>
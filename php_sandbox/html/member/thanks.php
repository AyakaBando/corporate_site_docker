<?php
require_once( dirname(__FILE__) . '/../inc/config.php' );
require_once( dirname(__FILE__) . '/../inc/contentsConfig.php' );
require_once( dirname(__FILE__) . '/../inc/lib/DB/.systemSaveDB.class.php' );

define( 'THE_DIR_NAME',   'member' );
define( 'THE_FILE_NAME',  'thanks' );


session_start();
$session = $_SESSION['member_form'];
$_SESSION['member_form'] = array();

$url = '';
if ($session) {
  $url = '<iframe src="https://ma.moritaalumi.co.jp/l/1048092/2023-11-14/53y?companyName=' . $session['companyName'] . '&lastname=' . $session['sei'] . '&firstname=' . $session['mei'] . '&relationJob=' . $session['relationJoby_data'] . '&subJobCategory=' . $session['subJobCategory_data'] . '&busyo=' . $session['busyo'] . '&eMail=' . $session['eMail'] . '&zip=' . $session['zip_data'] . '&address=' . $session['address_data'] . '&tel=' . $session['tel_data'] . '&fax=' . $session['fax_data'] . '&siteUrl=' . $session['siteUrl'] . '&medium=' . $session['know_data'] . '" width="1" height="1"></iframe>';
}

$smarty->template_dir = SMARTY_TEMPLATE_PATH    . THE_DIR_NAME;
$smarty->compile_dir  = SMARTY_TEMPLATE_C_PATH  . THE_DIR_NAME;

$smarty->assign( 'url', $url );

$smarty->display( THE_FILE_NAME . '.html' );
?>

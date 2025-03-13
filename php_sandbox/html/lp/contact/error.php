<?php
set_include_path( get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']);
require_once( "utils/CustomSmarty.class.php" );

$cs = new CustomSmarty( "Contact", "./tpl/" );

$templeteFile = "error.tpl";


$cs->display($templeteFile);



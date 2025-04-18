<?php
session_start();

unset( $_SESSION['member'] );


//header( "Location: " . $_SERVER['HTTP_REFERER'] );
header( "Location: /" );
exit;
?>
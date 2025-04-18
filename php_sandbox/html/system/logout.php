<?php
require_once( '../inc/auth.php' );


//session_destroy();
unset( $_SESSION['authUser'] );

header("Location: ./index.php?r=logout");
exit;
?>
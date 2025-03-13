<?php
function smarty_modifier_mbsubstr($string, $start, $maxlength)
{
	if( mbstrlen( $string ) <= $maxlength ) return $string;
	
	$ret = mbsubstr( $string , $start, $maxlength );
	
	return $ret;
}
?>

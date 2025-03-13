<?php
function smarty_modifier_number_format( $string, $decimal = 3, $dec_point = "", $thousands_sep = "")
{
	return number_format( $string, $decimal, $dec_point, $thousands_sep );
}
?>

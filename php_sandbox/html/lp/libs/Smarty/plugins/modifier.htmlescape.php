<?php
function smarty_modifier_htmlescape($string, $arrAllowTag)
{
    $string = htmlspecialchars($string, ENT_QUOTES );

    foreach($arrAllowTag as $tag)
    {
		$string = preg_replace_callback("/&lt;\/?".strtolower($tag)." ?.*&gt;/","htmlescape_unhtmlescape", $string);
		$string = preg_replace_callback("/&lt;\/?".strtoupper($tag)." ?.*&gt;/","htmlescape_unhtmlescape", $string);
	}

    return $string;
}

function htmlescape_unhtmlescape($string){
	
	$string = $string[0];
	
	$string = str_replace("&lt;", "<", $string);
	$string = str_replace("&gt;", ">", $string);
	$string = str_replace("&quot;", "\"", $string);
	return $string;
}
?>
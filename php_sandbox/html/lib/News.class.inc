<?php

class News
{
	// ニュースの出力順序を決める為の登録日付
	var $entry_dt;
	
	function getEntry_dt()
	{
		die("EntryNews::getEntry_dt() must be overridden");
	}
}
?>

<?php

class NewsBase
{
	var $entry_id;
	var $category_id;
	var $category_dir;
	var $title;
	var $entry_dt;
	var $filename;
	var $entry_text;
	var $entry_text2;

	function NewsBase( $entry_id, $category_id, $category_dir, $title, $entry_dt, $entry_dt_jpn, $entry_cre_dt, $entry_text, $entry_text2 )
	{
		$this->entry_id = $entry_id;
		$this->category_id = $category_id;
		$this->category_dir = $category_dir;
		$this->title = $title;
		$this->entry_dt = $entry_dt;
		$this->entry_dt_jpn = $entry_dt_jpn;
		$this->filename = $entry_cre_dt . $entry_id;
		$this->entry_text = $entry_text;
		$this->entry_text2 = $entry_text2;
		
	}
	
	function getEntryID()
	{
		return $this->entry_id;
	}

	function getCategoryID()
	{
		return $this->category_id;
	}

	function getCategoryDir()
	{
		return $this->category_dir;
	}

	function getTitle()
	{
		return $this->title;
	}

	function getEntry_dt()
	{
		return $this->entry_dt;
	}
	function getEntry_dt_jpn()
	{
		return $this->entry_dt_jpn;
	}

	function getFileName()
	{
		return $this->filename;
	}
	function getEntry_text()
	{
		return $this->entry_text;
	}
	function getEntry_text2()
	{
		return $this->entry_text2;
	}
}
?>

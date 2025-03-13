<?php

class News
{
	var $entry_id;
	var $category_id;
	var $category_dir;
	var $title;
	var $entry_dt;
	var $filename;

	function News( $entry_id, $category_id, $category_dir, $title, $entry_dt, $entry_dt_jpn, $entry_cre_dt )
	{
		$this->entry_id = $entry_id;
		$this->category_id = $category_id;
		$this->category_dir = $category_dir;
		$this->title = $title;
		$this->entry_dt = $entry_dt;
		$this->entry_dt_jpn = $entry_dt_jpn;
		$this->filename = $entry_cre_dt . $entry_id;
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
}
?>

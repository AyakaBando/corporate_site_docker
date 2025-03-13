<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/NewsCollectionBase.class.inc');
class CategoryNewsCollection extends NewsCollectionBase
{

	function setCategoryID( $category_id )
	{
		$this->category_id = $category_id;
	}

	function getNews( $limit )
	{
		$sql  = "";
		$sql .= "SELECT ";
		$sql .= "	entry_id, ";
		$sql .= "	DATE_FORMAT( entry_dt, '%Y/%m/%d' ) as entry_dt, ";
		$sql .= "	DATE_FORMAT( entry_dt, '%Y年%m月%d日' ) as entry_dt_jpn, ";
		$sql .= "	entry_dt as sort_entry_dt, ";
		$sql .= "	entry_title, ";
		$sql .= "	entry_text, ";
		$sql .= "	entry_text2, ";
		$sql .= "	DATE_FORMAT( entry_cre_dt, '%Y%m%d' ) as entry_cre_dt, ";
		$sql .= "	entry_category_id, ";
		$sql .= "	category_dir ";
		$sql .= "FROM ";
		$sql .= "	gd_entry, ";
		$sql .= "	gd_category ";
		$sql .= "WHERE ";
		$sql .= "	category_id = entry_category_id ";
		if($this->category_id != -1){
			$sql .= "	AND ";
			$sql .= "	entry_category_id = '{$this->category_id}' ";
		}
		$sql .= "	AND ";
		$sql .= "	entry_status = 1 ";
		$sql .= "ORDER BY ";
		$sql .= "	sort_entry_dt DESC ";
		if ( $limit != 0 )
		{
			$sql .= "LIMIT 0, $limit ";
		}
		return parent::getNews( $sql );
	}

	function getYearFromRegistedNews()
	{
		$sql  = "";
		$sql .= "SELECT ";
		$sql .= "	LEFT( entry_dt, 4 ) as entry_dt ";
		$sql .= "FROM ";
		$sql .= "	gd_entry g ";
		if($this->category_id != -1){
			$sql .= "WHERE ";
			$sql .= "	entry_category_id = {$this->category_id} ";
		}
		$sql .= "GROUP BY ";
		$sql .= "	LEFT( entry_dt, 4 ) ";
		$sql .= "ORDER BY ";
		$sql .= "	entry_dt LIMIT 1 ";

		return parent::getYearFromRegistedNews( $sql );
	}
}

?>

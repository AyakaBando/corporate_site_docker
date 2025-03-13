<?php
require_once($_SERVER['DOCUMENT_ROOT']. '/lib/NewsCollection.class.inc');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/ProductNews.class.inc');

class ProductNewsCollection extends NewsCollection
{
	function getEntityInstance( $initValue )
	{
		$entityInstance = new ProductNews( $initValue );

		return $entityInstance;
	}
	
	function getNews( $limit, $year, $start )
	{
		$sql  = "";
		$sql .= "SELECT ";
		$sql .= "	product_id, ";
		$sql .= "	product_category_id, ";
		$sql .= "	category_dir, ";
		$sql .= "	product_uri, ";
		$sql .= "	product_picture1, ";
		$sql .= "	product_picture2, ";
		$sql .= "	product_picture3, ";
		$sql .= "	product_picture4, ";
		$sql .= "	product_picture5, ";
		$sql .= "	product_picture6, ";
		$sql .= "	product_name_japanese, ";
		$sql .= "	product_name_english, ";
		$sql .= "	product_catch_copy, ";
		$sql .= "	product_maker, ";
		$sql .= "	product_unit_price, ";
		$sql .= "	category_name, ";
		$sql .= "	product_explanation, ";
		$sql .= "	product_price, ";
		$sql .= "	product_ex_attribute1, ";
		$sql .= "	product_ex_attribute2, ";
		$sql .= "	product_ex_attribute3, ";
		$sql .= "	product_dt, ";
		$sql .= "	DATE_FORMAT( product_dt, '%Y/%m/%d' ) as custom_product_dt, ";
		$sql .= "	DATE_FORMAT( product_cre_dt, '%Y%m%d' ) as product_cre_dt ";
		$sql .= "FROM ";
		$sql .= "	gd_product, ";
		$sql .= "	gd_product_category ";
		$sql .= "WHERE ";
		$sql .= "	category_id = product_category_id ";
		if ( $this->category_id != "" )
		{
			$sql .= "	AND ";
			$sql .= "	product_category_id = {$this->category_id} ";
		}
		$sql .= "	AND ";
		$sql .= "	product_status = 1 ";
		if ( $year != 0 )
		{
			$sql .= "	AND ";
			$sql .= "	LEFT( product_dt, 4 ) = $year ";
		}
		$sql .= "ORDER BY ";
		$sql .= "	product_dt DESC ";
		if ( $limit != 0 )
		{
			$sql .= "LIMIT $start, $limit ";
		}
		return parent::getNews( $sql );
	}

	function getYearFromRegistedNews()
	{
		$sql  = "";
		$sql .= "SELECT ";
		$sql .= "	LEFT( product_dt, 4 ) as entry_dt ";
		$sql .= "FROM ";
		$sql .= "	gd_product g ";
		$sql .= "GROUP BY ";
		$sql .= "	LEFT( product_dt, 4 ) ";
		$sql .= "ORDER BY ";
		$sql .= "	product_dt LIMIT 1 ";

		return parent::getYearFromRegistedNews( $sql );
	}

	function getCategory()
	{
		$sql  = "";
		$sql .= "SELECT ";
		$sql .= "	category_id, ";
		$sql .= "	category_name ";
		$sql .= "FROM ";
		$sql .= "	gd_product_category ";
		$sql .= "ORDER BY ";
		$sql .= "	category_priority_level ";

		return parent::getCategoryFromRegistedNews( $sql );
	}

	function getCategoryname( $category_id )
	{
		$sql  = "";
		$sql .= "SELECT ";
		$sql .= "	category_id, ";
		$sql .= "	category_name ";
		$sql .= "FROM ";
		$sql .= "	gd_product_category ";
		$sql .= "WHERE ";
		$sql .= "	category_id = " . $category_id;

		return parent::getCategoryname( $sql );
	}
	function getCount(  )
	{
		$sql = "";
		$sql .= "SELECT count(*) from gd_product  ";
		return parent::getContentsCount( $sql );
	}
}
?>

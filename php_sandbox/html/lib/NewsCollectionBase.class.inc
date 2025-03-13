<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/NewsBase.inc');
require_once( USER_LOCAL_LIB_DIR . "DB/db.inc");
require_once( USER_LOCAL_LIB_DIR . "DB/db_result.inc");
require_once( USER_LOCAL_LIB_DIR . "Factory/DataBaseFactory.class.inc");
require_once( USER_LOCAL_LIB_DIR . "Management/ManagementEntry.class.inc");
//echo(USER_LOCAL_LIB_DIR);
class NewsCollectionBase
{
	var $categoryID;
	var $newsCollection = array();
	var $managementEntry;

	function NewsCollectionBase()
	{
		$this->managementEntry = new ManagementEntry();
	}

	function setCategoryID( $category_id )
	{
		die("setCategoryID() is not implement");
	}

	function getNews( $sql )
	{

		$array_rs_fields = $this->managementEntry->executeSQL( $sql );
		
		if( count( $array_rs_fields ) > 0 )
		{
			foreach( $array_rs_fields as $key => $value )
			{
				$n = new NewsBase( $value["entry_id"], $value["entry_category_id"], $value["category_dir"], $value["entry_title"], $value["entry_dt"], $value["entry_dt_jpn"], $value["entry_cre_dt"], $value["entry_text"], $value["entry_text2"] );
				array_push( $this->newsCollection, $n );
			}
		}
		return $this->newsCollection;
	}

	// 年毎、月毎の配列を返す
	function getNewsEveryMonth()
	{
		$setedYear = -1;			// 配列に格納済みの年度
		$setedMonth = -1;			// 配列に格納済みの月
		$yearCollection = array();	// 1年分のニュースを格納する配列
		$monthCollection = array();	// 1ヶ月分のニュースを格納する配列
		$tmp_newsCollection = array();

		foreach( $this->newsCollection as $current_news )
		{
			$year = floor( strtok( $current_news->getEntry_dt(), "/" ) );	// 西暦を取り出す
			$month = floor( strtok("/") );									// 月を取り出す
			$date = floor( strtok("/") );									// 日付を取り出す
			if ( $setedYear != -1 && $setedYear != $year )
			{
				// 年が変わったら、その年の配列をニュース全体配列へ格納し、新しい年の配列を用意
				$yearCollection[$setedMonth] = $monthCollection;
				$tmp_newsCollection[$setedYear] = $yearCollection;
				$yearCollection = array();
				$monthCollection = array();
				
				array_push( $monthCollection, $current_news );
				$setedYear = $year;
				$setedMonth = $month;
			}
			else if ( $setedMonth != -1 && $setedMonth != $month )
			{
				// 月が変わったら、その月の配列を年の配列へ格納し、新しい月の配列を用意
				$yearCollection[$setedMonth] = $monthCollection;
				$monthCollection = array();

				array_push( $monthCollection, $current_news );
				$setedYear = $year;
				$setedMonth = $month;
			}
			else
			{
				array_push( $monthCollection, $current_news );
				$setedYear = $year;
				$setedMonth = $month;
			}
		}

		$yearCollection[$setedMonth] = $monthCollection;
		$tmp_newsCollection[$setedYear] = $yearCollection;

		return $tmp_newsCollection;
	}

	// 年毎の配列を返す
	function getNewsEveryYear()
	{
		$setedYear = -1;			// 配列に格納済みの年度
		$setedMonth = -1;			// 配列に格納済みの月
		$yearCollection = array();	// 1年分のニュースを格納する配列
		$monthCollection = array();	// 1ヶ月分のニュースを格納する配列
		$tmp_newsCollection = array();

		foreach( $this->newsCollection as $current_news )
		{
			$year = floor( strtok( $current_news->getEntry_dt(), "/" ) );	// 西暦を取り出す
			$month = floor( strtok("/") );									// 月を取り出す
			$date = floor( strtok("/") );									// 日付を取り出す
			if ( $setedYear != -1 && $setedYear != $year )
			{
				// 年が変わったら、その年の配列をニュース全体配列へ格納し、新しい年の配列を用意
				$yearCollection[$setedMonth] = $monthCollection;
				$tmp_newsCollection[$setedYear] = $yearCollection;
				$yearCollection = array();
				$monthCollection = array();
				
				array_push( $monthCollection, $current_news );
				$setedYear = $year;
				$setedMonth = $month;
			}
			else
			{
				array_push( $monthCollection, $current_news );
				$setedYear = $year;
				$setedMonth = $month;
			}
		}

		$yearCollection[$setedMonth] = $monthCollection;
		$tmp_newsCollection[$setedYear] = $yearCollection;

		return $tmp_newsCollection;
	}

	// 現在登録されているお知らせの各年の配列を返す
	function getYearFromRegistedNews( $sql )
	{
		$yearArray = array();

		// 1件もニュースが登録されていない年でもリンクを表示する仕様なので、
		// 現在登録されているニュースで一番古い年を取得
		$array_rs_fields = $this->managementEntry->executeSQL( $sql );
		if( count( $array_rs_fields ) > 0 )
		{
			$nowYear = date("Y");
			for ( $i = $nowYear; $i >= $array_rs_fields[0]["entry_dt"]; $i-- )
			{
				array_push( $yearArray, $i );
			}
		}

		return $yearArray;
	}
	
	//公開されている記事の件数を取得
	function getContentsCount( $sql )
	{
		//$array_rs_fields = $this->managementEntry->executeSQL( $sql );
		return 10;
		//return $array_rs_fields[0];
	}
}
?>

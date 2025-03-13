<?php
require_once( _PATH_gdCMS_ROOT . "webapp/lib/DB/db.inc");
require_once( _PATH_gdCMS_ROOT . "webapp/lib/DB/db_result.inc");
require_once( _PATH_gdCMS_ROOT . "webapp/lib/Factory/DataBaseFactory.class.inc");
class NewsCollection
{
	var $categoryID;
	var $newsCollection;

	function setCategoryID( $category_id )
	{
		$this->category_id = $category_id;
	}

	function getCategoryname( $sql )
	{
		// データベース接続
		$dataBaseFactory =& DataBaseFactory::getInstance();
		$DB = $dataBaseFactory->factoryMethod( _USE_DB );
		$rs = $DB->Select( $sql );

		if( $DB->rsrow > 0 )
		{
			$category_name = $rs->fetch[0]["category_name"];
		}
		else
		{
			$category_name = "";
		}
		return $category_name;
	}

	function getEntityInstance( $initValue )
	{
		die("NewsCollection::getEntityInstance() must be overridden");
	}

	function getNews( $sql )
	{
		$this->newsCollection = array();

		// データベース接続
		$dataBaseFactory =& DataBaseFactory::getInstance();
		$DB = $dataBaseFactory->factoryMethod( _USE_DB );
		$rs = $DB->Select( $sql );

		if( $DB->rsrow > 0 )
		{
			foreach( $rs->fetch as $data => $value )
			{
				$n = $this->getEntityInstance( $value );
				array_push( $this->newsCollection, $n );
			}
		}

		$DB->DisConnect();

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
		$dataBaseFactory =& DataBaseFactory::getInstance();
		$DB = $dataBaseFactory->factoryMethod( _USE_DB );
		$rs = $DB->Select( $sql );

		if( $DB->rsrow > 0 )
		{
			$nowYear = date("Y");
			for ( $i = $nowYear; $i >= $rs->fetch[0]["entry_dt"]; $i-- )
			{
				array_push( $yearArray, $i );
			}
		}

		$DB->DisConnect();
		
		return $yearArray;
	}

	// 現在登録されているカテゴリID、カテゴリ名の配列を返す
	function getCategoryFromRegistedNews( $sql )
	{
		$categoryArray = array();

		$dataBaseFactory =& DataBaseFactory::getInstance();
		$DB = $dataBaseFactory->factoryMethod( _USE_DB );
		$rs = $DB->Select( $sql );

		if( $DB->rsrow > 0 )
		{
			foreach( $rs->fetch as $data => $value )
			{
				$entity = $this->getEntityInstance( $value );
				array_push( $categoryArray, $entity );
			}
		}

		$DB->DisConnect();
		
		return $categoryArray;
	}
	
	//公開されている記事の件数を取得
	function getContentsCount( $sql )
	{
		// データベース接続
		$dataBaseFactory =& DataBaseFactory::getInstance();
		$DB = $dataBaseFactory->factoryMethod( _USE_DB );
		$rs = $DB->Select( $sql );
		

		$DB->DisConnect();
		
		
		return $rs->fetch[0]["count(*)"];
	}
}
?>

<?php
require_once( dirname(__FILE__) . '/.queserser.DB.class.php' );
/*  */

/**
 * [[機能説明]]
 *
 * @
 * @
 * @
 */
class systemDB extends queserserDB
{

/**************************************************************************
    # 共通
**************************************************************************/
    /**
     *カテゴリ配列取得メソッド
     */
    public function GetMailBox( $dispFlg = null, $nullFlg = null, $thisId = null )
    {
        if( $dispFlg ) $sqlWhere = " WHERE `dispFlg` = 1 ";

        $queryStr = "SELECT `id`, `name` FROM `contact_mailBox` " . $sqlWhere . " ORDER BY `priority`, `id` DESC";
        $result = $this->_setQuery( 'query', $queryStr, array() );

        if( $nullFlg )$data[0] = '　';

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            $data[$row['id']] = $row['name'];
        }

        if( $thisId )
        {
            foreach( $data AS $key => $value )
                if( $key == $thisId ) $menu[$thisId] = $value;

            foreach( $data AS $key => $value )
                if( $key != $thisId ) $menu[$key] = $value;

            unset( $data );
            $data = $menu;
        }

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     *カテゴリ配列取得メソッド
     */
    public function GetFolder( $dispFlg = null, $nullFlg = null, $boxFlg = null )
    {
        if( $dispFlg ) $sqlWhere = " WHERE `dispFlg` = 1 ";
        //if( $boxFlg )   $sqlWhere .= " WHERE `bigId` = " . $boxFlg . " ";

        $queryStr = "SELECT `id`, `bigId`, `name` FROM `contact_folder` " . $sqlWhere . " ORDER BY `priority`, `id` DESC";
        $result = $this->_setQuery( 'query', $queryStr, array() );

        if( $nullFlg )$data[0] = '　';
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            if( $boxFlg )
                $data[$row['bigId']][$row['id']] = $row['name'];
            else
                $data[$row['id']] = $row['name'];
        }

        return ( isset( $data ) ) ? $data : null;
    }

    /**
     *カテゴリ配列取得メソッド
     */
    public function GetCategory( $dispFlg = null, $nullFlg = null, $bigCategory = null, $debFlg = null )
    {
        if( $dispFlg ) $sqlWhere = " WHERE `dispFlg` = 1 ";
        if( $dispFlg && $bigCategory )$sqlWhere .= " AND `bigCategoryId` = " . $bigCategory . " ";

        $queryStr = "SELECT `categoryId`, `bigCategoryId`, `name` FROM `product_category` " . $sqlWhere . " ORDER BY `priority`, `categoryId` DESC";
        $result = $this->_setQuery( 'query', $queryStr, array() );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            if( $nullFlg )
            {
                if( !$data[$row['bigCategoryId']][0] )$data[$row['bigCategoryId']][0] = '　';
            }
            $data[$row['bigCategoryId']][$row['categoryId']] = $row['name'];
        }

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     *英語版カテゴリ配列取得メソッド
     */
    public function En_GetCategory( $dispFlg = null, $nullFlg = null, $bigCategory = null, $debFlg = null )
    {
        if( $dispFlg ) $sqlWhere = " WHERE `dispFlg` = 1 ";
        if( $dispFlg && $bigCategory )$sqlWhere .= " AND `bigCategoryId` = " . $bigCategory . " ";

        $queryStr = "SELECT `categoryId`, `bigCategoryId`, `name` FROM `en_product_category` " . $sqlWhere . " ORDER BY `priority`, `categoryId` DESC";
        $result = $this->_setQuery( 'query', $queryStr, array() );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            if( $nullFlg )
            {
                if( !$data[$row['bigCategoryId']][0] )$data[$row['bigCategoryId']][0] = '　';
            }
            $data[$row['bigCategoryId']][$row['categoryId']] = $row['name'];
        }

        return ( isset( $data ) ) ? $data : null;
    }

    /**
     *FAQカテゴリ配列取得メソッド
     */
    public function GetFAQCategory( $id = null, $dispFlg = null, $nullFlg = null )
    {
        if( $dispFlg ) $sqlWhereDisp   = " `dispFlg` = 1 ";
        if( $id )      $sqlWhereId = " `id` = " . $id;
        if( $dispFlg || $id ) $sqlWhere = "WHERE" . $sqlWhereDisp . ( $sqlWhereDisp ? ' AND ': '' ) . $sqlWhereId;

        $queryStr = 
            "SELECT `categoryId`, `id`, `name` 
               FROM `product_faqcategory` 
            " . $sqlWhere . " 
           ORDER BY `priority`, `categoryId` DESC";
        $result = $this->_setQuery( 'query', $queryStr, array() );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            if( $nullFlg )
            {
                //if( !$data[$row['id']][0] )$data[$row['id']][0] = '　';
                $data[0] = '　';
            }
            $data[$row['categoryId']] = $row['name'];
        }

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     *会員配列取得メソッド
     */
    public function GetMember( $dispFlg = null, $nullFlg = null )
    {
        if( $dispFlg ) $sqlWhere = " WHERE `dispFlg` = 1 ";

        $queryStr = 
            "SELECT `memberId`, `name`, `companyName` 
               FROM `memberMaster` 
            " . $sqlWhere . " 
           ORDER BY `name` ";
        $result = $this->_setQuery( 'query', $queryStr, array() );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            if( $nullFlg ) $data[0] = '　';

            $data[$row['memberId']] = $row['companyName'] . ( $row['companyName'] ? '　/　': '' ) . $row['name'];
        }

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     *サブカテゴリ配列取得メソッド
     */
    public function GetSubCategory( $dispFlg = null, $nullFlg = null, $debFlg = null )
    {
        //$categoryMasterArray = categoryMasterArray();
        if( $dispFlg ) $sqlWhere = " WHERE `dispFlg` = 1 ";
        //if( $dispFlg && $bigCategory )$sqlWhere .= " AND `bigId` = " . $bigCategory . " ";

        $queryStr = "SELECT `subCategoryId`, `makerId`, `category`, `name` FROM `subCategory` " . $sqlWhere . " ORDER BY `priority`, `subCategoryId` DESC ";
        $result = $this->_setQuery( 'query', $queryStr, array() );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            if( $nullFlg )if( !$data[$row['makerId']][$row['category']][0] )$data[$row['makerId']][$row['category']][0] = '　';

            $data[$row['makerId']][$row['category']][$row['subCategoryId']] = $row['name'];
            //$i = 1;
        }
//print_r( $data );
        return ( isset( $data ) ) ? $data : null;
    }


    /**
     *サブカテゴリ連想配列取得メソッド
     */
    public function GetSubCategoryAssoc( $dispFlg = null, $nullFlg = null, $debFlg = null )
    {
        //$categoryMasterArray = categoryMasterArray();
        if( $dispFlg ) $sqlWhere = " WHERE `dispFlg` = 1 ";
        //if( $dispFlg && $bigCategory )$sqlWhere .= " AND `bigId` = " . $bigCategory . " ";

        $queryStr = "SELECT `subCategoryId`, `makerId`, `category`, `name` FROM `subCategory` " . $sqlWhere . " ORDER BY `priority`, `subCategoryId` DESC ";
        $result = $this->_setQuery( 'query', $queryStr, array() );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            if( $nullFlg )$data[0] = '　';

            $data[$row['subCategoryId']] = $row['name'];
            //$i = 1;
        }
//print_r( $data );
        return ( isset( $data ) ) ? $data : null;
    }

    //検索用文字列作成
    public function ArraySearchWhere( $searchArray = array(), $idName = 'id' )
    {
        foreach( (array)$searchArray AS $key => $value )
        {
            if( $key )$search .= " `" . $idName . "` = " . $key . " OR ";
        }
        if( $search ) $search = rtrim( $search, 'OR ' );

        return( $search ) ? $search: null;
    }


    public function CreateSQLSearchStr( $searchArray, $junction = 'AND', $startStr = 'WHERE' )
    {
    	//print_r($searchArray);
        foreach( (array)$searchArray AS $key => $value )
        {
            if( $value )$SQLSearch .= " ( " . $value . " ) " . $junction . " ";
        }
        if( $SQLSearch )
        {
            $SQLSearch = rtrim( $SQLSearch, " " . $junction . " " );
            $searchWhere = ' ' . $startStr . ' ( ' . $SQLSearch . ' ) ';
        }

        return ( $searchWhere ) ? $searchWhere: '';
    }

}
?>
<?php
require_once( dirname(__FILE__) . '/./.queserser.DB.class.php' );
require_once( dirname(__FILE__) . '/./.systemSearchDB.class.php' );
/*  */

/**
 * [[機能説明]]
 *
 * @dateTime_Decode()
 * @dateTime_Convert()
 * @stringConnect_decodeArray()
 * @stringConnection()
 */
class systemProductFaqDB extends queserserDB
{
/******************************************************
    # サブカテゴリ
******************************************************/
    /**
     *品種一覧取得メソッド
     */
    public function CategoryList( $ls = 0, $limit = 10, $param = array(), $debFlg = null )
    {
        $this->ls    = $ls;
        $this->limit = $limit;

        //ソート条件
        if( $param['sort'] && $param['cond'] )
            $sqlOrderBy = '`' . $param['sort'] . '` ' . $param['cond'];
        else
            $sqlOrderBy = '`priority`, `categoryId` DESC';

        //一覧取得
        $queryStr = 
            "SELECT `categoryId`, `id`, `name`, `dispFlg`, `priority` 
               FROM `product_faqcategory` 
              " . $this->ListWhere( $param ) . "
           ORDER BY " . $sqlOrderBy;
        $result = $this->_setQuery( 'limitQuery', $queryStr, array() );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
            $data[] = $row;

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     *品種詳細取得メソッド
     */
    public function CategoryDetail( $id = null, $debFlg = null )
    {
        $this->ls = 0;
        $this->limit = 1;

        $queryStr = "SELECT * FROM `product_faqcategory` WHERE `categoryId` = ? ";
        $result = $this->_setQuery( 'limitQuery', $queryStr, array( $id ) );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            $row['image'][1]['fileName'] = $row['fileName1'];
            $data = $row;
        }

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     * #順番更新
     */
    public function CategorySortSave( $data = array(), $getParam, $debFlg = null )
    {
        foreach( (array)$data['id'] AS $key => $value )
        {
            $queryStr = "UPDATE `product_faqcategory` SET `priority` = ? WHERE `categoryId` = ? AND `id` = ? LIMIT 1";
            $this->_setQuery( 'query', $queryStr, array( $key + 1, $value, $getParam['id'] ) );
        }
    }



    /**
     *検索条件生成メソッド
     */
    public function ListWhere( $param = array(), $debFlg = null )
    {
        if( $param['dateStart']['Y'] || $param['dateStart']['m'] || $param['dateStart']['d'] || $param['dateEnd']['Y'] || $param['dateEnd']['m'] || $param['dateEnd']['d'] )
            $serchArray['dateLimit'] = systemSearchDB::SearchDate( $param, 'dateStart', null, 'startDate' );

        if( $param['id'] )
            $serchArray['id'] = " `id` = " . $param['id'] . " ";


        if( $serchArray )
        {
            foreach( (array)$serchArray AS $key => $value )
                $SQLSearch .= " (" . $value . " ) AND ";
            if( $SQLSearch )
            {
                $SQLSearch = rtrim( $SQLSearch, " AND " );
                $sqlWhere  = ' WHERE ( ' . $SQLSearch . ' ) ';
            }
        }

        if( $debFlg )echo $sqlWhere;

        return ( $sqlWhere ) ? $sqlWhere : null;
    }

/******************************************************
    # FAQ登録
******************************************************/
    /**
     *FAQ登録メソッド
     */
    public function DataSave( $data = array(), $debFlg = null )
    {
        $data['dateTime']   = dateTime_Convert( $data['dateTime'] );

        if( !$data['faqId'] )
        {
            $insertArray = array( $data['id'], $data['category'], $data['title'], $data['url'], $data['comment'], $data['dispFlg'],  $data['dateTime'] );
            $queryStr = 
                "INSERT `product_faq` ( `id`, `category`, `title`, `url`, `comment`, `dispFlg`, `dateTime` ) 
                 VALUES ( ?, ?, ?, ?, ?, ?, ? ) ";
            $result = $this->_setQuery( 'query', $queryStr, $insertArray );
        }
        else
        {
/*
            if( !$data['pdfDel'] && $data['pdfFileName'] )
                $pdfQuery = ", `pdfFileName` = '" . $data['pdfFileName'] . "'";

            if( $data['pdfDel'] )
                $pdfQuery = ", `pdfFileName` = NULL";

            if( !$data['imageDel'][1] && $data['fileName'][1] )
                $fileQuery = ", `imgFileName` = '" . $data['fileName'][1] . "', `width` = '" . $data['width'][1] . "', `height` = '" . $data['height'][1] . "'";

            if( $data['imageDel'][1] )
                $fileQuery = ", `imgFileName` = NULL, `width` = NULL, `height` = NULL";
*/
            $updateArray = array(
                $data['category'], $data['title'], $data['url'], $data['comment'], $data['dispFlg'], $data['dateTime'], 
                $data['faqId'] );
            $queryStr = 
                 "UPDATE `product_faq` 
                    SET `category` = ?, `title` = ?, `url` = ?, `comment` = ?, `dispFlg` = ?, `dateTime` = ? 
                  WHERE `faqId` = ? LIMIT 1";
            $result = $this->_setQuery( 'query', $queryStr, $updateArray );
        }

    }

    /**
     *FAQ一覧取得メソッド
     */
    public function DataList( $id, $ls = 0, $limit = 1, $param = array(), $debFlg = null )
    {
        $this->ls    = $ls;
        $this->limit = $limit;

        //ソート条件
        if( $param['sort'] && $param['cond'] )
            $sqlOrderBy = '`' . $param['sort'] . '` ' . $param['cond'];
        else
            $sqlOrderBy = '`dateTime` DESC, `faqId` DESC';

        //一覧取得
        $queryStr = 
             "SELECT `faqId`, `id`, `category`, `title`, `url`, `comment`, `dispFlg`, `dateTime` 
                FROM `product_faq` 
               WHERE `id` = ? " . $this->FaqListWhere( $param ) . "
            ORDER BY ". $sqlOrderBy;
        $result = $this->_setQuery( 'limitQuery', $queryStr, array( $id ) );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            $data[] = $row;
        }

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     *FAQ詳細取得メソッド
     */
    public function Detail( $id = null, $debFlg = null )
    {
        //ユーザー一覧取得
        $queryStr = 
            "SELECT `faqId`, `id`, `category`, `title`, `url`, `comment`, `dispFlg`, `dateTime` 
               FROM `product_faq` 
              WHERE `faqId` = ? LIMIT 0, 1";
        $result = $this->_setQuery( 'query', $queryStr, array( $id ) );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            $row['image'][1]['fileName'] = $row['imgFileName'];
            $row['dateTime']             = dateTime_Decode( $row['dateTime'] );

            $data = $row;
        }

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     *検索条件生成メソッド
     */
    public function FaqListWhere( $param = array(), $debFlg = null )
    {
        if( $param['id'] )
            $serchArray['id'] = " `id` = " . $param['id'] . " ";

        if( $param['category'] )
            $serchArray['category'] = " `category` = " . $param['category'] . " ";

        if( $serchArray )
        {
            foreach( (array)$serchArray AS $key => $value )
                $SQLSearch .= " ( " . $value . " ) AND ";
            if( $SQLSearch )
            {
                $SQLSearch = rtrim( $SQLSearch, " AND " );
                $sqlWhere  = ' AND ( ' . $SQLSearch . ' ) ';
            }
        }

        if( $debFlg )echo $sqlWhere;

        return ( $sqlWhere ) ? $sqlWhere : null;
    }

}
?>
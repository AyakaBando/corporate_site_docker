<?php
require_once( '.queserser.DB.class.php' );
require_once( dirname(__FILE__) . '/./.systemSearchDB.class.php' );
require_once( dirname(__FILE__) . '/./.systemDB.class.php' );
/*  */

/**
 * [[機能説明]]
 *
 * @dateTime_Decode()
 * @dateTime_Convert()
 * @stringConnect_decodeArray()
 * @stringConnection()
 */
class contentsDB extends queserserDB
{
    private $weekArray = array( '日', '月', '火', '水', '木', '金', '土' );
/**************************************************************************
    # 共通
**************************************************************************/
    /**
     *製品一覧取得メソッド
     */
    public function ProductList( $ls = 0, $limit = 10000, $param = array() )
    {
        $this->ls    = $ls;
        $this->limit = $limit;

        if( $param['category'] )
        {
            $sqlSelect  = ", ( SELECT `priority` FROM `product_sort` WHERE `product_sort`.`id` = `product`.`id` AND `product_sort`.`category` = '" . $param['category'] . "' LIMIT 1 ) AS `scPriority` ";
            $sqlOrderBy = " `scPriority`, `id` DESC ";
        }
        else
            $sqlOrderBy = ' `priority`, `id` DESC';

        $queryStr = 
            "SELECT `id`, `subCategory`, `subName`, `name`, `dateTime`, `dispFlg` " . $sqlSelect . " 
               FROM `product` 
              WHERE `dispFlg` = 1 " . $this->ProductListWhere( $param ) . "
           ORDER BY " . $sqlOrderBy;
        $result = $this->_setQuery( 'limitQuery', $queryStr, array() );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            $row['keyWord']    = stringConnect_decodeArray( $row['keyWord'] );

            $data[] = $row;
        }

        return ( isset( $data ) ) ? $data : null;
    }

    /**
     *製品画像取得メソッド
     */
    public function ProductImageList()
    {
        $queryStr = "SELECT `id`, `fileName`, `width`, `priority` FROM `product_img` WHERE `priority` = 1 ";
        $result = $this->_setQuery( 'query', $queryStr, array() );
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            $data[$row['id']]['fileName']  = $row['fileName'];
            $data[$row['id']]['width']     = $row['width'];
        }

        return ( is_array( $data ) ) ? $data : null;
    }


    /**
     *詳細取得メソッド
     */
    public function ContentsDetail( $id = null )
    {
        //ユーザー一覧取得
        $queryStr = "SELECT  *  FROM `product` WHERE `id` = ? AND `dispFlg` = 1 LIMIT 0, 1";
        $result = $this->_setQuery( 'query', $queryStr, array( $id ) );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            //カタログデータ
            $queryStr = "SELECT `imgId`, `id`, `imageAlt`, `fileName`, `width`, `height`, `dispFlg`, `priority` FROM `product_catalog` WHERE `id` = ? AND `dispFlg` = 1 ORDER BY `priority` ";
            $cresult = $this->_setQuery( 'query', $queryStr, array( $row['id'] ) );
            while( $crow = $cresult->fetchRow( DB_FETCHMODE_ASSOC ) )
            {
                $row['catalog'][$crow['priority']] = $crow;
            }

            //メインビジュアルデータ
            $queryStr = "SELECT `id`, `imageAlt`, `fileName`, `width`, `height`, `priority` FROM `product_img` WHERE `id` = ? ORDER BY `priority` ";
            $iresult = $this->_setQuery( 'query', $queryStr, array( $row['id'] ) );
            while( $irow = $iresult->fetchRow( DB_FETCHMODE_ASSOC ) )
            {
                $row['mainImg'][$irow['priority']]  = $irow;
            }

            //設置事例データ
            $queryStr = "SELECT `imgId`, `id`, `imageAlt`, `fileName`, `width`, `height`, `dispFlg`, `priority` FROM `product_caseImg` WHERE `id` = ? AND `dispFlg` = 1 ORDER BY `priority` ";
            $caseresult = $this->_setQuery( 'query', $queryStr, array( $row['id'] ) );
            while( $caserow = $caseresult->fetchRow( DB_FETCHMODE_ASSOC ) )
            {
                $row['caseImg'][$caserow['priority']]  = $caserow;
            }
            //設置事例登録枚数取得
            $row['caseCnt'] = count( $row['caseImg'] );

            //図面データ
            $queryStr = "SELECT `imgId`, `id`, `imageAlt`, `fileName`, `width`, `height`, `dispFlg`, `priority` FROM `product_drawing` WHERE `id` = ? AND `dispFlg` = 1 ORDER BY `priority` ";
            $dresult = $this->_setQuery( 'query', $queryStr, array( $row['id'] ) );
            while( $drow = $dresult->fetchRow( DB_FETCHMODE_ASSOC ) )
            {
                $row['draw'][$drow['priority']]  = $drow;
            }

            //FAQデータ
            $queryStr = 
                "SELECT `categoryId`, `id`, `name`, `dispFlg`, `priority` 
                   FROM `product_faqcategory` 
                  WHERE `id` = ? AND `dispFlg` = 1 AND ( SELECT COUNT( * ) FROM `product_faq` WHERE `product_faqcategory`.`categoryId` = `product_faq`.`category` AND `product_faq`.`dispFlg` = 1 ) >= 1 
               ORDER BY `priority`, `categoryId` DESC ";
            $fcresult = $this->_setQuery( 'query', $queryStr, array( $row['id'] ) );
            while( $fcrow = $fcresult->fetchRow( DB_FETCHMODE_ASSOC ) )
            {
                $row['faq'][$fcrow['categoryId']]  = $fcrow;
            }

            //お知らせデータ
            $queryStr = 
                "SELECT `newsId`, `id`, `type`, `subCategory`, `title`, `url`, `pdfFileName`, `width`, `height`, 
                        `contentsCategory`, `comment`, `dispFlg`, `dateTime` 
                   FROM `product_news` 
                  WHERE `id` = ? 
               ORDER BY `dateTime` DESC";
            $nresult = $this->_setQuery( 'query', $queryStr, array( $row['id'] ) );
            while( $nrow = $nresult->fetchRow( DB_FETCHMODE_ASSOC ) )
            {
                $row['news'][$nrow['type']][]  = $nrow;
            }

            //レビュー
            $queryStr = 
             "SELECT `rId`, `id`, `memberId`, `evaluation`, `title`, `comment`, `name`, `dispFlg`, `dateTime` 
               FROM `product_review` 
              WHERE `id` = ? AND `dispFlg` = ? 
             ORDER BY `dispFlg`, `dateTime` DESC";
            $rresult = $this->_setQuery( 'query', $queryStr, array( $row['id'], 1 ) );
            while( $rrow = $rresult->fetchRow( DB_FETCHMODE_ASSOC ) )
            {
                for( $i = 1; $i <= 5; $i++ )
                {
                    $rrow['star'][$i] = ( $i <= $rrow['evaluation'] ) ? 1 : 0;
                }
                $row['review'][]  = $rrow;
            }

            $row['subCategory']  = stringConnect_decodeArray( $row['subCategory'] );
            $row['related']      = stringConnect_decodeArray( $row['related'] );
            foreach( (array)$row['related'] AS $key => $value )
            {
                $row['relatedImd'][$key]     = $this->_setQuery( 'getOne', "SELECT `fileName` FROM `product_img` WHERE `id` = ? AND `priority` = 1 ", array( $key ) );
                $row['relatedName'][$key]    = $this->_setQuery( 'getOne', "SELECT `name` FROM `product` WHERE `id` = ?", array( $key ) );
                $row['relatedSubName'][$key] = $this->_setQuery( 'getOne', "SELECT `subName` FROM `product` WHERE `id` = ?", array( $key ) );
            }

            $data = $row;

        }

//print_r( $data );

        return ( isset( $data ) ) ? $data : null;
    }



    /**
     *設置事例取得
     */
    public function GetCaseImg( $id )
    {
        $queryStr = "SELECT `imgId`, `id`, `imageAlt`, `fileName`, `width`, `height`, `dispFlg`, `priority` FROM `product_caseImg` WHERE `id` = ? AND `dispFlg` = 1";
        $result = $this->_setQuery( 'query', $queryStr, array( $id ) );
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            $data[$row['priority']]  = $row;
        }

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     *レビュー取得
     */
    public function ReviewDetail( $id )
    {
        $queryStr = 
         "SELECT `rId`, `id`, `memberId`, `evaluation`, `title`, `comment`, `name`, `dispFlg`, `dateTime` 
           FROM `product_review` 
          WHERE `rId` = ? AND `dispFlg` = ? 
         ORDER BY `dispFlg`, `dateTime` DESC LIMIT 0, 1";
        $result = $this->_setQuery( 'query', $queryStr, array( $id, 1 ) );
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            $data  = $row;
        }

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     *検索条件生成メソッド
     */
    public function ProductListWhere( $param = array(), $debFlg = null )
    {

        if( $param['category'] )
            $serchArray['subCategory'] = " `subCategory` LIKE '%|" . $param['category'] . "|%' ";

/*
        if( $param['mode'] == 'category' && $param['name'] && $param['categoryId'] )
        {
            $serchArray['category'] .= " `category` = " . $param['categoryId'] . " ";
        }

        if( $param['optionProduct'] )
        {
            foreach( (array)$param['optionProduct'] AS $key => $value )
            {
                $serchArray['optionProduct'] .= " `id` = " . $key . " OR ";
            }
            if( $serchArray['optionProduct'] ) $serchArray['optionProduct'] = rtrim( $serchArray['optionProduct'], 'OR ' );
        }

        if( $param['mode'] == 'kids' )
        {
            $serchArray['category'] .= " `category` = " . KIDS_CATEGORY . " ";
        }
*/

/*
        if( $param['option'] )
        {
            foreach( (array)$param['option'] AS $key => $value )
            {
                $serchArray['option'] .= " `id` = " . $key . " OR ";
            }
            if( $serchArray['option'] ) $serchArray['option'] = rtrim( $serchArray['option'], 'OR ' );
        }

        if( $param['cart'] )
        {
            foreach( (array)$param['cart'] AS $key => $value )
            {
                $serchArray['cart'] .= " `id` = " . $key . " OR ";
            }
            if( $serchArray['cart'] ) $serchArray['cart'] = rtrim( $serchArray['cart'], 'OR ' );
        }
*/

/*
        if( $param['part'] )
        {
            if( is_array( $param['part'] ) )
            {
                foreach( $param['part'] AS $key => $value )
                {
                    if( isset( $value ) && preg_match( '/^\d+$/', $value ) )$serchArray['part'] .= " `part` = " . $value . " OR ";
                }
                if( $serchArray['part'] ) $serchArray['part'] = rtrim( $serchArray['part'], 'OR ' );
            }
            else
            {
                $serchArray['part'] .= " `part` = " . $param['part'] . " ";
            }
        }


        if( $param['kind'] )
        {
            if( is_array( $param['kind'] ) )
            {
                foreach( $param['kind'] AS $key => $value )
                {
                    if( $value )$serchArray['kind'] .= " `kind` LIKE '%|" . $key . "|%' OR ";
                }
                if( $serchArray['kind'] ) $serchArray['kind'] = rtrim( $serchArray['kind'], 'OR ' );
            }
            else
            {
                $serchArray['kind'] .= " ( SELECT `id` FROM `contents_kind` WHERE `contents_kind`.`id` = `contents`.`id` AND `kind` = '" . $param['kind'] . "' LIMIT 1 ) >= 1 ";
            }
        }
*/

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


    private function SQLRepeatWhere( $param = array(), $columnName = 'id' )
    {
        foreach( (array)$param AS $key => $value )
        {
            $serchStr .= " `" . $columnName . "` = " . $key . " OR ";
        }
        if( $serchStr ) $serchStr = rtrim( $serchStr, 'OR ' );

        if( $serchStr )
        {
            $SQLSearch .= " ( " . $serchStr . " ) ";
            if( $SQLSearch )
            {
                $sqlWhere  = ' AND ( ' . $SQLSearch . ' ) ';
            }
        }

        return $sqlWhere;
    }


/******************************************************
    # 
******************************************************/
    /**
     * #ダウンロードファイルカウント
     */
    public function SetDownloadMember( $memberId, $param )
    {
        $queryStr = 
            "INSERT `downloadFileCnt` (
                    `imgId`, `id`, `memberId`, `fileName`, `mode`, `dateTime` ) 
             VALUES ( ?, ?, ?, ?, ?, ? ) ";
        $this->_setQuery( 'query', $queryStr, array( $param['imgId'], $param['id'], $memberId, $param['fileName'], $param['mode'], date( 'Y-m-d H:i:s' ) ) );

        //return ( is_numeric( $id ) ) ? true : false;
    }


    /**
     * #ダウンロードZIPカウント
     */
    public function SetZipDownloadMember( $memberId, $param )
    {
        $queryStr = 
            "INSERT `downloadZipCnt` ( `id`, `memberId`, `dateTime` ) VALUES ( ?, ?, ? ) ";
        $this->_setQuery( 'query', $queryStr, array( $param['id'], $memberId, date( 'Y-m-d H:i:s' ) ) );

        //return ( is_numeric( $id ) ) ? true : false;
    }


/******************************************************
    # FAQ
******************************************************/
    /**
     *製品一覧取得メソッド
     */
    public function FaqProductList( $ls = 0, $limit = 10000, $param = array() )
    {
        $this->ls    = $ls;
        $this->limit = $limit;

        if( $param['category'] )
        {
            $sqlSelect  = ", ( SELECT `priority` FROM `product_sort` WHERE `product_sort`.`id` = `product`.`id` AND `product_sort`.`category` = '" . $param['category'] . "' LIMIT 1 ) AS `scPriority` ";
            $sqlOrderBy = " `scPriority`, `id` DESC ";
        }
        else
            $sqlOrderBy = ' `dateTime` DESC';

        $queryStr = 
            "SELECT `id`, `subCategory`, `subName`, `name`, `dateTime`, `dispFlg` " . $sqlSelect . " 
               FROM `product` 
              WHERE `dispFlg` = 1 AND ( SELECT COUNT( * ) FROM `product_faq` WHERE `product_faq`.`id` = `product`.`id` AND `product_faq`.`dispFlg` = 1 ) >= 1 
            " . $this->ProductListWhere( $param ) . "
           ORDER BY " . $sqlOrderBy;
        $result = $this->_setQuery( 'limitQuery', $queryStr, array() );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            //$row['keyWord']    = stringConnect_decodeArray( $row['keyWord'] );

            $data[] = $row;
        }

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     *FAQ詳細取得メソッド
     */
    public function FaqDetail( $id = null )
    {
        //カテゴリ取得
        $queryStr = 
            "SELECT `categoryId`, `id`, `name`, `dispFlg`, `priority` 
               FROM `product_faqcategory` 
              WHERE `id` = ? AND `dispFlg` = 1 
           ORDER BY `priority`, `categoryId` DESC";
        $result = $this->_setQuery( 'query', $queryStr, array( $id ) );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
            $data['category'][$row['categoryId']] = $row;



        //FAQ取得
        $queryStr = 
            "SELECT `faqId`, `id`, `category`, `title`, `url`, `comment`, `dispFlg`, `dateTime` 
               FROM `product_faq` 
              WHERE `dispFlg` = 1 ";
        $result = $this->_setQuery( 'query', $queryStr, array() );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            //$row['image'][1]['fileName'] = $row['imgFileName'];
            //$row['dateTime']             = dateTime_Decode( $row['dateTime'] );

            $data['detail'][$row['category']][$row['faqId']] = $row;
        }

        return ( isset( $data ) ) ? $data : null;
    }



/******************************************************
    # 新着
******************************************************/
    /**
     * #新着一覧取得メソッド
     */
    public function NewsList( $ls, $limit, $year = null, $category = null, $contentsCategory = null )
    {
        $this->ls    = $ls;
        $this->limit = $limit;

        $selectDataArray[] = 1;
        if( $year && preg_match( '/^[0-9]{4}$/', $year ) )
        {
            $sqlWhere .= " AND DATE_FORMAT( `dateTime`, '%Y' ) = ?";
            $selectDataArray[] = $year;
        }
        if( $year && preg_match( '/^[0-9]{4}-[0-9]{2}$/', $year ) )
        {
            $sqlWhere .= " AND DATE_FORMAT( `dateTime`, '%Y-%m' ) = ?";
            $selectDataArray[] = $year;
        }

        if( $category && preg_match( '/^[0-9]$/', $category ) )
        {
            $sqlWhere .= " AND `category` = ?";
            $selectDataArray[] = $category;
        }
        
        if( $contentsCategory )
            $sqlWhere .= " AND `contentsCategory` = 3";

//$debFlg++;
        $queryStr = 
            "SELECT `id`, `category`, `contentsCategory`, `title`, `url`, `pdfFileName`, `imgFileName`, `width`, `height`, `dateTime` 
               FROM `whatsNew` 
              WHERE `dispFlg` = ? " . $sqlWhere . "
           ORDER BY `dateTime` DESC";
        $result = $this->_setQuery( 'limitQuery', $queryStr, $selectDataArray );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
            $data[]      = $row;

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     * #新着アーカイブ一覧取得メソッド
     *//*
    public function WhatsNewArchiveList( $param = array(), $debFlg = null )
    {
        if( $param['c'] )
        {
            $sqlWhere = " AND `category` = '" . $param['c'] . "'";
        }
        self::DBConnect();
        $result = self::$db->query(
            "SELECT DATE_FORMAT( `dateTime`, '%Y' ) AS `archive`, `dateTime`, 
                    (
                        SELECT COUNT( * ) FROM `whatsNew` AS `inNews` 
                         WHERE DATE_FORMAT( `inNews`.`dateTime`, '%Y' ) = DATE_FORMAT( `base`.`dateTime`, '%Y' ) AND `dispFlg` = '1' " . $sqlWhere . " ) AS `count`
               FROM `whatsNew` AS `base` 
              WHERE `dispFlg` = ? AND (
                        SELECT COUNT( * ) FROM `whatsNew` AS `inNews` 
                         WHERE DATE_FORMAT( `inNews`.`dateTime`, '%Y' ) = DATE_FORMAT( `base`.`dateTime`, '%Y' ) AND `dispFlg` = '1' " . $sqlWhere . " ) >= 1
           GROUP BY `archive` 
           ORDER BY `dateTime` ", array( 1 ) );
        if( $debFlg )echo self::$db->last_query;
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            //$row['date']            = $row['archive'] . '-01';
            $data[$row['archive']]  = $row;
        }


        $result = self::$db->query(
            "SELECT DATE_FORMAT( `dateTime`, '%Y' ) AS `archive`, 
                    (
                        SELECT COUNT( * ) FROM `whatsNew` AS `inNews` 
                         WHERE DATE_FORMAT( `inNews`.`dateTime`, '%Y' ) = DATE_FORMAT( `base`.`dateTime`, '%Y' ) AND `dispFlg` = '1' ) AS `count`
               FROM `whatsNew` AS `base` 
              WHERE `dispFlg` = ? AND DATE_FORMAT( `dateTime`, '%Y' ) <= ? AND DATE_FORMAT( `dateTime`, '%Y' ) >= ? 
           GROUP BY `archive` 
           ORDER BY `dateTime` DESC", array( 1, date( 'Y' ) -1, date( 'Y' ) - 2 ) );
        if( $debFlg )echo self::$db->last_query;
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
            $data['previousYear'][$row['archive']]      = $row;

        self::$db->disconnect();
        return ( isset( $data ) ) ? $data : null;
    }*/


    /**
     * #新着一覧取得メソッド
     */
    public function NewsDetail( $id )
    {
        $queryStr = 
            "SELECT * 
               FROM `whatsNew` WHERE `dispFlg` = ? AND `id` = ? LIMIT 0, 1";
        $result = $this->_setQuery( 'query', $queryStr, array( 1, $id ) );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            //$row['week'] = self::$weekArray[date('w', strtotime($row['dateTime']))];
            $data      = $row;
        }

        return ( isset( $data ) ) ? $data : null;
    }


/******************************************************
    # メインビジュアル
******************************************************/
    /**
     * #メインビジュアル取得メソッド
     */
    public function MainVisualList()
    {
        $queryStr = "SELECT `imgId`, `imageAlt`, `fileName`, `width`, `height`, `dispFlg`, `priority` FROM `topMainVisual` WHERE `dispFlg` = 1 ORDER BY `priority` ";
        $result = $this->_setQuery( 'query', $queryStr, array() );
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
            $data[]  = $row;

        return ( isset( $data ) ) ? $data : null;
    }



}
?>
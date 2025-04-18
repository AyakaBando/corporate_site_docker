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
class systemContentsDB extends queserserDB
{
    public $tableName    = 'product';
    public $imgTableName = 'product_img';
    public $tableId      = 'id';


    /**
     *一覧取得メソッド
     */
    public function DataList( $ls = 0, $limit = 10, $param = array() )
    {
        if( !$ls ) $ls = 0;
        if( !$limit ) $limit = 0;
        $this->ls    = $ls;
        $this->limit = $limit;

        //ソート条件
        if( $param['sort'] && $param['cond'] )
            $sqlOrderBy = '`' . $param['sort'] . '` ' . $param['cond'];
        else
        {
            if( $param['category'] )
            {
                $sqlSelect  = ", ( SELECT `priority` FROM `product_sort` WHERE `product_sort`.`id` = `product`.`id` AND `product_sort`.`category` = '" . $param['category'] . "' LIMIT 1 ) AS `scPriority` ";
                $sqlOrderBy = " `scPriority`, `id` DESC ";
            }
            else
                $sqlOrderBy = ' `priority`, `id` DESC ';
        }

        $queryStr = 
            "SELECT `" . $this->tableId . "`, `subCategory`, `subName`, `name`, `dateTime`, `dispFlg` " . $sqlSelect . " 
               FROM `" . $this->tableName . "` 
              " . $this->ListWhere( $param ) . "
           ORDER BY " . $sqlOrderBy . 
           " LIMIT " . intval($this->limit) . " OFFSET " . intval($this->ls);

        $result = $this->_setQuery( 'limitQuery', $queryStr, array() );

        //一覧取得
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            $queryStr = "SELECT `id`, `fileName`, `width`, `height`, `priority` FROM `" . $this->imgTableName . "` WHERE `id` = ? AND `priority` = 1 LIMIT 1";
            $imgResult = $this->_setQuery( 'query', $queryStr, array( $row['id'] ) );

            while( $irow = $imgResult->fetchRow( DB_FETCHMODE_ASSOC ) )
            {
                $row['image']['fileName']  = $irow['fileName'];
                $row['image']['size']      = resize( 200, $irow['width'], 150, $irow['height'] );
            }

            $row['subCategory']  = stringConnect_decodeArray( $row['subCategory'] );
            $data[$row['id']] = $row;
        }

        return ( isset( $data ) ) ? $data : null;
    }
    
    



    /**
     *一覧取得メソッド
     */
    // public function DataCountList( $param = array() )
    // {
    //     if( $param['year'] && !$param['month'] )
    //         $sqlWhere = " WHERE DATE_FORMAT( `dateTime`, '%Y' ) = '" . $param['year'] . "' ";
    //     if( $param['year'] && $param['month'] )
    //         $sqlWhere = " WHERE DATE_FORMAT( `dateTime`, '%Y-%m' ) = '" . $param['year'] . "-" . $param['month'] . "' ";

    //     $queryStr = "SELECT `" . $this->tableId . "`, COUNT( * ) AS `cnt` FROM `memberPageView` " . $sqlWhere . " GROUP BY `id` ";
    //     $result = $this->_setQuery( 'query', $queryStr, array() );

    //     //一覧取得
    //     while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
    //     {
    //         $data[$row['id']] = $row;
    //     }

    //     return ( isset( $data ) ) ? $data : null;
    // }

    public function DataCountList($param = array())
{
    // Ensure $param is an array and check for 'year' and 'month'
    $year = isset($param['year']) ? $param['year'] : null;
    $month = isset($param['month']) ? $param['month'] : null;

    // Build the WHERE clause based on year and month
    if ($year && !$month) {
        $sqlWhere = " WHERE DATE_FORMAT( `dateTime`, '%Y' ) = '" . $year . "' ";
    } elseif ($year && $month) {
        $sqlWhere = " WHERE DATE_FORMAT( `dateTime`, '%Y-%m' ) = '" . $year . "-" . $month . "' ";
    } else {
        $sqlWhere = ""; // No filter if neither year nor month is provided
    }

    // Construct the query string
    $queryStr = "SELECT `" . $this->tableId . "`, COUNT( * ) AS `cnt` FROM `memberPageView` " . $sqlWhere . " GROUP BY `id` ";
    
    // Execute the query
    $result = $this->_setQuery('query', $queryStr, array());

    // Initialize the data array
    $data = [];

    // Fetch the results
    while ($row = $result->fetchRow(DB_FETCHMODE_ASSOC)) {
        $data[$row['id']] = $row;
    }

    // Return data if available, otherwise return null
    return isset($data) ? $data : null;
}



    /**
     *メンバー毎ページビューメソッド
     */
    public function MemberCountList( $param = array() )
    {
        if( $param['year'] && !$param['month'] )
            $sqlWhere = " AND DATE_FORMAT( `dateTime`, '%Y' ) = '" . $param['year'] . "' ";
        if( $param['year'] && $param['month'] )
            $sqlWhere = " AND DATE_FORMAT( `dateTime`, '%Y-%m' ) = '" . $param['year'] . "-" . $param['month'] . "' ";

        $queryStr = "SELECT `memberId`, COUNT( * ) AS `cnt` FROM `memberPageView` WHERE `id` = ? " . $sqlWhere . " GROUP BY `memberId` ";
        $result   = $this->_setQuery( 'query', $queryStr, array( $param['id'] ) );

        //一覧取得
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            $data[$row['memberId']] = $row;
        }

        return ( isset( $data ) ) ? $data : null;
    }

    /**
     *メンバー毎ページビューアクセス年アーカイブ
     */
    public function MemberViewArchiveList( $nullFlg = null )
    {
        $queryStr = "SELECT DATE_FORMAT( `dateTime`, '%Y' ) AS `year` FROM `memberPageView` GROUP BY `year` ";
        $result   = $this->_setQuery( 'query', $queryStr, array() );

        if( $nullFlg )$data[0] = '';
        //一覧取得
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            $data[$row['year']] = $row['year'];
        }

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     *ダウンロード数取得メソッド
     */
    public function MemberDownLoadList( $param = array() )
    {
        $queryStr = "SELECT `id`, COUNT( * ) AS `cnt` FROM `downloadZipCnt` GROUP BY `id` ";
        $result   = $this->_setQuery( 'query', $queryStr, array() );
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
            $data['zip'][$row['id']] = $row;

        $queryStr = 
            "SELECT `id`, COUNT( * ) AS `cnt` FROM `downloadFileCnt` 
              WHERE `mode` = 1 AND ( SELECT `imgId` FROM `product_catalog` WHERE `product_catalog`.`imgId` = `downloadFileCnt`.`imgId` ) >= 1
           GROUP BY `id` ";
        $result   = $this->_setQuery( 'query', $queryStr, array() );
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
            $data['file'][$row['id']] = $row['cnt'];

        $queryStr = 
            "SELECT `id`, COUNT( * ) AS `cnt` FROM `downloadFileCnt` 
              WHERE `mode` = 2 AND ( SELECT `imgId` FROM `product_drawing` WHERE `product_drawing`.`imgId` = `downloadFileCnt`.`imgId` ) >= 1
           GROUP BY `id` ";
        $result   = $this->_setQuery( 'query', $queryStr, array() );
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
            $data['file'][$row['id']] += $row['cnt'];

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     *一覧取得メソッド
     */
    public function MemberDownLoadDetail( $ls = 0, $limit = 10, $id, $param = array() )
    {
        $this->ls    = $ls;
        $this->limit = $limit;

        //ソート条件
        if( $param['sort'] && $param['cond'] )
            $sqlOrderBy = '`' . $param['sort'] . '` ' . $param['cond'];
        else
            $sqlOrderBy = ' `dateTime` DESC';

        $queryStr = "SELECT `imgId`, `id`, `mode`, COUNT( * ) AS `cnt`, `memberId` FROM `downloadFileCnt` WHERE `memberId` = ? GROUP BY `imgId`, `mode` ";
        $result = $this->_setQuery( 'query', $queryStr, array( $id ) );
        $i = 0;
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            $row['latestDateTime'] = $this->_setQuery( 'getOne', 
                        "SELECT MAX( `dateTime` ) AS `latestDateTime` FROM `downloadFileCnt` WHERE `imgId` = ? AND `memberId` = ? ", array( $row['imgId'], $row['memberId'] ) );
            $data['file'][$row['mode']][$row['id']][$row['imgId']] = $row;
            $i++;
            $data['cntFlg'][$row['id']] = $i;
        }

        $queryStr = "SELECT `id`, COUNT( * ) AS `cnt` FROM `downloadZipCnt` WHERE `memberId` = ? GROUP BY `id` ";
        $result = $this->_setQuery( 'query', $queryStr, array( $id ) );
        $j = 0;
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            $row['latestDateTime'] = $this->_setQuery( 'getOne', 
                        "SELECT MAX( `dateTime` ) AS `latestDateTime` FROM `downloadZipCnt` WHERE `id` = ? AND `memberId` = ? ", array( $row['id'], $row['memberId'] ) );

            $data['zip'][$row['id']] = $row;
            $j++;
            $data['cntFlg'][$row['id']] += $j;
        }

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     *詳細取得メソッド
     */
    public function ProductDetailINmember( $productId = null, $memberFlg = null )
    {
        if( $productId )$sqlWhere = " WHERE `id` = " . $productId . " ";
        //ユーザー一覧取得
        $queryStr = "SELECT `id`, `name`, `subName` FROM `product` " . $sqlWhere;
        $result = $this->_setQuery( 'query', $queryStr, array() );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            //設置事例データ
            $queryStr = "SELECT `imgId`, `id`, `imageAlt`, `fileName`, `width`, `height`, `dispFlg`, `priority` FROM `product_caseImg` WHERE `id` = ? AND `dispFlg` = 1 ORDER BY `priority` ";
            $caseresult = $this->_setQuery( 'query', $queryStr, array( $row['id'] ) );
            while( $caserow = $caseresult->fetchRow( DB_FETCHMODE_ASSOC ) )
            {
                $row['caseImg'][$caserow['imgId']]  = $caserow;
            }

            //カタログデータ
            $queryStr = "SELECT `imgId`, `id`, `imageAlt`, `fileName`, `width`, `height`, `dispFlg`, `priority` FROM `product_catalog` WHERE `id` = ? AND `dispFlg` = 1 ORDER BY `priority` ";
            $cresult = $this->_setQuery( 'query', $queryStr, array( $row['id'] ) );
            while( $crow = $cresult->fetchRow( DB_FETCHMODE_ASSOC ) )
            {
                $row['catalog'][$crow['imgId']] = $crow;
            }

            //図面データ
            $queryStr = "SELECT `imgId`, `id`, `imageAlt`, `fileName`, `width`, `height`, `dispFlg`, `priority` FROM `product_drawing` WHERE `id` = ? AND `dispFlg` = 1 ORDER BY `priority` ";
            $dresult = $this->_setQuery( 'query', $queryStr, array( $row['id'] ) );
            while( $drow = $dresult->fetchRow( DB_FETCHMODE_ASSOC ) )
            {
                $row['draw'][$drow['imgId']]  = $drow;
            }

            if( $memberFlg )
            {
                //カタログ mode -> 1
                //図面     mode -> 2
                //カタログデータDL数取得 
                $queryStr = 
                    "SELECT `id`, `imgId`, `memberId`, COUNT( * ) AS `cnt` FROM `downloadFileCnt` 
                      WHERE `mode` = 1 " . $this->ArraySearchWhere( $row['catalog'], 'imgId' ) . " GROUP BY `memberId`, `imgId` ";
                $cresult = $this->_setQuery( 'query', $queryStr, array() );
                while( $crow = $cresult->fetchRow( DB_FETCHMODE_ASSOC ) )
                {
                    $crow['latestDateTime'] = $this->_setQuery( 'getOne', 
                        "SELECT MAX( `dateTime` ) AS `latestDateTime` FROM `downloadFileCnt` WHERE `memberId` = ? ", array( $crow['memberId'] ) );
                    $row['memberArrayCatalog'][$crow['imgId']][$crow['memberId']] = $crow;
                }

                //図面DL数取得 
                $queryStr = 
                    "SELECT `id`, `imgId`, `memberId`, COUNT( * ) AS `cnt` FROM `downloadFileCnt` 
                      WHERE `mode` = 2 " . $this->ArraySearchWhere( $row['draw'], 'imgId' ) . " GROUP BY `memberId` ";
                $cresult = $this->_setQuery( 'query', $queryStr, array() );
                while( $crow = $cresult->fetchRow( DB_FETCHMODE_ASSOC ) )
                {
                    $crow['latestDateTime'] = $this->_setQuery( 'getOne', 
                        "SELECT MAX( `dateTime` ) AS `latestDateTime` FROM `downloadFileCnt` WHERE `memberId` = ? ", array( $crow['memberId'] ) );
                    $row['memberArrayDrow'][$crow['imgId']][$crow['memberId']] = $crow;
                }

                //設置事例DL数取得
                $queryStr = 
                    "SELECT `id`, `memberId`, COUNT( * ) AS `cnt` FROM `downloadZipCnt` 
                      WHERE `id` = ? GROUP BY `memberId` ";
                $cresult = $this->_setQuery( 'query', $queryStr, array( $productId ) ); 
                while( $crow = $cresult->fetchRow( DB_FETCHMODE_ASSOC ) )
                {
                    $crow['latestDateTime'] = $this->_setQuery( 'getOne', 
                        "SELECT MAX( `dateTime` ) AS `latestDateTime` FROM `downloadZipCnt` WHERE `memberId` = ? ", array( $crow['memberId'] ) );
                    $row['memberArrayZip'][$crow['memberId']] = $crow;
                }
            }


            $row['subCategory']  = stringConnect_decodeArray( $row['subCategory'] );

            $data[$row['id']] = $row;
        }

        return ( isset( $data ) ) ? $data : null;
    }




    /**
     *詳細取得メソッド
     */
    public function Detail( $id = null )
    {
        $this->ls = 0;
        $this->limit = 1;

        //詳細取得
        $queryStr = "SELECT  *  
               FROM `" . $this->tableName . "` 
              WHERE `" . $this->tableId . "` = ? ";
        $result = $this->_setQuery( 'limitQuery', $queryStr, array( $id ) );


        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {

            $queryStr = "SELECT `id`, `fileName`, `width`, `height`, `priority` FROM `" . $this->imgTableName . "` WHERE `id` = ? ORDER BY `priority`";
            $imgResult = $this->_setQuery( 'query', $queryStr, array( $id ) );

            while( $irow = $imgResult->fetchRow( DB_FETCHMODE_ASSOC ) )
            {
                $row['image'][$irow['priority']]['fileName']  = $irow['fileName'];
                $row['image'][$irow['priority']]['size']      = resize( 200, $irow['width'], 150, $irow['height'] );
            }

            $row['subCategory']     = stringConnect_decodeArray( $row['subCategory'] );
            $row['related']         = stringConnect_decodeArray( $row['related'] );

            $data = $row;
        }

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     * #用途順番更新
     */
    public function SortSave( $pastData = array(), $getData = array() )
    {
        $this->_setQuery( 'query', "DELETE FROM `product_sort` WHERE `category` = ? ", array( $getData['category'] ) );

        foreach( (array)$pastData['id'] AS $key => $value )
        {
            $insertArray = array( $value, $getData['category'], $key + 1 );
            $this->_setQuery( 'query', "INSERT `product_sort` ( `id`, `category`, `priority` ) VALUES ( ?, ?, ? ) ", $insertArray );
        }
    }

    /**
     * #用途順番更新
     */
    public function SortAllSave( $pastData = array(), $getData = array() )
    {
        foreach( (array)$pastData['id'] AS $key => $value )
        {
            $queryStr = "UPDATE `product` SET `priority` = ? WHERE `id` = ? LIMIT 1";
            $this->_setQuery( 'query', $queryStr, array( $key + 1, $value ) );
        }
    }


    /**
     *削除メソッド
     */
    public function ProductDataDelete( $data = array() )
    {
/*
        $data = $this->Detail( $data['id'] );

        foreach( (array)$data['image'] AS $key => $value )
        {
            @unlink( '../upImage/product/' . $value['fileName'] );
        }
*/

        $itemName = $this->GetCulumnContents( 'product', 'name', 'id', $data['id'] );

        $result = $this->_setQuery( 'query', "SELECT `id`, `fileName` FROM `product_caseImg` WHERE `id` = ?", array( $data['id'] ) );
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
            @unlink( '../upImage/product/' . $row['fileName'] );

        $result = $this->_setQuery( 'query', "SELECT `id`, `fileName` FROM `product_catalog` WHERE `id` = ?", array( $data['id'] ) );
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
            @unlink( '../upImage/product/' . $row['fileName'] );

        $result = $this->_setQuery( 'query', "SELECT `id`, `fileName` FROM `product_drawing` WHERE `id` = ?", array( $data['id'] ) );
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
            @unlink( '../upImage/product/' . $row['fileName'] );

        $result = $this->_setQuery( 'query', "SELECT `id`, `fileName` FROM `product_img` WHERE `id` = ?", array( $data['id'] ) );
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
            @unlink( '../upImage/product/' . $row['fileName'] );

        $queryStr = " DELETE FROM `product` WHERE `id` = ? LIMIT 1";
        $result = $this->_setQuery( 'query', $queryStr, array( $data['id'] ) );

        $queryStr = " DELETE FROM `product_caseImg` WHERE `id` = ?";
        $result = $this->_setQuery( 'query', $queryStr, array( $data['id'] ) );

        $queryStr = " DELETE FROM `product_catalog` WHERE `id` = ? ";
        $result = $this->_setQuery( 'query', $queryStr, array( $data['id'] ) );

        $queryStr = " DELETE FROM `product_drawing` WHERE `id` = ? ";
        $result = $this->_setQuery( 'query', $queryStr, array( $data['id'] ) );

        $queryStr = " DELETE FROM `product_faq` WHERE `id` = ? ";
        $result = $this->_setQuery( 'query', $queryStr, array( $data['id'] ) );

        $queryStr = " DELETE FROM `product_faqcategory` WHERE `id` = ? ";
        $result = $this->_setQuery( 'query', $queryStr, array( $data['id'] ) );

        $queryStr = " DELETE FROM `product_img` WHERE `id` = ? ";
        $result = $this->_setQuery( 'query', $queryStr, array( $data['id'] ) );

        $queryStr = " DELETE FROM `product_news` WHERE `id` = ? ";
        $result = $this->_setQuery( 'query', $queryStr, array( $data['id'] ) );

        $queryStr = " DELETE FROM `product_review` WHERE `id` = ? ";
        $result = $this->_setQuery( 'query', $queryStr, array( $data['id'] ) );
/*
        $queryStr = " DELETE FROM `product_sort` WHERE `id` = ? ";
        $result = $this->_setQuery( 'query', $queryStr, array( $data['id'] ) );
*/
        return $itemName;
    }




    /**
     *検索条件生成メソッド
     */
    public function ListWhere( $param = array(), $debFlg = null )
    {
        //if( $param['dateStart']['Y'] || $param['dateStart']['m'] || $param['dateStart']['d'] || $param['dateEnd']['Y']|| $param['dateEnd']['m']|| $param['dateEnd']['d'] )
        //    $serchArray['dateLimit'] = systemSearchDB::SearchDate( $param, 'dateStart', 'dateEnd', 'holdingDate', 'holdingDate' );

        if( $param['category'] )
            $serchArray['subCategory'] = " `subCategory` LIKE '%|" . $param['category'] . "|%' ";

        if( $param['unId'] )
            $serchArray['unId'] = " `id` <> " . $param['unId'] . " ";

/*
        if( $param['makerId'] )
            $serchArray['makerId'] = " `makerId` = " . $param['makerId'] . " ";

        if( $param['name'] )
            $serchArray['name'] = " `name` LIKE '%" . $param['name'] . "%' ";

        if( $param['word'] )
            $serchArray['word'] = " `name` LIKE '%" . $param['word'] . "%' OR `modelNumber` LIKE '%" . $param['word'] . "%' ";

        if( $param['option'] )
            $serchArray['option'] = " `category` = 99 ";



        if( $param['unOption'] )
            $serchArray['unOption'] = " `category` <> 99 ";

        if( $param['relatedProduct'] )
        {
            foreach( (array)$param['relatedProduct'] AS $key => $value )
            {
                $serchArray['relatedProduct'] .= " `id` = " . $key . " OR ";
            }
            if( $serchArray['relatedProduct'] ) $serchArray['relatedProduct'] = rtrim( $serchArray['relatedProduct'], 'OR ' );
        }

        if( $param['optionProduct'] )
        {
            foreach( (array)$param['optionProduct'] AS $key => $value )
            {
                $serchArray['optionProduct'] .= " `id` = " . $key . " OR ";
            }
            if( $serchArray['optionProduct'] ) $serchArray['optionProduct'] = rtrim( $serchArray['optionProduct'], 'OR ' );
        }
*/
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


    //検索用文字列作成
    public function ArraySearchWhere( $searchArray = array(), $idName = 'id' )
    {
        foreach( (array)$searchArray AS $key => $value )
        {
            if( $key )$search .= " `" . $idName . "` = " . $key . " OR ";
        }
        if( $search ) $search = rtrim( $search, 'OR ' );

        return( $search ) ? ' AND ' . '( ' . $search . ' )': null;
    }


    /**
     *コピーメソッド
     *//*
    public function CopyData( $data = array(), $debFlg = null )
    {
        $data['upDateTime'] = date( 'Y-m-d H:i:s' );

        $copyData = self::Detail( $data['id'] );


        if( $copyData['fileName1'] )
        {
            $microTimeArray = explode( ' ', microtime() );
            $unique = time() . '_' . str_replace( '.', '', $microTimeArray[0] );
            @preg_match( '/\.[a-z]+$/i', $copyData['fileName1'], $matches );
            $copyFile = $unique . $matches[0];

            @copy( '../upImage/' . self::$tableName . '/' . $copyData['fileName1'], '../upImage/' . self::$tableName . '/' . $copyFile );
        }

        self::DBConnect();
        $insertArray = array(
            $copyData['category'], $copyData['title'], $copyData['subTitle'], $copyData['comment'], $copyData['startDate'], $copyData['endDate'], $copyData['openTime'], 
            $copyData['kaijou'], $copyData['entrance'], $copyData['sponsorshipFlg'], $copyData['sponsorshipText'], $copyData['organization'], $copyData['inquiry'], $copyData['urlTitle'], 
            $copyData['url'], $copyData['sponsorship2'], $copyData['shiriburi'], $copyData['support'], $copyData['dispFlg'], 
            $copyFile, $copyData['width1'], $copyData['height1'] );
        self::$db->query(
            "INSERT `" . self::$tableName . "` ( 
                `category`, `title`, `subTitle`, `comment`, `startDate`, `endDate`, `openTime`, 
                `kaijou`, `entrance`, `sponsorshipFlg`, `sponsorshipText`, `organization`, `inquiry`, `urlTitle`, 
                `url`, `sponsorship2`, `shiriburi`, `support`, `dispFlg`, 
                `fileName1`, `width1`, `height1` ) 
             VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ) ", $insertArray );
        self::Debug( $result, DEBUG_FLG, QUERY_FLG );

        if( $copyData['addItem'][0] || $copyData['addContents'][0] )
        {
            $id = self::$db->getOne( "SELECT LAST_INSERT_ID()" );
            foreach( $copyData['addItem'] AS $key => $value )
            {
                self::$db->query(
                "INSERT `" . self::$imgTableName . "` ( `id`, `addItem`, `addContents`, `priority` ) VALUES ( ?, ?, ?, ? ) ", 
                 array( $id, $copyData['addItem'][$key], $copyData['addContents'][$key], $key ) );

                self::Debug( $result, DEBUG_FLG, QUERY_FLG );
            }
        }

        self::$db->disconnect();
        return $copyData['title'];
    }*/
}
?>
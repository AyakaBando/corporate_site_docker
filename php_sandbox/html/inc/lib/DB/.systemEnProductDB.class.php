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
    public $tableName    = 'en_product';
    public $imgTableName = 'en_product_img';
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
                $sqlSelect  = ", ( SELECT `priority` FROM `en_product_sort` WHERE `en_product_sort`.`id` = `en_product`.`id` AND `en_product_sort`.`category` = '" . $param['category'] . "' LIMIT 1 ) AS `scPriority` ";
                $sqlOrderBy = " `scPriority`, `id` DESC ";
            }
            else
                $sqlOrderBy = ' `priority`, `id` DESC';
        }

        $queryStr = 
            "SELECT `" . $this->tableId . "`, `subCategory`, `subName`, `name`, `dateTime`, `dispFlg` " . $sqlSelect . " 
               FROM `" . $this->tableName . "` 
              " . $this->ListWhere( $param ) . "
           ORDER BY " . $sqlOrderBy;

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
        $this->_setQuery( 'query', "DELETE FROM `en_product_sort` WHERE `category` = ? ", array( $getData['category'] ) );

        foreach( (array)$pastData['id'] AS $key => $value )
        {
            $insertArray = array( $value, $getData['category'], $key + 1 );
            $this->_setQuery( 'query', "INSERT `en_product_sort` ( `id`, `category`, `priority` ) VALUES ( ?, ?, ? ) ", $insertArray );
        }
    }

    /**
     * #用途順番更新
     */
    public function SortAllSave( $pastData = array(), $getData = array() )
    {
        foreach( (array)$pastData['id'] AS $key => $value )
        {
            $queryStr = "UPDATE `en_product` SET `priority` = ? WHERE `id` = ? LIMIT 1";
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

        $itemName = $this->GetCulumnContents( 'en_product', 'name', 'id', $data['id'] );

        $result = $this->_setQuery( 'query', "SELECT `id`, `fileName` FROM `en_product_img` WHERE `id` = ?", array( $data['id'] ) );
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
            @unlink( '../upImage/product/' . $row['fileName'] );

        $queryStr = " DELETE FROM `en_product` WHERE `id` = ? LIMIT 1";
        $result = $this->_setQuery( 'query', $queryStr, array( $data['id'] ) );

        $queryStr = " DELETE FROM `en_product_img` WHERE `id` = ? ";
        $result = $this->_setQuery( 'query', $queryStr, array( $data['id'] ) );

        $queryStr = " DELETE FROM `en_product_news` WHERE `id` = ? ";
        $result = $this->_setQuery( 'query', $queryStr, array( $data['id'] ) );


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
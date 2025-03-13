<?php
require_once( '.queserser.DB.class.php' );
/*  */

/**
 * [[機能説明]]
 *
 * @dateTime_Decode()
 * @dateTime_Convert()
 * @stringConnect_decodeArray()
 * @stringConnection()
 */
class systemProductNewsDB extends queserserDB
{
    private $tableName = 'product_news';
    private $tableId   = 'newsId';
/******************************************************
    # ニュースリリース
******************************************************/
    /**
     *ニュースリリース登録メソッド
     */
    public function DataSave( $data = array(), $debFlg = null )
    {
        $data['dateTime']   = dateTime_Convert( $data['dateTime'] );

        if( !$data['newsId'] )
        {
            $insertArray = array(
                $data['id'], $data['type'], $data['subCategory'], $data['title'], $data['url'], $data['pdfFileName'], 
                $data['fileName'][1], $data['width'][1], $data['height'][1], 
                $data['contentsCategory'], $data['comment'], $data['dispFlg'], $data['dateTime'] );

            $queryStr = 
                "INSERT `" . $this->tableName . "` (
                    `id`, `type`, `subCategory`, `title`, `url`, `pdfFileName`, 
                    `imgFileName`, `width`, `height`, 
                    `contentsCategory`, `comment`, `dispFlg`, `dateTime` ) 
                 VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ) ";
            $result = $this->_setQuery( 'query', $queryStr, $insertArray );
        }
        else
        {
            if( !$data['pdfDel'] && $data['pdfFileName'] )
                $pdfQuery = ", `pdfFileName` = '" . $data['pdfFileName'] . "'";

            if( $data['pdfDel'] )
                $pdfQuery = ", `pdfFileName` = NULL";

            if( !$data['imageDel'][1] && $data['fileName'][1] )
                $fileQuery = ", `imgFileName` = '" . $data['fileName'][1] . "', `width` = '" . $data['width'][1] . "', `height` = '" . $data['height'][1] . "'";

            if( $data['imageDel'][1] )
                $fileQuery = ", `imgFileName` = NULL, `width` = NULL, `height` = NULL";

            $updateArray = array(
                $data['type'], $data['subCategory'], $data['title'], $data['url'], 
                $data['contentsCategory'], $data['comment'], $data['dispFlg'], $data['dateTime'],  
                $data['newsId'] );
            $queryStr = 
                 "UPDATE `" . $this->tableName . "` 
                    SET `type` = ?, `subCategory` = ?, `title` = ?, `url` = ?, 
                        `contentsCategory` = ?, `comment` = ?, `dispFlg` = ?, `dateTime` = ? 
                        " . $fileQuery . $pdfQuery . "
                  WHERE `" . $this->tableId . "` = ? LIMIT 1";
            $result = $this->_setQuery( 'query', $queryStr, $updateArray );
        }

    }

    /**
     *ニュースリリース一覧取得メソッド
     */
    public function DataList( $id, $ls = 0, $limit = 1, $param = array(), $debFlg = null )
    {
        $this->ls    = $ls;
        $this->limit = $limit;

        //ソート条件
        if( $param['sort'] && $param['cond'] )
            $sqlOrderBy = '`' . $param['sort'] . '` ' . $param['cond'];
        else
            $sqlOrderBy = '`dateTime` DESC, `newsId` DESC';

        if( $param['type'] )
        {
            $sqlWhere = " AND `type` = '" . $param['type'] . "' ";
        }

        //一覧取得
        $queryStr = 
             "SELECT `" . $this->tableId . "`, `id`, `type`, `subCategory`, `title`, `url`, `pdfFileName`, `width`, `height`, 
                    `contentsCategory`, `comment`, `dispFlg`, `dateTime` 
               FROM `" . $this->tableName . "` 
              WHERE `id` = ? " . $sqlWhere . "
             ORDER BY ". $sqlOrderBy;
        $result = $this->_setQuery( 'limitQuery', $queryStr, array( $id ) );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            $data[] = $row;
        }

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     *ニュースリリース詳細取得メソッド
     */
    public function Detail( $id = null, $debFlg = null )
    {
        //ユーザー一覧取得
        $queryStr = 
            "SELECT `" . $this->tableId . "`, `id`, `type`, `subCategory`, `title`, `url`, `pdfFileName`, `imgFileName`, `width`, `height`, 
                    `contentsCategory`, `comment`, `dispFlg`, `dateTime` 
               FROM `" . $this->tableName . "` 
              WHERE `" . $this->tableId . "` = ? LIMIT 0, 1";
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
     *ニュースリリース削除メソッド
     *//*
    public function DataDelete( $data = array(), $debFlg = null )
    {
        $title = $this->GetCulumnContents( $this->tableName, 'title', $this->tableId, $data['id'] );
        self::$db->query( "DELETE FROM `" . $this->tableName . "` WHERE `" . $this->tableId . "` = ? LIMIT 1", array( $data['id'] ) );

        return ( $title ) ? $title : '';
    }*/


    /**
     * #ニュースリリース表示修正メソッド
     *//*
    public function DispChange( $data, $debFlg = null )
    {
        //$debFlg++;

        $title = $this->GetCulumnContents( $this->tableName, 'title', $this->tableId, $data['id'] );
        $updateArray = array( $data['disp'], $data['id'] );
        self::$db->query( "UPDATE `" . $this->tableName . "` SET `dispFlg` = ? WHERE `" . $this->tableId . "` = ? LIMIT 1", $updateArray );

        return ( $title ) ? $title : '';
    }*/

}
?>
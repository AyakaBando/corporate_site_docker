<?php
require_once( dirname(__FILE__) . '/../.queserser.DB.class.php' );
require_once( dirname(__FILE__) . '/../.systemSearchDB.class.php' );
/*  */

/**
 * [[機能説明]]
 *
 * @dateTime_Decode()
 * @dateTime_Convert()
 * @stringConnect_decodeArray()
 * @stringConnection()
 */

class systemFolderDB extends queserserDB
{
    private $tableName = 'contact_folder';
    private $tableId   = 'id';
/******************************************************
    # 大カテゴリ
******************************************************/
    /**
     *品種一覧取得メソッド
     */
    public function DataList( $ls = 0, $limit = 10, $param = array(), $debFlg = null )
    {
        $this->ls    = $ls;
        $this->limit = $limit;

        //ソート条件
        if( $param['sort'] && $param['cond'] )
            $sqlOrderBy = '`' . $param['sort'] . '` ' . $param['cond'];
        else
            $sqlOrderBy = '`priority`, `id` DESC';

        $queryStr = 
            "SELECT `" . $this->tableId . "`, `bigId`, `name`, `url`, `dispFlg`, `fileName1`, `width1`, `height1`, `priority`, `dateTime` 
               FROM `" . $this->tableName . "` 
              " . $this->ListWhere( $param ) . "
             ORDER BY " . $sqlOrderBy;
        $result = $this->_setQuery( 'limitQuery', $queryStr, array(  ) );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            $data[] = $row;
        }

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     *品種詳細取得メソッド
     */
    public function Detail( $id = null, $debFlg = null )
    {
        //ユーザー一覧取得
        $queryStr = "SELECT * FROM `" . $this->tableName . "` WHERE `" . $this->tableId . "` = ?LIMIT 0, 1 ";
        $result = $this->_setQuery( 'query', $queryStr, array( $id ) );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            $row['image'][1]['fileName'] = $row['fileName1'];
            $row['image'][2]['fileName'] = $row['fileName2'];
            $row['image'][3]['fileName'] = $row['fileName3'];
            $row['image'][4]['fileName'] = $row['fileName4'];
            $row['image'][5]['fileName'] = $row['fileName5'];
            $data = $row;
        }

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     * #順番更新
     */
    public function SortSave( $data = array(), $getParam, $debFlg = null )
    {
        foreach( (array)$data['id'] AS $key => $value )
        {
            $upDateArray = array( $key + 1, $value );

            $queryStr = "UPDATE `" . $this->tableName . "` SET `priority` = ? WHERE `" . $this->tableId . "` = ? LIMIT 1";
            $result = $this->_setQuery( 'query', $queryStr, $upDateArray );
        }
    }



    /**
     *ニュースリリース削除メソッド
     */
    public function DataDelete( $data = array(), $debFlg = null )
    {
        $title = $this->GetCulumnContents( $this->tableName, 'name', $this->tableId, $data[$this->tableId] );

        $queryStr = "DELETE FROM `" . $this->tableName . "` WHERE `" . $this->tableId . "` = ? LIMIT 1";
        $result = $this->_setQuery( 'query', $queryStr, array( $data[$this->tableId] ) );

        return ( $title ) ? $title : null;
    }



    /**
     *検索条件生成メソッド
     */
    public function ListWhere( $param = array(), $debFlg = null )
    {
/*
        if( $param['dateStart']['Y'] || $param['dateStart']['m'] || $param['dateStart']['d'] || $param['dateEnd']['Y'] || $param['dateEnd']['m'] || $param['dateEnd']['d'] )
            $serchArray['dateLimit'] = systemSearchDB::SearchDate( $param, 'dateStart', null, 'startDate' );

        if( $param['mc'] )
            $serchArray['mc'] = " `midId` = " . $param['mc'] . " ";
*/

        if( $param['bc'] )
            $serchArray['bc'] = " `bigId` = " . $param['bc'] . " ";

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


}
?>
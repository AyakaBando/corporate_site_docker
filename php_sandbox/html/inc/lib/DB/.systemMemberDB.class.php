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
class systemMemberDB extends queserserDB
{
/******************************************************
    # 部位
******************************************************/
    /**
     *部位一覧取得メソッド
     */
    public function DataList( $ls = 0, $limit = 10, $param = array(), $debFlg = null )
    {
        $this->ls    = $ls;
        $this->limit = $limit;

        //ソート条件
        if( $param['sort'] && $param['cond'] )
            $sqlOrderBy = '`' . $param['sort'] . '` ' . $param['cond'];
        else
            $sqlOrderBy = '`regDateTime` DESC';

        $queryStr = 
            "SELECT `memberId`, `companyName`, `name`, `job`, `eMail`, `regDateTime`, 
                    IF( ( SELECT IF( MAX( `dateTime` ), MAX( `dateTime` ), '0000-00-00 00:00:00' ) FROM `downloadFileCnt` WHERE `memberMaster`.`memberId` = `downloadFileCnt`.`memberId` ) > ( SELECT IF( MAX( `dateTime` ), MAX( `dateTime` ), '0000-00-00 00:00:00' ) FROM `downloadZipCnt` WHERE `memberMaster`.`memberId` = `downloadZipCnt`.`memberId` ), ( SELECT MAX( `dateTime` ) FROM `downloadFileCnt` WHERE `memberMaster`.`memberId` = `downloadFileCnt`.`memberId` ), ( SELECT MAX( `dateTime` ) FROM `downloadZipCnt` WHERE `memberMaster`.`memberId` = `downloadZipCnt`.`memberId` ) ) AS `maxDate` 
               FROM `memberMaster` 
              " . self::ListWhere( $param ) . "
             ORDER BY " . $sqlOrderBy . 
             " LIMIT " . intval($this->limit) . " OFFSET " . intval($this->ls);

        $result = $this->_setQuery( 'limitQuery', $queryStr, array() );


        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            $data[$row['memberId']] = $row;
        }

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     * #順番更新
     *//*
    public function SortSave( $data = array(), $debFlg = null )
    {
        foreach( (array)$data['id'] AS $key => $value )
        {
            $upDateArray = array( $key + 1, $value );
            $this->_setQuery( 'query', "UPDATE `maker` SET `priority` = ? WHERE `makerId` = ? LIMIT 1", $upDateArray );
        }
    }*/


    /**
     *部位詳細取得メソッド
     */
    public function Detail( $id = null, $debFlg = null )
    {
        $this->ls    = 0;
        $this->limit = 1;

        //ユーザー一覧取得
        $queryStr = "SELECT * FROM `memberMaster` WHERE `memberId` = ? ";
        $result = $this->_setQuery( 'limitQuery', $queryStr, array( $id ) );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            $row['medium'] = stringConnect_decodeArray( $row['medium'] );
            $row['pdf']    = stringConnect_decodeArray( $row['pdf'] );
            $data = $row;
        }

        return ( isset( $data ) ) ? $data : null;
    }

    //         /**
    //  * 指定したテーブルのレコード数を取得する
    //  *
    //  * @param string $table テーブル名
    //  * @param string $where WHERE句の条件（オプション）
    //  * @return int レコード数
    //  */
    // public function listCount($table, $where = '')
    // {
    //     $queryStr = "SELECT COUNT(*) FROM `{$table}`";

    //     // WHERE句があれば追加
    //     if ($where) {
    //         $queryStr .= " WHERE {$where}";
    //     }

    //     // クエリの実行
    //     $result = $this->_setQuery('query', $queryStr, array());

    //     // 結果の取得
    //     $row = $result->fetchRow(DB_FETCHMODE_ASSOC);

    //     return (int) $row[0]; // COUNTの結果を返す
    // }



    /**
     *検索条件生成メソッド
     */
    public function ListWhere( $param = array(), $debFlg = null )
    {
        if( $param['dateStart']['Y'] || $param['dateStart']['m'] || $param['dateStart']['d'] || $param['dateEnd']['Y'] || $param['dateEnd']['m'] || $param['dateEnd']['d'] )
            $serchArray['dateLimit'] = systemSearchDB::SearchDate( $param, 'dateStart', null, 'startDate' );

        //if( $param['freeword'] )
        //    $serchArray['freeword'] = " `eMail` LIKE '%" . $param['freeword'] . "%' OR `name` LIKE '%" . $param['freeword'] . "%' OR `companyName` LIKE '%" . $param['freeword'] . "%' ";

        if( $param['companyName'] )
            $serchArray['companyName'] = " `companyName` LIKE '%" . $param['companyName'] . "%' ";

        if( $param['name'] )
            $serchArray['name'] = " `name` LIKE '%" . $param['name'] . "%' ";

        if( $param['address'] )
            $serchArray['address'] = " CONCAT( `prefStr`, `address1`, `address2` ) LIKE '%" . $param['address'] . "%' ";

        if( $param['puroductId'] )
            $serchArray['puroductId'] = " ( SELECT COUNT( * ) FROM `downloadFileCnt` WHERE `memberMaster`.`memberId` = `downloadFileCnt`.`memberId` AND `id` = " . $param['puroductId'] . " ) >= 1 ";

        if( $param['relationJob'] )
        {
            foreach( (array)$param['relationJob'] AS $key => $value )
            {
                if( $value )$serchArray['relationJob'] .= " `relationJob` = " . $key . " OR ";
            }
            if( $serchArray['relationJob'] ) $serchArray['relationJob'] = rtrim( $serchArray['relationJob'], 'OR ' );
        }

        if( $param['subJobCategory'] )
        {
            foreach( (array)$param['subJobCategory'] AS $key => $value )
            {
                if( $value )$serchArray['subJobCategory'] .= " `subJobCategory` = " . $key . " OR ";
            }
            if( $serchArray['subJobCategory'] ) $serchArray['subJobCategory'] = rtrim( $serchArray['subJobCategory'], 'OR ' );
        }

        if( $param['blank'] )
        {
            $serchArray['blank'] .= " `memberId` <= 198 ";
        }

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

    public function Disconnect() {
        if ($this->db instanceof mysqli) {
            $this->db->close();
        }
    }


}
?>
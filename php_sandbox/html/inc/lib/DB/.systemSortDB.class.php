<?php
require_once( '.queserser.DB.class.php' );
/*  */

/**
 * [[機能説明]]
 *
 * @
 * @
 * @
 */
class systemSortDB extends queserserDB
{

/******************************************************
    # 新着情報
******************************************************/
    /**
     * #ソート用一覧取得メソッド
     */
    static function SortList( $tableName, $category, $selectColumnArray, $orderByColumn, $subQuery = null )
    {
        self::DBConnect();

        $select = self::CleartSelect( $selectColumnArray );
        $where = self::CleartWhere( $category );

        $query =
            "SELECT "  . $select . "
               FROM `" . $tableName . "` 
              WHERE "  . $where['whereStr'] . "
           ORDER BY "  . $orderByColumn;

        $result = self::$db->query( $query, $where['selectArray'] );
        if( $debFlg )echo self::$db->last_query.'<hr />';

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            $data[] = $row;
        }
        self::$db->disconnect();

        return ( isset( $data ) ) ? $data : null;
    }


    /**
     * #順番更新
     */
    static function SortSave( $tableName, $data = array(), $getParam, $queryData, $debFlg = null )
    {
        self::DBConnect();

        //self::$db->query( " FROM `" . $tableName . "` WHERE `category` = ?", array( $getParam['select'] ) );
//$debFlg++;
        foreach( (array)$data['reNewId'] AS $key => $value )
        {
            $upDateArray = array( $key + 1, $value );
            self::$db->query( "UPDATE `" . $tableName . "` SET `" . $queryData['priority'] . "` = ? WHERE `" . $queryData['id'] . "` = ? LIMIT 1", $upDateArray );
            if( $debFlg )echo self::$db->last_query.'<hr />';
        }

        self::$db->disconnect();
    }

    /**
     * #並び替え呼び出しWHERE句生成
     */
    static function CleartWhere( $data )
    {
        foreach( (array)$data AS $key => $value )
        {
            if( $value )
            {
                $returnData['whereStr']      .= "`" . $key . "` = ? AND ";
                $returnData['selectArray'][]  = $value;
            }
        }

        if( $returnData['whereStr'] )$returnData['whereStr'] = rtrim( $returnData['whereStr'], ' AND ' );

        return ( $returnData ) ? $returnData : '';
    }

    /**
     * #並び替え呼び出しSELECT句生成
     */
    static function CleartSelect( $data )
    {
        foreach( (array)$data AS $key => $value )
        {
            $selectStr .= '`' . $value . '`, ';
        }

        return rtrim( $selectStr, ', ' );
    }
}
?>
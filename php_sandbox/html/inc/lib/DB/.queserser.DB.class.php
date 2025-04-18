<?php
/**
 * [[機能説明]]
 * @
 * @
 * @
 */

 if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(dirname(dirname(__DIR__))));
}


define( 'INSERT_MODE', 1 );
define( 'UPDATE_MODE', 2 );
define( 'DEBUG_FLG',   1 );

/*
if( $_SERVER['REMOTE_ADDR'] == '118.103.51.217' )
    define( 'QUERY_FLG',   0 );
else
    define( 'QUERY_FLG',   0 );
*/
    define( 'QUERY_FLG',   0 );

/**
 * @NORMAL     //通常
 * @DB_PEAR    //pear DB
 * @MDB2       //pear MDB2
 */
define( 'DB_NORMAL', 99 );
define( 'DB_PEAR',   1 );
define( 'DB_MDB2',   2 );

define( 'DB_MODE',   DB_PEAR );


if( DB_MODE == DB_PEAR ) require_once( ROOT_PATH . '/inc/DB.php' );

// require_once(ROOT_PATH . '/inc/lib/DB.php');


class queserserDB
{
    private $db;

    private $dsn = array(

        "phptype"  => "mysqli",
        "username" => '_moritaalumi',
        "password" => 'morialu2018',
        "hostspec" => 'mysql_db',
        "database" => 'moritaalumi_db'
/*
        'phptype'  => 'mysqli',
        'username' => '_test735',
        'password' => '07290729',
        'hostspec' => 'mysql505.heteml.jp',
        'database' => '_test735'
*/
    );

    private $queryStr;
    private $queryArray;
    private $column;
    public $ls;
    public $limit;




    function __construct()
    {
        switch( DB_MODE )
        {
            case DB_PEAR://pear DB
                $this->db = DB::connect( $this->dsn );

                            // ここで接続エラーをチェック
            if (PEAR::isError($this->db)) {
                die('DB接続エラー: ' . $this->db->getMessage());
            }
            
                $this->db->query( 'set names utf8' );
                break;

            case DB_MDB2://pear MDB2
                break;

            default://通常
                $this->db = mysql_connect( $this->dsn['hostspec'], $this->dsn['username'], $this->dsn['password'] );
                mysql_select_db( $this->dsn['database'], $this->db );
                break;
        }
    }

    public function _setQuery( $mode = null, $queryStr, $valueArray = array(), $column = null )
    {
        $this->queryStr   = $queryStr;
        $this->queryArray = $valueArray;
        if( $column )
            $this->column     = $column;
        return $this->exeQuery( $mode );
    }


    // *全テーブルから指定カラム1件取得
    public function GetCulumnContents( $tableName, $getColumn, $idColumn, $id, $oneFlg = null, $debFlg = null )
    {
        $culmnContents = $this->_setQuery( 'getOne', "SELECT `" . $getColumn . "` FROM `" . $tableName . "` WHERE `" . $idColumn . "` = ? ", array( $id ) );

        return ( $culmnContents ) ? $culmnContents : null;
    }


    // * #表示修正メソッド
    public function DispChange( $tableName, $data, $settingArray = array() )
    {
        //$title = $this->GetCulumnContents( $tableName, $settingArray['title'], $settingArray['id'], $data[$settingArray['id']] );
        $result = $this->_setQuery( 'query', "UPDATE `" . $tableName . "` SET `" . $settingArray['dispFlg'] . "` = ? WHERE `" . $settingArray['id'] . "` = ? LIMIT 1", array( $data['dispFlg'], $data[$settingArray['id']] ) );

        return ( $data[$settingArray['id']] ) ? $data[$settingArray['id']] : '';
    }



    // * #削除メソッド
    public function DataDelete( $tableName, $data, $settingArray = array() )
    {
        $title  = $this->GetCulumnContents( $tableName, $settingArray['title'], $settingArray['id'], $data[$settingArray['id']] );
        $result = $this->_setQuery( 'query', "DELETE FROM `" . $tableName . "` WHERE `" . $settingArray['id'] . "` = ? LIMIT 1", array( $data[$settingArray['id']] ) );

        return ( $title ) ? $title : null;
    }



    // * #カウントメソッド
    public function listCount($table, $where = "")
    {
        // SQLクエリを構築（テーブル名とWHERE条件を受け取る）
        $queryStr = "SELECT COUNT(*) as count FROM `" . $table . "` " . $where;

        // クエリ実行
        $result = $this->_setQuery('getOne', $queryStr);

        // 結果が取得できれば、カウントを返す
        return ($result) ? $result : 0;
    }

    

    private function exeQuery($mode)
{
    switch ($mode) {
        case 'getOne':
            return $this->db->getOne($this->queryStr, $this->queryArray);

        case 'getRow':
            return $this->db->getRow($this->queryStr, $this->queryArray);

        case 'getAll':
            return $this->db->getAll($this->queryStr, $this->queryArray);

        case 'limitQuery':
            $sth = $this->db->prepare($this->queryStr);
            $res = $this->db->execute($sth, $this->queryArray);
            return $res;

        case 'query':
        default:
            return $this->db->query($this->queryStr, $this->queryArray);
    }
}

}
?>
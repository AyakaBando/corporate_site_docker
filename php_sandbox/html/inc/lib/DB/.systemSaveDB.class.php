<?php
require_once( '.queserser.DB.class.php' );
/*  */

/**
 * [[機能説明]]
 *
 * @$connectionKey 文字列連結
 * @$timeKey       時間連結
 * @$dateKey       日付連結
 * @$dateTimeKey   日時連結
 * @$fileKey       別テーブル用
 * @$lastFlg       LAST_INSERT_ID取得判別
 基本形
CREATE TABLE `tableName` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(2) DEFAULT NULL,
  `title` varchar(512) DEFAULT NULL,
  `url` varchar(512) DEFAULT NULL,
  `comment` text,
  `dispFlg` int(1) DEFAULT NULL,
  `fileName` varchar(128) DEFAULT NULL,
  `width` varchar(4) DEFAULT NULL,
  `height` varchar(4) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE `tableName_useName` (
  `id` int(11) NOT NULL,
  `fileName` varchar(128) DEFAULT NULL,
  `width` varchar(4) DEFAULT NULL,
  `height` varchar(4) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
 */


class CreatQueryDB exTends queserserDB
{
    private $tableName;
    private $data          = array();
    private $anData        = array();
    private $connectionKey = array();
    private $timeKey       = array();
    private $dateKey       = array();
    private $dateTimeKey   = array();
    private $id            = null;
    private $lastFlg       = null;
    private $idName        = 'id';
    private $fileArray     = array();
    private $fileAnData    = array();
    private $limitFlg      = null;
    private $checkArray    = array();

    public  $queryObj;

    public function _setParam( $saveParam )
    {
        if( $saveParam['tableName'] )
            $this->tableName     = $saveParam['tableName'];
        if( $saveParam['data'] )
            $this->data          = $saveParam['data'];
        if( $saveParam['anData'] )
            $this->anData        = $saveParam['anData'];
        if( $saveParam['connectionKey'] )
            $this->connectionKey = $saveParam['connectionKey'];
        if( $saveParam['timeKey'] )
            $this->timeKey       = $saveParam['timeKey'];
        if( $saveParam['dateKey'] )
            $this->dateKey       = $saveParam['dateKey'];
        if( $saveParam['dateTimeKey'] )
            $this->dateTimeKey   = $saveParam['dateTimeKey'];
        if( $saveParam['fileArray'] )
            $this->fileArray     = $saveParam['fileArray'];
        if( $saveParam['fileAnData'] )
            $this->fileAnData    = $saveParam['fileAnData'];
        if( $saveParam['id'] )
            $this->id            = $saveParam['id'];
        if( $saveParam['lastFlg'] )
            $this->lastFlg       = $saveParam['lastFlg'];
        if( $saveParam['idName'] )
            $this->idName        = $saveParam['idName'];
        if( $saveParam['limitFlg'] )
            $this->limitFlg      = $saveParam['limitFlg'];

        $this->queryObj = new queserserDB();
    }


    //tableName set
    public function _setTableName( $tableName )
    {
        $this->tableName = $tableName;
    }

    //data set
    public function _setData( $data = array() )
    {
        $this->data = $data;
    }

    //anData set
    public function _setAnData( $anData = array() )
    {
        $this->anData = $anData;
    }

    public function resetLastFlg()
    {
        $this->lastFlg       = null;
    }

    //文字列連結系配列リセット
    public function resetConnection()
    {
        $this->connectionKey = array();
        $this->timeKey       = array();
        $this->dateKey       = array();
        $this->dateTimeKey   = array();
    }


    /**
     *データチェックメソッド
     */
    public function DataCheck( $checkArray = array(), $column )
    {
        $this->checkArray = $checkArray;

        $sqlWhere = $this->WhereProcessing();

        if( $sqlWhere )
        {
            $query = " SELECT `" . $column . "` FROM `" . $this->tableName . "` WHERE " . $sqlWhere;

            return $this->queryObj->_setQuery( 'getOne', $query, $queryArray, 'fileName' );
        }
    }

/******************************************************
    >> 登録・更新
******************************************************/
    /**
     *登録メソッド
     */
    public function Save()
    {
        if( !$this->id )
            $id = $this->Insert();
        else
            $id = $this->UpDate();

        return $id;
    }

    /**
     *インサート用メソッド
     */
    public function Insert()
    {
        $process = $this->QueryProcessing( INSERT_MODE );

        $query      = "INSERT `" . $this->tableName . "` ( " . $process['insertItem'] . " ) VALUES ( " . $process['insertValue'] . " ) ";
        $queryArray = $process['queryArray'];

        $this->queryObj->_setQuery( 'query', $query, $queryArray );

        if( $this->lastFlg )
        {
            $query = "SELECT LAST_INSERT_ID()";
            return $this->queryObj->_setQuery( 'getOne', $query, null, 'LAST_INSERT_ID()' );
        }
    }


    /**
     *更新メソッド
     */
    public function UpDate()
    {
        $process = $this->QueryProcessing( UPDATE_MODE );

        //指定カラムでのUPDATE
        if( count( $this->checkArray ) >= 1 )
        {
            $sqlWhere = $this->WhereProcessing();
        }
        //id[auto_increment]でのUPDATE
        else
        {
            $sqlWhere = " `" . $this->idName . "` = '" . $this->id . "' ";
        }

        $query = "UPDATE `" . $this->tableName . "` SET " . $process['upDateItem'] . " WHERE " . $sqlWhere;

        if( $this->limitFlg )
            $query .= " LIMIT 1";
        $queryArray = $process['queryArray'];

        $this->queryObj->_setQuery( 'query', $query, $queryArray );



        if( $this->lastFlg )
            return $this->id;
    }


    /**
     *削除メソッド
     */
    public function Delete( $whereArray = array(), $oneFlg = null )
    {
        if( count( $whereArray ) >= 1 )
            $sqlWhere = $this->WhereProcessing( $whereArray );

        $query = "DELETE FROM `" . $this->tableName . "` WHERE " . $sqlWhere;
        if( $oneFlg )
            $query .= " LIMIT 1 ";

        $this->queryObj->_setQuery( 'query', $query, $queryArray );
    }


    /**
     * #WHERE句加工メソッド
     */
    private function WhereProcessing( $processArray = array() )
    {
        $whereArray = ( $processArray ) ? $processArray : $this->checkArray;

        foreach( (array)$whereArray AS $key => $value )
        {
            $sqlWhere .= " `" . $key . "` = '" . $value . "' AND ";
        }

        return ( $sqlWhere ) ? rtrim( $sqlWhere, 'AND ' ) : '';
    }


    /**
     * #クエリ加工メソッド
     */
    private function QueryProcessing( $mode )
    {
        foreach( (array)$this->data AS $key => $value )
        {
            if( @array_search( $key, $this->anData ) === false )
            {
                //文字列連結データ
                if( is_int( array_search( $key, (array)$this->connectionKey ) ) )
                {
                    $value = stringConnection( $this->data[$key] );
                }

                //時間データ
                if( is_int( array_search( $key, (array)$this->timeKey ) ) )
                {
                    $value = time_Convert( $this->data[$key] );
                }

                //日付データ
                if( is_int( array_search( $key, (array)$this->dateKey ) ) )
                {
                    $value = date_Convert( $this->data[$key] );
                }

                //日時データ
                if( is_int( array_search( $key, (array)$this->dateTimeKey ) ) )
                {
                    $value = dateTime_Convert( $this->data[$key] );
                }

                if( $value || $value === 0 || $value === '0' )
                    $returnArray['queryArray'][] = $value;


                if( DB_MODE == DB_PEAR || DB_MODE == DB_MDB2 )
                    $sqlValue = '?';
                else
                    $sqlValue = " '" . $value . "' ";

                if( $mode == INSERT_MODE )
                {
                    $returnArray['insertItem']   .= '`' . $key . '`, ';
                    if( $value || $value === 0 )
                        $returnArray['insertValue']  .= $sqlValue . ', ';
                    else
                        $returnArray['insertValue']  .= 'NULL, ';
                }
                else if( $mode == UPDATE_MODE )
                {
                    if( $value || preg_match( '/^0$/', $value ) )
                        $returnArray['upDateItem']   .= '`' . $key . '` = ' . $sqlValue . ', ';
                    else
                        $returnArray['upDateItem']   .= '`' . $key . '` = NULL, ';
                }
            }
        }

        //ファイルデータ
        if( $this->fileArray )
        {
            foreach( (array)$this->fileArray AS $key => $value )
            {

                foreach( (array)$value AS $akey => $avalue )
                {
                    if( !$this->data['imageDel'][$key] && $this->fileArray[$key]['fileName'] && ( $this->fileArray[$key]['width'] || $this->fileArray[$key]['pictureOutsideFlg'] ) )
                        $insertValue = $avalue;
                    else
                        $insertValue = '';

                    if( array_search( $akey, (array)$this->fileAnData ) === false )
                    {
                        if( DB_MODE == DB_PEAR || DB_MODE == DB_MDB2 )
                            $sqlFileValue = '?';
                        else
                            $sqlFileValue = " '" . $insertValue . "' ";

                        $mergeData['insertItem']  .= ' `' . $akey . $key . '`, ';
                        $mergeData['insertValue'] .= $sqlFileValue . ', ';
                        $mergeData['upDateItem']  .= ' `' . $akey . $key . '` = ' . $sqlFileValue . ', ';
                        $returnArray['mergeQueryArray'][] = $insertValue;
                    }
                }
            }
        }

        if( is_array( $returnArray['mergeQueryArray'] ) )
            $returnArray['queryArray'] = array_merge( $returnArray['queryArray'], $returnArray['mergeQueryArray'] );

        if( $returnArray['insertItem'] ) $returnArray['insertItem']  = rtrim( ( $returnArray['insertItem'] . $mergeData['insertItem'] ), ', ' );
        if( $returnArray['insertValue'] )$returnArray['insertValue'] = rtrim( ( $returnArray['insertValue'] . $mergeData['insertValue'] ), ', ' );
        if( $returnArray['upDateItem'] ) $returnArray['upDateItem']  = rtrim( ( $returnArray['upDateItem'] . $mergeData['upDateItem'] ), ', ' );

        return $returnArray;
    }

}




?>
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
class systemFileUpDB extends queserserDB
{
  public $tableName;
  public $tableId;

  public function _setTableName( $tableName )
  {
    $this->tableName = $tableName;
  }

  /**
   * #図面更新メソッド
   */
  public function FileSave( $param, $fileParam )
  {
    if( $this->tableName == 'product_catalog' || $this->tableName == 'product_drawing' )
    {
      $upDateQuery = ", `dwFileName` = '" . $param['dwFileName'] . "'";
      $selectQuery = ", `dwFileName`";
      $selectValue = ", '". $param['dwFileName'] . "'";
    }
    if( $param['imgId'] )
    {
      //print_r($fileParam);
      //die;
      if( $fileParam[1]['fileName'] )
        $fileQuery = ", `fileName` = '" . $fileParam[1]['fileName'] . "', `width` = '" . $fileParam[1]['width'] . "', `height` = '" . $fileParam[1]['height'] . "' ";

      $queryStr = "UPDATE `" . $this->tableName . "` SET `imageAlt` = ? " . $upDateQuery . $fileQuery . " WHERE `imgId` = ? LIMIT 1";
      $result = $this->_setQuery( 'query', $queryStr, array( $param['imageAlt'], $param['imgId'] ) );
    }
    else
    {
      $imageCount = $this->_setQuery( 'getOne', "SELECT MAX( priority ) FROM `" . $this->tableName . "` WHERE `id` = ? ", array( $param['id'] ) ) + 1;

      $insertArray = array( $param['id'], $param['imageAlt'], $fileParam[1]['fileName'], $fileParam[1]['width'], $fileParam[1]['height'], $imageCount );
      $queryStr = "INSERT `" . $this->tableName . "` ( `id`, `imageAlt`, `fileName`, `width`, `height`, `priority`" . $selectQuery . " ) VALUES ( ?, ?, ?, ?, ?, ?" . $selectValue . " ) ";
      $result = $this->_setQuery( 'query', $queryStr, $insertArray );
    }
  }


  /**
   * #取得メソッド
   */
  public function FileUpDate( $id )
  {
    if( $this->tableName == 'product_catalog' || $this->tableName == 'product_drawing' )
    {
      $select = ", `dwFileName`";
    }
    $queryStr = "SELECT `imgId`, `id`, `imageAlt`, `fileName`, `width`, `height`, `dispFlg`" . $select . " FROM `" . $this->tableName . "` WHERE `imgId` = ? LIMIT 0, 1";
    $result = $this->_setQuery( 'query', $queryStr, array( $id ) );

    while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
    {
      if( $row['fileName'] && ( $row['width'] > 200 || $row['height'] > 110 ) )
        $row['size'] = resize( 200, $row['width'], 110, $row['height'] );
      else
      {
        $row['size']['width']  = $row['width'];
        $row['size']['height'] = $row['height'];
      }

      $row['image'][1]['fileName'] = $row['fileName'];
      $data = $row;
    }

    return ( is_array( $data ) ) ? $data : '';
  }


  /**
   * #一覧取得メソッド
   */
  public function FileList( $id )
  {
    if( $this->tableName == 'product_catalog' || $this->tableName == 'product_drawing' )
    {
      $select = ", `dwFileName`";
    }
    $queryStr = "SELECT `imgId`, `id`, `fileName`, `width`, `height`, `imageAlt`, `priority`, `dispFlg`" . $select . " FROM `" . $this->tableName . "` WHERE `id` = ? ORDER BY `priority` ";
    $result = $this->_setQuery( 'query', $queryStr, array( $id ) );

    while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
    {
      $row['size'] = ( $row['fileName'] ) ? resize( 200, $row['width'], 110, $row['height'] ) :'';
      $data[$row['priority']] = $row;
    }

    return ( is_array( $data ) ) ? $data : '';
  }


  /**
   * #削除メソッド
   */
  public function FileDelete( $id )
  {
    $fileName = self::GetCulumnContents( $this->tableName, 'fileName', 'imgId', $id );

    $queryStr = "DELETE FROM `" . $this->tableName . "` WHERE `imgId` = ? LIMIT 1";
    $result = $this->_setQuery( 'query', $queryStr, array( $id ) );

    @unlink( '../upImage/contents/' . $fileName );

    return ( $title ) ? $title : null;
  }


  /**
   * #表示修正メソッド
   */
  public function FileDispChange( $data, $debFlg = null )
  {
    $queryStr = "UPDATE `" . $this->tableName . "` SET `dispFlg` = ? WHERE `imgId` = ? LIMIT 1";
    $result = $this->_setQuery( 'query', $queryStr, array( $data['dispFlg'], $data['imgId'] ) );

    return ( $title ) ? $title : '';
  }


  /**
   * #順番更新
   */
  public function FileSort( $data = array() )
  {
    $queryStr = "UPDATE `" . $this->tableName . "` SET `priority` = ? WHERE `imgId` = ? LIMIT 1 ";

    foreach( $data['reNewId'] AS $key => $value )
    {
      $result = $this->_setQuery( 'query', $queryStr, array( $key + 1, $value ) );
    }
  }

  public function FileSave2( $param, $fileParam )
  {
    if( $this->tableName == 'product_catalog' || $this->tableName == 'product_drawing' )
    {
      $upDateQuery = ", `dwFileName` = '" . $param['dwFileName'] . "'";
      $selectQuery = ", `dwFileName`";
      $selectValue = ", '". $param['dwFileName'] . "'";
    }
    if( $param['imgId'] )
    {
      if( $fileParam[1]['fileName'] ) {
        $fileQuery = ", `fileName` = '" . $fileParam[1]['fileName'] . "', `width` = '" . $fileParam[1]['width'] . "', `height` = '" . $fileParam[1]['height'] . "' ". ", `changeFlg` = " . $param['changeFlg'] . ", `endPoint` = " . $param['endPoint'] . ", `dispFlg` = 1 ";
      } else {
        $fileQuery = ", `width` = '" . $fileParam[1]['width'] . "', `height` = '" . $fileParam[1]['height'] . "' ". ", `changeFlg` = " . $param['changeFlg'] . ", `endPoint` = '" . $param['endPoint'] . "', `dispFlg` = 1 ";
      }

      $queryStr = "UPDATE `" . $this->tableName . "` SET `imageAlt` = ? " . $upDateQuery . $fileQuery . " WHERE `imgId` = ? LIMIT 1";
      $result = $this->_setQuery( 'query', $queryStr, array( $param['imageAlt'], $param['imgId'] ) );
    }
    else
    {
      $imageCount = $this->_setQuery( 'getOne', "SELECT MAX( priority ) FROM `" . $this->tableName . "` WHERE `id` = ? ", array( $param['id'] ) ) + 1;

      $insertArray = array( $param['id'], $param['imageAlt'], $fileParam[1]['fileName'], $fileParam[1]['width'], $fileParam[1]['height'], $param['changeFlg'], $param['endPoint'],  1, $imageCount );
      $queryStr = "INSERT `" . $this->tableName . "` ( `id`, `imageAlt`, `fileName`, `width`, `height`, `changeFlg`, `endPoint`, `dispFlg`,  `priority`" . $selectQuery . " ) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?" . $selectValue . " ) ";
      $result = $this->_setQuery( 'query', $queryStr, $insertArray );
    }
  }


  /**
   * #取得メソッド
   */
  public function FileUpDate2( $id )
  {
    if( $this->tableName == 'product_catalog' || $this->tableName == 'product_drawing' )
    {
      $select = ", `dwFileName`";
    }
    $queryStr = "SELECT `imgId`, `id`, `imageAlt`, `fileName`, `width`, `height`, `changeFlg`, `dispFlg`, `endPoint`" . $select . " FROM `" . $this->tableName . "` WHERE `imgId` = ? LIMIT 0, 1";
    $result = $this->_setQuery( 'query', $queryStr, array( $id ) );

    while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
    {
      if( $row['fileName'] && ( $row['width'] > 200 || $row['height'] > 110 ) )
        $row['size'] = resize( 200, $row['width'], 110, $row['height'] );
      else
      {
        $row['size']['width']  = $row['width'];
        $row['size']['height'] = $row['height'];
      }

      $row['image'][1]['fileName'] = $row['fileName'];
      $data = $row;
    }

    return ( is_array( $data ) ) ? $data : '';
  }


  /**
   * #一覧取得メソッド
   */
  public function FileList2( $id )
  {
    if( $this->tableName == 'product_catalog' || $this->tableName == 'product_drawing' )
    {
      $select = ", `dwFileName`";
    }
    $queryStr = "SELECT `imgId`, `id`, `fileName`, `width`, `height`, `imageAlt`, `changeFlg`, `priority`, `dispFlg`, `endPoint`" . $select . " FROM `" . $this->tableName . "` WHERE `id` = ? ORDER BY `priority` ";
    $result = $this->_setQuery( 'query', $queryStr, array( $id ) );

    while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
    {
      $row['size'] = ( $row['fileName'] ) ? resize( 200, $row['width'], 110, $row['height'] ) :'';
      $data[$row['priority']] = $row;
    }

    return ( is_array( $data ) ) ? $data : '';
  }


  /**
   * #削除メソッド
   */
  public function FileDelete2( $id )
  {
    $fileName = self::GetCulumnContents( $this->tableName, 'fileName', 'imgId', $id );

    $queryStr = "DELETE FROM `" . $this->tableName . "` WHERE `imgId` = ? LIMIT 1";
    $result = $this->_setQuery( 'query', $queryStr, array( $id ) );

    @unlink( '../upImage/contents/' . $fileName );

    return ( $title ) ? $title : null;
  }


  /**
   * #表示修正メソッド
   */
  public function FileDispChange2( $data, $debFlg = null )
  {
    $queryStr = "UPDATE `" . $this->tableName . "` SET `dispFlg` = ? WHERE `imgId` = ? LIMIT 1";
    $result = $this->_setQuery( 'query', $queryStr, array( $data['dispFlg'], $data['imgId'] ) );

    return ( $title ) ? $title : '';
  }


  /**
   * #順番更新
   */
  public function FileSort2( $data = array() )
  {
    $queryStr = "UPDATE `" . $this->tableName . "` SET `priority` = ? WHERE `imgId` = ? LIMIT 1 ";

    foreach( $data['reNewId'] AS $key => $value )
    {
      $result = $this->_setQuery( 'query', $queryStr, array( $key + 1, $value ) );
    }
  }
}
?>
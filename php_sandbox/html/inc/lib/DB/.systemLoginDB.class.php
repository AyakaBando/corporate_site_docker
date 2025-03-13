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
class systemLoginDB extends queserserDB
{
/******************************************************
    >> ログイン関連
******************************************************/
    /**
     * #ログインチェックメソッド
     *
     * @param  $debFlg デバッグ用query表示
     * @return boolean
     */
    public function CheckAuthor( $data = array(), $debFlg = null )
    {
        $queryStr = "SELECT `passwordId` FROM `passWord` WHERE `account` = ? AND `password` = ? AND `dispFlg` = ?";
        $id = $this->_setQuery( 'getOne', $queryStr, array( $data['account'], $data['password'], 1 ) );

        return ( is_numeric( $id ) ) ? true : false;
    }

    /**
     * #マスターパスワード登録修正
     *
     * @param array $data
     * @param int   $debFlg
     */
     
    public function PassSave( $data = array(), $debFlg = null )
    {
        if( $data['id'] )
        {
            $queryStr = "UPDATE `passWord` SET `name` = ?, `account` = ?, `password` = ?, `dispFlg` = ? WHERE `passwordId` = ? LIMIT 1";
            $this->_setQuery( 'query', $queryStr, array( $data['name'], $data['account'], $data['password'], $data['dispFlg'], $data['id'] ) );
        }
        else
        {
            $queryStr = "INSERT `passWord` ( `author`, `name`, `account`, `password`, `dispFlg` ) VALUES ( ?, ?, ?, ?, ? ) ";
            $this->_setQuery( 'query', $queryStr, array( 2, $data['name'], $data['account'], $data['password'], $data['dispFlg'] ) );
        }
    }

    /**
     * #パスワードリスト取得
     *
     * @return mixed
     */
    public function PassList( $debFlg = null )
    {
        $queryStr = "SELECT `passwordId`, `password`, `account`, `name`, `author`, `dispFlg` FROM `passWord` ORDER BY `author`, `passwordId`";
        $result = $this->_setQuery( 'query', $queryStr, array() );
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
            $data[] = $row;

        return ( $data ) ? $data : null;
    }

    /**
     * #パスワード詳細取得
     *
     * @return mixed
     */
    public function GetManegerData( $id )
    {
        $this->ls    = 0;
        $this->limit = 1;
        $queryStr = "SELECT `passwordId`, `password`, `account`, `name`, `dispFlg` FROM `passWord` WHERE `passwordId` = ?";
        $result = $this->_setQuery( 'limitQuery', $queryStr, array( $id ) );

        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
            $data = $row;

        return ( $data ) ? $data : null;
    }

    /**
     * #パスワードチェック
     *
     * @return boolean
     */
    public function GetPass( $data = null )
    {
        $queryStr = "SELECT `password` FROM `passWord` WHERE `password` = ? AND `dispFlg` = ?";
        $password = $this->_setQuery( 'getOne', $queryStr, array( $data, 1 ) );

        return ( $password ) ? 1 : 0;
    }

    /**
     * #アカウントチェック
     *
     * @return boolean
     *//*
    public function CheckAccount( $data = null )
    {
        $account = self::$db->getOne( "SELECT `account` FROM `passWord`" );

        return ( $account == $data ) ? 1 : 0;
    }*/

    /**
     * #アカウント取得
     *
     * @return boolean
     */
    public function GetAccount()
    {
        $queryStr = "SELECT `account` FROM `passWord`";
        $account = $this->_setQuery( 'getOne', $queryStr, array() );

        return ( $account ) ? $account : null;
    }

    /**
     * #ユーザーネーム取得
     *
     * @return string
     *//*
    public function GetName( $data = array() )
    {
        $name = self::$db->getOne( "SELECT `name` FROM `passWord` WHERE `account` = ? AND `password` = ?", array( $data['account'], $data['password'] ) );

        return $name;
    }*/

    /**
     * #権限取得
     *
     * @return string
     *//*
    public function GetAuthor( $data = array() )
    {
        $name = self::$db->getOne( "SELECT `author` FROM `passWord` WHERE `account` = ? AND `password` = ?", array( $data['account'], $data['password'] ) );

        return $name;
    }*/

    /**
     * #ログイン用設定データ取得
     *
     * @return mixed
     */
    public function GetLoginParam( $data = array() )
    {
        $this->ls = 0;
        $this->limit = 0;
        $queryStr = "SELECT `passwordId`, `name`, `author`, `account` FROM `passWord` WHERE `password` = ? AND `account` = ? ";
        $result = $this->_setQuery( 'limitQuery', $queryStr, array( $data['password'], $data['account'] ) );
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
            $data = $row;

        return ( $data ) ? $data : null;
    }


}
?>
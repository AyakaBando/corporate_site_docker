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
class userDB extends queserserDB
{
    private $tableName      = 'memberMaster';
    private $tableId        = 'memberId';

    /**
     *重複チェックメソッド
     */
    public function UserMailChk( $eMail, $upDateId = null )
    {
        if( $upDateId )$sqlWhere = " AND `memberId` <> " . $upDateId . " ";
        $queryStr = "SELECT `" . $this->tableId . "` FROM `" . $this->tableName . "` WHERE `eMail` = ? " . $sqlWhere;
        $result = $this->_setQuery( 'getOne', $queryStr, array( $eMail ) );

        return ( isset( $result ) ) ? true : false;
    }


    /**
     * #ログインチェックメソッド
     */
    public function CheckLogin( $data = array(), $debFlg = null )
    {
        $queryStr = "SELECT `memberId` FROM `" . $this->tableName . "` WHERE `eMail` = ? AND `password` = ? ";
        $id = $this->_setQuery( 'getOne', $queryStr, array( $data['account'], $data['password'] ) );

        return ( is_numeric( $id ) ) ? true : false;
    }

    /**
     * #メンバーデータ取得
     */
    public function GetMemberData( $data = array(), $debFlg = null )
    {
        $queryStr = "SELECT * FROM `" . $this->tableName . "` WHERE `eMail` = ? AND `password` = ? LIMIT 0, 1";
        $result = $this->_setQuery( 'query', $queryStr, array( $data['account'], $data['password'] ) );
        while( $row = $result->fetchRow( DB_FETCHMODE_ASSOC ) )
        {
            $row['medium']  = stringConnect_decodeArray( $row['medium'] );
            $row['pdf']     = stringConnect_decodeArray( $row['pdf'] );
            $data = $row;
        }


        return ( is_array( $data ) ) ? $data : null;
    }


    /**
     * #メールアドレスチェックメソッド
     */
    public function CheckMail( $data = array(), $debFlg = null )
    {
        $queryStr = "SELECT `memberId` FROM `" . $this->tableName . "` WHERE `eMail` = ? ";
        $id = $this->_setQuery( 'getOne', $queryStr, array( $data['eMail'] ) );

        return ( is_numeric( $id ) ) ? true : false;
    }



    /**
     * #ログインチェックメソッド
     */
    public function MemberPassWordUpDate( $eMail, $password )
    {
        $queryStr = "UPDATE `memberMaster` SET `password` = ? WHERE `eMail` = ? LIMIT 1";
        $this->_setQuery( 'query', $queryStr, array( $password, $eMail ) );

        //return ( is_numeric( $id ) ) ? true : false;
    }



}
?>
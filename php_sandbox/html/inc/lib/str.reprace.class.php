<?php
/*  */

/**
 * [[機能説明]]
 *
 * @
 * @
 * @
 */
class strReprace
{
/******************************************************
    >> 
******************************************************/
    /**
     * #FCKエディター用『"'』のクオート変換
     *
     * @comment string  変換文字列 
     * @param   boolean <->変換フラグ
     * @return  string
     */
    static function FCK_QuotesReprace( $comment, $param = null )
    {
        if( $param )
            $comment = htmlspecialchars_decode( str_replace( array( '\"', "\'" ), array( '"', "'" ), $comment ) );
        else
            $comment = htmlspecialchars( $comment );

        return $comment;
    }
}
<?php
/**
 * [[機能説明]]
 *
 * @検索SQL作成
 * @
 * @
 */
define( 'LIKE_TYPE_MIDDLE', 1 );
define( 'LIKE_TYPE_FRONT',  2 );
define( 'LIKE_TYPE_BACK',   3 );



class systemSearchDB
{
    /**
     *日付
     */
    static function SearchDate( $param, $startD, $endD = null, $sColumn, $eColumn = null, $debFlg = null )
    {
        //日付
        if( ( $param[$startD]['Y'] && !preg_match( '/^\d{4}$/', $param[$startD]['Y'] ) ) || ( $param[$endD]['Y'] && !preg_match( '/^\d{4}$/', $param[$endD]['Y'] ) ) )
            return;
        if( preg_match( '/^\d{1,2}$/', $param[$startD]['m'] ) )
            $param[$startD]['m'] = sprintf( '%02d', $param[$startD]['m'] );
        if( preg_match( '/^\d{1,2}$/', $param[$startD]['d'] ) )
            $param[$startD]['d'] = sprintf( '%02d', $param[$startD]['d'] );
        if( preg_match( '/^\d{1,2}$/', $param[$endD]['m'] ) )
            $param[$endD]['m'] = sprintf( '%02d', $param[$endD]['m'] );
        if( preg_match( '/^\d{1,2}$/', $param[$endD]['d'] ) )
            $param[$endD]['d'] = sprintf( '%02d', $param[$endD]['d'] );

        if( $param[$startD]['Y'] )
            $serchStr = "DATE_FORMAT( `" . $sColumn . "`, '%Y' ) >= '" . $param[$startD]['Y'] . "'";
        if( $param[$startD]['Y'] && $param[$startD]['m'] )
            $serchStr = "DATE_FORMAT( `" . $sColumn . "`, '%Y-%m' ) >= '" . $param[$startD]['Y'] . "-" . $param[$startD]['m'] . "'";
        if( $param[$startD]['Y'] && $param[$startD]['m'] && $param[$startD]['d'] )
            $serchStr = " `" . $sColumn . "` >= '" . $param[$startD]['Y'] . "-" . $param[$startD]['m'] . "-" . $param[$startD]['d'] . "'";

        if( ( !$param[$startD]['Y'] || !$param[$startD]['m'] || !$param[$startD]['d'] ) && $param[$endD]['Y'] )
            $serchStr = "DATE_FORMAT( `" . $sColumn . "`, '%Y' ) <= '" . $param[$endD]['Y'] . "'";
        if( ( !$param[$startD]['Y'] || !$param[$startD]['m'] || !$param[$startD]['d'] ) && $param[$endD]['Y'] && $param[$endD]['m'] )
            $serchStr = "DATE_FORMAT( `" . $sColumn . "`, '%Y-%m' ) <= '" . $param[$endD]['Y'] . "-" . $param[$endD]['m'] . "'";
        if( ( !$param[$startD]['Y'] || !$param[$startD]['m'] || !$param[$startD]['d'] ) && $param[$endD]['Y'] && $param[$endD]['m'] && $param[$endD]['d'] )
            $serchStr = " `" . $sColumn . "` <= '" . $param[$endD]['Y'] . "-" . $param[$endD]['m'] . "-" . $param[$endD]['d'] . "'";

        if( $param[$startD]['Y'] && $param[$endD]['Y'] )
            $serchStr = 
                "DATE_FORMAT( `" . $sColumn . "`, '%Y' ) >= '" . $param[$startD]['Y'] . "' AND DATE_FORMAT( `" . $sColumn . "`, '%Y' ) <= '" . $param[$endD]['Y'] . "'";
        if( $param[$startD]['Y'] && $param[$startD]['m'] && $param[$endD]['Y'] && $param[$endD]['m'] )
            $serchStr = 
                "DATE_FORMAT( `" . $sColumn . "`, '%Y-%m' ) >= '" . $param[$startD]['Y'] . "-" . $param[$startD]['m'] . "' AND DATE_FORMAT( `" . $sColumn . "`, '%Y-%m' ) <= '" . $param[$endD]['Y'] . "-" . $param[$endD]['m'] . "'";
        if( $param[$startD]['Y'] && $param[$startD]['m'] && $param[$startD]['d'] && $param[$endD]['Y'] && $param[$endD]['m'] && $param[$endD]['d'] )
            $serchStr = 
                " `" . $sColumn . "` >= '" . $param[$startD]['Y'] . "-" . $param[$startD]['m'] . "-" . $param[$startD]['d'] . "' AND `" . $sColumn . "` <= '" . $param[$endD]['Y'] . "-" . $param[$endD]['m'] . "-" . $param[$endD]['d'] . "'";

        return $serchStr;
    }

    /**
     *件数取得
     */
    static function SearchChackBox( $param, $column, $connection, $whereType = '=' )
    {
        if( !$connection == 'OR' || !$connection == 'AND' )
        {
            echo 'Mismatch $connection';
            die;
        }

        if( is_array( $param ) )
        {
            foreach( $param AS $key => $value )
            {

                if( $value )$serchArray .= " `" . $column . "` " . $whereType . " '" . self::CreatSearchWord( $key, $whereType ) . "' " . $connection . " ";
            }
            if( $serchArray ) $serchArray = rtrim( $serchArray, $connection . ' ' );
        }
        else
        {
            $serchArray .= " `" . $column . "` " . $whereType . " '" . self::CreatSearchWord( $param, $whereType ) . "' ";
        }

         return $serchArray;
    }

    /**
     *テキスト一致検索
     */
    static function SearchNomal( $param, $column )
    {
        $searchStr = " `" . $column . "` = '" . $param . "'";

        return $searchStr;
    }


    /**
     *テキスト一致検索
     */
    static function SearchLike( $param, $column, $likeType = null )
    {
        switch( $likeType )
        {
            case LIKE_TYPE_MIDDLE://中間一致
                $searchStr = " `" . $column . "` LIKE '%" . $param . "%'";
                break;

            case LIKE_TYPE_FRONT://前方一致
                $searchStr = " `" . $column . "` LIKE '" . $param . "%'";
                break;

            case LIKE_TYPE_BACK://後方一致
                $searchStr = " `" . $column . "` LIKE '%" . $param . "'";
                break;

            default://完全一致
                $searchStr = " `" . $column . "` LIKE '" . $param . "'";
                break;
        }

        return $searchStr;
    }


}
?>

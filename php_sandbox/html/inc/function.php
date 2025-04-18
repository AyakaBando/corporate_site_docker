<?php
function relativityPath( $layer )
{
    for( $i = 1; $i <= $layer - 1; $i++ )
    {
        $rootPath .= '../';
    }

    return $rootPath;
}


function getReferer()
{
    $getUrl = explode( '?', $_SERVER['HTTP_REFERER'] );
    $referer = $getUrl[1];

    return $referer;
}


//PEARページャー文字列置換
function pagerReplace( $links = array(), $pagerObj = null, $allFlg = null )
{
    $pagerLink_rep['pages'] = preg_replace( array( '/<b>/', '/<\/b>/' ), array( '<strong>', "</strong>\n" ), $links['pages'] );

    $pagerLink_rep['next']  = $links['next'];//preg_replace( array( '/<a href/', '/<\/a>/' ), array( '<a href', '</a>' ), $links['next'] );
    $pagerLink_rep['back']  = $links['back'];//preg_replace( array( '/<a href/', '/<\/a>/' ), array( '<a href', '</a>' ), $links['back'] );

    return $pagerLink_rep;
}



function createGetLink( $exclusionArray = array(), $get = array() )
{

    foreach( $get AS $key => $value )
    {
        if( !in_array( $key, $exclusionArray ) )
        {
            if( is_array( $value ) )
            {
                foreach( $value AS $key1 => $value1 )
                {
                    if( is_array( $value1 ) )
                    {
                        foreach( $value1 AS $key2 => $value2 )
                        {
                            $getLink['addition'] .= '&' . $key . '[' . $key1 . '][' . $key2 . ']=' . $value2;
                            $getLink['all']      .= '&' . $key . '[' . $key1 . '][' . $key2 . ']=' . $value2;
                        }
                    }
                    else
                    {
                        $getLink['addition'] .= '&' . $key . '[' . $key1 . ']=' . $value1;
                        $getLink['all']      .= '&' . $key . '[' . $key1 . ']=' . $value1;
                    }
                }
            }
            else
            {
                $getLink['addition'] .= '&' . $key . '=' . $value;
                $getLink['all']      .= '&' . $key . '=' . $value;
            }

             $getLink['all'] = preg_replace( '/^&/', '?', $getLink['all'] );

        }
    }

    return $getLink;
}


function stringConnection( $data, $connectStr = null )
{
    if( !$connectStr )$connectStr = '|';

    $str = $connectStr;

    foreach( (array)$data AS $key => $value )
        if( $value )$str .= $key . $connectStr;
    if( preg_match( '/^\|$/', $str ) )
        $str = null;

    return ( $str ) ? $str: null;
}

function stringConnect_decodeArray( $str, $connectStr = null )
{
    if( !$connectStr )$connectStr = '|';

    foreach( explode( $connectStr, trim( $str, $connectStr ) ) AS $key => $value )
        if( $value )$data[$value] = 1;

    return ( is_array( $data ) ) ? $data : null;
}

/**
 *日付セレクトメニュー設定配列
 */
function dateOptionsArray( $startYear = 2000, $maxYear = 1 )
{
    $options = array(
        'minYear'         => $startYear,
        'maxYear'         => date( 'Y' ) + $maxYear,
        'language'        => 'ja', 
        'i'               => 1, 
        'format'          => 'Y 年  m 月  d 日  H 時  i 分頃', 
        'optionIncrement' => array( 'i' => 1 ), 
        'addEmptyOption'    => true, 
        'emptyOptionValue'  => '', 
        'emptyOptionText'   => '', 
    );
    return $options;
}


/**
 *日付セレクトメニュー設定配列
 */
function timeOptionsArray( $minYear = 2000 )
{
    $options = array(
        'minYear'         => $minYear,
        'maxYear'         => date( 'Y' ) + 1,
        'language'        => 'ja', 
        'i'               => 1, 
        'format'          => 'H 時  i 分頃', 
        'optionIncrement' => array( 'i' => 1 ), 
        'addEmptyOption'    => true, 
        'emptyOptionValue'  => '', 
        'emptyOptionText'   => '', 
    );
    return $options;
}

function yearArray( $minYear, $maxYear )
{
    $returnArray[0] = '--';
    for( $i = $minYear ; $i <= $maxYear ; $i++ )
        $returnArray[$i] = $i;

    return $returnArray;
}

function monthArray( $minMonth = 1, $maxMonth = 12 )
{
    $returnArray[0] = '--';
    for( $i = $minMonth; $i <= $maxMonth; $i++ )
            $returnArray[sprintf( '%02d', $i )] = $i;

    return $returnArray;
}

function dayArray()
{
    $returnArray[0] = '--';
    for( $i = 1; $i <= 31; $i++ )
        $returnArray[sprintf( '%02d', $i )] = $i;

    return $returnArray;
}

function hourArray()
{
    $returnArray[''] = '';
    for( $i = 0; $i <= 23; $i++ )
        $returnArray[sprintf( '%02d', $i )] = $i;

    return $returnArray;
}


function dateTime_Convert( $dateTime = array(), $dateStr = '-', $timeStr = ':' )
{
    if( !$dateTime['i'] ) $dateTime['i'] = '00';
    if( !$dateTime['s'] ) $dateTime['s'] = '00';

    return $dateTime['Y'] . $dateStr . $dateTime['m'] . $dateStr . $dateTime['d'] . ' ' . $dateTime['H'] . $timeStr . $dateTime['i'] . $timeStr . $dateTime['s'];
}


function date_Convert( $date = array(), $dateStr = '-' )
{
    return $date['Y'] . $dateStr . sprintf( '%02d', $date['m'] ) . $dateStr . sprintf( '%02d', $date['d'] );
}


function time_Convert( $time = array(), $timeStr = ':' )
{
    if( !$time['i'] ) $time['i'] = '00';
    if( !$time['s'] ) $time['s'] = '00';

    return $time['H'] . $timeStr . $time['i'] . $timeStr . $time['s'];
}

function date_Decode( $date, $dateStr = '-' )
{
    list( $dateArray['Y'], $dateArray['m'], $dateArray['d'] ) = explode( $dateStr, $date );

    return $dateArray;
}


function dateTime_Decode( $dateTime, $dateStr = '-', $timeStr = ':' )
{
    list( $dateArray, $timeArray ) = explode( ' ', $dateTime );
    list( $dateTimeArray['Y'], $dateTimeArray['m'], $dateTimeArray['d'] ) = explode( $dateStr, $dateArray );
    list( $dateTimeArray['H'], $dateTimeArray['i'], $dateTimeArray['s'] ) = explode( $timeStr, $timeArray );

    return $dateTimeArray;
}

function time_Decode( $time, $timeStr = ':' )
{
    list( $timeArray['H'], $timeArray['i'], $timeArray['s'] ) = explode( $timeStr, $time );

    return $timeArray;
}


function formDataConversion( $param = array() )
{
    foreach( (array)$param AS $key => $value )
    {
        if( is_array( $value ) )
        {
            foreach( $value AS $key1 => $value1 )
            {
                if( is_array( $value1 ) )
                {
                    foreach( $value1 AS $key2 => $value2 )
                        $conveParam[$key][$key1][$key2] = strip_tags( $value2 );
                }
                else
                {
                    $conveParam[$key][$key1] = strip_tags( $value1 );
                }
            }
        }
        else
        {
            $conveParam[$key] = strip_tags( $value );
        }
    }

    return $conveParam;
}


/**
 *日付セレクトメニュー設定配列
 */
function selectTimeArray( $H = null )
{
    $timeArray['H'][] = '';
    for( $i = 10; $i <= 17; $i++ )
        $timeArray['H'][sprintf( '%02d', $i )] = sprintf( '%02d', $i );

    $timeArray['i'] = array(
        ''   => '', 
        '00' => '00', 
        '30' => '30', 
    );

    return ( $H ) ? $timeArray['H'] : $timeArray['i'];
}

function creatForm( $obj, $type, $title, $label, $paramArray = array(), $formArray = array(), $groupParamArray = array() )
{
    switch( $type )
    {
        case 'text': case 'textarea': case 'submit': case 'reset':
            $obj->addElement( $type,        $title,            $label,      $paramArray );
            break;

        case 'advcheckbox': case 'checkbox':
            $obj->addElement( $type, $title, $label,  $label, $paramArray );
            break;

        case 'radio':
            foreach( $formArray AS $key => $value )
                $group[] = $obj->createElement( $type, null, null, $value, $key, $paramArray );
            $obj->addGroup( $group, $title, $label, $groupParamArray );
            break;

        case 'advcheckboxGroup': case 'checkboxGroup':
            $convType = str_replace( 'Group', '', $type );
            foreach( $formArray AS $key => $value )
                $group[] = $obj->createElement( $convType, $key, null, $value, $paramArray );
            $obj->addGroup( $group, $title, $label, $groupParamArray );
            break;

        default: break;
    }
}




/**
 *画像リサイズ後サイズ取得
 */
function resize( $maxWidth, $width, $maxHeight, $height )
{
    if( $width > $maxWidth OR $height > $maxHeight )
    {
        $size[0]   = $width;
        $size[1]   = $height;

        $re_size = $size;

        //アスペクト比固定処理
        $tmp_w = $size[0] / $maxWidth;

        if( $maxHeight != 0 )
            $tmp_h = $size[1] / $maxHeight;

        if( $tmp_w > 1 || $tmp_h > 1 )
        {
            if( $maxHeight == 0 )
            {
                if( $tmp_w > 1 )
                {
                    $re_size['width']  = $maxWidth;
                    $re_size['height'] = floor( $size[1] * $maxWidth / $size[0] );
                }
            }
            else
            {
                if( $tmp_w > $tmp_h )
                {
                    $re_size['width'] = $maxWidth;
                    $re_size['height'] = floor( $size[1] * $maxWidth / $size[0] );
                }
                else
                {
                    $re_size['height'] = $maxHeight;
                    $re_size['width'] = floor( $size[0] * $maxHeight / $size[1] );
                }
            }
        }
    }
    else
    {
        $re_size['height'] = $height;
        $re_size['width']  = $width;
    }

    return $re_size;
}



function imageResize( $maxWidth, $width, $maxHeight, $height, $quality, $fileData = array(), $tempPath = './temp/' )
{
    $file     = $fileData['name'];
    $type     = $fileData['type'];
    $tmp_name = $fileData['tmp_name'];
    $size     = $fileData['size'];

    $prtMd5 = md5( time() );
//return $fileData;

    if( $width > $maxWidth || $height > $maxHeight )
    {
        $_img = file_get_contents( $tmp_name );
        $handle = imagecreatefromstring( $_img );

        //(array)$size[0]   = $width;
        //(array)$size[1]   = $height;

        $re_size = $size;

        //アスペクト比固定処理
        $tmp_w = $width / $maxWidth;

        if( $maxHeight != 0 ){
            $tmp_h = $height / $maxHeight;
        }

        if( $tmp_w > 1 || $tmp_h > 1 )
        {
            if( $maxHeight == 0 )
            {
                if( $tmp_w > 1 )
                {
                    //$re_size[0] = $maxWidth;
                    $maxHeight = $height * $maxWidth / $width;
                }
            }
            else
            {
                if( $tmp_w > $tmp_h )
                {
                    //$re_size[0] = $maxWidth;
                    $maxHeight = $height * $maxWidth / $width;
                }
                else
                {
                    //$re_size[1] = $maxHeight;
                    $maxWidth = $width * $maxHeight / $height;
                }
            }
        }
        $imgNew = imagecreatetruecolor( $maxWidth,  $maxHeight );
        $imgDef = $handle;
        ImageCopyResampled( $imgNew,  $imgDef,  0,  0,  0,  0, $maxWidth, $maxHeight, $width, $height );

        ImageJpeg( $imgNew, $tempPath . $prtMd5, $quality );
        ImageDestroy( $imgDef );
        ImageDestroy( $imgNew );

        $contents = file_get_contents( $tempPath . $prtMd5 );
        $size     = strlen( $contents );
        list( $width, $height ) = getimagesize( $tempPath . $prtMd5 );

        //画像を削除
        unlink ( $tempPath . $prtMd5 );

        $type = 'image/jpeg';
        //return 'resize';

    }else{
        $contents = file_get_contents( $tmp_name );
        //return 'noresize';
    }

    return $contents;

}
?>
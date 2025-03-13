<?

//require_once("./exe.php");
$dir = '../../../system_hotel/src/';
//$dir = '../test';
$imgData = '';
$width = '';
$height = '';

if(isset($_GET['dir2']) || isset($_GET['file']))
{
	$imgData = $dir . $_GET['dir2'] . '/' . $_GET['file'];
}

if(!isset($_GET['q'])) $_GET['q'] = null;
$quality      = ( $_GET['q'] ) ? $_GET['q'] : 100;
$imgMaxWidth  = 330;
$imgMaxHeight = 440;

//$ua = $_SERVER["HTTP_USER_AGENT"];

/*$MySQLTable = "mobileUserAgent";
$MyLink     = mysql_connect( $MySQLHOST, $MySQLUserName, $MySQLPasswd );
mysql_select_db( 'share', $MyLink );

if( ereg( "DoCoMo", $ua ) ){
    $MyQuery = "SELECT `height`, `width` FROM `" . $MySQLTable . "` WHERE `typeName` = '" . GetMobileCareer( 1 ). "' AND `carrier` = '0' \n";
}elseif( ereg( "UP\.Browser", $ua ) ){
    list( $ua ) = split ( " ", $ua );
    list( $ua , $deviceId ) = split ( "-", $ua );

    $MyQuery = "SELECT `height`, `width` FROM `" . $MySQLTable . "` WHERE `deviceId` = '" . $deviceId . "' AND `carrier` = '1' \n";
}elseif( ereg( "J-PHONE", $ua ) OR ereg( "Vodafone", $ua ) OR ereg( "softBank", $ua ) ){
    $MyQuery = "SELECT `height`, `width` FROM `" . $MySQLTable . "` WHERE `typeName` = '" . GetMobileCareer( 1 ) . "' AND `carrier` = '2' \n";
}*/


if( file_exists($imgData) ){
//    $MyResult = mysql_query( $MyQuery, $MyLink );
//        while( $row = mysql_fetch_array( $MyResult ) ){
		list($width,$height) = getimagesize($imgData);
//            $width  = $row["width"];
//            $height = $row["height"];
//       }
}

if( $width ){
    $imgMaxWidth  = $width;
    $imgMaxHeight = $height;
}
//echo '<hr />' . $width . '<hr />';
$size["0"] = $width;
$size["1"] = $height;
/*$MySQLTable = $_GET["t"];
if( !isset( $MySQLTable ) ) $MySQLTable = "galImage";
$MyLink     = mysql_connect( $MySQLHOST, $MySQLUserName, $MySQLPasswd );
mysql_select_db( $MySQLDatabase, $MyLink );
$MyQuery   = "SELECT `contents`, `type`, `width`, `height`, `size` FROM `" . $MySQLTable . "` WHERE `imgId` = '" . $_GET["imgId"] . "' \n";
$MyResult  = mysql_query( $MyQuery, $MyLink );
mysql_close( $MyLink );
    while( $row = mysql_fetch_array( $MyResult ) ){
        $imgData   = $row["contents"];
        $imgType   = $row["type"];
        $size["0"] = $row["width"];
        $size["1"] = $row["height"];
        $sizeMovie = $row["size"];

        if($imgType == "application/x-macbinary"){
            $imgData   = substr( $imgData , 128);
            $imgType   = "image/jpeg";

            $handle    = imagecreatefromstring( $imgData );
            $size["0"] = imagesx ( $handle );
            $size["1"] = imagesy ( $handle );
        }
    }

if($imgType == "video/3gpp"){
    $sizeMovie = ceil( $sizeMovie * 1024 );

    header( "Accept-Ranges: bytes");
    header( "Content-Length: " . $sizeMovie );
    header( "Connection: close");
    header( "Content-Type: " . $imgType );

    echo $imgData;
    exit;
}*/

//$handle = imagecreatefromstring( $imgData );
//$imgData = file_get_contents(  );
$handle = imagecreatefromstring( file_get_contents( $imgData ) );


// 画像の大きさをセット
if( isset($_GET["mw"]) ) $imgMaxWidth  = $_GET["mw"];
if( isset($_GET["mh"]) ) $imgMaxHeight = $_GET["mh"];



//print_r($_GET);
$re_size = $size;

//アスペクト比固定処理
$tmp_w = $size["0"] / $imgMaxWidth;
if( $imgMaxHeight != 0 ) $tmp_h = $size["1"] / $imgMaxHeight;

if( $tmp_w > 1 || $tmp_h > 1 ){
    if( $imgMaxHeight == 0 ){
        if($tmp_w > 1){
            $re_size["0"] = $imgMaxWidth;
            $re_size["1"] = $size["1"] * $imgMaxWidth / $size["0"];
        }
    }else{
        if( $tmp_w > $tmp_h ){
            $re_size["0"] = $imgMaxWidth;
            $re_size["1"] = $size["1"] * $imgMaxWidth / $size["0"];
        }else{
            $re_size["1"] = $imgMaxHeight;
            $re_size["0"] = $size["0"] * $imgMaxHeight / $size["1"];
        }
    }
}



$imgNew = ImageCreateTrueColor( $re_size["0"],  $re_size["1"] );
$imgDef = $handle;
ImageCopyResampled( $imgNew, $imgDef, 0, 0, 0, 0, $re_size["0"], $re_size["1"], $size["0"], $size["1"] );


header( 'Content-Type: image/jpeg' );
ImageJpeg( $imgNew, '', $quality );
ImageDestroy( $imgDef );
ImageDestroy( $imgNew );
?>
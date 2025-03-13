<?php
/*  */

/**
 * [[機能説明]]
 *
 * @
 * @
 * @
 */
/*
mkdir ( string $pathname [, int $mode = 0777 [, bool $recursive = false [, resource $context ]]] )
/*
//★デバッグ初期設定時コメントとって!!
if( !is_file( dirname(__FILE__) . '/queserser.ImageResize.class.php' ) )
    $error[] = '<b>FILE ERROR</b><hr />ないないないよ何かないよ。。。何がないか考えてみて!!<br />';
foreach( $error AS $key => $value )
    echo $value . '<br />';
if( !$error )
    echo '成功';
die();
*/

function fileUpload( $post, $data, $maxCnt, $tempPath = './temp/', $uploadPath = '../upImage/', $fileNameKey = 'fileName' )
{
    //画像(ファイル)処理
    for( $i = 1; $i <= $maxCnt; $i++ )
    {
        if( $post['fileName'][$i] )@list( $post['width'][$i], $post['height'][$i] ) = getimagesize( $tempPath . $post['fileName'][$i] );
        //画像(ファイル)削除
        if( $data['image'][$i]['fileName'] && ( $_POST['imageDel'][$i] || ( $post['fileName'][$i] && $data['image'][$i]['fileName'] != $post['fileName'][$i] ) ) )
            @unlink( $uploadPath . FILE_CATEGORY . '/' . $data['image'][$i]['fileName'] );


        //画像(ファイル)アップ処理
        if( $post['fileName'][$i] && !$post['imageDel'][$i] && $_SESSION[FILE_SESSION_KEY][$i] )
        {
            @copy( $tempPath . $post['fileName'][$i], $uploadPath . FILE_CATEGORY . '/' . $post['fileName'][$i] );
            //画像(ファイル)以外の処理
            $post['pictureOutsideFlg'][$i] = ( !$post['width'][$i] ) ? 1 : 0;
        }

        if( ( $post['fileName'][$i] && ( $post['width'][$i] || $post['pictureOutsideFlg'][$i] ) ) || $post['imageDel'][$i] )
            $imageArray[$i] = array( 'fileName' => $post['fileName'][$i], 'width' => $post['width'][$i], 'height' => $post['height'][$i], 'imageDel' => $post['imageDel'][$i], 'pictureOutsideFlg' => $post['pictureOutsideFlg'][$i] );
    }
    return $imageArray;
}


//仮ファイルをフォルダにアップ
function fileTempUpload( $files, $tempPath = './temp/', $uploadPath = '../upImage/', $maxWidth = array(), $maxHeight = array(), $smallWidth = 200, $smallHeight = 200, $fileNameKey = 'fileName' )
{
    foreach( $files AS $key => $value )
    {
        if( !$maxWidth[$key] )$maxWidth[$key] = 300;
        if( !$maxHeight[$key] )$maxWidth[$key] = 300;

        $microTimeArray = explode( ' ', microtime() );
        $unique = time() . '_' . str_replace( '.', '', $microTimeArray[0] );

        if( $files[$key]['error'] === 0 )
        {
            @list( $width, $height ) = getimagesize( $files[$key]['tmp_name'] );
            if( $width > $maxWidth[$key] || $height > $maxHeight[$key] )
            {
                $file = imageResize( $maxWidth[$key], $width, $maxHeight[$key], $height, 100, $files[$key], $tempPath );
                $matches[0] = '.jpg';
            }
            else
            {
                $file = file_get_contents( $files[$key]['tmp_name'] );
                @preg_match( '/\.[a-z]+$/i', $files[$key]['name'], $matches );
            }

            $_SESSION[FILE_SESSION_KEY][$key][$fileNameKey] = $unique . $matches[0];
            $fp = fopen( $tempPath . $_SESSION[FILE_SESSION_KEY][$key][$fileNameKey], 'w+' );
            fputs( $fp, $file );
            fclose( $fp );
            @list( $reWidth, $reHeightheight ) = getimagesize( $tempPath . $_SESSION[FILE_SESSION_KEY][$key][$fileNameKey] );
            $_SESSION[FILE_SESSION_KEY][$key]['img'] = resize( $smallWidth, $reWidth, $smallHeight, $reHeightheight );

        }
        $fileFlg[$key]++;
    }

    return $fileFlg;
}



/*
//画像本アップ処理
function fileUpload( $post, $data, $maxCnt, $tempPath = './temp/', $uploadPath = '../upImage/' )
{
    //画像処理
    for( $i = 1; $i <= $maxCnt; $i++ )
    {
        if( $post['fileName'][$i] )@list( $post['width'][$i], $post['height'][$i] ) = getimagesize( $tempPath . $post['fileName'][$i] );
        //画像削除
        if( $data['image'][$i]['fileName'] && ( $_POST['imageDel'][$i] || $data['image'][$i]['fileName'] != $post['fileName'][$i] ) )
            @unlink( $uploadPath . FILE_CATEGORY . '/' . $data['image'][$i]['fileName'] );

        //画像アップ処理
        if( $post['fileName'][$i] && !$post['imageDel'][$i] && $_SESSION[FILE_SESSION_KEY][$i] )
            @copy( $tempPath . $post['fileName'][$i], $uploadPath . FILE_CATEGORY . '/' . $post['fileName'][$i] );

        if( ( $post['fileName'][$i] && $post['width'][$i] ) || $post['imageDel'][$i] )
            $imageArray[$i] = array( 'fileName' => $post['fileName'][$i], 'width' => $post['width'][$i], 'height' => $post['height'][$i], 'imageDel' => $post['imageDel'][$i] );
    }
    return $imageArray;
}


//仮ファイルをフォルダにアップ
function fileTempUpload( $files, $tempPath = './temp/', $uploadPath = '../upImage/', $maxWidth = array(), $maxHeight = array(), $smallWidth = 200, $smallHeight = 200 )
{
    foreach( $files AS $key => $value )
    {
        if( !$maxWidth[$key] )$maxWidth[$key] = 300;
        if( !$maxHeight[$key] )$maxWidth[$key] = 300;

        $microTimeArray = explode( ' ', microtime() );
        $unique = time() . '_' . str_replace( '.', '', $microTimeArray[0] );

        if( $files[$key]['error'] === 0 )
        {
            @list( $width, $height ) = getimagesize( $files[$key]['tmp_name'] );
            if( $width > $maxWidth[$key] || $height > $maxHeight[$key] )
            {
                $file = imageResize( $maxWidth[$key], $width, $maxHeight[$key], $height, 100, $files[$key] );
                $matches[0] = '.jpg';
            }
            else
            {
                $file = file_get_contents( $files[$key]['tmp_name'] );
                @preg_match( '/\.[a-z]+$/i', $files[$key]['name'], $matches );
            }

            $_SESSION[FILE_SESSION_KEY][$key]['fileName'] = SQL_TABLE_NAME . '_' . $unique . $matches[0];
            $fp = fopen( $tempPath . $_SESSION[FILE_SESSION_KEY][$key]['fileName'], 'w+' );
            fputs( $fp, $file );
            fclose( $fp );
            @list( $reWidth, $reHeightheight ) = getimagesize( $tempPath . $_SESSION[FILE_SESSION_KEY][$key]['fileName'] );
            $_SESSION[FILE_SESSION_KEY][$key]['img'] = resize( $smallWidth, $reWidth, $smallHeight, $reHeightheight );

        }
        $fileFlg[$key]++;
    }

    return $fileFlg;
}
*/
//仮ファイルをフォルダにアップ[マルチプル]
function fileTempUploadMultiple( $files, $tempPath = './temp/', $uploadPath = '../upImage/', $maxWidth = array(), 
                                 $maxHeight = array(), $smallWidth = 200, $smallHeight = 200, $fileKey = 'userFile', $renameFlg = 0 )
{
    $loopCnt = count( $files[$fileKey]['error'] );
    for( $i = 0; $i < $loopCnt; $i++ )
    {
        if( !$maxWidth[$i] )$maxWidth[$i] = 300;
        if( !$maxHeight[$i] )$maxWidth[$i] = 300;

        $microTimeArray = explode( ' ', microtime() );
        $unique = time() . '_' . str_replace( '.', '', $microTimeArray[0] );

        if( $files[$fileKey]['error'][$i] === 0 )
        {
            @list( $width, $height ) = getimagesize( $files[$fileKey]['tmp_name'][$i] );
            if( $width > $maxWidth[$i] || $height > $maxHeight[$i] )
            {
                $file = imageResize( $maxWidth[$i], $width, $maxHeight[$i], $height, 100, $files[$key] );
                $matches[0] = '.jpg';
            }
            else
            {
                $file = file_get_contents( $files[$fileKey]['tmp_name'][$i] );
                @preg_match( '/\.[a-z]+$/i', $files[$fileKey]['name'][$i], $matches );
            }

            if( $reNameFlg == 1 )
                $_SESSION[FILE_SESSION_KEY][$i]['fileName'] = $files[$fileKey]['name'][$i];
            else
                $_SESSION[FILE_SESSION_KEY][$i]['fileName'] = $unique . $matches[0];

            $fp = fopen( $tempPath . $_SESSION[FILE_SESSION_KEY][$i]['fileName'], 'w+' );
            fputs( $fp, $file );
            fclose( $fp );
            @list( $reWidth, $reHeightheight ) = getimagesize( $tempPath . $_SESSION[FILE_SESSION_KEY][$i][$fileKey] );
            $_SESSION[FILE_SESSION_KEY][$i]['img'] = resize( $smallWidth, $reWidth, $smallHeight, $reHeightheight );

        }
        $fileFlg[$i]++;
    }

    return $fileFlg;
}


function tempFileClean( $tempPath = './temp' )
{
    $resDir = opendir( $tempPath );
    while( false !== $DelFileName = readdir( $resDir ) )
        if( $DelFileName != '..' && $DelFileName != '.' && filemtime( $tempPath . '/' . $DelFileName ) <= FILE_DELET_LIMIT_STUMP )
            @unlink( $tempPath . '/' . $DelFileName );
    closedir( $resDir );
}




class FileIO
{
    private $param = array(
        'dirName'    => '', 
        'dirPath'    => '', 
        'tempDir'    => '', 
        'tempPath'   => '', 
    );

    public $nameParam = array();

    public $files = array();

    //private $rootDir = '';
    //private $fileName = $this->createFileName( $this->nameParam );
    
    public $upFileName = '';

    private static $imageFlg = false;

    private $reNameFlg       = true;

    private static $errorString = 'ERROR<hr />ないないないよ何もないよ。。。<br />何がないか考えてみて!!';

    function __construct( $param, $files )
    {
        $this->param['dirName']  = $param['dirName'];
        $this->param['dirPath']  = $param['dirPath'];
        $this->param['tempDir']  = $param['tempDir'];
        $this->param['tempPath'] = $param['tempPath'];
        $this->files             = $files;
        $this->nameParam         = $param['nameParam'];
    }


    public function filePut( $mode, $putFileName = null )
    {
        $fileName = $this->createFileName( $this->nameParam, $this->files['name'] );

        $fp = @fopen( $this->rootDir( $mode ) . '/' . $fileName, 'w+' );
        @fputs( $fp, file_get_contents( $this->files['tmp_name'] ) );
        @fclose( $fp );

        $this->upFileName = $fileName;//アップしたファイル名をセット
    }


    private function rootDir( $mode )
    {
        switch( $mode )
        {
            case 1:
                $rootDir = $this->param['tempPath'] . $this->param['tempDir'];
                if( !is_dir( $rootDir ) )
                    return die( self::$errorString . '<br />From method rootDir' );
                break;
            case 2:
                $rootDir = $this->param['dirPath'] . $this->param['dirName'];
                if( !is_dir( $rootDir ) )
                    return die( self::$errorString . '<br />From method rootDir' );
                break;
            default: break;
        }

        return $rootDir;
    }


    public static function fileDel( $fileName )
    {
        if( isset( $fileName ) )
            @unlink( $this->rootDir(2) . '/' . $fileName );
    }


    public function dirFileDel()
    {
        $resDir = opendir( $this->rootDir(1) );//ディレクトリ・ハンドルをオープン

        //ディレクトリ内のファイル名を1つずつを取得
        while( false !== $DelFileName = readdir( $resDir ) )
            if( $DelFileName != '..' && $DelFileName != '.' )
                @unlink( $this->rootDir(1) . '/' . $DelFileName );

        closedir( $resDir );//ディレクトリ・ハンドルをクローズ
    }


    public static function createFileName( $param = array(), $putFileName )
    {

        $microTimeArray = explode( ' ', microtime() );
        $unique = time() . '_' . str_replace( '.', '', $microTimeArray[0] );

        foreach( (array)$param AS $key => $value )
            $fileName .= $value . '_';
        //$fileName .= $unique . ImageResize::ExtensionPut( $this->files['type'], $putFileName );
        $fileName .= $unique;

        return $fileName;
    }

}
?>
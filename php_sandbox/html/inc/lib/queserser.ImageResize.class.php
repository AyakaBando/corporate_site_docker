<?php
ini_set('upload_max_filesize', 10 * 1024 * 1024); 
ini_set( 'memory_limit', '128M' );
/*  */

/**
 * [[機能説明]]
 *画像をリサイズする　いろんなソースのパクリ集合体クラス
 * 
 * PHP versions 5
 * GD  versions 2
 * LICENSE: ないよ
 *
 * @author      ??? <yonekura@queserser.co.jp>
 * @copyright   2011 queserser
 * @version     β0.8
 * @link        ないよ
/*

*/



//require_once( dirname(__FILE__) . '/./queserser.ImageResize.class.php' );
class ImageResize
{
    /**
     * 各画像タイプ判定時のパラメータ値定数
     * @since     1.0
     * @var  int
     */
    const TYPE_JPG = 1;
    const TYPE_GIF = 2;
    const TYPE_PNG = 3;
    const TYPE_BMP = 4;
    /**
     * 元画像の横幅
     * @since     1.0
     * @var  int
     */
    public $width;

    /**
     * リサイズ後の画像横幅リサイズ不要の場合NULL
     * @since     1.0
     * @var  mixed
     */
    public $ajustWidth = null;

    /**
     * リサイズ用の横幅最大設定値
     * @since     1.0
     * @var  int
     */
    public $maxWidth;

    /**
     * 元画像の縦幅
     * @since     1.0
     * @var  int
     */
    public $height;

    /**
     * リサイズ後の画像縦幅リサイズ不要の場合NULL
     * @since     1.0
     * @var  mixed
     */
    public $ajustHeight = null;

    /**
     * リサイズ用の縦幅最大設定値
     * @since     1.0
     * @var  int
     */
    public $maxHeight;

    /**
     * JPGリサイズ時クオリティー値
     * @since     1.0
     * @var  int
     */
    public $quality = 100;

    /**
     * 画像アップ用のフォルダーへのパス
     * @since     1.0
     * @var  string
     */
    public $tempPath;

    /**
     * 画像アップ用のフォルダー名
     * @since     1.0
     * @var  string
     */
    //private $upDirPath;


    /**
     * リサイズ用値リサイズ不要の場合NULL
     * @since     1.0
     * @var  mixed
     */
    private $handle = null;

    /**
     * リサイズ用値リサイズ不要の場合NULL
     * @since     1.0
     * @var  mixed
     */
    private $newImage = null;

    public $tempFileName;

    private $tempFileNameParam = array();

    /**
     * ファイルのマイムタイプからファイル種別セット
     * @since     1.0
     * @var  int  1 -> JPG :: 2 -> GIF :: 3 -> PNG :: 4 -> BMP
     */
    private $fileMyme;

    /**
     * リサイズ判定フラグ
     * @since     1.0
     * @var  boolean
     */
    public $resizeFlg = true;

    /**
     * BMPをリサイズするかの判定フラグ
     * @since     1.0
     * @var  boolean
     */
    public $resizeBmpFlg = false;

    public $dbFlg        = false;
    private $dbString;

    /**
     * $_FIELD配列
     * @since     1.0
     * @var  array
     */
    public $files = array();

    /**
     * FileIOclass用パラメーター
     * @since     1.0
     * @var  array
     */
    public $fileIOParam = array();

    /**
     * Class constructor
     * @param    array      $param        一通りの設定値用配列
     * @param    array      $fileData     $_FIELD配列格納
     * @access   public
     */
    function __construct( $param/*, $fileData = null, $fileIOParam = array()*/ )
    {
        if( $param['quality'] )               $this->quality      = $param['quality'];
        if( $param['resizeBmpFlg'] === true ) $this->resizeBmpFlg = $param['resizeBmpFlg'];
        if( $param['resizeFlg'] === false )   $this->resizeFlg    = false;
        $this->tempPath    = $param['tempPath'];
    }


    /**
     * setter 外部からパラメータ再設定(ループ処理時設定変更用)
     * @param  int    $maxWidth   リサイズ用の横幅最大設定値
     * @param  int    $maxHeight  リサイズ用の縦幅最大設定値
     * @param  int    $quality    リサイズ時JPGクオリティー
     * @param  string $tempPath   リサイズ時一時フォルダパス
     */
    public function _setParam( $maxWidth = null, $maxHeight = null, $fileData, $fileIOParam = array(), $tempPath = null, $quality = null )
    {
        if( !$maxWidth && !$maxHeight )
            die( 'set maxWidth or maxHeight from metod _setParam' );
        $this->maxWidth  = $maxWidth;
        $this->maxHeight = $maxHeight;
        @list( $this->width, $this->height ) = getimagesize( $fileData['tmp_name'] );
        if( $this->width > $this->maxWidth || $this->height > $this->maxHeight )
        {
            $sizeArray         = self::resize( $this->maxWidth, $this->width, $this->maxHeight, $this->height );
            $this->ajustWidth  = $sizeArray['width'];
            $this->ajustHeight = $sizeArray['height'];
            $this->newImage    = imagecreatetruecolor( $sizeArray['width'], $sizeArray['height'] );
            $this->handle      = @imagecreatefromstring( file_get_contents( $fileData['tmp_name'] ) );
            $this->resizeFlg   = true;
        }
        if( $quality )
            $this->quality   = $quality;
        if( !$this->tempPath && !$tempPath )
            die( 'paramError please set 『tempPath』 from metod _setParam' );

        if( $tempPath )
            $this->tempPath  = $tempPath;
        $this->files = $fileData;

        self::ImageCreateMain();

    }

    public function _setResizeBmpFlg( $param )
    {
        if( is_bool( $param ) )
            $this->resizeBmpFlg = $param;
        else
            die( 'booleanではありません From metod _setResizeBmpFlg' );
    }

    public function _setDBFlg( $param )
    {
        $this->dbFlg = $param;
    }

    private function ExtensionPut( $type, $fileName )
    {
        switch( $type )
        {
            case 'image/jpeg': case 'image/pjpeg': case 'image/jpg':
                $extension = '.jpg';
                $this->fileMyme = self::TYPE_JPG;
                break;
            case 'image/gif':
                $extension = '.gif';
                $this->fileMyme = self::TYPE_GIF;
                break;
            case 'image/x-png': case 'image/png':
                $extension = '.png';
                $this->fileMyme = self::TYPE_PNG;
                break;
            case 'image/bmp':
                $extension = ( $this->resizeFlg === true ) ? '.jpg' : '.bmp';
                $this->fileMyme = self::TYPE_BMP;
                break;
            default:
                @preg_match( '/\.[a-z]+$/i', $fileName, $matches );
                $extension = $matches[0];
                break;
        }

        require_once( dirname(__FILE__) . '/./queserser.FileIO.class.php' );
        $this->tempFileName = FileIO::createFileName( $this->tempFileNameParam, $fileName ) . $extension;
        return $extension;

    }



    public static function AniGIFJudge( $fileName )
    {
        $imgcnt = 0;
        $fp = fopen( $fileName, "rb" );
        @fread( $fp, 4 );
        $c = @fread( $fp, 1 );
        if( ord( $c ) !== 0x39 ) // GIF89aである(アニメーションかも)
            return false;

        while( !feof( $fp ) )
        {
            do
                $c = fread( $fp, 1 );
            while( ord( $c ) !== 0x21 && !feof( $fp ) ); // 拡張ブロック開始まで送る
            if( feof( $fp ) )
                break;
            $c2 = fread( $fp, 2 );
            if( bin2hex( $c2 ) === "f904" ) // Graphic Control Extension固定値
                $imgcnt++;
            if( feof( $fp ) )
                break;
            if( $imgcnt > 1 )break;
        }

        if( $imgcnt > 1 )
            return true;
        else
            return false;
    }

    private function NoResizeUp()
    {
        $fp = @fopen( $this->tempPath . '/' . $this->tempFileName, 'w+' );
        @fputs( $fp, file_get_contents( $this->files['tmp_name'] ) );
        @fclose( $fp );
    }

    private function CreateResizeJPG( $quality )
    {
        ImageCopyResampled( $this->newImage, $this->handle, 0, 0, 0, 0, $this->ajustWidth, $this->ajustHeight, $this->width, $this->height );
        ImageJpeg( $this->newImage, $this->tempPath . '/' . $this->tempFileName, $quality );

        ImageDestroy( $this->handle );
        ImageDestroy( $this->newImage );
    }

    private function CreateResizeGIF()
    {
        //アニGIFはリサイズしない(GDではできない)
        if( self::AniGIFJudge( $this->files['tmp_name'] ) === true )
        {
            $this->NoResizeUp();
            return ;
        }

        $image = imagecreatefromgif( $this->files['tmp_name'] );

        $trnprtIndx     = imagecolortransparent( $image );
        if ($trnprtIndx >= 0)
        {
            $trnprtColor    = imagecolorsforindex( $image, $trnprtIndx );
            $trnprtIndx     = imagecolorallocate( $this->newImage, $trnprtColor['red'], $trnprtColor['green'], $trnprtColor['blue'] );

            imagefill( $this->newImage, 0, 0, $trnprtIndx );
            imagecolortransparent( $this->newImage, $trnprtIndx );
        }

        imagecopyresampled( $this->newImage, $image, 0, 0, 0, 0, $this->ajustWidth, $this->ajustHeight, $this->width, $this->height );
        imagegif( $this->newImage, $this->tempPath . '/' . $this->tempFileName );

        ImageDestroy( $this->handle );
        ImageDestroy( $this->newImage );
        ImageDestroy( $image );

    }

    private function CreateResizePNG()
    {
        $image = imagecreatefrompng( $this->files['tmp_name'] );
        $trnprtIndx = imagecolortransparent( $image );
        imagealphablending( $this->newImage, false );
        $color = imagecolorallocatealpha( $this->newImage, 0, 0, 0, 127 );
        imagefill( $this->newImage, 0, 0, $color );
        imagesavealpha( $this->newImage, true );
        ImageCopyResampled( $this->newImage, $image, 0, 0, 0, 0, $this->ajustWidth, $this->ajustHeight, $this->width, $this->height );

        imagepng( $this->newImage, $this->tempPath . '/' . $this->tempFileName );

        ImageDestroy( $this->handle );
        ImageDestroy( $this->newImage );
        ImageDestroy( $image );

    }

    private function CreateResizeBMP()
    {
        @imagejpeg ( imageCreateFromBMP( $this->files['tmp_name'] ), $this->tempPath . '/' . $this->tempFileName );
        //JPGとしてリサイズするのでプロパティー上書き
        $this->handle      = @imagecreatefromstring( file_get_contents( $this->tempPath . '/' . $this->tempFileName ) );
        $this->CreateResizeJPG( $this->quality );
    }

    public function ImageCreateMain()
    {
        $this->ExtensionPut( $this->files['type'], $this->files['name'] );
        if( $this->resizeFlg === false || ( $this->width <= $this->maxWidth && $this->height <= $this->maxHeight ) )
        {
            $this->NoResizeUp();
            return ;
        }
        switch( $this->fileMyme )
        {
            case self::TYPE_JPG:
                $this->CreateResizeJPG( $this->quality );
                break;
            case self::TYPE_GIF:
                $this->CreateResizeGIF();
                break;
            case self::TYPE_PNG:
                $this->CreateResizePNG();
                break;
            case self::TYPE_BMP:
                if( $this->resizeBmpFlg === true )
                    $this->CreateResizeBMP();
                else
                    $this->NoResizeUp();
                break;
            default: break;
        }
        if( $this->dbFlg === true ) $this->dbString = '0x' . bin2hex( file_get_contents( $this->tempPath . '/' . $this->tempFileName ) );

    }

    public static function resize( $maxWidth = null, $width, $maxHeight = null, $height )
    {
        if( $width > $maxWidth OR $height > $maxHeight )
        {
            //アスペクト比固定処理
            if( $maxWidth != 0 )
                $tmp_w = $width / $maxWidth;

            if( $maxHeight != 0 )
                $tmp_h = $height / $maxHeight;

            if( $tmp_w > 1 || $tmp_h > 1 )
            {
                if( $maxHeight == 0 )
                {
                    if( $tmp_w > 1 )
                    {
                        $ajust['width']  = $maxWidth;
                        $ajust['height'] = $height * $maxWidth / $width;
                    }
                }
                else
                {
                    if( $tmp_w > $tmp_h )
                    {
                        $ajust['width']  = $maxWidth;
                        $ajust['height'] = $height * $maxWidth / $width;
                    }
                    else
                    {
                        $ajust['height'] = $maxHeight;
                        $ajust['width']  = $width * $maxHeight / $height;
                    }
                }
            }

            $ajust['height'] = round( $ajust['height'] );
            $ajust['width']  = round( $ajust['width'] );

        }

        return ( $ajust['height'] && $ajust['width'] ) ? $ajust : false;
    }
}



    //BMPをJPGに変換する[[よそからパクッたソース『ImageCreateFromBMP』で検索したら見つかるたぶん・・・]]
    function ImageCreateFromBMP( $filename )
    {
        //Ouverture du fichier en mode binaire
        if ( !$f1 = fopen( $filename, "rb" ) ) return false;

        //1 : Chargement des enttes FICHIER
        $FILE = unpack( "vfile_type/Vfile_size/Vreserved/Vbitmap_offset", fread( $f1, 14 ) );
        if ( $FILE['file_type'] != 19778 ) return false;

        //2 : Chargement des enttes BMP
        $bmp = unpack( 'Vheader_size/Vwidth/Vheight/vplanes/vbits_per_pixel' .
                       '/Vcompression/Vsize_bitmap/Vhoriz_resolution' .
                       '/Vvert_resolution/Vcolors_used/Vcolors_important', fread( $f1, 40 ) );
        $bmp['colors'] = pow( 2, $bmp['bits_per_pixel'] );
        if ( $bmp['size_bitmap'] == 0 ) $bmp['size_bitmap'] = $FILE['file_size'] - $FILE['bitmap_offset'];
        $bmp['bytes_per_pixel'] = $bmp['bits_per_pixel'] / 8;
        $bmp['bytes_per_pixel2'] = ceil( $bmp['bytes_per_pixel'] );
        $bmp['decal'] = ( $bmp['width'] * $bmp['bytes_per_pixel'] / 4 );
        $bmp['decal'] -= floor( $bmp['width'] * $bmp['bytes_per_pixel'] / 4 );
        $bmp['decal'] = 4 - ( 4 * $bmp['decal'] );
        if ( $bmp['decal'] == 4 ) $bmp['decal'] = 0;

        //3 : Chargement des couleurs de la palette
        $palette = array();
        if ( $bmp['colors'] < 16777216 )
        {
            $palette = unpack( 'V' . $bmp['colors'], fread( $f1, $bmp['colors'] * 4 ) );
        }

        //4 : Cration de l'image
        $img = fread( $f1, $bmp['size_bitmap'] );
        $vide = chr( 0 );

        $res = imagecreatetruecolor( $bmp['width'], $bmp['height'] );
        $P = 0;
        $Y = $bmp['height'] - 1;
        while ( $Y >= 0 )
        {
            $X = 0;
            while ( $X < $bmp['width'] )
            {
                if ( $bmp['bits_per_pixel'] == 24 )
                    $color = unpack( "V", substr( $img, $P, 3 ) . $vide );
                elseif ( $bmp['bits_per_pixel'] == 16 )
                {
                    $color = unpack( "n", substr( $img, $P, 2 ) );
                    $color[1] = $palette[$color[1]+1];
                }
                elseif ( $bmp['bits_per_pixel'] == 8 )
                {
                    $color = unpack( "n", $vide . substr( $img, $P, 1 ) );
                    $color[1] = $palette[$color[1]+1];
                }
                elseif ( $bmp['bits_per_pixel'] == 4 )
                {
                    $color = unpack( "n", $vide . substr( $img, floor( $P ), 1 ) );
                    if( ( $P * 2 ) % 2 == 0 ) $color[1] = ( $color[1] >> 4 ) ; else $color[1] = ( $color[1] & 0x0F );
                    $color[1] = $palette[$color[1]+1];
                }
                elseif ( $bmp['bits_per_pixel'] == 1 )
                {
                    $color = unpack( "n", $vide . substr( $img, floor( $P ), 1 ) );
                    if     ( ( $P * 8 ) % 8 == 0 ) $color[1] =  $color[1]           >> 7;
                    elseif ( ( $P * 8 ) % 8 == 1 ) $color[1] = ( $color[1] & 0x40 ) >> 6;
                    elseif ( ( $P * 8 ) % 8 == 2 ) $color[1] = ( $color[1] & 0x20 ) >> 5;
                    elseif ( ( $P * 8 ) % 8 == 3 ) $color[1] = ( $color[1] & 0x10 ) >> 4;
                    elseif ( ( $P * 8 ) % 8 == 4 ) $color[1] = ( $color[1] & 0x8 )  >> 3;
                    elseif ( ( $P * 8 ) % 8 == 5 ) $color[1] = ( $color[1] & 0x4 )  >> 2;
                    elseif ( ( $P * 8 ) % 8 == 6 ) $color[1] = ( $color[1] & 0x2 )  >> 1;
                    elseif ( ( $P * 8 ) % 8 == 7 ) $color[1] = ( $color[1] & 0x1 );
                    $color[1] = $palette[$color[1]+1];
                }
                else
                    return false;
                imagesetpixel( $res, $X, $Y, $color[1] );
                $X++;
                $P += $bmp['bytes_per_pixel'];
            }
            $Y--;
            $P += $bmp['decal'];
        }

        //Fermeture du fichier
        fclose( $f1 );

        return $res;
    }
?>
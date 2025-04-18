<?php
define( 'HTML_ROOT',              '' );
//define( 'ROOT_PATH',              '/home/sites/heteml/users/q/u/e/queserser-demo4/web/queserser.jpn.com/test/test735' . HTML_ROOT );
// define( 'ROOT_PATH',              '/home/users/1/moritaalumi/web' . HTML_ROOT );
define('ROOT_PATH', '/var/www/html' . HTML_ROOT);


define( 'FILE_NAME',              basename( $_SERVER['SCRIPT_NAME'] ) );
// define( 'HOST',                   $_SERVER['HTTP_HOST'] );
define('HOST', 'localhost');
define( 'FILE_DELET_LIMIT_STUMP', strtotime( '-3 hours' ) );
define( 'TEL',                    '' );
define( 'FAX',                    '' );
define( 'ADDRESS_OOSAKA',         '' );
define( 'HTML_TITLE',             '' );
define( 'DOMAIN',                 'http://moritaalumi.co.jp' );
define( 'COMPANY_MAIL_FROM',      'info-dl@moritaalumi.co.jp' );
define( 'ERROR_MAIL',             '-f ' . COMPANY_MAIL_FROM );

ini_set( 'error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED );// & ~E_USER_DEPRECATED
ini_set( 'display_errors',  1 );


// MYSQL connection
$servername = "mysql_db";
$username = getenv("MYSQL_USER") ?: "root"; 
$password = getenv("MYSQL_PASSWORD") ?: "morialu2018"; 
$database = getenv("MYSQL_DATABASE") ?: "moritaalumi_db";


// Establish MySQL Connection
$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// Log success without displaying it to the user
error_log("Database connected successfully");



////////////////////////////////////////////////
    // >> カタログ,お問い合わせ
////////////////////////////////////////////////
function contactBusinessCategory( $emptyFlg = null )
{
    $returnArray[2]   = '分譲マンション';
    $returnArray[3]   = '賃貸';
    $returnArray[4]   = 'リフォーム';
    $returnArray[5]   = '建材';
    $returnArray[6]   = 'エクステリア・外溝';
    $returnArray[7]   = 'オフィス';
    $returnArray[8]   = 'その他';

    return $returnArray;
}


function contactJobCategory( $emptyFlg = null )
{
    if( $emptyFlg )$returnArray[0]  = '';
    $returnArray[1]   = '営業';
    $returnArray[2]   = '企画';
    $returnArray[3]   = '設計';
    $returnArray[4]   = '購買';
    $returnArray[5]   = '開発';
    $returnArray[6]   = 'その他';


    return $returnArray;
}

function contactCatalogArray( $emptyFlg = null )
{
    if( $emptyFlg )$returnArray[0]  = '';
    $returnArray[31]  = '建材総合カタログ';
    $returnArray[1]   = 'アルミ手摺';
    $returnArray[2]   = 'フランジポート';
    $returnArray[3]   = 'ステアーズ';
    $returnArray[4]   = 'エアリー';
    //$returnArray[5]   = 'フラットテラス';
    $returnArray[32]   = 'SCUA';
    $returnArray[18]  = 'AReco';
    // $returnArray[6]   = 'Flange Port';
    // $returnArray[7]   = 'morita color works';
    // $returnArray[8]   = 'TAS Step';
    //$returnArray[9]   = 'TAS Handrail';
    $returnArray[10]  = 'AG、AGx';
    $returnArray[11]  = 'vik';
    $returnArray[12]  = 'pid 4M';
    //$returnArray[13]  = 'STOK laundry';
    $returnArray[14]  = 'Wally';
    // $returnArray[15]  = 'albase';
    $returnArray[19]  = 'albase、fitbase、 <br>fitbase lite';
    $returnArray[20]  = 'Cucurie';
    $returnArray[16]  = 'falce';
    $returnArray[17]  = 'patis';
    $returnArray[21]  = 'safro';
    $returnArray[22]  = 'BAKO';
    $returnArray[23]  = 'Alute<br>(ブラック・ホワイト)';
	$returnArray[24]  = 'kacu';
	$returnArray[25]  = 'fitframe';
	$returnArray[26]  = 'BAYS WOLD';
	$returnArray[27]  = 'kururi plus';
	$returnArray[28]  = 'VALLIS';
	$returnArray[29]  = 'BOST';
	$returnArray[30]  = 'keid';



    return $returnArray;
}


function contactSubCatalogArray( $emptyFlg = null )
{
    if( $emptyFlg )$returnArray[0]  = '';
    $returnArray[31]  = '物干し、外廻りなど';
    $returnArray[1]   = '外部用ハンドレール';
    $returnArray[2]   = 'テラス、バルコニーなど';
    $returnArray[3]   = '外部用階段';
    $returnArray[4]   = '目隠しスクリーン';
    //$returnArray[5]   = 'フラットテラス';
    $returnArray[32]   = 'マルチフレーム';
    $returnArray[18]  = 'グラウンド整備用トンボ';
    // $returnArray[6]   = 'カーポート';
    // $returnArray[7]   = 'カラーエクステリア';
    // $returnArray[8]   = '室内用階段';
    $returnArray[9]   = '室内用ハンドレール';
    $returnArray[10]  = '忍び返し <br>(総合カタログに含む)';
    $returnArray[11]  = '玄関用マルチフック <br>(総合カタログに含む)';
    $returnArray[12]  = '室内物干しワイヤー <br>(総合カタログに含む)';
    //$returnArray[13]  = '室内物干しロープ';
    $returnArray[14]  = '多目的シェルフ <br>(総合カタログに含む)';
    // $returnArray[15]  = '極小アルミ巾木';
    $returnArray[19]  = 'アルミ巾木・樹脂巾木 <br>(総合カタログに含む)';
    $returnArray[20]  = 'マグネットキッチン収納';
    $returnArray[16]  = 'パーティション';
    $returnArray[17]  = 'デスクパーティション';
    $returnArray[21]  = 'ライティングボード';
    $returnArray[22]  = 'ガスメーターカバー・電気メーターカバー <br>(総合カタログに含む)';
    $returnArray[23]  = '室内手摺 <br>(総合カタログに含む)';
	$returnArray[24]  = '天井付け物干し <br>(総合カタログに含む)';
	$returnArray[25]  = '極薄窓枠 <br>(総合カタログに含む)';
	$returnArray[26]  = '極幅フローリング <br>(総合カタログに含む)';
	$returnArray[27]  = '首振り物干し <br>(総合カタログに含む)';
	$returnArray[28]  = '大判タイル <br>(総合カタログに含む)';
	$returnArray[29]  = 'ビニルタイル <br>(総合カタログに含む)';
	$returnArray[30]  = 'アルミ床見切り <br>(総合カタログに含む)';



    return $returnArray;
}



////////////////////////////////////////////////
    // >> 会員登録
////////////////////////////////////////////////
function memberRegJobArray( $emptyFlg = null )
{
    if( $emptyFlg )$returnArray[0]  = '';
    $returnArray[1]   = '工務店';
    $returnArray[2]   = '建材販売店・代理店';
    $returnArray[3]   = 'ハウスメーカー・ディベロッパー';
    $returnArray[4]   = 'ゼネコン';
    $returnArray[5]   = '施主様';
    $returnArray[6]   = 'その他';

    return $returnArray;
}

//新規追加分1
function memberRelationJobArray( $emptyFlg = null )
{

    $returnArray[1]   = '戸建';
    $returnArray[2]   = '分譲マンション';
    $returnArray[3]   = '賃貸';
    $returnArray[4]   = 'リフォーム';
    $returnArray[5]   = '建材';
    $returnArray[6]   = 'エクステリア・外溝';
    $returnArray[7]   = 'オフィス';
    $returnArray[8]   = 'その他';

    return $returnArray;
}

//新規追加分2
function memberSubJobCategory( $emptyFlg = null )
{
    $returnArray[1]   = '営業';
    $returnArray[2]   = '企画';
    $returnArray[3]   = '設計';
    $returnArray[4]   = '購買';
    $returnArray[5]   = '開発';
    $returnArray[6]   = 'その他';

    return $returnArray;
}


function memberRegDowmArray( $emptyFlg = null )
{
    if( $emptyFlg )$returnArray[0]  = '';
    $returnArray[1]  = '検索エンジン(yahoo!、google等)';
    $returnArray[2]  = 'ネットショップ';
    $returnArray[3]  = 'SNS(Instagram、Twitter、Facebook等）';
    $returnArray[4]  = 'ブログ・まとめ記事等';
    $returnArray[5]  = '雑誌';
    $returnArray[6]  = '展示会';
    $returnArray[7]  = 'プレスリリース';
    $returnArray[8]  = 'その他';

    return $returnArray;
}

function memberRegPdfCategoryArray( $emptyFlg = null )
{
    if( $emptyFlg )$returnArray[0]  = '';
    $returnArray[1]  = 'morita color works';
    $returnArray[2]  = 'AGx';
    $returnArray[3]  = 'Wally';
    $returnArray[4]  = 'pid4M';
    $returnArray[5]  = 'patis';
    $returnArray[6]  = 'AReco';
    $returnArray[7]  = 'ViK';
    $returnArray[8]  = 'AG';
    $returnArray[9]  = 'albase';
    $returnArray[10] = 'SOL(販売終了)';
    $returnArray[11] = 'エアリー ステアーズ';
    $returnArray[12] = 'falce';
    $returnArray[13] = 'TAS Glass Step';
    $returnArray[14] = 'TAS Wood Step';
    $returnArray[15] = 'TAS Handrail';
    $returnArray[16] = 'アルミ手摺';

    return $returnArray;
}

function emailConsentArray( $emptyFlg = null )
{
    if( $emptyFlg )$returnArray[0]  = '';
    $returnArray[1]  = '受け取る';
    $returnArray[2]  = '受け取らない';

    return $returnArray;
}


////////////////////////////////////////////////
    // >> 製品登録
////////////////////////////////////////////////
function productCategoryArray( $emptyFlg = null )
{
    if( $emptyFlg )$returnArray[0]  = '';
    $returnArray[1]  = '商品カテゴリ';
    // $returnArray[2]  = 'ロケーション';
    $returnArray[2]  = 'エクステリア';
    $returnArray[3]  = 'その他';


    return $returnArray;
}

//英語版
function En_productCategoryArray( $emptyFlg = null )
{
    if( $emptyFlg )$returnArray[0]  = '';
    $returnArray[1]  = 'product category';
    // $returnArray[2]  = 'location';
    $returnArray[3]  = 'others';


    return $returnArray;
}


////////////////////////////////////////////////
    // >> 製品登録
////////////////////////////////////////////////
//製品新着カテゴリ
function productNewsContentsCategory( $emptyFlg = null )
{
    if( $emptyFlg )$returnArray[0]  = '';
    $returnArray[1]  = 'リンク';
    $returnArray[2]  = 'PDF';

    return $returnArray;
}

//製品新着タイプ
function productNewsType( $emptyFlg = null )
{
    if( $emptyFlg )$returnArray[0]  = '';
    $returnArray[1]  = '受賞歴';
    $returnArray[2]  = 'プレスリリース';
    $returnArray[3]  = '関連情報';

    return $returnArray;
}

////////////////////////////////////////////////
    // >> レビュー
////////////////////////////////////////////////
//評価
function evaluationArray( $emptyFlg = null )
{
    if( $emptyFlg )$returnArray[0]  = '';
    $returnArray[5]  = '★★★★★';
    $returnArray[4]  = '★★★★';
    $returnArray[3]  = '★★★';
    $returnArray[2]  = '★★';
    $returnArray[1]  = '★';

    return $returnArray;
}

//評価
function reviewStatusArray()
{
    $returnArray[0]  = '未承認';
    $returnArray[1]  = '承認';
    //$returnArray[2]  = '';
    //$returnArray[3]  = '';

    return $returnArray;
}



/************************************************
    >> 新着カテゴリ
************************************************/
//コンテンツカテゴリ
function whatsNewContentsCategory( $emptyFlg = null )
{
    if( $emptyFlg )$returnArray[0]  = '';

    $returnArray[1]  = 'リンク';
    $returnArray[2]  = 'PDF';
    $returnArray[3]  = 'ページ作成';

    return $returnArray;
}

//カテゴリ
function whatsNewCategory( $emptyFlg = null )
{
    if( $emptyFlg )$returnArray[0]  = '';
    $returnArray[1]  = 'ニュース';
    $returnArray[2]  = 'イベント';
    $returnArray[3]  = '製品情報';
    $returnArray[4]  = '採用情報';

    return $returnArray;
}




/************************************************
    >> 英語版新着カテゴリ
************************************************/
//コンテンツカテゴリ
/*function whatsNewContentsCategory( $emptyFlg = null )
{
    if( $emptyFlg )$returnArray[0]  = '';

    $returnArray[1]  = 'リンク';
    $returnArray[2]  = 'PDF';
    $returnArray[3]  = 'ページ作成';

    return $returnArray;
}*/

//カテゴリ
function En_whatsNewCategory( $emptyFlg = null )
{
    if( $emptyFlg )$returnArray[0]  = '';
    $returnArray[1]  = 'news';
    $returnArray[2]  = 'event';
    $returnArray[3]  = 'product info';
    $returnArray[4]  = 'recruit info';

    return $returnArray;
}


//五十音配列ひらがな
function hiraganaArray( $nullFlg = null )
{
    $returnArray = array(
        1 => array( 'hedH' => 'あ', 'all' => array( 1 => 'あ', 'い', 'う', 'え', 'お' ) ),
        2 => array( 'hedH' => 'か', 'all' => array( 1 => 'か', 'き', 'く', 'け', 'こ' ) ),
        3 => array( 'hedH' => 'さ', 'all' => array( 1 => 'さ', 'し', 'す', 'せ', 'そ' ) ),
        4 => array( 'hedH' => 'た', 'all' => array( 1 => 'た', 'ち', 'つ', 'て', 'と' ) ),
        5 => array( 'hedH' => 'な', 'all' => array( 1 => 'な', 'に', 'ぬ', 'ね', 'の' ) ),
        6 => array( 'hedH' => 'は', 'all' => array( 1 => 'は', 'ひ', 'ふ', 'へ', 'ほ' ) ),
        7 => array( 'hedH' => 'ま', 'all' => array( 1 => 'ま', 'み', 'む', 'め', 'も' ) ),
        8 => array( 'hedH' => 'や', 'all' => array( 1 => 'や', 'ゆ', 'よ' ) ),
        9 => array( 'hedH' => 'ら', 'all' => array( 1 => 'ら', 'り', 'る', 'れ', 'ろ' ) ),
       10 => array( 'hedH' => 'わ', 'all' => array( 1 => 'わ', 'を', 'ん' ) ),
    );

    return $returnArray;
}

//五十音配列
function kanaArray( $nullFlg = null )
{
    $returnArray = array(
        1 => array( 'hedH' => 'あ', 'hedK' => 'ア', 'all' => array( 1 => 'あ', 'い', 'う', 'え', 'お', 'ア', 'イ', 'ウ', 'エ', 'オ', ), ),
        2 => array( 'hedH' => 'か', 'hedK' => 'カ', 'all' => array( 1 => 'か', 'き', 'く', 'け', 'こ', 'が', 'ぎ', 'ぐ', 'げ', 'ご', 'カ', 'キ', 'ク', 'ケ', 'コ', 'ガ', 'ギ', 'グ', 'ゲ', 'ゴ', ), ),
        3 => array( 'hedH' => 'さ', 'hedK' => 'サ', 'all' => array( 1 => 'さ', 'し', 'す', 'せ', 'そ', 'ざ', 'じ', 'ず', 'ぜ', 'ぞ', 'サ', 'シ', 'ス', 'セ', 'ソ', 'ザ', 'ジ', 'ズ', 'ゼ', 'ゾ', ), ),
        4 => array( 'hedH' => 'た', 'hedK' => 'タ', 'all' => array( 1 => 'た', 'ち', 'つ', 'て', 'と', 'だ', 'ぢ', 'づ', 'で', 'ど', 'タ', 'チ', 'ツ', 'テ', 'ト', 'ダ', 'ヂ', 'ヅ', 'デ', 'ド', ), ),
        5 => array( 'hedH' => 'な', 'hedK' => 'ナ', 'all' => array( 1 => 'な', 'に', 'ぬ', 'ね', 'の', 'ナ', 'ニ', 'ヌ', 'ネ', 'ノ', ), ),
        6 => array( 'hedH' => 'は', 'hedK' => 'ハ', 'all' => array( 1 => 'は', 'ひ', 'ふ', 'へ', 'ほ', 'ば', 'び', 'ぶ', 'べ', 'ぼ', 'ぱ', 'ぴ', 'ぷ', 'ぺ', 'ぽ', 'ハ', 'ヒ', 'フ', 'ヘ', 'ホ', 'バ', 'ビ', 'ブ', 'ベ', 'ボ', 'パ', 'ピ', 'プ', 'ペ', 'ポ', ), ),
        7 => array( 'hedH' => 'ま', 'hedK' => 'マ', 'all' => array( 1 => 'ま', 'み', 'む', 'め', 'も', 'マ', 'ミ', 'ム', 'メ', 'モ', ), ),
        8 => array( 'hedH' => 'や', 'hedK' => 'ヤ', 'all' => array( 1 => 'や', 'ゆ', 'よ', 'ヤ', 'ユ', 'ヨ', ), ),
        9 => array( 'hedH' => 'ら', 'hedK' => 'ラ', 'all' => array( 1 => 'ら', 'り', 'る', 'れ', 'ろ', 'ラ', 'リ', 'ル', 'レ', 'ロ', ), ),
       10 => array( 'hedH' => 'わ', 'hedK' => 'ワ', 'all' => array( 1 => 'わ', 'を', 'ん', 'ワ', 'ヲ', 'ン', ), ),
    );

    return $returnArray;
}

//アルファベット配列
function alphabetArray( $nullFlg = null )
{
    $returnArray = array(
        1 => 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'Y', 'V', 'W', 'X', 'Y', 'Z', );

    return $returnArray;
}


//都道府県
function prefArray()
{
    $prefArray = array(
        '都道府県を選択',
        1 => '北海道',    2 => '青森県',  3 => '岩手県',  4 => '宮城県',    5 => '秋田県',
        6 => '山形県',    7 => '福島県',  8 => '茨城県',  9 => '栃木県',   10 => '群馬県',
       11 => '埼玉県',   12 => '千葉県', 13 => '東京都', 14 => '神奈川県', 15 => '新潟県',
       16 => '富山県',   17 => '石川県', 18 => '福井県', 19 => '山梨県',   20 => '長野県',
       21 => '岐阜県',   22 => '静岡県', 23 => '愛知県', 24 => '三重県',   25 => '滋賀県',
       26 => '京都府',   27 => '大阪府', 28 => '兵庫県', 29 => '奈良県',   30 => '和歌山県',
       31 => '鳥取県',   32 => '島根県', 33 => '岡山県', 34 => '広島県',   35 => '山口県',
       36 => '徳島県',   37 => '香川県', 38 => '愛媛県', 39 => '高知県',   40 => '福岡県',
       41 => '佐賀県',   42 => '長崎県', 43 => '熊本県', 44 => '大分県',   45 => '宮崎県',
       46 => '鹿児島県', 47 => '沖縄県',
    );

    return $prefArray;
}
?>
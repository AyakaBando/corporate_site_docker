<?php
require_once( '../inc/auth.php' );
require_once( './systemConsts.php' );
require_once( '../inc/lib/DB/.systemSaveDB.class.php' );
require_once( '../inc/lib/DB/.systemProductDB.class.php' );


define( 'SQL_TABLE_NAME',   'product' );
define( 'PAGE_TITLE',       '製品' );
define( 'FILE_CATEGORY',    'product' );
define( 'THE_FILE_NAME',    FILE_CATEGORY . 'AddChange' );
define( 'FILE_SESSION_KEY', FILE_CATEGORY . 'Image' );
define( 'PAGE_NUM',         2 );
define( 'CHENGE_FLG',       1 );
define( 'SORT_FLG',         1 );

//DBインスタンス
$query       = new systemContentsDB();
$systemquery = new systemDB();

$maxWidth     = array( 1 => 958, 2 => 958, 3 => 958, 4 => 958, 5 => 958 );
$maxHeight    = array( 1 => 494, 2 => 494, 3 => 494, 4 => 494, 5 => 494 );
$imageTitle   = array( 1 => '一覧用画像' );
$maxImageCnt  = 5;

$productCategoryArray  = productCategoryArray( 1 );
$categoryArray         = $systemquery->GetCategory( 1, null );
$prtJson               = json_encode( $categoryArray );


//FCK用文字列置換
if( isset( $_POST['comment'] ) )
{
    $_POST['comment']  = strReprace::FCK_QuotesReprace( $_POST['comment'], 1 );
    $confComment       = strReprace::FCK_QuotesReprace( $_POST['comment'], 1 );
    $hiddenValue       = strReprace::FCK_QuotesReprace( $_POST['comment'] );
}
if( isset( $_POST['otherComment'] ) )
{
    $_POST['otherComment']  = strReprace::FCK_QuotesReprace( $_POST['otherComment'], 1 );
    $confOtherComment       = strReprace::FCK_QuotesReprace( $_POST['otherComment'], 1 );
    $hiddenOtherValue       = strReprace::FCK_QuotesReprace( $_POST['otherComment'] );
}

if( isset( $_POST['otherComment2'] ) )
{
    $_POST['otherComment2']  = strReprace::FCK_QuotesReprace( $_POST['otherComment2'], 1 );
    $confOtherComment2       = strReprace::FCK_QuotesReprace( $_POST['otherComment2'], 1 );
    $hiddenOtherValue2       = strReprace::FCK_QuotesReprace( $_POST['otherComment2'] );
}

if( $_REQUEST['id'] )
{
    //登録詳細データ
    $data              = $query->Detail( $_REQUEST['id'] );

    $setCategoryArray       = $makerArray['category'][$data['makerId']];
    $setSubCategoryArray    = $subCategoryArray[$data['makerId']][$data['category']];
}
else
    $data['dispFlg']             = 1;
//ループ用
/*
if( $_POST )
{
    if( $_POST['makerId'] ) $data['makerId'] = $_POST['makerId'];

    $setCategoryArray        = $makerArray['category'][$_POST['makerId']];
    $setSubCategoryArray     = $subCategoryArray[$_POST['makerId']][$_POST['category']];
}
*/


//確認用画像のカスがあった場合の削除
if( !$_POST ) unset( $_SESSION[FILE_SESSION_KEY] );


//フォーム作成
$form = new HTML_QuickForm( 'item', 'post' );
//print_r($data);

//カテゴリ
foreach( (array)$productCategoryArray AS $key => $value )
    foreach( (array)$categoryArray[$key] AS $skey => $svalue )
        $form->addElement( 'advcheckbox', 'subCategory[' . $skey . ']',         ' ' . $svalue,  ' ' . $svalue,  array( 0, 1, 'class' => 'smallCheckBox' ) );
$form->addElement( 'text',        'subCategoryError', '絞り込みカテゴリエラー用',  array( 'style' => 'width:100%;' ) );
$form->addElement( 'text',        'subName',          'ブランド名',                array( 'style' => 'width:100%;' ) );
$form->addElement( 'text',        'name',             '製品名',                    array( 'style' => 'width:100%;' ) );
$form->addElement( 'text',        'subTitle',         '商品名',                    array( 'style' => 'width:100%;' ) );
$form->addElement( 'text',        'dlfileName',       'ダウンロードファイル名',    array( 'style' => 'width:100%;' ) );
$form->addElement( 'textarea',    'subComment',       '商品名',                    array( 'style' => 'width:100%;' ) );
$form->addElement( 'text',        'commentTitle',     '特徴用タイトル',            array( 'style' => 'width:100%;' ) );
$form->addElement( 'textarea',    'comment',          '特徴',                      array( 'id' => 'comment', 'class' => '', 'style' => 'width:100%;height:120px;' ) );
$form->addElement( 'text',        'otherTitle',       'その他用タイトル1',         array( 'style' => 'width:100%;' ) );
$form->addElement( 'textarea',    'otherComment',     'その他1',                   array( 'id' => 'comment', 'class' => '', 'style' => 'width:100%;height:120px;' ) );
$form->addElement( 'text',        'otherTitle2',      'その他用タイトル2',         array( 'style' => 'width:100%;' ) );
$form->addElement( 'textarea',    'otherComment2',    'その他2',                   array( 'id' => 'comment', 'class' => '', 'style' => 'width:100%;height:120px;' ) );

$searchArray['unId'] = $_REQUEST['id'];
$productArray = $query->DataList( 0, 1000, $searchArray );
foreach( (array)$productArray AS $key => $value )
    $relatedGrp[] = $form->createElement( 'advcheckbox', $value['id'], null, ' ' . $value['name'], array() );
$form->addGroup( $relatedGrp, 'related', '関連製品', array( ' 　' ) );

/*
$form->addElement( 'text',        'modelNumber',   '型番',                array( 'style' => 'width:60%;' ) 

$form->addElement( 'select',      'makerId',       'メーカー',            $makerArray['maker'], array( 'onchange' => 'changeCategory( this.value, \'item\' )' ) );
$form->addElement( 'select',      'subCategory',   'サブカテゴリ',        $setSubCategoryArray, array() );



$form->addElement( 'advcheckbox', 'shippingFlg',      '送料込み',  ' 送料込み',  array( 0, 1 ) );


$form->addElement( 'text',        'priceMinimum',     '下限表示価格',      array( 'style' => 'width:25%;' ) );
$form->addElement( 'textarea',    'explanation',      '商品説明文',        array( 'style' => 'width:100%;height:120px;' ) );
*/
//画像
for( $i = 1; $i <= $maxImageCnt; $i++ )
{
    $form->addElement( 'file', $i, '画像' );
    if( ( $data['image'][$i]['fileName'] || $_POST['fileName'][$i] ) && $i != 1 )
        $form->addElement( 'advcheckbox', 'imageDel[' . $i . ']',  null,  '画像を削除する', array( 0, 1 ) );
}

$form->addElement( 'advcheckbox', 'dispFlg',         '公開する',  ' 公開する',  array( 0, 1 ) );


/*
$form->addElement( 'date',        'dateTime',        '日時',            dateOptionsArray() );
$form->addElement( 'select',      'part',            '部位',            $partArray, array() );
*/

if( $_REQUEST['id'] ) $form->addElement( 'hidden',  'id',     $_REQUEST['id'] );

$form->addElement( 'submit',    'submitConf',    '確認',     array( 'class'   => 'submits' ) );
$form->addElement( 'submit',    'submitReg',     '更新',     array( 'class'   => 'submits' ) );
$form->addElement( 'submit',    'submitReturn',  '戻る',     array( 'class'   => 'submits' ) );
//$form->addElement( 'button',    'kindAddBtn',    '＋',       array( 'onclick' => "kindAdd( '#kindBox1', '#kindroot', 'kindBox' )" ) );

//$form->addElement( 'reset',     'reset',         'リセット', array( 'class' => 'submits' ) );

$form->applyFilter( '__ALL__', 'trim' );

//エラー処理
$form->addRule( 'subName',        'ブランド名を入力してください。',                 'required', null );
$form->addRule( 'name',           '製品名を入力してください。',                     'required', null );
//$form->addRule( 'subName',        'ブランド名を入力してください。',                 'required', null );


//$form->addRule( 'category',       'カテゴリを選択してください。',                                       'nonzero',  null );
//$form->addRule( 'subCategory',    'サブカテゴリを選択してください。',                                   'nonzero',  null );
//$form->addRule( 'name',           '商品名を入力してください。',                                         'required', null );
//$form->addRule( 'sizeWidth',      'サイズ幅のエラーです。幅は半角数字のみで入力してください。',         'numeric',  null );
//$form->addRule( 'sizeHeight',     'サイズ高さのエラーです。高さは半角数字のみで入力してください。',     'numeric',  null );
//$form->addRule( 'sizeDepth',      'サイズ奥行きのエラーです。奥行きは半角数字のみで入力してください。', 'numeric',  null );



//$form->addRule( 'use',      '用途を選択してください。',         'nonzero',  null );


for( $i = 1; $i <= $maxImageCnt; $i++ )
{
    $form->addRule( $i, '★『jpg』『gif』『png』ファイルしかアップできません。', 'mimetype', array( 'image/x-png', 'image/png', 'image/jpeg', 'image/pjpeg', 'image/jpg', 'image/gif' ) );
}

//仮ファイルをフォルダにアップ
$fileFlg = fileTempUpload( $_FILES, './temp/'/*$tempPath*/, '../upImage/'/*$uploadPath*/, $maxWidth, $maxHeight, 200/*$smallWidth*/, 200/*$smallHeight*/ );


//エラー追加処理
if( $_POST['submitConf'] )
{
    if( @array_sum( $_POST['subCategory'] ) == 0 )
        $form->_errors['subCategoryError'] = '絞込み用カテゴリを選択してください。';

    if( !$_REQUEST['id'] && !$_SESSION[FILE_SESSION_KEY][1] )
        $form->_errors['1'] = '詳細画像1は必須です。';
    else if( $_REQUEST['id'] && !$data['image'][1]['fileName'] && !$_SESSION[FILE_SESSION_KEY][1] )
        $form->_errors['1'] = '詳細画像1は必須です。';

    //if( !$_POST['comment'] ) $form->_errors['comment'] = '内容を入力してください。';
    //if( !$_POST['dateTime']['Y'] || !$_POST['dateTime']['m'] || !$_POST['dateTime']['d'] || $_POST['dateTime']['H'] === '' || $_POST['dateTime']['i'] === '' )
    //    $form->_errors['dateTime'] = '登録日を選択してください。';
}

$form->setRequiredNote( '<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;">の項目は必ず入力してください。</span>' );
$form->setJsWarnings( '*の項目は必ず入力してください。', "\n\n" . TITLE );

$form->setDefaults( $data );



if ( $form->validate() )
{
    //確認
    if( isset( $_POST['submitConf'] ) )
    {
        $form->freeze();

        $flg++;
    }

    //登録処理
    if( isset( $_POST['submitReg'] ) )
    {
        //画像処理
        $fileArray = fileUpload( $_POST, $data, $maxImageCnt );

        $_POST['dateTime'] = date( 'Y-m-d H:i:s' );

        //DB登録修正処理
        $saveParam = array(
            'tableName'     => SQL_TABLE_NAME, 
            'data'          => $_POST, 
            'anData'        => array( 'submitConf', 'submitReg', 'submitReturn', 'reset', 'id', 'MAX_FILE_SIZE', 'imageDel', 'fileName' ), 
            'connectionKey' => array( 'subCategory', 'related' ), 
            'timeKey'       => array(), 
            'dateKey'       => array(), 
            'dateTimeKey'   => array( ), 
            'fileArray'     => /*$fileArray*/array(), 
            'fileAnData'    => array( /*'imageDel', 'pictureOutsideFlg'*/ ), 
            'lastFlg'       => 1, 
            'id'            => $_POST['id'], 
            'idName'        => 'id', 
            'limitFlg'      => 1, 
        );

        $save = new CreatQueryDB();
        $save->_setParam( $saveParam );
        $id = $save->Save();

        //画像登録
        $save->_setTableName( SQL_TABLE_NAME . '_img' );
        $save->resetLastFlg();
        $save->_setAnData( array( 'pictureOutsideFlg', 'imageDel' ) );
        $save->resetConnection();

        foreach( (array)$fileArray AS $key => $value )
        {
            $value['priority']    = $key;
            $value['id']          = $id;
            $saveImgParam['data'] = $value;
            $save->_setData( $saveImgParam['data'] );

            if( $_POST['imageDel'][$key] )
            {
                $save->Delete( array( 'id' => $id, 'priority' => $key ) );
            }
            else
            {
                $upDateFlg = $save->DataCheck( array( 'id' => $id, 'priority' => $key ), 'fileName' );
                if( $upDateFlg ) $save->UpDate();
                else             $save->Insert();
            }
        }

        // $save->queryObj->DisConnect();



        //systemContentsDB::KindSave( $_POST['kind'], $_POST['stockNumber'], $id );
        unset( $_SESSION[FILE_SESSION_KEY] );

        tempFileClean();

        header( 'Location: ./' . FILE_CATEGORY . 'List.php?r=1' );
        die;
    }
}

$smarty = new Smarty;

$renderer = new HTML_QuickForm_Renderer_ArraySmarty( $smarty );
$form->accept( $renderer );
$smarty->assign( 'form', $renderer->toArray() );

$smarty->assign( 'flg',                  $flg );
$smarty->assign( 'data',                 $data );
$smarty->assign( 'hiddenValue',          $hiddenValue );
$smarty->assign( 'confComment',          $confComment );
$smarty->assign( 'hiddenOtherValue',     $hiddenOtherValue );
$smarty->assign( 'confOtherComment',     $confOtherComment );
$smarty->assign( 'hiddenOtherValue2',    $hiddenOtherValue2 );
$smarty->assign( 'confOtherComment2',    $confOtherComment2 );
$smarty->assign( 'fileFlg',              $fileFlg );
$smarty->assign( 'fileName',             $fileName );
$smarty->assign( 'image',                $data['image'] );
$smarty->assign( 'maxWidth',             $maxWidth );
$smarty->assign( 'maxHeight',            $maxHeight );
$smarty->assign( 'maxImageCnt',          $maxImageCnt );
$smarty->assign( 'imageTitle',           $imageTitle );
$smarty->assign( 'prtJson',              $prtJson );
$smarty->assign( 'productCategoryArray', $productCategoryArray );
$smarty->assign( 'categoryArray',        $categoryArray);


$smarty->display( THE_FILE_NAME . '.html' );
?>
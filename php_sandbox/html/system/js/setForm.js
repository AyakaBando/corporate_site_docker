//削除ボタン項目1個のとき非表示複数の場合表示処理
$(document).ready(function()
{
    if( $( '.kindBox' ).length >= 2 )$( '.closeBtnMini' ).css( { 'display':'inline-block' } );
    if( $( '.kindBox' ).length == 1 )$( '.closeBtnMini' ).css( { 'display':'none' } );
});


//カテゴリ切り替え
/*
var prtJsonはヘッダー記述
*/
function changeCategory( num, formelem )
{
    var categoryLen  = document[formelem].category.options.length;


    for ( i = categoryLen - 1; i >= 0; i-- )
        document[formelem].category.options[i] = null;

    if( document[formelem].subCategory )
    {
        var subCategoryLen = document[formelem].subCategory.options.length;

        for ( i = subCategoryLen - 1; i >= 0; i-- )
            document[formelem].subCategory.options[i] = null;
    }

    i = 0;
    if( prtJson[num] )
    {
        $.each( prtJson[num], function( key, value )
        {
            document[formelem].category.options[i] = new Option( value, key );
            i++;
        });
        document[formelem].category.disabled = false;

        //サブカテゴリある場合処理
        if( document[formelem].subCategory )
        {

            document[formelem].subCategory.options[0] = new Option( 'カテゴリを選択してください。', 0 );
            document[formelem].subCategory.disabled   = true;
        }

        if( document[formelem].creg )
            document[formelem].creg.disabled = false;
    }
    else
    {
        if( num == 0 )
            document[formelem].category.options[0] = new Option( 'メーカーを選択してください。', 0 );
        else
            document[formelem].category.options[0] = new Option( 'カテゴリが登録されていません。', 0 );

        //サブカテゴリある場合処理
        if( document[formelem].subCategory )
        {

            document[formelem].subCategory.options[0] = new Option( '　　　', 0 );
            document[formelem].subCategory.disabled   = true;
        }

        if( document[formelem].creg )
            document[formelem].creg.disabled = true;

        document[formelem].category.disabled = true;
    }
}



//サブカテゴリ切り替え
/*
var prtJson2はヘッダー記述
*/
function changeSubCategory( num, formelem )
{
    var makerId         = $( '[name=makerId]' ).val();
    var subCategoryLen  = document[formelem].subCategory.options.length;

    //選択可能商品読み込みボタン設定
    if( num != 0 && num != 5 )
        document[formelem].selectItemLoadBtn.disabled = false;
    if( num == 5 || num == 0 )
        document[formelem].selectItemLoadBtn.disabled = true;

    for ( i = subCategoryLen - 1; i >= 0; i-- )
        document[formelem].subCategory.options[i] = null;

    i = 0;
    if( !prtJson2[makerId] )
    {
        document[formelem].subCategory.options[0] = new Option( 'サブカテゴリが登録されていません。', 0 );
        document[formelem].subCategory.disabled = true;
        if( document[formelem].creg )document[formelem].creg.disabled = true;
        return;
    }
    if( prtJson2[makerId][num] )
    {
        $.each( prtJson2[makerId][num], function( key, value )
        {
            document[formelem].subCategory.options[i] = new Option( value, key );
            i++;
        });
        document[formelem].subCategory.disabled = false;
        if( document[formelem].creg )document[formelem].creg.disabled = false;
    }
    else
    {
        document[formelem].subCategory.options[0] = new Option( 'サブカテゴリが登録されていません。', 0 );
        document[formelem].subCategory.disabled = true;
        if( document[formelem].creg )document[formelem].creg.disabled = true;
    }

}

//要素コピーボタン
/*
var partJsonはヘッダー記述
@param baseElement string //コピー元の要素
@param addElement string //コピー先の要素
@param copyId string //コピーした要素のCSS ID
*/
function branchAdd( baseElement, addElement, copyId )
{
    //ボタン操作不可
    document.item.branchAddBtn.disabled = true;

    var cnt = $( '.branchBox' ).length + 1;
    var attrId = copyId + cnt;

    //'baseElement'をコピーしてID変更後'addElement'の最後に追加
    $( baseElement ).clone( true ).attr( 'id', attrId ).appendTo( addElement );

    //各フォームの入力をリセット[項目により変更アナログ]
    //$( '#' + attrId ).children( 'select' ).val( 0 );
    $( '#' + attrId ).children( 'td' ).children( 'input' ).val( '' );


    //コピー要素内のフォーム属性調整[項目により変更アナログ]
    var i = 1;
    var j = 0;
    $( '.branchBox' ).each( function()
    {
        $( '.branchNumberClass' ).eq(j).attr({ 'name': 'branchNumber[' + i + ']' });
        $( '.branchStandard1Class' ).eq(j).attr({ 'name': 'branchStandard1[' + i + ']' });
        $( '.branchStandard2Class' ).eq(j).attr({ 'name': 'branchStandard2[' + i + ']' });
        $( '.branchPriceClass' ).eq(j).attr({ 'name': 'branchPrice[' + i + ']' });
        $( '.branchSellingPriceClass' ).eq(j).attr({ 'name': 'branchSellingPrice[' + i + ']' });
        //$( this ).next().attr({ 'name': 'stockNumber[' + i + ']' });
        i++;
        j++;
    });
/*
branchNumber
branchStandard1
branchStandard2
branchPrice
branchSellingPrice
*/
    document.item.branchAddBtn.disabled = false;
    //要素が2個以上ある場合は削除ボタンを表示
    if( $( '.branchBox' ).length >= 2 )$( '.closeBtnMini' ).css( { 'display':'inline-block' } );
}





//選択可能エリア調整
function setSelectBox( num )
{
	/*
	selectBox1  選択可能張地ランク
	selectBox2  選択可能木目タイプ（木製椅子）
	selectBox3  選択可能天板カラー（天板）
	selectBox4  選択可能台輪カラー（台輪）
	selectBox5  選択可能台輪タイプ（台輪）
	selectBox6  選択可能台輪（ベンチソファ）
	selectBox7  選択可能脚タイプ（天板）
	selectBox8  選択可能天板タイプ（テーブル脚）
	selectBox9  KIDSフロアマットカスタム
	selectBox10 KIDS交通マット等カスタム
	selectBox11 KIDS張地パーツ
	*/
    $( '.selectBox' ).css( { 'display':'none' } );
    switch( num )
    {
        case 1: case '1':
            $( '#selectBox1' ).css( { 'display':'table-row' } );
            $( '#selectBox2' ).css( { 'display':'table-row' } );
            break;
        case 2: case '2':
            $( '#selectBox1' ).css( { 'display':'table-row' } );
            break;
        case 3: case '3':
            $( '#selectBox1' ).css( { 'display':'table-row' } );
            $( '#selectBox6' ).css( { 'display':'table-row' } );
            break;
        case 4: case '4':
            $( '#selectBox4' ).css( { 'display':'table-row' } );
            $( '#selectBox5' ).css( { 'display':'table-row' } );
            break;
        case 5: case '5':
            break;
        case 6: case '6':
            $( '#selectBox3' ).css( { 'display':'table-row' } );
            $( '#selectBox7' ).css( { 'display':'table-row' } );
            break;
        case 7: case '7':
            $( '#selectBox8' ).css( { 'display':'table-row' } );
            
            break;
        case 8: case '8':
            $( '#selectBox9' ).css( { 'display':'table-row' } );
            $( '#selectBox10' ).css( { 'display':'table-row' } );
            $( '#selectBox11' ).css( { 'display':'table-row' } );
            $( '#selectBox12' ).css( { 'display':'table-row' } );
            break;
        case 9: case '9':
            $( '#selectBox9' ).css( { 'display':'table-row' } );
            $( '#selectBox10' ).css( { 'display':'table-row' } );
            $( '#selectBox11' ).css( { 'display':'table-row' } );
            break;
        default: break;
    }

}


function loadSelect()
{
    document.item.selectItemLoadBtn.disabled = true;
    var categoryArray = [];
    var makerId  = $( '[name=makerId]' ).val();
    var category = $( '[name=category]' ).val();

    if( !makerId )
    {
        alert( 'メーカーを選択してください。' );
        return;
    }

    if( !category )
    {
        alert( 'カテゴリを選択してください。' );
        return;
    }

    var id = ( $( '[name=id]' ).val() ) ? $( '[name=id]' ).val() : '';

    switch( category )
    {
        case '1':
            categoryArray = [1,2];
            setMakerCustum( 1, id, makerId );
            setMakerCustum( 2, id, makerId );
            break;
        case '2':
            categoryArray = [1];
            setMakerCustum( 1, id, makerId );
            break;
        case '3':
            categoryArray = [1,6];
            setMakerCustum( 1, id, makerId );
            setMakerCustum( 6, id, makerId );
            break;
        case '4':
            categoryArray = [4,5];
            setMakerCustum( 4, id, makerId );
            setMakerCustum( 5, id, makerId );
            break;
        case '5':
            break;
        case '6':
            categoryArray = [3,7];
            setMakerCustum( 3, id, makerId );
            setMakerCustum( 7, id, makerId );
            break;
        case '7':
            categoryArray = [8];
            setMakerCustum( 8, id, makerId );
            break;
        case '8':
            categoryArray = [9,10,11,12];
            setMakerCustum( 9, id, makerId );
            setMakerCustum( 10, id, makerId );
            setMakerCustum( 11, id, makerId );
            setMakerCustum( 12, id, makerId );
            break;
/*
        case '9':
            categoryArray = [9,10,11,12];
            setMakerCustum( 9, id, makerId );
            setMakerCustum( 10, id, makerId );
            setMakerCustum( 11, id, makerId );
            setMakerCustum( 12, id, makerId );
            break;
*/
        default: break;
    }

}

function setMakerCustum( num, id, makerId )
{
    $.ajax({
        timeout       : 5000, 
        scriptCharset : 'utf-8', 
        type          : "GET", 
        url           : './formPut.php', 
        dataType      : 'text',
        data          : { 'category' : num, 'id' : id, 'makerId' : makerId },
        success       : function( text )
        {
            //alert( catNum + '||' + categoryArray[catNum]);
            document.getElementById( 'other' + num ).innerHTML = text;
            //if( !text )
            //    document.getElementById( 'other' + num ).innerHTML = "商品が登録されていません。";
                //alert( "製品が登録されていません。" );

            //if( text = '' )
            //    document.getElementById( 'other' + categoryArray[catNum] ).innerHTML = "製品が登録されていません。";
            document.item.selectItemLoadBtn.disabled = false;
        },
        error: function( obj, status, errThrown )
        {
            alert( "データの取得に失敗しました。\r\nもう一度読み込みボタンを押してください。" );
            document.item.selectItemLoadBtn.disabled = false;
        }
    });
}


/*
function kindAdd()
{
    //ボタン操作不可
    document.item.kindAddBtn.disabled = true;

    var cnt = $( '.kindBox' ).length + 1;
    var attrId = 'kindBox' + cnt;

    //'#kindBox1'をコピーしてID変更後#kindrootの最後に追加
    $( '#kindBox1' ).clone( true ).attr( 'id', attrId ).appendTo( "#kindroot" );

    //セレクトの値をリセット[項目により変更アナログ]
    $( '#' + attrId ).children( 'select' ).val( 0 );
    $( '#' + attrId ).children( 'input' ).val( '' );


    //コピー要素内のフォーム属性調整[項目により変更アナログ]
    var i = 1;
    $( '.kindClass' ).each( function()
    {
        $( this ).attr({ 'name': 'kind[' + i + ']' });
        $( this ).next().attr({ 'name': 'stockNumber[' + i + ']' });
        i++;
    });


    document.item.kindAddBtn.disabled = false;
    if( $( '.kindBox' ).length >= 2 )$( '.closeBtnMini' ).css( { 'display':'inline-block' } );
}
*/


//削除処理
function delBox( thisObj )
{
    $( thisObj ).parent().remove();

    var i = 1;
    var j = 0;
    $( '.branchBox' ).each( function()
    {
        $( '.branchNumberClass' ).eq(j).attr({ 'name': 'branchNumber[' + i + ']' });
        $( '.branchStandard1Class' ).eq(j).attr({ 'name': 'branchStandard1[' + i + ']' });
        $( '.branchStandard2Class' ).eq(j).attr({ 'name': 'branchStandard2[' + i + ']' });
        $( '.branchPriceClass' ).eq(j).attr({ 'name': 'branchPrice[' + i + ']' });
        $( '.branchSellingPriceClass' ).eq(j).attr({ 'name': 'branchSellingPrice[' + i + ']' });
        i++;
        j++;
    });

    if( $( '.kindBox' ).length == 1 )$( '.closeBtnMini' ).css( { 'display':'none' } );
}


/*
 *@チェックボックス一括チェック
 *@param flg          boolean チェックするかはずすか
 *@param formName     string  formのname属性
 *@param selectorname string  eachするセレクター
 *@return void
*/
function allChk( flg, formName, selectorName )
{
    $( selectorName ).each( function()
    {
        $( this ).attr( 'checked', flg );
    });
}


// 確認ウィンドウを表示する
function optChk( mode )
{
    var flg   = 0;
    var title = '';
    $( '.opt' ).each( function()
    {
        if( $( this ).prop( 'checked' ) )
        {
             flg++;
             //break;
        }
    });
    if( flg == 0 )
    {
        alert( '操作する対象を、ひとつ以上選択してください。' );
        return false;
    }
    if( mode == 1 )
        title = '全て表示しても';
    if( mode == 2 )
        title = '全て非表示にしても';
    if( mode == 3 )
        title = '全て削除しても';

    if( confirm( '選択した製品を' + title + "よろしいですか？" ) )
    {
        optSave( '.opt', mode );
    }
    return false;
}


//POSTボタン
function optSave( elem, mode )
{
    var submitName;
    $( elem ).each( function()
    {
        var id = ( $( this ).prop( 'checked' ) ) ? $( this ).data( 'idnum' ) : null;
        $( '#optSubmit' ).append( '<input type="hidden" name="id[]" value="' + id + '" />' );
    });
    if( mode == 1 )submitName = 'alldisp';
    if( mode == 2 )submitName = 'allundisp';
    if( mode == 3 )submitName = 'allundell';
    if( submitName )( '#optSubmit' ).append( '<input type="hidden" name="' + submitName + '" value="' + id + '" />' );

}
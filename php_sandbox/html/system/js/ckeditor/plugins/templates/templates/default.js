/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

var url  = "/system/js/ckeditor/templates/";

//alert(url);

//loadDataでテンプレートファイルを取得して変数に代入します。
//ファイル名は適宜変更してください。
//テンプレートを追加する場合はここにファイル名を追加してください。
var tpl1  = loadData( url + "t1.html" );//フロート写真左
var tpl2  = loadData( url + "t2.html" );//フロート写真右
var tpl3  = loadData( url + "t3.html" );//写真1枚
var tpl4  = loadData( url + "t4.html" );//写真2枚
var tpl5  = loadData( url + "t5.html" );//写真3枚
var tpl6  = loadData( url + "t6.html" );//枠あり2つ
var tpl7  = loadData( url + "t7.html" );//枠あり3つ
var tpl8  = loadData( url + "t8.html" );//枠あり3つ


//Ajax同期通信で外部テンプレートを読み込んでデータを返します。
function loadData( url )
{
    //XMLHttpRequestオブジェクト初期化
    var getData = new XMLHttpRequest();
    //同期通信リクエスト作成
    getData.open( "GET", url, false );
    //リクエスト送信
    getData.send( null );
    //レスポンスデータを取得して値を返す
    return( getData.responseText );
}



CKEDITOR.addTemplates('default', 
{
    imagesPath : CKEDITOR.getUrl(CKEDITOR.plugins.getPath('templates') + 'templates/images/'), templates : [
    {
        title : 'フロート写真左', 
        image : '', 
        description : '', 
        html : tpl1
    },

    {
        title : 'フロート写真右', 
        image : '', 
        description : '', 
        html : tpl2
    },

    {
        title : '写真1枚', 
        image : '', 
        description : '', 
        html : tpl3
    },

    {
        title : '写真2枚', 
        image : '', 
        description : '', 
        html : tpl4
    },

    {
        title : '写真3枚', 
        image : '', 
        description : '', 
        html : tpl5
    },

    {
        title : '枠あり2つ', 
        image : '', 
        description : '', 
        html : tpl6
    },

    {
        title : '枠あり3つ', 
        image : '', 
        description : '', 
        html : tpl7
    },

    {
        title : '仕様テーブル', 
        image : '', 
        description : '', 
        html : tpl8
    }]
});
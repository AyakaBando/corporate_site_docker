/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
// Define changes to default configuration here. For example:
	config.language = 'ja';
	
//	config.width = '600px'; //横幅
//    config.height = '300px'; //高さ
//	config.resize_enabled = false;
	config.uiColor = '#D5DEEB';
	
//    config.uiColor = '#AAC6EF';//ツールバーのカラー。
//    config.enterMode = CKEDITOR.ENTER_BR;//改行タグを<p>タグから<br />タグに変更
//    config.skin = 'office2003';//スキンを変更。'kama'、'office2003'、'v2' の3つから選択。	
//	config.toolbarStartupExpanded = false;
//	config.tabSpaces = 4;
	//スキンの変更['kama', 'office2003', v2]
	
	//エディターのスペルチェック機能sOFFにする
//	config.scayt_autoStartup = false;
	//ツールバー
	config.toolbar = [
	['Source','Preview'] 
	/*,['Cut','Copy','Paste'] */
	,['Bold',/*'Italic',*/'Underline','Strike'] 
	,['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] 
	,['Link'/*,'Unlink'*/,'Anchor'] 
	,[/*'Image',*/'Table'] 
	,['Format','Font','FontSize'] 
	,['TextColor','BGColor'] 
	];
	
	CKEDITOR.config.font_names='ＭＳ Ｐゴシック;ＭＳ Ｐ明朝;ＭＳ ゴシック;ＭＳ 明朝;Arial/Arial, Helvetica, sans-serif;Comic Sans MS/Comic Sans MS, cursive;Courier New/Courier New, Courier, monospace;Georgia/Georgia, serif;Lucida Sans Unicode/Lucida Sans Unicode, Lucida Grande, sans-serif;Tahoma/Tahoma, Geneva, sans-serif;Times New Roman/Times New Roman, Times, serif;Trebuchet MS/Trebuchet MS, Helvetica, sans-serif;Verdana/Verdana, Geneva, sans-serif';
	//フォーマット
//	CKEDITOR.config.format_tags = 'p;h3;h4' ;
//	config.format_h3 = { element : 'h3', attributes : { 'class' : 'ts2' } };
//	config.format_h4 = { element : 'h4', attributes : { 'class' : 'ts1' } };
/*
	config.filebrowserBrowseUrl = './js/kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl = './js/kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl = './js/kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl = './js/kcfinder/upload.php?type=files';
	config.filebrowserImageUploadUrl = './js/kcfinder/upload.php?type=images';
	config.filebrowserFlashUploadUrl = './js/kcfinder/upload.php?type=flash';
*/

	CKEDITOR.on('instanceReady', function(ev) {
    ev.editor.dataProcessor.writer.indentationChars = '';
    // 処理対象タグ
    var tags = ['div',
                'h1','h2','h3','h4','h5','h6',
                'p',
                'ul','ol','li','dl','dt','dd',
                'table','thead','tbody','tfoot','tr','th','td',
                'pre', 'address'];
    
    for (var key in tags) {
        ev.editor.dataProcessor.writer.setRules(tags[key], {
            breakAfterOpen : false
        });
    }		
	});	
};




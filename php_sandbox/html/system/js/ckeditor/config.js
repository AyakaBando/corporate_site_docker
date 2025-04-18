/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'ja';
	// config.uiColor = '#AADC6E';
	config.uiColor = '#D5DEEB';
	
/** ALL **/
/*	CKEDITOR.config.toolbar = [
['Source','-','Save','NewPage','Preview','-','Templates']
,['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print','SpellChecker']
,['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat']
,['Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField']
,'/'
,['Bold','Italic','Underline','Strike','-','Subscript','Superscript']
,['NumberedList','BulletedList','-','Outdent','Indent','Blockquote']
,['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock']
,['Link','Unlink','Anchor']
,['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak']
,'/'
,['Styles','Format','Font','FontSize']
,['TextColor','BGColor']
,['ShowBlocks']
];	*/
	CKEDITOR.config.toolbar = [
	['Source','Preview','Templates'] 
	,['Cut','Copy','Paste','PasteText','PasteFromWord'] 
	,['Bold',/*'Italic',*/'Underline','Strike'] 
	,['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] 
	,['Link','Unlink','Anchor'] 
	,['Image','Table'] 
	,[/*'Styles','Format','Font',*/'FontSize'] 
	,['TextColor','BGColor'] 
	];

	CKEDITOR.config.format_tags = 'h3;h4;h5;h6' ;

	//config.format_talbe = { element : 'table', attributes : { 'class' : 'normaltable' } };
	//config.format_h3 = { name : 'タイトル1', element : 'h3', attributes : { 'class' : 'hStyle02' } };
	//config.format_h3_1 = { name : 'タイトル1', element : 'h3', attributes : { 'class' : 'hStyle02' } };
	//config.format_h3_2 = { name : 'タイトル2', element : 'h3', attributes : { 'class' : 'hStyle03' } };
	//config.format_h3_3 = { name : 'タイトル3', element : 'h3', attributes : { 'class' : 'hStyle04' } };

	CKEDITOR.config.font_names='ＭＳ Ｐゴシック;ＭＳ Ｐ明朝;ＭＳ ゴシック;ＭＳ 明朝;Arial/Arial, Helvetica, sans-serif;Comic Sans MS/Comic Sans MS, cursive;Courier New/Courier New, Courier, monospace;Georgia/Georgia, serif;Lucida Sans Unicode/Lucida Sans Unicode, Lucida Grande, sans-serif;Tahoma/Tahoma, Geneva, sans-serif;Times New Roman/Times New Roman, Times, serif;Trebuchet MS/Trebuchet MS, Helvetica, sans-serif;Verdana/Verdana, Geneva, sans-serif';
	// タグのフィルタリングを無効にして任意の記述を許す
	config.allowedContent = true;
	config.templates_replaceContent = false;
	//Enterキー押下時のタグ
	CKEDITOR.config.enterMode = CKEDITOR.ENTER_P;
	
	//Shift+Enter押下時のタグ
	//CKEDITOR.config.shiftEnterMode = CKEDITOR.ENTER_BR;

	config.filebrowserBrowseUrl = '/system/js/kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl = '/system/js/kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl = '/system/js/kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl = '/system/js/kcfinder/upload.php?type=files';
	config.filebrowserImageUploadUrl = '/system/js/kcfinder/upload.php?type=images';
	config.filebrowserFlashUploadUrl = '/system/js/kcfinder/upload.php?type=flash';


	CKEDITOR.on('instanceReady', function(ev) {
    ev.editor.dataProcessor.writer.indentationChars = '';
    // 処理対象タグ
    var tags = ['div', 'h3', /*'h4', 'h5', 'address', */'pre'];
    
    for (var key in tags) {
        ev.editor.dataProcessor.writer.setRules(tags[key], {
            breakAfterOpen : false
        });
    }		
	});
	

};

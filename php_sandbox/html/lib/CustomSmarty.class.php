<?php
require_once( SMARTY_ROOT . '/Smarty.class.php' );
/*
* CustomSmarty は、 gdCMS の CustomSmarty とは異なる Smarty の設定ラッパークラスです
*
*/

class CustomSmarty
{
	var $smarty;

    function & CustomSmarty($module_name = "etc", $templete_dir)
    {
		// 生成ファイルの置き場所はモジュール別に
		$compile_dir = $_SERVER{"DOCUMENT_ROOT"} . '/gdCMS/webapp/Smarty_tmp_area/compile' . "/$module_name/";
		$cache_dir = $_SERVER{"DOCUMENT_ROOT"} . '/gdCMS/webapp/Smarty_tmp_area/cache' . "/$module_name/";
		
		$this->smarty = new Smarty();
		
		/* Smartyパラメータ設定 */
		// 設定用パラメータ配列
		$params = 
			array
			(
				'caching'        => false,
				'cache_lifetime' => 60,
				'cache_dir'      => $cache_dir,
				'force_compile'  => false,
				'template_dir'   => $templete_dir,
				'compile_dir'    => $compile_dir,
				/*'config_dir'     => WEBAPP_DIR . $module_name . '/config/',*/
				'debug_tpl'      => SMARTY_ROOT . '/debug.tpl',
				'debugging_ctrl' => 'NONE',
				'debugging'      => false
			);
		foreach ( $params AS $key => $value ) $this->smarty->$key = $value;
		
		// smartyの修飾子を拡張
		$this->smarty->register_modifier("number_format","number_format");

		// smartyのカスタムタグ[htmlescape]に対してのescapeしないタグの指定
		$this->smarty->assign( "permits_tag", array("img","a","strong","i","u","span","p") );
    }

	function assign ( $key, $value )
	{
		$this->smarty->assign( $key, $value );
	}

	function display ( $templateFilename )
	{
		$this->smarty->clear_all_cache();
		$this->smarty->display( $templateFilename );
	}
	
	function register_object( $key, &$value )
	{
		// オブジェクトを登録
		$this->smarty->register_object( $key, $value );
	}

	function assign_by_ref( $key, &$value )
	{
		// オブジェクトの参照をアサイン
		$this->smarty->assign_by_ref( $key, $value );
	}
	
	function fetch( $templateFileName )
	{
		$fetch_data = $this->smarty->fetch( $templateFileName );

		return $fetch_data;
	}
}
?>
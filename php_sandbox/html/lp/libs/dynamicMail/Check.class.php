<?php
set_include_path( get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']);
$baseDir = realpath(dirname(__FILE__)."/../");
require_once( $baseDir."/dynamicMail/Error.class.php" );

class Check{
	var $element;
	var $error;

	function Check( $formElement )
	{
		$this->element = $formElement;
	}

	function execute()
	{
		if( ! $this->element->check && ! $this->element->indispensable ) return true;

		$indispensable = $this->element->indispensable;
		$value = $this->element->value;
		$min = $this->element->strMin;
		$limit = $this->element->strLimit;
		$writable = $this->checkWrite( $value );
		$checkType = $this->element->checkType;

		if(! $writable && $indispensable && $checkType != "SELECTED" && $checkType != "CHECKED")
		{

			$this->error = new Error($this->element->title . "が記入されていません", $this->element->title . " is empty.");
			return false;
		}
		if(! $indispensable && ! $writable)
		{
			return true;
		}

		switch( $checkType )
		{
			// 半角数字
			case "HS":
			if(! $this->checkHS( $value ))
			{
				$this->error = new Error($this->element->title . "に半角数字以外の文字が含まれています", "Error " . $this->element->title . " field.");
				return false;
			}
			break;

			// 半角英数
			case "HES":
			if(! $this->checkHES( $value ))
			{
				$this->error = new Error($this->element->title . "に半角英数字以外の文字が含まれています", "Error " . $this->element->title . " field.");
				return false;
			}
			break;

			// 半角英数記号
			case "HESK":
			if(! $this->checkHESK( $value ))
			{
				$this->error = new Error($this->element->title . "に半角英数記号以外の文字が含まれています", "Error " . $this->element->title . " field.");
				return false;
			}
			break;

			// メールアドレス
			case "MAIL":
			if(! $res = $this->checkMail( $value ))
			{
				$this->error = new Error("メールアドレスの書式に誤りがあります", "Error " . $this->element->title . " field.");
				return $res;
			}
			break;

			// URL
			case "URL":
			if(! $res = $this->checkURL( $value ))
			{
				$this->error = new Error("URLの書式に誤りがあります", "Error " . $this->element->title . " field.");
				return $res;
			}
			break;

			// 全角カナ
			case "ZK":
			if(! $res = $this->checkZK( $value ))
			{
				$this->error = new Error($this->element->title . "に全角カナ以外の文字が記入されています", "Error " . $this->element->title . " field.");
				return $res;
			}
			break;

			// 半角カナ
			case "HK":
				if(! $res = $this->checkHK( $value ))
				{
					$this->error = new Error($this->element->title . "に半角カナの文字が記入されています", "Error " . $this->element->title . " field.");
					return $res;
				}
				break;

			case "SELECTED":
			if(empty($value) || $value == "")
			{
				$this->error = new Error($this->element->title . "が選択されていません", "Error " . $this->element->title . " field.");
				return false;
			}
			else
			{
				return true;
			}
			break;

			// デフォルトは、記入チェック,制限チェックのみ
			default:
			return $this->checkLength($value, $min, $limit);
			break;
		}

		// 文字数チェック
		if($this->checkLength($value, $min, $limit))
		{
			return true;
		}else{
			$this->error = new Error($this->element->title . "に文字数制限にエラーがあります", "Error " . $this->element->title . " field.");
			return false;
		}
	}




	/**
	 * 入力チェック
	 */
	function checkWrite( $str )
	{
		return ((!isset($str)) || ($str == "") || empty($str)) ? false : true;
	}

	/**
	 * 文字数制限チェック
	 */
	function checkLength($str, $min, $limit)
	{
		if($limit == 0 || empty($limit))
		{
			return true;
		}
		else
		{
			$strL = strlen( $str );
			if($strL >= $min && $strL <= $limit)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}

	/**
	 * 半角数
	 */
	function checkHS( $str ){
		//if(ereg("^[0-9]+$", $str)){
		return (preg_match("/^[0-9]+$/", $str)) ? true : false;
	}

	/**
	 * 半角英数
	 */
	function checkHES( $str ){
		return (preg_match("/^[a-zA-Z0-9]+$/", $str)) ? true : false;
	}

	/**
	 * 半角英数記号
	 */
	function checkHESK( $str ){
		return (preg_match("/^[a-zA-Z0-9\_\-\+\.\,\@\*\=\&\$\#\!\?]+$/", $str)) ? true : false;
	}

	/**
	 * メール
	 */
	function checkMail( $str ){
		return (preg_match("/^[^@]+@[^.]+\..+/", $str)) ? true : false;
		//(ereg("^[^@]+@[^.]+\..+", $str))
	}

	/**
	 * URL
	 */
	function checkURL( $str ){
		return (preg_match("/^(https?|ftp)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/", $str)) ? true : false;
		//(/^(https?|ftp)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/)
	}

	/**
	* 半角カナ
	*/
	function checkHK( $str )
	{
		if(mb_ereg("[ｱ-ﾝ]", $str)){
			return false;
		}else{
			return true;
		}
	}

	/**
	 * 全角カナ
	 */
	function checkZK( $str )
	{
		if(mb_ereg("^[ァ-ヶー 　]*$", $str)){
			return true;
	    }else{
			return false;
		}
	}

	function checkHanEisu($str){
		//if(ereg("^[\x41-\x5A|\x61-\x7A|\x30-\x39]+$",$str)){ // 半角英数字のみ
		//if(ereg("^[0-9|a-z|A-Z]+$", $str)){
		//if(ereg("[^\x00-\x7F]+$",$str)){ // 全角文字
		//if(!ereg("^(\xA5[\xA1-\xF6]|\xA1\xBC|\xA1\xA6|\xA1\xA1|\x20)+$",$str)){ // 全角カナ
		//if(ereg("^[\xA0-\xDF]+$",$str)){ // 半角カナ
		//if(ereg("^[0-9]+$",$str)){ // 半角数字
		if(!ereg("[\x80-\xff]+",$str)){ // 半角英数記号
			return TRUE;
	    }else{
			return FALSE;
		}
	}




	function replaceZK( $str )
	{
		return $str = mb_convert_kana($str,"CKV","utf8");
	}


}



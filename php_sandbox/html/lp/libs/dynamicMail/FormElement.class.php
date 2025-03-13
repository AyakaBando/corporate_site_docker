<?php

class FormElement{
	// 項目名（表示用としてしか使用されない）
	var $title;
	
	// ユニークなname 各input要素の name 属性となる値
	// メールアドレスについては必ず MAIL にしてください
	var $name;
	
	//array 予め保持しているvalue情報(radio, select, checkboxタイプなど)
	var $values;
	
	// POSTで送信されてきたvalue情報
	var $value;
	
	// text, select, radio...
	var $type;
	
	// 必須か Boolean
	var $indispensable;
	
	// $type = text 時のサイズ
	var $size;
	
	// textarea 時の rows
	var $rows;
	
	// チェックするか Boolean
	var $check;
	
	// チェックタイプ　随時追加せよ
	var $checkType;// "HS", "ZK", "MAIL", "SELECTED", "CHECKED"
	
	// 最小文字数
	var $strMin;
	
	// 文字数リミット
	var $strLimit;
	
	// HTML Boolean
	var $htmlSpecialChars;
	
	// エラークラスインスタンス
	var $error;
	
	function FormElement( $title, $name, $values, $value, $type, $indispensable = false, $size = "10", $rows = "", $check = false, $checkType = "", $strMin = 0, $strLimit = 0, $htmlSpecialChars = false)
	{
		$this->title = $title;
		$this->name = $name;
		$this->values = $values;
		$this->value = $value;
		$this->type = $type;
		$this->indispensable = $indispensable;
		$this->size = $size;
		$this->rows = $rows;
		$this->check = $check;
		$this->checkType = $checkType;
		$this->strMin = $strMin;
		$this->strLimit = $strLimit;
		$this->htmlSpecialChars = $htmlSpecialChars;
	}
}
?>
<?php

class Error{
	//未使用(予約)
	var $code;
	
	//エラーメッセージ
	var $message;
	var $message_en;
	
	function Error( $errorMessage, $errorMessageEn = "" )
	{
		$this->message = $errorMessage;
		$this->message_en = $errorMessageEn;
	}

}



?>
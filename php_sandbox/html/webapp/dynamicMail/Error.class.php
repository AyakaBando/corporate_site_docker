<?php

class Error{
	//未使用(予約)
	var $code;
	
	//エラーメッセージ
	var $message;
	
	function Error( $errorMessage )
	{
		$this->message = $errorMessage;
	}

}



?>
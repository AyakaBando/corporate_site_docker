<?php
/*
error_reporting(E_ALL);
ini_set("display_errors", 1);
*/
set_include_path( get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']);
require_once( "../utils/CustomSmarty.class.php" );
require_once( "../contact/Contact.class.php" );

$contact = new Contact();

$contact->insertValue( $_POST );

$action = ( ! get_magic_quotes_gpc() ) ? $_POST["ACTION"] : stripslashes($_POST["ACTION"]);
$kubun = ( ! get_magic_quotes_gpc() ) ? $_POST["KUBUN"] : stripslashes($_POST["KUBUN"]);


$cs = new CustomSmarty( "Contact", "./tpl/" );


switch($action){
	case "CHECK":
		//入力チェックいらんから削除してそのまま確認画面へ
		// 確認画面
		$cs->assign( "c", $contact );
		$cs->assign( "es", $contact->elements );
		if ($kubun == 1) {
			$templeteFile = "confirm.tpl";
		}else {
			$templeteFile = "confirm2.tpl";
		}

	break;

	case "SEND":
	$cs->assign( "c", $contact );
	$cs->assign( "es", $contact->elements );

	$bodyUser = $cs->fetch( "mailBodyToUser.tpl" );
	$bodyOwner = $cs->fetch( "mailBodyToOwner.tpl" );


	// メール送信 & リロード対策
	if($contact->send( $bodyOwner, $bodyUser ))
	{
		//成功時のURLをダウンロードへ変更。
		Header("Location:../download/");
	}else{
		Header("Location:./error.php");
	}
	exit;
	break;

	default:
	// とりま必要なしなのでTOPへ
	Header("Location:../index.php");

	break;
}

$cs->display($templeteFile);


$contact->destroy();



<?php
/*
*----------------------------------------------------------------------
* DynamicMailForm
* @author	: makoche
* @version	: 1.0.02
* @update	: -
*----------------------------------------------------------------------
*/
require_once( $_SERVER{"DOCUMENT_ROOT"} . "/webapp/dynamicMail/FormElement.class.php" );
require_once( $_SERVER{"DOCUMENT_ROOT"} . "/webapp/dynamicMail/Check.class.php" );

require_once( $_SERVER['DOCUMENT_ROOT'] . "/gdCMS/conf/gd.conf");
require_once( _PATH_gdCMS_ROOT . "gdF/gdF.conf");
require_once( $_SERVER['DOCUMENT_ROOT'] . "/lib/ProductNewsCollection.class.inc");
require_once( $_SERVER['DOCUMENT_ROOT'] . "/lib/PdfDto.class.inc");

mb_language('Japanese');
ini_set("magic_quotes_gpc", 0);
ini_set('mbstring.internal_encoding', 'UTF-8');


class DynamicMailForm{
	var $missionName;
	var $FROM;
	var $TO;
	var $elements;
	var $prefectures;
	var $sendToUser;
	
	function DynamicMailForm($missionName, $from, $to, $sendToUser = true)
	{
		$this->missionName = $missionName;
		$this->FROM = $from;
		$this->TO = $to;
		$this->elements = array();
		$this->prefectures = array("北海道","青森県","秋田県","岩手県","宮城県","山形県","福島県","茨城県","栃木県","群馬県","埼玉県","東京都","千葉県","神奈川県","長野県","山梨県","静岡県","愛知県","岐阜県","三重県","新潟県","富山県","石川県","福井県","滋賀県","京都府","大阪府","兵庫県","奈良県","和歌山県","岡山県","広島県","島根県","鳥取県","徳島県","香川県","愛媛県","高知県","山口県","福岡県","大分県","長崎県","佐賀県","熊本県","宮崎県","鹿児島県","沖縄県");;
		$this->sendToUser = $sendToUser;
	}
	
	function addElement( $element )
	{
		$this->elements[ $element->name ] = $element;
	}
	
	function insertValue( $post )
	{
		foreach($post as $key => $value )
		{
			if($this->elements[$key] || is_array($value))
			{
				if($key != "PDF" && !is_array($value)){
					$l_value = (! get_magic_quotes_gpc ) ? $value : stripslashes( $value );
					$l_value = mb_convert_kana($l_value, 'K');
					$this->elements[$key]->value = ( $this->elements[$key]->htmlSpecialChars ) ? htmlspecialchars( $l_value ) : $l_value;
				}
				else{
					$this->elements[$key]->value = $value;
				}
			}
		}
	}
	
	function checkAllElements()
	{
		// エラー結果を格納する配列
		$resultArray = array();
		foreach($this->elements as $key => $element )
		{
			
			$check = new Check( $element );
			if(! $check->execute() )
			{
				// 本体エレメントにエラー情報書き込み
				$this->elements[$key]->error = $check->error;
				// エラー配列にエラー情報追加
				array_push( $resultArray, $this->elements[$key]->error );
			}
		}
		return $resultArray;
	}
	
	function send( $ownerBody, $userBody = "" )
	{
		$base64Subject = "=?iso-2022-jp?B?" .base64_encode($this->missionName) . "?=";
		// Case By Case
		//$content_U = base64_encode($mail);
		//$content_A = base64_encode($bodyUSER);
		//$paramter = "-f" . "myadr ＠ example.com";
		//mb_send_mail($to, $subject, $msg, $header, $parameter);// 第五引数コマンドラインパラメータ（Return-Path設定時）
		// 管理者に送信
		if(@mb_send_mail( $this->TO, $this->missionName, $ownerBody, "From: $this->FROM\n"."Reply-To: $this->FROM\n", "-f ".$this->FROM))
		{
			// ユーザに送信
			if(! empty($userBody) && $this->sendToUser && ! empty( $this->elements["MAIL"]->value ))
			{
				if(@mb_send_mail( $this->elements["MAIL"]->value, $this->missionName, $userBody, "From: $this->FROM\n"."Reply-To: $this->FROM\n", "-f ".$this->FROM))
				{
					return true;
				}
				else
				{
					return false;
				}
			}else{
				return true;
			}
		}
		else
		{
			return false;
		}
		
	}
	
	function getPref47()
	{
		return array("北海道","青森県","秋田県","岩手県","宮城県","山形県","福島県","茨城県","栃木県","群馬県","埼玉県","東京都","千葉県","神奈川県","長野県","山梨県","静岡県","愛知県","岐阜県","三重県","新潟県","富山県","石川県","福井県","滋賀県","京都府","大阪府","兵庫県","奈良県","和歌山県","岡山県","広島県","島根県","鳥取県","徳島県","香川県","愛媛県","高知県","山口県","福岡県","大分県","長崎県","佐賀県","熊本県","宮崎県","鹿児島県","沖縄県");
	}
	function getMoritaPdf()
	{
		$pnc = new ProductNewsCollection();
		$pdfWorksCollection = $pnc->getNews( 0 , 0 , 0 );
		$pdfs = array();
		if ( $pdfWorksCollection != null ){
			foreach( $pdfWorksCollection as $productPdfKey => $productPdfValue ){
				if($productPdfValue->product_maker){
					$obj = new PdfDto();
					$obj->id = $productPdfValue->product_id;
					$obj->name = $productPdfValue->product_name_japanese;
					$obj->uri = $productPdfValue->product_maker;
					$obj->num = $productPdfKey;
					$pdfs[] = $obj;
				}
			}
			
			foreach( $pdfs as $PdfKey => $PdfValue ){
				foreach( $pdfs as $sPdfKey => $sPdfValue ){
					if($PdfValue->uri == $sPdfValue->uri){
						if($pdfs[$PdfKey]->samePdf){
							$pdfs[$PdfKey]->samePdf = $pdfs[$PdfKey]->samePdf .",". $sPdfValue->name;
						}
						else{
							$pdfs[$PdfKey]->samePdf = $sPdfValue->name;
						}
					}
				}
			}
			
		}
		return $pdfs;
	}
	
	function destroy()
	{
		// あぼーん
	}

}
?>
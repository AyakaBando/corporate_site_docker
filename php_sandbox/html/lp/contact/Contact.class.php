<?php
require_once(realpath(dirname(__FILE__))."/../".'/libs/dynamicMail/DynamicMailForm.class.php');
require_once(realpath(dirname(__FILE__))."/../".'/libs/dynamicMail/FormElement.class.php');

class Contact extends DynamicMailForm{

	function Contact()
	{
		parent::DynamicMailForm( "pid4M カタログダウンロード", "info-lp@moritaalumi.co.jp", "info-lp@moritaalumi.co.jp" );

		parent::addElement(new FormElement("お名前", "NAME", null, "", "text", true, 50, "", true, "HK", 0, 0, true));
		parent::addElement(new FormElement("メールアドレス", "MAIL", null, "", "text", true, 50, "", true, "MAIL", 0, 0, true));
		parent::addElement(new FormElement("会社名", "COMPANY_NAME", null, "", "text", true, 50, "", true, "HK", 0, 0, true));
		parent::addElement(new FormElement("部署名", "BUSINESS_CATEGORY", null, "", "text", true, 50, "", true, "HK", 0, 0, true));
		parent::addElement(new FormElement("電話番号", "TEL", null, "", "text", true, "", "", true, "HS", 0, 0, true));
		parent::addElement(new FormElement("弊社からのご連絡", "SEL", array('しても良い','しないでほしい'), "", "radio", true, 0, "", true, "", 0, 0, true));
		parent::addElement(new FormElement("ご連絡方法", "SEL2", array('メール','電話','どちらでも'), "", "radio", true, 0, "", true, "", 0, 0, true));
	}

	function destroy()
	{
		parent::destroy();
	}
}

// $title, $name, $values, $value, $type, $indispensable = false, $size = "10", $rows = "", $check = false, $checkType = "", $strMin = 0, $strLimit = 0, $htmlSpecialChars = false

<?
//---------------------------------------------------
// NAME		: library of the gd
// FILE		: init.inc
// CRE_TM	: 2005/02/05
// AUTHOR	: MT / [gd]
// VERSION	: 1.1
//---------------------------------------------------

class gd{
	var $root_domain = "";
	var $secure_domain = "";

	var $bots;

	function gd(){
		$this->root_domain = "http://" . $_SERVER["HTTP_HOST"] . "/";
		$this->secure_domain = "https://" . $_SERVER["HTTP_HOST"] . "/";
	}
	//--------------------------------
	// NAME		: SEO bot
	// DESC		: ロボット検索エンジンを検出し、適正なファイルを提供する
	// PARAMETER: $HTTP_USER_AGENT
	//--------------------------------
	function Robots($agent){
		$this->bots = array("Yahoo","Slurp","Google","Googlebot","msnbot","alexa","appie","Ask Jeeves","crawler","FAST","froogle","Firefly","girafabot","InfoSeek","inktomi","looksmart","NationalDirectory","rabaz","Scooter","Spade","TECNOSEEK","Teoma","WebBug","WebFindBot","URL_Spider_SQL","ZyBorg","Vivisimo");
		$b = FALSE;
		foreach($this->bots as $key => $value){
			if(eregi($this->bots[$key],$agent)){
				$b = TRUE;
			}
		}
		return $b;
	}
	function DOC_XML(){
		echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
	}/*
	function reference($name,$link,$desc){
		echo "<div class=\"reference\">\n<ul>\n";
		echo "<li><a href=\"".$link."\">".$name."</a><div class=\"st\">".$desc."</div></li>\n";
		echo "</ul>\n</div>\n";
	}*/
	// wwwwww
	function destroy(){
		//$this = NULL; // FATAL ERROR on PHP4
		unset($this);
	}
	/* PHP5
	function __destruct(){ // ONLY PHP5 OR LATER
		unset($this);
	}
	*/
}



?>

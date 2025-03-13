<?php
require_once($_SERVER{"DOCUMENT_ROOT"} . "/gdCMS/lib/amfphp/services/ProductService.php");
require_once($_SERVER{"DOCUMENT_ROOT"} . "/gdCMS/lib/amfphp/dto/jp/co/moritaalumi/cms/dto/ProductDTO.php");

class ProductUtility{
	var $id;
	var $categoryId;
	var $service;
	
	function ProductUtility($productId = "", $categoryId = "0")
	{
		$this->service = new ProductService();
		$this->id = $productId;
		$this->categoryId = $categoryId;
	}
	
	/**
	この記事よりも古い記事を一件返す
	*/
	function getAfterEntry()
	{
		$res = $this->service->getContentsFromPoint( $this->id, $this->categoryId, 1, 1, 0 );
		return $res[0];
	}
	
	/**
	この記事よりも新しい記事を一件返す
	*/
	function getBeforeEntry()
	{
		$res = $this->service->getContentsFromPoint( $this->id, $this->categoryId, 1, 0, 1 );
		return $res[1];
	}
	
	/**
	この記事のDTOを返す
	*/
	function getEntry()
	{
		$dto = new ProductDTO();
		$dto->id = $this->id;
		$res = $this->service->getContents( $dto, 0, 1 );
		return $res[0];
	}
	
	function destroy()
	{
		unset( $this->service );
	}
}


?>

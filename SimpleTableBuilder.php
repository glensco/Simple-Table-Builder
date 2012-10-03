<?php
/**
* SimpleTableBuilder
* - This class generates a simple HTML-Table from an array
* @autor Sebastian Klüh (http://sklueh.de)
*/
class SimpleTableBuilder
{
	private static $iInstanceCount = 0;
	private $aColumnHeader = array();
	private $aTableData = array();
	private $sTableName = "data_table";
	private $sWidth = 'auto';
	private $sHeight = 'auto';
	private $sTitle = '';
	private $iDefaultColumnWidth = '100';
	
	public function SimpleTableBuilder($sTableName = "")
	{
		if($sTableName != "") $this->sTableName = $sTableName;
		self::$iInstanceCount++;
	}
	
	public function buildTable()
	{
		$this->sTableName.=self::$iInstanceCount;
		$sHTML= "<table class=\"".$this->sTableName."\">";
		$sHTML.= $this->getHeader();
		$iRowCount = 0;
		$sHTML.= "<tbody>";
		foreach((array) $this->aTableData as $aCurrentRow)
		{
			$iColumnCount = 0;
			$sHTML.= "<tr>";
			foreach((array) $aCurrentRow as $aCurrentColumn)
			{
				if(!($iColumnCount < count($this->aColumnHeader))) continue;
				$sHTML.= "<td>".$aCurrentColumn."</td>";
				$iColumnCount++;
			}
			$sHTML.= "</tr>";
			$iRowCount++;				
		}
		$sHTML.= "</tbody>";
		$sHTML.= "</table>";
		$sHTML.= "<script type=\"text/javascript\">$(document).ready(function(){\$('.".$this->sTableName."').flexigrid({height:'".$this->sHeight."', width:'".$this->sWidth."', striped:true, title: '".$this->sTitle."'});});</script>";
		
		return $sHTML;
	}
	
	public function setHeader()
	{
	    foreach((array)func_get_args() as $mColumn)
		{
			if(is_array($mColumn) && reset($mColumn))
			{
				$this->aColumnHeader[] = array('title' => key($mColumn), 'width' => $mColumn[key($mColumn)]);
				continue;
			}
			$this->aColumnHeader[] = array('title' => $mColumn, 'width' => $this->iDefaultColumnWidth);
		}
	}
	
	private function getHeader()
	{
		$sHTML = "<thead><tr>";
		$iColumnCount = 0;
		foreach($this->aColumnHeader as $aColumn)
		{
			$sHTML.= "<th width=\"".$aColumn['width']."\">".$aColumn['title']."</th>";
			$iColumnCount++;
		}
		$sHTML.= "</tr></thead>";
		return $sHTML;
	}
	
	public function setTitle($sTitle)
	{
		$this->sTitle = $sTitle;
	}
	
	public function setHeight($sHeight)
	{
		$this->sHeight = $sHeight;
	}
	
	public function setWidth($sWidth)
	{
		$this->sWidth = $sWidth;	
	}
	
	public function setTableData($aTableData)
	{
		$this->aTableData = $aTableData;
	}
	
	public function setDefaultColumnWidth($iWidth)
	{
		$this->iDefaultColumnWidth = $iWidth;
	}
}
?>
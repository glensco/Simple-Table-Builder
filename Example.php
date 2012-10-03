<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
       "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/flexigrid.pack.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="js/flexigrid.pack.js"></script>
</head>
<body>
<?php
require_once('SimpleTableBuilder.php');

$aTableData = array_fill(0, 15, array('Vorname' => 'Max', 'Nachname' => 'Mustermann', 'Straße' => utf8_decode('Musterstraße 10')));
$oSimpleTableBuilder = new SimpleTableBuilder();
$oSimpleTableBuilder->setHeader('Vorname', array('Nachname' => '150'), utf8_decode('Straße')); //Die Breite einer Spalte kann über ein Array definiert werden (In diesem Fall: 150 Pixel). Ansonsten wird der Standardwert verwendet.
$oSimpleTableBuilder->setTitle('Mein Array');		//Festlegen der Tabellen-Überschrift (optional)
$oSimpleTableBuilder->setTableData($aTableData); 	//Hier wird das Array übergeben, aus dem eine Tabelle erzeugt wird.
$oSimpleTableBuilder->setHeight('300');				//Festlegen der Höhe (optional)
$oSimpleTableBuilder->setWidth('600'); 				//Festlegen der Breite (optional)
echo $oSimpleTableBuilder->buildTable();			//Tabelle erzeugen

?>


</body>
</html>
<?php
	#var_dump($_SERVER);

if($_POST['id']) {
	include("configuration.php");
	include("dataaccess.php");
	#include("datadisplay.php");
	#include("funktionen.inc.php");
	#--------------------
    $id		= mysql_real_escape_string($_POST['id']);
    $field	= mysql_real_escape_string(_convert($_POST['field']));
    $value	= mysql_real_escape_string(_convert($_POST['value']));
 	$data	= array($field => $value);
	#--------------------
    $res			= select("adhs_cont", "*", "id", $id, "");
    $entry			= $res[0];
    if(!$data["kat"])           $data["kat"]			= _convert($entry["kat"]);
    if(!$data["kat2"])          $data["kat2"]			= _convert($entry["kat2"]);
    if(!$data["kat3"])          $data["kat3"]			= _convert($entry["kat3"]);
    if(!$data["typ"])           $data["typ"]			= _convert($entry["typ"]);
    if(!$data["titel"])         $data["titel"]			= _convert($entry["titel"]);
    if(!$data["titel_en"])      $data["titel_en"]		= _convert($entry["titel_en"]);
    if(!$data["text"])          $data["text"]			= _convert($entry["text"]);
    if(!$data["text_en"])       $data["text_en"]		= _convert($entry["text_en"]);
    if(!$data["autor"])         $data["autor"]			= _convert($entry["autor"]);
    if(!$data["quelle"])        $data["quelle"]			= _convert($entry["quelle"]);
    if(!$data["doi"])           $data["doi"]			= _convert($entry["doi"]);
    if(!$data["icon"])          $data["icon"]			= $entry["icon"];
    if(!$data["jahr"])          $data["jahr"]			= $entry["jahr"];
    if(!$data["sprache"])       $data["sprache"]		= $entry["sprache"];
    if(!$data["keywords"])      $data["keywords"]		= _convert($entry["keywords"]);
    if(!$data["keywords_en"])   $data["keywords_en"]	= _convert($entry["keywords_en"]);
    if($field == "hidden")      $data["hidden"]     	= $value;
    else                        $data["hidden"]     	= $entry['hidden'];
                                $data["lastmod"]		= date('Y-n-j G:i:s');
    if($data["hidden"] == 0 && $entry["pubdate"] == '') {
                                $data["pubdate"]	    = date("D, j M Y H:i:s ").'GMT';
    } elseif ($entry["pubdate"] && $entry["pubdate"] != '') {
                                $data["pubdate"]        = $entry["pubdate"];
    } else {
                                $data["pubdate"]	    = '';
    }
    // datei hochladen?
    if ($_FILES['dokument']['tmp_name'] != "") {
        if ($data["titel"] != "") $dateiname = dateinamengenerator(html_decode($data["titel"])); else $dateiname = dateinamengenerator(html_decode($data["titel_en"]));
                                $data["link"]           = "docs/".$dateiname.".pdf";
        move_uploaded_file($_FILES['dokument']['tmp_name'], ROOT_SYS.$data["link"]);
    } else                      $data["link"]           = $entry["link"];
    #--------------------
 	$res = update("adhs_cont", $data, "id", $id);
	#var_dump($res);
}
?>
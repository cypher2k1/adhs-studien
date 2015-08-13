<!DOCTYPE html>
<html>
<?php
#header("Content-Type: text/html; charset=utf-8");
// includes
include("cms/configuration.php");
include('../php/func_all_html_entities_decode.php');
include("cms/dataaccess.php");
include("cms/datadisplay.php");
include("cms/funktionen.inc.php");
#include("plugins/jquery-datatables/examples/server_side/scripts/server_processing.php");
// --------------------
echo'
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<base href="'.ROOT_ABS.'">
	<meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
	<script src="'.$ckeditor.'"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="'.$jquery_ui.'"></script>
	<script src="'.$datatables.'media/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/administration.css">
	<link rel="stylesheet" type="text/css" href="'.$jquery_ui_css.'">
	<link rel="stylesheet" type="text/css" href="'.$datatables.'media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="'.$datatables.'media/css/jquery.dataTables_themeroller.css">
</head>
<body>
	<div id="wrapper">
	  <div id="navi">
		<a href="'.$_SERVER['PHP_SELF'].'?action=admin_adhs" title="&Uuml;bersicht" id="link_admin_adhs"><img src="'.$img.'icons/48x48_liste.png" /></a>
		<a href="'.$_SERVER['PHP_SELF'].'?action=form_adhs" style=\'margin-left:30px;\' title="Neue Seite"><img src="'.$img.'icons/48x48_neu.png" /></a>
		<a href="http://dbadmin.one.com/index.php#PMAURL:server=1&target=main.php&token=a3dc1f2d1ab0d7a3ec4aebc0b3572c28" style=\'margin-left:30px;\' title="Datenbank direkt bearbeiten (phpMyAdmin)" target="_blank"><img src="'.$img.'icons/48x48_db.png" /></a>
		<a href="'.$_SERVER['PHP_SELF'].'?action=doppel" style=\'margin-left:30px;\' title="Wartung"><img src="'.$img.'icons/48x48_wartung.png" /></a>
		<a href="'.ROOT_ABS.'" style=\'margin-left:30px;\' title="Homepage in neuem Fenster anzeigen" target="_blank"><img src="'.$img.'icons/48x48_welt.png" /></a>
		<a id="logoutLink" href="logout.php" style=\'margin-left:30px;\' title="Logout"><img src="'.$img.'icons/48x48_logout.png" /></a>
		<hr />
	  </div>';
// ----------------------------------------------------------
// ausgabe des titels
if(isset($_REQUEST["action"])) {

	echo "<h1>";
	$action = $_REQUEST["action"];
	switch($action) {
		// verwaltungsaktionen
		case "admin_adhs": echo "Verwaltung der ADHS - Studien"; break;
		// inhaltsaktionen
		case "form_adhs": break;
		case "del_adhs": echo "Inhaltselemente entfernen<br/>"; break;
		case "update_adhs": echo "Aktualisierung von Inhaltselemente"; break;
		case "insert_adhs": echo "Inhaltselemente hinzuf&uuml;gen"; break;
		// sonstige
		case "doppel": echo "Fehlersuche"; break;
	}
	echo "</h1>";
}

// ausgabe des inhalts
if(isset($_REQUEST["action"])) {
	$action = $_REQUEST["action"];
	switch($action) {
		// inhaltsaktionen
		case "form_adhs": form_adhs(); break;
		case "update_adhs": 
		// adhs aktualisieren
			// sammlung der adhs-daten
			$data = array();
			$data["kat"]			= $_REQUEST["kat"];
			$data["kat2"]			= $_REQUEST["kat2"];
			$data["kat3"]			= $_REQUEST["kat3"];
			$data["typ"]			= mysql_real_escape_string(_convert($_REQUEST["typ"]));
			$data["titel"]			= mysql_real_escape_string(_convert(trim($_REQUEST["titel"])));
			$data["titel_en"]		= mysql_real_escape_string(_convert(trim($_REQUEST["titel_en"])));
			$data["text"]			= mysql_real_escape_string(removeQuotes(trim($_REQUEST["text"]), $no_html = 0));
			$data["text_en"]		= mysql_real_escape_string(removeQuotes(trim($_REQUEST["text_en"]), $no_html = 0));
			$data["autor"]			= mysql_real_escape_string(html_decode($_REQUEST["autor"]));
			$data["quelle"]			= mysql_real_escape_string(html_decode($_REQUEST["quelle"]));
            $data["doi"]			= mysql_real_escape_string(html_decode($_REQUEST["doi"]));
			$data["icon"]			= $_REQUEST["icon"];
			$data["jahr"]			= $_REQUEST["jahr"];
			$data["sprache"]		= $_REQUEST["sprache"];
			$data["keywords"]		= mysql_real_escape_string(html_decode($_REQUEST["keywords"]));
			$data["keywords_en"]	= mysql_real_escape_string(html_decode($_REQUEST["keywords_en"]));
			$data["hidden"]			= $_REQUEST["hidden"];
			$data["lastmod"]		= date('Y-n-j G:i:s');
            if($_REQUEST["hidden"] == 0 && $_REQUEST["pubdate"] == '') {
                $data["pubdate"]	= date("D, j M Y H:i:s ").'GMT';
            } elseif ($data["pubdate"] && $data["pubdate"] != '') {
                $data["pubdate"]    = $_REQUEST["pubdate"];
            } else {
                #$data["pubdate"]	= '';
            }
			
			// datei hochladen?
			if ($_FILES['dokument']['tmp_name'] != "") {
				if ($data["titel"] != "") $dateiname = dateinamengenerator(html_decode($data["titel"])); else $dateiname = dateinamengenerator(html_decode($data["titel_en"]));				
				$data["link"] = "docs/".$dateiname.".pdf";
				#print_r($_FILES);
				move_uploaded_file($_FILES['dokument']['tmp_name'], ROOT_SYS.$data["link"]);
			} else $data["link"] = $_REQUEST["link"];
			
			// aktualisieren
			$res = update("adhs_cont", $data, "id", $_REQUEST["id"]);
			// statusausgabe
			if($res) echo "<h3>Aktualisierung erfolgreich.</h3>";
			else {
				echo "<h3>Aktualisierung fehlgeschlagen.</h3>";
				if(DEBUG) echo "<br/>".mysql_error();
			}
			admin_adhs();
			break;
		case "insert_adhs": 
		// cont neu anlegen
			// sammlung der daten
			$data = array();
			$data["kat"]			= $_REQUEST["kat"];
			$data["kat2"]			= $_REQUEST["kat2"];
			$data["kat3"]			= $_REQUEST["kat3"];
			$data["typ"]			= mysql_real_escape_string(_convert($_REQUEST["typ"]));
			$data["titel"]			= mysql_real_escape_string(_convert(trim($_REQUEST["titel"])));
			$data["titel_en"]		= mysql_real_escape_string(_convert(trim($_REQUEST["titel_en"])));
            $data["text"]			= mysql_real_escape_string(removeQuotes(trim($_REQUEST["text"]), $no_html = 0));
            $data["text_en"]		= mysql_real_escape_string(removeQuotes(trim($_REQUEST["text_en"]), $no_html = 0));
			$data["autor"]			= mysql_real_escape_string(html_decode($_REQUEST["autor"]));
			$data["quelle"]			= mysql_real_escape_string(html_decode($_REQUEST["quelle"]));
            $data["doi"]			= mysql_real_escape_string(html_decode($_REQUEST["doi"]));
			$data["icon"]			= $_REQUEST["icon"];
			$data["jahr"]			= $_REQUEST["jahr"];
			$data["sprache"]		= $_REQUEST["sprache"];
			$data["keywords"]		= mysql_real_escape_string(html_decode($_REQUEST["keywords"]));
			$data["keywords_en"]	= mysql_real_escape_string(html_decode($_REQUEST["keywords_en"]));
			$data["hidden"]			= $_REQUEST["hidden"];
            $data["lastmod"]		= date('Y-n-j G:i:s');
            if($_REQUEST["hidden"] == 0) {
                $data["pubdate"]	= date("D, j M Y H:i:s ").'GMT';
            } else {
                $data["pubdate"]	= '';
            }

			// datei hochladen?
			if ($_FILES['dokument']['tmp_name'] != "") {
				if ($data["titel"] != "") $dateiname = dateinamengenerator(html_decode($data["titel"])); else $dateiname = dateinamengenerator(html_decode($data["titel_en"]));				
				$data["link"] = "docs/".$dateiname.".pdf";
				#print_r($_FILES);
				move_uploaded_file($_FILES['dokument']['tmp_name'], ROOT_SYS.$data["link"]);
			} else $data["link"] = $_REQUEST["link"];
			// einf�gen
			$res = insert("adhs_cont", $data);
			// statusausgabe
			if($res) echo "<h3>Neuanlage erfolgreich.</h3>";
			else {
				echo "<h3>Neuanlage fehlgeschlagen.</h3>";
				if(DEBUG) echo "<br/>".mysql_error();
			}
			admin_adhs();
			break;
        case "insert_adhs_meta":
            // cont neu anlegen
            $doi = trim($_REQUEST["doi"]);
            $xml_metadata = zendDoiRequest($doi);

            // db abfragen
            $adhs_cont_id = select_desc("adhs_cont", "*", "doi", $doi, ""); # prüft ob doi in cont vorhanden ist
            $adhs_lit_id = select_desc("adhs_lit", "*", "doi", $doi, ""); # prüft ob doi in lit vorhanden ist
            if(!is_null($adhs_cont_id[0]['id'])) {
                $update_id_cont = $adhs_cont_id[0]['id'];
                $data = $adhs_cont_id[0];
            } else {
                $data = array();
            }
            if(!is_null($adhs_lit_id[0]['id'])) {
                $update_id_lit = $adhs_lit_id[0]['id'];
                $lit = $adhs_lit_id[0];
            } else {
                $lit = array();
            }

            // datei hochladen
            if ($_FILES['dokument']['tmp_name'] != "") {
                $dateiname = dateinamengenerator(html_decode($xml_metadata["title1"]));
                move_uploaded_file($_FILES['dokument']['tmp_name'], ROOT_SYS."docs/".$dateiname.".pdf");
            }
            // autoren
            $autors     = array();
            foreach($xml_metadata["autors"] as $autor) {
                $autors['cont']    .= $autor['vn'].' '.$autor['nn'].', ';
                $autors['lit']     .= $autor['nn'].', '.$autor['vn'].'; ';
            }
            // sammlung der daten
            $lit["autor"]			= rtrim($autors['lit'], ' ;,');
            $lit["titel"]			= $xml_metadata["title1"];
            $lit["lang"]			= $xml_metadata["lang"];
            $lit["jahr"]			= $xml_metadata["year"];
            $lit["title_full"]	    = $xml_metadata["quelle"]["title_full"];
            $lit["title_abbrev"]	= $xml_metadata["quelle"]["title_abbrev"];
            $lit["band"]			= $xml_metadata["band"];
            $lit["nr"]			    = $xml_metadata["nr"];
            $lit["seiten"]			= $xml_metadata["seiten"];
            if($xml_metadata["issn"][0]['name'])
            $lit['issn_'.$xml_metadata["issn"][0]['type']]
                                    = trim($xml_metadata["issn"][0]['name']);
            if($xml_metadata["issn"][1]['name'])
            $lit['issn_'.$xml_metadata["issn"][1]['type']]
                                    = trim($xml_metadata["issn"][1]['name']);
            $lit["pdf"]			    = $dateiname.".pdf";
            $lit["doi"]			    = $xml_metadata["doi"];
            $lit["pubmed_id"]		= $xml_metadata["pubmed_id"];
            $lit["pmcid"]			= $xml_metadata["pmcid"];
            $lit["status"]			= $xml_metadata["status"];

            // einfügen
            if($update_id_lit) {
                $res1       = update("adhs_lit", $lit, "id", $update_id_lit);
                $lit_id     = $update_id_lit;
            } else {
                $res1       = insert("adhs_lit", $lit);
                $lit_id     = mysql_insert_id();
            }
            #var_dump($lit);
            // quelle
            if($xml_metadata["quelle"]["title_full"])
                $data_quelle    = $xml_metadata["quelle"]["title_full"];
            if($xml_metadata["band"])
                $data_quelle   .= ', '.$xml_metadata["band"];
            if($xml_metadata["nr"])
                $data_quelle   .= ' ('.$xml_metadata["nr"].')';
            if($xml_metadata["year"])
                $data_quelle   .= ', '.$xml_metadata["year"];
            if($xml_metadata["seiten"])
                $data_quelle   .= ', '.$xml_metadata["seiten"];
            // sprache
            if($xml_metadata["lang"] == 'de') {
                $data["sprache"]    = 0;
                $data["titel"]      = $xml_metadata["title1"];
                $data["titel_en"]   = $xml_metadata["title2"];
            } elseif($xml_metadata["lang"] == 'en') {
                $data["sprache"]    = 1;
                $data["titel"]      = $xml_metadata["title2"];
                $data["titel_en"]   = $xml_metadata["title1"];
            }
            #$data["kat"]			= $_REQUEST["kat"];
            #$data["kat2"]			= $_REQUEST["kat2"];
            #$data["kat3"]			= $_REQUEST["kat3"];
            $data["doi"]			= mysql_real_escape_string(_convert(trim($_REQUEST["doi"])));
            $data["lit_id"]			= $lit_id;
            #$data["typ"]			= mysql_real_escape_string(_convert($_REQUEST["typ"]));
            $data["autor"]			= mysql_real_escape_string(html_decode(rtrim($autors['cont'], ' ;,')));
            $data["quelle"]		    = mysql_real_escape_string(html_decode($data_quelle));
            $data["icon"]			= 0;
            $data["jahr"]			= $xml_metadata["year"];
            #$data["keywords"]		= mysql_real_escape_string(html_decode($_REQUEST["keywords"]));
            #$data["keywords_en"]	= mysql_real_escape_string(html_decode($_REQUEST["keywords_en"]));
            (!$_REQUEST["hidden"])
                ? $data["hidden"]	= 1
                : $data["hidden"]	= $_REQUEST["hidden"];
            $data["lastmod"]		= date('Y-n-j G:i:s');
            $data["link"]           = "docs/".$dateiname.".pdf";
            if($data["hidden"] == 0 && !$data["pubdate"] && !$_REQUEST["pubdate"]) {
                $data["pubdate"]	= date("D, j M Y H:i:s ").'GMT';
            } elseif ($_REQUEST["pubdate"] && $_REQUEST["pubdate"] != '') {
                $data["pubdate"]    = $_REQUEST["pubdate"];
            } elseif ($data["pubdate"] && $data["pubdate"] != '') {
                #$data["pubdate"] bleibt gleich
            } else {
                $data["pubdate"]	= '';
            }
            #var_dump($data);
            // einfügen
            ($update_id_cont)
                ? $res2 = update("adhs_cont", $data, "id", $update_id_cont)
                : $res2 = insert("adhs_cont", $data);
            // statusausgabe
            if($res1 && $res2) echo "<h3>Neuanlage erfolgreich.</h3>";
            else {
                echo "<h3>Neuanlage fehlgeschlagen.</h3>";
                if(DEBUG) echo "<br/>".mysql_error();
            }
            admin_adhs();
            break;
		case "del_adhs": // buch entfernen
			// id der r�ume aus anfrage ermitteln
			$id = $_REQUEST["id"];
			// l�schen
			$res = delete("adhs_cont", "id", $id);
			// statusausgabe
			if($res) echo "<h3>Entfernen erfolgreich.</h3>";
			else {
				echo "<h3>Entfernen fehlgeschlagen.</h3>";
				if(DEBUG) echo "<br/>".mysql_error();
			}
			admin_adhs();
			break;
		// sonstige
		case "doppel":
			/*echo'<h2>Suche nach doppelten Eintr&auml;gen</h2>';
			$sql = 'SELECT *, COUNT(titel) AS NumOccurrences FROM adhs_cont GROUP BY titel HAVING ( COUNT(titel) > 1 )';
			$res = mysql_query($sql) or die("Bad query: " . mysql_error());
			$doppel = array();
			while($row = mysql_fetch_assoc($res)) {
				array_push($doppel, $row);
			}
			if(!$doppel) {
				echo'<h4>Keine doppelten Eintr&auml;ge gefunden!</h4>';
			} else {
				foreach($doppel as $dopp) {
					if($dopp['titel'] != "") {
						#$sql = "SELECT * FROM `adhs_cont` WHERE `titel` LIKE '%$dopp['titel']%' OR `titel_en` LIKE '%$dopp['titel_en']%'";
						$res = select("adhs_cont", "*", "titel", $dopp['titel'], "id");
						table_display($res, "form_adhs", "del_adhs");
					}
				}
			}
			echo'<p>&nbsp;</p><hr /><p>&nbsp;</p>';
			echo'<h2>Suche nach fehlerhaften Links</h2>';
			$sql = 'SELECT * FROM `adhs_cont` WHERE link LIKE \'% %\' OR link LIKE \'%�%\' OR link LIKE \'%�%\' OR link LIKE \'%�%\' OR link LIKE \'%�%\' OR link LIKE \'%�%\' LIMIT 0, 30 '; # �/� liefern viele falsche ergebnisse!
			$res = mysql_query($sql) or die("Bad query: " . mysql_error());
			$badlink = array();
			while($row = mysql_fetch_assoc($res)) {
				array_push($badlink, $row);
			}
			if(!$badlink) {
				echo'<h4>Keine Fehler in den Links gefunden!</h4>';
			} else {
				foreach($badlink as $bad) {
					$res = select("adhs_cont", "*", "id", $bad['id'], "id");
					table_display($res, "form_adhs", "del_adhs");
				}
			}*/
			#print_r($doppel);
			#table_display($doppel, "form_kat", "del_kat");
            //-----------------------------------
            echo'<p>&nbsp;</p><hr /><p>&nbsp;</p>';
            echo'<h2>DOI Testbereich</h2>';

            // formular
            echo "<form method='post' action='".$_SERVER['PHP_SELF']."' enctype='multipart/form-data'>";

            echo '<p>';
            echo "<label for='dokument'>Dokument hochladen:</label><br />";
            echo "<input type='file' id='dokument' name='dokument'>";
            echo '</p><p>';
            echo "<label for='doi'>DOI:</label><br />";
            echo "<input type='text' id='doi' name='doi' value=''>";
            echo '</p><p>';
            echo "<label for='title'>DOI:</label><br />";
            echo "<input type='text' id='title' name='title' value=''>";
            echo '</p><p>';
            echo "<input type='submit' id='send' name='send'>
		 <script>
			$('#send').button({ label: 'Suchen' });
		</script>";
            // senden
            echo "<input type='hidden' name='action' value='insert_adhs_meta'/>";
            echo "</form></p>";




            /*$host = 'www.crossref.org';
            $url = '/openurl/?id=doi:10.1007/s00112-008-1732-9&noredirect=true&pid=adhs.studien@gmail.com&format=unixref';
            $result = getRequest($host, $url);
            #var_dump($result);
            $xml = new SimpleXMLElement($result);
            #$content = $xml->doi_records;
            var_dump($xml);*/
			break;
		case "admin_adhs": admin_adhs(); break;
	}
} else admin_adhs();

// ausgabe der inhalte in der datenbank
function admin_adhs() {
    //----------------------- Vorbereiten
    echo "<div>";
    // formular
    echo "<form method='post' action='".$_SERVER['PHP_SELF']."' enctype='multipart/form-data'>";
    echo "<label for='dokument'>Dokument hochladen:</label><br />";
    echo "<input type='file' id='dokument' name='dokument'>";
    echo "<input type='text' id='doi' name='doi' value=''>";
    echo "<input type='submit' id='suche' name='suche'>";
    // senden
    echo "<input type='hidden' name='action' value='insert_adhs_meta'/>";
    echo "</form></div>";
    //------------------------
	$res = select("adhs_cont", "*", "", "", "id");
	arsort($res);
	echo '
	<br/>
 	<a href="#" onclick="feedburner(); return false;" title="Ping FeedBurner">
 	  <img src="'.ROOT_REL.'img/feedburner.gif" title="Ping FeedBurner">
 	</a>';
	#table_display($res, "form_adhs", "del_adhs");
	adhs_admin_tabelle($res, "form_adhs", "del_adhs");
	echo '
	<br/>
 	<a href="#" onclick="feedburner(); return false;" title="Ping FeedBurner">
 	  <img src="'.ROOT_REL.'img/feedburner.gif" title="Ping FeedBurner">
 	</a>';
}

// ausgabe des formulars zur neueingabe / aktualisierung
function form_adhs() {
    // formular
    echo "<div id='accordion'>";
	// vorbelegung des formulars
	if(isset($_REQUEST["id"])) {
		$res			= select("adhs_cont", "*", "id", $_REQUEST["id"], "");
		$entry			= $res[0];
		$kat1			= _convert($entry["kat"]);
		$kat2			= _convert($entry["kat2"]);
		$kat3			= _convert($entry["kat3"]);
		$typ			= _convert($entry["typ"]);
		$titel			= _convert(html_entity_decode($entry["titel"]));
		$titel_en		= _convert(strip_tags($entry["titel_en"]));
		$text			= utf8_encode($entry["text"]);
		$text_en		= _convert($entry["text_en"]);
		$autor			= utf8_encode($entry["autor"]);
		$quelle			= utf8_encode($entry["quelle"]);
        $doi			= _convert($entry["doi"]);
		$link			= $entry["link"];
		$icon			= $entry["icon"];
		$jahr			= $entry["jahr"];
		$sprache		= $entry["sprache"];
		$keywords		= utf8_encode(all_html_entities_decode($entry["keywords"], $mode = 0));
		$keywords_en	= _convert($entry["keywords_en"]);
		($entry['hidden'] == 1) 
			? $hidden	= ' checked="checked"' 
			: $hidden	= '';
        $pubdate		= $entry["pubdate"];
	}	else {
		$kat1			= "";
		$kat2			= "";
		$kat3			= "";
		$typ			= "";
		$titel			= "";
		$titel_en		= "";
		$text			= "";
		$text_en		= "";
		$autor			= "";
		$quelle			= "";
        $doi			= "";
		$link			= "";
		$icon			= "";
		$jahr			= "2014";
		$sprache		= "";
		$keywords		= "";
		$keywords_en	= "";
		$hidden			= " checked='checked'";
        //----------------------- Vorbereiten
        echo "<h1>Upload und DOI suche</h1>";
        echo "<div>";
        // formular
        echo '<table><tr><td style="padding-right: 25px; vertical-align: top">';
        echo "<form method='post' action='".$_SERVER['PHP_SELF']."' enctype='multipart/form-data'>";
        echo '<p>';
        echo "<label for='dokument'>Dokument hochladen:</label><br />";
        echo "<input type='file' id='dokument' name='dokument'>";
        echo '</p>';
        echo '</td><td style="padding-right: 25px; vertical-align: top">';
        echo '<p>';
        echo "<label for='doi'>DOI:</label><br />";
        echo "<input type='text' id='doi' name='doi' value=''>";
        echo '</p>';
        echo '</td><td style="padding-right: 25px">';
        echo '<p>';
        echo "<input type='submit' id='suche' name='suche'>
		 <script>
			$('#suche').button({ label: 'Suchen' });
		</script>";
        // senden
        echo "<input type='hidden' name='action' value='insert_adhs_meta'/>";
        echo "</form></p>";
        echo '</td></tr></table></div>';
        //------------------------
	}
	echo "<h1>Allgemeine Informationen</h1>";
	echo "<div>";
    echo "<form method='post' action='".$_SERVER['PHP_SELF']."' enctype='multipart/form-data'>";
	echo '<table><tr><td style="padding-right: 25px">';
	echo '<p>';
	echo '<label for="kat">Kategorie 1:</label><br />';
	echo '<select id="kat" name="kat" size="1">';
	$kats = select("adhs_kat", "*", "", "", "");
	echo '<option value="0">---</option>';
	foreach($kats as $kat) {
		echo '<option value="'.$kat["id"].'"';
		if ($kat["id"] == $kat1)  echo " selected";
		echo '>'.$kat["titel"].'</option>';
	}
	echo '</select>';
	echo '</p><p>';
	echo '<label for="kat2">Kategorie 2:</label><br />';
	echo '<select id="kat2" name="kat2" size="1">';
	echo '<option value="0">---</option>';
	foreach($kats as $kat) {
		echo '<option value="'.$kat["id"].'"';
		if ($kat["id"] == $kat2)  echo " selected";
		echo '>'.$kat["titel"].'</option>';
	}
	echo '</select>';
	echo '</p><p>';
	echo '<label for="ka3">Kategorie 3:</label><br />';
	echo '<select id="kat3" name="kat3" size="1">';
	echo '<option value="0">---</option>';
	foreach($kats as $kat) {
		echo '<option value="'.$kat["id"].'"';
		if ($kat["id"] == $kat3)  echo " selected";
		echo '>'.$kat["titel"].'</option>';
	}
	echo '</select>';
	echo '</p><p>';
	echo "<label for='typ'>Typ:</label><br />";
	echo '<select id="typ" name="typ" size="1">';
		if(isset($_REQUEST["id"])) echo '<option value="'.$typ.'">- Nicht &auml;ndern -</option>'; else echo
        '<option></option>';
		echo '<option value="Dissertation">Dissertation</option>';
		echo '<option value="&Uuml;bersichtsarbeit">&Uuml;bersichtsarbeit</option>';
		echo '<option value="Originalarbeit">Originalarbeit</option>';
		echo '<option value="Sonstiges">Sonstiges</option>';
	echo "</select>";
	echo '</p>';
	echo '</td><td style="padding-right: 25px">';

	echo '<p>';
	if($icon == "0" && $link != "") {
		$pdflink = pdf_link_test($link);
		echo "<label for='link'>Link:</label><br />";
		echo "<input type='text' id='link' name='link' value='".$link."'> (".$pdflink.")";
	} else {
		echo "<label for='dokument'>Dokument hochladen:</label><br />";
		echo "<input type='file' id='dokument' name='dokument'>";
		echo '</p><p>';
		echo "<label for='link'>Link:</label><br />";
		echo "<input type='url' id='link' name='link' value='".$link."'>";
	}
	echo '</p><p>';
	echo "<label for='autor'>Autor:</label><br />";
	echo "<input type='text' id='autor' name='autor' value='".$autor."'>";
	echo '</p><p>';
	echo "<label for='quelle'>Quelle:</label><br />";
	echo "<input type='text' id='quelle' name='quelle' value='".$quelle."'>";
    echo '</p><p>';
    echo "<label for='doi'>DOI:</label><br />";
    echo "<input type='text' id='doi' name='doi' value='".$doi."'>";
	echo '</p>';
	echo '</td><td>';

	echo '<p>';
	echo '<label for="sprache">Sprache:</label><br />';
	echo '<select id="sprache" name="sprache">';
	if(isset($_REQUEST["id"])) echo '<option value="'.$sprache.'">- Nicht &auml;ndern -</option>';
	echo '<option value="0">DE</option>';
	echo '<option value="1">EN</option>';
	echo '</select>';
	echo '</p><p>';
	echo "<label for='jahr'>Jahr:</label><br />";
	echo "<input type='text' id='jahr' name='jahr' value='".$jahr."'>
		 <script>
			$('#jahr').spinner();
		</script>";
	echo '</p><p>';
	echo "<label for='icon'>Link-Typ:</label><br />";
	echo '<select id="icon" name="icon" size="1">';
	if(isset($_REQUEST["id"])) echo '<option value="'.$icon.'">- Nicht &auml;ndern -</option>';
	echo '<option value="0">PDF-Datei</option>';
	echo '<option value="1">Web-Link</option>';
	echo '<option value="2">Kein Link</option>';
	echo "</select>";
	echo '</p><p>';
	echo "
	  <div class='ui-checkbox'>
        <input type='checkbox' id='hidden' name='hidden' value='1' ".$hidden."/>
        <label for='hidden'>Versteckt</label>
      </div>";
	echo '</p>';
	echo '</td></tr></table>';
	echo '</div>';

	echo "<h1><img src='".PATH_ICONS."de.png' alt='deutsch'>&nbsp;Deutsch</h1>";
	echo "<div>";
	
	echo "<div style='float:left;position:relative;width:50%'>";
	echo "<p>";
	echo "<label for='titel'>Deutscher Titel:</label><br />";
	echo "<input type='text' name='titel' id='titel' value='".$titel."'  style='width:90%'>";
	echo "</p>";
	echo "</div>";
	
	echo "<div style='float:left;position:relative;width:50%'>";
	echo "<p>";
	echo "<label for='keywords'>Deutsche Keywords:</label><br />";
	echo "<input type='text' id='keywords' name='keywords' value='".$keywords."' style='width:100%'>";
	echo "</p>";
	echo "</div>";
	
	echo "<textarea id='text' name='text'>".$text."</textarea>
		<script type='text/javascript'>
			CKEDITOR.replace('text',
				{
					scayt_sLang			: 'de_DE',
					allowedContent      : 'p b i; a[!href]'
				});
		</script>";
	echo "</div>";
	
	echo "<h1><img src='".PATH_ICONS."en.png' alt='englisch'>&nbsp;Englisch</h1>";
	echo "<div>";
	
	echo "<div style='float:left;position:relative;width:50%'>";
	echo "<p>";
	echo "<label for='titel_en'>Englischer Titel:</label><br />";
	echo "<input type='text' name='titel_en' id='titel_en' value='".$titel_en."'  style='width:90%'>";
	echo "</p>";
	echo "</div>";
	
	echo "<div style='float:left;position:relative;width:50%'>";
	echo "<p>";
	echo "<label for='keywords_en'>Englische Keywords:</label><br />";
	echo "<input type='text' name='keywords_en' id='keywords_en' value='".$keywords_en."' style='width:100%'>";
	echo "</p>";
	echo "</div>";
	
	echo "<textarea id='text_en' name='text_en'>".$text_en."</textarea>
		<script type='text/javascript'>
			CKEDITOR.replace('text_en',
				{
					scayt_sLang			: 'en_GB'
				});
		</script>";
	
	echo "</div>";
	echo "</div>
		 <script>
			$('#accordion').accordion({ heightStyle: 'content', active: 0 });
		</script>";
		
	echo "<div style='text-align:right'>";
	echo "<input type='submit' id='send' name='send'>
		 <script>
			$('#send').button({ label: 'Speichern' });
		</script>";
	echo "</div>";
	// festlegen der folgeaktion: aktualisieren oder neuanlegen
	if(isset($_REQUEST["id"])) {
		echo "<input type='hidden' name='id' value='".$_REQUEST["id"]."'/>";
        echo "<input type='hidden' name='pubdate' value='".$pubdate."'/>";
		echo "<input type='hidden' name='action' value='update_adhs'/>";
	}	else {
		echo "<input type='hidden' name='action' value='insert_adhs'/>";
	}
	echo "</form></div>";
}
?>
<script type="text/javascript">
	function feedburner() {
		window.open("http://feedburner.google.com/fb/a/pingSubmit?bloglink=http%3A%2F%2Ffeeds.adhs-studien" +
			".info%2FAdhsStudien", "_blank");
		window.open("http://feedburner.google.com/fb/a/pingSubmit?bloglink=http%3A%2F%2Ffeeds.adhs-studien.info%2FAdhdResearch", "_blank");
	}
	$(document).ready(function() {
		$("#admin").dataTable({
			"bPaginate": true,
			"bLengthChange": true,
			"bFilter": true,
			"bSort": true,
			"bInfo": true,
			"bAutoWidth": true,
            "stateSave": true,
			"bJQueryUI": true,
            "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]]
/*
			"bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "plugins/jquery-datatables/examples/server_side/scripts/server_processing.php"
			"fnServerData": function ( sSource, aoData, fnCallback ) {
				$.ajax( {
					"dataType": 'json',
					"type": "POST",
					"url": sSource,
					"data": aoData,
					"success": fnCallback
				} );
			}
*/
			//"sPaginationType": "full_numbers",
		});
	} );
</script>

<script type="text/javascript">
	$(document)
		.ready(function () {
			$(".edit_select")
				.change(function () {
					var iId = $(this)
						.attr("id");
					var tdId = iId.split("-", 2);
					var id = tdId[1];
					var field = tdId[0];
					var data = $(this)
						.val();
					var dataString = "id=" + id + "&field=" + field + "&value=" + data;
					$.ajax({
						type: "POST",
						url: "admin/cms/update_ajax.php",
						data: dataString,
						cache: false,
						success: function (html) {
						},
						error: function () {
							alert("Es ist ein Fehler aufgetreten!");
						}
					});
				});
			$(".edit_box").change(function () {
                var iId = $(this)
                    .attr("id");
                var tdId = iId.split("-", 2);
                var id = tdId[1];
                var field = tdId[0];
				if($(this).is(":checked")) {
                   var data = 1;
				} else {
                   var data = 0;
				}
				var dataString = "id=" + id + "&field=" + field + "&value=" + data;
				$.ajax({
					type: "POST",
					url: "admin/cms/update_ajax.php",
					data: dataString,
					cache: false,
					success: function (html) {
					},
					error: function () {
						alert("Es ist ein Fehler aufgetreten!");
					}
				});
			});
			$("#link_admin_adhs")
				.click(function () {
				});
		});
</script>

</body>
</html>
<?php
header("Content-Type: text/html; charset=utf-8");
// includes
include("cms/configuration.php");
include('../php/func_all_html_entities_decode.php');
include("cms/dataaccess.php");
include("cms/datadisplay.php");
include("cms/funktionen.inc.php");
// --------------------
echo'
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<base href="'.ROOT_ABS.'">
	<link href="'.ROOT_REL.'css/administration.css" rel="stylesheet" type="text/css"/>
	<script src="'.ROOT_REL.'admin/ckeditor/ckeditor.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="'.ROOT_REL.'js/ajax_edit_table.js"></script>
	<script src="'.ROOT_REL.'admin/jquery-ui-1.10.4/ui/minified/jquery-ui.min.js"></script>
	<link rel="stylesheet" type="text/css" href="'.ROOT_REL.'admin/jquery-ui-1.10.4/themes/redmond/jquery-ui-1.10.4.custom.min.css">
</head>
<body>';

// ausgabe des titels
if(isset($_REQUEST["action"])) {
	echo '
	<div id="wrapper">
	  <div id="navi">
		<a href="'.$_SERVER['PHP_SELF'].'?action=admin_adhs" title="&Uuml;bersicht"><img src="../img/icons/48x48_liste.png" /></a>
		<a href="'.$_SERVER['PHP_SELF'].'?action=form_adhs" style=\'margin-left:30px;\' title="Neue Seite"><img src="../img/icons/48x48_neu.png" /></a>
		<a href="http://dbadmin.one.com/index.php#PMAURL:server=1&target=main.php&token=a3dc1f2d1ab0d7a3ec4aebc0b3572c28" style=\'margin-left:30px;\' title="Datenbank direkt bearbeiten (phpMyAdmin)"><img src="../img/icons/48x48_db.png" /></a>
		<a href="'.$_SERVER['PHP_SELF'].'?action=doppel" style=\'margin-left:30px;\' title="Wartung"><img src="../img/icons/48x48_wartung.png" /></a>
		<a href="'.ROOT_ABS.'" style=\'margin-left:30px;\' title="Homepage in neuem Fenster anzeigen"><img src="../img/icons/48x48_welt.png" /></a>
		<a id="logoutLink" href="logout.php" style=\'margin-left:30px;\' title="Logout"><img src="../img/icons/48x48_logout.png" /></a>
		<hr />
	  </div>';
		
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
		case "admin_adhs": admin_adhs(); break;
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
			$data["icon"]			= $_REQUEST["icon"];
			$data["jahr"]			= $_REQUEST["jahr"];
			$data["sprache"]		= $_REQUEST["sprache"];
			$data["keywords"]		= mysql_real_escape_string(html_decode($_REQUEST["keywords"]));
			$data["keywords_en"]	= mysql_real_escape_string(html_decode($_REQUEST["keywords_en"]));
			$data["hidden"]			= $_REQUEST["hidden"];
			$data["pubdate"]		= date("D, j M Y H:i:s ").'GMT';
			$data["lastmod"]		= date('Y-n-j G:i:s');
			
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
			$data["icon"]			= $_REQUEST["icon"];
			$data["jahr"]			= $_REQUEST["jahr"];
			$data["sprache"]		= $_REQUEST["sprache"];
			$data["keywords"]		= mysql_real_escape_string(html_decode($_REQUEST["keywords"]));
			$data["keywords_en"]	= mysql_real_escape_string(html_decode($_REQUEST["keywords_en"]));
			if($data["hidden"])		
				$data["hidden"]		= $_REQUEST["hidden"];
			$data["pubdate"]		= date("D, j M Y H:i:s ").'GMT';
			$data["lastmod"]		= date('Y-n-j G:i:s');
			
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
			echo'<h2>Suche nach doppelten Eintr&auml;gen</h2>';
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
			}
			#print_r($doppel);
			#table_display($doppel, "form_kat", "del_kat");
			break;
	}
}

// ausgabe der inhalte in der datenbank
function admin_adhs() {
	$res = select("adhs_cont", "*", "", "", "id");
	arsort($res);
	echo "<br/><a href='?action=form_adhs'>Neue Inhalte einf&uuml;gen</a> | <a href='http://feedburner.google.com/fb/a/pingSubmit?bloglink=http%3A%2F%2Ffeeds.feedburner.com%2FAdhsStudien'>Ping FeedBurner</a>";
	#table_display($res, "form_adhs", "del_adhs");
	adhs_admin_tabelle($res, "form_adhs", "del_adhs");
	echo "<br/><a href='?action=form_adhs'>Neue Inhalte einf&uuml;gen</a> | <a href='http://feedburner.google.com/fb/a/pingSubmit?bloglink=http%3A%2F%2Ffeeds.feedburner.com%2FAdhsStudien'>Ping FeedBurner</a>";
}

// ausgabe des formulars zur neueingabe / aktualisierung
function form_adhs() {
	// vorbelegung des formulars
	if(isset($_REQUEST["id"])) {
		$res			= select("adhs_cont", "*", "id", $_REQUEST["id"], "");
		$entry			= $res[0];
		$kat			= _convert($entry["kat"]);
		$kat2			= _convert($entry["kat2"]);
		$kat3			= _convert($entry["kat3"]);
		$typ			= _convert($entry["typ"]);
		$titel			= _convert(strip_tags($entry["titel"]));
		$titel_en		= _convert(strip_tags($entry["titel_en"]));
		$text			= _convert($entry["text"]);
		$text_en		= _convert($entry["text_en"]);
		$autor			= _convert($entry["autor"]);
		$quelle			= _convert($entry["quelle"]);
		$link			= $entry["link"];
		$icon			= $entry["icon"];
		$jahr			= $entry["jahr"];
		$sprache		= $entry["sprache"];
		$keywords		= _convert($entry["keywords"]);
		$keywords_en	= _convert($entry["keywords_en"]);
		if($entry["hidden"] == "1")
		  $hidden		= " checked='checked'";
		else 
		  $hidden		= "";
	}	else {
		$kat			= "";
		$kat2			= "";
		$kat3			= "";
		$typ			= "";
		$titel			= "";
		$titel_en		= "";
		$text			= "";
		$text_en		= "";
		$autor			= "";
		$quelle			= "";
		$link			= "";
		$icon			= "";
		$jahr			= "2014";
		$sprache		= "";
		$keywords		= "";
		$keywords_en	= "";
		$hidden			= " checked='checked'";
	}
	// formular
	echo "<form method='post' action='".$_SERVER['PHP_SELF']."' enctype='multipart/form-data'>";
	echo "<div id='accordion'>";
	echo "<h3>Allgemeine Informationen</h3>";
	echo "<div>";
	
	echo "<div style='float:left;position:relative;width:50%'>";
	echo "<p>";
	echo "<label for='kat'>Kategorien:</label><br />";
	echo '<select id="kat" name="kat" size="1">';
	if(isset($_REQUEST["id"])) echo '<option value="'.$kat.'">- Nicht &auml;ndern -</option>';
	$kats = select("adhs_kat", "*", "", "", "");
	foreach($kats as $kat) {
		echo '<option value="'.$kat["id"].'">'.$kat["titel"].'</option>';
	}
	echo "</select>";
	echo "</p>";
	
	echo "<p>";
	echo '<select id="kat2" name="kat2" size="1">';
	if(isset($_REQUEST["id"])) echo '<option value="'.$kat.'">- Nicht &auml;ndern -</option>';
		else echo '<option value="">Keine</option>';
	foreach($kats as $kat) {
		echo '<option value="'.$kat["id"].'">'.$kat["titel"].'</option>';
	}
	echo "</select>";
	echo "</p>";

	echo "<p>";
	echo '<select id="kat3" name="kat3" size="1">';
	if(isset($_REQUEST["id"])) echo '<option value="'.$kat.'">- Nicht &auml;ndern -</option>';
		else echo '<option value="">Keine</option>';
	foreach($kats as $kat) {
		echo '<option value="'.$kat["id"].'">'.$kat["titel"].'</option>';
	}
	echo "</select>";
	echo "</p>";
	
	echo "<p>";
	echo "<label for='typ'>Typ:</label><br />";
	echo '<select id="typ" name="typ" size="1">';
		if(isset($_REQUEST["id"])) echo '<option value="'.$typ.'">- Nicht &auml;ndern -</option>'; else echo '<option></option>';
		echo '<option value="Dissertation">Dissertation</option>';
		echo '<option value="&Uuml;bersichtsarbeit">&Uuml;bersichtsarbeit</option>';
		echo '<option value="Originalarbeit">Originalarbeit</option>';
		echo '<option value="Sonstiges">Sonstiges</option>';
	echo "</select>";
	echo "</p>";
	
	echo "<p>";
	echo "<label for='icon'>Link-Typ:</label><br />";
	echo '<select id="icon" name="icon" size="1">';
		if(isset($_REQUEST["id"])) echo '<option value="'.$icon.'">- Nicht &auml;ndern -</option>';
		echo '<option value="0">PDF-Datei</option>';
		echo '<option value="1">Web-Link</option>';
		echo '<option value="2">Kein Link</option>';
	echo "</select>";
	echo "</p>";
	
	echo "<p>";
	echo "<label for='sprache'>Sprache:</label><br />";
	echo '<select id="sprache" name="sprache">';
		if(isset($_REQUEST["id"])) echo '<option value="'.$sprache.'">- Nicht &auml;ndern -</option>';
		echo '<option value="0">DE</option>';
		echo '<option value="1">EN</option>';
	echo '</select>';
	echo "</p>";
	
	echo "<p>";
	echo "<label for='jahr'>Jahr:</label><br />";
	echo "<input type='text' id='jahr' name='jahr' value='".$jahr."'>
		 <script>
			$('#jahr').spinner();
		</script>";
	echo "</p>";
	
	echo "</div>";
	
	echo "<div style='float:left;position:relative;width:50%'>";
	
if($icon == "0" && $link != "") {
	$pdflink = pdf_link_test($link);
	echo "<p>";
	echo "<label for='link'>Link:</label><br />";
	echo "<input type='text' id='link' name='link' value='".$link."'> (".$pdflink.")";
	echo "</p>";
} else {
	echo "<p>";
	echo "<label for='dokument'>Dokument hochladen:</label><br />";
	echo "<input type='file' id='dokument' name='dokument'>";
	echo "</p>";
	
	echo "<p>";
	echo "<label for='link'>Link:</label><br />";
	echo "<input type='url' id='link' name='link' value='".$link."'>";
	echo "</p>";
}	
	echo "<p>";
	echo "<label for='autor'>Autor:</label><br />";
	echo "<input type='text' id='autor' name='autor' value='".$autor."'>";
	echo "</p>";
	
	echo "<p>";
	echo "<label for='quelle'>Quelle:</label><br />";
	echo "<input type='text' id='quelle' name='quelle' value='".$quelle."'>";
	echo "</p>";
	
	echo "
	  <div class='ui-checkbox'>
        <input type='checkbox' id='hidden' name='hidden' value='1' ".$hidden."/>
        <label for='hidden'>Versteckt</label>
      </div>";
	  
	echo "</div>";
	echo "</div>";
	
	echo "<h3><img src='../img/de.png' alt='deutsch'>&nbsp;Deutsch</h3>";
	echo "<div>";
	
	echo "<div style='float:left;position:relative;width:50%'>";
	echo "<p>";
	echo "<label for='titel'>Deutscher Titel:</label><br />";
	echo "<input type='text' name='titel' value='".$titel."'  style='width:90%'>";
	echo "</p>";
	echo "</div>";
	
	echo "<div style='float:left;position:relative;width:50%'>";
	echo "<p>";
	echo "<label for='keywords'>Deutsche Keywords:</label><br />";
	echo "<input type='text' name='keywords' value='".$keywords."' style='width:100%'>";
	echo "</p>";
	echo "</div>";
	
	echo "<textarea id='text' name='text'>".$text."</textarea>
		<script type='text/javascript'>
			CKEDITOR.replace('text',
				{
					scayt_sLang			: 'de_DE',
				});
		</script>";
	echo "</div>";
	
	echo "<h3><img src='../img/en.png' alt='englisch'>&nbsp;Englisch</h3>";
	echo "<div>";
	
	echo "<div style='float:left;position:relative;width:50%'>";
	echo "<p>";
	echo "<label for='titel_en'>Englischer Titel:</label><br />";
	echo "<input type='text' name='titel_en' value='".$titel_en."'  style='width:90%'>";
	echo "</p>";
	echo "</div>";
	
	echo "<div style='float:left;position:relative;width:50%'>";
	echo "<p>";
	echo "<label for='keywords_en'>Englische Keywords:</label><br />";
	echo "<input type='text' name='keywords_en' value='".$keywords_en."' style='width:100%'>";
	echo "</p>";
	echo "</div>";
	
	echo "<textarea id='text_en' name='text_en'>".$text_en."</textarea>
		<script type='text/javascript'>
			CKEDITOR.replace('text_en',
				{
					scayt_sLang			: 'en_GB',
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
		echo "<input type='hidden' name='action' value='update_adhs'/>";
	}	else {
		echo "<input type='hidden' name='action' value='insert_adhs'/>";
	}
	echo "</form>";
}
?>
</body>
</html>
<?php

/* ************************ */
/* *** Kategorien laden *** */
/* ************************ */
function artikel( $conid ) {
	// Wenn in der aufgerufenen Adresse die Zeichenkette "de" übergeben wurde,
	// wird die Seitensprache auf Deutsch (0) gesetzt. Bei "en" auf Englisch (1). Ansonsten Standard.
	if($_GET['lang'] == "en") $seitensprache = 0;
	elseif($_GET['lang'] == "de") $seitensprache = 0; # HACK
	else {
		#sprachen
		$allowed_langs = array('de', 'en');
		#sprache des browsers ermitteln
		$userlang = lang_getfrombrowser($allowed_langs, 'de', null, false);
		if($userlang == 'en')  $seitensprache = 0;
		if($userlang == 'de') $seitensprache = 0; # HACK
	}
	#echo 'Seitensprache: '.$seitensprache;
	// Die aufgerufene Adresse (z.B. http://www.domain.tld/ordner/dateiname.html)
	// wird am Slash (/) zerlegt und mittels array_pop() wird der letzte Teil des Array
	// (dateiname.html) abgetrennt und in der Variable $aufgerufene_url abgelegt.
	$aufgerufene_url = array_pop( explode( "/", $_GET['url'] ) );
	// Prüft ob ein Dateiname aufgerufen wurde.
	// Ist kein Wert vorhanden, wurde die Index Datei oder eine unbekannte Datei aufgerufen.
	if (!isset( $aufgerufene_url ) || empty( $aufgerufene_url )) {
		// Setzt manuell den Artikel Alias für die Startseite
		$alias = "home";
	} else {
		// Ist ein Wert vorhanden, haben wir hier eine Zeichenkette nach dem Muster von
		// z.B. dateiname.html
		// Diesen String zerlegen wir wieder mit explode am Punkt (.) aber diesmal
		// trennen wir den ersten Teil des Array ab, da sich darin unser benötigter Artikel Alias
		// befindet. array_shift() ist also das Gegenstück zu array_pop()
		$alias = array_shift( explode( ".", $aufgerufene_url ) );
	}
	// Datensatz aus der DB laden
	// Prüfen ob eine gültige Resource ID (geöffnete DBverbindung) vorhanden ist
	if ($conid) {
		// Artikel mit dem entsprechenden Alias auslesen
		$pdflink = 'docs/'.$alias.'.pdf';
		$adhs_kat = select("adhs_kat", "*", "link_title", $alias, "id"); # prüft ob $alias der titel einer kategorie ist
		$adhs_cont = select("adhs_cont", "*", "link", $pdflink, ""); # prüft ob $pdflink der link zu einer eingetragenen pdf-datei ist

		// wenn $adhs_kat[0] mehr als ein element enthält, wird die kategorie an $ergebnis übergeben
		if (count($adhs_kat[0]) > 1) {
			if ($adhs_kat[0]["include"] != "") {
				# php-datei einbinden
				$ergebnis = array(0 => $adhs_kat[0], 1 => $seitensprache, 2 => 'include');
			} else {
				# listenansicht laden
				$ergebnis = array(0 => $adhs_kat[0], 1 => $seitensprache, 2 => 'list');
			}
			// wenn $adhs_cont[0] mehr als ein element enthält, wird $alias an $ergebnis übergeben
		} elseif (count($adhs_cont[0]) > 1) {
			$alias = array_pop( explode( "/", $adhs_cont[0]['link'] ) );
			$alias = array_shift( explode( ".", $alias ) );
			$ergebnis = array(0 => $alias, 1 => $seitensprache, 2 => 'single');

			// wenn weder eine kategorie noch die einzelansicht geladen wurde wird die error-seite aufgerufen
		} else {
			$error404 = select("adhs_kat", "*", "id", 18, "");
			$ergebnis = array(0 => $error404[0], 1 => $seitensprache, 2 => 'include');
		}
		return $ergebnis;
	}
}
// Navigation laden
$kat = artikel( $conid );

#---------------------------------------------------------------------------------------

/* ************************ */
/* ***  Seitenelemente  *** */
/* ************************ */

# META-TAGS
/**
 * @param $kat
 * @param $cont
 * @param $seitensprache
 * @return array
 */
function meta_tags($kat, $cont, $lit, $seitensprache = 0) {
	# meta_tags in der EINZELANSICHT
	if ($kat[2] == 'single') {
		# datum / DC.date
		if($cont[0]["lastmod"] != '') {
			$timestamp = date_create($cont[0]["lastmod"]);
			$lastmod = date_format($timestamp, 'Y-m-d');
		} else {
            $timestamp = time();
            $lastmod = date_format($timestamp, 'Y-m-d');
        }
        if($cont[0]["pubdate"] != '') $pubdate = $cont[0]["pubdate"];
        # quelle / DC.source
		if($cont[0]["quelle"] != '') $source = $cont[0]["quelle"];
		# pdf-link / DC.relation.references
		if($cont[0]["link"] != '') $references = ROOT_ABS.$cont[0]["link"];
		# jahr / DC.coverage.temporal
		if($cont[0]["jahr"] != '') $jahr = $cont[0]["jahr"];
		# autor / DC.creator
		if($cont[0]["autor"] != '') $autor = all_html_entities_decode($cont[0]["autor"], 1);
		# deutsche und englische titel bilden, soweit diese vorhanden sind
		if($cont[0]["titel_en"] != '' && $cont[0]["text_en"] != '') $trans_2_en = true; else {$trans_2_en = false; $seitensprache = 0;}
		if($cont[0]["titel"] != '' && $cont[0]["text"] != '') $trans_2_de = true; else {$trans_2_de = false; $seitensprache = 1;}
		if($cont[0]["titel"] != '') {
			$meta_titel_de = html_entity_decode($cont[0]["titel"]);
			$meta_desc_de = html_entity_decode($cont[0]["titel"]);
		} else {
			$meta_titel_de = html_entity_decode($cont[0]["titel_en"]);
			$meta_desc_de = html_entity_decode($cont[0]["titel_en"]);
		}
		if($cont[0]["titel_en"] != '') {
			$meta_titel_en = html_entity_decode($cont[0]["titel_en"]);
			$meta_desc_en = html_entity_decode($cont[0]["titel_en"]);
		} else {
			$meta_titel_en = html_entity_decode($cont[0]["titel"]);
			$meta_desc_en = html_entity_decode($cont[0]["titel"]);
		}
		# link für die deutsche und die englische version bilden
		$bookmark_link_de = ROOT_ABS.$kat[0].'.html';
		#$bookmark_link_en = ROOT_ABS.$kat[0].'.html?lang=en';
		# meta_tags generieren
		if($seitensprache == 1) { # einzelansicht englisch
			$meta_language = 'en';
			$rss_feed = 'AdhdResearch';
			#$alternate = 'href="'.$bookmark_link_de.'" hreflang="de" lang="de" title="'.$meta_titel_de.'"';
			# falls ein englischer titel vorhanden ist, wird dieser statt dem deutschen benutzt
			$meta_titel = $meta_titel_en;
			if($cont[0]["keywords_en"] != '') $meta_keys = $cont[0]["keywords_en"]; else $meta_keys = 'add, adhd, studie, ADHD in adulthood, comorbidity';
			# falls ein englischer text vorhanden ist, wird dieser statt dem deutschen benutzt
			if($cont[0]["text_en"] != '') $text = $cont[0]["text_en"]; else $text = $cont[0]["text"];
			$meta_desc = html_entity_decode($meta_desc_en);
			$titel = 'Single View';
		} else { # einzelansicht deutsch
			$meta_language = 'de';
			$rss_feed = 'AdhsStudien';
			#$alternate = 'href="'.$bookmark_link_en.'" hreflang="en" lang="en" title="'.$meta_titel_en.'"';
			$meta_titel = $meta_titel_de;
			if($cont[0]["keywords"] != '') $meta_keys = $cont[0]["keywords"]; else $meta_keys = 'adhs, ads, studien, Studie, medikinet, Aufmerksamkeitsdefizit, Hyperaktivitätsstörung';
			$meta_desc = html_entity_decode($meta_desc_de);
			$titel = 'Einzelansicht';
		}
		#$bookmark_link = ROOT_ABS.$kat[0].'.html?lang='.$meta_language;
		$standard_link = ROOT_ABS.$kat[0].'.html';
		# meta citation vars
		// prüft ob $adhs_lit[0] mehr als ein element enthält
			if (count($lit[0]) > 1) {
				if ($lit[0]["title_full"] != "") $journal_title = _convert($lit[0]["title_full"]);
                elseif ($lit[0]["quelle"] != "") $journal_title = _convert($lit[0]["quelle"]);
				if ($lit[0]["band"] != "") $volume = $lit[0]["band"];
				if ($lit[0]["nr"] != "") $issue = $lit[0]["nr"];
				if ($lit[0]["seiten"] != "") {
					$page_range = explode("-", $lit[0]["seiten"]);
					$firstpage = $page_range[0];
					$lastpage = $page_range[1];
				}
				if ($lit[0]["doi"] != "") $doi = _convert($lit[0]["doi"]);
				if ($lit[0]["autor"] != "") {
					$autor = _convert($lit[0]["autor"]);
					$autoren = explode(";", $autor);
				}
			} else {
				$autoren = str_replace("&",",",$autor);
				$autoren = rtrim($autoren, "et al.");
				$autoren = explode(",", $autoren);
			}
		# meta_tags in der LISTENANSICHT
	} else {
		# datum
		if($cont != '') $timestamp = date_create($cont[0]["lastmod"]);
        else $timestamp = time();
		$lastmod = date_format($timestamp, 'Y-m-d');
        if($cont[0]["pubdate"] != '') $pubdate = $cont[0]["pubdate"];
        # deutsche und englische titel bilden, soweit diese vorhanden sind
		if($kat[0]["titel_en"] != '') $titel_en = $kat[0]["titel_en"]; else $titel_en = $kat[0]["titel"];
		if($kat[0]["titel"] != '') $titel_de = $kat[0]["titel"]; else $titel_de = $kat[0]["titel_en"];
		$meta_titel_en = html_entity_decode('ADHD research - '.$titel_en);
		$meta_titel_de = html_entity_decode('ADHS Studien - '.$titel_de);
		# link für die deutsche und die englische version bilden
		$bookmark_link_de = ROOT_ABS.$kat[0]["link_title"].'.html';
		#$bookmark_link_en = ROOT_ABS.$kat[0]["link_title"].'.html?lang=en';
		# meta_tags englisch
		if($seitensprache == 1) {
			$meta_language = 'en';
			$rss_feed = 'AdhdResearch';
			$titel = $titel_en;
			$meta_titel = $meta_titel_en;
			if($kat[0]["meta_keys_en"] != '') $meta_keys = $kat[0]["meta_keys_en"]; else $meta_keys = $kat[0]["meta_keys"];
			if($kat[0]["meta_desc_en"] != '') $meta_desc = $kat[0]["meta_desc_en"]; else $meta_desc = $kat[0]["meta_desc"];
			# meta_tags deutsch
		} else {
			$meta_language = 'de';
			$rss_feed = 'AdhsStudien';
			$titel = $titel_de;
			$meta_titel = $meta_titel_de;
			if($kat[0]["meta_keys"] != '') $meta_keys = $kat[0]["meta_keys"]; else $meta_keys = $kat[0]["meta_keys_en"];
			if($kat[0]["meta_desc"] != '') $meta_desc = $kat[0]["meta_desc"]; else $meta_desc = $kat[0]["meta_desc_en"];
		}
		#$bookmark_link = ROOT_ABS.$kat[0]["link_title"].'.html?lang='.$meta_language;
		$standard_link = ROOT_ABS.$kat[0]["link_title"].'.html';
	}
	#sammeln der daten
	$meta_tags = array(
		'rss_feed'          => $rss_feed,
		'bookmark_link_de'  => rawurlencode($bookmark_link_de),
		'bookmark_link_en'  => rawurlencode($standard_link),
		'meta_language'     => $meta_language,
		'meta_titel'        => _convert($meta_titel),
		'meta_keys'         => _convert($meta_keys),
		'meta_desc'         => all_html_entities_decode(_convert($meta_desc), $mode = 1),
		'titel'             => _convert($titel),
		'bookmark_link'     => rawurlencode($standard_link),
		'quelle'            => html_decode(_convert($source)),
		'standard_link'     => _convert($standard_link),
		'autor'             => html_decode(_convert($autor)),
		'autoren'           => html_decode(_convert($autoren)),
		'journal_title'     => $journal_title,
		'volume'            => $volume,
		'issue'             => $issue,
		'firstpage'         => $firstpage,
		'lastpage'          => $lastpage,
		'doi'               => $doi,
		'pubdate'           => $pubdate,
		'lastmod'           => $lastmod
	);

	if ($kat[0]["link_title"] == "error404") {
		header("HTTP/1.1 404");
		echo '
		<meta name="robots" content="noindex, follow">
		<meta name="googlebot" content="noindex, follow">';
	} else {
		echo '
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="alternate" title="RSS-Feed" href="https://feeds.feedburner.com/'.$rss_feed.'">
	<link rel="schema.DC" href="http://purl.org/dc/terms/">
	<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/">
	<meta name="DC.subject" lang="'.$meta_tags['meta_language'].'" content="'.$meta_tags['meta_keys'].'">
	<meta name="DC.description" content="'. substr($meta_tags['meta_desc'], 0, 150) .'">
	<meta name="DC.date" content="'.$lastmod.'">
	<meta name="DC.type" content="Text">
	<meta name="DC.format" content="text/html">
	<meta name="DC.identifier" content="'.$meta_tags['bookmark_link'].'">
	<meta name="DC.language" content="'.$meta_tags['meta_language'].'">
	<meta name="DC.title" content="'.$meta_tags['meta_desc'].'">';
		#var_dump($meta_tags);
		# nur in der EINZELANSICHT
		if ($kat[2] == 'single') {
			echo '
	<meta name="DC.creator" content="'.$meta_tags['autor'].'">
	<meta name="DC.source" content="'.$meta_tags['quelle'].'">
	<meta name="DC.relation.references" scheme="URI" content="'.$references.'">
	<meta name="DC.coverage.temporal" scheme="W3CDTF" content="'.$jahr.'">
	<meta name="DC.rights" content="Alle Rechte unterliegen dem Autor">
	<meta name="citation_title" content="'.$meta_tags['meta_desc'].'">
	<meta name="citation_publication_date" content="'.$jahr.'">
	<meta name="citation_abstract_html_url" content="'.$meta_tags['standard_link'].'">
	<meta name="citation_pdf_url" content="'.$references.'">
	<meta name="citation_language" content="'.$meta_language.'">';

			if (count($lit[0]) > 1) {
				echo '
	<meta name="citation_journal_title" content="'.$meta_tags["journal_title"].'">
	<meta name="citation_volume" content="'.$meta_tags["volume"].'">
	<meta name="citation_issue" content="'.$meta_tags["issue"].'">
	<meta name="citation_firstpage" content="'.$meta_tags["firstpage"].'">
	<meta name="citation_lastpage" content="'.$meta_tags["lastpage"].'">
	<meta name="citation_doi" content="'.$meta_tags["doi"].'">';
			} else {
			}
			foreach($autoren as $c_author) {
				echo '
	<meta name="citation_author" content="'.trim($c_author).'">';
			}
		} else {
            echo'
    	<meta name="author" content="Thomas Stuppy">
			<meta name="DC.publisher" content="Thomas Stuppy, adhs.studien@gmail.com">
			<meta name="DC.contributor" content="Thomas Stuppy">';
        }
	echo '<meta name="reply-to" content="adhs.studien@gmail.com">';
		if($cont[0]["hidden"] != "1" && $kat[0]["hidden"] != "1")
            echo '<meta name="robots" content="index, follow">
		    <meta name="googlebot" content="index, follow">';
	else echo '
	    <meta name="robots" content="noindex, nofollow">
		<meta name="googlebot" content="noindex, follow">';
		echo '
	<meta name="keywords" content="'.$meta_tags['meta_keys'].'">
	<meta name="description" content="'.quote2entities($meta_tags['meta_desc']).'">
	<meta name="viewport" content="user-scalable=no, width=device-width">
	<meta name="last-modified" content="'.$lastmod.'">
	<title>'.$meta_tags['meta_titel'].'</title>';
	}
	return $meta_tags;
}


# CONTENT LISTENANSICHT
function content_liste($kat, $cont, $seitensprache = 0, $img) {
	foreach($cont as $con) {
		if($con["hidden"] != "1") {
			# englische texte verwenden, falls vorhanden
			if($seitensprache == 1) {
				if($con["titel_en"] != '') $tmp_titel = $con["titel_en"]; else $tmp_titel = $con["titel"];
				if($con["text_en"] != '') $tmp_text = $con["text_en"]; else $tmp_text = $con["text"];
				# deutsche texte verwenden, falls vorhanden
			} else {
				if($con["titel"] != '') $tmp_titel = $con["titel"]; else $tmp_titel = $con["titel_en"];
				if($con["text"] != '') $tmp_text = $con["text"]; else $tmp_text = $con["text_en"];
			}
			$tmp_titel = strip_tags(html_decode($tmp_titel));
			$tmp_text = html_decode($tmp_text);
			$id = $con["id"];
			$kat = $con["kat"];
			$quelle = html_decode($con["quelle"]);
			$autor = html_decode($con["autor"]);
			$doi = $con["doi"];
			$icon = $con["icon"];
			# titel bilden
			if ($icon == "0") {
				$link = @array_pop( explode( "/", $con["link"] ) );
				$link = @array_shift( explode( ".", $link ) );
				$titel = '<a href="'.ROOT_REL.$link.'.html" title="Detail-Ansicht">'.$tmp_titel.'</a>';
				# text / inhalt
				$text = $tmp_text;
				$text = strip_tags($text);
				$text = substr($text, 0, 220);
				$text = $text.' [<a href="'.ROOT_REL.$link.'.html" title="Detail-Ansicht">...</a>]';
			} elseif ($icon == "1") {
				$titel = '<a href="'.$con["link"].'" target="_blank"><img height="15" width="15" src="'.PATH_ICONS.'external-link.png" alt="Link" /> '.$tmp_titel.'</a>';
				$text = '<p>'.$tmp_text.'</p>';
			} else {
				$titel = $tmp_titel;
				$text = $tmp_text;
			}
			if ($con["id"] == "5") $text = '<script src="http://feeds.adhs-studien.info/AdhsStudien?format=sigpro"></script>'; # Updates
			# benannter anker
			$anker = '<a id="'.$id.'"></a>';
			# ausgabe content-elemente
			if ($autor != '')
				echo '<p style="color: #666; margin-top: 18px; margin-bottom: -18px;">'.$autor.'</p>';
			echo '<h4>'.$anker.$titel.'</h4>';
			echo '<p>';
			if ($text != '')
				echo $text.'<br>';
			if ($quelle != '')
				echo '<small style="color: #666">in <i>'.$quelle.'</i></small><br>';
			if ($doi != '')
				echo '<small style="color: #666">doi: <i>'.$doi.'</i></small>';
			echo '</p>';
		}
	}
}

# CONTENT EINZELANSICHT
function content_single($cont, $seitensprache = 0, $navi) {
	$kat_ids	= array("1" => $cont["kat"], "2" => $cont["kat2"], "3" => $cont["kat3"]);
	$disabled_tabs	= array();
	$kategorien	= show_kats($navi, array_filter($kat_ids));
	# englisch
	if($cont["titel"] != '')        $titel = $cont["titel"]; else $titel = '---';
	if($cont["titel_en"] != '')     $titel_en = $cont["titel_en"]; else $titel_en = '---';
	if($cont["text"] != '')         $text = $cont["text"]; else  $disabled_tabs[0] = 0;
	if($cont["text_en"] != '')      $text_en = $cont["text_en"]; else  $disabled_tabs[1] = 1;;
	if($cont["keywords"] != '')     $keywords = $cont["keywords"]; else $keywords = '---';
	if($cont["keywords_en"] != '')  $keywords_en = $cont["keywords_en"]; else $keywords_en = '---';

	if($cont["doi"] != '')  $doi = $cont["doi"]; else $doi = '---';

	$link = $cont["link"];
	$lastmod = $cont["lastmod"];
	#$titel = all_html_entities_decode(strip_tags($titel));
	if($cont["sprache"] == "0") {
		$lang = 'de';
		$lang_icon = '<img src="'.PATH_ICONS.'de.png" alt="Deutsch" />';
	} elseif($cont["sprache"] == "1") {
		$lang = 'en';
		$lang_icon = '<img src="'.PATH_ICONS.'en.png" alt="Englisch" />';
	}
	if($cont["typ"] != "")		$typ = all_html_entities_decode(_convert($cont["typ"]), $mode = 0); else $typ = '---';
	if($cont["autor"] != "")	$autor = all_html_entities_decode(_convert($cont["autor"]), $mode = 0); else $autor = '---';
	if($cont["quelle"] != "")	$quelle = all_html_entities_decode(_convert($cont["quelle"]), $mode = 0); else $quelle = '---';
	if($cont["jahr"] != "")		$jahr = $cont["jahr"]; else $jahr = '---';
	if($keywords != "")			$keywords = all_html_entities_decode(_convert($keywords), $mode = 0); else $keywords = '---';
	# titel bilden
	if (file_exists(ROOT_SYS.$link)) { # dateigröße ermitteln
		$filesize				= filesize(ROOT_SYS.$link)/1000;
		$filesize				= round($filesize,1);
		$download				= ' <a href="'.ROOT_REL.$link.'" title="PDF-Datei herunterladen" target="_blank">Volltext</a> (PDF, '.$filesize.' kb)';
	} else  $disabled_tabs[3] = 3;
	$active_tab = 0;
	while (in_array($active_tab, $disabled_tabs)) {
		$active_tab++;
	}
	echo '
	<div id="tabs">
		<ul>
			<li lang="de"><a href="'.$_SERVER['REQUEST_URI'].'#tabs-0">Abstract (deutsch)</a></li>
			<li lang="en"><a href="'.$_SERVER['REQUEST_URI'].'#tabs-1">Abstract (englisch)</a></li>
			<li><a href="'.$_SERVER['REQUEST_URI'].'#tabs-2">Details</a></li>
			<li lang="'.$lang.'"><a href="'.$_SERVER['REQUEST_URI'].'#tabs-3">Volltext (pdf, '.$filesize.' kb)</a></li>
		</ul>
		<div id="tabs-0" lang="de">
			<h4>'.$titel.'</h4>
			'.$text.'
			<p><strong>Kategorien:</strong> '.$kategorien['de'].'</p>
		</div>
		<div id="tabs-1" lang="en">
			<h4>'.$titel_en.'</h4>
			'.$text_en.'
			<p><strong>Kategorien:</strong> '.$kategorien['en'].'</p>
		</div>
		<div id="tabs-2">
			<table id="info">
				<tr>
					<th>Typ:</th><td>'.$typ.'</td>
				</tr>
				<tr>
					<th>Autor:</th><td>'.$autor.'</td>
				</tr>
				<tr>
					<th>Quelle:</th><td>'.$quelle.'</td>
				</tr>
				<tr>
					<th>Jahr:</th><td>'.$jahr.'</td>
				</tr>
				<tr>
					<th>Keywords (deutsch):</th><td>'.$keywords.'</td>
				</tr>
				<tr>
					<th>Keywords (englisch):</th><td>'.$keywords_en.'</td>
				</tr>
				<tr>
					<th>DOI:</th><td>'.$doi.'</td>
				</tr>
			</table>
		</div>
		<div id="tabs-3" lang="'.$lang.'">
			<embed src="'.ROOT_REL.$link.'#view=Fit" width="731" height="600" alt="pdf" pluginspage="http://www.adobe
			.com/products/acrobat/readstep2.html">
		</div>
	</div>

	<script>
		$( "#tabs" ).tabs({
			disabled: [ '. implode(",", $disabled_tabs) .' ],
			active: '.$active_tab.'
		});
	</script>

	<aside>
	<p style="padding-top:30px"><em>Letzte &Auml;nderung: '.$lastmod.'</em></p>
	</aside>';

	#<p style="text-align:center;padding-top:10px">'.$lang_icon.$download.'</p>
	#var_dump($lit);
	#print_r($_SERVER);
}

function pdf_link_test($pdflink) {
	$icon = '<img src="'.PATH_ICONS.'pdf_icon.png" width="15" height="15" alt="Externer Link" />';
	if(!is_file(ROOT_SYS.$pdflink)) $style = " class='rot'";
	else $style = "";
	$link = "<a href='".ROOT_ABS.$pdflink."'".$style." target='_blank'>".$icon."Link</a>";
	return $link;
}

// Browsersprache ermitteln
function lang_getfrombrowser ($allowed_languages, $default_language, $lang_variable, $strict_mode) {
	// $_SERVER['HTTP_ACCEPT_LANGUAGE'] verwenden, wenn keine Sprachvariable mitgegeben wurde
	if ($lang_variable === null) {
		$lang_variable = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
	}
	// wurde irgendwelche Information mitgeschickt?
	if (empty($lang_variable)) {
		// Nein? => Standardsprache zurð£«§eben
		return $default_language;
	}
	// Den Header auftrennen
	$accepted_languages = preg_split('/,\s*/', $lang_variable);
	// Die Standardwerte einstellen
	$current_lang = $default_language;
	$current_q = 0;
	// Nun alle mitgegebenen Sprachen abarbeiten
	foreach ($accepted_languages as $accepted_language) {
		// Alle Infos ð¢¥² diese Sprache rausholen
		$res = preg_match ('/^([a-z]{1,8}(?:-[a-z]{1,8})*)'.
		'(?:;\s*q=(0(?:\.[0-9]{1,3})?|1(?:\.0{1,3})?))?$/i', $accepted_language, $matches);
		// war die Syntax gð¬´©g?
		if (!$res) {
			// Nein? Dann ignorieren
			continue;
		}
		// Sprachcode holen und dann sofort in die Einzelteile trennen
		$lang_code = explode ('-', $matches[1]);
		// Wurde eine Qualitå´ mitgegeben?
		if (isset($matches[2])) {
			// die Qualitå´ benutzen
			$lang_quality = (float)$matches[2];
		} else {
			// Kompabilitätsmodus: Qualitå´ 1 annehmen
			$lang_quality = 1.0;
		}
		// Bis der Sprachcode leer ist...
		while (count ($lang_code)) {
			// mal sehen, ob der Sprachcode angeboten wird
			if (in_array (strtolower (join ('-', $lang_code)), $allowed_languages)) {
				// Qualitå´ anschauen
				if ($lang_quality > $current_q) {
					// diese Sprache verwenden
					$current_lang = strtolower (join ('-', $lang_code));
					$current_q = $lang_quality;
					// Hier die innere while-Schleife verlassen
					break;
				}
			}
			// Wenn wir im strengen Modus sind, die Sprache nicht versuchen zu minimalisieren
			if ($strict_mode) {
				// innere While-Schleife aufbrechen
				break;
			}
			// den rechtesten Teil des Sprachcodes abschneiden
			array_pop ($lang_code);
		}
	}
	// die gefundene Sprache zurückgeben
	return $current_lang;
}

function findAttribute($object, $attribute) {
    foreach($object->attributes() as $a => $b) {
        if ($a == $attribute) {
            $return = $b;
        }
    }
    if($return) {
        return $return;
    }
}


// OPENURL
// http://www.crossref.org/openurl/?id=doi:10.1007/s00439-012-1164-4&noredirect=true&pid=adhs.studien@gmail.com&format=xml

// HTTP
// http://doi.crossref.org/search/doi?pid=adhs.studien@gmail.com&format=unixsd&doi=10.1007/s00439-012-1164-4
// http://doi.crossref.org/search/doi?pid=adhs.studien@gmail.com&format=unixsd&doi=10.1007/s00439-012-1164-4

function getRequest($host, $url)
{
    $port = 80;
    $timeout = 30;
	#$url = rawurlencode($url);
	$fp = fsockopen($host, $port, $errno, $errstr, $timeout);
	$data ='';
    if($fp)
    {
        $request = "GET ".$url." HTTP/1.1\r\n";
        $request.= "Host: ".$host."\r\n";
        $request.= "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; de-DE; rv:1.7.12) Gecko/20050919 Firefox/1.0.7\r\n";
        $request.= "Connection: Close\r\n\r\n";
        fwrite($fp, $request);
        while (!feof($fp))
        {
            @$data .= fgets($fp, 128);
        }
        fclose($fp);
        list($header, $html) = explode("\r\n\r\n", $data);
        #echo $html;
        return $html;
    }
    else
    {
        echo "ERROR: ".$errstr;
        return false;
    }
}

function pubmedIdConverter($id) {
    $client = 'http://www.pubmedcentral.nih.gov/utils/idconv/v1.0/?';
    // hier liegt das Zend Framework
    $s_include_path = "/customers/7/5/3/adhs-studien.info/httpd.www/plugins";
    // Include Pfad setzen, bzw. um neuen Include Pfad erweitern
    set_include_path($s_include_path . PATH_SEPARATOR . get_include_path());
    // load Zend classes
    require_once 'Zend/Loader.php';
    Zend_Loader::loadClass('Zend_Rest_Client');
    try {
        // initialize REST client
        $ids = new Zend_Rest_Client($client);
        // set query parameters
        $ids->ids($id); # DOI || PMID || PMCID
        $ids->versions('no');
        // perform request
        // get page content as XML
        $result             = $ids->get();
        #var_dump($result);
        $result             = $result->pmcids;
        $status_request     = (string)$result->attributes()->status;
        if($status_request == 'ok') {
            $status_result  = (string)$result->record->attributes()->status;
            if($status_result != 'error') {
                $doi             = (string)$result->record->attributes()->doi;
                $pmid            = (string)$result->record->attributes()->pmid;
                $pmcid           = (string)$result->record->attributes()->pmcid;
                #---
                $conv_ids = array(
                    'status'    => 'ok',
                    'doi'       => $doi,
                    'pmid'      => $pmid,
                    'pmcid'     => $pmcid,
                );
            } else $conv_ids = array('status' => 'error');
        } else $conv_ids = array('status' => 'error');
        #---
        #var_dump($conv_ids);
        return $conv_ids;
    } catch (Exception $e) {
        die('ERROR: ' . $e->getMessage());
    }
}

function zendDoiRequest($doi) {
    #$qdata = rawurlencode($qdata);
    #$client = 'http://doi.crossref.org/servlet/query?';
    #$client = 'http://doi.crossref.org/search/doi?';
    $client = 'http://www.crossref.org/openurl/?';
    $pid = 'adhs.studien@gmail.com';
	// hier liegt das Zend Framework
	$s_include_path = "/var/www/ADHS-Studien/plugins";
	// Include Pfad setzen, bzw. um neuen Include Pfad erweitern
	set_include_path($s_include_path . PATH_SEPARATOR . get_include_path());
    // load Zend classes
    require_once 'Zend/Loader.php';
    Zend_Loader::loadClass('Zend_Rest_Client');
    try {
        // initialize REST client
        $metadata = new Zend_Rest_Client($client);
        // set query parameters
        $metadata->id('doi:'.$doi);
        $metadata->noredirect(true);
        $metadata->pid($pid);
        $metadata->format('unixsd');
        // perform request
        // get page content as XML
        $result             = $metadata->get();
        $result             = $result->query_result->body->query;
        $status             = findAttribute($result, 'status');
        #$language           = findAttribute($result, 'language');
        $doi                = (string)$result->doi;
        #$verlag            = $result->getElementsByTagName('crm-item')->item(0)->nodeValue;
        #$status             = (string)$result->attributes()->status;
        $journal            = $result->doi_record->crossref->journal;
        $journal_metadata   = $journal->journal_metadata;
        #$journal_meta_attr  = $journal_metadata->attributes();
        $language           = $journal->journal_metadata->attributes()->language;
        $journal_meta_child = $journal_metadata->children();
        $full_title         = $journal_meta_child->full_title;
        $abbrev_title       = $journal_meta_child->abbrev_title;
        $_issn              = $journal_meta_child->issn;
        $issn[0]['name']    = (string)$_issn[0];
        $issn[1]['name']    = (string)$_issn[1];
        ($issn[0]['name'] != '')
            ? $issn[0]['type']    = (string)$_issn[0]->attributes()->media_type
            : $issn[0]['type']    = '';
        ($issn[1]['name'] != '')
            ? $issn[1]['type']    = (string)$_issn[1]->attributes()->media_type
            : $issn[1]['type']    = '';
        $quelle             = array(
            "title_abbrev"  => (string)$abbrev_title,
            "title_full"    => (string)$full_title
        );
        $journal_volume     = $journal->journal_issue->journal_volume->volume;
        $journal_issue      = $journal->journal_issue->issue;
        $journal_article    = $journal->journal_article;
        $title1             = $journal_article->titles[0]->title;
        $title2             = $journal_article->titles[2]->title;
        $person_name        = $journal_article->contributors->person_name;
        $publication_date   = $journal_article->publication_date;
        $year               = $publication_date[0] -> year;
        $first_page         = $journal_article->pages->first_page;
        $last_page          = $journal_article->pages->last_page;
        if($first_page && $last_page)
        $pages              = $first_page.'-'.$last_page;
        #$doi               = $journal_article->doi_data->doi;
        // autoren
        $i          = 0;
        $autors     = array();
        foreach($person_name as $autor) {
            $autors[$i]['vn']     = (string)$autor->given_name;
            $autors[$i]['nn']     = (string)$autor->surname;
            $i++;
        }
        # DOI || PMID || PMCID
        $conv_ids = pubmedIdConverter($doi);
        if($conv_ids['status'] == 'ok') {
            #$doi    = $conv_ids['doi'];
            $pmid   = $conv_ids['pmid'];
            $pmcid  = $conv_ids['pmcid'];
        } else {
            #$doi    = '';
            $pmid   = '';
            $pmcid  = '';
        }
        #---
        $xml_metadata = array(
            'status'    => (string)$status,
            'doi'       => $doi,
            'pubmed_id' => $pmid,
            'pmcid'     => $pmcid,
            'autors'    => $autors,
            'title1'    => (string)$title1,
            'title2'    => (string)$title2,
            'lang'      => (string)$language,
            'year'      => (int)$year,
            'issn'      => $issn,
            'quelle'    => (array)$quelle,
            'band'      => (string)$journal_volume,
            'nr'        => (string)$journal_issue,
            'seiten'    => $pages
        );
        #var_dump($xml_metadata);
        return $xml_metadata;
    } catch (Exception $e) {
        die('ERROR: ' . $e->getMessage());
    }
}

function event() {
	$datum        = date("Y-m-d");   // Datum im Format 2011-04-27
	$event        = array(
		"name"  => "",
		"logo"  => "psi.png"
	);

	// EVENTS
	# WM 2014
	$wm_start     = date("Y-m-d", mktime(0, 0, 0, 6, 12, 2014));
	$wm_stop      = date("Y-m-d", mktime(0, 0, 0, 7, 13, 2014));

	// ---
	if($datum >= $wm_start && $datum <= $wm_stop) {
		$event['name'] = "wm";
		$event['logo'] = "psi_wm.png";
	}

	return $event;
}
?>
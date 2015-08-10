<?php
header("Content-Type: text/html; charset=utf-8");
// includes
include('admin/cms/configuration.php');
include('php/func_all_html_entities_decode.php');
include('admin/cms/dataaccess.php');
include('admin/cms/funktionen.inc.php');
//-------------
?>
<!DOCTYPE HTML>
<html>
<head>
	<base href="<?php echo ROOT_ABS; ?>">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/ui-lightness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<?php
//-------------
$navi = select("adhs_kat", "*", "", "", "id");
$event = event();
# CONTENT ABFRAGEN (Einzel- oder Listenansicht?)
switch ($kat[2]) {
    case 'single':
			# abfrage content einzelansicht
	    $typ	= 'single';
			$link	= $docs.$kat[0].'.pdf';
			$cont	= select("adhs_cont", "*", "link", $link, "");
	    # suchstring bilden
	    $sql = "SELECT * FROM `adhs_lit` WHERE `pdf` LIKE '%$kat[0]%'";
	    # anfrage senden
	    $res = mysql_query($sql);
	    $lit = array();
	    while($row = mysql_fetch_assoc($res)) {
		    array_push($lit, $row);
	    }
      break;
    case 'include':
			# einbinden einer php-datei
	    $typ	= 'include';
			$file	= $kat[0]["include"];
			$cont	= select("adhs_cont", "*", "kat", $kat[0]["id"], "");
			# CSS für jquery ui (fragebögen)
	    echo'<link rel="stylesheet" type="text/css" href="'.$jquery_ui_css.'">';
	    if ($kat[0]["id"] == "6"
		    || $kat[0]["id"] == "27"
		    || $kat[0]["id"] == "28"
		    || $kat[0]["id"] == "29"
		    || $kat[0]["id"] == "30"
		    || $kat[0]["id"] == "33") {
			    if($kat[0]["id"] == "6" || $kat[0]["id"] == "30") {
			      echo'<link rel="stylesheet" type="text/css" href="'.ROOT_REL.'css/adhs_test.css">';
		      }
			    if ($kat[0]["id"] == "27") {
				    echo'<link rel="stylesheet" type="text/css" href="'.ROOT_REL.'css/adhs_test_erwachsene.css">';
			    }
			    if ($kat[0]["id"] == "28") {
				    echo'<link rel="stylesheet" type="text/css" href="'.$idealselect_css.'">';
				    echo'<link rel="stylesheet" type="text/css" href="'.ROOT_REL.'css/bdi_test.css">';
			    }
			    if ($kat[0]["id"] == "29") {
				    #echo'<link rel="stylesheet" type="text/css" href="'.$idealselect_css.'">';
				    echo'<link rel="stylesheet" type="text/css" href="'.ROOT_REL.'css/auswertung.css">';
			    }
			    if ($kat[0]["id"] == "33") {
						echo'<link rel="stylesheet" type="text/css" href="'.ROOT_ABS.'admin/plugins/jquery-datatables/media/css/jquery.dataTables.css">';
				    echo'<link rel="stylesheet" type="text/css" href="'.ROOT_ABS.'admin/plugins/jquery-datatables/media/css/jquery.dataTables_themeroller.css">';
			    }
	    }
      break;
    case 'list':
			# abfrage content liste
      $typ	= 'list';
			#$cont	= select_desc("adhs_cont", "*", "kat", $kat[0]['id'], "lastmod");
			# suchstring bilden
	    $sql = "SELECT * FROM `adhs_cont` WHERE `kat` = ".$kat[0]['id']." OR `kat2` = ".$kat[0]['id']." OR `kat3` = ".$kat[0]['id']." ORDER BY `jahr` DESC";
			# anfrage senden
			$res = mysql_query($sql);
			$cont = array();
			while($row = mysql_fetch_assoc($res)) {
				array_push($cont, $row);
			}
      break;
}
# META-TAGS-ABFRAGEN
$meta_tags = meta_tags($kat, $cont, $lit, $seitensprache);
# GET - VARS ENTFERNEN
echo'
	<script>
		if(typeof window.history.pushState == "function") {
		window.history.pushState({}, "Hide", "'.$meta_tags['standard_link'].'");
		}
	</script>';
//-------------
?>
	<link rel="stylesheet" href="css/style.css" media="screen and (min-width: 481px)">
	<link rel="shortcut icon" href="img/icons/favicon.ico">
	<link rel="favicon" href="img/icons/favicon.ico">
	<link rel="publisher" href="https://plus.google.com/115957886446453798572/">
	<script async src="js/android.js"></script>
	<script async=""  src="js/navi.js"></script>
	<link rel="stylesheet" href="css/mobile_min.css" media="only screen and (max-width: 480px)">
	<link rel="stylesheet" href="css/print.css" media="print">
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-19065230-1', 'adhs-studien.info');
	ga('send', 'pageview');

</script>
</head>
<body lang="de">
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KXSCRB"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-KXSCRB');</script>
<!-- End Google Tag Manager -->
<div id="wrapper">
	<header id="header">
		<div id="head" class="head">
			<div class="logo">
				<img src="<?php echo $img.$event['logo']; ?>" width="100" height="100" alt="Psi" />
			</div>
			<div class="head_hl">
				<h1>ADHS Studien</h1>
					  <p>Wissenschaftliche&nbsp;Arbeiten&nbsp;&uuml;ber&nbsp;die Aufmerksamkeitsdefizit-/Hyperaktivit&auml;
						  tsst&ouml;rung&nbsp;(ADHS)</p>
			</div>
			<div id="social-icons">
			  <ul>

				<li><a onclick="window.open('https://www.startssl.com/validation.ssl?referrer=www.startssl.com','','status=no,toolbar=no,menubar=no,titlebar=no,height=630,width=610');" title="SSL" alt="Die Daten dieser Website werden verschlüsselt &uumlbertragen" style="background:url('img/icons/ssl.png') top left no-repeat transparent; cursor: hand; cursor: pointer;" target="_blank"></a></li>
					  
				<li><a href="https://www.healthonnet.org/HONcode/German/?HONConduct628852" onclick="window.open(this.href); return false;" title="Diese Web Seite ist von der Health On the Net Stiftung akkreditiert: Klicken Sie, um dies zu &uuml;berpr&uuml;fen" alt="Diese Web Seite ist von der Health On the Net Stiftung akkreditiert: Klicken Sie, um dies zu &uuml;berpr&uuml;fen" style="background:url('img/icons/hon2.png') top left no-repeat transparent;" target="_blank"></a></li>

				</ul>
			</div>
		</div>
		<div id="intro" class="intro">
			<h2 style="color: #fff; margin: 0;">
				<?php echo $meta_tags['titel']; ?>
			</h2>
			<h3 style="color: #fff; margin: 0;">
				<?php echo _convert($meta_tags['meta_desc']); ?>
			</h3>
		</div>
	</header><!-- #header-->

	<nav id="menu-wrap">
		<?php
		# sprachmenü
		echo'
		<ul id="menu">';
		foreach($navi as $nav) {
			$id = $nav["id"];
			$ukat = $nav["ukat"];
			#falls vorhanden den englischen titel benutzen
			if($seitensprache == '1') {
				if($nav["titel_en"] != '') $titel = $nav["titel_en"]; else $titel = $nav["titel"];
			} else if($nav["titel"] != '') $titel = $nav["titel"]; else $titel = $nav["titel_en"];
			#-------------
			$link_title = $nav["link_title"];
			$meta_nav = $nav["meta_nav"];
			$hidden = $nav["hidden"];
			if($ukat == NULL && $meta_nav == "0" && $hidden == "0") {
				echo '<li><a href="'.ROOT_ABS.$link_title.'.html">'.$titel.'</a>';
				$sec_kats = select("adhs_kat", "*", "ukat", $id, "");
				$u_count = count($sec_kats); # unterkategorien vorhanden?
				if ($u_count > 0) {
					echo '<ul>';
					foreach($sec_kats as $sec_kat) { # unterkategorien ausgeben
						if($sec_kat["meta_nav"] == "0" && $sec_kat["hidden"] == "0") {
							#falls vorhanden den englischen titel benutzen
							if($seitensprache == '1') {
								if($sec_kat["titel_en"] != '') $titel = $sec_kat["titel_en"]; else $titel = $sec_kat["titel"];
							} else if($sec_kat["titel"] != '') $titel = $sec_kat["titel"]; else $titel = $sec_kat["titel_en"];
							#-------------
							$link_title = $sec_kat["link_title"];
							echo '<li><a href="'.ROOT_ABS.$link_title.'.html">'.$titel.'</a></li>';
						}
					}
					echo '</ul></li>';
				} else echo '</li>';
			}
		}
		echo '</ul>';
		?>
	</nav><!-- #menu-wrap-->
	<div id="middle">
		<article role="main" id="content" class="content">
		<?php
		# AUSGABE MAIN-CONTENT
		switch ($typ) {
			case 'single':
				# einzelansicht
				content_single($cont[0], $seitensprache, $navi);
				break;
			case 'include':
				# einbinden einer php-datei
				include($inc.$file);
				break;
			case 'list':
				# listenansicht
				content_liste($kat, $cont, $seitensprache, $img);
                echo '<p style="padding-top:30px"><em>Letzte &Auml;nderung: '.$meta_tags['lastmod'].'</em></p>';
				break;
		}
		//-------------
		?>
		</article><!-- #container-->
		<aside id="sideLeft">

			<!-- HONcode -->
			<div id="hon">
				<h4>Zertifizierung</h4>
				<span style="font-size:12px;">Wir befolgen den:</span><br>
				<a href="https://www.healthonnet.org/HONcode/German/?HONConduct628852" onclick="window.open(this.href); return false;"> <img src="https://www.honcode.ch/HONcode/Seal/HONConduct628852_s.gif" style="border: 0px none; width: 49px; height: 72px; float: left; margin: 4px;" title="Diese Web Seite ist von der Health On the Net Stiftung akkreditiert: Klicken Sie, um dies zu überprüfen" alt="Diese Web Seite ist von der Health On the Net Stiftung akkreditiert: Klicken Sie, um dies zu überprüfen"></a>
					<span style="font-size:18px;">
						<a href="http://www.healthonnet.org/HONcode/German/" onclick="window.open(this.href); return false;"> HONcode Standard </a></span><a href="http://www.healthonnet.org/HONcode/German/" onclick="window.open(this.href); return false;"><br>
					<span style="font-size: 12px; line-height: 10px;">
						f&uuml;r vertrauensw&uuml;rdige Gesundheits- <br>informationen</span></a>.<br>
					<span style="font-size:16px;text-decoration:underline;">
						<a href="https://www.healthonnet.org/HONcode/German/?HONConduct628852" onclick="window.open(this.href); return false;">&Uuml;berpr&uuml;fen Sie dies hier.</a></span>
			</div>

			<!-- Google Suchfeld
        <form action="http://www.adhs-studien.info/suche.html" id="cse-search-box">
          <div>
          <h4>Suchfunktion:</h4>
            <input type="hidden" name="cx" value="partner-pub-8381068986528810:7372813753" />
            <input type="hidden" name="cof" value="FORID:10" />
            <input type="hidden" name="ie" value="UTF-8" />
            <input type="text" name="q" size="23" />
            <input type="submit" name="sa" value="Suche" />
          </div>
        </form>
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">google.load("elements", "1", {packages: "transliteration"});</script>
        <script type="text/javascript" src="http://www.google.com/cse/t13n?form=cse-search-box&t13n_langs=en"></script>
        <script type="text/javascript" src="http://www.google.de/coop/cse/brand?form=cse-search-box&amp;lang=de"></script>
            -->
			<!-- Google AdSense -->
			<div id="googleadsense">
				<h4>Werbung:</h4>
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- adhs big -->
				<ins class="adsbygoogle"
					 style="display:inline-block;width:160px;height:600px"
					 data-ad-client="ca-pub-8381068986528810"
					 data-ad-slot="1866619756"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
			<div id="neuronation"></div>
		</aside><!-- #sideLeft -->
	</div><!-- #middle-->
	<footer id="footer" class="footer">
		<a href='https://alpha.app.net/thomas_m_stuppy' rel='me' style="display:none">app.net</a>
<!--	  <a href="http://validator.w3.org/check?uri=--><?php //echo $meta_tags['bookmark_link']; ?><!--" target="_blank"><img src="--><?php //echo $img.'valid-xhtml10.png'; ?><!--" alt="Valid XHTML 1.0 Transitional" width="51" height="18" /></a>&nbsp;-->
<!--	  <a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img src="--><?php //echo $img.'valid-css21.png'; ?><!--" alt="Valid CSS level 2.1" width="51" height="18" /></a>&nbsp;
	  <a href="http://feed2.w3.org/check.cgi?url=http%3A//feeds.adhs-studien.info/<?php echo $meta_tags['rss_feed']; ?>" target="_blank"><img src="<?php echo $img.'valid-rss2.png'; ?>" alt="Valid RSS 2 Feed" width="51" height="18" /></a>&nbsp;&nbsp;-->
		<?php
		foreach($navi as $nav) {
			$id = $nav["id"];
			#falls vorhanden den englischen titel benutzen
			if($seitensprache == '1') {
				if($nav["titel_en"] != '') $titel = $nav["titel_en"]; else $titel = $nav["titel"];
			} else $titel = $nav["titel"];
			#-------------
			$link_title = $nav["link_title"];
			$meta_nav = $nav["meta_nav"];
			$hidden = $nav["hidden"];
			if($meta_nav == "1" && $hidden == "0") {
				echo '<a href="'.ROOT_ABS.$link_title.'.html'.$lang.'">'.$titel.'</a>&nbsp; |&nbsp; ';
			}
		}
		?>
</footer><!-- #footer -->
</div><!-- #wrapper -->
</body>
</html>
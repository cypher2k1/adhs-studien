<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Cypher
 * Date: 01.06.14
 * Time: 12:04
 * To change this template use File | Settings | File Templates.
 */
header("Content-Type: text/html; charset=utf-8");
// includes
include('cms/configuration.php');
include('../php/func_all_html_entities_decode.php');
include('cms/dataaccess.php');
error_reporting(E_ALL | E_STRICT);
include('cms/funktionen.inc.php');
//-------------
// Spracheinstellungen (0=deutsch, 1=englisch)
if($kat[1] == '1') { # englisch
	$lang = '?lang=en';
	$seitensprache = '1';
} elseif($kat[1] == '0') { # deutsch
	$lang = '?lang=de';
	$seitensprache = '0';
} else { # deutsch/standard
	$lang = '';
	$seitensprache = '';
}
//-------------
echo'
<!DOCTYPE HTML>
<html>
<head>
<base href="'.ROOT_ABS.'">';
//-------------
$navi = select("adhs_kat", "*", "", "", "id");
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
		if ($kat[0]["id"] == "6"
			|| $kat[0]["id"] == "27"
			|| $kat[0]["id"] == "28"
			|| $kat[0]["id"] == "29"
			|| $kat[0]["id"] == "30"
			|| $kat[0]["id"] == "33") {
			if($kat[0]["id"] == "6" || $kat[0]["id"] == "30") {
				echo'<link rel="stylesheet" type="text/css" href="'.$jquery_ui_css.'">';
				echo'<link rel="stylesheet" type="text/css" href="'.ROOT_REL.'css/adhs_test.css">';
			}
			if ($kat[0]["id"] == "27") {
				echo'<link rel="stylesheet" type="text/css" href="'.$jquery_ui_css.'">';
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
				echo'<link rel="stylesheet" type="text/css" href="'.$jquery_ui_css.'">';
				echo'<link rel="stylesheet" type="text/css" href="'.ROOT_ABS.'admin/plugins/jquery-datatables/media/css/jquery.dataTables.css">';
				echo'<link rel="stylesheet" type="text/css" href="'.ROOT_ABS.'admin/plugins/jquery-datatables/media/css/jquery.dataTables_themeroller.css">';
			}
		}
		break;
	case 'list':
		echo 'Hallo Welt!';
		$host='http://doi.crossref.org';
		$email='thomas.stuppy@gmail.com';
		$port=80;
		$timeout=300;
		$xml='<?xml version="1.0"?>
	<query_batch version="2.0" xsi:schemaLocation="http://www.crossref.org/qschema/2.0 http://www.crossref.org/qschema/crossref_query_input2.0.xsd" xmlns="http://www.crossref.org/qschema/2.0" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
		<head>
			<email_address>thomas.stuppy@gmail.com</email_address>
			<doi_batch_id>ABC_123_fff</doi_batch_id>
		</head>
		<body>
			<query key="1178517" enable-multiple-hits="false" forward-match="false" secondary-query="author-title-multiple-hits">
				<issn match="optional">15360075</issn>
				<journal_title match="fuzzy">American Journal of Bioethics</journal_title>
				<author match="fuzzy" search-all-authors="true">Agich</author>
				<volume match="fuzzy">1</volume>
				<issue>1</issue>
				<first_page>50</first_page>
				<year>2001</year>
				<article_title>The Salience of Narrative for Bioethics</article_title>
			</query>
		</body>
	</query_batch>';
		$url='/servlet/query?pid='.$email.'&qdata='.$xml;
		#$doi = getRequest($host, $port, $url, $timeout);

		#echo rawurlencode($url);
		echo '<br><br><br>';

		// PDF META-TAGS
		$tags = get_meta_tags(ROOT_SYS.'/docs/schicksal-legasthenie.pdf');
		var_dump($tags);
		$dokument = fopen ( ROOT_SYS.'/docs/schicksal-legasthenie.pdf', 'w' );
		#$dokument = pdf_open ( $datei );
		pdf_set_info ( $dokument, 'Title', 'PHP ¾ - Die Befehlsreferenz' );
		pdf_set_info ( $dokument, 'Subject', 'PDF- Funktionen' );
		pdf_set_info ( $dokument, 'Author', 'Damir Enseleit' );
		pdf_set_info ( $dokument, 'Keywords', 'PDF, Funktionen, Dokument' );
		pdf_set_info ( $dokument, 'Creator', 'Damir Enseleit' );
		#pdf_begin_page ( $dokument, 400, 400 );
		pdf_end_page ( $dokument );
		pdf_close ( $dokument );
		fclose ( $datei );
		$tags = get_meta_tags(ROOT_SYS.'/docs/schicksal-legasthenie.pdf');
		var_dump($tags);
		break;
}
# META-TAGS-ABFRAGEN
$meta_tags = meta_tags($kat, $cont, $seitensprache);
# GET - VARS ENTFERNEN
echo'
<script>
	if(typeof window.history.pushState == "function") {
	window.history.pushState({}, "Hide", "'.$meta_tags['standard_link'].'");
	}
</script>';
//-------------
?>
<link rel="stylesheet" href="../css/style.css" media="screen and (min-width: 481px)" />
<link rel="shortcut icon" href="../img/icons/favicon.ico">
<link rel="favicon" href="../img/icons/favicon.ico">
<link rel="publisher" href="https://plus.google.com/115957886446453798572/">
<script async src="../js/android.js"></script>
<script async=""  src="../js/navi.js"></script>
<link rel="stylesheet" href="../css/mobile_min.css" media="only screen and (max-width: 480px)" />
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-19065230-1', 'adhs-studien.info');
	ga('send', 'pageview');

</script>
</head>
<body>
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
				<img src="../img/psi.png" width="100" height="100" alt="Psi" />
			</div>
			<!--            <div id="leftButton"><a href="javascript:toggleMenu();">Menu</a></div>-->
			<div class="head_hl">
				<?php
				if($seitensprache == 1) {
					echo'
					  <h1>ADHD research</h1>
					  <p>Scientific papers about the Attention-Deficit/Hyperactivity Disorder (ADHD)</p>';
				} else {
					echo'
					  <h1>ADHS Studien</h1>
					  <p>Wissenschaftliche&nbsp;Arbeiten&nbsp;&uuml;ber&nbsp;die Aufmerksamkeitsdefizit-/Hyperaktivit&auml;tsst&ouml;rung&nbsp;(ADHS)</p>';
				}
				?>
			</div>
			<div id="social-icons">
				<ul>
					<?php
					echo'
				<li><a href="http://del.icio.us/post?url='.$meta_tags['bookmark_link'].'&amp;title='.rawurlencode($meta_tags['meta_titel']).'" title="del.icio.us" style="background:url(\'img/icons/delicious.png\') top left no-repeat transparent;" target="_blank"></a></li>


				<li><a href="http://twitter.com/home?status='.$meta_tags['bookmark_link'].'&amp;title='.rawurlencode($meta_tags['meta_titel']).'" title="Twitter" style="background:url(\'img/icons/twitter.png\') top left no-repeat transparent;" target="_blank"></a></li>

				<li><a href="http://www.facebook.com/sharer.php?u='.$meta_tags['bookmark_link'].'&amp;title='.rawurlencode($meta_tags['meta_titel']).'" title="Facebook" style="background:url(\'img/icons/facebook.png\') top left no-repeat transparent;" target="_blank"></a></li>

				<li><a href="javascript:(function(){EN_CLIP_HOST=\'http://www.evernote.com\';try{var%20x=document.createElement(\'SCRIPT\');x.type=\'text/javascript\';x.src=EN_CLIP_HOST+\'/public/bookmarkClipper.js?\'+(new%20Date().getTime()/100000);document.getElementsByTagName(\'head\')[0].appendChild(x);}catch(e){location.href=EN_CLIP_HOST+\'/clip.action?url=\'+encodeURIComponent(location.href)+\'&amp;title=\'+encodeURIComponent(document.title);}})();" title="Evernote" style="background:url(\'img/icons/evernote.png\') top left no-repeat transparent;" target="_blank"></a></li>

				<li><a href="http://www.tumblr.com/share/link?url='.$meta_tags['bookmark_link'].'&amp;name='.rawurlencode($meta_tags['meta_titel']).'&amp;description='.rawurlencode($meta_tags['meta_desc']).'" title="Share on Tumblr" style="background:url(\'img/icons/tumblr.png\') top left no-repeat transparent;"></a></li>

				<li><a href="mailto:adhs.studien@gmail.com" style="background:url(\'img/icons/email.png\') top left no-repeat transparent;"></a></li>';
					?>
				</ul>
			</div>
		</div>

		<div id="intro" class="intro">
			<h2 style="color: #fff; margin: 0;">
				<?php echo $meta_tags['titel']; ?>
			</h2>
			<h3 style="color: #fff; margin: 0;">
				<?php echo $meta_tags['meta_desc']; ?>
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
				echo '<li><a href="'.ROOT_ABS.$link_title.'.html'.$lang.'">'.$titel.'</a>';
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
							echo '<li><a href="'.ROOT_ABS.$link_title.'.html'.$lang.'">'.$titel.'</a></li>';
						}
					}
					echo '</ul></li>';
				} else echo '</li>';
			}
		}
		?>
		</ul>
	</nav><!-- #menu-wrap-->
	<div id="middle">
		<article role="main" id="content" class="content">
			<?php
			# AUSGABE MAIN-CONTENT
			switch ($typ) {
				case 'single':
					# einzelansicht
					content_single($cont[0], $seitensprache, $lit, $navi);
					break;
				case 'include':
					# einbinden einer php-datei
					include($inc.$file);
					break;
				case 'list':
					# listenansicht
					content_liste($kat, $cont, $seitensprache, $img);
					break;
			}
			//-------------
			?>
		</article><!-- #container-->
		<aside id="sideLeft">
			<!-- Google Suchfeld -->
			<form action="http://www.adhs-studien.info/suche.html" id="cse-search-box">
				<div>
					<p>Suchfunktion:</p>
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

			<!-- Google AdSense -->
			<div id="googleadsense">
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
		<a href="http://validator.w3.org/check?uri=<?php echo $meta_tags['bookmark_link']; ?>" target="_blank"><img src="<?php echo $img.'valid-xhtml10.png'; ?>" alt="Valid XHTML 1.0 Transitional" width="51" height="18" /></a>&nbsp;
		<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img src="<?php echo $img.'valid-css21.png'; ?>" alt="Valid CSS level 2.1" width="51" height="18" /></a>&nbsp;
		<a href="http://feed2.w3.org/check.cgi?url=http%3A//feeds.adhs-studien.info/<?php echo $meta_tags['rss_feed']; ?>" target="_blank"><img src="<?php echo $img.'valid-rss2.png'; ?>" alt="Valid RSS 2 Feed" width="51" height="18" /></a>&nbsp;&nbsp;
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
		<!--		<section id="sprachmenue">
			<?php
			# sprachmenü
			echo'
			<p>
				<a href="'.$meta_tags['bookmark_link_de'].'" target="_top" title="deutsch"><img src="'.$img.'de.png" alt="deutsch"></a>&nbsp;&nbsp;&nbsp;<a href="'.$meta_tags['bookmark_link_en'].'" target="_top" title="englisch (beta)"><img src="'.$img.'en.png" alt="englisch (beta)"></a>
			</p>';
			?>
		</section> -->
	</footer><!-- #footer -->
</div><!-- #wrapper -->
<script async src="http://platform.tumblr.com/v1/share.js"></script>
<style>
	#pfac {
	}

	#pfac * {
	}

	#pfac ~ * {
		display: none
	}</style>
<script>(function (l, m) {
		function n(a) {
			a && pfac.nextFunction()
		}

		var h = l.document, p = ["i", "s"];
		n.prototype = {rand: function (a) {
			return Math.floor(Math.random() * a)
		}, getElementBy: function (a, b) {
			return a ? h.getElementById(a) : h.getElementsByTagName(b)
		}, getStyle: function (a) {
			var b = h.defaultView;
			return b && b.getComputedStyle ? b.getComputedStyle(a, null) : a.currentStyle
		}, deferExecution: function (a) {
			setTimeout(a, 250)
		}, insert: function (a, b) {
			var e = h.createElement("b"), c = h.getElementById('sideLeft'), d = c.childNodes.length, g = c.style, f = 0, k = 0;
			if ("pfac" == b) {
				e.setAttribute("id", b);
				//g.margin = g.padding = 0;
				//g.height = "100%";
				for (d = this.rand(d); f < d; f++)1 == c.childNodes[f].nodeType && (k = Math.max(k, parseFloat(this.getStyle(c.childNodes[f]).zIndex) || 0));
				k && (e.style.zIndex = k + 1);
				d++
			}
			e.innerHTML = a;
			c.insertBefore(e, c.childNodes[d - 1])
		}, r: function (a) {
			var b = h.body.style;
			this.getElementBy(a).parentNode.removeChild(this.getElementBy(a));
			b.height = b.margin = b.padding = ""
		}, displayMessage: function (a) {
			a = "abisuq".charAt(this.rand(5));
			this.insert('<p>Werbung:</p><a href=\"http://www.neuronation.de/de/affiliate/66493\" title=\"NeuroNation - Wissenschaftlich fundiertes, kognitives Training\" target=\"_blank\"><img src=\"img/neuronation.png\" ></a>', "pfac")
		}, i: function () {
			for (var a = "googleadsense".split(","), b = a.length, e = "", c = this, d = 0, g = "abisuq".charAt(c.rand(5)); d < b; d++)c.getElementBy(a[d]) || (e += "<" + g + ' id="' + a[d] + '"></' + g + ">");
			c.insert(e);
			c.deferExecution(function () {
				for (d = 0; d < b; d++)if (null == c.getElementBy(a[d]).offsetParent || "none" == c.getStyle(c.getElementBy(a[d])).display)return c.displayMessage("#" + a[d] + "(" + d + ")");
				c.nextFunction()
			})
		}, s: function () {
			var a = {'pagead2.googlesyndic': 'google_ad_client'}, b = this, e = b.getElementBy(0, "script"), c = e.length - 1, d, g, f, k;
			h.write = null;
			for (h.writeln = null; 0 <= c; --c)if (d = e[c].src.substr(7, 20), a[d] !== m) {
				f = h.createElement("script");
				f.type = "text/javascript";
				f.src = e[c].src;
				g = a[d];
				l[g] = m;
				f.onload = f.onreadystatechange = function () {
					k = this;
					l[g] !== m || k.readyState && "loaded" !== k.readyState && "complete" !== k.readyState || (l[g] = f.onload = f.onreadystatechange = null, e[0].parentNode.removeChild(f))
				};
				e[0].parentNode.insertBefore(f, e[0]);
				b.deferExecution(function () {
					if (l[g] === m)return b.displayMessage(f.src);
					b.nextFunction()
				});
				return
			}
			b.nextFunction()
		}, nextFunction: function () {
			var a = p[0];
			a !== m && (p.shift(), this[a]())
		}};
		l.pfac = pfac = new n;
		h.addEventListener ? l.addEventListener("load", n, !1) : l.attachEvent("onload", n)
	})(window);</script>
</body>
</html>
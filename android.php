<?php
header("Content-Type: text/html; charset=utf-8");
// includes
include("admin/cms/configuration.php");
include('php/func_all_html_entities_decode.php');
include("admin/cms/dataaccess.php");
//-------------
echo'
<html>
<head>
	<title>Jonathan Stark</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="user-scalable=no, width=device-width" />
	<link rel="stylesheet" type="text/css" href="css/mobile.css">
	<script src="admin/plugins/jquery-ui/js/jquery-1.10.2.js"></script>
</head>
<body>
<header id="head">
	<div id="menuButton"><a href="javascript:toggleMenu();">Menu</a></div>

	<h1>Jonathan Stark</h1>
</header>

<nav id="menu-wrap"></nav>

<div id="container"></div>
</body>
</html>';
?>
<script>
	var hist = [];
	var startUrl = 'http://localhost/android.php';
	$(document).ready(function(){
		$('nav').addClass('hide');
		loadPage(startUrl);
	});
	function toggleMenu() {
		$('nav').toggleClass('hide');
		$('#menuButton').toggleClass('pressed');
	}
	function showMenu() {
		$('nav').removeClass('hide');
		$('#menuButton').addClass('pressed');
	}
	function hideMenu() {
		$('nav').addClass('hide');
		$('#menuButton').toggleClass('pressed');

	}
	function loadPage(url) {
		$('body').append('<div id="progress">Lade...</div>');
		scrollTo(0,0);
		if (url == startUrl) {
			$('#menu-wrap').load('index.php #wrapper #menu-wrap ul');
			showMenu();
		} else {
			/*$('#menu-wrap').load('index.php #wrapper #menu-wrap ul');*/
			/*$('#container').load(url + ' #content', hijackLinks);*/
			hideMenu();
		$('#container').load(url + ' #content', function(){
			var title = 'Hallo!';
			$('.leftButton').remove();
			hist.unshift({'url':url, 'title':title});
		if (hist.length > 1) {
			$('#head').append('<div class="leftButton">'+hist[1].title+'</div>');:
			$('#head .leftButton').click(function(){
				var thisPage = hist.shift();
				var previousPage = hist.shift();
				loadPage(previousPage.url);
			});
		}
	}
	}
	$('a').click(function(e){
		var url = e.target.href;
		if (url.match(/localhost/) || url.match(/adhs-studien.info/)) {
			e.preventDefault();
			loadPage(url);
		}
	});

	$('#progress').remove();
}
</script>
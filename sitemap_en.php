<?php
header("Content-type: text/xml");
echo "<?xml version='1.0' encoding='UTF-8'?>\n";
echo "<urlset xmlns='http://www.google.com/schemas/sitemap/0.84' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xsi:schemaLocation='http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd'>\n";
// includes
include("admin/cms/configuration.php");
include("admin/cms/dataaccess.php");
#include("admin/cms/funktionen.inc.php");
//-------------
$navi = select("adhs_kat", "*", "", "", "id");
$cont = select("adhs_cont", "*", "", "", "id");
foreach($navi as $nav) {
	$link_title = $nav["link_title"];
	$hidden = $nav["hidden"];
	if($hidden == "0") {
		echo'
		<url>
		<loc>http://www.adhs-studien.info/'.$link_title.'.html?lang=en</loc>
		<lastmod>';
		echo date("Y-m-d\TH:i:s").'+00:00</lastmod>';
		echo'
		<changefreq>daily</changefreq>
		<priority>1.0</priority>
		</url>';
	}
}
foreach($cont as $con) {
	if($con["icon"] == "0" && $con["titel_en"] != "") { # nur dokumente veröffentlichen
		$einzelansicht = array_pop( explode( "/", $con["link"] ) );
		$einzelansicht_link = array_shift( explode( ".", $einzelansicht ) );
		echo'
		<url>
		<loc>http://www.adhs-studien.info/'.$einzelansicht_link.'.html?lang=en</loc>
		<lastmod>';
		echo date("Y-m-d\TH:i:s").'+00:00</lastmod>';
		echo'
		<changefreq>weekly</changefreq>
		<priority>0.5</priority>
		</url>';
	}
}
?>
</urlset>
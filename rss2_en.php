<?php
header('Content-Type: application/rss+xml; charset=utf-8');
// includes
include("admin/cms/configuration.php");
include("php/func_all_html_entities_decode.php");
include("admin/cms/dataaccess.php");
// db-anfragen
$cont_tmp = select_desc("adhs_cont", "*", "", "", "id");
$i = 0;
$cont = array();
foreach($cont_tmp as $con_tmp) {
    if($con_tmp["icon"] == "0" && $con_tmp["pubdate"] != "0000-00-00" && $con_tmp["titel_en"] != '' && $con_tmp["hidden"] != "1" && $i < 20) {
        $pubdate_ts = strtotime ($con_tmp["pubdate"]);
        while (array_key_exists($pubdate_ts, $cont)):
            $pubdate_ts++;
        endwhile;
        $cont[$pubdate_ts] = $con_tmp;
    $i++;
    }
}
krsort($cont);
// head
echo'<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0">
<channel>
<title>ADHD research</title>
<link>http://www.adhs-studien.info'.$_SERVER['PHP_SELF'].'</link>
<description>Scientific information about ADHD in children and adults</description>
<image>
<url>http://www.adhs-studien.info/img/banner2.png</url>
<title>ADHD research</title>
<link>http://www.adhs-studien.info'.$_SERVER['PHP_SELF'].'</link>
</image>
<language>en</language>';
// ausgabe der items
foreach($cont as $con) {
	$datum = $con["pubdate"];
	$icon = $con["icon"];
    // ------------------------
    $einzelansicht = array_pop( explode( "/", $con["link"] ) );
    $einzelansicht_link = array_shift( explode( ".", $einzelansicht ) );
    $link = 'http://www.adhs-studien.info/'.$einzelansicht_link.'.html?lang=en';
    $titel = umlautewegmachen_rss($con["titel_en"]);
    if($con["text_en"] != '') $text = umlautewegmachen_rss($con["text_en"]); else $text = umlautewegmachen_rss($con["text"]);
    echo'
    <item>
        <title>'.$titel.'</title>
        <link>'.$link.'</link>
        <description xml:space="preserve"><![CDATA['.$text.']]></description>
        <guid>'.utf8_encode($link).'</guid>
        <pubDate>'.$datum.'</pubDate>
    </item>';
}
echo'
</channel>
</rss>';
?>
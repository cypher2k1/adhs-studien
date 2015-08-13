<?php
// includes
#include("../../admin/cms/configuration.php");
#include("../../admin/cms/dataaccess.php");
#include("../../admin/cms/funktionen.inc.php");
//-------------
$navi = select("adhs_kat", "*", "", "", "id");
$cont = select("adhs_cont", "*", "", "", "id");
//------------- ACCESSKEYS
$accesskeys = array_filter($navi, function ($element) { 
	return ($element['accesskey'] != '');
} );
    
echo'<table id="sitemap">
  <tr>
	<td>
	  <h4>Sitemap</h4>';
echo'<ul>';
foreach($navi as $nav) {
	$id = $nav["id"];
	$ukat = $nav["ukat"];
	#falls vorhanden den englischen titel benutzen
	if($seitensprache == '1') { 
		if($nav["titel_en"] != '') $titel = $nav["titel_en"]; else $titel = $nav["titel"]; 
	} else if($nav["titel"] != '') $titel = $nav["titel"]; else $titel = $nav["titel_en"]; 
	#-------------
	$link_title = $nav["link_title"];
	#$meta_nav = $nav["meta_nav"];
	$hidden = $nav["hidden"];
	($nav["accesskey"] !=  '') ? $accesskey = ' accesskey="'.$nav["accesskey"].'"' : $accesskey = '';
	if($ukat == NULL && $hidden == "0") {
		echo '<li><a href="'.ROOT_ABS.$link_title.'.html'.$lang.'"'.$accesskey.'>'.$titel.'</a>';
		$sec_kats = select("adhs_kat", "*", "ukat", $id, "");
		$u_count = count($sec_kats); # unterkategorien vorhanden?
		if ($u_count > 0) {
			echo '<ul>';
			foreach($sec_kats as $sec_kat) { # unterkategorien ausgeben
				($sec_kat["accesskey"] !=  '') ? $accesskey = ' accesskey="'.$sec_kat["accesskey"].'"' : $accesskey = '';
				#falls vorhanden den englischen titel benutzen
				if($seitensprache == '1') { 
					if($sec_kat["titel_en"] != '') $titel = $sec_kat["titel_en"]; else $titel = $sec_kat["titel"]; 
				} else if($sec_kat["titel"] != '') $titel = $sec_kat["titel"]; else $titel = $sec_kat["titel_en"]; 
				#-------------
				$link_title = $sec_kat["link_title"];
				echo '<li><a href="'.ROOT_ABS.$link_title.'.html'.$lang.'"'.$accesskey.'>'.$titel.'</a></li>';
			}
			echo '</ul></li>';
		} else echo '</li>';
	}
}
echo '</ul>
		</td>
		<td>
	  <h4>Accesskeys</h4>
	    <ul>';
# Navigation überspringen
if($seitensprache == '1')  echo '	      <li>[s] Navigation überspringen</li>'; 
else echo '	      <li>[s] Skip to content</li>';
# Alle weiteren Accesskeys aus der DB
foreach($accesskeys as $accesskey) {
	#$link_title	= $accesskey["link_title"];
	$hidden		= $accesskey["hidden"];
	$key	= $accesskey["accesskey"];
	#falls vorhanden den englischen titel benutzen
	if($seitensprache == '1') { 
		if($accesskey["titel_en"] != '') $titel = $accesskey["titel_en"]; else $titel = $accesskey["titel"]; 
	} else if($accesskey["titel"] != '') $titel = $accesskey["titel"]; else $titel = $accesskey["titel_en"]; 
	# ausgabe
	if($hidden == 0) {
		echo '	      <li>['.$key.'] '.$titel.'</li>';
	}
}
echo '</ul>';
echo '</td></tr></table>';
?>

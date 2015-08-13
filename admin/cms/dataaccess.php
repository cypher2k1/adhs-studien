<?php
function dbconnect() {
	// Zum Server verbinden und die Resource ID in $conid ablegen
	$conid = @mysql_connect( MYSQL_HOST, MYSQL_USER, MYSQL_PASSWD );
	if (is_resource( $conid ) && @mysql_select_db( MYSQL_DB, $conid) ) {
		// Resource ID in den öffentlichen Bereich zurückgeben
		return $conid;
	} else {
		die( 'Es konnte keine Verbindung zur Datenbank hergestellt werden!' );
	}
}

function update($table, $data_array, $key_name, $key_value) {
	$sql = "UPDATE `$table` SET ";
	$data_keys = array_keys($data_array);
	foreach($data_keys as $data_key) {
		$data_value = $data_array[$data_key];
		if($key_name == $data_key) continue;
		$sql .= "`$data_key`='$data_value', ";
	}
	$sql = trim($sql, ", ");
	$sql .= " WHERE `$key_name`='$key_value'";
	#echo $sql;
	$res = mysql_query($sql);
	return $res;
}

function insert($table, $data_array) {
	$sql = "INSERT INTO `$table` (";
	$keys = array_keys($data_array);
	foreach($keys as $key) {
		$sql .= "`".$key."`,";
	}
	$sql = trim($sql, ",");
	$sql .= ") VALUES (";
	$vals = array_values($data_array);
	foreach($vals as $val) {
		$sql .= "'".$val."',";
	}
	$sql = trim($sql, ",");
	$sql .= ")";
	$res = mysql_query($sql);
	return $res;
}

function select($table, $what, $key_name, $key_value, $order) {
	$sql = "SELECT $what FROM `$table` ";
	if($key_name != "")
		$sql .= "WHERE `$key_name` = '$key_value' ";
	if($order != "")
		$sql .= "ORDER BY `$order`";
	$res = mysql_query($sql);
	if(!$res)
		return false;
	$exp = array();
	while($row = mysql_fetch_assoc($res)) {
		array_push($exp, $row);
	}
	return $exp;
}

function select_desc($table, $what, $key_name, $key_value, $order) {
	$sql = "SELECT $what FROM `$table` ";
	if($key_name != "")
		$sql .= "WHERE `$key_name` = '$key_value' ";
	if($order != "")
		$sql .= "ORDER BY `$order` DESC";
	$res = mysql_query($sql);
	if(!$res)
		return false;
	$exp = array();
	while($row = mysql_fetch_assoc($res)) {
		array_push($exp, $row);
	}
	return $exp;
}

function delete($table, $key_name, $key_value) {
	$sql = "DELETE FROM `$table` ";
	if($key_name != "")
		$sql .= "WHERE `$key_name`='$key_value'";
	$res = mysql_query($sql);
	return $res;
}
function br2p($string) { 
   return preg_replace('#<p>[\n\r\s]*?</p>#m', '', '<p>'.preg_replace('#(<br\s*?/?>){2,}#m', '</p><p>', $string).'</p>'); 
} 
# stellt codierte html-tags wieder her
function keephtml($string){
   #$res = htmlentities($string);
   $res = str_replace("&lt;","<",$string);
   $res = str_replace("&gt;",">",$res);
   $res = str_replace("&quot;",'"',$res);
   $res = str_replace("&amp;",'&',$res);
   return $res;
}

function strip_html_tags($text, $no_html) {
     $text = preg_replace( 
         array( 
           // Remove invisible content 
             '@<head[^>]*?>.*?</head>@siu',
             '@<style[^>]*?>.*?</style>@siu',
             '@<script[^>]*?.*?</script>@siu', 
             '@<object[^>]*?.*?</object>@siu', 
             '@<embed[^>]*?.*?</embed>@siu', 
             '@<applet[^>]*?.*?</applet>@siu', 
             '@<noframes[^>]*?.*?</noframes>@siu', 
             '@<noscript[^>]*?.*?</noscript>@siu', 
             '@<noembed[^>]*?.*?</noembed>@siu', 
           // Add line breaks before and after blocks 
             '@</?((address)|(blockquote)|(center)|(del))@iu', 
             '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu', 
             '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu', 
             '@</?((table)|(th)|(td)|(caption))@iu', 
             '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu', 
             '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu', 
             '@</?((frameset)|(frame)|(iframe))@iu', 
         ), 
         array( 
             ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',"$0", "$0", "$0", "$0", "$0", "$0","$0", "$0",), $text );
			 
	$text = keephtml($text);
	if($no_html == 1) 
		return strip_tags($text);
	else {
		$text = br2p($text);
		return strip_tags($text,'<i><p><em><strong>');
		
	}
 }
# entfernt für rss unsichere zeichen und wandelt alle html entities um
function removeQuotes($input)  {
	$input = strip_html_tags($input, $no_html = 0);
	$search = array(
		array(
			'‘','&lsquo;','&#8216;', # einfaches Anführungszeichen links'
			'’','&rsquo;','&#8217;', # einfaches Anführungszeichen rechts'
			'‚','&sbquo;','&#8218;', # einfaches low-9-Zeichen'
			'“','&ldquo;','&#8220;', # doppeltes Anführungszeichen links'
			'”','&rdquo;','&#8221;', # doppeltes Anführungszeichen rechts'
			'„','&bdquo;','&#8222;', # doppeltes low-9-Zeichen rechts'
			'′','&prime;','&#8242;', # Minutenzeichen'
			'″','&Prime;','&#8243;', # Sekundenzeichen'
			'«','&laquo;','&#171;',  # angewinkelte Anführungszeichen links'
			'»','&raquo;','&#187;'   # angewinkelte Anführungszeichen rechts'
		), array(
			' ','&nbsp;','&#160;', # Erzwungenes Leerzeichen'
			'&ensp;','&#8194;', # Leerzeichen Breite n'
			'&emsp;','&#8195;', # Leerzeichen Breite m'
			'&thinsp;','&#8201;' # Schmales Leerzeichen'
		), array(
			'‌','&zwnj;','&#8204;', # null breiter Nichtverbinder'
			'‍','&zwj;','&#8205;',  # null breiter Verbinder'
			'‎','&lrm;','&#8206;',  # links-nach-rechts-Zeichen'
			'‏','&rlm;','&#8207;'   # rechts-nach-links-Zeichen'
		)
	);
	$replace = array('"', ' ', '');
	# -----------
    $input = str_replace($search, $replace, $input);
    $input = all_html_entities_decode($input, $mode = 0);
	$input = keephtml($input);
	return $input;
}
# wandelt für einen rss-feed alle html entities um AUßER "& -> &amp;"
function umlautewegmachen_rss($text) {
    $text = removeQuotes($text);
	$text = all_html_entities_decode($text, $mode = 1);
	$text = strip_tags($text);
	$text = str_replace("&", "&amp;", $text);
	return $text;
}
# wandelt titel in seo-freundliche dateinamen um
function dateinamengenerator($str) {
	$str = all_html_entities_decode($str, $mode = 1);
	$str = strip_tags($str);
	return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), 
	array('', '-', ''), remove_accent($str))); 
} 
# decodiert alle html entities
function html_decode($input)  { 
    #$input = str_replace("&nbsp;", " ", $input);
    $input = all_html_entities_decode($input, $mode = 0);
    $input = keephtml($input);
    #$input = str_replace("&", "&amp;", $input);
	return $input;
}
/**
  * replcae quotes to HTML entities by names or numbers
  *
  * @param (string) escaped string value
  * @param (string) default ='number' will be return to number entities you can use ='name' to return name entities
  * Note : don't use ='name' coz (&apos;) (does not work in IE)
  */
function quote2entities($string,$entities_type='number')
 {
     $search                     = array("\"","'");
     $replace_by_entities_name   = array("&quot;","&apos;");
     $replace_by_entities_number = array("&#34;","&#39;");
     $do = null;
     if ($entities_type == 'number')
     {
         $do = str_replace($search,$replace_by_entities_number,$string);
     }
     else if ($entities_type == 'name')
     {
         $do = str_replace($search,$replace_by_entities_name,$string);
     }
     else
     {
         $do = addslashes($string);
     }
     return $do;
 }
 
function _convert($content) { 
     if(!mb_check_encoding($content, 'UTF-8') 
         OR !($content === mb_convert_encoding(mb_convert_encoding($content, 'UTF-32', 'UTF-8' ), 'UTF-8', 'UTF-32'))) { 

         $content = mb_convert_encoding($content, 'UTF-8'); 

         if (mb_check_encoding($content, 'UTF-8')) { 
             // log('Converted to UTF-8'); 
         } else { 
             // log('Could not converted to UTF-8'); 
         } 
     } 
     return $content; 
 } 
/* 
* filtering an array 
*/ 
function filter_by_value($array, $index, $value) { 
	if(is_array($array) && count($array)>0)	{ 
		foreach(array_keys($array) as $key) {
			$temp[$key] = $array[$key][$index];			
			if ($temp[$key] == $value) { 
				$newarray[$key] = $array[$key]; 
			} 
		 } 
	} 
return $newarray; 
} 

function show_kats($navi, $kat_ids) {
	$kategorien = array('de' => '', 'en' => '');
	$i = 0;
	foreach($kat_ids as $kats) {
		# KATEGORIE
		$kat = filter_by_value($navi, 'id', $kats);
		$kat = array_shift($kat);
		# OBERKATEGORIE?
		if(!is_null($kat['ukat'])) { 
			$ukat = filter_by_value($navi, 'id', $kat['ukat']);
			$ukat = array_shift($ukat);
			# titel zweisprachig
			($ukat['titel'] != '')		? $titel	= $ukat['titel']	: $titel	= $ukat['titel_en'];
			($ukat['titel_en'] != '')	? $titel_en = $ukat['titel_en']	: $titel_en	= $ukat['titel'];
			#link bilden
			$kategorien['de'][$i]	= '<a href="'.ROOT_ABS.$ukat['link_title'].'.html">'.$titel.'</a>';
			$kategorien['en'][$i]	= '<a href="'.ROOT_ABS.$ukat['link_title'].'.html">'.$titel_en.'</a>';
			$i++;	
		}
		# titel zweisprachig
		($kat['titel'] != '')		? $titel	= $kat['titel']		: $titel	= $kat['titel_en'];
		($kat['titel_en'] != '')	? $titel_en = $kat['titel_en']	: $titel_en	= $kat['titel'];
		#link bilden
		$kategorien['de'][$i]	= '<a href="'.ROOT_ABS.$kat['link_title'].'.html">'.$titel.'</a>';
		$kategorien['en'][$i]	= '<a href="'.ROOT_ABS.$kat['link_title'].'.html">'.$titel_en.'</a>';
		$i++;	
	}
	$kategorien['de'] = implode(", ", array_unique($kategorien['de']));
	$kategorien['en'] = implode(", ", array_unique($kategorien['en']));
	return $kategorien;
}

# Datenbankverbindung öffnen
$conid = dbconnect();

?>
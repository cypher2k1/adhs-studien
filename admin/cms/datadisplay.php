<?php
/*
autor: thomas stuppy
version: 1.0 
parameter: $data_array - zweidimensionales array, welches eine datenbank-tabelle repr�sentiert
ausnahmen: n/a
*/
function table_display($data_array, $edit_action, $delete_action) {
	echo '<table cellpadding="5" id="admin">';
	echo '<tr>';
	// ausgabe des tabellenheaders
	$headers = array_keys($data_array[0]);
	foreach($headers as $header) {
		echo '<th>';
		echo $header;
		echo '</th>';
	}
	echo '<th>Optionen</th>';
	echo '</tr>';
	foreach($data_array as $row) {
		echo '<tr>';
		foreach($row as $cell) {
			echo '<td class="datarow">';
			echo $cell;
			echo '</td>';
		}
		echo '<td><a href="?action='.$edit_action.'&id='.$row['id'].'">Bearbeiten</a> | <a href="?action='.$delete_action.'&id='.$row['id'].'">Entfernen</a></td>';
		echo '</tr>';
	}
	echo '</table>';
}

#----------------------------
function adhs_admin_tabelle($data_array, $edit_action, $delete_action) {
	echo '
	<table id="admin">
	<thead>
	  <tr>
			<th></th>
			<th>id</th>
			<th>typ</th>
			<th>titel</th>
			<th>hidden</th>
			<th>link</th>
			<th>jahr</th>
			<th>sprache</th>
	  </tr>
	</thead>
	<tbody>';
	foreach($data_array as $row) {
		$id = $row['id'];
		#$kats = select("adhs_kat", "*", "", "", "");
		#$kat1 = $row['kat'];
		#$kat2 = $row['kat2'];
		#$kat3 = $row['kat3'];
		($row['typ'] != "") ? $typ = $row['typ'] : $typ = '&nbsp;';
		$jahr = $row['jahr'];
		$hidden = $row['hidden'];
		($hidden == 1) ? $hidden_check = "checked " : $hidden_check = "";
		#------------
		# icon & link
		if ($row['icon'] == 0) {
			$link = pdf_link_test($row['link']);
			$prev_link = explode('/', $row['link'], 2);
			$prev_link = explode('.', $prev_link[1], 2);
			$prev_link = $prev_link[0].'.html';
		} elseif ($row['icon'] == 1) {
			$style = ''; # <-------------
			$icon = '<img src="'.PATH_ICONS.'external-link.png" width="15" height="15" alt="Externer Link" />';
			$link = '<a href="'.$row['link'].'"'.$style.' target="_blank">'.$icon.' Link</a>';
		} else {
			$icon = '&nbsp;';
			$link = '&nbsp;';
		}
		# sprache
		if ($row['sprache'] == 0) $sprache = '<img src="'.PATH_ICONS.'de.png" width="23" height="15" alt="deutsch" />';
		elseif ($row['sprache'] == 1) $sprache = '<img src="'.PATH_ICONS.'en.png" width="23" height="15" alt="englisch" />';
		# titel(_en)
		if ($row['titel'] != "") {
			#if (strlen($row['titel']) > 40) $titel = substr($row['titel'], 0, 40).'...'; else $titel = $row['titel'];
			$titel = $row['titel'];
		} elseif ($row['titel_en'] != "") {
            $titel = $row['titel_en'];
        } else $titel = '&nbsp';
            ($row['hidden'] == 0) ? $prev_icon = 'eye.png' : $prev_icon = 'eye_grey.png';
		#-----------
		echo '
		  <tr>
			<td><div align="center">
				<a href="'.$_SERVER['PHP_SELF'].'?action='.$edit_action.'&id='.$id.'"><img src="'.PATH_ICONS.'edit.png" width="16" height="16" alt="Bearbeiten" /></a>&nbsp;<a href="'.$_SERVER['PHP_SELF'].'?action='.$delete_action.'&id='.$id.'"><img src="'.PATH_ICONS.'drop.png" width="16" height="16" alt="L�schen" /></a>&nbsp;<a href="'.ROOT_REL.$prev_link.'" target="_blank"><img src="'.PATH_ICONS.$prev_icon.'" width="16" height="16" alt="Vorschau" /></a>
			</div>
			</td>
			<td>
				<div align="center">'.$id.'</div>
			</td>';
//--------------------------------------------------------------------------------			

/*	echo '<td>';
    echo '<select name="kat" id="kat1-'.$id.'" size="1" class="edit_select">';
	echo '<option value="0">---</option>';
	foreach($kats as $kat) {
		echo '<option value="'.$kat["id"].'"';
		if ($kat["id"] == $kat1)  echo " selected"; 
		echo '>'.$kat["titel"].'</option>';
	}
	echo '</select>
		<br>';

	echo '<select name="kat2" id="kat2-'.$id.'" size="1" class="edit_select">';
	echo '<option value="0">---</option>';
	foreach($kats as $kat) {
		echo '<option value="'.$kat["id"].'"';
		if ($kat["id"] == $kat2)  echo " selected"; 
		echo '>'.$kat["titel"].'</option>';
	}
	echo '</select>
		<br>';

	echo '<select name="kat3" id="kat3-'.$id.'" size="1" class="edit_select">';
	echo '<option value="0">---</option>';
	foreach($kats as $kat) {
		echo '<option value="'.$kat["id"].'"';
		if ($kat["id"] == $kat3)  echo " selected"; 
		echo '>'.$kat["titel"].'</option>';
	}
	echo '</select>
		<br>';
    echo '</td>';*/
//--------------------------------------------------------------------------------	
	echo '<td>
				<select size="1" name="typ" id="typ-'.$id.'" class="edit_select">
					<option value="Originalarbeit">Originalarbeit</option>
					<option value="'._convert('Übersichtsarbeit').'">&Uuml;bersichtsarbeit</option>
					<option value="Dissertation">Dissertation</option>
					<option value="Sonstiges">Sonstiges</option>
				</select>
				 <script>
					$( "#typ-'.$id.'" ).val( "'._convert($typ).'" );
				</script>
			</td>';
		if($titel != '') {
			echo'
			<td class="edit_td" id="titel-'.$id.'">
			   <span id="label_titel-'.$id.'" class="text">'._convert($titel).'</span>
			</td>';
		}
		echo'
			<td>
				<input type="checkbox" value="'.$hidden.'" name="hidden" id="hidden-'.$id.'" '.$hidden_check.'class="edit_box">
				 <script>
					$( "#hidden-'.$id.'" ).val( "'.$hidden.'" );
				</script>
			</td>
			<td><div align="center">'.$link.'</td>
			<td><div align="center">'.$jahr.'</div></td>
			<td><div align="center">'.$sprache.'</div></td>
		</tr>';
	}
	echo '</tbody></table>';
}
?>
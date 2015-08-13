<div class="supportingText">
  <div class="explanation">
	<h3>Formular</h3>
<form action="http://www.adhs-studien.info/suche.html" method="post" name="suche" enctype="multipart/form-data">
<table width="100%">
	<tr>
		<td>Begriff(e):</td>
		<td><input type="text" size="50" class="input" value="<?php if(isset($_POST['item'])) echo $_POST['item']; ?>" name="item"></td>
	</tr>
	<tr>
		<td>Suchbereich:</td>
		<td>
		<select size="1" name="txt">
			<option value="0">Nur &Uuml;berschrift duchsuchen</option>
			<option value="1">&Uuml;berschrift und Text duchsuchen</option>
		</select>
		</td>
	</tr>
	<tr>
		<td>Jahr:</td>
		<td>
		<select size="1" name="jahr">
			<option value="0">alle</option>
			<option value="2002">2002</option>
			<option value="2003">2003</option>
			<option value="2004">2004</option>
			<option value="2005">2005</option>
			<option value="2006">2006</option>
			<option value="2007">2007</option>
			<option value="2008">2008</option>
			<option value="2009">2009</option>
			<option value="2010">2010</option>
			<option value="2011">2011</option>
			<option value="2012">2012</option>
			<option value="2013">2013</option>
		</select>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" class="button" value="Suchen" name="send"></td>
	</tr>
</table>
</form>
</div></div>

<?php
if($_POST['send'] == 'Suchen') {
	if($_POST['item'] != "" || $_POST['jahr'] != 0) {
	  # vars
	  $item = $_POST['item'];
	  $andor = $_POST['andor'];
	  $txt = $_POST['txt'];
	  $jahr = $_POST['jahr'];
	  # suchstring bilden
	  $sql = "SELECT * FROM `adhs_cont` WHERE ";
	  if($item != "")
		$sql .= "`titel` LIKE '%$item%' OR `titel_en` LIKE '%$item%'";
	  if($item != "" && $txt == 1)
		$sql .= " OR `text` LIKE '%$item%' OR `text_en` %LIKE% '%$item%'";
	  if($item != "" && $jahr != 0)
		$sql .= " AND `jahr` = '$jahr'";
	  if($item == "" && $jahr != 0)
		$sql .= "`jahr` = '$jahr'";
	  # anfrage senden
	  $res = mysql_query($sql) or die(mysql_error());
	  $cont = array();
	  while($row = mysql_fetch_assoc($res)) {
		array_push($cont, $row);
	  }
	  # ergebnis anzeigen
	  echo'<div class="supportingText">
	  <div class="explanation">
		<h3>Ergebnisse</h3>';
	  echo'<p>&nbsp</p><ul>';
		foreach($cont as $con) {
			$icon = $con["icon"];
			if($icon == "0") {
				$einzelansicht = array_pop( explode( "/", $con["link"] ) );
				$einzelansicht_link = array_shift( explode( ".", $einzelansicht ) );
				$link = 'http://www.adhs-studien.info/'.$einzelansicht_link.'.html';
				$titel = ($con["titel"] != "") ? $con["titel"] : $con["titel_en"]; # if kurzform
				// ------------------------
				echo'<li><a href="'.$link.'">'.$titel.'</a></li>';
			}
		}
	  echo'</ul>';
	  echo'</div></div>';
	} else {
	  echo'<div class="supportingText">
	  <div class="explanation">
		<h3>Fehler</h3>';
		echo'<p>&nbsp</p>';
		echo'<p>Bitte geben Sie mindestens ein Suchkriterium an!</p>';
	  echo'</div></div>';
	}
} ?>
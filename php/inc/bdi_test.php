<?php
// Auswertung anzeigen
if($_POST['send'] == "send") {
  #print_r($_POST);
  // vars
  if($_POST['a']>0) $f1 = $_POST['a']; else $f1 = 0;
  if($_POST['b']>0) $f2 = $_POST['b']; else $f2 = 0;
  if($_POST['c']>0) $f3 = $_POST['c']; else $f3 = 0;
  if($_POST['d']>0) $f4 = $_POST['d']; else $f4 = 0;
  if($_POST['e']>0) $f5 = $_POST['e']; else $f5 = 0;
  if($_POST['f']>0) $f6 = $_POST['f']; else $f6 = 0;
  if($_POST['g']>0) $f7 = $_POST['g']; else $f7 = 0;
  if($_POST['h']>0) $f8 = $_POST['h']; else $f8 = 0;
  if($_POST['i']>0) $f9 = $_POST['i']; else $f9 = 0;
  if($_POST['j']>0) $f10 = $_POST['j']; else $f10 = 0;
  if($_POST['k']>0) $f11 = $_POST['k']; else $f11 = 0;
  if($_POST['l']>0) $f12 = $_POST['l']; else $f12 = 0;
  if($_POST['m']>0) $f13 = $_POST['m']; else $f13 = 0;
  if($_POST['n']>0) $f14 = $_POST['n']; else $f14 = 0;
  if($_POST['o']>0) $f15 = $_POST['o']; else $f15 = 0;
  if($_POST['p']>0) $f16 = $_POST['p']; else $f16 = 0;
  if($_POST['q']>0) $f17 = $_POST['q']; else $f17 = 0;
  if($_POST['r']>0) $f18 = $_POST['r']; else $f18 = 0;
  if($_POST['s']>0 && $_POST['s2']!=1) $f19 = $_POST['s']; else $f19 = 0;
  if($_POST['t']>0) $f20 = $_POST['t']; else $f20 = 0;
  if($_POST['u']>0) $f21 = $_POST['u']; else $f21 = 0;
  
  // Auswertung
  $summe = $f1+$f2+$f3+$f4+$f5+$f6+$f7+$f8+$f9+$f10+$f11+$f12+$f13+$f14+$f15+$f16+$f17+$f18+$f19+$f20+$f21; # 1-21
  echo'<p class="p1"><strong>Auswertung:</strong></p>';
	
	if($summe <= 9) {
		echo'<p class="p1"><b>Sie haben '.$summe.' Punkte. Anscheinend sind Sie nicht depressiv.';
		echo'</b></p>';
	} elseif($summe >= 10 && $summe <= 18) {
		echo'<p class="p1"><b>Sie haben '.$summe.' Punkte. Das deutet auf eine leichte Depression hin. ';
		echo'Sie sollten sich mit einem Fachmann in Verbindung setzen, um das weitere Vorgehen zu besprechen!</b></p>';
	} elseif($summe >= 19 && $summe <= 29) {
		echo'<p class="p1"><b>Sie haben '.$summe.' Punkte. Das deutet auf eine mittelgradige Depression hin. ';
		echo'Sie sollten sich mit einem Fachmann in Verbindung setzen, um das weitere Vorgehen zu besprechen!</b></p>';
	} elseif($summe >= 30) {
		echo'<p class="p1"><b>Sie haben '.$summe.' Punkte. Das deutet auf eine schwere Depression hin. ';
		echo'Sie sollten sich mit einem Fachmann in Verbindung setzen, um das weitere Vorgehen zu besprechen!</b></p>';
	}

  echo'<p class="p1"><em>Hinweis: Die Auswertung erfolgt anhand der unten stehenden Cut-off Werte. Weitere Informationen erhalten Sie auf den entsprechenden Seiten des <a href="http://www.icd-code.de/icd/code/F32.-.html" title="ICD-10" target="_blank">ICD-10</a> oder des <a href="http://www.behavenet.com/capsules/disorders/mjrdepep.htm" title="DSM-IV" target="_blank">DSM-IV</a>.</em></p>
  
  	<table width="400" border="0">
	  <tr>
		<td>Keine Depression:</td>
		<td>0 - 9 Punkte</td>
	  </tr>
	  <tr>
		<td>Leichte Depression:</td>
		<td>10 - 18 Punkte</td>
	  </tr>
	  <tr>
		<td>Mittelgradige Depression:</td>
		<td>19 - 29 Punkte</td>
	  </tr>
	  <tr>
		<td>Schwere Depression:</td>
		<td>30 und mehr Punkte</td>
	  </tr>
	</table>';

  echo'<br /><p class="p1"><a href="javascript:history.back()">zur&uuml;ck</a></p>';
  
# fragebogen
} else {
	echo'
		<p>Dieser Fragebogen enth&auml;lt 21 Gruppen von Aussagen. Bitte lesen Sie jede Gruppe sorgf&auml;ltig durch. Suchen Sie dann die eine Aussage in jeder Gruppe heraus, die am besten beschreibt, wie Sie sich in dieser Woche einschlie&szlig;lich heute gef&uuml;hlt haben und kreuzen Sie die dazugeh&ouml;rige Antwort an. Falls mehrere Aussagen einer Gruppe gleicherma&szlig;en zutreffen, k&ouml;nnen Sie auch mehrere Antworten markieren. Lesen Sie auf jeden Fall alle Aussagen in jeder Gruppe, bevor Sie Ihre Wahl treffen.</p>
	<form action="http://www.adhs-studien.info/depression_selbsttest.html" method="post" name="bdi" enctype="multipart/form-data">
	<table border="1" width="100%">
	  <tr>
		<td width="20">A</td>
		<td width="20"><input type="checkbox" name="a" value="0"></td>
		<td>Ich bin nicht traurig.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="a" value="1"></td>
		<td>Ich bin traurig.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="a" value="2"></td>
		<td>Ich bin die ganze Zeit traurig und komme nicht davon los.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="a" value="3"></td>
		<td>Ich bin so traurig oder ungl&uuml;cklich, da&szlig; ich es kaum noch ertrage.</td>
	  </tr>
	</table>
	<table border="1" width="100%">
	  <tr>
		<td width="20">B</td>
		<td width="20"><input type="checkbox" name="b" value="0"></td>
		<td>Ich sehe nicht besonders mutlos in die Zukunft.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="b" value="1"></td>
		<td>Ich sehe mutlos in die Zukunft.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="b" value="2"></td>
		<td>Ich habe nichts, worauf ich mich freuen kann.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="b" value="3"></td>
		<td>Ich habe das Gef&uuml;hl, da&szlig; die Zukunft hoffnungslos ist und da&szlig; die Situation nicht besser werden kann.</td>
	  </tr>
	</table>
	<table border="1" width="100%">
	  <tr>
		<td width="20">C</td>
		<td width="20"><input type="checkbox" name="c" value="0"></td>
		<td>Ich f&uuml;hle mich nicht als Versager.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="c" value="1"></td>
		<td>Ich habe das Gef&uuml;hl, &ouml;fter versagt zu haben als der Durchschnitt.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="c" value="2"></td>
		<td>Wenn ich auf mein Leben zur&uuml;ckblicke, sehe ich blo&szlig; eine Menge Fehlschl&auml;ge.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="c" value="3"></td>
		<td>Ich habe das Gef&uuml;hl, als Mensch ein v&ouml;lliger Versager zu sein.</td>
	  </tr>
	</table>
	<table border="1" width="100%">
	  <tr>
		<td width="20">D</td>
		<td width="20"><input type="checkbox" name="d" value="0"></td>
		<td>Ich kann die Dinge genauso genie&szlig;en wie fr&uuml;her.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="d" value="1"></td>
		<td>Ich kann die Dinge nicht mehr so genie&szlig;en wie fr&uuml;her.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="d" value="2"></td>
		<td>Ich kann aus nichts mehr eine echte Befriedigung ziehen.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="d" value="3"></td>
		<td>Ich bin mit allem unzufrieden oder gelangweilt.</td>
	  </tr>
	</table>
	<table border="1" width="100%">
	  <tr>
		<td width="20">E</td>
		<td width="20"><input type="checkbox" name="e" value="0"></td>
		<td>Ich habe keine Schuldgef&uuml;hle.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="e" value="1"></td>
		<td>Ich habe h&auml;ufig Schuldgef&uuml;hle.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="e" value="2"></td>
		<td>Ich habe fast Immer Schuldgef&uuml;hle.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="e" value="3"></td>
		<td>Ich habe immer Schuldgef&uuml;hle.</td>
	  </tr>
	</table>
	<table border="1" width="100%">
	  <tr>
		<td width="20">F</td>
		<td width="20"><input type="checkbox" name="f" value="0"></td>
		<td>Ich habe nicht das Gef&uuml;hl, gestraft zu sein.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="f" value="1"></td>
		<td>Ich habe das Gef&uuml;hl vielleicht bestraft zu werden.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="f" value="2"></td>
		<td>Ich erwarte, bestraft zu werden.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="f" value="3"></td>
		<td>Ich habe das Gef&uuml;hl bestraft zu geh&ouml;ren.</td>
	  </tr>
	</table>
	<table border="1" width="100%">
	  <tr>
		<td width="20">G</td>
		<td width="20"><input type="checkbox" name="g" value="0"></td>
		<td>Ich bin nicht von mir entt&auml;uscht.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="g" value="1"></td>
		<td>Ich bin von mir entt&auml;uscht.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="g" value="2"></td>
		<td>Ich finde mich f&uuml;rchterlich.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="g" value="3"></td>
		<td>Ich hasse mich.</td>
	  </tr>
	</table>
	<table border="1" width="100%">
	  <tr>
		<td width="20">H</td>
		<td width="20"><input type="checkbox" name="h" value="0"></td>
		<td>Ich habe nicht das Gef&uuml;hl schlechter zu sein als die anderen.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="h" value="1"></td>
		<td>Ich kritisiere mich wegen meiner Fehler und Schw&auml;chen.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="h" value="2"></td>
		<td>Ich mache mir die ganze Zeit Vorw&uuml;rfe wegen meiner M&auml;ngel.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="h" value="3"></td>
		<td>Ich gebe mir f&uuml;r alles die Schuld, was schiefgeht.</td>
	  </tr>
	</table>
	<table border="1" width="100%">
	  <tr>
		<td width="20">I</td>
		<td width="20"><input type="checkbox" name="i" value="0"></td>
		<td>Ich denke nicht daran, mir etwas anzutun.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="i" value="1"></td>
		<td>Ich denke manchmal an Selbstmord, aber ich w&uuml;rde es nicht tun.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="i" value="2"></td>
		<td>Ich m&ouml;chte mich am liebsten umbringen.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="i" value="3"></td>
		<td>Ich w&uuml;rde mich umbringen, wenn ich es k&ouml;nnte.</td>
	  </tr>
	</table>
	<table border="1" width="100%">
	  <tr>
		<td width="20">J</td>
		<td width="20"><input type="checkbox" name="j" value="0"></td>
		<td>Ich weine nicht &ouml;fter als fr&uuml;her.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="j" value="1"></td>
		<td>Ich weine jetzt mehr als fr&uuml;her.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="j" value="2"></td>
		<td>Ich weine jetzt die ganze Zeit.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="j" value="3"></td>
		<td>Fr&uuml;her konnte ich weinen, aber jetzt kann ich es nicht mehr, obwohl ich es m&ouml;chte.</td>
	  </tr>
	</table>
	<table border="1" width="100%">
	  <tr>
		<td width="20">K</td>
		<td width="20"><input type="checkbox" name="k" value="0"></td>
		<td>Ich bin nicht reizbarer als sonst.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="k" value="1"></td>
		<td>Ich bin jetzt leichter ver&auml;rgert oder gereizt als fr&uuml;her.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="k" value="2"></td>
		<td>Ich f&uuml;hle mich dauernd gereizt.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="k" value="3"></td>
		<td>Die Dinge, die mich fr&uuml;her ge&auml;rgert haben, ber&uuml;hren mich nicht mehr.</td>
	  </tr>
	</table>
	<table border="1" width="100%">
	  <tr>
		<td width="20">L</td>
		<td width="20"><input type="checkbox" name="l" value="0"></td>
		<td>Ich habe nicht das Interesse an Menschen verloren.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="l" value="1"></td>
		<td>ich interessiere mich jetzt weniger f&uuml;r Menschen als fr&uuml;her.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="l" value="2"></td>
		<td>Ich habe mein Interesse an anderen Menschen zum gr&ouml;&szlig;ten Teil verloren.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="l" value="3"></td>
		<td>Ich habe mein ganzes Interesse an anderen Menschen verloren.</td>
	  </tr>
	</table>
	<table border="1" width="100%">
	  <tr>
		<td width="20">M</td>
		<td width="20"><input type="checkbox" name="m" value="0"></td>
		<td>Ich bin so entschlu&szlig;freudig wie immer.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="m" value="1"></td>
		<td>Ich schiebe Erledigungen jetzt &ouml;fter als fr&uuml;her auf.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="m" value="2"></td>
		<td>Es f&auml;llt mir jetzt schwerer als fr&uuml;her, Entscheidungen zu treffen.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="m" value="3"></td>
		<td>Ich kann &uuml;berhaupt keine Entscheidungen mehr treffen.</td>
	  </tr>
	</table>
	<table border="1" width="100%">
	  <tr>
		<td width="20">N</td>
		<td width="20"><input type="checkbox" name="n" value="0"></td>
		<td>Ich habe nicht das Gef&uuml;hl, schlechter auszusehen als fr&uuml;her.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="n" value="1"></td>
		<td>Ich mache mir Sorgen, da&szlig; ich alt oder unattraktiv aussehe.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="n" value="2"></td>
		<td>Ich habe das Gef&uuml;hl, da&szlig; in meinem Aussehen Ver&auml;nderungen eintreten.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="n" value="3"></td>
		<td>Ich finde mich h&auml;&szlig;lich.</td>
	  </tr>
	</table>
	<table border="1" width="100%">
	  <tr>
		<td width="20">O</td>
		<td width="20"><input type="checkbox" name="o" value="0"></td>
		<td>Ich kann so gut arbeiten wie fr&uuml;her.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="o" value="1"></td>
		<td>Ich mu&szlig; mir einen Ruck geben, bevor ich eine T&auml;tigkeit in Angriff nehme.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="o" value="2"></td>
		<td>Ich mu&szlig; mich zu jeder T&auml;tigkeit zwingen.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="o" value="3"></td>
		<td>Ich bin unf&auml;hig zu arbeiten.</td>
	  </tr>
	</table>
	<table border="1" width="100%">
	  <tr>
		<td width="20">P</td>
		<td width="20"><input type="checkbox" name="p" value="0"></td>
		<td>Ich schlafe so gut wie sonst.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="p" value="1"></td>
		<td>Ich schlafe nicht mehr so gut wie fr&uuml;her.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="p" value="2"></td>
		<td>Ich wache 1 bis 2 Stunden fr&uuml;her auf als sonst, und es f&auml;llt mir schwer, wieder einzuschlafen.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="p" value="3"></td>
		<td>Ich wache mehrere Stunden fr&uuml;her auf als sonst und kann nicht mehr einschlafen.</td>
	  </tr>
	</table>
	<table border="1" width="100%">
	  <tr>
		<td width="20">Q</td>
		<td width="20"><input type="checkbox" name="q" value="0"></td>
		<td>Ich erm&uuml;de nicht st&auml;rker als sonst.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="q" value="1"></td>
		<td>Ich erm&uuml;de schneller als fr&uuml;her.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="q" value="2"></td>
		<td>Fast alles erm&uuml;det mich.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="q" value="3"></td>
		<td>Ich bin zu m&uuml;de, um etwas zu tun.</td>
	  </tr>
	</table>
	<table border="1" width="100%">
	  <tr>
		<td width="20">R</td>
		<td width="20"><input type="checkbox" name="r" value="0"></td>
		<td>Mein Appetit ist nicht schlechter als sonst.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="r" value="1"></td>
		<td>Mein Appetit ist nicht mehr so gut wie fr&uuml;her.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="r" value="2"></td>
		<td>Mein Appetit hat sehr stark nachgelassen.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="r" value="3"></td>
		<td>Ich habe &uuml;berhaupt keinen Appetit mehr.</td>
	  </tr>
	</table>
	<table border="1" width="100%">
	  <tr>
		<td width="20">S</td>
		<td width="20"><input type="checkbox" name="s" value="0"></td>
		<td>Ich habe in letzter Zeit kaum abgenommen.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="s" value="1"></td>
		<td>Ich hebe mehr als 2 Kilo abgenommen.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="s" value="2"></td>
		<td>Ich habe mehr als 5 Kilo abgenommen.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="s" value="3"></td>
		<td>Ich habe mehr als 8 Kilo abgenommen.</td>
	  </tr>
	  <tr>
		<td>S2</td>
		<td width="20"><input type="checkbox" name="s2" value="1"></td>
		<td>Ich esse absichtlich weniger, um abzunehmen</td>
	  </tr>
	</table>
	<table border="1" width="100%">
	  <tr>
		<td width="20">T</td>
		<td width="20"><input type="checkbox" name="t" value="0"></td>
		<td>Ich mache mir keine gr&ouml;&szlig;eren Sorgen um meine Gesundheit als sonst.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="t" value="1"></td>
		<td>Ich mache mir Sorgen &uuml;ber k&ouml;rperliche Probleme, wie Schmerzen, Magenbeschwerden oder Verstopfung.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="t" value="2"></td>
		<td>Ich mache mir so gro&szlig;e Sorgen &uuml;ber gesundheitliche Probleme, da&szlig; es mir schwerf&auml;llt, an etwas anderes zu denken.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="t" value="3"></td>
		<td>Ich mache mir so gro&szlig;e Sorgen &uuml;ber gesundheitliche Probleme, da&szlig; ich an nichts anderes mehr denken kann.</td>
	  </tr>
	</table>
	<table border="1" width="100%">
	  <tr>
		<td width="20">U</td>
		<td width="20"><input type="checkbox" name="u" value="0"></td>
		<td>Ich habe in letzter Zeit keine Ver&auml;nderung meines Interesses an Sex bemerkt.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="u" value="1"></td>
		<td>Ich interessiere mich weniger f&uuml;r Sex als fr&uuml;her.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="u" value="2"></td>
		<td>Ich interessiere mich jetzt viel weniger f&uuml;r Sex.</td>
	  </tr>
	  <tr>
		<td width="20">&nbsp;</td>
		<td width="20"><input type="checkbox" name="u" value="3"></td>
		<td>Ich habe das Interesse an Sex v&ouml;llig verloren.</td>
	  </tr>
	</table>
	  <br /><p class="p1"><strong>Bitte pr&uuml;fen Sie, ob Sie alle Fragen beantwortet haben.</strong></p>
	  <input type="submit" name="send" id="send" value="Senden" />
	  <input type="hidden" name="send" value="send" />
	</form>
  <br /><p class="p1">Die Original-Version dieses Fragebogens k&ouml;nnen Sie <a href="http://www.adhs-studien.info/docs/bdi-test.pdf" title="BDI" target="_blank"><strong>HIER</strong></a> als PDF-Datei herunterladen.</p>
';
}
?>
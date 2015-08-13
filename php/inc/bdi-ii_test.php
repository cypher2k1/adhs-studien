<?php
	echo'
	<form action="'.ROOT_ABS.'auswertung.html" method="post" name="bdi-ii" enctype="multipart/form-data">
	  <table>
			<caption>Beck-Depressions-Inventar, 2. Auflage (BDI-II)<br>
		    <small>M. Hautzinger, M. Bailer, H. Worall et al. (1994); deutsche Ausgabe</small></caption>
			<thead>
				<td colspan="2">
					<p class="p1">Dieser Fragebogen enth&auml;lt 21 Gruppen von Aussagen. Bitte lesen Sie jede Gruppe sorgf&auml;ltig durch. Suchen Sie dann die eine Aussage in jeder Gruppe heraus, die am besten beschreibt, wie Sie sich in den vergangenen beiden Wochen gef&uuml;hlt haben. Lesen Sie auf jeden Fall alle Aussagen in jeder Gruppe, bevor Sie Ihre Wahl treffen. Falls mehrere Aussagen in einer Gruppe gleicherma&szlig;en zutreffen, w&auml;hlen Sie die Antwort aus, die weiter unten steht.</p>
				</td>
			</thead>
			<tfoot>
				<tr>
					<td colspan="2" style="text-align:center">
					  <p class="p1"><strong>Bitte pr&uuml;fen Sie, ob Sie alle Fragen beantwortet haben.</strong></p>
					  <button id="send">Test auswerten</button>
			              <p>Weitere Informationen &uuml;ber den Test finden Sie auf der <a href="http://www.pearsonassessment.de/Beck-Depressions-Inventar-2-Auflage-BDI-II.html" rel="nofollow" target="_blank">Seite des Herausgebers</a>.</p>
					  <input type="hidden" name="subject" value="bdi-ii">
					  <input type="hidden" name="send" value="send">
					</td>
				</tr>
			</tfoot>
  		<tbody>
			  <tr>
			    <td>1</td>
			    <td>
			      <label for="1">Traurigkeit:</label><br />
			      <select name="1" id="1">
			        <option value="0">Ich bin nicht traurig</option>
			        <option value="1">Ich bin oft traurig</option>
			        <option value="2">Ich bin st&auml;ndig traurig</option>
			        <option value="3">Ich bin so traurig oder ungl&uuml;cklich, dass ich es nicht aushalte</option>
			      </select>
			    </td>
			  </tr>
			  <tr>
			    <td>2</td>
			    <td>
			      <label for="2">Pessimismus:</label><br />
			      <select name="2" id="2">
			        <option value="0">Ich sehe nicht mutlos in die Zukunft</option>
			        <option value="1">Ich sehe mutloser in die Zukunft als sonst</option>
			        <option value="2">Ich bin mutlos und erwarte nicht, dass meine Situation besser wird</option>
			        <option value="3">Ich glaube, dass meine Zukunft hoffnungslos ist und nur noch schlechter wird</option>
			      </select>
			    </td>
			  </tr>
			  <tr>
			    <td>3</td>
			    <td>
			      <label for="3">Versagensgef&uuml;hle:</label><br />
			      <select name="3" id="3">
			        <option value="0">Ich f&uuml;hle mich nicht als Versager</option>
			        <option value="1">Ich habe h&auml;ufiger Versagensgef&uuml;hle</option>
			        <option value="2">Wenn ich zur&uuml;ckblicke, sehe ich eine Menge Fehlschl&auml;ge</option>
			        <option value="3">Ich habe das Gef&uuml;hl, als Mensch ein v&ouml;lliger Versager zu sein</option>
			      </select>
			    </td>
			  </tr>
			  <tr>
			    <td>4</td>
			    <td>
			      <label for="4">Verlust von Freude:</label><br />
			      <select name="4" id="4">
			        <option value="0">Ich kann Dinge genauso gut genie&szlig;en wie fr&uuml;her</option>
			        <option value="1">Ich kann die Dinge nicht mehr so genie&szlig;en wie fr&uuml;her</option>
			        <option value="2">Dinge, die mir fr&uuml;her Freude gemacht haben, kann ich kaum mehr genie&szlig;en</option>
			        <option value="3">Dinge, die mir fr&uuml;her Freude gemacht haben, kann ich &uuml;berhaupt nicht mehr genie&szlig;en</option>
			      </select>
			    </td>
			  </tr>
			  <tr>
			    <td>5</td>
			    <td>
			      <label for="5">Schuldgef&uuml;hle:</label><br />
			      <select name="5" id="5">
			        <option value="0">Ich habe keine besonderen Schuldgef&uuml;hle</option>
			        <option value="1">Ich habe oft Schuldgef&uuml;hle wegen Dingen, die ich getan habe oder h&auml;tte tun sollen</option>
			        <option value="2">Ich habe die meiste Zeit Schuldgef&uuml;hle</option>
			        <option value="3">Ich habe st&auml;ndig Schuldgef&uuml;hle</option>
			      </select>
			    </td>
			  </tr>
			  <tr>
			    <td>6</td>
			    <td>
			      <label for="6">Bestrafungsgef&uuml;hl:</label><br />
			      <select name="6" id="6">
			        <option value="0">Ich habe nicht das Gef&uuml;hl, f&uuml;r etwas bestraft zu sein</option>
			        <option value="1">Ich habe das Gef&uuml;hl, vielleicht bestraft zu werden</option>
			        <option value="2">Ich erwarte, bestraft zu werden</option>
			        <option value="3">Ich habe das Gef&uuml;hl, bestraft zu sein</option>
			      </select>
			    </td>
			  </tr>
			  <tr>
			    <td>7</td>
			    <td>
			      <label for="7">Selbstablehnung:</label><br />
			      <select name="7" id="7">
			        <option value="0">Ich halte von mir genauso viel wie immer</option>
			        <option value="1">Ich habe Vertrauen in mich verloren</option>
			        <option value="2">Ich bin von mir entt&auml;uscht</option>
			        <option value="3">Ich lehne mich v&ouml;llig ab</option>
			      </select>
			    </td>
			  </tr>
			  <tr>
			    <td>8</td>
			    <td>
			      <label for="8">Selbstvorw&uuml;rfe:</label><br />
			      <select name="8" id="8">
			        <option value="0">Ich kritisiere oder tadle mich nicht mehr als sonst</option>
			        <option value="1">Ich bin mir gegen&uuml;ber kritischer als sonst</option>
			        <option value="2">Ich kritisiere mich f&uuml;r all meine M&auml;ngel</option>
			        <option value="3">Ich gebe mir die Schuld f&uuml;r alles Schlimme, was passiert</option>
			      </select>
			    </td>
			  </tr>
			  <tr>
			    <td>9</td>
			    <td>
			      <label for="9">Selbstmordgedanken:</label><br />
			      <select name="9" id="9">
			        <option value="0">Ich denke nicht daran, mir etwas anzutun</option>
			        <option value="1">Ich denke manchmal an Selbstmord, aber ich w&uuml;rde es nicht tun</option>
			        <option value="2">Ich m&ouml;chte mich am liebsten umbringen</option>
			        <option value="3">Ich w&uuml;rde mich umbringen, wenn ich die Gelegenheit dazu h&auml;tte</option>
			      </select>
			    </td>
			  </tr>
			  <tr>
			    <td>10</td>
			    <td>
			      <label for="10">Weinen:</label><br />
			      <select name="10" id="10">
			        <option value="0">Ich weine nicht &ouml;fter als fr&uuml;her</option>
			        <option value="1">Ich weine jetzt mehr als fr&uuml;her</option>
			        <option value="2">Ich weine beim geringsten Anlass</option>
			        <option value="3">Ich m&ouml;chte gern weinen, aber ich kann nicht</option>
			      </select>
			    </td>
			  </tr>
			  <tr>
			    <td>11</td>
			    <td>
			      <label for="11">Unruhe:</label><br />
			      <select name="11" id="11">
			        <option value="0">Ich bin nicht unruhiger als sonst</option>
			        <option value="1">Ich bin unruhiger als sonst</option>
			        <option value="2">Ich bin so unruhig, dass es mir schwerf&auml;llt, stillzusitzen</option>
			        <option value="3">Ich bin so unruhig, dass ich mich st&auml;ndig bewegen oder etwas tun muss</option>
			      </select>
			    </td>
			  </tr>
			  <tr>
			    <td>12</td>
			    <td>
			      <label for="12">Interessenverlust:</label><br />
			      <select name="12" id="12">
			        <option value="0">Ich habe das Interesse an anderen Menschen oder an T&auml;tigkeiten nicht verloren</option>
			        <option value="1">Ich habe weniger Interesse an anderen Dingen als sonst</option>
			        <option value="2">Ich habe das Interesse an anderen Menschen oder an Dingen zum gr&ouml;&szlig;ten Teil verloren</option>
			        <option value="3">Es f&auml;llt mir schwer, mich &uuml;berhaupt f&uuml;r irgendetwas zu interessieren</option>
			      </select>
			    </td>
			  </tr>
			  <tr>
			    <td>13</td>
			    <td>
			      <label for="13">Entschlussf&auml;higkeit:</label><br />
			      <select name="13" id="13">
			        <option value="0">Ich bin so entschlussfreudig wie immer</option>
			        <option value="1">Es f&auml;llt mir schwerer als sonst, Entscheidungen zu treffen</option>
			        <option value="2">Es f&auml;llt mir sehr viel schwerer als sonst, Entscheidungen zu treffen</option>
			        <option value="3">Ich habe M&uuml;he, &uuml;berhaupt Entscheidungen zu treffen</option>
			      </select>
			    </td>
			  </tr>
			  <tr>
			    <td>14</td>
			    <td>
			      <label for="14">Wertlosigkeit:</label><br />
			      <select name="14" id="14">
			        <option value="0">Ich f&uuml;hle mich nicht wertlos</option>
			        <option value="1">Ich halte mich f&uuml;r weniger wertvoll und n&uuml;tzlich als sonst</option>
			        <option value="2">Verglichen mit anderen Menschen f&uuml;hle ich mich viel weniger wert</option>
			        <option value="3">Ich f&uuml;hle mich v&ouml;llig wertlos</option>
			      </select>
			    </td>
			  </tr>
			  <tr>
			    <td>15</td>
			    <td>
			      <label for="15">Energieverlust:</label><br />
			      <select name="15" id="15">
			        <option value="0">Ich habe so viel Energie wie immer</option>
			        <option value="1">Ich habe weniger Energie als sonst</option>
			        <option value="2">Ich habe so wenig Energie, dass ich kaum noch was schaffe</option>
			        <option value="3">Ich habe keine Energie mehr, um &uuml;berhaupt noch etwas zu tun</option>
			      </select>
			    </td>
			  </tr>
			  <tr>
			    <td>16</td>
			    <td>
			      <label for="16">Ver&auml;nderungen der Schlafgewohnheiten:</label><br />
			      <select name="16" id="16">
			        <option value="0">Meine Schlafgewohnheiten haben sich nicht ver&auml;ndert</option>
			        <option value="1">Ich schlafe etwas mehr als sonst</option>
			        <option value="1">Ich schlafe etwas weniger als sonst</option>
			        <option value="2">Ich schlafe viel mehr als sonst</option>
			        <option value="2">Ich schlafe viel weniger als sonst</option>
			        <option value="3">Ich schlafe fast den ganzen Tag</option>
			        <option value="3">Ich wache 1-2 Stunden fr&uuml;her auf als gew&ouml;hnlich und kann nicht mehr einschlafen</option>
			      </select>
			    </td>
			  </tr>
			  <tr>
			    <td>17</td>
			    <td>
			      <label for="17">Reizbarkeit:</label><br />
			      <select name="17" id="17">
			        <option value="0">Ich bin nicht reizbarer als sonst</option>
			        <option value="1">Ich bin reizbarer als sonst</option>
			        <option value="2">Ich bin viel reizbarer als sonst</option>
			        <option value="3">Ich f&uuml;hle mich dauernd gereizt</option>
			      </select>
			    </td>
			  </tr>
			  <tr>
			    <td>18</td>
			    <td>
			      <label for="18"> Ver&auml;nderungen des Appetits:</label><br />
			      <select name="18" id="18">
			        <option value="0">Mein Appetit hat sich nicht ver&auml;ndert</option>
			        <option value="1">Mein Appetit ist etwas gr&ouml;&szlig;er als sonst</option>
			        <option value="2">Mein Appetit ist viel schlechter als sonst</option>
			        <option value="2">Mein Appetit ist viel gr&ouml;&szlig;er als sonst</option>
			        <option value="3">Ich habe &uuml;berhaut keinen Appetit</option>
			        <option value="3">Ich habe st&auml;ndig Hei&szlig;hunger</option>
			      </select>
			    </td>
			  </tr>
			  <tr>
			    <td>19</td>
			    <td>
			      <label for="19">Konzentrationsschwierigkeiten:</label><br />
			      <select name="19" id="19">
			        <option value="0">Ich kann mich so gut konzentrieren wie immer</option>
			        <option value="1">Ich kann mich nicht mehr so gut konzentrieren wie sonst</option>
			        <option value="2">Es f&auml;llt mir schwer, mich l&auml;ngere Zeit auf irgendetwas zu konzentrieren</option>
			        <option value="3">Ich kann mich &uuml;berhaupt nicht mehr konzentrieren</option>
			      </select>
			    </td>
			  </tr>
			  <tr>
			    <td>20</td>
			    <td>
			      <label for="20">Erm&uuml;dung oder Ersch&ouml;pfung:</label><br />
			      <select name="20" id="20">
			        <option value="0">Ich f&uuml;hle mich nicht m&uuml;der oder ersch&ouml;pfter als sonst</option>
			        <option value="1">Ich werde schneller m&uuml;de oder ersch&ouml;pft als sonst</option>
			        <option value="2">F&uuml;r viele Dinge, die ich &uuml;blicherweise tue, bin ich zu m&uuml;de oder ersch&ouml;pft</option>
			        <option value="3">Ich bin so m&uuml;de oder ersch&ouml;pft, dass ich fast nichts mehr tun kann</option>
			      </select>
			    </td>
			  </tr>
			  <tr>
			    <td>21</td>
			    <td>
			      <label for="21">Verlust an sexuellem Interesse:</label><br />
			      <select name="21" id="21">
			        <option value="0">Mein Interesse an Sexualit&auml;t hat sich in letzter Zeit nicht ver&auml;ndert</option>
			        <option value="1">Ich interessiere mich weniger f&uuml;r Sexualit&auml;t als fr&uuml;her</option>
			        <option value="2">Ich interessiere mich jetzt viel weniger f&uuml;r Sexualit&auml;t</option>
			        <option value="3">Ich habe das Interesse an Sexualit&auml;t v&ouml;llig verloren</option>
			      </select>
			    </td>
			  </tr>
			</tbody>
	  </table>
	</form>
';
	// JS IDEAL FORMS 3
	echo'
	<script src="'.$jquery.'"></script>
	<script src="'.$idealselect.'"></script>
	<script>
		$("select").idealselect();
	</script>
';
?>
<?php
	echo'
<form action="'.ROOT_ABS.'auswertung.html" method="post" name="adhs-sb" enctype="multipart/form-data">
<table>
	<caption>ADHS-Selbstbeurteilungsskala (ADHS-SB)
    <small>(R&ouml;sler et al. 2004)</small></caption>
  <tbody><tr>
		<td colspan="2">
	<p class="p1">Nachfolgend finden Sie einige Fragen &uuml;ber Konzentrationsverm&ouml;gen, Bewegungsbed&uuml;rfnis und Nervosit&auml;t. Gemeint ist damit Ihre Situation, wie sie sich gew&ouml;hnlich darstellt. Wenn die Formulierungen auf Sie nicht zutreffen, kreuzen Sie bitte &raquo;nicht zutreffend&laquo; an. Wenn Sie der Meinung sind, dass die Aussagen richtig sind, geben Sie bitte an, welche Auspr&auml;gung - leicht/mittel/schwer - Ihre Situation am besten beschreibt.</p>
	<p class="p1">
	  <strong>0	trifft nicht zu</strong><br>
	  <strong>1	leicht ausgepr&auml;gt (kommt gelegentlich vor)</strong><br>
	  <strong>2	mittel ausgepr&auml;gt (kommt oft vor)</strong><br>
	  <strong>3	schwer ausgepr&auml;gt (kommt nahezu immer vor)</strong>
	</p>
	<p class="p1">Bitte kreuzen Sie die entsprechende Antwortalternative an. Lassen Sie bitte keinen Punkt aus.</p>
	<p class="p1"><strong>Beispiel:</strong></p>

		</td>
	  </tr>
	<tr>
		<td><p class="p1">Ich bin unaufmerksam gegen&uuml;ber Details oder mache Sorgfaltsfehler <strong>bei der Arbeit</strong>.
	</p></td>
		<td>
            <select name="beispielfrage" id="beispielfrage">
                <option>0</option>
                <option>1</option>
                <option>2</option>
                <option selected>3</option>
              </select>
<!--		  <label><input type="radio" name="beispielfrage" value="0" id="beispielfrage_0"> 0</label>
		  <label><input type="radio" name="beispielfrage" value="1" id="beispielfrage_1"> 1</label>
		  <label><input type="radio" name="beispielfrage" value="2" id="beispielfrage_2"> 2</label>
		  <label><input name="beispielfrage" type="radio" id="beispielfrage_3" value="3" checked="checked"> 3</label>
-->		</td>
	  </tr>
	<tr>
		<td colspan="2">
	<p class="p1">In diesem Fall ist die 3 (schwer ausgepr&auml;gt) angekreuzt: Das w&uuml;rde bedeuten, dass Sie stark ausgepr&auml;gt und nahezu immer Aufmerksamkeitsprobleme haben.</p>
	<p class="p1">&nbsp;</p>
		</td>
	  </tr>
	<tr>
		<td><p class="p1">1. Ich bin unaufmerksam gegen&uuml;ber Details oder mache Sorgfaltsfehler bei der Arbeit.</p></td>
		<td>
            <select name="frage01" id="frage01">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">2. Bei der Arbeit oder sonstigen Aktivit&auml;ten (z. B. Lesen, Fernsehen, Spiel) f&auml;llt es mir schwer, konzentriert durchzuhalten.</p></td>
		<td>
            <select name="frage02" id="frage02">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">3. Ich h&ouml;re nicht richtig zu, wenn jemand etwas zu mir sagt.</p></td>
		<td>
            <select name="frage03" id="frage03">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">4. Es f&auml;llt mir schwer, Aufgaben am Arbeitsplatz, wie sie mir erkl&auml;rt wurden, zu erf&uuml;llen.</p></td>
		<td>
            <select name="frage04" id="frage04">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">5. Es f&auml;llt mir schwer, Projekte, Vorhaben oder Aktivit&auml;ten zu organisieren.</p></td>
		<td>
            <select name="frage05" id="frage05">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">6. Ich gehe Aufgaben, die geistige Anstrengung erforderlich machen, am liebsten aus dem Weg. Ich mag solche Arbeiten nicht oder str&auml;ube mich innerlich dagegen.</p></td>
		<td>
            <select name="frage06" id="frage06">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">7. Ich verlege wichtige Gegenst&auml;nde (z. B. Schl&uuml;ssel, Portemonnaie, Werkzeuge).</p></td>
		<td>
            <select name="frage07" id="frage07">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">8. Ich lasse mich bei T&auml;tigkeiten leicht ablenken.</p></td>
		<td>
            <select name="frage08" id="frage08">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">9. Ich vergesse Verabredungen, Termine oder telefonische R&uuml;ckrufe.</p></td>
		<td>
            <select name="frage09" id="frage09">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">10. Ich bin zappelig.</p></td>
		<td>
            <select name="frage10" id="frage10">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">11. Es f&auml;llt mir schwer, l&auml;ngere Zeit sitzen zu bleiben (z. B. im Kino, Theater).</p></td>
		<td>
            <select name="frage11" id="frage11">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">12. Ich f&uuml;hle mich unruhig.</p></td>
		<td>
            <select name="frage12" id="frage12">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">13. Ich kann mich schlecht leise besch&auml;ftigen. Wenn ich etwas mache, geht es laut zu.</p></td>
		<td>
            <select name="frage13" id="frage13">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">14. Ich bin st&auml;ndig auf Achse und f&uuml;hle mich wie von einem Motor angetrieben.</p></td>
		<td>
            <select name="frage14" id="frage14">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">15. Mir f&auml;llt es schwer abzuwarten, bis andere ausgesprochen haben. Ich falle anderen ins Wort.</p></td>
		<td>
            <select name="frage15" id="frage15">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">16. Ich bin ungeduldig und kann nicht warten, bis ich an der Reihe bin (z. B. beim Einkaufen).</p></td>
		<td>
            <select name="frage16" id="frage16">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">17. Ich unterbreche und st&ouml;re andere, wenn sie etwas tun.</p></td>
		<td>
            <select name="frage17" id="frage17">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">18. Ich rede viel, auch wenn mir keiner zuh&ouml;ren will.</p></td>
		<td>
            <select name="frage18" id="frage18">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">19. Diese Schwierigkeiten hatte ich schon im Schulalter.</p></td>
		<td>
            <select name="frage19" id="frage19">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">20. Diese Schwierigkeiten habe ich immer wieder, nicht nur bei der Arbeit, sondern auch in anderen Lebenssituationen, z. B. Familie, Freunde und Freizeit.</p></td>
		<td>
            <select name="frage20" id="frage20">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">21. Ich leide unter diesen Schwierigkeiten.</p></td>
		<td>
            <select name="frage21" id="frage21">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">22. Ich habe wegen dieser Schwierigkeiten schon Probleme im Beruf und auch im Kontakt mit anderen Menschen gehabt.</p></td>
		<td>
            <select name="frage22" id="frage22">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td colspan="2">
		  <p class="p1"><strong>Bitte pr&uuml;fen Sie, ob Sie alle Fragen beantwortet haben.</strong></p>
		  <button id="send">Test auswerten</button>
              <p><small>Die Original-Version dieses Fragebogens k&ouml;nnen Sie <a href="'.ROOT_ABS.$docs.'ADHS-SB.pdf" title="ADHS-SB" target="_blank"><strong>HIER</strong></a> als PDF-Datei herunterladen.</small></p>
		  <input type="hidden" name="subject" value="adhs-sb">
		  <input type="hidden" name="send" value="send">
		</td>
	  </tr>
	</tbody>
    </table>
</form>';
	// JS JQUERY UI SLIDER
	echo'
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="'.$jquery_ui.'"></script>
	<script>
  	  $(function() {
  
		$( "#send" ).button({
		  icons: {
			primary: "ui-icon-check"
		  }
		});
		
		var select00 = $( "#beispielfrage" );
		var slider00 = $( "<div id=\'slider00\'></div>" ).insertAfter( select00 ).slider({
		  min: 1,
		  max: 4,
		  range: "min",
		  value: 4,
		  slide: function( event, ui ) {
			select00[ 0 ].selectedIndex = 3;
		  }
		});
	';
	for ($i = 1; $i <= 22; $i++) {
		($i < 10) ? $z = '0'.$i : $z = $i;
		echo'
		var select'.$z.' = $( "#frage'.$z.'" );
		var slider'.$z.' = $( "<div id=\'slider'.$z.'\'></div>" ).insertAfter( select'.$z.' ).slider({
		  min: 1,
		  max: 4,
		  range: "min",
		  value: select'.$z.'[ 0 ].selectedIndex + 1,
		  slide: function( event, ui ) {
			select'.$z.'[ 0 ].selectedIndex = ui.value - 1;
		  }
		});
		$( "#frage'.$z.'" ).change(function() {
		  slider'.$z.'.slider( "value", this.selectedIndex + 1 );
		});';
	}
	echo'	
	  });
	</script>';
?>
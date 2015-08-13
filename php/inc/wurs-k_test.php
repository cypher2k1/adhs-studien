<?php
	echo'
<form action="'.ROOT_ABS.'auswertung.html" method="post" name="wurs-k" enctype="multipart/form-data">
<table>
	<caption>Wender-Utah-Rating-Scale (WURS-k)<br>
    <small>Deutsche Bearbeitung von P. Retz-Junginger, G: E. Trott, W. Retz & M. R&ouml;sler</small></caption>
  <tbody><tr>
		<td colspan="2">
		<p class="p1">Dieser Test erm&ouml;glicht es, den Schweregrad der ADHS-Symptomatik in der Kindheit eines Erwachsenen einzusch&auml;tzen. Da ADHS immer in der Kindheit beginnt, ist zur diagnostischen Abkl&auml;rung die retrospektive Erfassung von Krankheitssymptomen zwingend erforderlich.</p>
	<p class="p1">Im folgenden finden Sie eine Reihe von Aussagen &uuml;ber bestimmte Verhaltensweisen, Eigenschaften und Schwierigkeiten. Bitte lesen Sie diese der Reihe nach durch und entscheiden Sie jeweils, ob und wie stark diese Verhaltensweise, diese Eigenschaft oder dieses Problem bei Ihnen als Kind im Alter von ca. <strong>8 bis 10 Jahren</strong> ausgepr&auml;gt war. Dabei stehen Ihnen 5 verschiedene Antwortalternativen zur Verf&uuml;gung.</p>
	<ol start="0" class="p1"l style="list-style-position:inside">
	  <li>Trifft nicht zu</li>
	  <li>gering ausgepr&auml;gt</li>
	  <li>m&auml;&szlig;ig ausgepr&auml;gt</li>
	  <li>deutlich ausgepr&auml;gt</li>
	  <li>stark ausgepr&auml;gt</li>
	</ol>
	<p class="p1">Bitte kreuzen Sie die entsprechende Antwortalternative an. La&szlig;en Sie bitte keinen Punkt aus und w&auml;hlen Sie im Zweifelsfall die Antwortm&ouml;glichkeit, die noch am ehesten f&uuml;r Sie zutrifft. </p>
	<p class="p1"><strong>Beispiel:</strong></p>

		</td>
	  </tr>
	<tr>
		<td><p class="p1">Als Kind im Alter von 8-10 Jahren hatte ich Konzentrationsprobleme bzw. war leicht ablenkbar.
	</p></td>
		<td>
      <select name="beispielfrage" id="beispielfrage">
          <option>0</option>
          <option>1</option>
          <option>2</option>
          <option selected>3</option>
          <option>4</option>
        </select>
		</td>
  </tr>
	<tr>
		<td colspan="2">
	<p class="p1">In diesem Fall ist die 3 („in deutlicher Auspr&auml;gung") angekreuzt: Das w&uuml;rde bedeuten, dass Sie als Kind im Alter von ca. 8-10 Jahren deutlich ausgepr&auml;gt Konzentrationsprobleme hatten.</p>
	<p class="p1">&nbsp;</p>
		</td>
	  </tr>
	<tr>
		<td><p class="p1">1. Als Kind im Alter von 8-10 Jahren hatte ich Konzentrationsprobleme bzw. war leicht ablenkbar.</p></td>
		<td>
            <select name="frage01" id="frage01">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">2. Als Kind im Alter von 8-10 Jahren war ich zappelig und nerv&ouml;s.</p></td>
		<td>
            <select name="frage02" id="frage02">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">3. Als Kind im Alter von 8-10 Jahren war ich unaufmerksam und vertr&auml;umt.</p></td>
		<td>
            <select name="frage03" id="frage03">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">4. Als Kind im Alter von 8-10 Jahren war ich gut organisiert, sauber und ordentlich.</p></td>
		<td>
            <select name="frage04" id="frage04">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">5. Als Kind im Alter von 8-10 Jahren hatte ich Wutanf&auml;lle und Gef&uuml;hlsausbr&uuml;che.</p></td>
		<td>
            <select name="frage05" id="frage05">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">6. Als Kind im Alter von 8-10 Jahren hatte ich ein geringes Durchhalteverm&ouml;gen, brach ich T&auml;tigkeiten vor deren Beendigung ab.</p></td>
		<td>
            <select name="frage06" id="frage06">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">7. Als Kind im Alter von 8-10 Jahren war ich traurig, ungl&uuml;cklich und depre&szlig;iv.</p></td>
		<td>
            <select name="frage07" id="frage07">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">8. Als Kind im Alter von 8-10 Jahren war ich ungehorsam, rebellisch und aufs&auml;&szlig;ig.</p></td>
		<td>
            <select name="frage08" id="frage08">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">9. Als Kind im Alter von 8-10 Jahren hatte ich ein geringes Selbstwertgef&uuml;hl bzw. eine niedrige Selbsteinsch&auml;tzung.</p></td>
		<td>
            <select name="frage09" id="frage09">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">10. Als Kind im Alter von 8-10 Jahren war ich leicht zu irritieren.</p></td>
		<td>
            <select name="frage10" id="frage10">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">11. Als Kind im Alter von 8-10 Jahren hatte ich starke Stimmung&szlig;chwankungen und war launisch.</p></td>
		<td>
            <select name="frage11" id="frage11">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">12. Als Kind im Alter von 8-10 Jahren war ich ein guter Sch&uuml;ler bzw. eine gute Sch&uuml;lerin.</p></td>
		<td>
            <select name="frage12" id="frage12">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">13. Als Kind im Alter von 8-10 Jahren war ich oft &auml;rgerlich oder ver&auml;rgert.</p></td>
		<td>
            <select name="frage13" id="frage13">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">14. Als Kind im Alter von 8-10 Jahren verf&uuml;gte ich &uuml;ber eine gute motorische Koordinationsf&auml;higkeit und wurde immer zuerst als Mitspieler ausgesucht.</p></td>
		<td>
            <select name="frage14" id="frage14">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">15. Als Kind im Alter von 8-10 Jahren hatte ich eine Tendenz zur Unreife.</p></td>
		<td>
            <select name="frage15" id="frage15">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">16. Als Kind im Alter von 8-10 Jahren verlor ich oft die Selbstkontrolle.</p></td>
		<td>
            <select name="frage16" id="frage16">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">17. Als Kind im Alter von 8-10 Jahren hatte ich die Tendenz, unvern&uuml;nftig zu sein oder unvern&uuml;nftig zu handeln.</p></td>
		<td>
            <select name="frage17" id="frage17">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">18. Als Kind im Alter von 8-10 Jahren hatte ich Probleme mit anderen Kindern und keine langen Freundschaften.</p></td>
		<td>
            <select name="frage18" id="frage18">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">19. Als Kind im Alter von 8-10 Jahren hatte ich Angst, die Selbstbeherrschung zu verlieren.</p></td>
		<td>
            <select name="frage19" id="frage19">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">20. Als Kind im Alter von 8-10 Jahren bin ich von zuhause fortgelaufen.</p></td>
		<td>
            <select name="frage20" id="frage20">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">21. Als Kind im Alter von 8-10 Jahren war ich in Raufereien verwickelt.</p></td>
		<td>
            <select name="frage21" id="frage21">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
		</td>
	  </tr>
	  <tr>
		<td><p class="p1">22. Als Kind im Alter von 8-10 Jahren hatte ich Schwierigkeiten mit Autorit&auml;ten, z.B. &auml;rger in der Schule oder Vorladungen beim Direktor.</p></td>
			<td>
	      <select name="frage22" id="frage22">
	          <option value="0">0</option>
	          <option value="1">1</option>
	          <option value="2">2</option>
	          <option value="3">3</option>
	          <option value="4">4</option>
	      </select>
			</td>
	  </tr>
	  <tr>
		<td><p class="p1">23. Als Kind im Alter von 8-10 Jahren hatte ich &auml;rger mit der Polizei.</p></td>
			<td>
	      <select name="frage23" id="frage23">
	          <option value="0">0</option>
	          <option value="1">1</option>
	          <option value="2">2</option>
	          <option value="3">3</option>
	          <option value="4">4</option>
	      </select>
			</td>
	  </tr>
	  <tr>
		<td><p class="p1">24. Als Kind im Alter von 8-10 Jahren war ich insgesamt ein schlechter Sch&uuml;ler/eine schlechte Sch&uuml;lerin und lernte langsam.</p></td>
			<td>
	      <select name="frage24" id="frage24">
	          <option value="0">0</option>
	          <option value="1">1</option>
	          <option value="2">2</option>
	          <option value="3">3</option>
	          <option value="4">4</option>
	      </select>
			</td>
	  </tr>
	  <tr>
		<td><p class="p1">25. Als Kind im Alter von 8-10 Jahren hatte ich Freunde und war beliebt.</p></td>
			<td>
	      <select name="frage25" id="frage25">
	          <option value="0">0</option>
	          <option value="1">1</option>
	          <option value="2">2</option>
	          <option value="3">3</option>
	          <option value="4">4</option>
	      </select>
			</td>
	  </tr>
	  <tr>
		<td colspan="2">
		  <p class="p1"><strong>Bitte &uuml;berpr&uuml;fen Sie, ob Sie alle Fragen beantwortet haben!</strong></p>
		  <button id="send">Test auswerten</button>
              <p><small>Die Original-Version dieses Fragebogens k&ouml;nnen Sie <a href="'.ROOT_ABS.$docs.'WURS-k.pdf" title="wurs-k" target="_blank"><strong>HIER</strong></a> als PDF-Datei herunterladen.</small></p>
		  <input type="hidden" name="subject" value="wurs-k">
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
		  max: 5,
		  range: "min",
		  value: 4,
		  slide: function( event, ui ) {
			select00[ 0 ].selectedIndex = 4;
		  }
		});
	';
	for ($i = 1; $i <= 25; $i++) {
		($i < 10) ? $z = '0'.$i : $z = $i;
		echo'
		var select'.$z.' = $( "#frage'.$z.'" );
		var slider'.$z.' = $( "<div id=\'slider'.$z.'\'></div>" ).insertAfter( select'.$z.' ).slider({
		  min: 1,
		  max: 5,
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
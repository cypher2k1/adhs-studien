<?php
    echo '
    <h3>Wender-Reimherr-Interviews (WRI) <small>(R&ouml;sler et al. 2008)</small></h3>
    <p>Das WRI ist die deutsche Bearbeitung der Wender-Reimherr Adult Attention Deficits Disorders Scale (WRAADDS) (Wender, 1995) und dient der Erfassung der ADHS-Symptomatik beim Erwachsenen in Form eines strukturierten psychopathologischen Interviews. Das WRI erfasst 28 psychologische Merkmale aus den folgenden sieben Symptombereichen: Aufmerksamkeitsstörungen, Überaktivität, Temperament, Affektlabilität, Emotionale Überreagibilität auf Belastung, Desorgansiation und Impulsivität.<br>
    </p>
    <p>Geben Sie dazu bitte an, <span class="p1">welche dieser Auspr&auml;gung Ihre Situation am besten beschreibt:</span></p>
    <ol start="0" style="list-style-position: inside">
        <li><strong><span class="p1">trifft nicht zu</span></strong></li>
        <li><strong><span class="p1">leicht ausgepr&auml;gt (kommt gelegentlich vor)</span></strong></li>
        <li><strong><span class="p1"> mittel bis stark ausgepr&auml;gt (kommt oft vor)</span></strong></li>
    </ol>
    <p>&nbsp;</p>
    <form action="'.ROOT_ABS.'auswertung.html" method="post" name="wri" enctype="multipart/form-data">
    <table>
        <caption>1. Aufmerksamkeitsst&ouml;rung<br>
            <small>Erhöhte Ablenkbarkeit; Schwierigkeiten, sich zu konzentrieren; Vergesslichkeit; häufiges
                Verlieren oder Verlegen von Dingen</small></caption>
        <tbody>
        <tr>
            <td width="40">1.1</td>
            <td width="948">Haben Sie Probleme sich zu konzentrieren?<br>
                Sind Sie häufig geistesabwesend?<br>
                Sind Sie vielfach ein Tagträumer?</td>
            <td width="45">
                <select name="frage01" id="frage01">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>1.2</td>
            <td>Lassen Sie sich leicht ablenken?<br>
                Fällt es Ihnen schwer etwas zu tun, wenn Sie abgelenkt
                werden?</td>
            <td>
                <select name="frage02" id="frage02">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>1.3</td>
            <td>Haben Sie Schwierigkeiten, bei Unterhaltungen zuzuhören?<br>
                Beschweren sich andere, dass Sie nicht zuhören, wenn
                Sie mit Ihnen sprechen?</td>
            <td>
                <select name="frage03" id="frage03">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>1.4</td>
            <td>Haben Sie Probleme aufzupassen, wenn Sie in der
                Kirche, Schule, bei Gericht, auf Vorträgen oder Konferenzen
                lange zuhören müssen?<br>
                Haben Sie Probleme aufzupassen, wenn Sie Nachrichten
                sehen?</td>
            <td>
                <select name="frage04" id="frage04">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>1.5</td>
            <td>Haben Sie Probleme sich beim Lesen zu konzentrieren?<br>
                Vermeiden Sie zu lesen, wenn kein spezielles Interesse
                vorliegt?<br>
                Müssen Sie häufig noch einmal nachlesen, weil Ihre
                Gedanken abschweiften?<br>
                Haben Sie Probleme Gelesenes zusammenzufassen?</td>
            <td>
                <select name="frage05" id="frage05">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        </tbody>
    </table>
	<p>&nbsp;</p>

    <table>
        <caption>2. &Uuml;beraktivit&auml;t<br>
            <small>Innere Unruhe; Unfähigkeit, sich zu entspannen und sitzende Tätigkeiten durchzuhalten</small></caption>
        <tbody>
        <tr>
            <td width="40">2.1</td>
            <td width="948">Fühlen Sie sich ruhelos?<br>
                Fühlen Sie sich angetrieben oder übererregt?<br>
                Können Sie sich schlecht entspannen?</td>
            <td width="45">
                <select name="frage06" id="frage06">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>2.2</td>
            <td>Sind Sie überaktiv? Müssen Sie immer in Bewegung sein?<br>
                Fällt es Ihnen schwer, am Schreibtisch zu arbeiten?<br>
                Können Sie nicht sitzen bleiben, müssen Sie aufstehen und
                herumlaufen?<br>
                Können Sie im Kino oder beim Fernsehen nicht lange sitzen
                bleiben?</td>
            <td>
                <select name="frage07" id="frage07">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>2.3</td>
            <td>Sind Sie zappelig? Können Sie nicht still sitzen?<br>
                Trommeln Sie mit den Fingern?
                Wippen Sie mit den Füßen? <br>
                Wechseln Sie ständig die Köperposition?<br>
                Haben Sie immer etwas in der Hand? </td>
            <td>
                <select name="frage08" id="frage08">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        </tbody>
    </table>
	<p>&nbsp;</p>

    <table>
        <caption>3. Temperament<br>
            <small>Andauernde Reizbarkeit; verminderte Frustrationstoleranz und Wutausbrüche</small></caption>
        <tbody>
        <tr>
            <td width="40">3.1</td>
            <td width="948">Sind Sie schnell genervt?<br>
                Fühlen Sie sich zu Hause, bei der Arbeit, beim Autofahren oder in
                anderen Situationen häufig irritiert oder verärgert?</td>
            <td width="45">
                <select name="frage09" id="frage09">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>3.2</td>
            <td>Sind Sie ein Hitzeblitz? Geraten Sie leicht in Erregung?<br>
                Haben Sie Wutausbrüche? Verlieren Sie leicht die Geduld?<br>
                Gehen Sie leicht in die Luft?</td>
            <td>
                <select name="frage10" id="frage10">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>3.3</td>
            <td>Haben Sie wegen Ihres Temperaments schon Probleme gehabt?<br>
                Haben Sie Dinge gesagt, die Sie später bereuten? <br>
                Sind Sie dabei schon einmal aggress iv geworden? </td>
            <td>
                <select name="frage11" id="frage11">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        </tbody>
    </table>
	<p>&nbsp;</p>

    <table>
        <caption>4. Affektive Labilität<br>
            <small>Häufige und kurz andauernde Wechsel von positiver zu niedergeschlagener Stimmung;
            Erregung als Zeichen von Unzufriedenheit oder Langeweile</small></caption>
        <tbody>
        <tr>
            <td width="40">4.1</td>
            <td width="948">Wechselt Ihre Stimmung schnell?<br>
                Geht die Stimmung hoch und runter, &quot;up&quot; und &quot;down&quot;?<br>
                Ist es wie auf einer Achterbahn?<br>
                Sind Sie mal traurig, mal ganz oben auf?</td>
            <td width="45">
                <select name="frage12" id="frage12">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>4.2</td>
            <td>Haben Sie häufig kurze Phasen, in denen Sie traurig, verstimmt
                oder entmutigt sind?<br>
                Haben Sie kurze Phasen, in denen Sie &quot;den Moralischen&quot;  haben?</td>
            <td>
                <select name="frage13" id="frage13">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>4.3</td>
            <td>Haben Sie Phasen, in denen Sie sehr angetrieben, erregt und
                aufgedreht sind und in denen Sie zuviel reden?</td>
            <td>
                <select name="frage14" id="frage14">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>4.4</td>
            <td>Ist Ihnen schnell langweilig?<br>
                Verlieren Sie schnell das Interesse?</td>
            <td>
                <select name="frage15" id="frage15">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        </tbody>
    </table>
	<p>&nbsp;</p>

    <table>
        <caption>5. Stressintoleranz<br>
            <small>Überschießende und inadäquate emotionale Reaktionen auf alltägliche Stressoren</small></caption>
        <tbody>
        <tr>
            <td width="40">5.1</td>
            <td width="948">Fühlen Sie sich leicht in die Ecke gedrängt?<br>
                Fühlen Sie sich häufig erdrückt?<br>
                Neigen Sie zur Überreaktion auf Belastung? </td>
            <td width="45">
                <select name="frage16" id="frage16">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>5.2</td>
            <td>Werden Sie unter Belastung ängstlich?<br>
                Verlieren Sie schnell den Kopf?</td>
            <td>
                <select name="frage17" id="frage17">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>5.3</td>
            <td>Wenn Sie solche Probleme haben oder hatten, ist es Ihnen deswegen
                schon schwer gefallen,             Aufgaben zu bewältigen oder
                Dinge zu Ende zu bringen?<br>
                Erschweren diese Reaktionen die Bewältigung von
                Alltagssituationen oder Routinearbeiten?</td>
            <td>
                <select name="frage18" id="frage18">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        </tbody>
    </table>
	<p>&nbsp;</p>

    <table>
        <caption>6. Desorganisation<br>
            <small>Aktivitäten werden unzureichend geplant, organisiert und zu Ende gebracht;
            unsystematische Problemlösestrategien</small></caption>
        <tbody>
        <tr>
            <td width="40">6.1</td>
            <td width="948">Haben Sie Organisationsschwierigkeiten zuhause, in der Schule
                oder auf der Arbeit?<br>
                Haben Sie Probleme, Ihre Zeit einzuteilen, Arbeiten zu planen
                oder sich an ein Zeitschema zu halten?<br>
                Fällt es Ihnen schwer, die Zeit zum Lernen, für Arbeitsaufträge
                bzw. häusliche Aufgaben einzuteilen? </td>
            <td width="45">
                <select name="frage19" id="frage19">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>6.2</td>
            <td>Springen Sie von einer Arbeit zur nächsten, ohne dass das
                Begonnene abgeschlossen ist? Haben Sie Probleme, etwas
                beharrlich und konsequent durchzuhalten?<br>
                Haben Sie Schwierigkeiten, angefangene Arbeiten zu Ende zu
                führen? </td>
            <td>
                <select name="frage20" id="frage20">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>6.3</td>
            <td>Sind Sie vergesslich? Vergessen Sie Anrufe oder
                Verabredungen?<br>
                Verlegen Sie Sachen wie Schlüssel, Geldbörse, Brieftasche
                oder ande re Sachen aus Haus und Beruf? </td>
            <td>
                <select name="frage21" id="frage21">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>6.4</td>
            <td>Haben Sie Probleme, in Gang zu kommen?<br>
                Zögem Sie, wenn
                Sie Dinge anpacken sollen? Machen Sie alles in letzter Minute?<br>
                Haben Sie Schwierigkeiten, Termine einzuhalten?</td>
            <td>
                <select name="frage22" id="frage22">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>6.5</td>
            <td>Haben Sie Probleme, Zeit für wichtige und persönliche Dinge zu
                bewahren / zu reservieren?
                (z. B. für die Kinder oder den Ehegatten, für kreative Dinge?) </td>
            <td>
                <select name="frage23" id="frage23">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        </tbody>
    </table>
	<p>&nbsp;</p>

    <table>
        <caption>7. Impulsivität<br>
            <small>Dazwischenreden; Unterbrechen anderer im Gespräch; Ungeduld</small></caption>
        <tbody>
        <tr>
            <td width="40">7.1</td>
            <td width="948">Sind Sie impulsiv? Stürzen Sie sich voreilig in Sachen, ohne
                nachzudenken?<br>
                Treffen Sie plötz liche, eilige Entscheidungen hinsichtlich
                wichtiger oder wen iger wichtiger Fragen Ihres Lebens?<br>
                Fällt es Ihnen schwer, impulsive Entscheidungen zu vermeiden? </td>
            <td width="45">
                <select name="frage24" id="frage24">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>7.2</td>
            <td>Unterbrechen Sie andere? Sprechen Sie Sätze anderer zu
                Ende?<br>
                Sage n Sie Dinge , Ohne nachzudenken und platzen Sie heraus?<br>
                Sind Sie scho n in Schwierigkeiten wegen Dingen geraten, die
                Sie gesagt haben?</td>
            <td>
                <select name="frage25" id="frage25">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>7.3</td>
            <td>Haben Sie schon unüberlegt und voreilig Sachen gekauft?<br>
                Haben Sie Probleme, Geld zusammen zu halten?</td>
            <td>
                <select name="frage26" id="frage26">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>7.4</td>
            <td>Machen Sie Ihre Arbeit zu schnell und oberflächlich?<br>
                Vergessen Sie dabei Details? <br>
                Hatten Sie Schwierigkeiten wegen chaotischen Arbeitsstils? </td>
            <td>
                <select name="frage27" id="frage27">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>7.5</td>
            <td>Sind Sie ungeduldig? Können Sie nicht warten?<br>
                Werden Sie von Ihren Freunden oder Ihrer Familie für
                ungeduldig gehalten? </td>
            <td>
                <select name="frage28" id="frage28">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
	  <tr>
		<td colspan="3" style="text-align:center">
		  <p class="p1"><strong>Bitte pr&uuml;fen Sie, ob Sie alle Fragen beantwortet haben.</strong></p>
		  <button id="send">Test auswerten</button>
              <p><small>Die Original-Version dieses Fragebogens k&ouml;nnen Sie <a href="'.ROOT_ABS.$docs.'wri.pdf" title="WRI" target="_blank"><strong>HIER</strong></a> als PDF-Datei herunterladen.</small></p>
              <p>Weitere Informationen &uuml;ber den Test finden Sie auf der <a href="http://www.testzentrale.de/programm/homburger-adhs-skalen-fur-erwachsene.html" rel="nofollow" target="_blank">Seite des Herausgebers</a>.</p>
		  <input type="hidden" name="subject" value="wri">
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

	';
	for ($i = 1; $i <= 28; $i++) {
		($i < 10) ? $z = '0'.$i : $z = $i;
		echo'
		var select'.$z.' = $( "#frage'.$z.'" );
		var slider'.$z.' = $( "<div id=\'slider'.$z.'\'></div>" ).insertAfter( select'.$z.' ).slider({
		  min: 1,
		  max: 3,
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

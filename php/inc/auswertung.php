<?php
if($_POST['send'] == "send") {
  #print_r($_POST);
	switch($_POST['subject']) {

		// START Auswertung BDI-II ----------------------------
		case 'bdi-ii':
			# Berechnung
			$antworten = array(
				$f1 = array(
					'f' => 'Traurigkeit',
					'a' => $_POST['1'],
				),
				$f2 = array(
					'f' => 'Pessimismus',
					'a' => $_POST['2'],
				),
				$f3 = array(
					'f' => 'Versagensgef&uuml;hle',
					'a' => $_POST['3'],
				),
				$f4 = array(
					'f' => 'Verlust von Freude',
					'a' => $_POST['4'],
				),
				$f5 = array(
					'f' => 'Schuldgef&uuml;hle',
					'a' => $_POST['5'],
				),
				$f6 = array(
					'f' => 'Bestrafungsgef&uuml;hl',
					'a' => $_POST['6'],
				),
				$f7 = array(
					'f' => 'Selbstablehnung',
					'a' => $_POST['7'],
				),
				$f8 = array(
					'f' => 'Selbstvorw&uuml;rfe',
					'a' => $_POST['8'],
				),
				$f9 = array(
					'f' => 'Selbstmordgedanken',
					'a' => $_POST['9'],
				),
				$f10 = array(
					'f' => 'Weinen',
					'a' => $_POST['10'],
				),
				$f11 = array(
					'f' => 'Unruhe',
					'a' => $_POST['11'],
				),
				$f12 = array(
					'f' => 'Interessenverlust',
					'a' => $_POST['12'],
				),
				$f13 = array(
					'f' => 'Entschlussf&auml;higkeit',
					'a' => $_POST['13'],
				),
				$f14 = array(
					'f' => 'Wertlosigkeit',
					'a' => $_POST['14'],
				),
				$f15 = array(
					'f' => 'Energieverlust',
					'a' => $_POST['15'],
				),
				$f16 = array(
					'f' => 'Schlafgewohnheiten',
					'a' => $_POST['16'],
				),
				$f17 = array(
					'f' => 'Reizbarkeit',
					'a' => $_POST['17'],
				),
				$f18 = array(
					'f' => 'Appetit',
					'a' => $_POST['18'],
				),
				$f19 = array(
					'f' => 'Konzentrationsschwierigkeiten',
					'a' => $_POST['19'],
				),
				$f20 = array(
					'f' => 'Erm&uuml;dung / Ersch&ouml;pfung',
					'a' => $_POST['20'],
				),
				$f21 = array(
					'f' => 'Libidoverlust',
					'a' => $_POST['21'],
				)
			);
			# Ergebnis
			$i = 1;
			$sum = 0;
			$style = '';
			echo'
			<div style="float: left; padding-right: 30px; padding-bottom: 10px;">
				<table style="width: 200px;">
				<caption>Auswertung<br>
				<small>Beck-Depressions-Inventar (BDI-II)</small></caption>
        <tbody>';
			foreach($antworten as $abschnitt) {
				$titel  = $abschnitt['f'];
				$wert   = $abschnitt['a'];
				switch ($wert) {
					case 0:
						$style = '';
						break;
					case 1:
						$style = ' class="gelb"';
						break;
					case 2:
						$style = ' class="orange"';
						break;
					case 3:
						$style = ' class="rot"';
						break;
				}
				echo'
			    <tr>
		        <td'.$style.'>'.$titel.'</td>
		        <td'.$style.'>'.$wert.'</td>
			    </tr>';
				$i++;
				$sum += $wert;
			}
			switch ($sum) {
				case 0:
					$style = ' class="gruen"';
					$result_hl  = 'Keine Depression';
					$result_txt = 'Sie haben '.$sum.' Punkte. Anscheinend sind Sie nicht oder nur minimal depressiv.';
					break;
				case ($sum <= 13):
					$style = ' class="gruen"';
					$result_hl  = 'Keine Depression';
					$result_txt = 'Sie haben '.$sum.' Punkte. Anscheinend sind Sie nicht oder nur minimal depressiv.';
					break;
				case ($sum >= 14 && $sum <= 19):
					$style = ' class="gelb"';
					$result_hl  = 'Leichte Depression';
					$result_txt = 'Sie haben '.$sum.' Punkte. Das deutet auf eine leichte Depression hin. F&uuml;r eine genauere Abkl&auml;rung k&ouml;nnen Sie sich mit einem Fachmann in Verbindung setzen.';
					break;
				case ($sum >= 20 && $sum <= 28):
					$style = ' class="orange"';
					$result_hl  = 'Mittelgradige Depression';
					$result_txt = 'Sie haben '.$sum.' Punkte. Das deutet auf eine mittelgradige Depression hin. Sie sollten sich mit einem Fachmann in Verbindung setzen, um das weitere Vorgehen zu besprechen!';
					break;
				case ($sum > 28):
					$style = ' class="rot"';
					$result_hl  = 'Schwere Depression';
					$result_txt = 'Sie haben '.$sum.' Punkte. Das deutet auf eine schwere Depression hin. Sie sollten sich dringend mit einem Fachmann in Verbindung setzen, um das weitere Vorgehen zu besprechen!';
					break;
			}
			echo'
			    <tr>
		        <td colspan="2"'.$style.'>
		          <strong>Ergebnis:</strong><br>
		          <span class="result">'.$result_hl.'</span>
		        </td>
			    </tr>
			    </tbody>
				</table>
			</div>';

			# Hinweise
			echo'
			<div>
				<p class="p1"><strong>'.$result_txt.'</strong></p>
			<h3>Erl&auml;uterung</h3>
<p class="p1">Zur Diagnose psychischer Erkrankungen haben sich zwei verschiedene Klassifikations-Systeme durchgesetzt:</p>
<ol>
			  <li class="p1">Die Internationale statistische Klassifikation der Krankheiten und verwandter Gesundheitsprobleme, 10. Revision, German Modification (<a href="http://www.dimdi.de/static/de/klassi/icd-10-gm/index.htm" target="_blank">ICD</a><a href="http://www.dimdi.de/static/de/klassi/icd-10-gm/index.htm">-10-GM</a>) ist die amtliche Klassifikation zur Verschlüsselung von Diagnosen in der ambulanten und stationären Versorgung in Deutschland.</li>
              <li class="p1">Das Diagnostic and Statistical Manual of Mental Disorders, vierte Auflage, Textrevision (<a href="http://behavenet.com/dsm-iv-tr-numerical-listing-codes-and-diagnoses" target="_blank">DSM-IV-TR</a>) ist ein Klassifikationssystem der American Psychiatric Association (Amerikanische Psychiater-Vereinigung).</li>
</ol>
			<p class="p1">In der ICD-10 fällt die unipolare Depression unter den Schl&uuml;ssel F32: depressive Episode. Das entsprechende Gegenstück im DSM-IV ist die Major Depressive Disorder (296.2). Die Schwere depressiver Beschwerden lässt sich mit dem Beck-Depressions-Inventar (BDI) erfassen. Das BDI ist das weltweit am weitesten verbreitete Instrument zur
			  Selbstbeurteilung
		    der Depressionsschwere.  Es richtet sich seit seiner zweiten Auflage nach den DSM-IV-Kriterien und wird  nicht nur in der Praxis, sondern auch in der Forschung international  verwendet.</p>
			<p class="p1">Die Auswertung erfolgt anhand folgender Grenzwerte:</p>
			<ul>
			  <li class="p1">0 - 13: keine oder minimale Depression</li>
              <li class="p1">14 - 19: leichte Depression</li>
              <li class="p1">20 - 28: moderate Depression</li>
              <li class="p1">29 - 63: schwere Depression</li>
</ul>
			<p class="p1"><strong>Quellen / weiterführende Links:</strong></p>
			<ul>
			  <li class="p1"><a href="'.ROOT_ABS.'reliabilitat-und-validitat-des-revidierten-beck-depressions-inventars-bdi-ii-befunde-aus-deutschsprachigen-stichproben.html" target="_self">Reliabilität und Validität des revidierten Beck-Depressions-inventars (BDI-II). Befunde aus deutschsprachigen Stichproben</a></li>
        <li class="p1"><a href="'.ROOT_ABS.'TBS-TK_BDI-II.html" target="_self">TBS-TK Rezension: Beck Depressions-Inventar (BDI-II)</a></li>
        <li class="p1"><a href="http://de.wikipedia.org/wiki/Beck-Depressions-Inventar" target="_blank">Wikipedia:
       Beck-Depressions-Inventar</a></li>
        <li class="p1"><a href="http://de.wikipedia.org/wiki/Depression" target="_self">Wikipedia: <span dir="auto">Depression</span></a></li>
</ul>
<p class="p1"><strong>Hinweise:</strong></p>
			<ul>
				<li class="p1">Seit dem 01.04.2014 basiert dieser Test auf der 2. Auflage des Beck-Depressions-Inventar (BDI-II). Wesentliche &Auml;nderungen gegenüber dem BDI-I: auf die DSM-IV-Kriterien abgestimmte Fragen, neue Cut-off-Werte und auf zwei Wochen erh&ouml;hter Beurteilungszeitraum</li>
			  <li class="p1">Als Altersgruppe sind in den Verfahrenshinweisen Jugendliche ab 13 Jahren und Erwachsene angegeben</li>
				<li class="p1"><strong>Die hier angebotenen Informationen dienen zur Unterstützung und nicht als Ersatz der Beziehung zwischen dem Patient/Webseitenbesucher und seinem Arzt.</strong></li>
			</ul>
		</div>';
			break;
			// ENDE Auswertung BDI-II ---------------------------

		// START Auswertung WRI -------------------------------
		case 'wri':
				// antworten
				$antworten = array(
					$teil1 = array(
						'titel' => 'Aufmerksamkeitsst&ouml;rung',
						'1_1' => $_POST['frage01'],
						'1_2' => $_POST['frage02'],
						'1_3' => $_POST['frage03'],
						'1_4' => $_POST['frage04'],
						'1_5' => $_POST['frage05'],
					),
					$teil2 = array(
						'titel' => '&Uumleberaktivit&auml;t',
						'2_1' => $_POST['frage06'],
						'2_2' => $_POST['frage07'],
						'2_3' => $_POST['frage08'],
					),
					$teil3 = array(
						'titel' => 'Temperament',
						'3_1' => $_POST['frage09'],
						'3_2' => $_POST['frage10'],
						'3_3' => $_POST['frage11'],
					),
					$teil4 = array(
						'titel' => 'Affektlabilit&auml;t',
						'4_1' => $_POST['frage12'],
						'4_2' => $_POST['frage13'],
						'4_3' => $_POST['frage14'],
						'4_4' => $_POST['frage15'],
					),
					$teil5 = array(
						'titel' => 'Stressintoleranz',
						'5_1' => $_POST['frage16'],
						'5_2' => $_POST['frage17'],
						'5_3' => $_POST['frage18'],
					),
					$teil6 = array(
						'titel' => 'Desorgansiation',
						'6_1' => $_POST['frage19'],
						'6_2' => $_POST['frage20'],
						'6_3' => $_POST['frage21'],
						'6_4' => $_POST['frage22'],
						'6_5' => $_POST['frage23'],
					),
					$teil7 = array(
						'titel' => 'Impulsivit&auml;t',
						'7_1' => $_POST['frage24'],
						'7_2' => $_POST['frage25'],
						'7_3' => $_POST['frage26'],
						'7_4' => $_POST['frage27'],
						'7_5' => $_POST['frage28'],
					)
				);
				// Auswertung
				# Nummer der Subscala
				$i = 1;
				# Summe der Subscala
				$sum = 0;
				# Daten der Subscala
				$teil = array();
				// ---
				echo'
				<div style="float: left; padding-right: 30px; padding-bottom: 10px;">
				<table style="width: 300px;">
				<caption>Auswertung<br>
				<small>Wender-Reimherr-Interview (WRI)</small></caption>
			        <tbody>';
							foreach($antworten as $abschnitt) {
								// titel ausschneiden
								$titel = array_shift($abschnitt);
								// prüft ob kriterien erfüllt sind
								if (array_sum($abschnitt) >= count($abschnitt)) {
									$teil[$i] = 1;
									$style = ' class="rot"';
								} else {
									$teil[$i] = 0;
									(array_sum($abschnitt) == 0)
										? $style = ' class="gruen"'
										: $style = ' class="gelb"';
								}
								echo'
				    <tr>
				        <td'.$style.'>'.$titel.'</td>
				        <td'.$style.'>'.array_sum($abschnitt).'</td>
				    </tr>';
								$i++;
								$sum += array_sum($abschnitt);
							}
							#var_dump($teil);
							if ($teil[1] == 1 && $teil[2] == 1 && array_sum($teil) >= 4) {
								$ergebnis = 'Kriterien erf&uuml;llt';
								$info = '<p class="p1"><strong>Ihre Angaben erf&uuml;llen die Kriterien dieses Tests f&uuml;r eine ADHS im Erwachsenenalter (adult ADHD). Sie sollten sich mit einem Fachmann in Verbindung setzen, um mit diesem das weitere Vorgehen zu besprechen!</strong></p>';
								$style = ' class="rot"';
							} else {
								$ergebnis = 'Kriterien <strong>nicht</strong> erf&uuml;llt';
								$info = '<p class="p1"><strong>Ihre Angaben erf&uuml;llen <em>nicht</em> die in diesem Test festgelegten  Kriterien einer ADHS im Erwachsenenalter (adult ADHD).</strong></p>';
								$style = ' class="gruen"';
							}
							echo'
				    <tr>
				        <td'.$style.' colspan="2">
				          <strong>Ergebnis:</strong><br>
				          <span class ="result">'.$ergebnis.'</span>
				        </td>
				    </tr>
				    </tbody>
				</table>
				</div>';

							echo'
				<div>
				<h3>Erl&auml;uterung</h3>
				'.$info.'
				<p class="p1"><strong>F&uuml;r eine ADHS-Diagnose sind die Merkmale Aufmerksamkeitsst&ouml;rung, &Uuml;beraktivität und mindestens zwei der weiteren Charakteristika erforderlich</strong>. Ein Kriterium gilt dann als erf&uuml;llt, wenn die Summe der Punkte mindestens der Anzahl der Fragen im jeweiligen Abschnitt entspricht.</p>

				<h4>Hintergrund</h4>
				<p class="p1">Die Grundlage der ADHS-Diagnostik ist in der Regel die <a href="http://www.behavenet.com/capsules/disorders/adhd.htm" title="DSM-IV" target="_blank">DSM-IV-Klassifikation</a> der American Psychiatric Association oder die <a href="http://www.icd-code.de/suche/icd/code/F90.-.html" title="ICD-10" target="_blank">ICD-10-Klassifikation</a> der World Health Organization. DSM-IV erfasst die ADHS-Symptomatik ausführlicher, da hier zwischen drei Subtypen unterschieden wird: vorwiegend Unaufmerksamkeit (314.00), vorwiegend Hyperaktiv/Impulsiv (314.01) und der kombinierte Typ (314.01). Die einfache Aktivitäts- und Aufmerksamkeitsstörung nach ICD-10 ist mit dem kombinierten Typ nahezu identisch.</p>

				<p class="p1">Allerdings sind beide Klassifikationssysteme für die ADHS-Diagnostik im Erwachsenenalter nur bedingt geeignet. Sie basieren nämlich auf psychopathologischen Merkmalen, die ursprünglich für Kinder und Jugendliche vorgesehen waren. Außerdem beschreiben die Kriterien überwiegend von außen leicht beobachtbare Verhaltensweisen und lassen das innere Erleben außer Acht. Für die Diagnosestellung einer ADHS im Erwachsenenalter scheint jedoch gerade dieses ausschlaggebend zu sein.</p>

				<p class="p1">Die durch P. H. Wender eingeführten Utah-Kriterien beziehen sich explizit auf das Erwachsenenalter. Das Wender-Reimher-Interview (WRI) ist ein Test der 28 psychopathologische Merkmale beinhaltet, die den sieben Utah- Kriterien zugeordnet sind.</p>

				<h4>Literatur:</h4>

				<ul class="p1"l style="list-style-position:inside">
					<li>
						Corbisiero, S.; Buchli-Kammermann, J.; Stieglitz, R.-D. (2010):
						<a style="font-weight:bold" href="'.ROOT_ABS.'Reliabilitaet_und_Validitaet_des_Wender-Reimherr-Interviews_WRI.html">Reliabilität und Validität des Wender-Reimherr-Interviews (WRI)</a>.
						In: <em>Zeitschrift für Psychiatrie, Psychologie und Psychotherapie 58 (4)</em>, S. 323–331. DOI: 10.1024/1661-4747/a000043.
					</li>
				</ul>

				<h4>Hinweise:</h4>
				<ul>
					<li class="p1">Der Fragebogen wurde für die präsentation im Web leicht modifiziert. Die Zusatzfragen am Ende wurden zum Beispiel entfernt, da sie keinen direkten Einfluss auf die Auswertung haben.</li>
					<li class="p1">Der WRI ist als strukturiertes klinisches Interview konzipiert. Die Selbstbeurteilung kann zu leicht abweichenden Ergebnissen führen.</li>
					<li class="p1"><strong>Die hier angebotenen Informationen dienen zur Unterstützung und nicht als Ersatz der Beziehung zwischen dem Patient/Webseitenbesucher und seinem Arzt.</strong></li>
				</ul>
			</div>';

			break;
			// ENDE Auswertung WRI ------------------------------

		// START Auswertung ADHS-SB ---------------------------
		case 'adhs-sb':
			// antworten
			if($_POST['frage01']>0) $f1 = 1; else $f1 = 0;
			if($_POST['frage02']>0) $f2 = 1; else $f2 = 0;
			if($_POST['frage03']>0) $f3 = 1; else $f3 = 0;
			if($_POST['frage04']>0) $f4 = 1; else $f4 = 0;
			if($_POST['frage05']>0) $f5 = 1; else $f5 = 0;
			if($_POST['frage06']>0) $f6 = 1; else $f6 = 0;
			if($_POST['frage07']>0) $f7 = 1; else $f7 = 0;
			if($_POST['frage08']>0) $f8 = 1; else $f8 = 0;
			if($_POST['frage09']>0) $f9 = 1; else $f9 = 0;
			if($_POST['frage10']>0) $f10 = 1; else $f10 = 0;
			if($_POST['frage11']>0) $f11 = 1; else $f11 = 0;
			if($_POST['frage12']>0) $f12 = 1; else $f12 = 0;
			if($_POST['frage13']>0) $f13 = 1; else $f13 = 0;
			if($_POST['frage14']>0) $f14 = 1; else $f14 = 0;
			if($_POST['frage15']>0) $f15 = 1; else $f15 = 0;
			if($_POST['frage16']>0) $f16 = 1; else $f16 = 0;
			if($_POST['frage17']>0) $f17 = 1; else $f17 = 0;
			if($_POST['frage18']>0) $f18 = 1; else $f18 = 0;
			if($_POST['frage19']>0) $f19 = 1; else $f19 = 0;
			if($_POST['frage20']>0) $f20 = 1; else $f20 = 0;
			if($_POST['frage21']>0 || $_POST['frage22']>0) {
				if($_POST['frage21']>0) $f21 = 1; else $f21 = 0;
				if($_POST['frage22']>0) $f22 = 1; else $f22 = 0;
			} else {
				$f21 = 0;
				$f22 = 0;
			}

			$antworten = array(
				'konz' => array(
					'titel' => 'Aufmerksamkeitsst&ouml;rung',
					'werte' => array( $f1, $f2, $f3, $f4, $f5, $f6, $f7, $f8, $f9 ),
				),
				'hyper_impuls' => array(
					'titel' => 'hyper_impuls',
					'werte' => '',
					'hyper' => array(
						'titel' => 'Hyperaktivit&auml;t',
						'werte' => array( $f10, $f11, $f12, $f13, $f14 ),
					),
					'impuls' => array(
						'titel' => 'Impulsivit&auml;t',
						'werte' => array( $f15, $f16, $f17, $f18 ),
					),
				),
				'zusatz' => array( # 4. zusatzkriterium: keine ausschlussdiagnose
					'titel' => 'Zusatzkriterien',
					'werte' => array( $f19, $f20, $f21, $f22 ),
				),
			);
			// Auswertung
			# Hyper-Impuls
			$antworten['hyper_impuls']['werte'] =
				array_sum($antworten['hyper_impuls']['hyper']['werte'])
				+ array_sum($antworten['hyper_impuls']['impuls']['werte']);
			# -------------- Kriterien erfüllt?
			$kriterien = array();
			(array_sum($antworten['konz']['werte']) >= 6)                   ? $kriterien['konz'] = true : $kriterien['konz'] = false;
			(array_sum($antworten['hyper_impuls']['hyper']['werte']) >= 3)  ? $kriterien['hyper'] = true : $kriterien['hyper'] = false;
			(array_sum($antworten['hyper_impuls']['impuls']['werte']) >= 1) ? $kriterien['impuls'] = true : $kriterien['impuls'] = false;
			($antworten['hyper_impuls']['werte'] >= 6)                      ? $kriterien['hyper_impuls'] = true : $kriterien['hyper_impuls'] = false;
			(array_sum($antworten['zusatz']['werte']) >= 3)                 ? $kriterien['zusatz'] = true : $kriterien['zusatz'] = false;
			# -------------- Diagnose-Schlüssel
			$ergebnis = array(
				'dsm' => '',
				'icd' => ''
			);
			if($kriterien['konz'] == true) {
				if($kriterien['hyper_impuls'] == true) {
					$ergebnis['dsm']['code'] = '314.01';
					$ergebnis['dsm']['titel'] = 'ADHS, kombinierter Typ';
				} else {
					$ergebnis['dsm']['code'] = '314.00';
					$ergebnis['dsm']['titel'] = 'ADHS, vorwiegend unaufmerksamer Typ';
				}
				if($kriterien['hyper'] == true && $kriterien['impuls'] == true) {
					$ergebnis['icd']['code'] = 'F90.0';
					$ergebnis['icd']['titel'] = 'Einfache Aktivit&auml;ts- und Aufmerksamkeitsst&ouml;rung';
				}
			} elseif($kriterien['hyper_impuls'] == true) {
					$ergebnis['dsm']['code'] = '314.01';
					$ergebnis['dsm']['titel'] = 'ADHS, vorwiegend hyperaktiv-impulsiver Typ';
			}
#----------------------------------------------------------------------------------
			# Ergebnis
			$style = array();
			if($kriterien['konz'] == true) {
				$style['konz'] = ' class="rot"';
			} else {
				$style['konz'] = '';
			}
			if($kriterien['hyper'] == true
				&& $kriterien['hyper_impuls'] == true) {
				$style['hyper'] = ' class="rot"';
			} elseif($kriterien['hyper'] == true
				|| $kriterien['hyper_impuls'] == true) {
				$style['hyper'] = ' class="orange"';
			} else {
				$style['hyper'] = '';
			}
			if($kriterien['impuls'] == true
				&& $kriterien['hyper_impuls'] == true) {
				$style['impuls'] = ' class="rot"';
			} elseif($kriterien['impuls'] == true
				|| $kriterien['hyper_impuls'] == true) {
				$style['impuls'] = ' class="orange"';
			} else {
				$style['impuls'] = '';
			}
			if($kriterien['zusatz'] == true) {
				$style['zusatz'] = ' class="rot"';
			} else {
				$style['zusatz'] = '';
			}
			if($ergebnis['icd']['code'] == 'F90.0') {
				if($kriterien['zusatz'] == true) {
					$style['icd'] = ' class="rot"';
				} else {
					$style['icd'] = ' class="orange"';
				}
			} else {
				$style['icd'] = ' class="gruen"';
			}
			if($ergebnis['dsm']['code'] != 0) {
				if($kriterien['zusatz'] == true) {
					$style['dsm'] = ' class="rot"';
				} else {
					$style['dsm'] = ' class="orange"';
				}
			} else {
				$style['dsm'] = ' class="gruen"';
			}
			echo'
			<div style="float: left; padding-right: 30px; padding-bottom: 10px;">
				<table style="width: 400px;">
				<caption>Auswertung<br>
				<small>ADHS-Selbstbeurteilungsskala (ADHS-SB)</small></caption>
        <tbody>
			    <tr>
		        <td'.$style['konz'].'>'.$antworten['konz']['titel'].'</td>
		        <td'.$style['konz'].'>'.array_sum($antworten['konz']['werte']).'</td>
			    </tr>
			    <tr>
		        <td'.$style['hyper'].'>'.$antworten['hyper_impuls']['hyper']['titel'].'</td>
		        <td'.$style['hyper'].'>'.array_sum($antworten['hyper_impuls']['hyper']['werte']).'</td>
			    </tr>
			    <tr>
		        <td'.$style['impuls'].'>'.$antworten['hyper_impuls']['impuls']['titel'].'</td>
		        <td'.$style['impuls'].'>'.array_sum($antworten['hyper_impuls']['impuls']['werte']).'</td>
			    </tr>
			    <tr>
		        <td'.$style['zusatz'].'>'.$antworten['zusatz']['titel'].'</td>
		        <td'.$style['zusatz'].'>'.array_sum($antworten['zusatz']['werte']).'</td>
			    </tr>
			    <tr>
		        <td colspan="2"'.$style['icd'].'>
		          <strong>ICD-10:</strong><br>';
							if($ergebnis['icd']['code'] == 'F90.0') {
								echo'<span class="result">'.$ergebnis['icd']['titel'].' ('.$ergebnis['icd']['code'].')</span>';
							} else {
								echo'<span class="result">Kriterien nicht erf&uuml;llt</span>';
							}
							echo'
						</td>
			    </tr>
			    <tr>
		        <td colspan="2"'.$style['dsm'].'>
		          <strong>DSM-IV:</strong><br>';
							if($ergebnis['dsm']['code'] != 0) {
								echo'<span class="result">'.$ergebnis['dsm']['titel'].' ('.$ergebnis['dsm']['code'].')</span>';
							} else {
								echo'<span class="result">Kriterien nicht erf&uuml;llt</span>';
							}
							echo'
		        </td>
			    </tr>
			    </tbody>
				</table>
			</div>';
#------------------------------------------------------------------

			echo'<p class="p1"><b>';

			if($ergebnis['icd']['code'] != 'F90.0' && $ergebnis['dsm']['code'] == 0) {
				echo'Ihre Angaben erfüllen weder die Kriterien des ICD-10 noch die des DSM-IV.';
			} else {

				if($ergebnis['icd']['code'] == 'F90.0' && $ergebnis['dsm']['code'] != 0) {
					echo'Ihre Angaben erf&uuml;llen die Kriterien des ICD-10 und die des DSM-IV. ';
				} elseif($ergebnis['icd']['code'] != 'F90.0' && $ergebnis['dsm']['code'] != 0) {
					echo'Ihre Angaben erf&uuml;llen die Kriterien des DSM-IV. ';
				} elseif($ergebnis['icd']['code'] == 'F90.0' && $ergebnis['dsm']['code'] == 0) {
					echo'Ihre Angaben erf&uuml;llen die Kriterien des ICD-10. ';

				}

				if($kriterien['zusatz'] == true) {
					echo'Sie sollten sich mit einem Fachmann in Verbindung setzen, um mit diesem das weitere Vorgehen zu besprechen!';
				} else {
					echo'Allerdings wird mindestens eines der Zusatzkriterien nicht erf&uuml;llt. Trotzdem sollten Sie sich besser von einem Fachmann beraten lassen.';
				}

			}

			echo'</b></p>';

			echo'
				<h3>Erl&auml;uterung</h3>
<p class="p1">Zur Diagnose einer ADHS werden gem&auml;&szlig; der <a href="http://www.icd-code.de/suche/icd/code/F90.-.html" title="ICD-10" target="_blank">ICD-10</a>-Forschungskriterien 6 positive Merkmale aus dem Bereich 1-9 ben&ouml;tigt sowie 3 der Merkmale 10-14 und ein Merkmal der Items 15-18. Nach <a href="http://www.behavenet.com/capsules/disorders/adhd.htm" title="DSM-IV" target="_blank">DSM-IV</a> m&uuml;ssen von den Items 1-9 sechs positiv sein (Score &gt;0) sowie von den Merkmalen 10-18 weitere 6 Items.</p>';


			echo'<p class="p1"><em>Hinweis: Als positiv wird ein Merkmal dann gewertet, wenn seine Auspr&auml;gung &gt;0 betr&auml;gt. Da weder DSM noch ICD eine Quantifizierung der Merkmale enthalten, gen&uuml;gt f&uuml;r die Einsch&auml;tzung eines Merkmals als vorhanden ein Wert gr&ouml;&szlig;er als 0.</em></p>';
			break;
			// ENDE Auswertung ADHS-SB --------------------------

		// START Auswertung WURS-K ----------------------------
		case 'wurs-k':
			// antworten
			$antworten = array();
			$antworten['01'] = (int) $_POST['frage01'];
			$antworten['02'] = (int) $_POST['frage02'];
			$antworten['03'] = (int) $_POST['frage03'];
			$antworten['04'] = ((int) $_POST['frage04']-4)*-1;
			$antworten['05'] = (int) $_POST['frage05'];
			$antworten['06'] = (int) $_POST['frage06'];
			$antworten['07'] = (int) $_POST['frage07'];
			$antworten['08'] = (int) $_POST['frage08'];
			$antworten['09'] = (int) $_POST['frage09'];
			$antworten['10'] = (int) $_POST['frage10'];
			$antworten['11'] = (int) $_POST['frage11'];
			$antworten['12'] = ((int) $_POST['frage12']-4)*-1;
			$antworten['13'] = (int) $_POST['frage13'];
			$antworten['14'] = ((int) $_POST['frage14']-4)*-1;
			$antworten['15'] = (int) $_POST['frage15'];
			$antworten['16'] = (int) $_POST['frage16'];
			$antworten['17'] = (int) $_POST['frage17'];
			$antworten['18'] = (int) $_POST['frage18'];
			$antworten['19'] = (int) $_POST['frage19'];
			$antworten['20'] = (int) $_POST['frage20'];
			$antworten['21'] = (int) $_POST['frage21'];
			$antworten['22'] = (int) $_POST['frage22'];
			$antworten['23'] = (int) $_POST['frage23'];
			$antworten['24'] = (int) $_POST['frage24'];
			$antworten['25'] = ((int) $_POST['frage25']-4)*-1;


#----------------------------------------------------------------------------------
			# Ergebnis
			$summe = array_sum($antworten);
			if($summe >= 30) {
				$style = ' class="rot"';
				$text  = 'Stark ausgepr&auml;gte ADHS-Symptomatik w&auml;hrend der Kindheit';
			}	else {
				$style = ' class="gruen"';
				$text  = 'Kaum ausgepr&auml;gte ADHS-Symptomatik w&auml;hrend der Kindheit';
			}

			echo'
			<div style="float: left; padding-right: 30px; padding-bottom: 10px;">
				<table>
				<caption>Auswertung<br>
				<small>Wender-Utah-Rating-Scale (WURS-k)</small></caption>
        <tbody>
			    <tr>
		        <td>Frage 01:</td>
		        <td>'.$antworten['01'].'</td>
		        <td>Frage 02:</td>
		        <td>'.$antworten['02'].'</td>
			    </tr>
			    <tr>
		        <td>Frage 03:</td>
		        <td>'.$antworten['03'].'</td>
		        <td>Frage 04:</td>
		        <td>'.$antworten['04'].'</td>
			    </tr>
			    <tr>
		        <td>Frage 05:</td>
		        <td>'.$antworten['05'].'</td>
		        <td>Frage 06:</td>
		        <td>'.$antworten['06'].'</td>
			    </tr>
			    <tr>
		        <td>Frage 07:</td>
		        <td>'.$antworten['07'].'</td>
		        <td>Frage 08:</td>
		        <td>'.$antworten['08'].'</td>
			    </tr>
			    <tr>
		        <td>Frage 09:</td>
		        <td>'.$antworten['09'].'</td>
		        <td>Frage 10:</td>
		        <td>'.$antworten['10'].'</td>
			    </tr>
			    <tr>
		        <td>Frage 11:</td>
		        <td>'.$antworten['11'].'</td>
		        <td>Frage 12:</td>
		        <td>'.$antworten['12'].'</td>
			    </tr>
			    <tr>
		        <td>Frage 13:</td>
		        <td>'.$antworten['13'].'</td>
		        <td>Frage 14:</td>
		        <td>'.$antworten['14'].'</td>
			    </tr>
			    <tr>
		        <td>Frage 15:</td>
		        <td>'.$antworten['15'].'</td>
		        <td>Frage 16:</td>
		        <td>'.$antworten['16'].'</td>
			    </tr>
			    <tr>
		        <td>Frage 17:</td>
		        <td>'.$antworten['17'].'</td>
		        <td>Frage 18:</td>
		        <td>'.$antworten['18'].'</td>
			    </tr>
			    <tr>
		        <td>Frage 19:</td>
		        <td>'.$antworten['19'].'</td>
		        <td>Frage 20:</td>
		        <td>'.$antworten['20'].'</td>
			    </tr>
			    <tr>
		        <td>Frage 21:</td>
		        <td>'.$antworten['21'].'</td>
		        <td>Frage 22:</td>
		        <td>'.$antworten['22'].'</td>
			    </tr>
			    <tr>
		        <td>Frage 23:</td>
		        <td>'.$antworten['23'].'</td>
		        <td>Frage 24:</td>
		        <td>'.$antworten['24'].'</td>
			    </tr>
			    <tr>
		        <td>Frage 25:</td>
		        <td>'.$antworten['25'].'</td>
		        <td><strong>Summe</strong></td>
		        <td><strong>'.$summe.'</strong></td>
			    </tr>
			    <tr>
		        <td colspan="4"'.$style.'>
		          <strong>Ergebnis:</strong><br>
							<span class="result">'.$text.'</span>
		        </td>
			    </tr>
			    </tbody>
				</table>
			</div>';
#------------------------------------------------------------------

			#echo'<p class="p1"><b>';
			# ...
			#echo'</b></p>';

			echo'
			<div style="float: left; padding-bottom: 10px;">
				<h3>Erl&auml;uterung</h3>
				<p class="p1">Der WURS-k (Retz-Junginger et al., 2003; Retz-Junginger et al., 2002) ist ein Fragebogen der retrospektiv bestimmte ADHS-typische Verhaltensweisen, Eigenschaften und Schwierigkeiten auf einer f&uuml;nfstufigen Skala, mit 0 = trifft nicht zu, 1 = gering ausgepr&auml;gt, 2 = m&auml;&szlig;ig ausgepr&auml;gt, 3 = deutlich ausgepr&auml;gt und 4 = stark ausgepr&auml;gt, im Alter von 8 bis 10 Jahren abfragt.</p>

				<p class="p1">Bei einem von den Autoren empfohlenen Cut-Off Wert von 30 ergibt sich eine Sensitivit&auml;t von 85% und eine Spezifit&auml;t von 70%. (Retz-Junginger et al, 2003). Allerdings muss angemerkt werden, dass diese Werte ausschlie&szlig;lich an M&auml;nnern erhoben wurden und f&uuml;r Frauen derzeit keine Cut-off-Werte vorliegen. Ansonsten sind die Testg&uuml;tekriterien als gut anzusehen: Die Split-half Reliabilit&auml;t liegt bei r=.85, die Innere Konsistenz nach Crombachs Alpha bei α = .91 (Retz-Junginger et al, 2003).</p>

				<p class="p1"><strong>Literatur:</strong><br>

				<ul class="p1"l style="list-style-position:inside">
					<li>
						Retz Junginger, P., Retz, W., Blocher, D., Weijers, H.G., Trott, G.E., Wender, P.H., & Ro&szlig;ler, M. (2002).
						<a href="'.ROOT_ABS.'Wender_Utah_Rating_Scale_WURS_-_k.html">
						Wender Utah Rating Scale (WURS-k) Die deutsche Kurzform zur retrospektiven Erfa&szlig;ung des hyperkinetischen Syndroms bei Erwachsenen
						</a>. Der Nervenarzt, 73, 830-838.
					</li>
					<li>
						Retz Junginger, P., Retz, W., Blocher, D., Stieglitz, R.D., Georg, T., Supprian, T., Wender, P.H., & Rosler, M. (2003).
						<a href="'.ROOT_ABS.'reliabilitat-und-validitat-der-wender-utah-rating-scale-kurzform-retrospektive-erfassung-von-symptomen-aus-dem-spektrum-der-aufmerksamkeitsdefizithyperaktivitatsstorung.html" >
						Reliabilitat und Validitat der Wender-Utah-Rating-Scale-Kurzform. Retrospektive Erfa&szlig;ung von Symptomen aus dem Spektrum der Aufmerksamkeitsdefizit/Hyperaktivitat&szlig;torung
						</a>. Der Nervenarzt, 74, 987-993.
					</li>
				</ul>

				<p class="p1"><strong>Hinweise:</strong></p>
				<ul>
					<li class="p1">Der Fragebogen wurde für die präsentation im Web leicht modifiziert,
					der Inhalt ist jedoch identisch.</li>
					<li class="p1"><strong>Die hier angebotenen Informationen dienen zur Unterstützung und nicht als Ersatz der Beziehung zwischen dem Patient/Webseitenbesucher und seinem Arzt.</strong></li>
				</ul>
			</div>';
			break;
		// ENDE Auswertung WURS-K -----------------------------

		default:
			header('Location: '.ROOT_ABS.'selbsttests.html');
	}
} else {
	header('Location: '.ROOT_ABS.'selbsttests.html');
}
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<?php echo $jquery_ui ?>"></script>
<p class="p1">
	<button style="margin-top: 20px" id="back" onclick="history.back();">Zur&uuml;ck zum Test</button>
</p>

<script>
	$(function() {
		$( "#back" ).button({
			icons: {
				primary: "ui-icon-circle-arrow-w"
			}
		});
	});
</script>

<?php
$messages = array (
    'de_DE'=> array(
       'sprache' => 				'de',
	   'Willkommen' => 				'Herzlich Willkommen',
	   'h1' => 						'ADHS Studien',
       'h2' => 						'Informationen zu ADHS bei Kindern und Erwachsenen',
	   'Home-Text' => 				'ADHS-Studien ist die wahrscheinlich größte deutsche Sammlung wissenschaftlicher Publikationen über ADHS. In letzter Zeit werden auch vermehrt englischsprachige Beiträge eingestellt. Informationen über die häufigsten Komorbiditäten (Begleiterkrankungen) und einige Selbsttests runden das Angebot ab. ADHS-Studien ist ein Projekt von Betroffenen für Betroffene. Die Berichterstattung über ADHS in den Medien ist meist unsachlich und mit Vorurteilen behaftet. Dem wollen wir mit wissenschaftlichen Fakten entgegen wirken.<br /><br />ADHS Studien wird kontinuierlich gepflegt und erweitert. Trotzdem können Fehler nie ganz ausgeschlossen werden. Sollten Sie Fehler auf der Website entdecken, teilen Sie diese bitte dem Webmaster mit. Dankbar 	sind wir natürlich auch für Ihre Verbesserungsvorschläge, Lob oder konstruktive Kritik.',
       'ADHS_Allgemein' => 			'ADHS Allgemein',
       'ADHS_bei_Kindern' => 		'ADHS bei Kindern',
       'ADHS_bei_Erwachsenen' => 	'ADHS bei Erwachsenen',
       'Diagnostik' => 				'Diagnostik',
	   'Selbsttest_ADHS' => 		'Selbsttest: AD(H)S',
       'Selbsttest_Depression' => 	'Selbsttest: Depression',
       'Therapie' => 				'Therapie',
       'Komorbiditaeten' => 		'Komorbiditäten',
	   'Affektive_Stoerungen' => 	'Affektive Störungen',
	   'Angststoerungen' => 		'Angststörungen',
	   'borderline' => 				'Persönlichkeitsstörungen',
	   'Stoerung_d_Sozialv' => 		'Störung des Sozialverhaltens',
	   'Substanzmissbrauch' => 		'Substanzmissbrauch',
	   
    ),

    'en_EN'=> array(
       'sprache' => 				'en',
	   'Willkommen' => 				'Welcome',
	   'h1' => 						'ADHD Research',
       'h2' => 						'Scientific information about ADHD in children and adults',
	   'Home-Text' => 				'The ADHD research website offers an extensive collection of scientific publications on attention-deficit/hyperactivity disorder and its frequent comorbidities. Several self-test and further links are also available. ADHD research is a project by and for people affected by ADHD.',
       'ADHS_Allgemein' => 			'',
       'ADHS_bei_Kindern' => 		'',
       'ADHS_bei_Erwachsenen' => 	'',
       'Diagnostik' => 				'',
	   'Selbsttest_ADHS' => 		'',
       'Selbsttest_Depression' => 	'',
       'Therapie' => 				'',
       'Komorbiditaeten' => 		'',
	   'Affektive_Stoerungen' => 	'',
	   'Angststoerungen' => 		'',
	   'borderline' => 				'',
	   'Stoerung_d_Sozialv' => 		'',
	   'Substanzmissbrauch' => 		'',
);

function msg($s) {
    global $LANG;
    global $messages;
    
    if (isset($messages[$LANG][$s])) {
        return $messages[$LANG][$s];
    } else {
        error_log("l10n error:LANG:" . 
            "$lang,message:'$s'");
    }
}
?>
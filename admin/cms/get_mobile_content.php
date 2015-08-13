<?php
// includes
include('configuration.php');
include('dataaccess.php');
include('funktionen.inc.php');
//-------------

// Spracheinstellungen (0=deutsch, 1=englisch)
if($kat[1] == '1') { # englisch
    $lang = '?lang=en';
    $seitensprache = '1';
} elseif($kat[1] == '0') { # deutsch
    $lang = '?lang=de';
    $seitensprache = '0';
} else { # deutsch/standard
    $lang = '';
    $seitensprache = '';
}
//-------------

if(isset($_POST)) {

    var_dump($_POST);

    function content($kat) {
        # CONTENT ABFRAGEN (Einzel- oder Listenansicht?)
        if ($kat[2] == 'single') {
            # abfrage content einzelansicht
            $link = $docs.$kat[0].'.pdf';
            $cont = select("adhs_cont", "*", "link", $link, "");

        } else {
            # abfrage content liste
            $cont = select_desc("adhs_cont", "*", "kat", $kat[0]["id"], "lastmod");
        }
        //-------------
        # META-TAGS-ABFRAGEN
        $meta_tags = meta_tags($kat, $cont, $seitensprache);
        # titel
        $h1 = ($seitensprache == 1) ? 'ADHD research' : 'ADHS Studien';
        $h2 = ($seitensprache == 1) ? $meta_tags['titel_en'] : $meta_tags['titel'];

        #----------
        if ($cont[0]["id"] != "104") { # content ausgeben, außer die sufu wird aufgerufen
            if ($kat[2] == 'single') {
                # einzelansicht
                content_single($cont[0], $seitensprache, $img);
            } else {
                # listenansicht, falls keine sonder-seite aufgerufefn wurde
                if ($cont[0]["id"] != "46" && $cont[0]["id"] != "74" && $cont[0]["id"] != "125") content_liste($kat, $cont, $seitensprache, $img);
                else {
                    #echo '</h3>';
                    if ($cont[0]["id"] == "46") include(ROOT_REL.'adhs_test.php'); # adhs-sb (php-inhalt)
                    elseif ($cont[0]["id"] == "74") include(ROOT_REL.'bdi_test.php'); # bdi (php-inhalt)
                    elseif ($cont[0]["id"] == "125") include(ROOT_REL.'error404.php'); # Error-404-Seite (php-inhalt)
                }
            }
        } else include(ROOT_REL.'suche.php');
    }



        # NAVIGATION
        function navi($main, $sub) {
            # DATEN ABRUFEN
            $navi = select("adhs_kat", "*", "", "", "id");
            # HAUPT-NAVIGATION
            if($main == 1) {
                foreach($navi as $nav) {
                    $id = $nav["id"];
                    $ukat = $nav["ukat"];
                    #falls vorhanden den englischen titel benutzen
                    if($seitensprache == '1') {
                        if($nav["titel_en"] != '') $titel = $nav["titel_en"]; else $titel = $nav["titel"];
                    } else if($nav["titel"] != '') $titel = $nav["titel"]; else $titel = $nav["titel_en"];
                    #-------------
                    $link_title = $nav["link_title"];
                    $meta_nav = $nav["meta_nav"];
                    $hidden = $nav["hidden"];
                    if($ukat == NULL && $meta_nav == "0" && $hidden == "0") {
                        echo '<li><a href="'.ROOT_ABS.$link_title.'.html'.$lang.'">'.$titel.'</a>';
                        $sec_kats = select("adhs_kat", "*", "ukat", $id, "");
                        $u_count = count($sec_kats); # unterkategorien vorhanden?
                        if ($u_count > 0) {
                            echo '<ul>';
                            foreach($sec_kats as $sec_kat) { # unterkategorien ausgeben
                                #falls vorhanden den englischen titel benutzen
                                if($seitensprache == '1') {
                                    if($sec_kat["titel_en"] != '') $titel = $sec_kat["titel_en"]; else $titel = $sec_kat["titel"];
                                } else if($sec_kat["titel"] != '') $titel = $sec_kat["titel"]; else $titel = $sec_kat["titel_en"];
                                #-------------
                                $link_title = $sec_kat["link_title"];
                                echo '<li><a href="'.ROOT_ABS.$link_title.'.html'.$lang.'">'.$titel.'</a></li>';
                            }
                            echo '</ul></li>';
                        } else echo '</li>';
                    }
                }
            }
            # META-NAVIGATION
            if($sub == 1) {
                foreach($navi as $nav) {
                    $id = $nav["id"];
                    #falls vorhanden den englischen titel benutzen
                    if($seitensprache == '1') {
                        if($nav["titel_en"] != '') $titel = $nav["titel_en"]; else $titel = $nav["titel"];
                    } else $titel = $nav["titel"];
                    #-------------
                    $link_title = $nav["link_title"];
                    $meta_nav = $nav["meta_nav"];
                    $hidden = $nav["hidden"];
                    if($meta_nav == "1" && $hidden == "0") {
                        echo '<a href="'.ROOT_ABS.$link_title.'.html'.$lang.'">'.$titel.'</a>&nbsp; |&nbsp; ';
                    }
                }
            }

        }



    content($kat);
}
?>
<?php
################################################################
// w3easyProtect | folder protection Script                    #
// see also w3easy.org cms project                             #
// functions                                                   #
// Copyright (C) 2011 Joachim Haack                            #
// http://w3easy.org/                                          #
// http://www.w3nord.de/                                       #
                                                               #
// This program is free software: you can redistribute         #
// it and/or modify it under the terms of the                  #
// GNU General Public License as published by                  #
// the Free Software Foundation, either version 3 of           #
// the License, or (at your option) any later version          #
                                                               #
// Keep intact all copyright notices!                          #
                                                               #
// This program is distributed in the hope that it will        #
// be useful, but WITHOUT ANY WARRANTY; without even the       #
// implied warranty of MERCHANTABILITY or FITNESS FOR          #
// A PARTICULAR PURPOSE.                                       #
// See the GNU General Public License for more details.        #
                                                               #
// You should have received a copy of the                      #
// GNU General Public License along with this program.         #
// If not, see <http://www.gnu.org/licenses/>.                 #
################################################################

function read_file ($file)
// file einlesen
{
	if (file_exists($file) && is_file($file)){
		$handle   = fopen($file,"r");
		if (filesize($file) > 0){
			$object   = fread($handle,filesize($file));
		}
		else {$object   = "file is empty";}
	}
	else {$object = "file not found";}
	return $object;
}

##########################################################

function array_display ($array)
{
	$anz = count($array);
	$out = "";
	$i   = 0;
	while ($i <= $anz){
		$out .= $array[$i];
		$i++;
	}
	return $out;
}

##########################################################

function write_text_to_file ($file, $text)
{
	$handle = fopen($file, "w");
	flock($handle,LOCK_EX);
	fputs($handle,$text);
	flock($handle,LOCK_UN);
	fclose($handle);
}

##########################################################

function show_dir ($folder, $select, $tag) 
{
	if (file_exists($folder)){
		if (count(scandir($folder)) > 0){
			$handle = opendir($folder);			
			while ($fof = readdir($handle)){
				if ($select == "files"){
					if ($fof != '.' && $fof != '..' && is_file($folder."/".$fof) == true){ // kein Verzeichnis!
	//					$array[] = "<a target='_blank' href='".$folder."/".$fof."'>".$fof."</a><br>\n";
	//					$array[] = "<".$tag.">".$folder."/".$fof."</".$tag.">\n";
						$array[] = "<".$tag.">".$fof."</".$tag.">\n";
					}
				}
				if ($select == "folder"){
//					if (ordner_leer_oder_voll($folder,$select) != "leer"){				
						if ($fof != '.' && $fof != '..' && is_dir($folder."/".$fof) == true){ // keine Datei!
		//					$array[] = "<a target='_blank' href='".$folder."/".$fof."'>".$fof."</a><br>\n";
		//					$array[] = "<".$tag.">".$folder."/".$fof."</".$tag.">\n";
							$array[] = "<".$tag.">".$fof."</".$tag.">\n";
						}
//					}
//					else if (ordner_leer_oder_voll($folder,$select) == "leer"){
//						$array[] = "no file resp. folder";
//					}
				}				
				if ($select == "files_folder"){
					if ($fof != '.' && $fof != '..'){
	//					$array[] = "<a target='_blank' href='".$folder."/".$fof."'>".$fof."</a><br>\n";
	//					$array[] = "<".$tag.">".$folder."/".$fof."</".$tag.">\n";
						if (is_dir($folder."/".$fof) == true){
							$array[] = "<".$tag.">".$fof."</".$tag.">\n";
						}
						if (is_file ($folder."/".$fof) == true){
							$array[] = "<".$tag.">".$fof."</".$tag.">\n";
						}
//						$array[] = "<".$tag.">".$fof."</".$tag.">\n";
					}
				}
				if ($select == "fof"){
					if ($fof != '.' && $fof != '..'){
	//					$array[] = "<a target='_blank' href='".$folder."/".$fof."'>".$fof."</a><br>\n";
	//					$array[] = "<".$tag.">".$folder."/".$fof."</".$tag.">\n";
						if (is_dir($folder."/".$fof) == true){
							$array[] = "<".$tag.">".$fof."</".$tag.">\n";
						}
						if (is_file ($folder."/".$fof) == true){
							$array[] = "<".$tag.">".$fof."</".$tag.">\n";
						}
//						$array[] = "<".$tag.">".$fof."</".$tag.">\n";
					}
				}
			}
			closedir ($handle);
		}
		else{
			$array[] = "no file resp. folder";
		}
	}	
	$anz = count($array);
	if ($anz > 1){sort($array);}
	$fof_list = "";
	$i = 0;
	while ($i<$anz){$fof_list .= $array[$i]; $i++;}
	return $fof_list;
}

#############################################################################

function showPOST ()
{
	$anz = count($_POST);
	$post = "";
	$j = 1;
	foreach ($_POST as $index => $wert)
	{
		if ($index == "text"){$wert = "TEXT";}
//		$post .= $j." &nbsp; ".$index." : ".$wert."<br>\n";
		$post .= sprintf("%03d",$j)." &nbsp; ".$index." : ".$wert."<br>\n";
		$j++;
	}
	return $post;
}

#############################################################################

?>
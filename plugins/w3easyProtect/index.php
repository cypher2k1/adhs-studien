<?php
################################################################
// w3easyProtect | folder protection Script                    #
// see also w3easy.org cms project                             #
// script                                                      #
// Copyright (C) 2011 Joachim Haack                            #
// http://w3easy.org/                                          #
// http://www.w3nord.de/                                       #
                                                               #
$version   = "0.09";                                           #
$v_datum   = "2014"; // 2014-01-04                             #
$title     = "w3easyProtect";                                  #
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

// changelog
// 0.07 -> 0.08 = added: $p8_fold_selected, $p9_fold_selected
// 0.08 -> 0.09 = added: w3easyPWG link, revision help manual 

// INCLUDES
$config    = "config.php"; // config file
$functions = "functions.php"; // functions
include ($config);
include ($functions);

// DATA
$action                = $_SERVER['PHP_SELF'];
$folder_base           = $path_to_root;
$explorer              = "explorer_on";
// post
$reset                 = $_POST['reset'];
// if($reset == "reset"){$_POST = false;}
if($reset == "reset"){$_POST = "";}

$form_sent             = $_POST['form_sent'];
// $text                  = stripslashes($_POST['text']);
if (get_magic_quotes_gpc()) {
$text                  = stripslashes($_POST['text']);}
else {$text            = $_POST['text'];}

$todo				   = $_POST['todo'];
$todo_hist             = $_POST['todo_hist'];
$new_file			   = $_POST['new_file'];
$new_folder			   = $_POST['new_folder'];
$todo21				   = $_POST['todo21'];
$todo21_hist		   = $_POST['todo21_hist'];
$todo22				   = $_POST['todo22'];
$todo22_hist		   = $_POST['todo22_hist'];
$wysiwyg               = $_POST['wysiwyg'];
$wysiwyg_hist          = $_POST['wysiwyg_hist'];
// $explorer              = $_POST['explorer'];
// $explorer_hist         = $_POST['explorer_hist'];

// $quick_folder_selector = $_POST['quick_folder_selector'];
$folder_selector	   = $_POST['folder_selector'];
$folder_selected	   = $_POST['folder_selected'];
$p1_fold_selected	   = $_POST['p1_fold_selected'];
$p2_fold_selected	   = $_POST['p2_fold_selected'];
$p3_fold_selected	   = $_POST['p3_fold_selected'];
$p4_fold_selected	   = $_POST['p4_fold_selected'];
$p5_fold_selected	   = $_POST['p5_fold_selected'];
$p6_fold_selected	   = $_POST['p6_fold_selected'];
$p7_fold_selected	   = $_POST['p7_fold_selected'];
$p8_fold_selected	   = $_POST['p8_fold_selected'];
$p9_fold_selected	   = $_POST['p9_fold_selected'];
//$quick_file_selector   = $_POST['quick_file_selector'];
$file_selector		   = $_POST['file_selector'];
$file_selected		   = $_POST['file_selected'];

$user      = $_POST['user'];
$password  = $_POST['password'];

// SCRIPT
// folder determination
if ($todo == "show_config" || $form_sent == ""){
	if ($todo == "show_config"){$path_to_folder = "./"; $file_selected = $config;}
	else {$path_to_folder = $folder_base;}

	$path_to_folder = explode("/",$path_to_folder); // value is taken from config.php
	$path_to_folder  = array_reverse($path_to_folder);
	if (isset($path_to_folder[1])) {$folder_selected = $path_to_folder[1]; $slash_p0 = "/";}
		else {$folder_selected = ""; $slash_p0 = "./";}
	if (isset($path_to_folder[2])){$p1_fold_selected = $path_to_folder[2]; $slash_p1 = "/";}
		else {$p1_fold_selected = ""; $slash_p1 = "";}
	if (isset($path_to_folder[3])){$p2_fold_selected = $path_to_folder[3]; $slash_p2 = "/";}
		else {$p2_fold_selected = ""; $slash_p2 = "";}
	if (isset($path_to_folder[4])){$p3_fold_selected = $path_to_folder[4]; $slash_p3 = "/";}
		else {$p3_fold_selected = ""; $slash_p3 = "";}
	if (isset($path_to_folder[5])){$p4_fold_selected = $path_to_folder[5]; $slash_p4 = "/";}
		else {$p4_fold_selected = ""; $slash_p4 = "";}
	if (isset($path_to_folder[6])){$p5_fold_selected = $path_to_folder[6]; $slash_p5 = "/";}
		else {$p5_fold_selected = ""; $slash_p5 = "";}
	if (isset($path_to_folder[7])){$p6_fold_selected = $path_to_folder[7]; $slash_p6 = "/";}
		else {$p6_fold_selected = ""; $slash_p6 = "";}
	if (isset($path_to_folder[8])){$p7_fold_selected = $path_to_folder[8]; $slash_p7 = "/";}
		else {$p7_fold_selected = ""; $slash_p7 = "";}
	if (isset($path_to_folder[9])){$p8_fold_selected = $path_to_folder[9]; $slash_p8 = "/";}
		else {$p8_fold_selected = ""; $slash_p8 = "";}
	if (isset($path_to_folder[10])){$p9_fold_selected = $path_to_folder[10]; $slash_p9 = "/";}
		else {$p9_fold_selected = ""; $slash_p9 = "";}

	$path_to_folder  = $p9_fold_selected.$slash_p9.$p8_fold_selected.$slash_p8;
	$path_to_folder .= $p7_fold_selected.$slash_p7.$p6_fold_selected.$slash_p6;
	$path_to_folder .= $p5_fold_selected.$slash_p5.$p4_fold_selected.$slash_p4.$p3_fold_selected.$slash_p3;
	$path_to_folder .= $p2_fold_selected.$slash_p2.$p1_fold_selected.$slash_p1.$folder_selected.$slash_p0;
	$folder_status		= "&nbsp; Selected: ".$path_to_folder;
}
if ($form_sent	!= ""){
	//if ($folder_selector == "Select folder" && $quick_folder_selector == "Quick folder" && $quick_file_selector == "Quick file"){
	if ($folder_selector == "Select folder"){
		if ($folder_selected == "") {$slash_p0 = "./";} else {$slash_p0 = "/";}
		if ($p1_fold_selected == "") {$slash_p1 = "";} else {$slash_p1 = "/";}
		if ($p2_fold_selected == "") {$slash_p2 = "";} else {$slash_p2 = "/";}
		if ($p3_fold_selected == "") {$slash_p3 = "";} else {$slash_p3 = "/";}
		if ($p4_fold_selected == "") {$slash_p4 = "";} else {$slash_p4 = "/";}
		if ($p5_fold_selected == "") {$slash_p5 = "";} else {$slash_p5 = "/";}
		if ($p6_fold_selected == "") {$slash_p6 = "";} else {$slash_p6 = "/";}
		if ($p7_fold_selected == "") {$slash_p7 = "";} else {$slash_p7 = "/";}
		if ($p8_fold_selected == "") {$slash_p8 = "";} else {$slash_p8 = "/";}
		if ($p9_fold_selected == "") {$slash_p9 = "";} else {$slash_p9 = "/";}
		
		$path_to_folder  = $p9_fold_selected.$slash_p9.$p8_fold_selected.$slash_p8;
		$path_to_folder .= $p7_fold_selected.$slash_p7.$p6_fold_selected.$slash_p6;
		$path_to_folder .= $p5_fold_selected.$slash_p5.$p4_fold_selected.$slash_p4.$p3_fold_selected.$slash_p3;
		$path_to_folder .= $p2_fold_selected.$slash_p2.$p1_fold_selected.$slash_p1.$folder_selected.$slash_p0;
		$folder_status		= "&nbsp; Selected: ".$path_to_folder;	
	}
	else if ($folder_selector == "One folder up"){
		$folder_selected	= $p1_fold_selected;
		$p1_fold_selected	= $p2_fold_selected;
		$p2_fold_selected	= $p3_fold_selected;
		$p3_fold_selected	= $p4_fold_selected;
		$p4_fold_selected	= $p5_fold_selected;
		$p5_fold_selected	= $p6_fold_selected;
		$p6_fold_selected	= $p7_fold_selected;
		$p7_fold_selected	= $p8_fold_selected;
		$p8_fold_selected	= $p9_fold_selected;
		$p9_fold_selected	= "";		
		if ($folder_selected  != ""){$slash_p0 = "/";} else {$slash_p0 = "./";}
		if ($p1_fold_selected != ""){$slash_p1 = "/";} else {$slash_p1 = "";}
		if ($p2_fold_selected != ""){$slash_p2 = "/";} else {$slash_p2 = "";}
		if ($p3_fold_selected != ""){$slash_p3 = "/";} else {$slash_p3 = "";}
		if ($p4_fold_selected != ""){$slash_p4 = "/";} else {$slash_p4 = "";}
		if ($p5_fold_selected != ""){$slash_p5 = "/";} else {$slash_p5 = "";}
		if ($p6_fold_selected != ""){$slash_p6 = "/";} else {$slash_p6 = "";}
		if ($p7_fold_selected != ""){$slash_p7 = "/";} else {$slash_p7 = "";}
		if ($p8_fold_selected != ""){$slash_p8 = "/";} else {$slash_p8 = "";}
		if ($p9_fold_selected != ""){$slash_p9 = "/";} else {$slash_p9 = "";}
		
		$path_to_folder  = $p9_fold_selected.$slash_p9.$p8_fold_selected.$slash_p8;
		$path_to_folder .= $p7_fold_selected.$slash_p7.$p6_fold_selected.$slash_p6;
		$path_to_folder .= $p5_fold_selected.$slash_p5.$p4_fold_selected.$slash_p4.$p3_fold_selected.$slash_p3;
		$path_to_folder .= $p2_fold_selected.$slash_p2.$p1_fold_selected.$slash_p1.$folder_selected.$slash_p0;
		$folder_status		= "&nbsp; Selected: ".$path_to_folder;	
	}
	else if ($folder_selector != "Select folder" && $folder_selector != "One folder up"){
		if ($p9_fold_selected  != ""){
			$folder_status_2 = " <span class='warning'>[End Sel]</span> ";
		}
		else {
			$p9_fold_selected = $p8_fold_selected;
			$p8_fold_selected = $p7_fold_selected;
			$p7_fold_selected = $p6_fold_selected;
			$p6_fold_selected = $p5_fold_selected;
			$p5_fold_selected = $p4_fold_selected;
			$p4_fold_selected = $p3_fold_selected;
			$p3_fold_selected = $p2_fold_selected;
			$p2_fold_selected = $p1_fold_selected;
			$p1_fold_selected = $folder_selected;
			$folder_selected = $folder_selector;
			$folder_status_2 = "";
		}
		if ($folder_selected  != ""){$slash_p0 = "/";} else {$slash_p0 = "./";}
		if ($p1_fold_selected != ""){$slash_p1 = "/";} else {$slash_p1 = "";}
		if ($p2_fold_selected != ""){$slash_p2 = "/";} else {$slash_p2 = "";}
		if ($p3_fold_selected != ""){$slash_p3 = "/";} else {$slash_p3 = "";}
		if ($p4_fold_selected != ""){$slash_p4 = "/";} else {$slash_p4 = "";}
		if ($p5_fold_selected != ""){$slash_p5 = "/";} else {$slash_p5 = "";}
		if ($p6_fold_selected != ""){$slash_p6 = "/";} else {$slash_p6 = "";}
		if ($p7_fold_selected != ""){$slash_p7 = "/";} else {$slash_p7 = "";}
		if ($p8_fold_selected != ""){$slash_p8 = "/";} else {$slash_p8 = "";}
		if ($p9_fold_selected != ""){$slash_p9 = "/";} else {$slash_p9 = "";}
		
		$path_to_folder  = $p9_fold_selected.$slash_p9.$p8_fold_selected.$slash_p8;
		$path_to_folder .= $p7_fold_selected.$slash_p7.$p6_fold_selected.$slash_p6;
		$path_to_folder .= $p5_fold_selected.$slash_p5.$p4_fold_selected.$slash_p4.$p3_fold_selected.$slash_p3;
		$path_to_folder .= $p2_fold_selected.$slash_p2.$p1_fold_selected.$slash_p1.$folder_selected.$slash_p0;
		$folder_status		= "&nbsp; Selected: ".$path_to_folder.$folder_status_2;
	}	
}

// file determination
$ff_mm_text   = " <span class='warning'>[f/f missmatch => no edit!]</span>";
$ff_html_text = "&nbsp; <span class='warning'>Cannot load file containing html-element 'textarea'.</span>";

if ($form_sent 		== "") {
// if ($form_sent 		!= "yes") {
	$file_selected 	= "";
	$text 			= "";
	$sel_dis        = "sel_dis";
	$file_status	= "&nbsp; No file selected";
}
else if ($form_sent != "") {
// else if ($form_sent == "yes") {	
	if ($file_selector == "Cancel selection"){
		$file_selected	= "";
//		$todo_hist      = "";
		$text 		 	= "";
		$sel_dis        = "sel_dis";
		$file_status	= "&nbsp; Selection cancelled => no file selected";
	}
	// else if($file_selector  == "Select file" && $quick_file_selector == "Quick file"){
	else if($file_selector  == "Select file" ){
		if ($file_selected  != ""){
			$file_selected	= $file_selected;
			if (is_file($path_to_folder.$file_selected) != true){
				$sel_dis       = "sel_dis";
				$file_status   = "&nbsp; Selected: ".$file_selected.$ff_mm_text;
			}
			else {
				$sel_dis       = "sel_dis";
				$file_status   = "&nbsp; Selected: ".$file_selected;
			}				
		}
		else {
			$file_selected     = "";
			$text              = "";
			$sel_dis           = "sel_dis";
			$file_status       = "&nbsp; No file selected";
		}		
	}
	else if ($file_selector != "Select file" && $file_selector != "Cancel selection"){
		$file_selected = $file_selector;
//		$todo_hist     = ""; ###
		if (is_file ($path_to_folder.$file_selected) == true){
		################
 			$file            = $path_to_folder.$file_selected;
			$text_test       = read_file($file);
			if (substr_count($text_test,"<textarea") < 1){
				$text        = $text_test;
				$sel_dis     = "sel_dis";
				$file_status = "&nbsp; Selected: ".$file_selected;}
			else {
				$file_selected   = ""; // ???
				$text            = "";
				$file_status     = $ff_html_text;
			}
		################
		}
		else {
			$file_selected	= "";
			$file_status	= "&nbsp; Selected: File does not exist";
		}
	}
}

##########################################################

$show_fold 			= show_dir($path_to_folder, "folder", "option");
$show_file 			= show_dir($path_to_folder, "files", "option");
$show_fof			= show_dir($path_to_folder, "fof", "option");

##########################################################

//  reset
if ($reset == "reset"){
	$result    = "<p class='result_ok'>reset ok - let's get to work! ;)</p>";
}

else if ($reset != "reset"){
	// $todo_hist
	if ($todo_hist == "show_source"){
		$result    = "<p class='result_dis'>display: source</p>";
		$res_dis = "<p class='result_dis'>display: source</p>";
	}
	else if ($todo_hist == "show_config"){
		$result    = "<p class='result_dis'>display: config</p>";		
		$res_dis = "<p class='result_dis'>display: config</p>";
	}

	// $todo - cancel
	if ($todo == "cancel"){
		$todo = "";
		$result    = "<p class='result_ok'>cancelled - let's get to work! ;)</p>".$res_dis;
	}
	/*
	// $todo - show config
	if ($todo == "show_config"){
		if (file_exists($config) && is_file($config)){
			$file      = $config;
			$text      = read_file ($file);
			$result    = "<p class='result_dis'>display: config</p>";
		}
		else {$result = "<p class='result_no'>config file not found</p>";}
	}
	*/
	// todo - show_config
	if ($todo == "show_config"){
		if (file_exists($config) && is_file($config)){
			$path_to_folder = "./";
			$file_selected  = $config;
			$file      		= $config;
			$text      		= read_file ($file);
			// $result    		= "<p class='result_dis'>display: config</p>";
		}
		else {$result = "<p class='result_no'>config file not found</p>";}
	}
	
	// $todo - edit config
	if ($todo == "edit_config"){
		if (file_exists($config) && is_file($config)){
			if ($path_to_folder == "./" && $file_selected == $config){
				$file = $config;
				write_text_to_file ($file, $text);
				$result = "<p class='result_ok'>config edited</p>".$res_dis;
			}
			else {$result = "<p class='result_no'>wrong file: cannot edit config</p>".$res_dis;}
		}
		else {$result = "<p class='result_no'>config file not found</p>";}
	}
	// $todo - edit
	if ($todo == "edit"){
		$file = $path_to_folder.$file_selected;
		if (file_exists($file) && is_file($file)){			
			write_text_to_file ($file, $text);
			$result = "<p class='result_ok'>file edited</p>".$res_dis;			
		}
		else {$result = "<p class='result_no'>file not found</p>";}
	}
	// todo = make_htaccess
	if ($todo == "protect"){
		if ($user != "user" && $password != "password"){
			$directory = $path_to_folder;
			$htaccess_file = ".htaccess";
			$htpasswd_file = ".htpasswd";
			if (file_exists($directory)){
				$todo  = "make_htaccess";
				$result = "";
				// .htaccess
				if ($overwrite_protect != "off" && file_exists($directory.$htaccess_file)){
					$file  = $directory.".htaccess.TXT"; $info = "txt";
				}
				else {$file  = $directory.$htaccess_file;}
				$realpath = realpath($directory);
				$text  = "AuthName \"".$sec_fold_name."\"\n";
				$text .= "AuthType Basic\n";
				$text .= "AuthUserFile ".$realpath."/.htpasswd\n";
				$text .= "require valid-user";
				if ($do == write_text_to_file ($file, $text)){
					if ($info == "txt"){$result .= "<p class='result_no'>.htaccess.TXT created</p>".$res_dis;}
					else {$result .= "<p class='result_ok'>.htaccess created</p>".$res_dis;}
				}
				else {$result .= "<p class='result_no'>cannot create .htaccess</p>";}
				// .htpasswd
				if ($overwrite_protect != "off" && file_exists($directory.$htpasswd_file)){
					$file  = $directory.".htpasswd.TXT"; $info = "txt";
				}
				else {$file  = $directory.$htpasswd_file;}
				$text  = $user.":";
				// $text .= crypt($password,CRYPT_STD_DES);
				$text .= crypt($password);
				if ($do == write_text_to_file ($file, $text)){
					if ($info == "txt"){$result .= "<p class='result_no'>.htpasswd.TXT created</p>".$res_dis;}
					else {$result .= "<p class='result_ok'>.htpasswd created</p>".$res_dis;}
				}
				else {$result .= "<p class='result_no'>cannot create .htpasswd</p>";}
				$text  = "";
			}
			else {$result .= "<p class='result_no'>directory doesn't exist</p>";}
		}
		else {$result .= "<p class='result_no'>wrong user or password: cannot create protection files</p>";}
	}
	// delete file
	if ($todo == "delete_file"){
		if ($file_selected != ""){
			if ($file_selected != $config){
				$file_to_delete = $path_to_folder.$file_selected;
				if (is_file($file_to_delete)){
					unlink ($file_to_delete);
					$result = "<p class='result_ok'>The file '".$file_selected."' was deleted</p>\n";
				}
				else {$result = "<p class='result_no'>The file does not exist</p>\n";}
			}
			else {$result = "<p class='result_no'>cannot delete config</p>\n";}
		}
		else {$result = "<p class='result_no'>No file selected</p>\n";}
	}
}

// delete button
if (file_exists($path_to_folder.".htaccess.TXT") || file_exists($path_to_folder.".htpasswd.TXT") || file_exists($path_to_folder.".htaccess") || file_exists($path_to_folder.".htpasswd")){
	$delete_button = "<td><p class='options_del'><input type='radio' name='todo' value='delete_file'> delete file</p></td>";
}
else {$delete_button = "";}

// explorer
if ($explorer == "explorer_off") {$explorer_hist = "explorer_off";}
else if ($explorer == "explorer_on") {$explorer_hist = "explorer_on";}
if ($explorer_hist == "explorer_on"){
$folderEx = show_dir($path_to_folder, "folder", "p");
$filesEx = show_dir($path_to_folder, "files", "p");
$explorer=<<<EXPLORER
<!--<div id='mbox3'>-->
<div class='explorer_left'>
<p class='explorer_head'>
Folder: <span class='explorer_path'>$path_to_folder</span></p>
$folderEx
</div>
<div class='explorer_right'>
<p class='explorer_head'>
Files: <span class='explorer_path'>$file_selected &nbsp;</span></p>
$filesEx
</div>
<!--<p class='clearer'>&nbsp;</p>-->
<!--</div>-->
EXPLORER;
}
else {$explorer = "";}

// <!DOCTYPE html PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
// <!DOCTYPE html>
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset; ?>">
<title><?php echo $title; ?></title>
<link type='text/css' rel='stylesheet' href='styles/styles.css'>
<script type="text/javascript" src="javascript.js"></script>
</head>

<body>
<div id='wrap'>
<h1 class='title'><?php echo $title."&nbsp;".$version; ?></h1>
<p class='copyright'>
<span style='display:block; text-align:right;'>
<?php echo $title." ".$version." © ".$v_datum." by <a href='http://w3easy.org' target='_blank'>w3easy.org</a>\n"; ?>
<br><br>
</span>
<span style='display:block; text-align:right;'>
<!--
<a class='js_link' onclick='javascript:showBox();'>showBox</a> 
<a class='js_link' onclick='javascript:hideBox();'>hideBox</a> | 
-->
<a class='js_link' href='http://w3easy.org/online-tools/password-generator.php' target='_blank'>w3easyPWG</a> | 
<a class='js_link' onclick='javascript:help();'>help</a> | 
<a class='js_link' onclick='javascript:license();'>license</a> | 
<?php if($path_to_admin != ""){echo "<a href='".$path_to_admin."'>admin</a> | ";} ?>
<a href='<?php echo $path_to_root; ?>'>site</a>
</span>
</p>

<form class='clearer' action='<?php echo $action; ?>' method='POST' accept-charset='<?php echo $charset; ?>'>
<table summary='' border='0' cellpadding='5' cellspacing='5'>
<tr><td></td><td></td><td></td><td></td><td></td></tr>

<!-- explorer (hmmm... maybe viewer ??? -->
<tr><td colspan='5'><?php echo $explorer; ?></td></tr>

<tr class='clearer'>
<td colspan='5'><textarea rows='5' cols='5' name='text'><?php echo $text; ?></textarea></td>
</tr>
<tr><td colspan='5'></td></tr>

<tr class="clearer">
<td>
<select class='select' name="folder_selector" size="1">
<option>Select folder</option>
<option>One folder up</option>
<?php echo $show_fold; ?><!-- &nbsp; -->
</select>
<input type='hidden' name='folder_selected' value='<?php echo $folder_selected; ?>'>
<input type='hidden' name='p1_fold_selected' value='<?php echo $p1_fold_selected; ?>'>
<input type='hidden' name='p2_fold_selected' value='<?php echo $p2_fold_selected; ?>'>
<input type='hidden' name='p3_fold_selected' value='<?php echo $p3_fold_selected; ?>'>
<input type='hidden' name='p4_fold_selected' value='<?php echo $p4_fold_selected; ?>'>
<input type='hidden' name='p5_fold_selected' value='<?php echo $p5_fold_selected; ?>'>
<input type='hidden' name='p6_fold_selected' value='<?php echo $p6_fold_selected; ?>'>
<input type='hidden' name='p7_fold_selected' value='<?php echo $p7_fold_selected; ?>'>
<input type='hidden' name='p8_fold_selected' value='<?php echo $p8_fold_selected; ?>'>
<input type='hidden' name='p9_fold_selected' value='<?php echo $p9_fold_selected; ?>'>
<input type='hidden' name='file_selected' value='<?php echo $file_selected; ?>'>
</td>
<td colspan='3'><p class='sel_dis'><?php echo $folder_status; ?></p></td>
<?php echo $delete_button; ?>
</tr>

<tr>
<td>
<select class='select' name="file_selector" size="1">
<option>Select file</option>
<option>Cancel selection</option>
<?php echo $show_file; ?><!-- &nbsp; -->
</select>
</td>
<td colspan='3'><p class='<?php echo $sel_dis; ?>'><?php echo $file_status; ?></p></td>
<td><p class='options_config'><input type='radio' name='todo' value='show_config'> show config</p></td>
</tr>	

<tr>
<td><p class='options'><input class='input' type="text" name="user" maxlength="30" value='user'></p></td>
<td><p class='options'><input class='input' type="text" name="password" maxlength="30" value='password'></p></td>
<td><p class='options'><input type='radio' name='todo' value='protect'> protect</p></td>
<td><p class='options'><input type='radio' name='todo' value='edit'> edit file</p></td>
<td>
<p class='options'><input type='radio' name='todo' value='cancel'> cancel</p>
<input type='hidden' name='todo_hist' value='<?php // echo $todo_hist; ?>'>
<input type="hidden" name="explorer_hist" value='<?php echo $explorer_hist ?>'>
<input type='hidden' name='form_sent' value='yes'>
</td>
</tr>

<tr>
<td><p><input class='submit' type='submit' value='submit'></p></td>
<td colspan='3'><?php echo $result; ?></td>
<td><p><input class='submit' type='submit' name='reset' value='reset'></p></td>
</tr>

</table>
</form>

<div id='mbox'>
<p>hallo</p>
</div>

<?php
// output (for testing only)
// echo $box_text;
// echo filesize($file);
// echo "<hr>\n";
// echo $archive;
// echo showPOST ();
// var_dump($_POST);
// echo "<br>";
// echo $source;
// echo "<br>";
// echo $content[0];
?>
</div>

</body>
</html>
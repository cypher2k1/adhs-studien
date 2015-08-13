<?php
header("Content-Type: text/html; charset=utf-8");
// includes
include('admin/cms/configuration.php');
include('php/func_all_html_entities_decode.php');
include('admin/cms/dataaccess.php');
include('admin/cms/funktionen.inc.php');
//-------------
function literatur($data, $style) {
	if($style == 'table') {
		echo'
		<thead>
	  <tr>
			<th>ID</th>
			<th>Titel</th>
			<th>Autor</th>
			<th>Quelle</th>
			<th>Sprache</th>
			<th>Jahr</th>
			<th>Abstract</th>
	  </tr>
	</thead>
	<tbody>';
	}
	foreach($data as $row) {
		if($row['hidden'] == 0 && $row['icon'] == 0) {
			$id = $row['id'];
			($row['autor'] != '') ? $autor = _convert($row['autor']) : $autor = 'Unbekannter Autor';
			($row['quelle'] != '') ? $quelle = _convert($row['quelle']) : $quelle = 'Unbekannter Herausgeber';
			$jahr = $row['jahr'];
			#------------
			#$link = pdf_link_test($row['link']);
			$prev_link = explode('/', $row['link'], 2);
			$prev_link = explode('.', $prev_link[1], 2);
			$prev_link = $prev_link[0].'.html';
			# sprache
			if ($row['sprache'] == 0) {
				$sprache = 'DE';
				$titel = _convert($row['titel']);
			}
			elseif ($row['sprache'] == 1) {
				$sprache = 'EN';
				$titel = _convert($row['titel_en']);
			}
			#-----------
			if($style == 'text') {
				echo '
				<li id="'.$id.'">
				  <p><span title="Autor">'.$autor.'</span>: <strong>'.$titel.'. </strong>
				  <em><span title="Publisher">'.$quelle.'. </span></em>
				  <span title="Volltext"><a target="_blank" href="'.$prev_link.'">Abstract</a></span></p>
				</li>';
			}
			#-----------
			if($style == 'table') {
				echo '
				<tr>
					<td>'.$id.'</td>
					<td>'.$titel.'</td>
					<td>'.$autor.'</td>
					<td>'.$quelle.'</td>
					<td>'.$sprache.'</td>
					<td>'.$jahr.'</td>
					<td><a target="_blank" href="'.$prev_link.'">Abstract</a></td>
				</tr>';
			}
		}
	}
}
//-------------
echo'
<!DOCTYPE HTML>
<html>
<head>
<base href="'.ROOT_ABS.'">
<link rel="stylesheet" type="text/css" href="'.$jquery_ui_css.'">
<link rel="stylesheet" type="text/css" href="'.ROOT_ABS.'admin/plugins/jquery-datatables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="'.ROOT_ABS.'admin/plugins/jquery-datatables/media/css/jquery.dataTables_themeroller.css">
</head>
<body>';
//-------------
echo '<h3>Literatur</h3>';

$data = select("adhs_cont", "*", "", "", "id");
arsort($data);

switch($_GET['style']) {
	// Ansicht TABELLE -------------------------
	case 'table':
		echo '<table id="references">';
		literatur($data, $style="table");
		echo '<tbody></table>';
		break;
	// Ansicht TEXT ----------------------------
	case 'text':
		echo '<ol id="references">';
		literatur($data, $style="text");
		echo '</ol>';
		break;
	// Ansicht TABELLE -------------------------
	default:
		echo '<table id="references">';
		literatur($data, $style="table");
		echo '<tbody></table>';
		break;
}

echo'
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="'.ROOT_ABS.'admin/plugins/jquery-datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#references").dataTable({
			"bPaginate": true,
			"bLengthChange": true,
			"bFilter": true,
			"bSort": true,
			"bInfo": true,
			"bAutoWidth": true,
			"bJQueryUI": true
			//"sPaginationType": "full_numbers",
		});
	} );
</script>
</body>
</html>';
?>
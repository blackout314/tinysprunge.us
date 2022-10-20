<?php
$datadb = 'data.json';

$data = json_decode(file_get_contents($datadb), true);

if($_GET['var'] && $_GET['dat']) {
	$var = basename($_GET['var']);
	$dat = basename($_GET['dat']);
	$data[ $var ] = $dat;
	file_put_contents($datadb, json_encode($data));
}

header('Content-Type: application/json');
echo json_encode($data);

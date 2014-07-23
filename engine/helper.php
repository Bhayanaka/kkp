<?php

/* helper sistem */

function show_error_page($param){
	if (!empty($param)) echo $param; else echo 'Halaman tidak ditemukan';
}

function pr($data)
{
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

function vd($data)
{
	echo '<pre>';
	var_dump($data);
	echo '</pre>';
}

function _p($data)
{
	if (!isset($_POST[$data])) return false;
	return clean($_POST[$data]);
}

function _g($data)
{
	if (!isset($_GET[$data])) return false;
	return clean($_GET[$data]);
}

function _r($data)
{
	if (!isset($_REQUEST[$data])) return false;
	return clean($_REQUEST[$data]);
}

function _f($data)
{
	return clean($_FILES[$data]);
}

function clean($data)
{
	return trim(strip_tags($data));
}

function error_code($code=000)
{
	global $CONFIG;
	if ($CONFIG['default']['app_status']=='Development'){
		$msgcode = $code;
	}else{
		$getLength = strlen($code);
		$msgcode = substr($code,$getLength-3, $getLength);
	}
	$msg = "<fieldset style='color:red'>Error code {$msgcode}</fieldset>";
	pr($msg);
}

?>

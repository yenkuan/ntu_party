<?php
require_once("lib.php");
$qrcode = mysql_real_escape_string($_GET['qrcode']);

if (!queryRow("SELECT * FROM ntu_party WHERE qrcode='$qrcode' AND status >= 1"))
{
	echo 'fail';
}	exit;
mysql_query("INSERT INTO query (qrcode) VALUES ($qrcode)");
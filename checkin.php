<?php
require_once('lib.php');

if (!isset($_GET['qrcode']))
{
	echo '0';
	exit;
}
$qrcode = mysql_real_escape_string($_GET['qrcode']);


mysql_query("UPDATE ntu_party SET status=2 WHERE qrcode='$qrcode'");

if (mysql_affected_rows() != 1)
{
	echo '0';
	exit;
}

echo '1';
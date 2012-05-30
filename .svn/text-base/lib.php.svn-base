<?php
mysql_connect('localhost', 'hayek', 's90f8u1lk3j9d');
mysql_select_db('ntu_party');
mysql_query('set names utf8');
mysql_query("SET time_zone = 'Asia/Taipei'");



function queryRow($sql)
{
	//Compose SQL
	$args = func_get_args();
	$a = explode('?', $sql);
	for ($i = 1; $i < count($args); $i ++)
		$a[$i - 1] .= "'" . mysql_real_escape_string($args[$i]) . "'";
	$sql = implode('', $a);

	$rs = mysql_query("$sql LIMIT 1");
	$err = mysql_error();
	if ($err != '')
	{
		echo mysql_error();
		file_put_contents('log/sql.log', "sql error  $sql");
		exit;
	}
	if ($a = mysql_fetch_array($rs))
	{
		$len = count($a);
		for ($i = 0; $i < $len / 2; $i ++)
			unset($a[$i]);
		return $a;
	}
	return false;
}
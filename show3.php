<?php

require_once('lib.php');

$result = queryRow('SELECT * FROM query WHERE status = 0');

if ($result)
{
$qrcode = mysql_real_escape_string($result['qrcode']);
mysql_query("UPDATE query SET status=1 WHERE qrcode='$qrcode'");

}
else
{
	$result = queryRow('SELECT * FROM query ORDER BY ts DESC');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NTU SPECIAL - 台灣大學畢業舞會 HugWaltz - Powered by  VOGUE GQ</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url();
	background-color: #000;
}
</style>
<link href="ntusp.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="950" border="0" align="center" cellpadding="20" cellspacing="0">
  <tr>
    <td width="50%" height="155" valign="top"><img src="images/show_ci.jpg" width="167" height="152" /></td>
    <td width="50%" height="650" rowspan="2" valign="middle">
    <div style="position:absolute; top:50px; height:600px; width:450px; overflow:hidden;" >
    	<img src="uploads/<?php echo $result['qrcode'].".jpg"; ?>">
    </div>
    	
	<div style="position:absolute; top:50px;">
		<?php if ($result['radio'] == 'gq') {?>
		<img src="images/show_GQ.png" width="275" height="160" />
		<?php }else{ ?>
			<img src="images/show_VOGUE.png" width="450" height="159" />
		<?php } ?>
	</div>
	
	
	</div>
	<div class="cover_w" style="position:absolute; top:580px; text-align:center; width:450px;">
		<?php echo $result['select'];?>
	</div>

    </td>
  </tr>
  <tr>
    <td height="495" valign="top"><table width="430" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td class="cover_b"><?php echo $result['name']; ?> <span class="cover_g">|</span> <?php echo $result['major']; ?></td>
      </tr>
      <tr>
        <td><h1 class="cover_w" id="watch-headline-title"><span id="eow-title" dir="ltr" title="batfinks - peppercorn"><?php echo $result['quote']; ?></span></h1></td>
      </tr>
      <tr>
        <td height="60" align="center" valign="middle"><table width="260" border="0" cellspacing="0" cellpadding="0">
   
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<script>
	setInterval("window.location.reload()", 10000);
</script>
</body>
</html>
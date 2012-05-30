<?php
$wrong = 0;
if (isset($_POST['qrcode']))
{
	$qrcode = strtoupper($_POST['qrcode']);
	
	require_once('lib.php');

	$qrcode = queryRow('SELECT * FROM ntu_party WHERE qrcode=?', $qrcode);

	if (!$qrcode)
	{
		$wrong = 1;
	}
	else if ($qrcode['status'] == 1)
	{
		header("Location: show.php?qrcode=".$qrcode['qrcode']);
		exit;
	}
	else
	{
		session_start();
		$_SESSION['qrcode'] = $qrcode['qrcode'];
		header("Location: datas.php?qrcode=".$qrcode['qrcode']);
		exit;
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	$('#submit').click(function(){
		$('#qrcodeform').submit();
	});
});
</script>
</head>
<body>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0" background="images/datas_bg.gif">
  <tr>
    <td height="650"><table width="950" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="170"><img src="images/datas_top.jpg" width="950" height="170" /></td>
      </tr>
      <tr>
        <td height="359"><table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="40" align="center" valign="middle" class="text_w" style="color:red;"><?php if ($wrong == 1) echo '查無此序號'; ?></td>
          </tr>
          <tr>
            <td height="110" width="700" align="center" valign="middle" class="text_w">
	            <div style="float:left; margin-left:150px;">
	                ◎ 輸入序號:
	            </div>  
          		<div style="float:left;">
                	<form method="post" action="index.php" id="qrcodeform">
                	<input name="qrcode" type="text" class="text_g" id="textfield" size="15" />
                	</form>
               </div>
              	<div style="float:left;">
	                <img src="images/datas_next.gif" width="116" height="28" border="0" id="submit"/>
                </div>
             
            </td>
          </tr>
          <tr>
            <td height="140" align="center" valign="middle"><img src="images/datas_about.png" width="667" height="93" /></td>
          </tr>
          <tr>
            <td height="40" align="center" valign="middle" class="text_y">貼心小提醒  》舞會當天憑手環上方QR code感應入場，請記得將QR code調整到手腕上方便感應的位置唷！</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="121" align="right"><img src="images/datas_footer.gif" height="121" /></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>

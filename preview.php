<?php

session_start();
if (!isset($_SESSION['qrcode']))
	header("Location: index.php");

$_SESSION['name'] = htmlspecialchars($_POST['name']);
$_SESSION['major'] = htmlspecialchars($_POST['major']);
$_SESSION['quote'] = htmlspecialchars($_POST['quote']);
$_SESSION['radio'] = htmlspecialchars($_POST['radio']);

if ($_POST['radio'] == 'vogue')
	$_SESSION['select'] = htmlspecialchars($_POST['selectvogue']);
else
	$_SESSION['select'] = htmlspecialchars($_POST['selectgq']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NTU SPECIAL - 台灣大學畢業舞會 HugWaltz - Powered by  VOGUE GQ</title>
<style type="text/css">
body {
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
    	<img src="uploads/<?php echo $_SESSION['qrcode'].".jpg?a=".rand(1,10000); ?>">
    </div>
    	
	<div style="position:absolute; top:50px;">
		<?php if ($_SESSION['radio'] == 'gq') {?>
		<img src="images/show_GQ.png" width="275" height="160" />
		<?php }else{ ?>
			<img src="images/show_VOGUE.png" width="450" height="159" />
		<?php } ?>
	</div>
	
	
	</div>
	<div class="cover_w" style="position:absolute; top:580px; text-align:center; width:450px;">
		<?php echo $_SESSION['select'];?>
	</div>
   

    </td>
  </tr>
  <tr>
    <td height="495" valign="top"><table width="430" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td class="cover_b"><?php echo $_SESSION['name']; ?> <span class="cover_g">|</span> <?php echo $_SESSION['major']; ?></td>
      </tr>
      <tr>
        <td><h1 class="cover_w" id="watch-headline-title"><span id="eow-title" dir="ltr" title="batfinks - peppercorn"><?php echo $_SESSION['quote']; ?></span></h1></td>
      </tr>
      <tr>
        <td height="60" align="center" valign="middle"><table width="260" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="120"><img src="images/btn_sure.gif" width="116" height="28" id="gogogo" /></td>
            <td width="20">&nbsp;</td>
            <td width="120"><img src="images/btn_fix.gif" width="116" height="28" id="fix"/></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<script>
$('#fix').click(function(){
	window.location = 'datas.php?qrcode=<?php echo $_SESSION['qrcode']; ?>';
});
$('#gogogo').click(function(){

	var answer = confirm("請注意！一旦確定送出後，將無法修改頁面文字與照片設定唷！")
	if (answer){
		window.location = 'show.php';
	}
	else{
		return;
	}
	
});
</script>
</body>
</html>

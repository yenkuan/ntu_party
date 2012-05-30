<?php
	session_start();
	if (!isset($_GET['qrcode']))
		header("Location: index.php");
	
	require_once("lib.php");
	
	$qrcode = queryRow("SELECT * FROM ntu_party WHERE qrcode=?", $_GET['qrcode']);
	
	if (!$qrcode)
		header("Location: index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NTU SPECIAL - 台灣大學畢業舞會 HugWaltz - Powered by  VOGUE GQ</title>
<style type="text/css">
body {	background-color: #000; }
</style>
<link href="ntusp.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<script src="ajaxupload.3.5.js"></script>
<script>
jQuery(document).ready(function(){
	jQuery(function(){  
	    var btnUpload=$('#upload');  
	    var status=$('#upload');  
	    new AjaxUpload(btnUpload, {  
	        action: 'upload.php',  
	        //Name of the file input box  
	        name: 'uploadfile',  
	        onSubmit: function(file, ext){  
	            if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){  
	                  // check for valid file extension  	               
	                return false;  
	            }  
	        },  
	        onComplete: function(file, response){
  				var res = response;

	        	if(res != '1')
	        	{
	        		alert(res);
	        	}
	        	
				jQuery('#myimg').attr('src', 'uploads/'+ jQuery('#qrcodeval').val() +'.jpg?a='+Math.floor(Math.random()*10000));
	        }  
	    });  
	});
	
	jQuery('.radio').click(function(){
		if ($("#radiovogue").is(':checked'))
		{
			$('#selectgq').hide();
			$('#selectvogue').show();	
		}
		else
		{
			$('#selectgq').show();
			$('#selectvogue').hide();
		}
			
	});
	$('#gogo').click(function(){
		if ($('#textfield3').val().length > 30)
		{
			alert('畢業祝福小語必須小於30字');
			return;
		}
		if ($('#textfield3').val().length < 20)
		{
			alert('畢業祝福小語必須大於20字');
			return;
		}
		if ($('#textfield').val() == '')
		{
			alert('尚未填寫姓名');
			return;
		}
		if ($('#textfield2').val() == '')
		{
			alert('尚未填寫系所');
			return;
		}
		if ($('#myimg').attr('src') == 'images/upload_photo_bg.png')
		{
			alert('必須上傳照片');
			return;
		}
		$('#go').submit();
	});
	
});
</script>
</head>
<body>
<input type="hidden" value="<?php echo $qrcode['qrcode']; ?>" id="qrcodeval"/>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0" background="images/datas_bg.gif">
	<form id="go" action="preview.php" method="post">
  <tr>
    <td height="650"><table width="950" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="170"><img src="images/datas_top.jpg" width="950" height="170" /></td>
      </tr>
      <tr>
        <td height="359"><table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="300" align="left" valign="top"><table width="210"  border="0" cellspacing="0" cellpadding="10">
              <tr>
                <td >
                <div style="position:relative;">
	                <div class="ntu_profile_bg" style="position:absolute; overflow:hidden; width:190px;height:253px">
	                	<img id="myimg" src="<?php if (file_exists('uploads/'.$qrcode['qrcode'].'.jpg')) echo 'uploads/'.$qrcode['qrcode'].'.jpg?c='.rand(1,10000); else echo 'images/upload_photo_bg.png';?>" width="190"/>
	                </div>
                	<div class="ntu_profile_button" style="position:absolute; cursor:pointer; top:50px; left:38px;">
                		<a><img id="upload" src="images/upload_photo_button.png" width="118" height="31" /></a>
                	</div>

                </div>
                </td>
                </tr>
              </table></td>
            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="281" height="45"><table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="80" class="text_w">◎ 姓名: </td>
                    <td width="145"><input name="name" type="text" class="text_g" id="textfield" size="15" value="<?php if(isset($_SESSION['name'])) echo $_SESSION['name']; ?>"/></td>
                  </tr>
                </table></td>
                <td width="259"><table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="80" class="text_w">◎ 系所: </td>
                    <td width="145"><input name="major" type="text" class="text_g" id="textfield2" size="15" value="<?php if(isset($_SESSION['major'])) echo $_SESSION['major']; ?>"/></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="45" colspan="2" align="left"><span class="text_w">◎ 畢業祝福小語：</span></td>
                </tr>
              <tr>
                <td colspan="2"><table width="500" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="18" class="text_w">&nbsp;</td>
                    <td width="482" height="30"><input name="quote" type="text" class="text_g" id="textfield3" value="<?php if(isset($_SESSION['quote'])) echo $_SESSION['quote']; else echo '20-30字內'; ?>" size="50" onfocus="if(this.value == '20-30字內') { this.value = ''; }"/></td>
                  </tr>
                </table></td>
                </tr>
              <tr>
                <td height="45" colspan="2" align="left"><span class="text_w">◎ 請選擇雜誌:   
                  <input name="radio" type="radio" id="radiovogue" value="vogue" <?php if ($_SESSION['radio'] != 'gq') echo 'checked="checked"'; ?> class="radio"/>
                  VOGUE    
                  <input type="radio" name="radio" id="radiogq" value="gq" <?php if ($_SESSION['radio'] == 'gq') echo 'checked="checked"'; ?> class="radio"/>
                  GQ</span></td>
                </tr>
              <tr >
                <td height="45" colspan="2" ><table width="500" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="180" class="text_w">◎ 請選擇封面標題: </td>
                    <td width="175">
	                    <select name="selectgq" class="text_g" id="selectgq" <?php if ($_SESSION['radio'] != 'gq') echo 'style="display:none;"'; ?>>
	                      <option>天生贏家</option>
	                      <option>It's Good to be A Man</option>
	                      <option>King of the World</option>
	                      <option>未來菁英</option>
	                    </select>
	                    <select name="selectvogue" class="text_g" id="selectvogue" <?php if ($_SESSION['radio'] == 'gq') echo 'style="display:none;"'; ?>>
	                      <option>Fashion Icon</option>
	                      <option>Super Star</option>
	                      <option>明日之星</option>
	                    </select>
                    </td>
                  </tr>
                </table></td>
                </tr>
              <tr>
                <td height="50" colspan="2" align="center"><a><img src="images/datas_preview.gif" width="116" height="28" border="0" id="gogo"/></a></td>
                </tr>
            </table></td>
          </tr>
          </table></td>
      </tr>
      <tr>
        <td height="121" align="right"><img src="images/datas_footer.gif" height="121" /></td>
      </tr>
    </table></td>
  </tr>
  </form>
</table>
</body>
</html>

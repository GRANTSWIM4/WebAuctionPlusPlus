<?php if(!defined('DEFINE_INDEX_FILE')){if(headers_sent()){echo '<header><meta http-equiv="refresh" content="0;url=../"></header>';}else{header('HTTP/1.0 301 Moved Permanently'); header('Location: ../');} die("<font size=+2>Access Denied!!</font>");}
global $config,$html,$user;
$output='';


// page header
$output.=
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <title>{sitepage title}</title>
  <link rel="icon" type="image/x-icon" href="{path=static}favicon.ico" />
';
// css
$output.='
<link rel="stylesheet" type="text/css" href="{path=theme}main.css" />
<link rel="stylesheet" type="text/css" href="{path=theme}table_jui.css" />
<link rel="stylesheet" type="text/css" href="{path=static jquery}jquery-ui-1.8.19.custom.css" />
<style type="text/css">
{css}
</style>
';
// finish header
$output.='
<script type="text/javascript" language="javascript" src="{path=static}js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" language="javascript" src="{path=static}js/jquery.dataTables-1.9.0.min.js"></script>
<script type="text/javascript" language="javascript" src="{path=static}js/inputfunc.js"></script>

{AddToHeader}
</head>
<div class="navbar">
  <div class="navbar-inner">
    <a class="brand" href="#">WebAuction++</a>
    <ul class="nav">
<li><a href="http://go.craftitserver.com/auction">Home</a></li>
<li><a href="./?page=myitems">My Items</a></li>
<li><a href="./?page=myauctions">My Auctions</a></li>
<li><a onclick="return showHide();"/>Login</a></p>
    </ul>
  </div>
</div>
<body>
';

switch($html->getPageFrame()){
case 'default':
  $output.='
<div id="holder">
<script src="bootstrap.js"></script>
<div id="profile-box">
{if logged in}
<center>
<table border="0" cellspacing="0" cellpadding="0" style="padding-bottom: 2px; text-align:  left; font-size:   20px; font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;">
<tr>
  <td rowspan="4"><img src="./?page=mcskin&user='.$user->getName().'&view=body" alt="" width="60" height="120" id="mcface" /></td>
  <td height="30">Name:</td><td>'.$user->getName().
      ($user->hasPerms('isAdmin')?'&nbsp;<a style="font-size: small; font-weight: bold; color: #000000;">[Admin]</a>':'').'</td>
</tr>
<tr><td height="30">Money:&nbsp;&nbsp;</td><td>'.str_replace(' ','&nbsp;',FormatPrice($user->getMoney())).'</td></tr>
<tr><td colspan="2" align="center" style="font-size: smaller;">'.@date('jS M Y H:i:s').'</td></tr>
</table>
</center>
{else}


<script type="text/javascript" language="javascript">// <![CDATA[
function showHide() {
    var ele = document.getElementById("showHideDiv");
    if(ele.style.display == "block") {
            ele.style.display = "none";
      }
    else {
        ele.style.display = "block";
    }
}
// ]]></script>
<center>
</center>
<div id="showHideDiv" style="display:none;">
<center>
<form action="./" name="loginform" method="post" id="login">
{token form}
<input type="hidden" name="page"     value="login" />
<input type="hidden" name="lastpage" value="./" />

<label for="'.LOGIN_FORM_USERNAME.'">Username:&nbsp;</label></td>
<input type="text"  name="'.LOGIN_FORM_USERNAME.'" value="" class="input" size="30" tabindex="1" id="'.LOGIN_FORM_USERNAME.'" /></td>


<label    for="'.LOGIN_FORM_PASSWORD.'">Password:&nbsp;</label></td>
<input type="password" name="'.LOGIN_FORM_PASSWORD.'" value="" class="input" size="30" tabindex="2" id="'.LOGIN_FORM_PASSWORD.'" /></td>
<br>
<input type="submit" name="Submit" value="Submit" class="btn btn-primary" data-loading-text="Logging in..." />

</form>
<script type="text/javascript">
function formfocus() {
  document.getElementById(\''.LOGIN_FORM_USERNAME.'\').focus();
}
window.onload = formfocus;
</script>
</div>
</center>
<br>
<br>
<center>


</div>
<div id="menu-box">



{else}

{endif}


</div>
<div id="title-box">
  <div id="title-box2">
    <h1 style="margin-bottom: 10px; text-align: center; font-family: Arial;">CrafTrade</h1>
    <hr>
    <center>
    <h2>{page title}</h2>
    </center>
  </div>
</div>
';
  break;
case 'basic':
  $output.='
<table border="0" cellspacing="0" cellpadding="0" align="center" style="width: 100%; height: 100%;">
<tr><td style="height: 1px;"><h1 style="margin-bottom: 30px; text-align: center; font-family: Arial; font-size: 45px;">CrafTrade</h1></td></tr>
<tr><td>
';
}


return($output."\n\n\n");
?>

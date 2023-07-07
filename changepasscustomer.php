<html>

	
	<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="home.css">

 <style>
   html
   {
    scroll-behavior: smooth;
   }
   
   .overlay {
  position:absolute;
  bottom:0;
  left:13px;
  right:0;
  background-color:gray;
  opacity:0.7;
  overflow:hidden;
  width:93%;
  height:0;
  border-top:3px solid black;
  transition: .7s ease;
}

.con:hover .overlay {
  height: 40%;
 
}
 </style>
</head>
<body>
<?php
include('menugeneraltop.php');
?>
<style>
.a
{
	color:red;
}
</style>

<table class='table table-striped table-hover' width="100%" class="tablemiddle" border="0">
<tr>
<td class='a' valign="top" style="font-size:24px"></td></tr>
</table></marquee>

<center>
<br><br><br>
<table class='table table-striped table-hover' width="400"><tr>
<td>
	<h2 align="center"><font face="Tahoma" color="red">CHANGE PASSWORD</font></h2>
		<form action="changepasscustomersave.php" method="POST">
			<table class='table table-striped table-hover' align="center" border='1' width='400' height='200'>
				<tr>
				
				
					<td>Old Password<td align='center'><input  type="password"  name="txtOldPass">
				<tr>
					<td>New Password<td align='center'><input type="password" name="txtNewPass">
				<tr>
					<td colspan="2" align="center"><input type="submit" value="Change"> 
			</table>
		</form>
		</td></tr></table>
		</center>
	<body>
</html>

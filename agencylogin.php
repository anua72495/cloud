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
include('pagetop.php');
?>
<?php
include('menugeneraltop.php');
?>
<center>
<table class='table table-striped table-hover' width="400"><tr>
<td>
	<h2 align="center"><font face="Tahoma" color="blue ">AGENCY LOGIN FORM</font></h2>
		<form action="AgencyLoginCheck.php" method="POST">
			<table class='table table-striped table-hover' align="center" border='1' width='400' height='200'>
				<tr>
				
				
					<td>Agency Id<td align='center'><input name="txtUser">
				<tr>
					<td>Password<td align='center'><input type="password" name="txtPass">
				<tr>
					<td colspan="2" align="center"><input type="submit" value="Login"> 
			</table>
		</form>
		</td></tr></table>
		</center>
	<body>
</html>

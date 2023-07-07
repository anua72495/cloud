<html>

	
	<head><link rel="stylesheet" href="css/bootstrap.min.css"><script src="css/jquery.min.js"></script>  <script src="css/bootstrap.min.js"></script><link rel="stylesheet" href="css/all.css">
	
	<!--<!-- <link rel="stylesheet" type="text/css" href="styles.css" /> -->-->
</head>
<body>
<?php
include('pagetop.php');
?>
<?php
include('menugeneraltop.php');
?>
<center>
<h1 align="center">LOGIN FORM (ADMINISTRATOR)</h1>
</center>
<center>
<table class='table table-striped table-hover' width="800"><tr>
<td>
	
		<form action="AdminLoginCheck.php" method="POST">
			<table class='table table-striped table-hover' align="center" border="1">
			<tr>
			<td>
			<img src='images/adminlogin.jpg' border='1' width='200' height='150'/>
			</td>
			
			
			<td>	
				
				<table>
				<tr>
					<td>User Name<td><input name="txtUser"></td></tr>
				<tr>
					<td >Password<td><input type="password" name="txtPass"></td></tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" value="Admin Login"> 
					</td>
					</tr>
					</table>
			</td>
			</tr>
					
			</table>
		</form>
		</td></tr></table>
</center>
	<body>
</html>

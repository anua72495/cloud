<html>

	
	<head><link rel="stylesheet" href="css/bootstrap.min.css"><script src="css/jquery.min.js"></script>  <script src="css/bootstrap.min.js"></script><link rel="stylesheet" href="css/all.css"><!-- <link rel="stylesheet" type="text/css" href="styles.css" /> -->
</head>
<body>
<?php
include('pagetop.php');
?>
<?php
include('menugeneraltop.php');
?>
<center>
<h1 align="center">CUSTOMER LOGIN FORM</h1>
</center>
<center>
<table width="800"><tr>
<td>
	
		<form action="CustomerLoginCheck.php" method="POST">
			<table class='table table-striped table-hover' style="width:50%" align="center" border="1">
				<tr>
				<td>
			<img src='images/CustomerLogin.jpg' border='1' width='200' height='150'/>
			</td>
			<td>	
				
				<table>
				<tr>
				
					<td>Customer Id<td><input name="txtUser">
				<tr>
					<td >Password<td><input type="password" name="txtPass">
				<tr>
					<td colspan="2" align="center"> 
					<a href='AddCustomer.php'> New Customer </a>
					<input type="submit" value="Customer Login"> 
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

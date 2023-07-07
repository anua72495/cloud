<html>
	<head>
	 </head>
<body>
<table  border="0" width="100%" height="150">
<tr>
<td><?php include('index.php')?>

</td>
</tr>
</table>
<br><br><br>
<table class='table table-striped table-hover' width="100%" align="center">
<tr><td>

</td><td align="center">
	<h1 align="center"><font>LOGIN FORM</font></h1>
		<form action="LoginCheck.php" method="POST" onsubmit=" return checkfields()">
			<table class='table table-striped table-hover' width="30%"align="center" border="0">
				<tr>
				
				
					<td>UserName<td align="left"><input type="text" name="txtUser" onblur="checkAdminName(this)" id="adminame" >
				<tr>
					<td>Password<td align="left"><input type="password" name="txtPass" onblur="CheckPwd(this)" id="adminpass">
				<tr>
				<tr>
					<td> Type<td align="left">
					<select name="cboType">
					<option>Admin</option>
					<option>Agency</option>
					<option>Customer</option>
					
					</select>
					</td></tr>
					<tr><td align="right"><input type="submit" value="Login"> </tr>
			</table>
		</form>
		</td></tr></table>
	<body>
</html>

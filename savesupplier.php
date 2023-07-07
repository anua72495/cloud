<?php
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$suppId=$_REQUEST["suppId"];
	$cname=$_REQUEST["Suppliername"];
	$street=$_REQUEST["street"];
	$Addr=$_REQUEST["txtAddress"];
	$Cty=$_REQUEST["txtCity"];
	$Pin=$_REQUEST["txtPin"];
	$Ph=$_REQUEST["txtPhone"];
	$Mob=$_REQUEST["txtMobile"];
	$Mail=$_REQUEST["txtMail"];

		
	$qry="insert into Supplier values(" . $suppId . ",'" . $cname . "','" . $street . "','" . $Addr . "','" . $Cty . "','" . $Pin . "','" . $Mob . "','" . $Ph . "','" . $Mail . "','')";
/*echo $qry;
return;*/
	mysqli_query($con,$qry) or die(mysql_error());
	
?>
<html>
<head><link rel="stylesheet" href="css/bootstrap.min.css"><script src="css/jquery.min.js"></script>  <script src="css/bootstrap.min.js"></script><link rel="stylesheet" href="css/all.css"><!-- <link rel="stylesheet" type="text/css" href="styles.css" /> -->
</head>
<body>
<table  border="0" width="800">
<tr>
<td>
<?php
include('pagetop.php');
include('menugeneraltop.php');
?>
<table class='table table-striped table-hover' width="800">
<tr><td>
&nbsp;
</td><td align="center" valign="top">
<h2 align="center"><font face="Monotype Corsiva" color="Red">SUPPLIER/COMPANY DETAILS</font></h2>
	
	
		
			<table class='table table-striped table-hover' align="center"  cellspacing="1" cellpadding="6" width="50%" border="1">
			<tr>
<td>
<font color="White" size="4">
SUPPLIER/COMPANY DETAILS SAVED.</font>
</td>	
			
			</table>
		
		</TD></TR></TABLE>
		
		</td>
		</tr>
		</table>
	</body>
</html>
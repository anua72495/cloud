<?php
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$PaymentNo=$_REQUEST["txtPaymentNo"];
$PaymentDate=$_REQUEST["txtPaymentDate"];
$SupplierId=$_REQUEST["cboSupplierId"];
$Amount=$_REQUEST["txtAmount"];
$PaymentMode=$_REQUEST["cboPaymentMode"];
$Details=$_REQUEST["txtDetails"];
$qry="insert into Payment(PaymentNo,PaymentDate,SupplierId,Amount,PaymentMode,Details) Values(
'" . $PaymentNo."','" . $PaymentDate."','" . $SupplierId."','" . $Amount."','" . $PaymentMode."','" . $Details."')";

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
<table class='table table-striped table-hover' width="100%">
<tr><td align="center" colspan="2"  valign="top">

	
	
		
			<table class='table table-striped table-hover' align="center"  cellspacing="1" cellpadding="6" width="100%" border="1">
			<tr>
			<td align='left' width='200'>
			<?php include('menutable.php');?>
			</td>
<td width='800' valign="top">
<h1 align="center"><font face="Monotype Corsiva" color="Red">Payment Details</font></h1>
<font color="White" size="4">
Payment Details Saved.</font>
</td>	
			
			</table>
		
		</TD></TR></TABLE>
		
		</td>
		</tr>
		</table>
	</body>
</html>
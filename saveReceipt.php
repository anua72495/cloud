<?php
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$ReceiptNo=$_REQUEST["txtReceiptNo"];
$ReceiptDate=$_REQUEST["txtReceiptDate"];
$CustomerId=$_REQUEST["cboCustomerId"];
$Amount=$_REQUEST["txtAmount"];
$ReceiptMode=$_REQUEST["cboReceiptMode"];
$Details=$_REQUEST["txtDetails"];
$qry="insert into Receipt(ReceiptNo,ReceiptDate,CustomerId,Amount,ReceiptMode,Details) Values(
'" . $ReceiptNo."','" . $ReceiptDate."','" . $CustomerId."','" . $Amount."','" . $ReceiptMode."','" . $Details."')";

	mysqli_query($con,$qry) or die(mysql_error());
	
?>
<html>
<head><link rel="stylesheet" href="css/bootstrap.min.css"><script src="css/jquery.min.js"></script>  <script src="css/bootstrap.min.js"></script><link rel="stylesheet" href="css/all.css"><!-- <link rel="stylesheet" type="text/css" href="styles.css" /> -->
</head>
<body>
<table  border="0" width="100%">
<tr>
<td>
<?php
include('pagetop.php');
include('menugeneraltop.php');
?>
<table class='table table-striped table-hover' width="800">
<tr><td align="center" colspan="2"  valign="top">

	
	
		
			<table class='table table-striped table-hover' align="center"  cellspacing="1" cellpadding="6" width="100%" border="1">
			<tr>
			<td align='left' width=200>
			<?php include('menutable.php');?>
			</td>
<td valign="top">
<h1 align="center"><font face="Monotype Corsiva" color="Red">Receipt Details</font></h1>
<font color="White" size="4">
Receipt Details Saved.</font>
</td>	
			
			</table>
		
		</TD></TR></TABLE>
		
		</td>
		</tr>
		</table>
	</body>
</html>
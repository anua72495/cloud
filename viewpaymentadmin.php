<?php
session_start();
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
echo "<head>";
?>
<link rel="stylesheet" href="css/bootstrap.min.css"><script src="css/jquery.min.js"></script>  <script src="css/bootstrap.min.js"></script><link rel="stylesheet" href="css/all.css"><!-- <link rel="stylesheet" type="text/css" href="styles.css" /> -->

<?php
echo "</head><body>";
include('pagetop.php');
include('menugeneraltop.php');
echo "<center>";

echo "	<table  align='center' cellspacing='0' cellpadding='0' border='1'>";


echo "<p align='left' width='130'>";
include('menutable.php');
echo "</p>";
echo "</td>";
			

		$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
$FromDate=$_REQUEST["txtFromDate"];
$ToDate=$_REQUEST["txtToDate"];


$sql = "Select PaymentNo,PaymentDate,A.SupplierId,A.SupplierName,Amount,PaymentMode,Details From Supplier A,Payment B where A.SupplierId=B.SupplierId and PaymentDate Between '" . $FromDate . "' and '" . $ToDate . "'";
$rs= mysqli_query($con,$sql);
echo "<td valign='top' align='center'>";
	echo "<h2 align=center><font face='TAHOMA' color=White>PAYMENT REPORT FROM " . $FromDate . " TO " . $ToDate . "</font></h2>";
	$totalamount=0;
	echo "<table class='table table-striped table-hover' border=1 width='50%' cellpadding='5' cellspacing='0'>";

	echo "<tr><th>Payment No.</th><th>Payment Date</th><th>Supplier Id</th><th>Supplier Name</th><th>Amount</th><th>Payment Mode</th><th>Remarks</th>";
	$Sno=1;
	while($row = mysqli_fetch_assoc($rs))
	{
	echo "<tr>";
			echo "<td align=center>" . $row['PaymentNo']. "</td><td> " . $row['PaymentDate']. "</td><td align=center> " . $row['SupplierId']. "</td><td> " . $row['SupplierName']. "</td><td align=right> " . $row['Amount'] . "</td><td align=left> " . $row['PaymentMode'] . "</td><td align=left> " . $row['Details'] . "</td></tr>";
$Sno = $Sno+1;
	$totalamount=	$totalamount+$row['Amount'];
	}
echo "<tr><td colspan=4 align=right>Total Amount : </td><td align=right valign=middle><font size=4>" . $totalamount . "</font></td></tr>";	
	echo "</table></td></tr>";
echo "</table></center></body></html>";
	mysqli_close($con);
?>
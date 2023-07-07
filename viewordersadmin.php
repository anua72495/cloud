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


$sql = "Select OrderNo,OrderDate,A.CustomerId,A.CustomerName,Quantity,Price,Total From Customer A,Orderdetails B where A.CustomerId=B.UserName and OrderDate Between '" . $FromDate . "' and '" . $ToDate . "'";
$rs= mysqli_query($con,$sql);
echo "<td valign='top' align='center'>";
	echo "<h2 align=center><font face='TAHOMA' color=White>CUSTOMER ORDER REPORT FROM " . $FromDate . " TO " . $ToDate . "</font></h2>";
	$totalamount=0;
	echo "<table class='table table-striped table-hover' border=1 width='50%' cellpadding='5' cellspacing='0'>";

	echo "<tr><th>OrderNo</th><th>Order Date</th><th>Customer Id</th><th>Customer Name</th><th>Quantity</th><th>Price</th><th>Total</th></tr>";
	$Sno=1;
	while($row = mysqli_fetch_assoc($rs))
	{
	echo "<tr>";
			echo "<td align=center>" . $row['OrderNo']. "</td><td> " . $row['OrderDate']. "</td><td align=center> " . $row['CustomerId']. "</td><td> " . $row['CustomerName']. "</td><td align=right> " . $row['Quantity'] . "</td><td align=right> " . $row['Price'] . "</td><td align=right> " . $row['Total'] . "</td></tr>";
$Sno = $Sno+1;
	$totalamount=	$totalamount+$row['Total'];
	}
echo "<tr><td colspan=6 align=right>Total Amount : </td><td align=right valign=middle><font size=4>" . $totalamount . "</font></td></tr>";	
	echo "</table></td></tr>";
echo "</table></center></body></html>";
	mysqli_close($con);
?>
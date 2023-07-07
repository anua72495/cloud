<?php
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	//$sql="select * from Stock";
$FromStockDate= $_REQUEST["txtDate"];


	$sql="select A.ItemCode,A.ItemName,Qty,Photo from Items A,PurchaseMaster B,PurchaseTrans C Where B.BillNo=C.BillNo and A.ItemCode=C.ItemCode and (B.BillDate<='" . $FromStockDate . "') group By A.ItemCode,A.ItemName,A.Photo";

//echo $sql;

	$rs= mysqli_query($con,$sql);
	//echo "<html>
echo "<head>";
?>
<link rel="stylesheet" href="css/bootstrap.min.css"><script src="css/jquery.min.js"></script>  <script src="css/bootstrap.min.js"></script><link rel="stylesheet" href="css/all.css"><!-- <link rel="stylesheet" type="text/css" href="styles.css" /> -->

<?php
echo "</head><body>";
include('pagetop.php');
include('menugeneraltop.php');
echo "<center>";


echo "	<table align='center' cellspacing='0' cellpadding='0' width='100%' border='1'>";
echo "			<tr><td>";
include('menutable.php');
echo "</td>";
			

echo "<td valign='top' align='center'>";
	echo "<h2 align=center><font face='TAHOMA' color=White>ITEM STOCK REPORT AS ON " . $FromStockDate . "</font></h2>";
	
	echo "<table class='table table-striped table-hover' border=1 width=75% cellpadding='1' cellspacing='0'>";


	//echo "<tr><th>SNo</th><th>Entry Date</th><th>Category</th><th>Item Name</th><th>Mode</TH><TH>Qty</th><th>Rate</th><th>Amount</th>";
	echo "<tr><th>Item Code</th><th>Item Name</th><TH>Quantity</th><th>Image</th>";
	$Sno=1;
	while($row = mysqli_fetch_assoc($rs))
	{
	echo "<tr>";
			echo "<td align=center>" . $row['ItemCode'] . "<td>" . $row['ItemName']. "</td><td align=right>" . $row['Qty']. "</td><td align=center><a href='itemimages/" . $row['Photo'] . "'><img src='itemimages/" . $row['Photo'] . "' width=100 height=100/></a></td></tr>";
$Sno = $Sno+1;
//		echo "<td>" . $row['SNo'] . "</td><td> " . $row['UpdateDate']. "</td><td> " . $row['CategoryName']. "</td><td> " . $row['ItemCode']. "</td><td> " . $row['Mode'] . "</td><td> " . $row['Qty'] . "</td><td> " . $row['Rate'] . "</td><td> " . $row['Amount'] . "</td></tr>";
	}
	
	echo "</table></td></tr></table></center></body></html>";
	mysqli_close($con);
?>
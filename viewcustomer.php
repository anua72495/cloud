<?php
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$sql="select * from Customer";

	$rs= mysqli_query($con,$sql);
	
echo "<head><link rel='stylesheet' type='text/css' href='styles.css'></link></head><body>";
include('pagetop.php');
include('menugeneraltop.php');
echo "<center>";

echo "	<table  align='center' cellspacing='0' cellpadding='0' width='100%' border='1'>";
echo "	<tr><td>";
include('menutable.php');
echo "</td>";
			

echo "<td valign='top' align='center'>";
	echo "<h1 align=center><font face='TAHOMA' color=white>CUSTOMERS REPORT</font></h1>";
	
	echo "<table class='table table-striped table-hover' border=1 width='100%' cellpadding='1' cellspacing='0'>";

	echo "<tr><th>CUSTOMER ID</th><th>CUSTOMER NAME</th><th>LANDMARK</th><th>ADDRESS</th><th>CITY</th><th>PINCODE</th><th>PHONE</th><th>MOBILE</th><th>MAIL ID</th>";
//	echo "<tr><th>ITEM CODE</th><th>ITEM NAME</th><th>DESCRIPTION </th><th>CATEGORY</TH><th>SALES RATE</TH><th>IMAGE</TH>";
	$cnt=0;
	while($row = mysqli_fetch_assoc($rs))
	{
if($cnt%2==0)
	echo "<tr height=40>";
else
	echo "<tr height=40 bgcolor='#FFF5B6'>";

	//	echo "<td>" . $row['ItemCode'] . "</td><td> " . $row['ItemName']. "</td><td> " . $row['Description']. "</td><td> " . $row['CategoryId'] . "</td><td align=right> " . $row['SaleRate'] . "</td><td align=right><img src='itemimages/" . $row['FilePath'] . "' width=100 height=100/></td></tr>";
	echo "<tr><td align=center style='color:red'>" . $row['CustomerId'] . "</td><td bgcolor=yellow>" . $row['CustomerName'] . "</td><td>" . $row['Street'] . "</td><td>" . $row['Address']. "</td><td>" . $row['City'] . "</td><td>" . $row['PinCode'] . "</td><td bgcolor=yellow>" . $row['Phone'] . "</td><td>" . $row['Mobile'] . "</td><td>" . $row['EmailId'] . "</td></tr>";
	}
	
	echo "</table></td></tr></table></center></body></html>";
	mysqli_close($con);
?>
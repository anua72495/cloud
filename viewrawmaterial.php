<?php
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$sql="select * from RawMaterial";

	$rs= mysqli_query($con,$sql);
	
echo "<head><link rel='stylesheet' type='text/css' href='styles.css'></link></head><body>";
include('pagetop.php');
include('menugeneraltop.php');
echo "<center>";

echo "	<table align='center' cellspacing='0' cellpadding='0' width='100%' border='1'>";
echo "	<tr><td>";
include('menutable.php');
echo "</td>";
			

echo "<td valign='top' align='center'>";
	echo "<h1 align=center><font face='TAHOMA' color=white>RAW MATERIALS LIST</font></h1>";
	
	echo "<table class='table table-striped table-hover' border=1 width='75%' cellpadding='1' cellspacing='0'>";

	echo "<tr><th>ITEM IMAGE</th><th>FEATURES</th>";
//	echo "<tr><th>ITEM CODE</th><th>ITEM NAME</th><th>DESCRIPTION </th><th>CATEGORY</TH><th>SALES RATE</TH><th>IMAGE</TH>";
	$cnt=0;
	while($row = mysqli_fetch_assoc($rs))
	{
if($cnt%2==0)
	echo "<tr height=40>";
else
	echo "<tr height=40 bgcolor='#FCF5B6'>";

	//	echo "<td>" . $row['ItemCode'] . "</td><td> " . $row['ItemName']. "</td><td> " . $row['Description']. "</td><td> " . $row['CategoryId'] . "</td><td align=right> " . $row['SaleRate'] . "</td><td align=right><img src='itemimages/" . $row['FilePath'] . "' width=100 height=100/></td></tr>";
	echo "<td align=right><a href='rawmaterialimages/" . $row['Photo'] . "'><img src='rawmaterialimages/" . $row['Photo'] . "' width=200 height=200/></a></td><td><table class='table table-striped table-hover' width=100%><tr><td>NAME</td><td width=100% bgcolor=yellow><h3>" . $row['ItemCode'] . ":" . $row['ItemName']. "</h3></td></tr><tr><td valign=middle>DESCRIPTION</td><td >" . $row['Description']. "</td></tr><tr><td><h3>CATEGORY</h3></td><td><h3>" . $row['Category'] . "</h3></td></tr><tr><td>RATE</td><td valign=middle bgcolor='maroon'><h3><font color=white>" . $row['PurchaseRate'] . "</font></h3></td></tr></table></td></tr>";
	}
	
	echo "</table></td></tr></table></center></body></html>";
	mysqli_close($con);
?>
<?php
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$sql="select * from Items";

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
	echo "<h2 align=center><font face='TAHOMA' color=red>ITEMS LIST</font></h2>";
	
	echo "<table class='table table-striped table-hover' border=1 width='75%' cellpadding='1' cellspacing='0'>";


	echo "<tr><th>ITEM CODE</th><th>ITEM NAME</th><th>DESCRIPTION </th><th>CATEGORY</TH><th>PURCHASE RATE</TH><th>IMAGE</TH>";
	$cnt=0;
	while($row = mysqli_fetch_assoc($rs))
	{
if($cnt%2==0)
	echo "<tr height=40>";
else
	echo "<tr height=40 bgcolor='#FCF5B6'>";

		echo "<td>" . $row['ItemCode'] . "</td><td> " . $row['ItemName']. "</td><td> " . $row['Description']. "</td><td> " . $row['Category'] . "</td><td align=right> " . $row['PurchaseRate'] . "</td><td align=right><img src='itemimages/" . $row['Photo'] . "' width=100 height=100/></td></tr>";
	}
	
	echo "</table></td></tr></table></center></body></html>";
	mysqli_close($con);
?>
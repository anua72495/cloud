<?php
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$sql="select * from Supplier Where AgencyId='" . $_SESSION['userid'] . "'";

	$rs= mysqli_query($con,$sql);
	//echo "<html>
echo "<head><link rel='stylesheet' href='css/bootstrap.min.css'>  <script type='text/javascript' src='jquery/3.1.1/jquery.min.js'></script><script type='text/javascript' src='js/bootstrap.min.js'></script>
</head><body bgcolor='AntiqueWhite' text='blue'>";
include('pagetop.php');
include('menugeneraltop.php');
echo "<center>";


echo "	<table  align='center' cellspacing='0' cellpadding='0' width='100%' border='1' class='table table-striped'>";
echo "			<tr><td>";
include('menutableagency.php');
echo "</td>";
			

echo "<td valign='top' align='center'>";
	echo "<h1 align=center><font face='Monotype Corsiva' color=DarkOrchid>SUPPLIER REPORT</font></h1>";
	
	echo "<table class='table table-striped table-hover' border=1 width=75% cellpadding='1' cellspacing='0'>";


	echo "<tr><th>SUPPLIER CODE</th><th>SUPPLIER NAME</th><th>CREATION DATE</th><th>ADDRESS</TH><TH>CITY</TH><TH>PINCODE</TH><TH>PHONE</TH><TH>MOBILE</TH><TH>EMAILID</TH>";
	
	while($row = mysqli_fetch_assoc($rs))
	{
	echo "<tr>";
		echo "<td>" . $row['SupplierCode'] . "</td><td> " . $row['SupplierName']. "</td><td> " . $row['DateofCreation']. "</td><td> " . $row['Address'] . "</td><td> " . $row['City'] . "</td><td> " . $row['PinCode'] . "</td><td> " . $row['Phone'] . "</td><td> " . $row['Mobile'] . "</td><td> " . $row['EmailID'] . "</td></tr>";
	}
	
	echo "</table></td></tr></table></center></body></html>";
	mysqli_close($con);
?>
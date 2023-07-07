<?php
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	//$sql="select * from Stock";
	$sql="select A.CategoryName,B.ItemName,Sum(Qty) as Qty,FilePath from Category A,Items B,Stock C Where A.CategoryId=B.CategoryId and B.ItemCode=C.ItemCode Group By C.ItemCode";

	$rs= mysqli_query($con,$sql);
	//echo "<html>
echo "<head>";
?>
<link rel="stylesheet" href="css/bootstrap.min.css"><script src="css/jquery.min.js"></script>  <script src="css/bootstrap.min.js"></script><link rel="stylesheet" href="css/all.css"></head><body>

<?php
include('pagetop.php');
include('menugeneraltop.php');
echo "<center>";
echo "<form name=f1 method=post action=viewstock.php>";


echo "	<table  align='center' cellspacing='0' cellpadding='0' width='100%' border='1'>";
echo "			<tr><td>";
include('menutable.php');
echo "</td>";
			

echo "<td valign='top' align='center'>";
	echo "<h2 align=center><font face='TAHOMA' color=White>ITEM STOCK DATE FOR STOCK</font></h2>";
	
	echo "<table class='table table-striped table-hover' border=1 width='300' cellpadding='1' cellspacing='0'>";
?>
<tr><td>Stock Date As on </td><td><input type=text name='txtDate' value='<?php echo date('Y-m-d'); ?>'></td></tr>
<tr><td colspan=2 align=center><input type=submit value=Stock></td></tr>
<?php

	echo "</table></td></tr></table></center></form></body></html>";
	mysqli_close($con);
?>
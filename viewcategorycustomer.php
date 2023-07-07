<?php
/*
	$con = mysqli_connect("localhost","root",'');
	mysql_select_db("electronics", $con);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$sql="select * from Category";

	$rs= mysqli_query($con,$sql);
	mysqli_close($con);
	*/
	//echo "<html>
echo "<head>";
?>
<link rel="stylesheet" href="css/bootstrap.min.css"><script src="css/jquery.min.js"></script>  <script src="css/bootstrap.min.js"></script><link rel="stylesheet" href="css/all.css"><!-- <link rel="stylesheet" type="text/css" href="styles.css" /> -->

<?php
echo "</head><body>";
include('pagetop.php');
include('menugeneraltop.php');
echo "<center>";


echo "	<table  align='center' cellspacing='0' cellpadding='0' width='100%' border='1'>";
echo "			<tr><td>";
include('categorytable.php');
echo "<br/><br/>";
include('menutablecustomer.php');
echo "</td>";
echo "<td valign='top' align='center'>";
		
	echo "</td></tr></table></center></body></html>";
	
?>
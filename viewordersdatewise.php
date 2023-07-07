<?php
session_start();
?>

<html>
<head>

<?php

echo "<link rel='stylesheet' href='style.css'> <script type='text/javascript' src='jquery/3.1.1/jquery.min.js'></script><script type='text/javascript' src='js/bootstrap.min.js'></script>";
?>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="home.css">

 <style>
   html
   {
    scroll-behavior: smooth;
   }
   
   .overlay {
  position:absolute;
  bottom:0;
  left:13px;
  right:0;
  background-color:gray;
  opacity:0.7;
  overflow:hidden;
  width:93%;
  height:0;
  border-top:3px solid black;
  transition: .7s ease;
}

.con:hover .overlay {
  height: 40%;
 
}
 </style>

<?php
echo"</head><body bgcolor='AntiqueWhite' text='blue'>";
include('menugeneraltop.php');

?>
<style>
.a
{
	color:red;
}
</style>
<?php
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	$from=$_POST["txtfromdate"];
	$to=$_POST["txttodate"];
	$sql="select A.AgencyId,A.AgencyName,C.MaterialId,C.MaterialName,OrderId,DateOfOrder,B.Quantity,B.Rate,B.Amount,B.Status from Agency A,Orders B,Material C where A.AgencyId=B.AgencyId and B.MaterialId=C.MaterialId and DateOfOrder Between '" . $from . "' and '" . $to . "'";

	$rs= mysqli_query($con,$sql);
	
?>
<table class='table table-striped table-hover' width="100%" class="tablemiddle" border="0">
<tr>
<td class='a' valign="top" style="font-size:24px">Welcome To Agency Page</td></tr>
</table></marquee>

<?php


echo"<form action='viewordersagency.php' method='post'>";
echo "	<table  align='center' cellspacing='0' cellpadding='0' width='100%' border='0'>";
echo "			<tr><td>";
include('menutableagency.php');
echo "</td>";
			

echo "<td valign='top' align='center'>";
	echo "<h2 align=center><font face='TAHOMA' color=red>ORDERS LIST</font></h2>";
	
	echo "<table class='table table-striped table-hover' border=1 width=75% cellpadding='1' cellspacing='0'>";


	echo "<tr><th>AGENCY ID</th><th>AGENCY NAME</th><th>MATERIAL ID</th><th>MATERIAL NAME</th><th>ORDER ID</th><th>DATE OF ORDER</th><th>QUANTITY</th><th>RATE</th><th>AMOUNT</th><th>STATUS</th></tr>";
		$cnt=0;
	while($row = mysqli_fetch_assoc($rs))
	{
if($cnt%2==0)
	echo "<tr height=40>";
else
	echo "<tr height=40 bgcolor='#FCF5B6'>";

$cnt++;
		echo "<td>" . $row['AgencyId'] . "</td><td>" . $row['AgencyName'] . "</td><td> " . $row['MaterialId']. "</td><td> " . $row['MaterialName']. "</td><td> " . $row['OrderId']. "</td><td> " . $row['DateOfOrder']. "</td><td> " . $row['Quantity']. "</td><td> " . $row['Rate']. "</td><td> " . $row['Amount']. "</td><td> " . $row['Status']. "</td></tr>";
	}
	echo"<imput type='submit' value='submit'>";
	echo "</table></td></tr></table></center></body></html>";
	mysqli_close($con);
?>
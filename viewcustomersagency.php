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
	
	$sql="select * from Customer";

	$rs= mysqli_query($con,$sql);
	//echo "<html>

?>
<style>
.a
{
	color:red;
}
</style>

<marquee><table class='table table-striped table-hover' width="100%" class="tablemiddle" border="0">
<tr>
<td class='a' valign="top" style="font-size:24px">Welcome To Agency Page</td></tr>
</table></marquee>

<?php


echo "	<table  align='center' cellspacing='0' cellpadding='0' width='100%' border='0' class='table table-striped'>";
echo "			<tr><td>";
include('menutableagency.php');
echo "</td>";
			

echo "<td valign='top' align='center'>";
	echo "<h1 align=center><font face='TAHOMA' color=red>CUSTOMER LIST</font></h2>";
	
	echo "<table class='table table-striped table-hover' border=1 width=75% cellpadding='1' cellspacing='0'>";


	echo "<tr><th>CUSTOMER CODE</th><th>CUSTOMER NAME</th><th>CREATION DATE</th><th>STREET</th><th>ADDRESS</TH><TH>CITY</TH><TH>PINCODE</TH><TH>PHONE</TH><TH>MOBILE</TH><TH>EMAILID</TH>";
	$cnt=0;
	while($row = mysqli_fetch_assoc($rs))
	{
if($cnt%2==0)
	echo "<tr height=40>";
else
	echo "<tr height=40 bgcolor='#FCF5B6'>";

$cnt++;
		
		echo "<td>" . $row['CustomerCode'] . "</td><td> " . $row['CustomerName']. "</td><td> " . $row['DateOfCreation']. "</td><td> " . $row['Street'] . "</td><td> " . $row['Address'] . "</td><td> " . $row['City'] . "</td><td> " . $row['PinCode'] . "</td><td> " . $row['Phone'] . "</td><td> " . $row['Mobile'] . "</td><td> " . $row['EMailId'] . "</td></tr>";
	}
	
	echo "</table></td></tr></table></center></body></html>";
	mysqli_close($con);
?>
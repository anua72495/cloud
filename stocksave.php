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
	$stockid=$_REQUEST["txtstockid"];
	$stockdate=$_REQUEST["txtstockdate"];
	$vehicleid=$_REQUEST["cboMaterialId"];
	$qty=$_REQUEST["txtQty"];
	$rate=$_REQUEST["txtRate"];
	$amt=$qty*$rate;
	$desc=$_REQUEST["txtDesc"];
	$agencyid=$_SESSION['userid'];
	$qry="insert into stock values('" . $stockid . "','" . $stockdate . "','" . $agencyid . "'," . $qty. "," . $rate. ",'" . $amt . "','" . $desc . "','" . $qty . "','" .  $agencyid . "')";
	mysqli_query($con,$qry) or die(mysql_error());
	echo "Stock Details Saved Successfully";
?>
<table  border="0" width="100%">
<!--<tr>
<td><img src="images/header.jpg"/>
</td>
</tr>-->
</table>

<table class='table table-striped table-hover' width="100%">
<br><br><br><br><br><br><br><br><br><br>
<tr><td>
<?php
include('menutableagency.php')
?>
</td><td align="center">
	<h2>Stock Details Saved Successfully</h2>
	</td></tr></table>
</html>

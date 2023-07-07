<?php

session_start();
?>

<html>

	
	<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
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
</head>
<body>
<?php
include('menugeneraltop.php');
?>
<style>
.a
{
	color:red;
}
</style>

<?php
	$OldPass=$_POST["txtOldPass"];
	$NewPass=$_POST["txtNewPass"];
	
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$sql="SELECT Count(*) Records FROM Customer Where CustomerCode='" . $_SESSION['userid'] . "' and Password='"  . $OldPass ."'" ;
	
	$tot=mysqli_query($con,$sql); 

		$row = mysqli_fetch_assoc($tot);
	//	echo $row['Records'];
			if( $row['Records']==1)
	{
	
$sql="Update Customer Set Password='" . $NewPass . "' where CustomerCode='" . $_SESSION['userid'] . "'";
mysqli_query($con,$sql); 
		echo "<html><body><br><br><br><br><br>Password Updated.<br><input type=button value=Back onclick='javascript:history.back()'><br></body></html>";
		}
	else
		echo "<html><body>Invalid Old Password.<br><input type=button value=Back onclick='javascript:history.back()'><br></body></html>";
	
?>
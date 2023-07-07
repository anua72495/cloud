<?php
session_start();
	$User=$_POST["txtUser"];
	$Pass=$_POST["txtPass"];
	
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$sql="SELECT Count(*) Records FROM Agency Where  AgencyId=" . $User . " and Password='"  . $Pass ."'" ;
//	echo $sql;
	$tot=mysqli_query($con,$sql); 

		$row = mysqli_fetch_assoc($tot);
	//	echo $row['Records'];
			if( $row['Records']==1)
	{
	$_SESSION["dealerid"]=$User;
	$_SESSION["userid"]=$User;
	$_SESSION["agencyid"]=$User;
	$_SESSION["carownerid"]=$User;
$sql="SELECT agencyname From Agency Where AgencyId=" . $User . "";
$tot=mysqli_query($con,$sql); 
$row = mysqli_fetch_assoc($tot);
$_SESSION["agencyname"]=$row["agencyname"];
		header('location:addmaterial.php');
		}
	else
		echo "Invalid Agency Id/Password.<br><input type=button value=Back onclick='javascript:history.back()'><br>";
	
?>
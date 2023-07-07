<?php
session_start();
	$User=$_POST["txtUser"];
	$Pass=$_POST["txtPass"];
	
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysqli_error());
	}
	
	$sql="SELECT Count(*) As Records FROM admin Where UserName='" . $User . "' and Password='"  . $Pass ."'" ;

	$tot=mysqli_query($con,$sql); 

		$row = mysqli_fetch_assoc($tot);
		
		
	if( $row['Records']==1)
{
$_SESSION["usertype"]="admin";
		header('location:additem.php');
}
	else
		echo "Invalid UserName/Password.<br><input type=button value=back onclick='history.back()'><br>";
	
?>
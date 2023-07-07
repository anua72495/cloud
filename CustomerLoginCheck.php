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
	
	$sql="SELECT Count(*) As Records FROM Customer Where CustomerId='" . $User . "' and Password='"  . $Pass ."'" ;

	$tot=mysqli_query($con,$sql); 

		$row = mysqli_fetch_assoc($tot);
		
		
	if( $row['Records']==1)
{
$_SESSION["customerid"]=$User;
$_SESSION["username"]=$User;

$sql="SELECT EMailId FROM Customer Where CustomerId='" . $User . "' and Password='"  . $Pass ."'" ;

	$tot=mysqli_query($con,$sql); 
		$row = mysqli_fetch_assoc($tot);
		$_SESSION["emailid"]=$row['EMailId'];
if(isset(  $_SESSION['cart']))
		{
		  unset($_SESSION['cart']);
		}
$_SESSION["usertype"]="customer";
		header('location:getdateforsalescustomer.php');
}
	else
		echo "Invalid Customer Id/Password.<br><input type=button value=back onclick='history.back()'><br>";
	
?>
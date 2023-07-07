<?php
session_start();
	$User=$_POST["txtUser"];
	$Pass=$_POST["txtPass"];
	$type=$_POST["cboType"];
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$type=$_REQUEST['cboType'];
	if($type=="Admin")
	
	$sql="SELECT Count(*) Records FROM admin Where AdminUser='" . $User . "' and AdminPass='"  . $Pass ."'" ;

	
else  if($type=="Agency")

	$sql="SELECT Count(*) Records FROM Agency Where AgencyId='" . $User . "' and Password='"  . $Pass ."'" ;



	else if($type=="Customer")
	
	$sql="SELECT Count(*) Records FROM Customer Where CustomerCode='" . $User . "' and Password='"  . $Pass ."'" ;
	

	
	
	$tot=mysqli_query($con,$sql); 
	$row = mysqli_fetch_assoc($tot);	
	if( $row['Records']==1)
{

$_SESSION["userid"]=$User;

	if($type == "Admin")
{
	$_SESSION["usertype"]="admin";
	
	$sql="SELECT Count(*) Records FROM admin Where AdminUser='" . $User . "' and AdminPass='"  . $Pass ."'" ;
	$tot=mysqli_query($con,$sql); 
	$row = mysqli_fetch_assoc($tot);
	header('location:addagency.php');
}
else if($type =="Agency")
	{
			$_SESSION["usertype"]="agency";
	$_SESSION["userid"]=$User;
$sql="SELECT agencyname From Agency Where AgencyId=" . $User . "";
$tot=mysqli_query($con,$sql); 
$row = mysqli_fetch_assoc($tot);
$_SESSION["usertype"]="agency";
		header('location:addmaterial.php');
		}
	
else if($type =="Customer")
{
	
	$_SESSION["usertype"]="customer";
	$_SESSION["userid"]=$User;
$sql="SELECT CustomerName From Customer Where CustomerCode='" . $User . "'";
$tot=mysqli_query($con,$sql); 
$row = mysqli_fetch_assoc($tot);

		header('location:viewagenciescustomer.php');

	}
}
	else
	{
		
	 	echo "Invalid Login.<br><input type=button value=back
 onclick='history.back()'><br>";
	}	

	?>
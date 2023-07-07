<?php
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	?>
<html>
<head>
<?php
include('index.php');

?>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<table class='table table-striped table-hover' width="100%">
<tr><td>
<?php
include('menutableagency.php')
?>
</td><td align="center">
<?php
	$orderid=$_REQUEST["cboOrderId"];
		$status=$_REQUEST["cboStatus"];
		//echo $orderid;
	
	$sql="Select Quantity,StockId From Orders Where OrderId=" . $orderid ."";
	
	$tot=mysqli_query($con,$sql); 
	$row = mysqli_fetch_assoc($tot);
	$qty=$row['Quantity'];
	$StockId=$row['StockId'];
	
	/*$sql="Select SeatsAvailable From Trips Where TripId in (select TripId From Bookings Where BookingId=" . $bookingid .")";
	$total=mysqli_query($con,$sql); 
	$row2 = mysqli_fetch_assoc($total);
	$seatsavailable=$row2['SeatsAvailable'];
	if($seatsavailable>=$seatsbooked)
	{
	*/
	$qry="update Orders Set Status='" . $status . "' Where OrderId='" . $orderid . "'";
	mysqli_query($con,$qry) or die(mysql_error());
	
	if($status=="Approved")
	{
		$qry="Update Stock Set Available=Available-" . $qty . " Where StockId='" .  $StockId . "'";
		
		mysqli_query($con,$qry) or die(mysql_error());
		
	}
	echo "Order " . $status . " Saved Successfully";
	?>
	</td></tr></table>
</html>

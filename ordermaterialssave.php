<?php
session_start();
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	
	
echo "<html><head><link rel='stylesheet' href='style.css'> <script type='text/javascript' src='jquery/3.1.1/jquery.min.js'></script><script type='text/javascript' src='js/bootstrap.min.js'></script>";
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

<table class='table table-striped table-hover' width="100%">
<tr><td>

<?php
include('menutablecustomer.php')
?>
</td><td align="center">
<?php
	
	$orderid=$_REQUEST["txtorderid"];
	$dateOforder= $_REQUEST["txtDateOfOrder"];
	//$Materialid= $_REQUEST["cboMaterialId"];
	$CODE = $_REQUEST["cboMaterialId"] ;
	
$Materialid =  substr( $CODE,0,strpos($CODE,':',1)) ;
$pos = strpos($CODE,':',1);
$MaterialName =  substr($CODE,$pos+1,strpos($CODE,':',$pos+1) ) ;
$pos = strpos($CODE,':',$pos+1);
$StockId =  substr( $CODE,$pos+1,strpos($CODE,':',$pos+1) ) ;
$StockId =  substr( $StockId,0,strpos($StockId,':',1)) ;


//$pos =strlen(substr( $CODE,0,strpos($CODE,':',1))) ;
//$rate =  substr( $CODE,$pos+1) ;
$Agency = $_REQUEST["cboAgencyId"] ;
$AgencyId =  substr( $Agency,0,strpos($Agency,':',1)) ;


//$pos =strlen(substr( $CODE,0,strpos($CODE,':',1))) ;
//$rate =  substr( $CODE,$pos+1) ;


	$qty= $_REQUEST["txtQty"];
	$rate= $_REQUEST["txtRate"];
	$amount= $_REQUEST["txtAmt"];
	
	$qry="Select Count(*) as Records From Stock Where AgencyId='" . $AgencyId . "' and MaterialId='" . $Materialid . "' ";
	
	$tot=mysqli_query($con,$qry); 
	$row = mysqli_fetch_assoc($tot);
	if($row['Records']>0)
	{
		$qry="Select Available  From Stock Where AgencyId='" . $AgencyId . "' and MaterialId='" . $Materialid . "' and StockId='" . $StockId . "'";
		$tot=mysqli_query($con,$qry); 
	$row = mysqli_fetch_assoc($tot);
	$available=$row['Available'];
	if($available>=$qty)
	{
		$qry="insert into orders values('" . $orderid . "','" . $dateOforder . "','" . $_SESSION['userid'] . "','" . $AgencyId . "','" . $Materialid . "','" . $qty . "','" . $rate . "','" . $amount . "','Pending','" . $StockId . "')";
		
		mysqli_query($con,$qry) or die(mysql_error());
		
		
		
		echo "<h2>Order saved Successfully</h2>";	
	}
	else
	{
		echo "<h2>Only " . $available . " available.</h2>";
	}
	
	
		
	}
	else
	{
		echo "<h2>Material Not Available For That Agency.</h2>";
	}
	
?>


	</td></tr></table>
</html>

<?php
session_start();
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
?>
<html>
<head><link rel="stylesheet" href="css/bootstrap.min.css"><script src="css/jquery.min.js"></script>  <script src="css/bootstrap.min.js"></script><link rel="stylesheet" href="css/all.css"><!-- <link rel="stylesheet" type="text/css" href="styles.css" /> -->
<script language='javascript'>

function calc()
{
document.f1.txtAmount.value=document.f1.txtQty.value*document.f1.txtRate.value;
}
function showrate()
{
document.f1.txtRate.value=document.f1.cbItemCode.value.substring(	document.f1.cbItemCode.value.indexOf(':')+1);
}
</script>
</head>
<body>
<table  border="0" width="100%">
<tr>
<td><?php /*
if($_SESSION["usertype"]=="admin")
{
}
else
{
header('location:adminlogin.php');
return;
}*/
include('pagetop.php')?>
 
<?php include('menugeneraltop.php')?>
</td>
</tr>
</table>

<table class='table table-striped table-hover' width="100%">
<tr><td>
<?php include('menutable.php') ?>
</td>
<td align="center">
	<h2 align="center"><font face="TAHOMA" color="White ">Purchase</font></h2>
	
			<form name="f1" action="addPurchase.php" method="post">

	<?php 

echo "<div id='printdiv' width=800>";
	echo "<table class='table table-striped table-hover' align='center' width='800' bgcolor=cyan>";

if ($_REQUEST["txtQty"]=="")
{
}
else
{
	//echo $_REQUEST["txtQty"];
$CODE = $_REQUEST["cbItemCode"] ;

	$_SESSION["ItemCode"] .=  substr( $CODE,0,strpos($CODE,':',1)) . ":";
$pos =strlen(substr( $CODE,0,strpos($CODE,':',1))) ;
//echo $pos;
//echo substr( $CODE,$pos+1,strpos($CODE,'^',1)-$pos-1 ) . "<br/>"; 
$_SESSION["ItemName"] .=  substr( $CODE,$pos+1,strpos($CODE,'^',$pos)-$pos-1) . ":" ;

//echo "Rate:"  . substr( $CODE,strpos($CODE,'@',$pos)+1,) 
//echo "Amount:" . $_REQUEST["txtAmount"];
$arrowpos = strpos($CODE,'^',1);
$atpos = strpos($CODE,'@',1);
$_SESSION["itemqty"] .= $_REQUEST["txtQty"] . ":";
$rate = substr( $CODE,$arrowpos+1,$atpos-$arrowpos-1) ;
$_SESSION["itemrate"] .=  $rate . ":";
$amount= $_REQUEST["txtQty"] * $rate;
$_SESSION["itemamount"] .= $amount . ":";

$names = explode(":",	$_SESSION["ItemName"]);
$codes = explode(":",	$_SESSION["ItemCode"]);
$qtys = explode(":",	$_SESSION["itemqty"]);
$rates = explode(":",	$_SESSION["itemrate"]);
$amounts = explode(":",	$_SESSION["itemamount"]);

$idx=1;
echo "<tr><th>S.NO</th><th>ITEM CODE</th><th>ITEM NAME</th><th>QUANTITY</th><th>RATE</th><th>AMOUNT</th></tr>";
$TotalSum=0;
foreach($qtys as $item)
{
if ($item>0)
{

echo "<tr><td>" . $idx . "</td><td>" . $codes[$idx-1] . "</td><td>" . $names[$idx-1] . "</td><td align=center>" . $item . "</td><td align=center>" . $rates[$idx-1] . "</td><td align=right>" . $amounts[$idx-1] . "</td></tr>";
$TotalSum = $TotalSum +$amounts[$idx-1] ;
$idx++;
}
}
}
echo "<tr><td colspan=5 align=right>Total:</td><td align=right>" . $TotalSum . "</td></tr>";

echo "</table>";
echo "</div>";

	?>

<table class='table table-striped table-hover' align="center" width="800" bgcolor="#cccccc">
<tr><td>
			<table class='table table-striped table-hover' align="center" width="500">
				<tr>
					<td align="right">Date
					<td>
					<input name="Date" value='<?php echo date('Y-m-d');?>'>
					</tr>
					<tr>
					<td align="right">Supplier Id
					<td>
					<select name="cboSupplierId">
					<?php
							$sql="SELECT Supplierid FROM supplier";
		
							$tot=mysqli_query($con,$sql); 
							
							while($row = mysqli_fetch_assoc($tot) )
							{
								
									echo "<option>" . $row['Supplierid'] . "</option>";
									
							}
						?>
</select>
		</td>			
					
					</tr>
					<tr>
					<td align="right">Item Code
					<td>
					<select name="cbItemCode" onchange="showrate()">
					<?php
							$sql="SELECT distinct ItemCode Item ,ItemName,PurchaseRate FROM RawMaterial";
							$tot=mysqli_query($con,$sql); 
							$cnt=0;
							while($row = mysqli_fetch_assoc($tot) )
							{
								
									echo "<option>" . $row['Item'] .  ":" . $row['ItemName'] . "^" . $row['PurchaseRate'] . "@" . "</option>";
							if($cnt==0)
								$cnt		=$row['PurchaseRate'];
							}
						?>
</select><input type="button" value="Rate" onclick="showrate()">
</td>
				</tr>

				<tr>
					<td align="right">Quantity
					<td><input name="txtQty" onblur="calc()">
				</tr>
				<tr>
					<td align="right">Rate
					<td><input name="txtRate" disabled="true" value=<?php echo $cnt;?>></td>
				</tr>
				<tr>
					<td align="right">Amount
					<td><input name="txtAmount" disabled="true" value="0"></td>
				</tr>
				
				<tr>
					<td align="center" colspan=2>
					<input type="button" value="Calculate" onclick="calc()">
					<input type="submit" value="Add">
					<input type="reset" value="Clear"></td>

				</tr>

			</table>
</td>

<td>
		</form>
		</td></tr></table>
	</body>
</html>
				
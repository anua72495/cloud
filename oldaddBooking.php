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

function check()
{

//alert(document.f1.txtccno.value);
/*var s=new String(document.f1.txtccno.value);
if (s=="")
{
alert('a');
return;
}
if(document.f1.txtccno.value=="")
{
alert('Please Enter Valid Credit Card No.);
document1.f1.txtccno.focus();
return;
}*/
/*alert(document.f1.txtccno.value);
if(document.f1.txtccno.value!=16)
{
alert('Please Enter Valid Credit Card No.);
document1.f1.txtccno.focus();
return;
}

*/
/*
if(document.f1.txtvalidfrom.value=="")
{
alert('Please Enter Valid From Data');
document1.f1.txtvalidfrom.focus();
return;
}
if(document.f1.txtvalidto.value=="")
{
alert('Please Enter Valid To Data');
document1.f1.txtvalidto.focus();
return;
}
if(document.f1.txtaddress.value=="")
{
alert('Please Enter Valid Address');
document1.f1.txtaddress.focus();
return;
}
*/
document.f1.submit();
}
function IsNumeric(sText)

{
   var ValidChars = "0123456789.";
   var IsNumber=true;
   var Char;

 
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      }
   return IsNumber;
   
   }

function calc()
{
if(IsNumeric(document.f1.txtQty.value)==false)
{
alert('Please Check Quantity');
document.f1.txtQty.focus();
return;
}
document.f1.txtAmount.value=document.f1.txtQty.value*document.f1.txtRate.value;
}
function calc2()
{
if(IsNumeric(document.f1.txtTax.value)==false)
{
alert('Please Check Tax %');
document.f1.txtTax.focus();
return;
}
document.f1.txtTaxAmount.value=document.f1.txtAmount.value * (document.f1.txtTax.value)/100;
document.f1.txtNetAmount.value=parseInt(document.f1.txtAmount.value)+parseInt(document.f1.txtTaxAmount.value);
}

function showrate()
{
var selObj = document.getElementById("cbItemCode");//.options[document.getElementById("cbItemCode").selectedIndex].value;
//document.f1.txtRate.value=selObj;
alert(selObj.selectedIndex);
    val = selObj.options[selObj.selectedIndex].value;
alert(val);
document.f1.txtRate.value=val.substring(document.f1.cbItemCode.value.indexOf('^')	+1);

//alert(document.f1.txtRate.value.length);
//document.f1.txtRate.value=document.f1.txtRate.value.substring(0,document.f1.txtRate.value.length()-1);
}
</script>
</head>
<body>
	<form name="f1" action="addBooking.php" method="post">
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
<td align="center" valign='top'>
	<h2 align='center'><font face='TAHOMA' color='BLACK'>Purchase Details</font></h2>

		

	<?php 

if(isset($_GET["type"]) && $_GET["type"]=="new")
{
unset($_SESSION["ItemCode"]);
unset($_SESSION["itemqty"]);
unset($_SESSION["ItemName"]);
unset($_SESSION["itemrate"]);
unset($_SESSION["itemamount"]);
unset($_SESSION["itemtax"]);
unset($_SESSION["itemtaxamount"]);
unset($_SESSION["itemnetamount"]);
unset($_SESSION["paymentmade"]);
}
else
{

if(true)//$_REQUEST["txtccno"]!="")
{
/*
if (isset($_SESSION["paymentmade"]))
{
echo "<h2>Payment Already Made.</h2>";
unset($_SESSION["ItemCode"]);
unset($_SESSION["itemqty"]);
unset($_SESSION["ItemName"]);
unset($_SESSION["itemrate"]);
unset($_SESSION["itemamount"]);

return;
}*/


$sql="Select Count(*) as Records From PurchaseMaster";
							$res=mysqli_query($con,$sql) or die(mysql_error());
								$row = mysqli_fetch_assoc($res);
							
		
				$RecNo=($row['Records']+1);
if(isset($_SESSION["TOTALBILLSUM"]))
{
}
else
{
$_SESSION["TOTALBILLSUM"]=0;
}
$qry="insert into PurchaseMaster(BillNo,BillDate,SupplierId,NetAmount) values(" . $RecNo . ",'" . date('Y-m-d') . "','-'," . $_SESSION["TOTALBILLSUM"] . ")";
//echo $qry;

//return;
//555	mysqli_query($con,$qry) or die(mysql_error());


//if(isset($_SESSION["ItemName"]))
//echo "Item Name:"  . $_SESSION["ItemName"];
	$names = explode(":",	$_SESSION["ItemName"]);
$codes = explode(":",	$_SESSION["ItemCode"]);
$qtys = explode(":",	$_SESSION["itemqty"]);
$rates = explode(":",	$_SESSION["itemrate"]);
$amounts = explode(":",	$_SESSION["itemamount"]);
$taxs = explode(":",	$_SESSION["itemtax"]);
$taxamounts = explode(":",	$_SESSION["itemtaxamount"]);
$netamounts = explode(":",	$_SESSION["itemnetamount"]);
$SNo=0;
	foreach($qtys as $item)
	{
		if ($item>0)
		{
		$SNo =$SNo + 1;
		$qry="insert into PurchaseTrans values(" . $RecNo . "," . $SNo . ",'" . $codes[$SNo-1] . "'," . $item . "," . $rates[$SNo-1] . "," . $amounts[$SNo-1] . "," . $taxs[$SNo-1] . "," . $taxamounts[$SNo-1] . "," . $netamounts[$SNo-1] .")";
	//555	mysqli_query($con,$qry) or die(mysql_error());

//----------------------------------------------
//$sql="Select Count(*) as Records From Stock";
	//						$res=mysqli_query($con,$sql) or die(mysql_error());
		//					$row = mysqli_fetch_assoc($res);
							
		
			//	$StockRecNo=($row['Records']+1);
//$qry="Update Stock Set Qty=Qty-" . $item . ",Amount=Amount-" . $amounts[$SNo-1] . ",UpdateDate='" . date('Y-m-d') . "' Where ItemCode='" . $codes[$SNo-1] . "' and Rate=" . $rates[$SNo-1]  . "";
	//mysqli_query($con,$qry) or die(mysql_error());

	//$qry="Insert into Stock Values(" . $StockRecNo . ",'" . date('Y-m-d') .  "','" . $codes[$SNo-1]  . "','Less'," . $item . "," . $rates[$SNo-1] . "," . $amounts[$SNo-1] . ")";
//			mysqli_query($con,$qry) or die(mysql_error());


		}	
	}	
echo "<h2><font color='White'>Purchase Details Saved.</font></h2>";
$_SESSION["paymentmade"]=1;
//unset($_SESSION["ItemCode"]);
//unset($_SESSION["itemqty"]);
//unset($_SESSION["ItemName"]);
//unset($_SESSION["itemrate"]);
//unset($_SESSION["itemamount"]);

}
echo "<div id='printdiv' width=800>";
	echo "<table class='table table-striped table-hover' align='center' width='800' bgcolor=cyan>";
if ($_REQUEST["txtQty"]=="")
{
}
else
{
//	echo $_REQUEST["txtQty"];
$CODE = $_REQUEST["cbItemCode"] ;
//echo $CODE;
	$_SESSION["ItemCode"] .=  substr( $CODE,0,strpos($CODE,':',1)) . ":";
//echo $_SESSION["ItemCode"] ;
$pos =strlen(substr( $CODE,0,strpos($CODE,':',1))) ;
//echo $pos;
//echo substr( $CODE,$pos+1,strpos($CODE,'^',1)-$pos-1 ) . "<br/>"; 
$_SESSION["ItemName"] .=  substr( $CODE,$pos+1,strpos($CODE,'^',$pos)-$pos-1) . ":" ;
//echo $_SESSION["ItemName"];
//echo "Rate:"  . substr( $CODE,strpos($CODE,'@',$pos)+1,) 
//echo "Amount:" . $_REQUEST["txtAmount"];
$arrowpos = strpos($CODE,'^',1);
$atpos = strpos($CODE,'@',1);
$_SESSION["itemqty"] .= $_REQUEST["txtQty"] . ":";
$rate = substr( $CODE,$arrowpos+1,strlen($CODE));//$arrowpos) ;
$_SESSION["itemrate"] .=  $rate . ":";
$amount= $_POST["txtQty"] * $rate;
$tax=$_POST["txtTax"] ;
$taxamount=$_POST["txtTaxAmount"] ;
$netamount=$_POST["txtNetAmount"] ;
$_SESSION["itemamount"] .= $amount . ":";
$_SESSION["itemtax"] .= $tax . ":";
$_SESSION["itemtaxamount"] .= $taxamount . ":";
$_SESSION["itemnetamount"] .= $netamount . ":";


$names = explode(":",	$_SESSION["ItemName"]);
$codes = explode(":",	$_SESSION["ItemCode"]);
$qtys = explode(":",	$_SESSION["itemqty"]);
$rates = explode(":",	$_SESSION["itemrate"]);
$amounts = explode(":",	$_SESSION["itemamount"]);
$taxs = explode(":",	$_SESSION["itemtax"]);
$taxamounts = explode(":",	$_SESSION["itemtaxamount"]);
$netamounts = explode(":",	$_SESSION["itemnetamount"]);

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
if ($TotalSum>0)
{
echo "<tr><td colspan=5 align=right>Total:</td><td align=right>" . $TotalSum . "</td></tr>";
}
$_SESSION["TOTALBILLSUM"]=$TotalSum;
echo  $_SESSION["TOTALBILLSUM"];
echo "</table>";
echo "</div>";
}
	?>
<table class='table table-striped table-hover' align="center" width="800" bgcolor="lightcyan" border=1>
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
					<input name="Supplierid" value='1'>
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
								
									echo "<option value='" . $row['Item'] .  ":" . $row['ItemName'] . "^" . $row['PurchaseRate'] .  "'>" . $row['Item'] .  ":" . $row['ItemName'] . "^" . $row['PurchaseRate'] . "@" . "</option>";
							if($cnt==0)
								$cnt		=$row['PurchaseRate'];
							}
						?>
</select>
</td>
				</tr>

				<tr>
					<td align="right">Qty
					<td><input name="txtQty" onblur="calc()">
				</tr>
				<tr>
					<td align="right">Rate
					<td><input name="txtRate" value=<?php echo $cnt;?>></td>
				</tr>
				<tr>
					<td align="right">Amount
					<td><input name="txtAmount" value="0"></td>
				</tr>
					<tr>
					<td align="right">Tax %
					<td><input name="txtTax" onblur="calc2()">
				</tr>
				<tr>
					<td align="right">Tax Amount
					<td><input name="txtTaxAmount" value=''></td>
				</tr>
				<tr>
					<td align="right">Net Amount
					<td><input name="txtNetAmount" value="0"></td>
				</tr>
				<tr>
					<td align="center" colspan=2>
					<input type="button" value="Calculate" onclick="calc()">
					<input type="submit" value="Add in Bill">
					<input type="reset" value="Clear"></td>

				</tr></table>
</td>
</tr>
</table>
					</form>
		</td></tr></table>
	</body>
</html>
				
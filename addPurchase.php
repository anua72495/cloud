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
function setfocustocombo()
{
document.cboSupplierId.focus();
}
function check()
{
if(document.f1.txtQty.value=="")
{
alert('Please Enter Qty');
document1.f1.txtQty.focus();
return;
}

if(document.f1.txtRate.value=="")
{
alert('Please Enter Rate');
document1.f1.txtRate.focus();
return;
}

if(document.f1.txtAmount.value=="")
{
alert('Please Enter Amount');
document1.f1.txtAmount.focus();
return;
}

if(document.f1.txtTax.value=="")
{
alert('Please Enter Tax');
document1.f1.txtTax.focus();
return;
}

if(document.f1.txtTaxAmount.value=="")
{
alert('Please Enter Tax Amount');
document1.f1.txtTaxAmount.focus();
return;
}

if(document.f1.txtNetAmount.value=="")
{
alert('Please Enter Net Amount');
document1.f1.txtNetAmount.focus();
return;
}

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
	
var selObj = document.f1.cbItemCode;//.options[document.getElementById("cbItemCode").selectedIndex].value;

//document.f1.txtRate.value=selObj;

    val = selObj.options[selObj.selectedIndex].value;

document.f1.txtRate.value=val.substring(document.f1.cbItemCode.value.indexOf('^')	+1);

//alert(document.f1.txtRate.value.length);
//document.f1.txtRate.value=document.f1.txtRate.value.substring(0,document.f1.txtRate.value.length()-1);
}

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
</head>
<body onload="setfocustocombo()">
	<form name="f1" id="f1" action="addPurchase.php" method="post">
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
	<h2 align='center'><font face='TAHOMA' color='BLACK'>ITEMS PURCHASE DETAILS</font></h2>

		

	<?php 

if(isset($_GET["type"]) && $_GET["type"]=="new")
{
unset($_SESSION["BillNo"]);



$sql="Select Count(*) as Records From PurchaseMaster";
							$res=mysqli_query($con,$sql) or die(mysql_error());
								$row = mysqli_fetch_assoc($res);
							
		
				$RecNo=($row['Records']+1);
}
else
{

if(true)//$_REQUEST["txtccno"]!="")
{

if(isset($_SESSION["TOTALBILLSUM"]))
{
}
else
{
$_SESSION["TOTALBILLSUM"]=0;
}
$supplierid= $_REQUEST["cboSupplierId"];
if(isset($_SESSION["BillNo"]))
{
	$RecNo=$_SESSION["BillNo"];
}
else
{

$sql="Select Count(*) as Records From PurchaseMaster";
							$res=mysqli_query($con,$sql) or die(mysql_error());
								$row = mysqli_fetch_assoc($res);
							
		
				$RecNo=($row['Records']+1);
				
				
$qry="insert into PurchaseMaster(BillNo,BillDate,SupplierId,NetAmount) values(" . $RecNo . ",'" . date('Y-m-d') . "','" . $supplierid . "'," . "0" . ")";
mysqli_query($con,$qry) or die(mysql_error());
}

$_SESSION["BillNo"] = $RecNo;
$CODE = $_REQUEST["cbItemCode"] ;
$ItemCode =  substr( $CODE,0,strpos($CODE,':',1)) ;

$pos =strlen(substr( $CODE,0,strpos($CODE,':',1))) ;
$ItemName =  substr( $CODE,$pos+1,strpos($CODE,'^',$pos)-$pos-1) ;
//echo $ItemName;
$arrowpos = strpos($CODE,'^',1);
$atpos = strpos($CODE,'@',1);
$itemqty = $_REQUEST["txtQty"];
$itemrate = substr( $CODE,$arrowpos+1,strlen($CODE));//$arrowpos) ;
//$itemrate .=  $rate . ":";
$amount= $itemqty* $itemrate;
$tax=$_POST["txtTax"] ;
$taxamount=$_POST["txtTaxAmount"] ;
$netamount=$_POST["txtNetAmount"] ;
$SNo=0;
$sql="Select count(*) Records From PurchaseTrans Where BillNo=" . $RecNo;
$res=mysqli_query($con,$sql) or die(mysql_error());
				$row = mysqli_fetch_assoc($res);
				$SNo=($row['Records']+1);
$qry="insert into PurchaseTrans values(" . $RecNo . "," . $SNo . ",'" . $ItemCode . "'," . $itemqty . "," . $itemrate . "," . $amount . "," . $tax . "," . $taxamount . "," . $netamount .")";
//echo $qry;

mysqli_query($con,$qry) or die(mysql_error());

$qry2="update items set qty=qty+" . $itemqty . " Where ItemCode='" . $ItemCode . "'";
mysqli_query($con,$qry2) or die(mysql_error());

	}	
echo "<h2><font color='White'>Purchase Details Saved.</font></h2>";

$sql="Select Sum(NetTotal) Records From  PurchaseTrans Where BillNo=" . $RecNo ;

//echo $qry;

	$res=mysqli_query($con,$sql) or die(mysql_error());
	$row = mysqli_fetch_assoc($res);
	$BillAmount=($row['Records']);
$sql="Update PurchaseMaster Set NetAmount=" . $BillAmount . " Where BillNo=" . $RecNo ;
	$res=mysqli_query($con,$sql) or die(mysql_error());
$_SESSION["paymentmade"]=1;
}

if (false)//!isset($_SESSION("BillNo")))
{

}
else
{
if(isset($_SESSION["BillNo"]))
{
echo "<div id='printdiv' width=800>";
	echo "<table class='table table-striped table-hover' align='center' width='800' bgcolor=cyan>";

echo "<tr><th>S.NO</th><th>ITEM CODE</th><th>ITEM NAME</th><th>QUANTITY</th><th>RATE</th><th>AMOUNT</th><th>TAX %</th><th>TAX VALUE</th><th>NET TOTAL</th></tr>";
$sql="Select SNo,A.ItemCode,ItemName,Quantity,Rate,Amount,Tax,TaxValue,NetTotal From items A,PurchaseTrans B where A.ItemCode=B.ItemCode and B.BillNo=" . $RecNo;
$res=mysqli_query($con,$sql) or die(mysql_error());
while($row = mysqli_fetch_assoc($res))
{
echo "<tr><td align=right>" . $row["SNo"] . "</td><td>" . $row["ItemCode"] . "</td><td>" . $row["ItemName"] . "</td><td align=right>" . $row["Quantity"] . "</td><td align=right>" . $row["Rate"] . "</td><td align=right>" . $row["Amount"] . "</td><td align=right>" . $row["Tax"] . "</td><td align=right>" . $row["TaxValue"] . "</td><td align=right>" . $row["NetTotal"] . "</td></tr>" ;
}

$sql="Select Sum(NetTotal) NetAmount From PurchaseTrans Where BillNo=" . $RecNo;
$res=mysqli_query($con,$sql) or die(mysql_error());
while($row = mysqli_fetch_assoc($res))
{
echo "<tr><td colspan='10' align=right>" . $row["NetAmount"] . "</td></tr>" ;
}

echo "</table>";
}
echo "</div>";

}
	?>
<table class='table table-striped table-hover' align="center" width="800" bgcolor="lightcyan" border=1>
<tr><td>


			<table class='table table-striped table-hover' align="center" width="500">
			<tr>
					<td align="right">Bill No.
					<td>
					<input name="txtBillNo" disabled="true" style="text-align:right;background-color:#ffffff;color:black;font-size:14px;width:50px" value='<?php echo $RecNo;?>'>
					</tr>
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
					</tr>
					<tr>
					<td align="right">Item Code
					<td>
					<select name="cbItemCode" onchange="showrate()">
					<?php
							$sql="SELECT distinct ItemCode Item ,ItemName,PurchaseRate FROM Items";
		
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
					<td><input name="txtQty" id="txtQty"  style="text-align:right;" onblur="calc()" onkeypress="return isNumberKey(event)"/></td></tr>
				
				<tr>
					<td align="right">Rate
					<td><input name="txtRate" id="txtRate"  style="text-align:right;background-color:#AAAAAA;color:white" onkeypress="javascript:return false;" value=<?php echo $cnt;?> onkeypress="return isNumberKey(event)"/></td></tr>
				
				<tr>
					<td align="right">Amount
					<td><input name="txtAmount" id="txtAmount" style="text-align:right;background-color:#AAAAAA;color:white" onkeypress="javascript:return false;" value="0" onkeypress="return isNumberKey(event)"/></td></tr>
				
					<tr>
					<td align="right">Tax %
					<td><input name="txtTax" style="text-align:right;" onblur="calc2()" onkeypress="return isNumberKey(event)"/></td></tr>
				
				<tr>
					<td align="right">Tax Amount
					<td><input name="txtTaxAmount"  style="text-align:right;background-color:#AAAAAA;color:white" onkeypress="javascript:return false;" value='' onkeypress="return isNumberKey(event)"/></td></tr>
				
				<tr>
					<td align="right">Net Amount
					<td><input name="txtNetAmount"  style="text-align:right;background-color:#AAAAAA;color:white" onkeypress="javascript:return false;" value="0" onkeypress="return isNumberKey(event)"/></td></tr>
				
				<tr>
					<td align="center" colspan=2>
					<input type="button" value="Calculate" onclick="calc()">
					<input type="button" value="Add in Bill" onclick="check()"/>
					<input type="reset" value="Clear"></td>

				</tr></table>
</td>
</tr>
</table>
					</form>
		</td></tr></table>
	</body>
</html>
				
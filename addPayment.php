<?php
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"sports");
if (!$con)
	{
die("Could not connect: " . mysql_error());
}
?>
<html><head><title>Add Payment Page</title><link rel="stylesheet" href="css/bootstrap.min.css"><script src="css/jquery.min.js"></script>  <script src="css/bootstrap.min.js"></script><link rel="stylesheet" href="css/all.css"><!-- <link rel="stylesheet" type="text/css" href="styles.css" /> -->
<script language="javascript">
function check()
{
if (document.form1.txtPaymentNo.value=="")
{
alert("Please Enter PaymentNo");
document1.form1.txtPaymentNo.focus();
return;
}
if (document.form1.txtPaymentDate.value=="")
{
alert("Please Enter PaymentDate");
document1.form1.txtPaymentDate.focus();
return;
}/*
if (document.form1.cboSupplierId.value=="")
{
alert("Please Enter SupplierId");
document.form1.cboSupplierId.focus();
return;
}*/
if (document.form1.txtAmount.value=="")
{
alert("Please Enter Amount");
document1.form1.txtAmount.focus();
return;
}/*
if (document.form1.cboPaymentMode.value=="")
{
alert("Please Enter PaymentMode");
document.form1.cboPaymentMode.focus();
return;
}*/
if (document.form1.txtDetails.value=="")
{
alert("Please Enter Details");
document.form1.txtDetails.focus();
return;
}
document.form1.submit();
}

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
</head><body>
<form  id="form1" name="form1" method="post" action="savePayment.php">
<table  width="100%" border="0"><tr><td><?php include("pagetop.php")?>
<?php include('menugeneraltop.php')?></td><td></tr>
<tr><td valign="top"><?php include("menutable.php")?></td><td  valign="top">
<table class='table table-striped table-hover' class="tbl" border="0" width="800" height="400">
<tr><td colspan=2><H1>PAYMENT DETAILS</H1></td></tr>
		<tr>
					<td align="right">Payment No.
<?php
							$sql="SELECT Count(*) SNo From Payment";
		
							$tot=mysqli_query($con,$sql); 
							
$SNo=0;
							while($row = mysqli_fetch_assoc($tot) )
							{
								
									$SNo= $row['SNo'] +1;
							}
					echo "<td><input name='txtPaymentNo' value=" . $SNo . ">"

						?>

				</tr>
<tr><td align="right"><span class="mylabel">Payment Date</span></td><td align="left">
<input type="text" name="txtPaymentDate" value=<?php echo date('Y-m-d');?>></td></tr>
<tr><td align="right"><span class="mylabel">Supplier Id</span></td><td align="left">
<select name="cboSupplierId">
					<?php
							$sql="SELECT Supplierid FROM supplier";
		
							$tot=mysqli_query($con,$sql); 
							
							while($row = mysqli_fetch_assoc($tot) )
							{
								
									echo "<option>" . $row['Supplierid'] . "</option>";
									
							}
						?>
</select></td></tr>
<tr><td align="right"><span class="mylabel">Amount</span></td><td align="left"><input type="text" value="" name="txtAmount" onkeypress="return isNumberKey(event)"/></td></tr>

<tr><td align="right"><span class="mylabel">Payment Mode</span></td><td align="left">
<select name="cboPaymentMode">
<option>Cash</option>
<option>Cheque</option>
</select>

</td></tr>
<tr><td align="right"><span class="mylabel">Details</span></td><td align="left"><textarea rows="5" cols="20" name="txtDetails"></textarea></td></tr>
<tr><td colspan="2" align="center"><input type="button" value="Save" onclick="check()"/></td></tr>
<tr><td colspan=2>
<?php
echo "<table class='table table-striped table-hover' width='100%'>";
echo "<tr><th>PAYMENT NO</th><th>PAYMENT DATE</th><th>SUPPLIER ID</th><th>SUPPLIER NAME</th><th>AMOUNT</th><th>PAYMENT MODE</th><th>DETAILS</th></tr>";
$sql="Select PaymentNo,PaymentDate,A.Supplierid,A.SupplierName,Amount,PaymentMode,Details From Supplier A,Payment B where A.SupplierId=B.SupplierId";
$res=mysqli_query($con,$sql) or die(mysql_error());
while($row = mysqli_fetch_assoc($res))
{
echo "<tr><td align=right>" . $row["PaymentNo"] . "</td><td>" . $row["PaymentDate"] . "</td><td>" . $row["Supplierid"] . "</td><td>" . $row["SupplierName"] . "</td><td align=right>" . $row["Amount"] . "</td><td align=left>" . $row["PaymentMode"] . "</td><td align=left>" . $row["Details"] . "</td></tr>" ;
}

$sql="Select Sum(Amount) NetAmount From Payment";
$res=mysqli_query($con,$sql) or die(mysql_error());
while($row = mysqli_fetch_assoc($res))
{
echo "<tr><td colspan='5' align=right>" . $row["NetAmount"] . "</td><td></td><td></td></tr>" ;
}

echo "</table></td></tr></table>";
echo "</td></tr></table>";
?>
</form></body></html>


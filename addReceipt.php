<?php
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"sports");
if (!$con)
	{
die("Could not connect: " . mysql_error());
}
?>
<html><head><title>Add Receipt Page</title><link rel="stylesheet" href="css/bootstrap.min.css"><script src="css/jquery.min.js"></script>  <script src="css/bootstrap.min.js"></script><link rel="stylesheet" href="css/all.css"><!-- <link rel="stylesheet" type="text/css" href="styles.css" /> -->
<script language="javascript">
function check()
{
if (document.form1.txtReceiptNo.value=="")
{
alert("Please Enter ReceiptNo");
document1.form1.txtReceiptNo.focus();
return;
}
if (document.form1.txtReceiptDate.value=="")
{
alert("Please Enter ReceiptDate");
document1.form1.txtReceiptDate.focus();
return;
}/*
if (document.form1.cboCustomerId.value=="")
{
alert("Please Enter CustomerId");
document.form1.cboCustomerId.focus();
return;
}*/
if (document.form1.txtAmount.value=="")
{
alert("Please Enter Amount");
document1.form1.txtAmount.focus();
return;
}/*
if (document.form1.cboReceiptMode.value=="")
{
alert("Please Enter ReceiptMode");
document.form1.cboReceiptMode.focus();
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
<form id="form1"  name="form1" method="post" action="saveReceipt.php">
<table  width="100%" border="0"><tr><td><?php include("pagetop.php")?>
<?php include('menugeneraltop.php')?></td><td></tr>
<tr><td valign="top"><?php include("menutable.php")?></td><td  valign="top">
<table class='table table-striped table-hover' class="tbl" border="0" width="50%" height="400">
<tr><td colspan=2><H1>RECEIPT DETAILS</H1></td></tr>
		<tr>
					<td align="right">Receipt No.
<?php
							$sql="SELECT Count(*) SNo From Receipt";
		
							$tot=mysqli_query($con,$sql); 
							
$SNo=0;
							while($row = mysqli_fetch_assoc($tot) )
							{
								
									$SNo= $row['SNo'] +1;
							}
					echo "<td><input name='txtReceiptNo' value=" . $SNo . ">"

						?>

				</tr>
<tr><td align="right"><span class="mylabel">Receipt Date</span></td><td align="left">
<input type="text" name="txtReceiptDate" value=<?php echo date('Y-m-d');?>></td></tr>
<tr><td align="right"><span class="mylabel">Customer Id</span></td><td align="left">
<select name="cboCustomerId">
					<?php
							$sql="SELECT Customerid FROM Customer";
		
							$tot=mysqli_query($con,$sql); 
							
							while($row = mysqli_fetch_assoc($tot) )
							{
								
									echo "<option>" . $row['Customerid'] . "</option>";
									
							}
						?>
</select></td></tr>
<tr><td align="right"><span class="mylabel">Amount</span></td><td align="left"><input type="text" value="" name="txtAmount" onkeypress="return isNumberKey(event)"/></td></tr>

<tr><td align="right"><span class="mylabel">Receipt Mode</span></td><td align="left">
<select name="cboReceiptMode">
<option>Cash</option>
<option>Cheque</option>
</select>

</td></tr>
<tr><td align="right"><span class="mylabel">Details</span></td><td align="left"><textarea rows="5" cols="20" name="txtDetails"></textarea></td></tr>
<tr><td colspan="2" align="center"><input type="button" value="Save" onclick="check()"/></td></tr>
<tr><td colspan=2>
<?php
echo "<table class='table table-striped table-hover' width='100%'>";
echo "<TR><TH>RECEIPT NO.</TH><TH>RECEIPT DATE</TH><TH>CUSTOMER ID</TH><TH>CUSTOMER NAME</TH><TH>AMOUNT</TH><TH>RECEIPT MODE</TH><TH>DETAILS</TH></TR>";
$sql="Select ReceiptNo,ReceiptDate,A.Customerid,A.CustomerName,Amount,ReceiptMode,Details From Customer A,Receipt B where A.CustomerId=B.CustomerId";
$res=mysqli_query($con,$sql) or die(mysql_error());
while($row = mysqli_fetch_assoc($res))
{
echo "<tr><td align=right>" . $row["ReceiptNo"] . "</td><td>" . $row["ReceiptDate"] . "</td><td>" . $row["Customerid"] . "</td><td>" . $row["CustomerName"] . "</td><td align=right>" . $row["Amount"] . "</td><td align=left>" . $row["ReceiptMode"] . "</td><td align=left>" . $row["Details"] . "</td></tr>" ;
}

$sql="Select Sum(Amount) NetAmount From Receipt";
$res=mysqli_query($con,$sql) or die(mysql_error());
while($row = mysqli_fetch_assoc($res))
{
echo "<tr><td colspan='5' align=right>" . $row["NetAmount"] . "</td><td></td><td></td></tr>" ;
}

echo "</table></td></tr></table>";
echo "</td></tr></table>";
?>
</form></body></html>
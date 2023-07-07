<?php
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
?>
<html>
<head><link rel="stylesheet" href="css/bootstrap.min.css"><script src="css/jquery.min.js"></script>  <script src="css/bootstrap.min.js"></script><link rel="stylesheet" href="css/all.css"><!-- <link rel="stylesheet" type="text/css" href="styles.css" /> -->
<script languge="javascript">
function check()
{
	if(document.f1.Suppliername.value=="")
	{
		document.f1.Suppliername.focus();
		return;
	}
	if(document.f1.street.value=="")
	{
		document.f1.street.focus();
		return;
	}
	if(document.f1.txtAddress.value=="")
	{
		document.f1.txtAddress.focus();
		return;
	}
	if(document.f1.txtCity.value=="")
	{
		document.f1.txtCity.focus();
		return;
	}
	if(document.f1.txtPin.value=="")
	{
		document.f1.txtPin.focus();
		return;
	}
	if(document.f1.txtPhone.value=="")
	{
		document.f1.txtPhone.focus();
		return;
	}
	if(document.f1.txtMobile.value=="")
	{
		document.f1.txtMobile.focus();
		return;
	}
	if(document.f1.txtMail.value=="")
	{
		document.f1.txtMail.focus();
		return;
	}
	
if(document.f1.txtPin.value.length!=6)
{
alert('Pincode Length 6 characters');
document.f1.txtPin.focus();
return;
}
	if(ValidateEmail(document.f1.txtMail.value)==false)
{
alert('Please Check EMail');
document.f1.txtMail.focus();
return;
}

if (validatenumber()==false)
{
return;
}
document.f1.submit();
}

function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
  {
    return (true)
  }
    alert("You have entered an invalid email address!")
    return (false)
}
function validatenumber()
{
if(IsNumeric(document.f1.txtPhone.value)==false)
{
alert('Please Check Phone No.');
document.f1.txtPhone.focus();
return false;
}
if(IsNumeric(document.f1.txtPin.value)==false)
{
alert('Please Check Pincode');
document.f1.txtPin.focus();
return false;
}
return true;
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


function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
</head>
<body>
<table  border="0" width="100%">
<tr>
<td><?php include('pagetop.php')?>
<?php include('menugeneraltop.php')?>
</td>
</tr>
</table>

<table class='table table-striped table-hover' width="100%">
<tr><td>

</td><td align="center" valign="top">
	<h1 align="center"><font face="TAHOMA" >SUPPLIER DETAILS</font></h1>
	
			<form name="f1" id="f1"  action="saveSupplier.php" method="post">
			<table class='table table-striped table-hover' align="center" width="500">
				<tr>
					<td align="right">Supplier Id


					<td><?php
						
							$sql="select count(*) as Records from Supplier" ;
							$res=mysqli_query($con,$sql) or die(mysql_error());
								$row = mysqli_fetch_assoc($res);
							
								$RecNo=($row['Records']+1);
							
					?>

<input name="suppId" value='<?php echo $RecNo ?>'>

				</tr>
				<tr>
					<td align="right">Name of Company
					<td><input name="Suppliername">
				</tr>
				<tr>
					<td 
align="right">Land Mark-Street Name
					<td><input name="street">
				</tr>
				
				<tr>
					<td align="right">Address
					<td><textarea name="txtAddress" value=''></textarea>
				</tr>
				<tr>
					<td align="right">City
					<td><input name="txtCity">
				</tr><tr>
					<td align="right">PinCode
					<td><input name="txtPin"  onblur="validatenumber()" onkeypress="return isNumberKey(event)"/></td></tr>
					
				<tr>
					<td align="right">Mobile
					<td><input name="txtMobile" onkeypress="return isNumberKey(event)"/></td></tr>
				<tr>
					<td align="right">Phone No.
					<td><input name="txtPhone" onblur="validatenumber()" onkeypress="return isNumberKey(event)"/></td></tr>
				<tr>
					<td align="right">E-Mail Id
					<td><input name="txtMail">
				</tr>
				
				<tr>
					<td align="center" colspan=2><input type="button" value="Save" onclick="check()">
					<input type="reset" value="Clear"></td>
				</tr>
			</table>
		</form>
		</td></tr></table>
	</body>
</html>
				
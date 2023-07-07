<?php
session_start();
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
?>
<html><head><link rel="stylesheet" href="css/bootstrap.min.css"><script src="css/jquery.min.js"></script>  <script src="css/bootstrap.min.js"></script><link rel="stylesheet" href="css/all.css"><!-- <link rel="stylesheet" type="text/css" href="styles.css" /> -->
<script>
function check()
{
	if(document.f1.txtItemCode.value=="")
	{
		document.f1.txtItemCode.focus();
		return;
	}
	if(document.f1.txtItemName.value=="")
	{
		document.f1.txtItemName.focus();
		return;
	}
	if(document.f1.txtDescription.value=="")
	{
		document.f1.txtDescription.focus();
		return;
	}
	if(document.f1.txtPurchaseRate.value=="")
	{
		document.f1.txtPurchaseRate.focus();
		return;
	}
	
if (validatenumber()==false)
{
return;
}
document.f1.submit();
}
function validatenumber()
{
if(IsNumeric(document.f1.txtPurchaseRate.value)==false)
{
alert('Please Check Rate.');
document.f1.txtPurchaseRate.focus();
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
<?php include('menutable.php') ?>
</td>
<td align="center" valign="top">
	<h2 align="center">ITEM DETAILS</h2>
	
			<form name="f1" id="f1"  action="saveitem.php" method="post" enctype="multipart/form-data">
			<table class='table table-striped table-hover' align="center" width="50%" border="1">
				<tr>
					<td align="right">Item Code</td>
<td><input name='txtItemCode' value=""></td>
				</tr>
				<tr>
					<td align="right">Item Name
					<td><input name="txtItemName">
				</tr>
				<tr>
					<td align="right">Description/Technical
					<td><textarea name="txtDescription"></textarea>
				</tr>
				
				<tr>
					<td align="right">Category
					<td><select name="cbCategory">
					<option>Women Wear</option>
				<option>Mens Wear</option>
				<option>Kids Wear</option>
				<option>Others</option>
</select>
</td>
				</tr>
				<tr>
					<td align="right">Purchase Rate/Nos.
					<td><input name="txtPurchaseRate" onkeypress="return isNumberKey(event)"/></td></tr>

				

					<tr>
						<td align="right">Upload Photo
					<td><input type="file" name="txtFile">

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
				
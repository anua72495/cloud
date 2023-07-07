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
if (validatenumber()==false)
{
}
else
{
document.f1.submit();
}
}
function validatenumber()
{
if(IsNumeric(document.f1.txtPhone.value)==false)
{
alert('Please Check Phone No.');
document.f1.txtPhone.focus();
return false;
}
//document.f1.submit();
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

<table  style="width:100%">
<tr><td style='width:20%'>

</td><td align="center" valign="top">
	<h1 align="center"><font face="TAHOMA">Enquiry</font></h1>
	
			<form name="f1" action="saveEnquiry.php" method="post">
			<table class='table table-striped table-hover' align="center" width="50%">
				<tr>
					<td align="right">Enquiry Id
					<td><?php
						
							$sql="select count(*) as Records from Enquiry" ;
							$res=mysqli_query($con,$sql) or die(mysql_error());
								$row = mysqli_fetch_assoc($res);
							
								$RecNo=($row['Records']+1);
							
					?>

<input name="suppId" value='<?php echo $RecNo ?>'>

				</tr>
				<tr>
					<td align="right">Contact Name
					<td><input name="Suppliername">
				</tr>
				<tr>
					<td 
align="right">Street
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
					<td align="right">Phone
					<td><input name="txtPhone" onblur="validatenumber()">
				</tr><tr>
					<td align="right">Mobile
					<td><input name="txtMobile">
				</tr><tr>
					<td align="right">E-Mail Id
					<td><input name="txtMail">
				</tr>
				<tr>
					<td align="right">Description
					<td><textarea name="txtDescription" value=''></textarea>
				</tr>
				<tr>
					<td align="center" colspan=2><input type="button" value="Save" onclick="check()">
					<input type="reset" value="Clear"></td>
				</tr>
			</table>
		</form>
		<td style='width:20%'>

</td>
		</td></tr></table>
	</body>
</html>
				
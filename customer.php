<html>
<head>
<script type="text/javascript"> 

 function Validate() 
{
   var val = document.getElementById('customername').value;
    
    if (!val.match(/^[a-zA-Z]+$/)) 
    {
        alert('Only alphabets are allowed');
		document.c.customername.value="";
		
document.c.customername.focus();

        return false;
	} 
	
}
</script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" type="text/css" href="style.css">
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
</head>
<?php
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
?>
<html>
<head></link>
</head>
<body>
<table  border="0" width="100%" height="150">
<tr>
<td><?php include('menugeneraltop.php')?>

</td>
</tr>
</table>

<table class='table table-striped table-hover' width="100%" align="center">
<tr><td>

</td><td align="center">
	<h1 align="center"><font face="TAHOMA" >CUSTOMER DETAILS</font></h1>
	
			<form action="savecustomer.php" method="post" name="c" onsubmit="return Validate()">
			<table class='table table-striped table-hover' align="center" width="500">
				<tr>
					<td align="left">Customer Id


						<td align="left"><?php
						
							$sql="select count(*) as Records from customer" ;
							$res=mysqli_query($con,$sql) or die(mysql_error());
								$row = mysqli_fetch_assoc($res);
							
								$RecNo=($row['Records']+1);
							
					?>

<input name="custId" value='<?php echo $RecNo ?>'readonly>

				</tr>
				<tr>
				<td align="left">Customer Name
						<td align="left"><input name="customername" id="customername">
				</tr>
				<tr>
						<td align="left">Street
						<td align="left"><input name="txtStreet">
				</tr>
				
				<tr>
						<td align="left">Address
						<td align="left"><textarea name="txtAddress" value=''></textarea>
				</tr>
				<tr>
					<td align="left">City
					<td align="left"><input name="txtCity">
				</tr><tr>
					<td align="left">PinCode
					<td align="left"><input name="txtPin" pattern="[0-9]{6}" title="Enter valid pincode" required>
				</tr><tr>
					<td align="left">Phone
						<td align="left"><input name="txtPhone" maxlength="10"  pattern="[0-9]{10}" title="Enter your mobile number" required>
				</tr><tr>
					<td align="left">Mobile
					<td align="left"><input name="txtMobile" maxlength="10"  pattern="[0-9]{10}" title="Enter your mobile number" required>
				</tr><tr>
					<td align="left">E-Mail Id
						<td align="left"><input name="txtMail" type="email" title="Enter valid mail id" required>
				</tr>
				<tr>
					<td align="left">Password
					<td align="left"><input type="password" name="txtPass">
				</tr>
				<tr>
					<td align="center" colspan=2><input type="submit" value="Save">
					<input type="reset" value="Clear"></td>
				</tr>
			</table>
		</form>
		</td></tr></table>
	</body>
</html>
				
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
<head>

<script src="OnlineFurniture.js" type="text/javascript" language="javascript"></script>
  <script type="text/javascript" src="jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    function cal()
	{
		var a,b,c;
		a=document.getElementById("txtQty").value;
		b=document.getElementById("txtRate").value;
		c=parseInt(a)*parseInt(b);
		document.getElementById("txtAmt").value=c;
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
    function check()
	{
		
if(IsNumeric(document.f1.txtQty.value)==false)
{
alert('Please Check Quantity');
document.f1.txtQty.focus();
return;
}
if(IsNumeric(document.f1.txtRate.value)==false)
{
alert('Please Check Rate');
document.f1.txtRate.focus();
return;
}
		document.f1.submit();
	}
function showrate()
{
var selObj = document.getElementById("cboMaterialId");

    val = selObj.options[selObj.selectedIndex].value;

v1=document.f1.cboMaterialId.value.indexOf(':');
v2=document.f1.cboMaterialId.value.indexOf(':',v1+1);
document.f1.txtRate.value=val.substring(document.f1.cboMaterialId.value.indexOf(':')+1,v2-v1+1);



}
    </script>




<?php
echo "<link rel='stylesheet' href='style.css'> <script type='text/javascript' src='jquery/3.1.1/jquery.min.js'></script><script type='text/javascript' src='js/bootstrap.min.js'></script>";
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
include('menutablecustomer.php');
?>
</td><td align="center" color="red">
	<h1 align="center" color="red">MATERIALS ORDER FORM</h1>
	
	


		<form  name="f1" action="ordermaterialssave.php" method="post">
		<table class='table table-striped table-hover' align="center" cellspacing="5" cellpadding="5" width="50%" border="1" class="table table-striped">
				
<tr>
					<td align="right">Order Id
					<td>
					
					<?php
						
							$sql="select count(*) as Records from orders" ;
							$res=mysqli_query($con,$sql) or die(mysql_error());
								$row = mysqli_fetch_assoc($res);
							
								$ccode= ($row['Records']+1);
							
					?>
					<input name='txtorderid' value='<?php echo $ccode; ?>' readonly>
					
				</tr>
				
				<tr>
					<td align="right">Date Of Order
					<td><input name="txtDateOfOrder" value=<?php echo date('Y/m/d');?>>
				</tr>
				<tr>
					<td align="right">Agency Id
					<td><select id="cboAgencyId" name="cboAgencyId">
						<?php
							$sql="SELECT AgencyId,AgencyName FROM Agency";
		
							$tot=mysqli_query($con,$sql); 
							echo "<option value='Select'>Select</option>";
							while($row = mysqli_fetch_assoc($tot) )
							{
								
									echo "<option value='" . $row['AgencyId'] .  ":" . $row['AgencyName'] .  "'>" . $row['AgencyId'] .  ":" . $row['AgencyName'] . "</option>";
									
							}
						?>
						</SELECT>
					</td>
				</tr>
			
				<tr>
					<td align="right">Material Id
					<td><select id="cboMaterialId" name="cboMaterialId" onchange="showrate()">
						<?php
							$sql="SELECT A.MaterialId,MaterialName,StockId,Rate FROM Stock  A,Material B Where A.MaterialId=B.MaterialId and Available>0";
		
							$tot=mysqli_query($con,$sql); 
							echo "<option value='Select'>Select</option>";
							while($row = mysqli_fetch_assoc($tot) )
							{
								
									echo "<option value='" . $row['MaterialId'] .  ":" . $row['Rate'] .  ":" . $row['StockId'] .  ":" .$row['MaterialName'] .  "'>" . $row['MaterialId'] .  ":" . $row['Rate'] .   ":" . $row['StockId'] . ":" . $row['MaterialName'] . "</option>";
									
							}
						?>
						</SELECT>
					</td>
				</tr>
				
				<tr>
					<td align="right">Customer Code</td>
					<td><input name='txtCustomerCode' value='<?php echo $_SESSION["userid"];?>'readonly>
					</td>
				</tr>

				<tr>
					<td align="right">Quantity
					<td><input type="text" ID="txtQty" name="txtQty"/>
				</tr>
				<tr>
					<td align="right">Rate
					<td><input type="text" ID="txtRate" name="txtRate" />
				</tr>
				<tr>
					<td align="right">Amount
					<td><input type="text" ID="txtAmt" name="txtAmt" ><input type="button" value="Calculate" Width="80px" onClick="cal()" /></td>
				</tr>
				
				<tr>
					<td align="center" colspan=2 ><input type="button" value="Save" onclick="check()">
					<input type="reset" value="Clear"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
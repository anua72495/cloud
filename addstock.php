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
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="OnlineFurniture.js" type="text/javascript" language="javascript"></script>
  <script type="text/javascript" src="jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    function calc()
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

//document.f1.txtAmt.value=document.f1.txtQty.value*document.f1.txtRate.value;


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
<table class='table table-striped table-hover' width="100%" class="tablemiddle" border="0">
<tr>
<td class='a' valign="top" style="font-size:24px">Welcome</td></tr>
</table></marquee>

<table class='table table-striped table-hover' width="100%">
<tr><td>
<?php
include('menutableagency.php');
?>
</td><td align="center" style="color:red">
	<h1 align="center" color="red">STOCK ADDITION FORM</h1>
	
	


		<form id="f1" name="f1" action="stocksave.php" method="post">
		<table class='table table-striped table-hover' align="center" cellspacing="5" cellpadding="5" width="50%" border="1" class="table table-striped">
				
<tr>
					<td align="right">Stock Id
					<td>
					
					<?php
						
							$sql="select count(*) as Records from stock" ;
							$res=mysqli_query($con,$sql) or die(mysql_error());
								$row = mysqli_fetch_assoc($res);
							
								$ccode= ($row['Records']+1);
							
					?>
					<input name='txtstockid' value='<?php echo $ccode; ?>' readonly>
					
				</tr>
				
				<tr>
					<td align="right">Stock Date
					<td><input name="txtstockdate" value=<?php echo date('Y/m/d');?>>
				</tr>
				<tr>
					<td align="right">Material Id
					<td><select name="cboMaterialId">
						<?php
						 
						$sql="Select MaterialId,MaterialName From Material Where AgencyId='" . $_SESSION['userid' ] . "'";
		
							$tot=mysqli_query($con,$sql); 
							
							while($row = mysqli_fetch_assoc($tot) )
							{
								
									echo "<option value='" . $row['MaterialId'] . "'>" . $row['MaterialId'] . ":" . $row['MaterialName'] .  "</option>";
									
							}
						?>
						</SELECT>
					</td>
				</tr>
				
			
<tr>
					<td align="right">Quantity
					(Nos for Brick, Bag For Soil/Sand/Cement)
					<td><input type ="text"  ID="txtQty" name='txtQty'/>
					</td>
		</tr>
		
				<tr>
					<td align="right">Rate
					<td><input type="text" ID="txtRate" name="txtRate" />
				</tr>
					<tr>
					<td align="right">Amount
					<td><input ID="txtAmt" name="txtAmt">
					<input type="button" value="Calculate" onclick="calc()"></td>
				</tr>
				<tr>
					<td align="right">Description
					<td><input type="text" ID="txtDesc" name="txtDesc" >
					</td>
				</tr>
				
				<tr>
					<td align="center" colspan=2 ><input type="submit" value="Save">
					<input type="reset" value="Clear"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
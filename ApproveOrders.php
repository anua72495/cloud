<?php
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
    
    </script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
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
 session_start();
include('index.php');

?>
<style>
.a
{
	color:red;
}
</style>
<br><br><br><br><br><br><br><br><br><br>
<marquee><table class='table table-striped table-hover' width="100%" class="tablemiddle" border="0">
<tr>
<td class='a' valign="top" style="font-size:24px">Welcome To Agency Page</td></tr>
</table></marquee>

<table class='table table-striped table-hover' width="100%">
<tr><td>
<?php
include('menutableagency.php');
?>
</td><td align="center">
	<h1 align="center">ORDER APPROVE FORM</h1>
	
	


		<form action="ApproveOrdersSave.php" method="post">
		<table class='table table-striped table-hover' align="center" cellspacing="5" cellpadding="5" width="50%" border="1" class="table table-striped">
				
<tr>
					<td align="right">Order Id
					
					
					<td><select name="cboOrderId">
						<?php
							$sql="SELECT OrderId FROM Orders  where  AgencyId='" . $_SESSION['userid'] . "' Order By OrderId Desc";
		
							$tot=mysqli_query($con,$sql); 
							
							while($row = mysqli_fetch_assoc($tot) )
							{
								
									echo "<option>" . $row['OrderId'] . "</option>";
									
							}
						?>
						</SELECT>
					
				</tr>
							
<tr>
					<td align="right">Status
					
					
					<td><select name="cboStatus">
								
									<option>Approved</option>
									<option>Reject</option>
						</SELECT>
					
				</tr>
				
				
				<tr>
					<td align="center" colspan=2 ><input type="submit" value="Save">
					<input type="reset" value="Clear"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
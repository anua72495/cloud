<?php
	$con = mysqli_connect("localhost","root",'');
	mysql_select_db("catering", $con);
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
    function cal()
	{
		var a,b,c;
		a=document.getElementById("txtQty").value;
		b=document.getElementById("txtRate").value;
		c=parseInt(a)*parseInt(b);
		document.getElementById("txtAmt").value=c;
	}
    
    </script>
</head>
<body bgcolor="AntiqueWhite" text="blue">

<?php
 session_start();
include('pagetop.php');

?>
<table class='table table-striped table-hover' width="100%">
<tr><td>
<?php
include('customermenutable.php');
?>
</td><td align="center">
	<h1 align="center">ORDER CANCELLATION FORM</h1>
	
	


		<form action="OrdersCancelSave.php" method="post">
		<table class='table table-striped table-hover' align="center" cellspacing="5" cellpadding="5" width="50%" border="1" class="table table-striped">
				
<tr>
					<td align="right">Order No
					<td>
					
					<?php
						
							$sql="select OrderNo from orders Where CustomerCode='" . $_SESSION['userid'] . "' and Status='Pending'";
							$res=mysqli_query($con,$sql) or die(mysql_error());
						
					<select name="cboOrderNo"  id="cboOrderNo">
                     <option>Select</option>
	<?php while($row = mysqli_fetch_assoc($res))
{
	echo '<option value='.$row['OrderNo'].'>'.$row['OrderNo'].'</option>';
}
?>
						</SELECT>
							
					?>
				
					
				</tr>
		
				
				<tr>
					<td align="center" colspan=2 ><input type="submit" value="Save">
					<input type="reset" value="Clear"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
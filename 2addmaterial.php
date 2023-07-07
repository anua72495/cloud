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
<script language="javascript">
function check()
{
	
	if (document.form1.txtMaterialId.value=="")
	{
		alert('Please Enter Material Id');
		documen.form1.txtMaterialId.focus();
		return false;
	}
		if (document.form1.txtMaterialName.value=="")
	{
		alert('Please Enter Material Name');
		documen.form1.txtMaterialName.focus();
		
		return false;
	}
		if (document.form1.txtCategory.value=="")
	{
		alert('Please Enter Category');
		documen.form1.txtCategory.focus();
		return false;
	}
	
	if (document.form1.txtSalesRate.value=="")
	{
		alert('Please Enter Sales Rate');
		documen.form1.txtSalesRate.focus();
		return false;
	}
	
	document.form1.submit();
}
</script>
</head>
<body>
<table  border="0" width="100%">
<tr>
<td><?php include('index.php')?>

</td>
</tr>
</table>
<br><br><br><br><br><br><br><br><br>
<table class='table table-striped table-hover' width="100%">
<tr><td>
<?php include('menutableagency.php') ?>
</td>
<td align="center">
	<h2 align="center"><font face="TAHOMA" color="RED ">MATERIAL ADDITION</font></h2>
	
			<form name="form1" action="ProductSave.php" method="post">
			<table class='table table-striped table-hover' align="center" width="500">
				<tr>
					<td align="right">Material Id
					<?php
						
							$sql="select count(*) as Records from Material";
							$res=mysqli_query($con,$sql) or die(mysql_error());
								$row = mysqli_fetch_assoc($res);
															$RecNo=$row['Records']+1;
							
					?>
					<td><input name="txtMaterialId" value='<?php echo $RecNo ?>'>
				
				</tr>
		<tr>
					<td align="right">Material Name
					<td><input name="txtMaterialName">
				</tr>
					
				<tr>
					<td align="right">Category
					<td><input name="txtCategory">
				</tr>					
				
				<tr>
					<td align="right">Sales Rate
					<td><input name="txtSalesRate">
				</tr>					
				<tr>
						<td align="right">Image
					<td><input type="file" name="txtFile">
				</tr>
				<tr>
					<td align="center" colspan= 2 ><input type="submit" value="Save" >
					<input type="reset" value="Clear"></td>
				</tr>
			</table>
		</form>
		</td></tr></table>
	</body>
</html>
				
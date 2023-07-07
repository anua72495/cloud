<?php
session_start();
?>
<html>
<head>
<title>Item Search</title>
<head><link rel="stylesheet" href="css/bootstrap.min.css"><script src="css/jquery.min.js"></script>  <script src="css/bootstrap.min.js"></script><link rel="stylesheet" href="css/all.css"><!-- <link rel="stylesheet" type="text/css" href="styles.css" /> --><style>
.oddrow{
	 background-color:#d1fab4;
}
.evenrow{
	 background-color:#d1fa84;
}
</style>
</head>
<!--<style>
body {
  background-image: url('S3.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
</style>-->

<script> 
function calc()
{
	wleng = parseInt(document.f1.wleng.value);
	wwid = parseInt(document.f1.wwid.value);
	leng= parseInt(document.f1.leng.value);
	wid= parseInt(document.f1.wid.value);
	
	a= wleng/leng;
	b= wwid/wid;
	c= a*b;
	document.f1.numbricks.value =c;
	
	pleng = parseInt(document.f1.pleng.value);
	numrods = parseInt(document.f1.numrods.value);
	rodscount = parseInt(pleng*numrods);	
	document.f1.rodscount.value =rodscount;
	
	
	
}
</script>
</head>
<body id="bdy">
<div class="update">
    <?php
     $conn = mysqli_connect("localhost", "root", "", "sports");
		// Check connection
     if($conn === false){
     die("ERROR: Could not connect. ". mysqli_connect_error());}

     $status = "";
	 include('pagetop.php');
	 mysqli_close($conn);
	 ?>
	
	  
	  <table class='table table-striped table-hover' width='100%'>
	  <tr>
	  <td>
	  <nav role='navigation'>
		<?php
		
				include('menutablecustomer.php');
		
		?>
	  </nav>
	      </td><td valign='top' align='center'>
  <form class="form-horizontal" id="f1" name="f1" method="post" action="addorder.php">
  <b><h2 style="color:Black;font-weight:bold;font-size:50px;text-align:center;">PRODUCT SEARCH</h2></u></b> 
			<!--Id-->
				 
<table>
<tr><td>Item Name</td><td><input type=text name='txtItem' value=''></td></tr>
<tr><td colspan=2 align=center></td></tr>
</table>
			   <!--Save-->
				   <div class="form-group">
				   <div class="col-sm-offset-5 col-sm-4">
				   <button type="submit" class="btn btn-primary" name="submit" id="submit" >Search</button>
				   </div></div>
			   </form>           
</td>
</tr>
</table>


<?php
if(isset($_SESSION['sitem']))
    unset($_SESSION['sitem']);

$_SESSION['fromsearch']="1";
	echo "</table></td></tr></table></center></form>";
	
?>
</body>

</html>
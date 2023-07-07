<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Order Approval Details</title>
<link rel="stylesheet" type="text/css" href="regbg.css">
    <link rel="stylesheet" type="text/css" href="admin.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script>
  
function showtotal()
{
	//alert('hi')
var q= document.form.qty.value;//.options[document.getElementById("cbItemCode").selectedIndex].value;
var p=document.form.price.value;//.options[document.getElementById("cbItemCode").selectedIndex].value;

//document.f1.txtRate.value=selObj;
//alert(selObj.selectedIndex);
    val = q*p;
//alert(val);
document.form.total.value= val;

//alert(document.f1.txtRate.value.length);
//document.f1.txtRate.value=document.f1.txtRate.value.substring(0,document.f1.txtRate.value.length()-1);
}
  
function showrate()
{
	
var selObj = document.getElementById("item");//.options[document.getElementById("cbItemCode").selectedIndex].value;
//document.f1.txtRate.value=selObj;
//alert(selObj.selectedIndex);
    val = selObj.options[selObj.selectedIndex].text;
//alert(val);
document.form.price.value=val.substring(val.lastIndexOf(':')	+1);

//alert(document.f1.txtRate.value.length);
//document.f1.txtRate.value=document.f1.txtRate.value.substring(0,document.f1.txtRate.value.length()-1);
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

     $status = "";?>

<table  border="0" width="100%">
<tr>
<td><?php include('pagetop.php')?>
<?php include('menugeneraltop.php')?>
</td>
</tr>
</table>
<table class='table table-striped table-hover' align='center' cellspacing='0' cellpadding='0' width='1000' border='0'><tr><td width='300'>
 <?php
		
		?>
</td><td valign='top'>
  <form class="form-horizontal" name="form" method="post" action="orderapprovaldb.php">
  <b><h2 style="color:Black;font-weight:bold;font-size:20px;text-align:center;">ORDER APPROVAL FORM</h2></u></b> 
			
  <!--Name-->
    <!--Description-->
        <div class="form-group">
				   <label class="control-label col-sm-3" for="id" style="color:black">Order No.</label>
		   <div class="col-sm-6" style="padding-top:20px">
       
       <select id="orderno" name="orderno">
    <?php
				  
				$sql="Select OrderNo,Approved From OrderDetails group by OrderNo";
		
							$tot=mysqli_query($conn,$sql); 
							
							while($row = mysqli_fetch_assoc($tot) )
							{
								
									echo "<option value=" . $row['OrderNo'] . ">" . $row['OrderNo'] . ":" .  $row['Approved'] . "</option>";
									
							}
							
				  ?>
  </select>
			   </div></div>
			   <!--Name-->
				   <div class="form-group">
				   <label class="control-label col-sm-3" for="name" style="color:black">Entry Date</label>
		   <div class="col-sm-6" style="padding-top:20px">
				   <input type="text" class="form-control" name="entrydate" id="entrydate" placeholder="Enter date" value='<?php echo date('Y-m-d') ?>' required>
			   </div></div>
       
         <div class="form-group">
				   <label class="control-label col-sm-3" for="id" style="color:black">Status</label>
		   <div class="col-sm-6" style="padding-top:20px">
       <select id="status" name="status">
	   <option>Approved</option>
      <option>Rejected</option>
	     
  </select>
			   </div></div>

         <!--Save-->
				   <div class="form-group">
				   <div class="col-sm-offset-5 col-sm-3">
				   <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
				   </div></div>   
           
             </form>   
</td>
</tr>
</table>

<script>
function validateForm()
{
  let x=document.forms["form"]["Quantity"].value;
  let y=document.forms["form"]["price"].value;
  document.getElementById("total").value=x*y;
}
</script>
  </section>
</main>
</div>
</body>
</html>

<?php

	session_start();
?>
<html lang="en">
 <head>
  <title>Order details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" type="text/css" href="home.css">
  </head>
 
 <body>  
 <div class="update">
    <?php
     $conn = mysqli_connect("localhost", "root", "", "sports");
		// Check connection
     if($conn === false){
     die("ERROR: Could not connect. ". mysqli_connect_error());}

     $status = "";
	 include('pagetop.php');
	 ?>    
    <!--header-->
   
       <!--//header//-->  

<!--middle-->
<div class="container-fluid">
 <div class="row"> 
 <div class="col-sm-offset-1 col-sm-10"> 
 <form>
 <h1 style="font-family:arvo;font-weight:bolder;font-size:50px;text-align:center;">ITEM DETAILS</h1>
<hr style="width:10%;border:2px solid;text-align:center;">  
 <br> <br>
 <?php
$count=1;



if(isset($_SESSION['fromsearch']))
{
	
	if(isset($_SESSION['sitem']))
	{
		$sitem = $_SESSION['sitem'];
	}
	else
	{
		if(isset($_POST['txtItem']))
			$sitem = $_POST['txtItem'];
		else
			$sitem="";
	$_SESSION['sitem']=$sitem;
	}
	$sel_query="Select * from  items Where itemname Like '" . $sitem . "%' ORDER BY itemcode desc;";
	
}
else
	
	{
			if(isset($iname))
				$sel_query="Select * from  items Where ItemName Like '" . $iname . "%' ORDER BY ItemCode desc;";
			else
				$sel_query="Select * from  items ORDER BY ItemCode desc;";
	
	}
$result = mysqli_query($conn,$sel_query);
  
  /*
$sel_query="Select * from  items ORDER BY ItemCode desc;";
if(isset($_SESSION['fromsearch']))
{
	if(isset($_SESSION["searchword"]))
	{
		$iname=$_SESSION["searchword"];
		$sel_query="Select * from  items Where ItemName Like '" . $iname . "%' ORDER BY ItemCode desc;";
	
	
	}
	
	else if(isset($_POST['txtItem']))
	{
	$iname= $_POST['txtItem'];
	$_SESSION["searchword"] = $iname;
	$sel_query="Select * from  items Where ItemName Like '" . $iname . "%' ORDER BY ItemCode desc;";
	
	
	}
}

$result = mysqli_query($conn,$sel_query);
*/

  echo"<a href='getsearch.php'>Modify Search</a><br/><p>";

while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-sm-4 form-group">  
                  
<img style='border-radius:5px;width:300px;height:300px' src="itemimages/<?php echo ($row["Photo"]); ?>" class="img-responsive" alt="" style="height:300px;width:300px;background-size:cover;position:relative;">
<h3 style="font-weight:bolder;color:rgb(76, 76, 80);padding-left:50px;">Rate: <?php echo $row["PurchaseRate"];?> <?php echo $row["Description"];?></h3>
<h3 style="font-weight:bolder;color:rgb(76, 76, 80);padding-left:50px;">Name: <?php echo $row["ItemName"]; ?></h3> 
<div class="btn">
                    <div class="w3-container">
  <div class="w3-show-inline-block">
  <div class="w3-bar">
    
  


    <a class="w3-btn w3-teal" href="update-cart.php?action=add&itemcode=<?php echo $row ["ItemCode"]?>">Add to cart</a>
 
  </div>
  </div>
</div>
</div>
<br><br>
</div>  
<?php $count++; } ?> </form>
</div> </div></div><br><br>
<!--//middle//-->

      

 </body >
</html>
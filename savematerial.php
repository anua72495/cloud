<?php
session_start();
?>
<html>
<head>
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
</head><body>
<?php
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	
	$ItCode=$_REQUEST["txtMaterialId"];
$ItemType=$_REQUEST["txtMaterialName"];
	$ItName=$_REQUEST["txtCategory"];
	$ItDesc=$_REQUEST["txtSalesRate"];
	$Fpath=$_FILES["txtFile"]["name"];
$id=$_SESSION['userid'];

if ($_FILES["txtFile"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["txtFile"]["error"] . "<br />";
    }
  else
    {


    if (file_exists("itemimages/" . $_FILES["txtFile"]["name"]))
      {
      echo $_FILES["txtFile"]["name"] . " already exists. ";
	  return;
      }
    else
      {
      move_uploaded_file($_FILES["txtFile"]["tmp_name"],
      "itemimages/" . $_FILES["txtFile"]["name"]);
   
      }
    }
	
	$qry="insert into Material(MaterialId,MaterialName,Category,SalesRate,Image,AgencyId) values('" . $ItCode . "','" . $ItemType . "','" . $ItName . "','" . $ItDesc . "','" . $Fpath . "','" . $_SESSION['userid'] . "')";
	mysqli_query($con,$qry) or die(mysql_error());
	
?>
 
<?php
include('menugeneraltop.php');
?>

<table class='table table-striped table-hover' width="100%">
<tr><td>
<?php
include('menutableagency.php')
?>
</td><td align="center">
	<h2>Item Saved Successfully</h2>
	</td></tr></table>
</html>
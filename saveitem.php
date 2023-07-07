<?php
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$ic=$_REQUEST["txtItemCode"];
	$in=$_REQUEST["txtItemName"];
	$de=$_REQUEST["txtDescription"];
	$catid=$_REQUEST["cbCategory"];
$pr=$_REQUEST["txtPurchaseRate"];
$Fpath=$_FILES["txtFile"]["name"];

if ($_FILES["txtFile"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["txtFile"]["error"] . "<br />";
    }
  else
    {
 //   echo "Upload: " . $_FILES["fpFilePath"]["name"] . "<br />";
    //echo "Type: " . $_FILES["fpFilePath"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["fpFilePath"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["fpFilePath"]["tmp_name"] . "<br />";

    if (file_exists("itemimages/" . $_FILES["txtFile"]["name"]))
      {
      echo $_FILES["txtFile"]["name"] . " already exists. ";
	  return;
      }
    else
      {
      move_uploaded_file($_FILES["txtFile"]["tmp_name"],
      "itemimages/" . $_FILES["txtFile"]["name"]);
    //  echo "StoWhite in: " . "upload/" . $_FILES["fpFilePath"]["name"];
      }
    }
	
	$qry="insert into items(itemcode,itemname,description,category,purchaserate,Photo,qty) values('" . $ic . "','" . $in . "','" . $de . "','" . $catid . "'," . $pr . ",'" . $Fpath . "',0)";
	mysqli_query($con,$qry) or die(mysql_error());
	
?>

<html>
<head><link rel="stylesheet" href="css/bootstrap.min.css"><script src="css/jquery.min.js"></script>  <script src="css/bootstrap.min.js"></script><link rel="stylesheet" href="css/all.css"><!-- <link rel="stylesheet" type="text/css" href="styles.css" /> -->
</head>
<body>
<table  border="0" width="100%">
<tr>
<td>
<?php 
include('pagetop.php');
include('menugeneraltop.php');
?>
<table class='table table-striped table-hover' width="100%">
<tr><td>
<?php include('menutable.php');?>
</td><td align="center"  valign="top">
<h2 align="center"><font face="TAHOMA" color="DarkOrchid ">Saved Status</font></h2>
	
	
		
			<table class='table table-striped table-hover' align="center"  cellspacing="1" cellpadding="6" width="50%" border="1">
			<tr>
<td>
<b>NEW ITEM DETAILS SAVED.</b>
</td>	
			
			</table>
		
		</TD></TR></TABLE>
		
		</td>
		</tr>
		</table>
	</body>
</html>
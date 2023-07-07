<?php
	$con = mysqli_connect("localhost","root",'');
	mysqli_select_db($con,"sports");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$sql="select * from Material A,Agency B where A.AgencyId=B.AgencyId";

	$rs= mysqli_query($con,$sql);
	//echo "<html>
echo "<head><link rel='stylesheet' href='style.css'> <script type='text/javascript' src='jquery/3.1.1/jquery.min.js'></script><script type='text/javascript' src='js/bootstrap.min.js'></script>";
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

<marquee><table width="100%" class="tablemiddle" border="0">
<tr>
<td class='a' valign="top" style="font-size:24px">Welcome To Admin Page</td></tr>
</table></marquee>

<?php


echo "	<table  align='center' cellspacing='0' cellpadding='0' width='100%' border='0'>";
echo "			<tr><td>";
include('menutable.php');
echo "</td>";
			

echo "<td valign='top' align='center'>";
	echo "<h2 align=center><font face='TAHOMA' color=red>MATERIALS LIST</font></h2>";
	
	echo "<table class='table table-striped table-hover' border=1 width=75% cellpadding='1' cellspacing='0'>";


	echo "<tr><th>MATERIAL ID</th><th>MATERIAL NAME</th><th>CATEGORY</th><th>SALES RATE</th><th>AGENCY ID</th><th>IMAGE</th><th>AGENCY NAME</th></tr>";
		$cnt=0;
	while($row = mysqli_fetch_assoc($rs))
	{
if($cnt%2==0)
	echo "<tr height=40>";
else
	echo "<tr height=40 bgcolor='#FCF5B6'>";

$cnt++;
		echo "<td>" . $row['MaterialId'] . "</td><td> " . $row['MaterialName']. "</td><td> " . $row['Category']. "</td><td> " . $row['SalesRate']. "</td><td> " . $row['AgencyId']. "</td><td align=right><a href='itemimages/" . $row['Image'] . "'><img src='itemimages/" . $row['Image'] . "' width=150 height=50/></a></td><td> " . $row['AgencyName']. "</td></tr>";
	}
	
	echo "</table></td></tr></table></center></body></html>";
	mysqli_close($con);
?>
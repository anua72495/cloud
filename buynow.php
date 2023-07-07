<?php 
session_start();
ob_start();?>
<html>
<head>
<title>Order Details</title>
<head>
  <title>Order details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" type="text/css" href="home.css">
  <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
 
<!--<style>
body {
  background-image: url('S3.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
</style>-->
</head>
<body id="bdy">
<?php
include('pagetop.php');
?>
<div class="update">
    <?php
     $conn = mysqli_connect("localhost", "root", "", "sports");
		// Check connection
     if($conn === false){
     die("ERROR: Could not connect. ". mysqli_connect_error());}

     $status = "";?>
	<header role="banner">
		<h1>Order Details</h1>
		<ul class="utilities">
		  <br>
		  <li class="logout warn"><a href="index.php">Log Out</a></li>
		</ul>
	  </header>
	  
	  
	  <table class='table table-striped table-hover' width='900'><tr><td width='400'>
	  <nav role='navigation'>
		<?php
		include('menutablecustomer.php');
		?>
	  </nav>
	  </td>
	  <td>
<?php
// servername => localhost
        // username => root
        // password => empty
        // database name => staff
		 $total=0;
				$mailbody="";
        $conn = mysqli_connect("localhost", "root", "", "sports");
        if($conn == false){
                    die("ERROR: Could not connect. ". mysqli_connect_error());
                }
				//
				 echo "<br/><br/><br/><table class='table table-striped table-hover' border='0' width='900' height='200'>";
				 echo "<tr><th style='background-color:blue;color:white;font-size:18px;'>Item Code</td>";
				 echo "<th style='background-color:blue;color:white;font-size:18px;'>Item Name</td>";
				 echo "<th style='background-color:blue;color:white;font-size:18px;'>Quantity</td>";
				 echo "<th style='background-color:blue;color:white;font-size:18px;'>Rate</td></tr>";
				
				$mailbody=$mailbody ."<br/><br/><br/><br/><br/><table class='table table-striped table-hover' border='0' width='500' height='200'>";
				 $mailbody=$mailbody ."<tr><th style='background-color:blue;color:white;font-size:18px;'>Item Code</td>";
				 $mailbody=$mailbody ."<th style='background-color:blue;color:white;font-size:18px;'>Item Name</td>";
				 $mailbody=$mailbody ."<th style='background-color:blue;color:white;font-size:18px;'>Quantity</td>";
				 $mailbody=$mailbody ."<th style='background-color:blue;color:white;font-size:18px;'>Rate</td></tr>";
				
				
				$qry = "SELECT max(OrderNo) Cnt from Orderdetails";
				 $result = mysqli_query($conn, $qry);
				 $row = $result->fetch_object();
				
				$cnt=$row->Cnt+1;
				    foreach($_SESSION['cart'] as $product_id => $quantity) {
                $query = "SELECT * from items where ItemCode='".$product_id."'"; 
                $result = mysqli_query($conn, $query);
            if($result){

              if($obj = $result->fetch_object()) {
				  
				  
                $result = mysqli_query($conn, $query);
				  
                $cost = $obj->PurchaseRate * $quantity; //work out the line cost
                $query1 ="Insert into orderdetails values('" . $cnt . "','" . date('y-m-d') . "','".$_SESSION['username'] . "','" . $product_id . "','" . $quantity
				  . "','" . $obj->PurchaseRate . "','" . $cost . "','Pending')";
				  mysqli_query($conn,$query1);
				  
				  
				$total = $total + $cost; //add to the total cost

                echo '<tr>';
                echo '<td>'.$obj->ItemCode.'</td>';
                echo '<td>'.$obj->ItemName.'</td>';
                echo "<td align='right'>".$quantity.'</td>';
                echo "<td align='right'>".$cost."</td>";
                echo "</tr>";
				
				$mailbody=$mailbody ."<tr><td>$obj->ItemCode</td>$obj->ItemName</td><td align='right'>$quantity</td><td align='right'>$cost</td>";
                $mailbody=$mailbody ."</tr>";
              }
			}
			
			}
			  echo "<tr><td style='background-color:blue;color:white;font-size:18px;'>Total Cost</td><td style='background-color:blue;color:white;font-size:18px;' colspan='3' align='right'>" . $total . "</td></tr>";
			  echo "<tr><td colspan='2' align='left' style='background-color:green;color:red;font-size:18px;'><h2>Order Details Saved.</h2></td></tr></table>";
			  $mailbody=$mailbody ."<tr><td style='background-color:blue;color:white;font-size:18px;'>Total Cost</td><td style='background-color:blue;color:white;font-size:18px;' colspan='3' align='right'>" . $total . "</td></tr>";
			  $mailbody=$mailbody ."<tr><td colspan='2' align='left' style='background-color:green;color:red;font-size:18px;'><h2>Order Details is being processed.</h2></td></tr></table>";
			  
			  	//----mail logic
				
				/*
		     require 'PHPMailer/PHPMailerAutoload.php';

      $mail = new PHPMailer;

      //$mail->SMTPDebug = 3;                               // Enable verbose debug output

      $mail->isSMTP();                                      // Set mailer to use SMTP

      $mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true));
  
  
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->Mailer = "smtp";
		
		$mail->SMTPDebug  = 0;  
		$mail->SMTPAuth   = TRUE;
		$mail->SMTPSecure = "tls";
		$mail->Port       = 587;
		$mail->Host       = "smtp.gmail.com";
		$mail->Username   = "softpromstest@gmail.com";
		$mail->Password   = "qwertyui!@#$";
		$mail->IsHTML(true);
		$mail->AddAddress($_SESSION["emailid"], $_SESSION['username']); //toaddress , recipient name
		$mail->SetFrom("softpromstest@gmail.com", " Car Spares Admin");
		//$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
		//$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
		$mail->Subject = "Regarding Order";
		//$content = "<b> Your House sports Request Accepted. Our Admin will Contact you shortly.</b>";
		$mail->MsgHTML($mailbody); 
		if(!$mail->Send()) {
			echo "Error while sending Email.";
			var_dump($mail);
		}
		else {
				echo "Email sent successfully";
		}

		*/
		
		//--mail logic
				//
				?>
	
	
	</td></tr></table>
				</form></body></html>
				
				
				
				<!--
$status = "";
$q="";
$itemid=$_REQUEST['itemid'];
$query = "SELECT * from  product where pid='".$itemid."'"; 
$result = mysqli_query($conn, $query) or die ( mysql_error());
$row = mysqli_fetch_assoc($result);
if(isset($_POST['sub'])){
date_default_timezone_set('Asia/Kolkata');
$date = date('y-m-d h:i:s');
$email=$_POST['email'];
$cusname=$_POST['name'];
$name=$_POST['pname'];
$price=$_POST['total'];
$number=$_POST['number'];
$qty=$_POST['qty'];
$add1=$_POST['add1'];
$qq=$row['qty'];

if($qty<=$qq)
{
  $subqty=$qq-$qty;
  $update="update product set qty='".$subqty."' where pid='".$itemid."'";
  $hi = mysqli_query($conn, $update) or die(mysqli_error());
  if($hi){
    $query="INSERT INTO `order` (customername,email,number, item_name ,qty, price, address, datetime) VALUES ('$cusname','$email','$number', '$name', '$qty', '$price', '$add1', '$date')";
    $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
  }
  echo '<script>alert("Your Order is placed successfully,Thank You.")</script>';
  header('Location:'.$_SERVER['PHP_SELF'].'?success&itemid='.$itemid.'');
}
else{
  echo '<script>alert("Out of Stock")</script>';
  header('Location:'.$_SERVER['PHP_SELF'].'?outofstock&itemid='.$itemid.'&qq='.$qq.'');
}
}
if(ISSET($_GET['success'])){
    $status="your order has been placed successfully,Thank You.";
  echo "<script>alert('$status');</script>";
  $q=-1;
    //header("Location:kk.php");
}
if(ISSET($_GET['outofstock'])){
    $status="Out of stock.";
    echo "<script>alert('$status');</script>";
  $q=$_GET['qq'];
    //header("Location:head.php");
}
?> 
  </form>
  </div>  
  </div>
 </div>
</div>

</body>
</html>
-->
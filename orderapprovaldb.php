
<html>

<head>
	<title>Order Approval details</title>
</head>

<body>
	<center>
		<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
        $conn = mysqli_connect("localhost", "root", "", "sports");
		
		// Check connection
		if($conn === false)
		{
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}		
		
		// Taking all 9 values from the form data(input)
        $ordno= $_REQUEST['orderno'];
        $stat = $_REQUEST['status'];
        
       $sql="Update OrderDetails set Approved='" . $stat . "' Where OrderNo='" . $ordno . "'";
       
	   
       if(mysqli_query($conn, $sql))
       {
		   
		   if($stat =="Approved")
		   {
		    $query1 ="Select ProductId,Quantity from orderdetails Where OrderNo='" . $ordno  . "'";
			
			$result =mysqli_query($conn, $query1);
			while($row = mysqli_fetch_assoc($result)) 
			{ 
				$sql="Update items set qty=qty-" . $row["Quantity"] . " Where ItemCode='" . $row["ProductId"] . "'";
				mysqli_query($conn, $sql);
				
				
				
			}
			
			$sql="Select ItemCode,ItemName,qty from items where qty<=100";
				$result1 =mysqli_query($conn, $sql);
				$msg="";
				while($row = mysqli_fetch_assoc($result1)) 
					{
						$msg= $msg . " Product With id <b>" . $row['ItemCode'] .  "'s</b> Stock quantity is <font color='red'>" . $row['qty'] . "</font>. Please reorder quickly.<br/>";
					}
					
					
					if($msg!="")
					{
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
		$mail->AddAddress("softpromstest@gmail.com", "Administrator"); //toaddress , recipient name
		$mail->SetFrom("softpromstest@gmail.com", "Car Spares Admin");
		//$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
		//$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
		$mail->Subject = "Medicine Stock Reminder";
		//$content = "<b> Your House sports Request Accepted. Our Admin will Contact you shortly.</b>";
		$mail->MsgHTML($msg); 
		if(!$mail->Send()) {
			echo "Error while sending Email.";
			//var_dump($mail);
		}
		else {
				echo "Email sent successfully";
		}

		*/
		
		//--mail logic
						
						
						
						
					}
			
		   }
			echo"<script>alert('Update Successful');
			window.location='orderapprovaladmin.php';</script>";
       } 
       else
       {
           echo "ERROR: Hush! Sorry $sql. "
               . mysqli_error($conn);
       }


		
// Close connection
mysqli_close($conn);
?>

	</center>
</body>

</html>

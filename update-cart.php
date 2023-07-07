
<?php

$conn = mysqli_connect("localhost", "root", "", "sports");
		// Check connection
     if($conn === false){
     die("ERROR: Could not connect. ". mysqli_connect_error());}

     $status = "";

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}



$product_id = $_GET['itemcode'];
$action = $_GET['action'];

if($action === 'empty')
  unset($_SESSION['cart']);

$query = "SELECT qty from items where ItemCode='".$product_id."'"; 
$result = mysqli_query($conn,$query);


if($result){

  if($obj = $result->fetch_object()) {

    switch($action) {

      case "add":
     // if($_SESSION['cart'][$product_id]+1 <= $obj->qty)
        $_SESSION['cart'][$product_id]++;
      break;

      case "remove":
        $_SESSION['cart'][$product_id]--;
        if($_SESSION['cart'][$product_id] == 0)
          unset($_SESSION['cart'][$product_id]);
          break;




    }
  }
}



header("location:cart.php");

?>

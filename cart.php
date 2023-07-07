<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}



?>
<?php
     $conn = mysqli_connect("localhost", "root", "", "sports");
		// Check connection
     if($conn === false){
     die("ERROR: Could not connect. ". mysqli_connect_error());}

     $status = "";?> 

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Items Shopping Cart</title>
    <link rel="stylesheet" href="foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
	
<style>
.zoom {
  padding: 10px;
  background-color: red;
  transition: transform .2s; /* Animation */
  width: 200px;
  height: 200px;
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Car Spares Shop</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">

      </section>
    </nav>




    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <?php

          echo '<p><h3>Your Shopping Cart</h3></p>';

          if(isset($_SESSION['cart'])) {

            $total = 0;
            echo '<table>';
            echo '<tr>';
			echo '<th>Image</th>';
            echo '<th>Item Code</th>';
            echo '<th>Item Name</th>';
            echo '<th>Quantity</th>';
            echo '<th>Rate</th>';
            echo '</tr>';
            foreach($_SESSION['cart'] as $product_id => $quantity) {
                $query = "SELECT * from items where ItemCode='".$product_id."'"; 

                $result = mysqli_query($conn, $query);


            if($result){

              while($obj = $result->fetch_object()) {
                $cost = $obj->PurchaseRate * $quantity; //work out the line cost
                $total = $total + $cost; //add to the total cost

                echo '<tr>';
				echo "<td style='text-align:center' align='center'><img class='zoom' src='itemimages/" . $obj->Photo.  "' style='border-radius:5px' width='100' height='100'/></td>";
                echo '<td>'.$obj->ItemCode.'</td>';
                echo '<td>'.$obj->ItemName.'</td>';
                echo '<td>'.$quantity.'&nbsp;<a class="button [secondary success alert]" style="padding:5px;" href="update-cart.php?action=add&itemcode='.$product_id.'">+</a>&nbsp;<a class="button alert" style="padding:5px;" href="update-cart.php?action=remove&itemcode='.$product_id.'">-</a></td>';
                echo '<td>'.$cost.'</td>';
                echo '</tr>';
              }
            }

          }



          echo '<tr>';
          echo '<td colspan="3" align="right">Total</td>';
          echo '<td>'.$total.'</td>';
          echo '</tr>';

          echo '<tr>';
          echo '<td colspan="4" align="right"><a href="update-cart.php?action=empty" class="button alert">Empty Cart</a>&nbsp;<a href="addorder.php" class="button [secondary success alert]">Add More Items</a>';
		  echo "<p><a class='button [secondary success alert]' href='buynow.php' style='width:100%;'>Place Order</a></p></span><br>";
          

         

          echo '</td>';

          echo '</tr>';
          echo '</table>';
        }

        else {
          echo "You have no items in your shopping cart.";
        }





          echo '</div>';
          echo '</div>';
          ?>





    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>

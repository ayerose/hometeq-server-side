<?php 
session_start();
include ("db.php");


$pagename="Order confirmation"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page





// create local var & assign the system date n time
$currentdatetime = date('Y-m-d H:i:s');

// create sql query to create new order
$ordSQL="INSERT INTO Orders
        (userId, orderDateTime, orderTotal, orderStatus)
        VALUES (".$_SESSION['userid'].",'".$currentdatetime."', 0, 'Placed')"; // total set to 0 cuz atm no order and we have to query the db again so it recreates and updates the order -> U in crud operations

        // USER ID was stored in session[userID] (login process, tut6) and is there until user leaves page


        // execute sql query
        $exeordSQL = mysqli_query($conn, $ordSQL);


        // check if execution is NOT successful
        if (mysqli_errno($conn) <> 0)
        {
             echo "<p>There was an issue with placing the order</p>";

        } else {
          
            echo "<p>Order placed!</p>";

        }
        // retrieve highest order no for user in the session
        $maxSQL = "SELECT max(orderNo) as maxOrderNo
                    FROM Orders
                    WHERE userId = ".$_SESSION['userid'];

        // execute query or display error
        $exemaxSQL = mysqli_query($conn, $maxSQL) or die (mysqli_error($conn));

        // create array of records containing one attribute and one row: the max order no
        $arrayo = mysqli_fetch_array($exemaxSQL);

        // create local var to capture the max order no
        $maxorderno = $arrayo['maxOrderNo'];
        echo "<br><p> Order reference no: ".$maxorderno."</p>";



        $total=0;


  echo "<table id='baskettable'>";
  echo "<tr>";
  echo "<th>Product name</th>";
  echo "<th>Price</th>";
  echo "<th>Quantity</th>";
  echo "<th>Subtotal</th>";

  echo "</tr>";




if (isset($_SESSION['basket'])) {
// for loop to split session
foreach ($_SESSION['basket'] as $index => $value) {


    // retrieve product details from DB for the display of the confirmation
  $SQL = "SELECT prodId, prodName, prodPrice
          FROM Product
          WHERE prodId= ".$index;

          //run SQL query for connected DB or exit and display error message
          $exeSQL=mysqli_query($conn,$SQL) or  die (mysqli_error());
          $arrayp=mysqli_fetch_array($exeSQL);

        echo "<tr>";
            echo "<td>".$arrayp['prodName']."</td>";
            echo "<td>&pound".number_format($arrayp['prodPrice'],2)."</td>";
            echo "<td>".$value."</td>";

            $subtotal = $arrayp['prodPrice'] * $value;
            echo "<td>&pound".number_format($subtotal,2)."</td>";

            echo "<td>";


        
        
            //insert a new order line for dis current order no
            $olSQL = "INSERT INTO 
                    Order_Line(orderNo, prodId, quantityOrdered, subtotal) 
                    VALUES (".$maxorderno.", ".$index.", ".$value.", ".$subtotal.")";

            // execute query

            $exeSQL = mysqli_query($conn, $olSQL) or die (mysqli_error($conn));


                  
        echo "</tr>";
        //increase total by adding the subtotal tothe current total
        $total = $total + $subtotal;

}




} else {

echo "<p><b> Empty basket</b></p>";

}

echo "<tr>";
      echo "<td colspan=3><b>TOTAL: </b></td>";
      echo "<td><b>&pound".number_format($total,2)."</b></td>";
   
echo "</tr>";

echo "</table>";


// update the orders table and change the value of total

    $updSQL =   "UPDATE orders
                SET orderTotal = ".$total."
                WHERE orderNo = ".$maxorderno;

                // execute query

                $exeupdSQL = mysqli_query($conn, $updSQL) or die (mysqli_error($conn));













include("footfile.html"); //include head layout
echo "</body>";
?>

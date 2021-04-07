<?php
session_start(); // tag needs to be as close as possible to php tag

include ("db.php");


$pagename="smart basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";

include ("headfile.html"); //include header layout file
include ("detectlogin.php");


echo "<h4>".$pagename."</h4>"; //display name of the page on the web page



if (isset($_POST['del_prodid'])) {

$delprodid=$_POST['del_prodid'];
unset ($_SESSION['basket'][$delprodid]);
echo "<p><b>Basket updated: 1 item removed</b></p>";



}


// this updates the basket
if (isset($_POST['h_prodid']))

{
$reququantity=$_POST['p_quantity'];
$newprodid=$_POST['h_prodid'];

echo "<p>Selected product Id: ".$newprodid."</p>";
echo "<p>Selected product quantity: ".$reququantity."</p>";

//create a new cell in the basket session array. Index this cell with the new product id.
//Inside the cell store the required product quantity

$_SESSION['basket'][$newprodid]=$reququantity;
echo "<p>1 item added</p>";

} else {

  echo "<p> Basket unchanged</p>";
}





// -------------------------------------------
// this reads from session array and displays the basket
$total=0;


  echo "<table id='baskettable'>";
  echo "<tr>";
  echo "<th>Product name</th>";
  echo "<th>Price</th>";
  echo "<th>Quantity</th>";
  echo "<th>Subtotal</th>";
  echo "<th>Remove Product</th>";
  echo "</tr>";




if (isset($_SESSION['basket'])) {

foreach ($_SESSION['basket'] as $index => $value) {

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
                  echo "<form action=basket.php method>";
                    echo "<button>Remove</button>";
                    
                    echo "<input type=hidden name=del_prodid value=".$index.">";

                  echo "</form>";
           echo "</td>";






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
      echo "<td>&nbsp</td>";
echo "</tr>";

echo "</table>";

echo "<br><p><a href=clear.php>Clear Basket</a></p>";
echo "<br><p><a href=checkout.php>Check out</a></p>";

echo "<br><p>New homteq customers:  <a href=signin.php>Sign Up</a></p>";
//echo "<p>New Homteq customers: </p>";
echo "<br><p>Returning homteq customers:   <a href=login.php>Log in</a></p>";


include("footfile.html"); //include head layout
echo "</body>";
?>

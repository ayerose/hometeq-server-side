<?php
include("db.php");

$pagename="sign-up"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file

echo "<h4>".$pagename."</h4>"; //display name of the page on the web page


// create form
// the method used to pass the data thru post

echo "<form action=signup_process.php method=post>";
echo "<table id='baskettable'>";

echo "<tr>";
    echo "<td>*First Name </td>";
    echo "<td><input type=text name=r_firstname size= 50></td>";
echo "</tr>";


echo "<tr>";
    echo "<td>*Surname </td>";
    echo "<td><input type=text name=r_surname size= 50></td>";
echo "</tr>";


echo "<tr>";
    echo "<td>*Address</td>";
    echo "<td><input type=text name=r_address size= 50></td>";
echo "</tr>";



echo "<tr>";
    echo "<td>*Postcode </td>";
    echo "<td><input type=text name=r_postcode size= 50></td>";
echo "</tr>";



echo "<tr>";
    echo "<td>*Telephone Number </td>";
    echo "<td><input type=text name=r_telno size= 50></td>";
echo "</tr>";


echo "<tr>";
    echo "<td>*Email </td>";
    echo "<td><input type=text name=r_email size= 50></td>";
echo "</tr>";




echo "<tr>";
    echo "<td>*Password</td>";
    echo "<td><input type=password name=r_password1 size= 50></td>";
echo "</tr>";


echo "<tr>";
    echo "<td>*Confirm Password</td>";
    echo "<td><input type=password name=r_password2 size= 50></td>";
echo "</tr>";


// btns

echo "<tr>";

    echo "<td><input type=reset value='Clear Form'id='submitbtn'></td>";
    echo "<td><input type=submit value='Sign Up'id='submitbtn'></td>";
echo "</tr>";




echo "</table>";
echo "</form>";

















include("footfile.html"); //include head layout
echo "</body>";
?>

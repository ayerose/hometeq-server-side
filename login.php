<?php session_start();
include ("db.php");

$pagename="Login"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page


// create form to login

// when user clicks submit btn form is going to be processed and data  will go to login process by post method
// method = how the data is passed

echo "<form action=login_process.php method=post>";
echo "<table id='baskettable'>";

echo "<tr>";
    echo "<td>Email </td>";
    echo "<td><input type=text name=login_email size= 50></td>";
echo "</tr>";


echo "<tr>";
    echo "<td>Password </td>";
    echo "<td><input type=text name=get_pwd size= 50></td>";
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

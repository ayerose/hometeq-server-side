<?php
session_start();
include ("db.php");
//include ("detectlogin.php");


$pagename="Logout"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page


// unsets session array for basket
unset($_SESSION['basket']);
// destroys entire session
session_destroy();


    echo "<p>Successfully logged out!</p>";





include("footfile.html"); //include head layout
echo "</body>";
?>

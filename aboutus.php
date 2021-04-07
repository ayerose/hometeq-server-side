<?php
session_start();

$pagename="about us"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";

include ("headfile.html"); //include header layout file
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//display random text
echo "<p> Lm vel quam
elementum pulvinar.</p>

 Aliquet eget sit amet tellus cras adipiscing enim eu turpis. Vestibulum lectus
mauris ultrices eros in. Faucibus in ornare quam viverra. Hac habitasse platea dictumst vestibulum
rhoncus. Parturient montes nascetur ridiculus mus. Dui accumsan sit amet nulla facilisi morbi tempus
iaculis urna.";

echo "</body>";
?>

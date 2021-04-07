<?php session_start();
include ("db.php");
//include ("detectlogin.php");


$pagename="Login results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page


// post var's from sign up page using super global var "post"
$loginemail = $_POST['login_email'];
$loginpassword = $_POST['get_pwd'];


//if the mandatory fields in the form (all fields) are not empty, (this checks if empty)

if (empty($loginemail) or empty($loginpassword)) 
{

    echo "<p>Make sure that all fields are filled out</p>";

}  else {

    //echo "<p>Let's check your login details</p>"


        // sql query to retrieve in order check if mail  exists in database
        $loginSQL= "    SELECT * 
                        FROM User
                        WHERE userEmail='".$loginemail."'";
                        
        $exeloginSQL = mysqli_query($conn, $loginSQL) or die (mysqli_error($conn));

        // determine the no of record retrieved by the sql query

        $nbrecs = mysqli_num_rows($exeloginSQL);

        // creates an array and populate it with the records fetched from the execution of sql query

        $arrayuser = mysqli_fetch_array($exeloginSQL);

         // if no of records returned by the query is 0 (if mail not in datababe) 
        if ($nbrecs == 0) {
                echo "<p>Email not recognized!
                </p>";

        } 
        // if no of records returned by the query is 1
        else {

              //echo "<p>Email recognized!</p>";

              // if pw retrieved from the db and now in the array of records $arrayuser doesnt match the pw entered in the form & now in the var $loginpassword

              if ($arrayuser['userPassword']<>$loginpassword) {
                   echo "<p>pw not valid!</p>";

              } 
              // if it matches
              else {
                  
                // create 4 session var's & store the values coming from the DB
                   $_SESSION['userid'] = $arrayuser['userId'];
                   $_SESSION['fname'] = $arrayuser['userFName'];
                   $_SESSION['sname'] = $arrayuser['userSName'];
                   $_SESSION['usertype'] = $arrayuser['userType'];
                   

                     echo "<p>Welcome, ".$_SESSION['fname']." ".$_SESSION['sname']."</p>";


                     if ($_SESSION['usertype'] == 'C') {

                          echo "<p> Continue to shopping or finalise your order</p>";
                     }

              }
        }


}
















include("footfile.html"); //include head layout
echo "</body>";
?>

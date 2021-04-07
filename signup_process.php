<?php
include("db.php");

$pagename="sign up results"; //Create and populate a variable called $pagename
//sign up results
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page


// post var's from sign up page using super global var "post"
$fname = $_POST['r_firstname'];
$sname = $_POST['r_surname'];
$address = $_POST['r_address'];
$postcode = $_POST['r_postcode'];
$telno = $_POST['r_telno'];
$email = $_POST['r_email'];
$pwd1 = $_POST['r_password1'];
$pwd2 = $_POST['r_password2'];

// create regular expression var
$reg = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";


//if the mandatory fields in the form (all fields) are not empty, (this checks if empty)

if (empty($fname) or empty($sname) or empty($address) or empty($postcode) or empty($telno) or empty($email) or empty($pwd1) or empty($pwd2)) 
{

    echo "<p><b>Sign Up failed!</b></p>";
    echo "<p>Make sure that all fields are filled out</p>";

} 



elseif ($pwd1<>$pwd2) {
    echo "<p><b>Sign Up failed!</b></p>";
    echo "<p>Please make sure you enter the same pwd twice</p>";

} 
// IF MAIL DOESNT MATCH PATTERN defined in the regular expressio $reg

elseif (!preg_match($reg, $email)) {
    echo "<p><b>Not valid mail!</b></p>";
}

else {
   // echo "<p><b>Sign Up success!</b></p>";

      // store above details into phpadmin database
    $SQL = "INSERT INTO User

    (userType , userFName, userSName, userAddress , userPostcode, userTelNo, userEmail, userPassword)
    VALUES ('C', '".$fname." ', '".$sname."', '".$address ." ', '".$postcode." ', '".$telno."', '".$email." ', '".$pwd1."')";


    $exeSQL=mysqli_query($conn,$SQL);

    // if error detector returns 0 then all is fine and the record is inserted successfully 

    if (mysqli_errno($conn)== 0) {

         echo "<p><b>Sign Up success!</b></p>";

    } else {
        // 1062 = if mail is duplicated
         if (mysqli_errno($conn)== 1062) {

        echo "<p><b>Sign Up failed! Mail exists already</b></p>";
    }
     if (mysqli_errno($conn)== 1064) {

        echo "<p><b>Invalid char (', /)</b></p>";
    }
}
    

}


// this displays what was entered by user thru form:
/*echo "<p>First Name: ".$fname."</p>";
echo "<p>Surname: ".$sname."</p>";
echo "<p>Address: ".$address."</p>";
echo "<p>Post code: ".$postcode."</p>";
echo "<p>Tel No: ".$telno."</p>";
echo "<p>Email: ".$email."</p>";
echo "<p>1st Pw ".$pwd1."</p>";
echo "<p>2nd Pw: ".$pwd2."</p>";*/


include("footfile.html"); //include head layout
echo "</body>";
?>

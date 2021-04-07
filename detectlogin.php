<?php

// is session "user id " set..
if(isset($_SESSION['userid'])) {


    echo "<p>User logged in: ".$_SESSION['userid']." ".$_SESSION['fname']." ".$_SESSION['sname']."</p>";
}


?>
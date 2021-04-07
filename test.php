<?php
/*
$myArray = array("legal", "lol");

print_r($myArray);

echo $myArray[0];

echo "<br><br>";

$arrayZwei[0] = "Pizza";

$arrayZwei[1] = "Ice";

print_r($arrayZwei);
echo "<br><br>";
unset($myArray["legal"]);
print_r($myArray);
*/


//  if




/*$user = "rey";

if ($user == "rey") {
  echo "heya";
} else {
  echo "ne";
}
*/


//  FOR



/*
$friends = array("rey", "kalif", "hayet", "ray");

foreach ($friends as $key => $value) {
  $friends[$key] = $value." kumpel";

  echo "array element ".$key." ist".$value."<br>";
}



for ($i = 0; $i < sizeof($friends); $i++) {
  echo $friends[$i]."<br>";
}




for ($i = 0; $i <10; $i++) {
  echo $i."<br>";
}
*/






//  WHILE



/*
$friends = array("rey", "kalif", "hayet", "ray");

$i = 0;

while($i < 10) {
  $j = $i *5;

  echo $j."<br>";
  $i++;


 $i = 0;

  while ($i < sizeof($friends)) {
    echo $friends[$i]."<br>",
    $i++;

  }
    */

// MAILS





    $emailTo = "kalif.koura@hotmail.de";

    $subject = "ich sehe dich durch deine cam";

    $body = "...";

    $headers = "from: muhahaha@kelleck.com";

  if   (mail($emailTo, $subject, $body, $headers)) {

      echo "sennnt";
    } else {
      echo "wasnt sent";
    }

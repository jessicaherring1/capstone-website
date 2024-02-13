<?php
// Sample Comment! - Also notice how all PHP starts with <?php and ends with a closing tag?

echo "Hello World<br>"; // echo commands let you write normal HTML (text, tags, etc.)
$myName = "Zane";       // Variables start with a $ and don't specify a data type (int, float, string, etc.)
echo "Hello $myName<br>";   // You can insert variables directly into echo statements to print their values
echo "John said \"Remember to take out the trash!\" <br>";  // If you need to use literal double quotes, remember to use an escape character like \

// Let's do some simple math!
$x = 4;
$y = 5;
$z = $x + $y;
echo "The answer is $z <br>";

// Loops work almost exactly the same as in other languages. Just remember to have $ in front of those variables!
for ($i = 0; $i < 10; $i++){
    echo "$i<br>";
}

// If statements also work pretty much the same
for ($i = 0; $i < 10; $i++){
    if($i == 5){
        echo "$i<br>";
    }
}

// Sometimes its helpful to know what time it is
$t = time();    // This gets Unix (Epoch) time. The number of seconds since Jan. 1 1970
echo "$t seconds<br>";

$t = $t - (6*3600);    // The time may be from the GMT timezone. It's easy to offset it by the number of hours off times 3600

$d = date("Y-m-d g:i:s",$t);    // This formats those seconds into something a little more user friendly
echo "Today is $d<b>";          // You can see more formatting options here: https://www.php.net/manual/en/datetime.format.php


// Form Data
$email = $_POST['email'];   // Extracts the POST data from the 'email' form element and saves it as the variable $email
$link = $_GET['link'];      // Extracts the GET data from the 'link' form element and saves it as the variable $link

// Sometimes we need to redirect users to another page
header("Location: index.php");


// We can save users data with a cookie!
setcookie("userID", $id, time() + (86400 * 30), "/"); // Sets cookie for 30 days
?>
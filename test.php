<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jess";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

$i = 0;

$query = "SELECT issue FROM queue ";
//ORDER BY id DESC";
$result = mysqli_query($conn, $query) or die ("Could not select.");

while ($row = mysqli_fetch_array($result)){
    extract($row);
    //echo"$issue";
    $li = strtolower($issue);
    if(strpos($li, 'zane') !== false){
        echo"$li<br>";
        $i = $i + 1;
    }
    
}	
echo"$i";

// echo "<h2>All Records (any order)</h2>";
// $query = "SELECT * FROM queue ORDER BY id DESC";
// $result = mysqli_query($conn, $query) or die ("Could not select.");
// while ($row = mysqli_fetch_array($result)){
//     extract($row);
//     $newDate = $date - (6 * 3600);
//     $dow = date("N",$newDate);
//     $d = date("Y-m-d g:i:s A",$newDate);

//     if($dow == 1){
//         echo "$id | $d | $name | $category | $issue | $status | $space<br>";
//     }
// }			


?>
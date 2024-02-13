<?php

       // Connect to a database (in this case 2023_399)
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "jess";
       $conn = mysqli_connect($servername, $username, $password, $dbname);
       if (!$conn) {die("Connection failed: " . mysqli_connect_error());}


       // Select all the records in the database (order not important)
    echo "<h2>All Records (any order)</h2>";
    $query = "SELECT * FROM queue ORDER BY id DESC";
    $result = mysqli_query($conn, $query) or die ("Could not select.");
    while ($row = mysqli_fetch_array($result)){
        extract($row);
        $newDate = $date - (6*3600);
        $dow = $d = date("N",$date);    // This formats those seconds into something a little more user friendly
        $d = date("Y-m-d g:i:s A,", $newDate);

        //if($dow == 1){
           // echo "$id | $d | $name | $category | $issue | $status | $space <br>";
       // }
       echo "$id | $d | $name | $category | $issue | $status | $space <br>";
    }

?>
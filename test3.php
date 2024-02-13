<?php

    // ************************************************
    // Connect to a Database
    // ************************************************
    
    // Connect to a database (in this case 2023_399)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jess";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

    // ************************************************
    // SELECT Statement 
    // ************************************************


    $designCount = 0; 
    $printingCount = 0; 
    $arudinoCount = 0; 
    $circuitsCount = 0; 
    $fusionCount = 0; 
    $inkscapeCount = 0; 
    $laserCount = 0; 
    $lifeCount = 0; 
    $metalCount = 0; 
    $miscCount = 0; 
    $paintCount = 0; 
    $processCount = 0; 
    $sewingCount = 0; 
    $vinylCount = 0; 
    $woodCount = 0; 
    // Select all the records in the database (order not important)
    echo "<h2>All Records (any order)</h2>";
    $query = "SELECT category FROM queue";
    $result = mysqli_query($conn, $query) or die ("Could not select.");
    while ($row = mysqli_fetch_array($result)){
        extract($row);

        if($category == "3D Design"){
            $designCount++;
        }
        if($category == "3D Printing"){
            $printingCount++;
        }
        if($category == "Arduino"){
            $arudinoCount++;
        }
        if($category == "Circuits/Soldering"){
            $circuitsCount++;
        }
        if($category == "Fusion 360"){
            $fusionCount++;
        }
        if($category == "Inkscape"){
            $inkscapeCount++;
        }
        if($category == "Laser Cutting"){
            $laserCount++;
        }
        if($category == "Life"){
            $lifeCount++;
        }
        if($category == "Metal Working"){
            $metalCount++;
        }
        if($category == "Miscellaneous"){
            $miscCount++;
        }
        if($category == "Painting"){
            $paintCount++;
        }
        if($category == "Processing"){
            $processCount++;
        }
        if($category == "Sewing"){
            $sewingCount++;
        }
        if($category == "Vinyl Cutting"){
            $vinylCount++;
        }
        if($category == "Woodworking"){
            $woodCount++;
        }
        

    }	
    echo"$printingCount, $arudinoCount, $circuitsCount, $fusionCount, $inkscapeCount, 
                        $laserCount, $lifeCount, $metalCount, $miscCount, $paintCount, $processCount, 
                        $sewingCount, $vinylCount,  $woodCount";


?>
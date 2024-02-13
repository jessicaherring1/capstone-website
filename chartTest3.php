<!doctype html>

<html lang="en" data-bs-theme="auto">
	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Most Common Categories </title>

		<link href="css/bootstrap.min.css" rel="stylesheet">   
		
		
		<script src="js/Chart.min.js"></script>    
		
  	</head>
  	<body>

		<div class="container py-3">
  			<header>
   				<div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
				   <a href="index.php" class="d-flex align-items-center link-body-emphasis text-decoration-none">
       					<span class="fs-4">Most Common Categories</span>
					</a>
    			</div>

 		 	</header>

			<main>

				<h3>Research Questions</h3>



					<div class="col">
						<div class="card mb-4 rounded-3 shadow-sm">
							<div class="card-header py-3">
								<h4 class="my-0 fw-normal">
									QUESTION 3
								</h4>
							</div>
							<div class="card-body">
								<canvas class="my-4 w-100" id="chart3" height="200px"></canvas>
									
							</div>
						</div>
					</div>	

				</div>

			</main>
 
		</div>
		<script src="js/bootstrap.bundle.min.js"></script>
	</body>
</html>

<?php
	// SOME PHP TO GENERATE CHART DATA...


?>



<script>

// Chart 1 - Some Chart For Q1





		// Chart 3 - Some Chart for Question 3
		var config3 = {
			type: 'bar',
			data: {
			  labels: ['3D Design', '3D Printing', 'Arduino', 'Circuits/Soldering', 'Fusion 360', 'Inkscape', 'Laser Cutting', 'Life', 'Metal Working', 'Miscellaneous', 'Painting', 
            'Processing', 'Sewing', 'Vinyl Cutting', 'Woodworking'],
			  datasets: [
				{
					backgroundColor: ["#8A7ED9", "#80D973", "#F2D649", "#DAF7A6", 
                "#FFC300", "#FF5733",  "#C70039", "#900C3F", "#581845", "#888919", 
            "#69947e", "#136f9b", "#ffd797", "#0eabd9", "#a4b9bb" ],
					data:[
                        
                        <?php


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
        if($category == "Misc"){
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
    echo"$designCount, $printingCount, $arudinoCount, $circuitsCount, $fusionCount, $inkscapeCount, 
                        $laserCount, $lifeCount, $metalCount, $miscCount, $paintCount, $processCount, 
                        $sewingCount, $vinylCount,  $woodCount";


                        ?>

                    ],
				},
			  ]
			},
			options: {
				scales: {
					xAxes: [{display: true, scaleLabel: {display: true, labelString: 'Categories'}}],
					yAxes: [{display: true, scaleLabel: {display: true,labelString: 'Number of Instances'}}]
				},
    			legend: {
        			display: false
    			},
			},
		};

		// Loads the Data into the Page
		window.onload = function() {
			var ctx3 = document.getElementById('chart3').getContext('2d'); window.myLine = new Chart(ctx3, config3);
		};
		</script>		
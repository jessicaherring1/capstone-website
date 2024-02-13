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
									<p>Description....</p>
									<p><i>Study Weaknesses: ...</i>
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
			  labels: ['Classroom', 'Clean Prototyping', 'Critique Space', 'Design Studio', 'Metal Shop', 'Paint Studio', 'Office', 'Wearables Lab', 'Woodshop'],
			  datasets: [
				{
					backgroundColor: ["#8A7ED9", "#80D973", "#F2D649", "#DAF7A6", 
                "#FFC300", "#FF5733",  "#C70039", "#900C3F", "#581845" ],
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


                        $classroom = 0; 
                        $cprot = 0; 
                        $crit = 0; 
                        $des = 0; 
                        $metal = 0; 
                        $paint = 0; 
                        $office = 0; 
                        $wear = 0; 
                        $wood = 0; 
                        
                        // Select all the records in the database (order not important)
                        $query = "SELECT category FROM queue";
                        $result = mysqli_query($conn, $query) or die ("Could not select.");
                        while ($row = mysqli_fetch_array($result)){
                            extract($row);

                            if($category == "Classroom"){
                                $classroom++;
                            }
                            if($category == "Clean Prototyping"){
                                $cprot++;
                            }
                            if($category == "Critique Space"){
                                $crit++;
                            }
                            if($category == "Design Studio"){
                                $des++;
                            }
                            if($category == "Metal Shop"){
                                $metal++;
                            }
                            if($category == "Paint Studio"){
                                $paint++;
                            }
                            if($category == "Office"){
                                $office++;
                            }
                            if($category == "Wearables Lab"){
                                $wear++;
                            }
                            if($category == "Woodshop"){
                                $wood++;
                            }
                            

                        }	
                        echo"$classroom, $cprot, $crit, $des, $metal, $paint, 
                                            $office, $wear, $wood";


                        ?>

                    ],
				},
			  ]
			},
			options: {
				scales: {
					xAxes: [{display: true, scaleLabel: {display: true, labelString: 'Some Label'}}],
					yAxes: [{display: true, scaleLabel: {display: true,labelString: 'Some Label'}}]
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
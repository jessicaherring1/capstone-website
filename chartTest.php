<!doctype html>

<html lang="en" data-bs-theme="auto">
	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>XXX</title>

		<link href="css/bootstrap.min.css" rel="stylesheet">   

		<link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
		<link rel="manifest" href="images/site.webmanifest">	
		
		
		<script src="js/Chart.min.js"></script>    
		
  	</head>
  	<body>

		<div class="container py-3">
  			<header>
   				<div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
				   <a href="index.php" class="d-flex align-items-center link-body-emphasis text-decoration-none">
       					<span class="fs-4">XXX</span>
					</a>

      				<nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
					  	<a class="me-3 py-2 link-body-emphasis text-decoration-none" href="home.php">Home</a>
	  					<a class="me-3 py-2 link-body-emphasis text-decoration-none" href="about.php">About XXX</a>
	  					<a class="me-3 py-2 link-body-emphasis text-decoration-none" href="logout.php">Log Out</a>
      				</nav>
    			</div>

 		 	</header>

			<main>
				<h3>User Statistics</h3>
				<div class="row row-cols-5 row-cols-md-5 mb-5 text-center">
				
				</div>

				<h3>Research Questions</h3>
				<div class="row row-cols-1 row-cols-md-1 mb-1 text-center">
					<div class="col">
							<div class="card mb-4 rounded-3 shadow-sm">
								<div class="card-header py-3">
									<h4 class="my-0 fw-normal">
										QUESTION 1
									</h4>
								</div>
								<div class="card-body">
									<canvas class="my-4 w-100" id="chart1" height="300px"></canvas>
									<p>Description....</p>
									<p><i>Study Weaknesses: ...</i>
								</div>
							</div>
						</div>	
				</div>


				<div class="row row-cols-2 row-cols-md-2 mb-2 text-center">

					<div class="col">
						<div class="card mb-4 rounded-3 shadow-sm">
							<div class="card-header py-3">
								<h4 class="my-0 fw-normal">
									QUESTION 2
								</h4>
							</div>
							<div class="card-body">
								<canvas class="my-4 w-100" id="chart2" height="200px"></canvas>
								<p>Description....</p>
								<p><i>Study Weaknesses: ...</i>
							</div>
						</div>
					</div>	

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

			<footer class="pt-4 my-md-5 pt-md-5 border-top">
    			<div class="row">
      				<div class="col-12 col-md">
        				<small class="d-block mb-3 text-body-secondary">Created by XXX</small>
      				</div>
				</div>
			</footer>
 
		</div>
		<script src="js/bootstrap.bundle.min.js"></script>
	</body>
</html>

<?php
	// SOME PHP TO GENERATE CHART DATA...


?>



<script>

// Chart 1 - Some Chart For Q1

var config1 = {
			type: 'scatter',
 			data: {
        		datasets: [
        			{
						label: 'Person A',
						backgroundColor: "#45B28F",
						pointRadius: 8,
						data:[
							{x: 2, y: 10}, 
							{x: 6, y: 2}, 
						]
        			},
        			
        			{
						label: 'Person B',
						backgroundColor: "#F0604D",
						pointRadius: 8,
						data:[
							{x: 10, y: 2}, 
							{x: 2, y: 6}, 
						]
        			},        			
        		]
    		},			
			options: {
				scales: {
					xAxes: [{ticks:{min: 0, max:10}, stacked: true, display: true, scaleLabel: {display: true, labelString: 'XXX'}}],
					yAxes: [{ticks:{min: 0, max:10}, stacked: true, display: true, scaleLabel: {display: true,labelString: 'XXX'}}]
				}	
			}
		};


		// Chart 2 - Chart for Q2
		var config2 = {
			type: 'pie',
			data: {
			  labels: ['Something A','Something B',],
			  datasets: [
				{
					backgroundColor: ["#8A7ED9", "#80D973"],
					data:[34, 89],
				},
			  ]
			},
		};

		// Chart 3 - Some Chart for Question 3
		var config3 = {
			type: 'bar',
			data: {
			  labels: ['Something A','Something B','Something C'],
			  datasets: [
				{
					backgroundColor: ["#8A7ED9", "#80D973", "#F2D649"],
					data:[24, 34, 13],
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
			var ctx1 = document.getElementById('chart1').getContext('2d'); window.myLine = new Chart(ctx1, config1);
			var ctx2 = document.getElementById('chart2').getContext('2d'); window.myLine = new Chart(ctx2, config2);
			var ctx3 = document.getElementById('chart3').getContext('2d'); window.myLine = new Chart(ctx3, config3);
		};
		</script>		
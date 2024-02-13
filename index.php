<!doctype html>
<html lang="en" data-bs-theme="auto">
	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Example Page</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">   
  	</head>
  	<body>

		<div class="container py-3">
  			<header>
   				<div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
      				<a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none">
       					<span class="fs-4">Project Name or Logo</span>
					</a>

      				<nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
	  					<a class="me-3 py-2 link-body-emphasis text-decoration-none" href="sampleLink1.php">Sample Link 1</a>
	  					<a class="me-3 py-2 link-body-emphasis text-decoration-none" href="sampleLink2.php">Sample Link 2</a>
	  					<a class="me-3 py-2 link-body-emphasis text-decoration-none" href="sampleLink3.php">Sample Link 3</a>
      				</nav>
    			</div>

    			<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      				<h1 class="display-4 fw-normal text-body-emphasis">Big Title</h1>
      				<p class="fs-5 text-body-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat interdum cursus.</p>
    			</div>
 		 	</header>

			<main>


				<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
					<div class="col">
        				<div class="card mb-4 rounded-3 shadow-sm">
          					<div class="card-header py-3">
            					<h4 class="my-0 fw-normal">Text</h4>
          					</div>
          					<div class="card-body">
            					<h1 class="card-title pricing-card-title">Big Info</h1>
            					<ul class="list-unstyled mt-3 mb-4">
              						<li>Small Info</li>
              						<li>Small Info</li>
            					</ul>
            					<a href="buttonlink.php">
									<button type="button" class="w-100 btn btn-lg btn-outline-primary">Button</button>
								</a>
          					</div>
        				</div>
      				</div>

					  <div class="col">
        				<div class="card mb-4 rounded-3 shadow-sm">
          					<div class="card-header py-3">
            					<h4 class="my-0 fw-normal">Text</h4>
          					</div>
          					<div class="card-body">
            					<h1 class="card-title pricing-card-title">Big Info</h1>
            					<ul class="list-unstyled mt-3 mb-4">
              						<li>Small Info</li>
              						<li>Small Info</li>
            					</ul>
            					<a href="buttonlink.php">
									<button type="button" class="w-100 btn btn-lg btn-outline-primary">Button</button>
								</a>
          					</div>
        				</div>
      				</div>

					<div class="col">
        				<div class="card mb-4 rounded-3 shadow-sm">
          					<div class="card-header py-3">
            					<h4 class="my-0 fw-normal">Sample Form</h4>
          					</div>
          					<div class="card-body">

								<form action="someFormPage.php" method="post">
    								<div class="form-floating">
      									<input type="email" class="form-control" id="sampleEmail" name="sampleEmail" required>
      									<label for="sampleEmail">Email</label>
    								</div>
    								<br>
									<div class="form-floating">
      									<input type="password" class="form-control" id="samplePass" name="samplePass">
      									<label for="samplePass">Password</label>
   									 </div>
									<br>

									<div class="form-floating">
										<input type="datetime-local" class="form-control" id="sampleTime" name="sampleTime">
										<label for="sampleTime">Sample Time</label>
   									</div>
									<br>

									<div class="form-floating">
										<select class="form-control" id="colors" name="colors">
											<option value="red">Red</option>
											<option value="green">Green</option>
											<option value="blue">Blue</option>
										</select>
										<label for="colors">Favorite Color</label>
									</div>
									<br>

									<button class="btn btn-primary w-100 py-2" type="submit">Submit</button>
								</form>

							</div>
        				</div>
      				</div>
				</div>


				<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      				<h2>Sample Data</h2>
      				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat interdum cursus.</p>
    			</div>

				<div class="table-responsive">
					<table class="table text-center">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Favorite Color</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Zane</td>
								<td>Cochran</td>
								<td>Pink</td>
							</tr>
							<tr>
								<td>Graham</td>
								<td>Widmann</td>
								<td>Blue</td>
							</tr>
						</tbody>
					</table>
				</div>


			</main>


			<footer class="pt-4 my-md-5 pt-md-5 border-top">
    			<div class="row">
      				<div class="col-12 col-md">
        				<small class="d-block mb-3 text-body-secondary">Small Footer Text</small>
      				</div>
				</div>
			</footer>
 
		</div>
		<script src="js/bootstrap.bundle.min.js"></script>
	</body>
</html>
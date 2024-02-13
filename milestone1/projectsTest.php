<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jess"; // Adjust to your actual database name
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize arrays for categories and weekly data aggregation
$categories = ['3D Design', '3d Printing', 'Arduino', 'Circuits/Soldering', 'Fusion 360', 'Inkscape', 'Laser Cutting', 'Life', 'Metal Working', 'Miscellaneous', 'Painting', 'Processing', 'Sewing', 'Vinyl Cutting', 'Woodworking'];
$weeklyData = [];

// Set the start date of the semester
$semesterStart = new DateTime('2022-08-01');
$semesterEnd = new DateTime('2022-12-31');

// Query the database
$query = "SELECT category, FROM_UNIXTIME(date - 10800) AS adjusted_datetime FROM queue WHERE date BETWEEN UNIX_TIMESTAMP('2022-08-01') - 10800 AND UNIX_TIMESTAMP('2022-12-31') - 10800";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

while ($row = mysqli_fetch_assoc($result)) {
    $category = $row['category'];
    $adjustedDatetime = new DateTime($row['adjusted_datetime']);
    
    // Check if the category is one of the specified types
    if (in_array($category, $categories)) {
        $weekNumber = intval($adjustedDatetime->format("W")) - intval($semesterStart->format("W")) + 1;
        
        // Initialize the weekly data array for the category if not already set
        if (!isset($weeklyData[$weekNumber])) {
            $weeklyData[$weekNumber] = array_fill_keys($categories, 0);
        }
        
        // Increment the count for the category in the specific week
        $weeklyData[$weekNumber][$category]++;
    }
}

mysqli_close($conn);

// Prepare the data for Chart.js
$labels = range(1, 16); // Assuming a 16-week semester
$datasets = [];

foreach ($categories as $category) {
    $data = [];
    foreach ($labels as $week) {
        $data[] = $weeklyData[$week][$category] ?? 0; // Use 0 if no data for the category in the week
    }
    
    $datasets[] = [
        'label' => $category,
        'data' => $data,
        // Assign colors or use a function to generate unique colors for each category
        'backgroundColor' => "rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", 0.5)",
    ];
}

// JSON encode the labels and datasets for use in the Chart.js initialization
$jsonLabels = json_encode($labels);
$jsonDatasets = json_encode($datasets);

echo "<script src='https://cdn.jsdelivr.net/npm/chart.js'></script>";
echo "<canvas id='fallSemesterChart' width='800' height='400'></canvas>";
echo "<script>
var ctx = document.getElementById('fallSemesterChart').getContext('2d');
var fallSemesterChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: $jsonLabels,
        datasets: $jsonDatasets
    },
    options: {
        scales: {
            x: { stacked: true },
            y: { stacked: true }
        }
    }
});
</script>";


?>

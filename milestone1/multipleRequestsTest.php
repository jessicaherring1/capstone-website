<?php

// Connect to a database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jess"; // Your actual database name
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize an array to store counts of entries per name per night, accounting for name capitalization
$entriesCountPerNameNight = [];

$query = "SELECT name, FROM_UNIXTIME(date) AS entry_datetime FROM queue ORDER BY date";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

// Define the start and end of the desired date range
$startDate = new DateTime('2022-08-01');
$endDate = new DateTime('2023-05-31');

while ($row = mysqli_fetch_assoc($result)) {
    // Convert name to lowercase to ensure case-insensitive comparison
    $name = strtolower($row['name']);
    $entryDatetime = new DateTime($row['entry_datetime']);
    
    // Adjust entry time by subtracting 3 hours to account for the offset
    $entryDatetime->modify('-3 hours');
    
    // Exclude dates outside the specified range
    if ($entryDatetime < $startDate || $entryDatetime > $endDate) {
        continue;
    }
    
    // Only consider times between 6 PM (18) and 12 AM (23)
    $hour = (int)$entryDatetime->format('G');
    if ($hour >= 18 && $hour <= 23) {
        $night = $entryDatetime->format('Y-m-d');
        
        // Create a unique key for each name-night combination
        $key = $name . '-' . $night;
        
        if (!isset($entriesCountPerNameNight[$key])) {
            $entriesCountPerNameNight[$key] = 1;
        } else {
            $entriesCountPerNameNight[$key]++;
        }
    }
}

// Close database connection
mysqli_close($conn);

// Print names (in lowercase for consistency) and number of requests for comparison
//echo "<h3>Entries Per Individual Per Night (6 PM to 12 AM, Aug 2022 - May 2023)</h3>";
foreach ($entriesCountPerNameNight as $key => $count) {
    list($name, $night) = explode('-', $key);
    //echo "<p>" . ucfirst($name) . " on {$night}: {$count} request(s)</p>"; // ucfirst() to capitalize for readability
}

// Aggregate counts to see how many instances of each number of requests were made
$instancesOfRequestNumbers = array_count_values($entriesCountPerNameNight);
ksort($instancesOfRequestNumbers);

// Data preparation for visualization
$labels = array_keys($instancesOfRequestNumbers);
$data = array_values($instancesOfRequestNumbers);

// Include Chart.js library
echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';

// Output the chart for instances of each number of requests
echo "<h2>How often do people make more than one entry in a given night? </h2>";
echo "<canvas id='requestNumbersChart' width='400' height='200'></canvas>";
echo "<script>";
echo "var ctx = document.getElementById('requestNumbersChart').getContext('2d');";
echo "var requestNumbersChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: " . json_encode($labels) . ",
        datasets: [{
            label: 'Instances',
            data: " . json_encode($data) . ",
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Number of Instances'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Number of Requests'
                }
            }
        }
    }
});";
echo "</script>";

?>

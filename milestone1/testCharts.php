<?php

// Connect to a database (in this case 2023_399)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jess";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize arrays to store count of help requests per day of week and hour of day
$requests_per_day = array_fill(1, 7, 0); // Index 1 represents Monday, 7 represents Sunday
$requests_per_hour = array_fill(1, 24, 0); // Index 0 represents 12:00 AM, 23 represents 11:00 PM

// Select all the records in the database (order not important)
$query = "SELECT * FROM queue ORDER BY id DESC";
$result = mysqli_query($conn, $query) or die("Could not select.");
while ($row = mysqli_fetch_array($result)) {
    extract($row);
    // Extract day of week (1 for Monday, 7 for Sunday) and increment corresponding count
    $adjusted_date = strtotime("-3 hours", $date);
    $year = date("Y", $adjusted_date);
    $dow = date("N", $adjusted_date); //0 for sunday, 6 for saturday
    $hour = date("G", $adjusted_date)+1;
    if($dow == 7){
        //echo"$id | $hour | $name | $category | $issue | $status | $space <br>";
    }
    $requests_per_day[$dow]++;

    // Extract hour of day in 24-hour format and increment corresponding count
    //$hour = date("G", $date) + 1; 
    if ($hour >= 1 && $hour <= 24) {
        $requests_per_hour[$hour]++;
    }
}

// Close database connection
mysqli_close($conn);

// Include Chart.js library
echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';

// Output bar chart for help requests per day of week
echo "<h2>Help Requests Per Day of Week</h2>";
echo "<canvas id='requestsPerDayChart' width='400' height='200'></canvas>";
echo "<script>";
echo "var ctx = document.getElementById('requestsPerDayChart').getContext('2d');";
echo "var requestsPerDayChart = new Chart(ctx, {";
echo "    type: 'bar',";
echo "    data: {";
echo "        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],";
echo "        datasets: [{";
echo "            label: 'Help Requests',";
echo "            data: " . json_encode(array_values($requests_per_day)) . ",";
echo "            backgroundColor: 'rgba(75, 192, 192, 0.2)',";
echo "            borderColor: 'rgba(75, 192, 192, 1)',";
echo "            borderWidth: 1";
echo "        }]";
echo "    },";
echo "    options: {";
echo "        scales: {";
echo "            y: {";
echo "                beginAtZero: true";
echo "            }";
echo "        }";
echo "    }";
echo "});";
echo "</script>";

// Output bar chart for help requests per hour of day
echo "<h2>Help Requests Per Hour of Day</h2>";
echo "<canvas id='requestsPerHourChart' width='400' height='200'></canvas>";
echo "<script>";
echo "var ctx2 = document.getElementById('requestsPerHourChart').getContext('2d');";
echo "var requestsPerHourChart = new Chart(ctx2, {";
echo "    type: 'bar',";
echo "    data: {";
echo "        labels: [" . implode(",", range(1, 24)) . "],"; // Adjusted labels from 1 to 24
echo "        datasets: [{";
echo "            label: 'Help Requests',";
echo "            data: " . json_encode(array_values($requests_per_hour)) . ",";
echo "            backgroundColor: 'rgba(255, 99, 132, 0.2)',";
echo "            borderColor: 'rgba(255, 99, 132, 1)',";
echo "            borderWidth: 1";
echo "        }]";
echo "    },";
echo "    options: {";
echo "        scales: {";
echo "            y: {";
echo "                beginAtZero: true";
echo "            }";
echo "        }";
echo "    }";
echo "});";
echo "</script>";

?>

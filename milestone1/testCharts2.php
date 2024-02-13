
<?php
// Connect to a database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jess";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize arrays for both years and for day of week and hour of day
$requests_per_day_2022 = array_fill(1, 7, 0);
$requests_per_day_2023 = array_fill(1, 7, 0);
$requests_per_hour_2022 = array_fill(1, 24, 0);
$requests_per_hour_2023 = array_fill(1, 24, 0);

$query = "SELECT * FROM queue ORDER BY id DESC";
$result = mysqli_query($conn, $query) or die("Could not select.");
while ($row = mysqli_fetch_array($result)) {
    extract($row);
    // Adjust date by subtracting 3 hours
    $adjusted_date = strtotime("-3 hours", $date);
    echo"$date, $adjusted_date<br>";
    $year = date("Y", $adjusted_date);
    $dow = date("N", $adjusted_date);
    $hour = date("G", $adjusted_date);

    // Increment counters based on year
    if ($year == "2022") {
        $requests_per_day_2022[$dow]++;
        if ($hour >= 1 && $hour <= 24) {
            $requests_per_hour_2022[$hour]++;
        }
    } elseif ($year == "2023") {
        $requests_per_day_2023[$dow]++;
        if ($hour >= 1 && $hour <= 24) {
            $requests_per_hour_2023[$hour]++;
        }
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
echo "        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],";
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


mysqli_close($conn);

// Include the Chart.js library
echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';

// Output bar chart for help requests per day of week for 2022
echo "<h2>Help Requests Per Day of Week (2022)</h2>";
echo "<canvas id='requestsPerDayChart2022' width='400' height='200'></canvas>";
echo "<script>";
echo "var ctx2022 = document.getElementById('requestsPerDayChart2022').getContext('2d');";
echo "var requestsPerDayChart2022 = new Chart(ctx2022, {";
echo "    type: 'bar',";
echo "    data: {";
echo "        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],";
echo "        datasets: [{";
echo "            label: 'Help Requests (2022)',";
echo "            data: " . json_encode(array_values($requests_per_day_2022)) . ",";
echo "            backgroundColor: 'rgba(54, 162, 235, 0.2)',";
echo "            borderColor: 'rgba(54, 162, 235, 1)',";
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

// Output bar chart for help requests per day of week for 2023
echo "<h2>Help Requests Per Day of Week (2023)</h2>";
echo "<canvas id='requestsPerDayChart2023' width='400' height='200'></canvas>";
echo "<script>";
echo "var ctx2023 = document.getElementById('requestsPerDayChart2023').getContext('2d');";
echo "var requestsPerDayChart2023 = new Chart(ctx2023, {";
echo "    type: 'bar',";
echo "    data: {";
echo "        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],";
echo "        datasets: [{";
echo "            label: 'Help Requests (2023)',";
echo "            data: " . json_encode(array_values($requests_per_day_2023)) . ",";
echo "            backgroundColor: 'rgba(255, 206, 86, 0.2)',";
echo "            borderColor: 'rgba(255, 206, 86, 1)',";
echo "            borderWidth: 1";
echo "        }]";
echo "    },";
echo "    options: {";
echo "        scales: {";
echo "            y: {";
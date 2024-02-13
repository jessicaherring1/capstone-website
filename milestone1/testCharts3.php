
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

// Initialize arrays to store count of help requests per day of week and hour of day
$requests_per_day = array_fill(1, 7, 0); // Adjusted for Monday(1) through Sunday(7)
$requests_per_hour = array_fill(0, 23, 0); // Corrected to start from 0 (12:00 AM) to 23 (11:00 PM)

// Define the start and end of the desired date range in Y-m-d format
$start_date = strtotime("2022-08-01"); // August 1, 2022
$end_date = strtotime("2023-05-31"); // May 31, 2023

// Select all the records in the database
$query = "SELECT * FROM queue ORDER BY id DESC";
$result = mysqli_query($conn, $query) or die("Could not select.");
while ($row = mysqli_fetch_array($result)) {
    extract($row);
    // Adjust the epoch time and subtract 3 hours
    $adjusted_date = strtotime("-3 hours", $date);

    // Filter data to include only from August 2022 to May 2023
    if ($adjusted_date >= $start_date && $adjusted_date <= $end_date) {
        $year = date("Y", $adjusted_date);
        $dow = date("N", $adjusted_date); // 1 for Monday, 7 for Sunday
        $hour = date("G", $adjusted_date); // Adjusted here, removed +1

        $requests_per_day[$dow]++;

        // Ensure $hour is within the 0-23 range
        if ($hour >= 0 && $hour < 24) {
            $requests_per_hour[$hour]++;
        }
    }
}

// Close database connection
mysqli_close($conn);

// Include Chart.js library and the rest of the script remains the same...


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
echo "        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],"; // Corrected to include all days
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
echo "        labels: [" . implode(",", range(0, 23)) . "],"; // Corrected labels to match 0-23 hours
echo "        datasets: [{";
echo "            label: 'Help Requests',";
echo "            data: " . json_encode(array_values($requests_per_hour)) . ",";
echo "            backgroundColor: 'rgba(255, 99, 132, 0.2)',";
echo "            borderColor: 'rgba(255,             132, 1)',";
echo "            borderWidth: 1";
echo "        }]";
echo "    },";
echo "    options: {";
echo "        scales: {";
echo "            y: {";
echo "                beginAtZero: true";
echo "            },";
echo "            x: {";
echo "                title: {";
echo "                    display: true,";
echo "                    text: 'Hour of Day'";
echo "                }";
echo "            }";
echo "        }";
echo "    }";
echo "});";
echo "</script>";
?>

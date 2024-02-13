<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jess";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Categories of help requested
$categories = ['3D Design', '3d Printing', 'Arduino', 'Circuits/Soldering', 'Fusion 360', 'Inkscape', 'Laser Cutting', 'Life', 'Metal Working', 'Miscellaneous', 'Painting', 'Processing', 'Sewing', 'Vinyl Cutting', 'Woodworking'];

// Initialize arrays for weekly data aggregation
$weeklyDataFall = array_fill(1, 16, array_fill_keys($categories, 0));
$weeklyDataSpring = array_fill(1, 16, array_fill_keys($categories, 0));

// Function to populate weekly data
function populateWeeklyData($conn, &$weeklyData, $categories, $startDate, $endDate) {
    $query = "SELECT category, FROM_UNIXTIME(date - 10800) AS adjusted_datetime FROM queue WHERE date BETWEEN UNIX_TIMESTAMP('$startDate') - 10800 AND UNIX_TIMESTAMP('$endDate') - 10800 AND category IN ('" . implode("', '", $categories) . "')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $semesterStart = new DateTime($startDate);

    while ($row = mysqli_fetch_assoc($result)) {
        $category = $row['category'];
        $adjustedDatetime = new DateTime($row['adjusted_datetime']);

        if (!in_array($category, $categories)) continue;

        $weekOfYear = intval($adjustedDatetime->format("W"));
        $semesterWeekStart = intval($semesterStart->format("W"));
        $weekNumber = $weekOfYear - $semesterWeekStart + 1;
        
        if ($weekNumber >= 1 && $weekNumber <= 16) {
            $weeklyData[$weekNumber][$category]++;
        }
    }
}

// Populate data for Fall 2022 and Spring 2023 semesters
populateWeeklyData($conn, $weeklyDataFall, $categories, '2022-08-01', '2022-12-31');
populateWeeklyData($conn, $weeklyDataSpring, $categories, '2023-01-01', '2023-05-31');

mysqli_close($conn);

// Function to prepare datasets for Chart.js
function prepareDatasets($weeklyData, $categories) {
    $datasets = [];
    foreach ($categories as $category) {
        $data = array_map(function ($week) use ($category) {
            return $week[$category] ?? 0;
        }, $weeklyData);
        
        $datasets[] = [
            'label' => $category,
            'data' => $data,
            'backgroundColor' => sprintf('rgba(%d, %d, %d, 0.5)', rand(100, 255), rand(100, 255), rand(100, 255)),
        ];
    }
    return $datasets;
}

// Prepare datasets for Chart.js
$jsonDatasetsFall = json_encode(prepareDatasets(array_values($weeklyDataFall), $categories));
$jsonDatasetsSpring = json_encode(prepareDatasets(array_values($weeklyDataSpring), $categories));
$jsonLabels = json_encode(array_map(function ($i) { return "Week $i"; }, range(1, 16)));

echo "<script src='https://cdn.jsdelivr.net/npm/chart.js'></script>";
?>

<h2>Fall 2022 Semester Help Requests</h2>
<canvas id="fallSemesterChart" width="800" height="400"></canvas>
<script>
var ctxFall = document.getElementById('fallSemesterChart').getContext('2d');
new Chart(ctxFall, {
    type: 'bar',
    data: {
        labels: <?php echo $jsonLabels; ?>,
        datasets: <?php echo $jsonDatasetsFall; ?>
    },
    options: {
        scales: {
            x: { stacked: true },
            y: { stacked: true }
        },
        plugins: {
            title: {
                display: true,
                text: 'Fall 2022 Semester Help Requests'
            },
            legend: {
                display: true,
                position: 'bottom'
            }
        }
    }
});
</script>

<h2>Spring 2023 Semester Help Requests</h2>
<canvas id="springSemesterChart" width="800" height="400"></canvas>
<script>
var ctxSpring = document.getElementById('springSemesterChart').getContext('2d');
new Chart(ctxSpring, {
    type: 'bar',
    data: {
        labels: <?php echo $jsonLabels; ?>,
        datasets: <?php echo $jsonDatasetsSpring; ?>
    },
    options: {
        scales: {
            x: { stacked: true },
            y: { stacked: true }
        },
        plugins: {
            title: {
                display: true,
                text: 'Spring 2023 Semester Help Requests'
            },
            legend: {
                display: true,
                position: 'bottom'
            }
        }
    }
});
</script>


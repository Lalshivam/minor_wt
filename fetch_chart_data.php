<?php
include 'db.php';

// Time-Series Data: Number of patients admitted per month
$timeSeriesQuery = "SELECT DATE_FORMAT(date_of_entry, '%Y-%m') AS month, COUNT(*) AS count 
                    FROM patients 
                    GROUP BY month 
                    ORDER BY month";
$timeSeriesResult = $conn->query($timeSeriesQuery);
$timeSeriesData = [];
while ($row = $timeSeriesResult->fetch_assoc()) {
    $timeSeriesData['labels'][] = $row['month'];
    $timeSeriesData['values'][] = $row['count'];
}

// Pie Chart Data: Distribution of diseases
$pieChartQuery = "SELECT disease, COUNT(*) AS count 
                  FROM patients 
                  GROUP BY disease 
                  ORDER BY count DESC";
$pieChartResult = $conn->query($pieChartQuery);
$pieChartData = [];
while ($row = $pieChartResult->fetch_assoc()) {
    $pieChartData['labels'][] = $row['disease'];
    $pieChartData['values'][] = $row['count'];
}

// Bar Graph Data: Number of patients per hospital
$barGraphQuery = "SELECT hospitals.name AS hospital_name, COUNT(patients.id) AS count 
                  FROM hospitals 
                  LEFT JOIN patients ON hospitals.id = patients.hospital_id 
                  GROUP BY hospitals.id 
                  ORDER BY count DESC";
$barGraphResult = $conn->query($barGraphQuery);
$barGraphData = [];
while ($row = $barGraphResult->fetch_assoc()) {
    $barGraphData['labels'][] = $row['hospital_name'];
    $barGraphData['values'][] = $row['count'];
}

// Combine all data
$response = [
    'timeSeries' => $timeSeriesData,
    'pieChart' => $pieChartData,
    'barGraph' => $barGraphData,
];

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
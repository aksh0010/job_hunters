<?php
// Start the session
session_start();

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include 'jobseeker_navbar.php';
require "./connection.php";

// Validate and sanitize the user input
// $jobseeker_id = intval($_SESSION['jobseeker_id']);
// $jobseeker_id =7;

$nothing_to_bind = $_SESSION['jobseeker_id'];

$sql = "SELECT * FROM jobs WHERE job_id IN (SELECT DISTINCT job_id FROM applications WHERE jobseeker_id = ?);";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $nothing_to_bind);
if (!$stmt->execute()) {
    // Handle errors here
    die("Error executing statement: " . $stmt->error);
}
$result = $stmt->get_result();

// echo "Your HR ID: " . htmlspecialchars($jobseeker_id) . "<br>";
// echo "HELOOOOOO<br>";

// Display job information
if ($result->num_rows > 0) {
    echo <<<HTML
        <table> 
            <tr> 
            <th>Job ID</th>
                    <th>Title </th>
                    <th>Location</th>
                    <th>Salary</th>
                    <th>Description</th>
                    <th>Appliance Received </th>
                    <th>Available positions </th>
            </tr>


    HTML;

    while ($row = $result->fetch_assoc()) {

        echo <<<HTML

        <tr>
        <td> {$row['job_id']}</td>
            <td> {$row['title']}</td>
            <td> {$row["location"]}</td>
            <td> {$row["salary"]}</td>
            <td> {$row["description"]}</td>
            <td> {$row["appliance_received"]}</td>
            <td> {$row["available_positions"]}</td>
        </tr>
    HTML;
}
echo "</table>";

} else {
    echo '<div style="color: red; font-weight: bold;">No jobs found </div>';
    
}


// Include the CSS code in the head section of your HTML document
echo <<<HTML
<html>
    <head>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
                max-width: 800px;
                margin: 0 auto;
            }
            th, td {
                text-align: left;
                padding: 8px;
                border: 1px solid #ddd;
            }
            th {
                background-color: #4CAF50;
                color: white;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
HTML;

// Your HTML and PHP code here

echo <<<HTML
    </body>
</html>
HTML;
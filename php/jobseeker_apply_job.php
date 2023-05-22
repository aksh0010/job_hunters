<?php
// Start the session
session_start();

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Include navbar and database connection files
include 'jobseeker_navbar.php';
require "./connection.php";

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the selected job IDs
    $job_ids = array_map('intval', $_POST['job_ids']);
    
    // Get the jobseeker ID
    $jobseeker_id = intval($_SESSION['jobseeker_id']);

    // Loop through submitted job IDs and insert them into the jobseeker_jobs table
    foreach ($job_ids as $job_id) {
        $sql = "INSERT INTO applications (job_id, jobseeker_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $job_id, $jobseeker_id);
        if (!$stmt->execute()) {
            // Handle errors here
            die("Error executing statement: " . $stmt->error);
        }
    }
    // Redirect to a new page
    echo '<div style="color: green; font-weight: bold;">Job Application Sent successfully</div>';
    // include "./jobseeker_navbar.php";
    exit();
}

// Validate and sanitize the user input
$jobseeker_id = intval($_SESSION['jobseeker_id']);

// Prepare and execute SQL query
$sql = "SELECT * FROM jobs WHERE job_id NOT IN (SELECT job_id FROM applications WHERE jobseeker_id = ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $jobseeker_id);
if (!$stmt->execute()) {
    // Handle errors here
    die("Error executing statement: " . $stmt->error);
}
$result = $stmt->get_result();

// Display job information and apply options
if ($result->num_rows > 0) {
    echo <<<HTML
        <form method="post">
        <table> 
            <tr> 
                    <th>Title</th>
                    <th>Location</th>
                    <th>Salary</th>
                    <th>Description</th>
                    <th>Apply</th>
            </tr>
    HTML;

    while ($row = $result->fetch_assoc()) {
        $job_id = $row['job_id'];

        echo <<<HTML
        <tr>
            <td>{$row['title']}</td>
            <td>{$row['location']}</td>
            <td>{$row['salary']}</td>
            <td>{$row['description']}</td>
            <td><input type="checkbox" name="job_ids[]" value="$job_id"></td>
        </tr>
    HTML;
    }

    echo <<<HTML
    </table>
    <br>
    <button type="submit" name="apply_jobs" class="btn btn-primary">Apply Selected Jobs</button>
    </form>
HTML;


} else {
    echo '<div style="color: red; font-weight: bold;"> No jobs found </div>';
}

// Include the CSS code in the head section of your HTML document


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
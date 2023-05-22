<?php
// Start the session

session_start();
if (isset($_POST['edit_jobs'])) {
    // Get the selected job IDs
    $job_ids = $_POST['job_ids'];

    // Redirect to a new page where the user can edit the selected jobs
    if ($job_ids === null) {
        // handle error
        echo "No jobs found.";
    } else {
        header("Location: edit_jobs.php?job_ids=" . implode(",", $job_ids));
        exit();
    }
    exit();
}
// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include 'hr_navbar.php';
require "./connection.php";

// Validate and sanitize the user input
$hr_account_id = intval($_SESSION['hr_id']);
// $hr_account_id =7;

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Loop through submitted job IDs and update the database
    foreach ($_POST['job_ids'] as $job_id) {
        $title = $_POST['title'][$job_id];
        $location = $_POST['location'][$job_id];
        $salary = $_POST['salary'][$job_id];
        $description = $_POST['description'][$job_id];

        $sql = "UPDATE jobs SET title = ?, location = ?, salary = ?, description = ? WHERE id = ? AND hr_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssii", $title, $location, $salary, $description, $job_id, $hr_account_id);
        if (!$stmt->execute()) {
            // Handle errors here
            die("Error executing statement: " . $stmt->error);
        }
    }
}

// Prepare and execute SQL query
$sql = "SELECT * FROM jobs WHERE hr_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $hr_account_id);
if (!$stmt->execute()) {
    // Handle errors here
    die("Error executing statement: " . $stmt->error);
}
$result = $stmt->get_result();

// echo "Your HR ID: " . htmlspecialchars($hr_account_id) . "<br>";

// Display job information and edit options
if ($result->num_rows > 0) {
    echo <<<HTML
        <form method="post">
        <table> 
            <tr> 
                    <th>Title</th>
                    <th>Location</th>
                    <th>Salary</th>
                    <th>Description</th>
                    
                    <th>Edit</th>
            </tr>
    HTML;

    while ($row = $result->fetch_assoc()) {
        $job_id = $row['job_id'];

        echo <<<HTML
        <tr>
            <td><input type="text" name="title[$job_id]" value="{$row['title']}"></td>
            <td><input type="text" name="location[$job_id]" value="{$row['location']}"></td>
            <td><input type="text" name="salary[$job_id]" value="{$row['salary']}"></td>
            <td><input type="text" name="description[$job_id]" value="{$row['description']}"></td>
            <td><input type="checkbox" name="job_ids[]" value="$job_id"></td>
        </tr>
    HTML;
    }

    echo <<<HTML
    </table>
    <br>
    <button type="submit" name="edit_jobs" class="btn btn-primary">Edit Selected Jobs</button>
    </form>
HTML;


} else {
    echo '<div style="color: green; font-weight: bold;">No jobs found for this HR to edit.</div>';
    // echo "<br>No jobs found for this HR to edit.";
    echo '<a href="./create_jobs.html"><button class="btn btn-primary">Create new Job now?</button></a>';
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
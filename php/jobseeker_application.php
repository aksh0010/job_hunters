<?php
session_start();
include 'jobseeker_navbar.php';
require "./connection.php";
// $job_ids = array_map('intval', explode(",", $_GET['job_ids']));
$job_id = $_SESSION["job_id"];
$jobseeker_id = $_SESSION["jobseeker_id"];
// Prepare and execute SQL query
$sql = "INSERT INTO `applications`(`jobseeker_id`, `job_id`) VALUES ( ? , ? )";
// $sql = "SELECT * FROM jobs WHERE hr_id = ? AND job_id IN (" . implode(",", array_fill(0, count($job_ids), "?")) . ")";
$stmt = $conn->prepare($sql);
// $params = array_merge([$job_id], $job_ids);
$stmt->bind_param("ss", $jobseeker_id, $job_id);
if (!$stmt->execute()) {
    // Handle errors here
    die("Error executing statement: " . $stmt->error);
}
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Display a form to allow the user to edit the selected jobs
    echo "<form method='POST'>";
    while ($row = $result->fetch_assoc()) {
        echo <<<HTML
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <div class='form-group'>
            <label for='title_{$row['job_id']}' class='font-weight-bold'>Title:</label>
            <input type='text' name='title[{$row['job_id']}]' id='title_{$row['job_id']}' value='{$row['title']}' class='form-control mb-2'>
            <label for='location_{$row['job_id']}' class='font-weight-bold'>Location:</label>
            <input type='text' name='location[{$row['job_id']}]' id='location_{$row['job_id']}' value='{$row['location']}' class='form-control mb-2'>
            <label for='salary_{$row['job_id']}' class='font-weight-bold'>Salary:</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">$</div>
              </div>
              <input type='text' name='salary[{$row['job_id']}]' id='salary_{$row['job_id']}' value='{$row['salary']}' class='form-control'>
            </div>
            <label for='description_{$row['job_id']}' class='font-weight-bold'>Description:</label>
            <textarea name='description[{$row['job_id']}]' id='description_{$row['job_id']}' rows='4' cols='50' class='form-control mb-2'>{$row['description']}</textarea>
        
        
        
        </div>
        HTML;
    }
    echo "<input type='submit' value='Update Jobs' class='btn btn-primary btn-lg mt-3'>";
    echo "</form>";


    // Process form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Loop through each submitted job and update the database
        foreach ($_POST['title'] as $job_id => $title) {
            $location = $_POST['location'][$job_id];
            $salary = $_POST['salary'][$job_id];
            $description = $_POST['description'][$job_id];

            $sql = "UPDATE jobs SET title = ?, location = ?, salary = ?, description = ? WHERE job_id = ? AND hr_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssdsii", $title, $location, $salary, $description, $job_id, $job_id);
            if (!$stmt->execute()) {
                // Handle errors here
                die("Error executing statement: " . $stmt->error);
            }
        }
        echo '<div style="color: green; font-weight: bold;"> Job Application has been sent </div>';
        header("Location: ./hr_view_all_jobs.php");
        exit();
    }
} else {
    echo '<div style="color: red; font-weight: bold;"> No Applications found </div>';
    echo '<a href="./create_jobs.html"><button class="btn btn-primary">Create new Job now?</button></a>';
}

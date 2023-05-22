<?php

session_start();
include 'hr_navbar.php';
require "./connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   
    $title = $_POST["title"];
    $location = $_POST["location"];
    $salary = $_POST["salary"];
    $description = $_POST["description"];
    $available_positions = $_POST["available_positions"];
    $hr_account_id = intval($_SESSION["hr_id"]);
 
    $sql = "INSERT INTO jobs (hr_id, title, location, salary, description, available_positions) 
            VALUES ('$hr_account_id', '$title', '$location', '$salary', '$description', '$available_positions')";

    if ($conn->query($sql) === TRUE) {
        echo '<div style="color: green; font-weight: bold;">Job added successfully</div>';
    } else {
        echo '<div style="color: red; font-weight: bold;">ERROR</div>';
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // $conn->close();
}

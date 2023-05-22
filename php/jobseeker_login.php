<?php 
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// include 'header.php';
require './connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and execute SQL statement
$stmt = $conn->prepare("SELECT * FROM jobseeker_account WHERE email=? AND password=?;");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Login successful
     // ...
     $sql = "SELECT jobseeker_id FROM jobseeker_account WHERE email=?";
     $stmt = $conn->prepare($sql);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $result = $stmt->get_result();
     $row = $result->fetch_assoc();
     $jobseeker_id = intval($row['jobseeker_id']);
 
     $_SESSION['jobseeker_id'] = $jobseeker_id;
    include "./jobseeker_account_page.php";
    echo '<div style="color: green; font-weight: bold;"> Logged in successfully </div>';
} else {
    include "header.php";
    echo '<div style="color: red; font-weight: bold;"> Wrong username or password </div>';
}

}

?>
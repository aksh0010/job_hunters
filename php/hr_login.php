<?php 
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// include 'hr_navbar.php';
require './connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and execute SQL statement
$stmt = $conn->prepare("SELECT * FROM hr_account WHERE email=? AND password=?;");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();



if ($result->num_rows > 0) {
    // Login successful
    // ...
    $sql = "SELECT hr_id FROM hr_account WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $hr_id = intval($row['hr_id']);

    $_SESSION['hr_id'] = $hr_id;

    include "./hr_account_page.php";
    echo '<div style="color: green; font-weight: bold;"> Logged in successfully </div>';
    // echo "<br> Logged in for $email ";
    // header ('location : ./hr_account_page.php');
  
} else {
    include "header.php";
    // echo "<br>User name or password wrong";
    echo '<div style="color: red; font-weight: bold;">Username or password wrong</div>';
}

}

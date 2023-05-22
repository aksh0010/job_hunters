<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
include 'hr_navbar.php';
require './connection.php';

$email = $_POST['email'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$contact = $_POST['contact'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$company = $_POST['company'];
$password = $_POST['password'];
$re_password = $_POST['re-password'];

if ($password == $re_password) {

    // Prepare and execute SQL statement

    $query = "INSERT INTO `hr_account`(`fname`, `lname`, `email`, `contact`, `gender`, `age`, `company`, `password`) VALUES (? ,?,?,?,?,?,?,?);";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssiss", $fname, $lname, $email, $gender, $age, $company, $contact, $password);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        // Insert successful
        echo '<div style="color: green; font-weight: bold;"> Your account has been created </div>';
    } else {
        // Insert failed
        echo '<div style="color: red; font-weight: bold;"> Bad Data in form </div>';
    }
} else {

    // echo "<br>Password doesnot match try again ";
    echo '<div style="color: red; font-weight: bold;"> Password does not match try again </div>';
    exit;
}}
?>
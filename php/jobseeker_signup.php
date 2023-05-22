<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
include 'header.php';
require './connection.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$gender = $_POST['gender'];
$age = $_POST['age'];
// $company = $_POST['company'];
$password = $_POST['password'];
$re_password = $_POST['re-password'];

// $password = $_POST['password'];

if ($password == $re_password) {

    // Prepare and execute SQL statement

    $query = "INSERT INTO `jobseeker_account`( `fname`, `lname`, `email`, `contact`, `gender`, `age`, `password`) VALUES (?,?,?,?,?,?,?);";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssis", $fname, $lname, $email, $contact, $gender, $age, $password);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Insert successful
        // echo "<br> Account Created for $email ";
        echo '<div style="color: green; font-weight: bold;">Account Created successfully</div>';
    } else {
        // Insert failed
        // echo "<br>Bad data in form";
        echo '<div style="color: red; font-weight: bold;">Bad data in form</div>';
    }
} else {

    echo '<div style="color: red; font-weight: bold;">Password Doesnt match </div>';

    exit;
}
}
<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
sec_session_start(); // Our custom secure way of starting a PHP session.
 
if (isset($_GET['deviceemei'], $_GET['deviceid'])) {
    $email = $_GET['deviceemei'];
    $password = $_GET['deviceid']; // The hashed password.
 
    if (login($email, $password, $mysqli) == true) {
        // Login success 
        header('Location: ../index1.php');
    } else {
        // Login failed 
        //header('Location: ../index.php?error=1');
        echo $email+''+$password;
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}
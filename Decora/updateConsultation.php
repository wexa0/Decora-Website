<?php
error_reporting(E_ALL);
ini_set('log_errors', '1');
ini_set('display_errors', '1');

session_start();

// Check if the request is sent via AJAX
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // Check if the user is logged in and is a designer
    if (!isset($_SESSION['userID']) || !isset($_SESSION['userType']) || $_SESSION['userType'] != 'designer') {
        echo "false";
        exit();
    }

    // Establish database connection
    $connection = mysqli_connect("localhost", "root", "root", "decora");
    $error = mysqli_connect_error();
    if ($error != null) {
        $output = "<p>Unable to connect to the database</p>" . $error;
        exit($output);
    }

    if (isset($_GET['requestId'])) {
        $delete_id = $_GET['requestId'];
        $sql_update = "UPDATE designconsultationrequest SET statusID = 422 WHERE id = $delete_id"; //changed to declined
        $result = mysqli_query($connection, $sql_update);
        if ($result) {
            echo "true";
            exit();
        } else {
            echo "false";
            exit();
        }
    } else {
        echo "false";
        exit();
    }
} else {
    echo "false";
}
?>

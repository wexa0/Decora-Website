<?php
// Include database connection
include 'db_connection.php';

session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Initialize an array to store the names of missing fields
    $missingFields = [];

    // Check each field individually and add to the missingFields array if empty
    if (empty($_POST['email'])) {
        $missingFields[] = "Email";
    }
    if (empty($_POST['pass'])) {
        $missingFields[] = "Password";
    }
    if (empty($_POST['FName'])) {
        $missingFields[] = "First Name";
    }
    if (empty($_POST['LName'])) {
        $missingFields[] = "Last Name";
    }

    // If there are missing fields, redirect back with an error message
    if (!empty($missingFields)) {
    $missingFieldsList = implode(", ", $missingFields); // Concatenate all missing field names
    $_SESSION['error_message'] = "Please fill in the following required field(s): " . $missingFieldsList;
    header("Location: signUp.php");
    exit;
    }

    // If all fields are present
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $firstName = $_POST['FName'];
    $lastName = $_POST['LName'];

    // Check if email already exists in client 
    $stmt = $conn->prepare("SELECT id FROM Client WHERE emailAddress = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
    // Set an error message in the session
    $_SESSION['error_message'] = 'The email address has already been taken. Please try another one.';
    header("Location: signUp.php");
    exit;
    }    else {
         // Email doesn't exist,all fields are filled => inserting new client
         $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert client into database
        $stm = $conn->prepare("INSERT INTO client (firstName, lastName, emailAddress, password) VALUES (?, ?, ?, ?)");
        $stm->bind_param("ssss", $firstName, $lastName, $email, $hashed_password);
        $result = $stm->execute();

        if ($result) {
            // Sign-up was successful
            $_SESSION['userId'] = $stm->insert_id;
            $_SESSION['userType'] = 'client';
            // Redirect to client homepage
            header("Location: ClientHomePage.php");
            exit();
            
        } else {
            // Sign-up failed
            header("Location: signUp.php?error=signupFailed");
            exit();
        }
    }
          } else {
          // Not a POST request, redirect to sign-up page
          header("Location: signUp.php");
          exit();
         }
  ?>

<?php
// Include database connection
include 'db_connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $missingFields = [];

    // Check each field individually 
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
    if (empty($_POST['brandName'])) {
    $missingFields[] = "Brand Name";
    }
    if (empty($_POST['specialty'])) {
    $missingFields[] = "Specialty";
    }

    // If there are missing fields, set the error message in the session and redirect
    if (!empty($missingFields)) {
    $missingFieldsList = implode(", ", $missingFields); // Concatenate all missing field names
    $_SESSION['error_message'] = "Please fill in the following required field(s): " . $missingFieldsList;
    header("Location: signUp.php");
    exit;
    }
    
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $firstName = $_POST['FName'];
    $lastName = $_POST['LName'];
    $brandName = $_POST['brandName'];
    // Default logo filename if no file is uploaded
    $logoFileName = 'default_logo.jpeg'; 

    if (isset($_FILES['brandPhoto']) && $_FILES['brandPhoto']['error'] === UPLOAD_ERR_OK) {
        $uploadsDir = 'images';
        
        $brandPhoto = $_FILES['brandPhoto'];
        $tempName = $brandPhoto['tmp_name'];
        $originalName = $brandPhoto['name'];
        $uniqueId = rand(1000, 9999);
        $newFileName = $uniqueId . "-" . basename($originalName);
        $newFilePath = $uploadsDir . "/" . $newFileName;

        if (move_uploaded_file($tempName, $newFilePath)) {
            $logoFileName = $newFileName;
        }
     }
    
    // Check if email already exists in designer
    $stmt = $conn->prepare("SELECT id FROM designer WHERE emailAddress = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
    // Set an error message in the session
    $_SESSION['error_message'] = 'The email address has already been taken. Please try another one.';
    header("Location: signUp.php");
    exit;
    }
    else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
         $stm = $conn->prepare("INSERT INTO Designer (firstName, lastName, emailAddress, password, brandName, logoImgFileName) VALUES (?, ?, ?, ?, ?, ?)");
        $stm->bind_param("ssssss", $firstName, $lastName, $email, $hashed_password, $brandName, $logoFileName);
        $result = $stm->execute();
        if ($result) {
            $_SESSION['userID'] = $stm->insert_id;
            $_SESSION['userType'] = 'designer';
            
        if (!empty($_POST['specialty'])) {
        // Loop through each selected specialty
        foreach ($_POST['specialty'] as $categoryID) {
            // Prepare an insert statement for the designerspeciality table
            $stm = $conn->prepare("INSERT INTO designerspeciality (designerID, designerCategoryID) VALUES (?, ?)");
            // Bind the designer ID and category ID to the parameters
            $stm->bind_param("ii", $_SESSION['userID'], $categoryID);
            // Execute the statement
            $stm->execute();
            }
        }
            header("Location: DesignerHomepage.php");
            exit;
        } else {
            header("Location: signUp.php?error=signupFailed");
            exit;
        }
    }
    } else {
    header("Location: signUp.php");
    exit();
    }
?>

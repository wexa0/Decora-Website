<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> DECORA-Design Consultation</title>
    <link rel="stylesheet" href="Desgine.css">
    <script>
        function menuToggle(){
            const toggleMenu = document.querySelector('.menu');
            toggleMenu.classList.toggle('active');
        }
    </script>
      <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <style>
         
  
   
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(198, 179, 166, 0.265);
            color: #000000;
            font-family: sans-serif;
         }

        .container {
            display: flex;
            height: 100vh;
            margin: 8em;
        }

        .sidebar {
            background-color: #801139;
            color: #ffffff;
            width: 250px;
            max-height: 535px;
            padding: 20px;
            border-radius: 10px;
            margin-left: 50px;
            line-height: 2em;
        }

        .form {
            background-color:white;
            padding: 5em;  
 border-radius: 16px; 
   
         }

        label {
            display: block;
         }

        input[type="file"] {
            margin-bottom: 20px;  
        }

        .container2 {
            margin-bottom: 20px;
        }
        input[type="submit"] {
    height: 45px;
    width: 50%;
    margin: 0 auto;  
    outline: none;
    color: #fff;
    font-size: 20px;
    font-weight: bold;
    letter-spacing: 1px;
    background: #801139;
    cursor: pointer;
    border-radius: 5px;
    border: none;
    display: flex;
    justify-content: center; 
    align-items: center;
 }
 
  #SingOut a{
   text-decoration: none;
    cursor: pointer;
    color: rgb(249, 249, 249);
}
#SingOut a:visited{
    
    color: rgb(249, 249, 249);
    
}




        textarea {
            width: 100%;
            padding: 20px;  
            font-size: 20px; 
            resize: vertical;
            border: 2px solid #801139;
            height: 150px;  
        }
        .r1{
            text-align: center;
            font-weight: bold;
            font-size: 21px;
            
        }
        #top{
            text-align: center;
            font-weight: bolder;
            font-size: 40px; 
            display: inline-block;
            color:rgb(83, 56, 13);
 
        }
        .submit-btn input:hover {
            background: hwb(337 42% 18%)
        }
         
         
    </style>
</head>
<body>
  <?php
error_reporting(E_ALL);
ini_set('log_errors', '1');
ini_set('display_errors', '1');
session_start();

// Database connection
$connection = mysqli_connect("localhost", "root", "root", "decora");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if user is logged in and is a designer
if (!isset($_SESSION['userID']) || !isset($_SESSION['userType']) || $_SESSION['userType'] != 'designer') {
    header('Location: index.php');
    exit();
}

// Initialize variables
$idOfDesigner = isset($_GET['idOfDesigner']) ? $_GET['idOfDesigner'] : '';
$idOfCon = isset($_GET['idOfCon']) ? $_GET['idOfCon'] : '';

// Fetch designer information
$sqlDesigner = "SELECT * FROM designer WHERE id='$idOfDesigner'";
$resultDesigner = mysqli_query($connection, $sqlDesigner);
$row = mysqli_fetch_assoc($resultDesigner);

// Fetch design categories
$categories = [];
$sqlDesignCategories = "SELECT category FROM designcategory";
$resultDesignCategories = mysqli_query($connection, $sqlDesignCategories);
while ($rowCategory = mysqli_fetch_assoc($resultDesignCategories)) {
    $categories[] = $rowCategory['category'];
}
$categoryStr = implode(", ", $categories);

// Fetch consultation request information
$sqlConsultationRequest = "SELECT * FROM designconsultationrequest WHERE id='$idOfCon'";
$resultConsultationRequest = mysqli_query($connection, $sqlConsultationRequest);
$reqRq = mysqli_fetch_assoc($resultConsultationRequest);
if($reqRq){
// Fetch client information
$sqlClient = "SELECT * FROM client WHERE id=" . $reqRq['clientID'];
$resultClient = mysqli_query($connection, $sqlClient);
if($resultClient){
$reqC = mysqli_fetch_assoc($resultClient);
}
if (!$reqC) {
    echo "Error occurred while fetching client information.";
    exit();
}

// Fetch room type information
$sqlRoomType = "SELECT * FROM roomtype WHERE id=" . $reqRq['roomTypeID'];
$resultRoomType = mysqli_query($connection, $sqlRoomType);
$reqR = mysqli_fetch_assoc($resultRoomType);
if (!$reqR) {
    echo "Error occurred while fetching room type information.";
    exit();
}
    
     $sql3 = "SELECT * FROM roomtype WHERE id=" . $reqRq['roomTypeID'];
    $res3 = mysqli_query($connection, $sql3);
    $reqR = mysqli_fetch_assoc($res3);
    if (!$reqR) {
        echo "Error occurred while fetching room type information.";
        exit();
    }
    
     $sql4 = "SELECT category FROM designcategory WHERE id=" . $reqRq['designCategoryID'];
    $res4 = mysqli_query($connection, $sql4);
    $reqCa = mysqli_fetch_assoc($res4);
    if (!$reqCa) {
        echo "Error occurred while fetching design category information.";
        exit();
    }
}
    // Update consultation and insert into database&& image upload

    $imageC='';//
if($_SERVER['REQUEST_METHOD']=="POST"){
    
 if (isset($_FILES['image'])) {
                $uploadsD = 'images';
                $image = $_FILES['image'];
                $tempName = $image['tmp_name'];
                $originalName = $image['name'];
                $uniqueId = rand(1000, 9999);

                $newFileName = $uniqueId . "-" . basename($originalName);
                $newFilePath = $uploadsD . "/" . $newFileName;

                if (move_uploaded_file($tempName, $newFilePath)) {
                    $imageC = $newFileName;       
                    
                }
            }                  
                    $idOfCon=$_POST['idOfCon'];
$conT = mysqli_real_escape_string($connection, $_POST['TextCons']);
//Insert:
                    // Insert data into the database
    $sql6 = "INSERT INTO designconsultation (requestID, consultation, consultationImgFileName) VALUES ('$idOfCon', '$conT', '$imageC')";
    $res = mysqli_query($connection, $sql6);
    if ($res) {
        // Update status in consultation request
        $sql7 = "UPDATE designconsultationrequest SET statusID = 433 WHERE id = '$idOfCon'";
        $res2 = mysqli_query($connection, $sql7);
        if ($res2) {
            // Redirect upon successful insertion and update
            echo "<script>location.href = 'DesignerHomepage.php'</script>";
            exit();
        } else {
            echo "Error updating consultation request status: " . mysqli_error($connection);
        }
    } else {
        echo "Error inserting consultation data: " . mysqli_error($connection);
    }
}
    
            
    
?>


 
    <header>
        <span class="logo">
          <svg id="logo-header" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40%" height="auto" zoomAndPan="magnify" viewBox="0 0 341.25 229.499992"  preserveAspectRatio="xMidYMid meet" version="1.0"><defs><g/><clipPath id="9bafd11042"><path d="M 59 4 L 279 4 L 279 224 L 59 224 Z M 59 4 " clip-rule="nonzero"/></clipPath><clipPath id="699b0c5a91"><path d="M 64.179688 0.433594 L 283.136719 9.300781 L 274.269531 228.253906 L 55.316406 219.390625 Z M 64.179688 0.433594 " clip-rule="nonzero"/></clipPath><clipPath id="5ffd22d090"><path d="M 173.65625 4.867188 C 113.195312 2.417969 62.195312 49.449219 59.746094 109.910156 C 57.300781 170.375 104.328125 221.375 164.792969 223.824219 C 225.253906 226.269531 276.253906 179.242188 278.703125 118.777344 C 281.152344 58.316406 234.121094 7.316406 173.65625 4.867188 Z M 173.65625 4.867188 " clip-rule="nonzero"/></clipPath></defs><g clip-path="url(#9bafd11042)"><g clip-path="url(#699b0c5a91)"><g clip-path="url(#5ffd22d090)"><path fill="#801139" d="M 64.179688 0.433594 L 283.136719 9.300781 L 274.269531 228.253906 L 55.316406 219.390625 Z M 64.179688 0.433594 " fill-opacity="1" fill-rule="nonzero"/></g></g></g><g fill="#e5e1dc" fill-opacity="1"><g transform="translate(76.943906, 140.779809)"><g><path d="M 13.265625 -37.808594 L 0.601562 -37.808594 C 0 -37.808594 -0.242188 -37.085938 0.363281 -36.605469 C 2.472656 -35.035156 2.835938 -33.648438 2.835938 -31.476562 L 2.835938 -13.507812 C 2.835938 -11.277344 2.472656 -9.949219 0.363281 -8.382812 C -0.242188 -7.898438 0 -7.117188 0.601562 -7.117188 L 13.265625 -7.117188 C 22.554688 -7.117188 30.152344 -14.050781 30.152344 -22.492188 C 30.152344 -30.933594 22.554688 -37.808594 13.265625 -37.808594 Z M 12.0625 -8.863281 C 10.613281 -21.648438 11.519531 -32.140625 12 -36.121094 C 17.488281 -35.640625 20.804688 -29.851562 20.804688 -22.492188 C 20.804688 -15.136719 17.546875 -9.347656 12.0625 -8.863281 Z M 12.0625 -8.863281 "/></g></g></g><g fill="#e5e1dc" fill-opacity="1"><g transform="translate(108.29031, 140.779809)"><g><path d="M 23.519531 -14.292969 C 21.949219 -12.242188 20.320312 -8.804688 16.582031 -8.804688 L 12.0625 -8.804688 C 11.519531 -13.449219 11.335938 -17.789062 11.277344 -21.648438 L 12.484375 -21.648438 C 16.222656 -21.648438 15.921875 -20.382812 17.488281 -18.273438 C 17.96875 -17.667969 18.753906 -17.851562 18.753906 -18.632812 L 18.753906 -26.351562 C 18.753906 -27.136719 17.96875 -27.316406 17.488281 -26.652344 C 15.921875 -24.605469 16.222656 -23.335938 12.484375 -23.335938 L 11.277344 -23.335938 C 11.335938 -29.246094 11.757812 -33.828125 12 -36.121094 C 13.929688 -36.0625 15.074219 -35.757812 16.523438 -33.167969 C 18.753906 -29.246094 24.484375 -29.367188 24.484375 -33.890625 C 24.484375 -36.90625 20.683594 -37.808594 17.546875 -37.808594 L 0.601562 -37.808594 C 0 -37.808594 -0.242188 -37.085938 0.363281 -36.605469 C 2.472656 -35.035156 2.835938 -33.648438 2.835938 -31.476562 L 2.835938 -13.507812 C 2.835938 -11.277344 2.472656 -9.949219 0.363281 -8.382812 C -0.242188 -7.898438 0 -7.117188 0.601562 -7.117188 L 23.097656 -7.117188 C 24.242188 -7.117188 24.785156 -7.597656 24.785156 -8.804688 L 24.785156 -14.050781 C 24.785156 -14.714844 24 -14.894531 23.519531 -14.292969 Z M 23.519531 -14.292969 "/></g></g></g><g fill="#e5e1dc" fill-opacity="1"><g transform="translate(134.33195, 140.779809)"><g><path d="M 28.402344 -18.816406 C 26.535156 -11.636719 13.507812 -10.011719 10.011719 -20.683594 C 7.777344 -27.558594 9.046875 -34.011719 12.601562 -35.035156 C 15.980469 -36 18.273438 -33.527344 16.101562 -25.628906 C 13.992188 -18.089844 24.722656 -20.261719 27.859375 -24.722656 C 32.203125 -31.054688 24.121094 -37.808594 16.222656 -37.808594 C 7.296875 -37.808594 0 -30.933594 0 -22.492188 C 0 -13.992188 7.296875 -7.117188 16.222656 -7.117188 C 23.214844 -7.117188 29.488281 -12 30.210938 -18.574219 C 30.394531 -19.839844 28.765625 -20.382812 28.402344 -18.816406 Z M 28.402344 -18.816406 "/></g></g></g><g fill="#e5e1dc" fill-opacity="1"><g transform="translate(165.798915, 140.779809)"><g><path d="M16.222656 -37.808594 C 7.296875 -37.808594 0 -30.933594 0 -22.492188 C 0 -13.992188 7.296875 -7.117188 16.222656 -7.117188 C 25.207031 -7.117188 32.503906 -13.992188 32.503906 -22.492188 C 32.503906 -30.933594 25.207031 -37.808594 16.222656 -37.808594 Z M 16.222656 -9.40625 C 12.722656 -9.40625 9.828125 -15.257812 9.828125 -22.492188 C 9.828125 -29.667969 12.722656 -35.519531 16.222656 -35.519531 C 19.78125 -35.519531 22.675781 -29.667969 22.675781 -22.492188 C 22.675781 -15.257812 19.78125 -9.40625 16.222656 -9.40625 Z M 16.222656 -9.40625 "/></g></g></g><g fill="#e5e1dc" fill-opacity="1"><g transform="translate(199.315469, 140.779809)"><g><path d="M 29.003906 -8.625 C 23.820312 -11.941406 22.25 -17.789062 18.453125 -20.261719 C 22.734375 -21.347656 25.808594 -24.785156 25.808594 -28.824219 C 25.808594 -33.769531 21.167969 -37.808594 15.496094 -37.808594 L 0.601562 -37.808594 C 0 -37.808594 -0.242188 -37.085938 0.363281 -36.605469 C 2.472656 -35.035156 2.835938 -33.648438 2.835938 -31.476562 L 2.835938 -13.507812 C 2.835938 -11.277344 2.472656 -9.949219 0.363281 -8.382812 C -0.242188 -7.898438 0 -7.117188 0.601562 -7.117188 L 12.722656 -7.117188 C 13.992188 -7.117188 13.992188 -8.140625 13.328125 -8.625 C 11.578125 -9.949219 11.335938 -15.257812 11.277344 -19.476562 C 11.820312 -19.660156 12.363281 -19.78125 12.785156 -19.78125 C 16.039062 -19.78125 16.703125 -16.101562 17.308594 -13.507812 C 17.910156 -11.277344 18.089844 -9.949219 16.523438 -8.382812 C 16.039062 -7.898438 16.28125 -7.117188 16.945312 -7.117188 L 28.644531 -7.117188 C 29.910156 -7.117188 29.789062 -8.140625 29.003906 -8.625 Z M 17.1875 -28.824219 C 17.1875 -25.207031 14.59375 -22.132812 11.277344 -21.648438 L 11.277344 -22.492188 C 11.277344 -26.292969 11.15625 -33.046875 12.722656 -35.640625 C 15.316406 -34.613281 17.1875 -31.960938 17.1875 -28.824219 Z M 17.1875 -28.824219 "/></g></g></g><g fill="#e5e1dc" fill-opacity="1"><g transform="translate(229.998781, 140.779809)"><g><path d="M 31.539062 -8.382812 C 29.003906 -9.949219 28.824219 -11.277344 28.160156 -13.507812 C 28.039062 -13.75 22.613281 -31.597656 22.554688 -31.839844 C 21.828125 -34.070312 19.476562 -37.808594 15.738281 -37.808594 L 9.890625 -37.808594 C 9.226562 -37.808594 8.804688 -37.085938 9.285156 -36.605469 C 10.855469 -35.035156 10.671875 -33.105469 10.011719 -30.875 L 4.644531 -13.449219 C 3.679688 -10.671875 2.230469 -9.40625 0.421875 -8.382812 C -0.363281 -7.898438 0.0585938 -7.117188 0.664062 -7.117188 L 9.769531 -7.117188 C 10.371094 -7.117188 10.613281 -7.898438 10.132812 -8.382812 C 6.511719 -11.878906 6.933594 -14.894531 7.417969 -16.582031 L 17.910156 -16.582031 C 18.453125 -12.964844 18.511719 -9.828125 17.425781 -8.382812 C 17.066406 -7.839844 17.425781 -7.117188 18.03125 -7.117188 L 31.417969 -7.117188 C 32.019531 -7.117188 32.324219 -7.898438 31.539062 -8.382812 Z M 7.960938 -18.273438 L 12.421875 -32.863281 C 13.6875 -31.71875 16.34375 -24.664062 17.609375 -18.273438 Z M 7.960938 -18.273438 "/></g></g></g></svg>
        </span>
  
    <p id="SingOut"><a href="?logout=logout">SIGN OUT</a>
                         <?php
    if (isset($_GET['logout'])) {
        session_destroy(); 
      echo "<script>location.href = 'index.php'</script>";
        exit(); 
    }
    
?>
        
  
        
        <div class="vline"></div>   
        <div class="action">
          <div class="profile" onclick="menuToggle();">
              <?php echo "<img src='images/" . $row['logoImgFileName']. "' alt=''>"; ?>
          </div>
          <div class="menu">
              <h3>
                  <?php echo $row['firstName'] . " " .$row['lastName']  ?>
                  <div>
                      Interior Designer
                  </div>
              </h3>
              <ul>
                  <li>
                      <span class="icons-size"><i class="fa-solid fa-tag"></i></span>
                      <span class="title" ><?php echo $row['brandName']  ?></span>
                  </li>
      
                  <li>
                      <span class="icons-size"><i class="fa-solid fa-envelope"></i></</span>
                      <span class="title" ><?php echo $row['emailAddress']  ?></span>
                  </li>
                  <li>
                      <span class="icons-size"><i class="fa-solid fa-pen-ruler"></i></span>
                      <span class="title" > <?php echo $categoryStr ?> </span>
                  </li>
  
              </ul>
          </div>
      </div>

    </header>
      <br><br>
            <br><br>
            <br><br>
    <p id="top"><strong>Design Consultation</strong></p>
    
    <div class="container">
    <div class="sidebar">
        <p class="r1">Request Information</p> <br>
        <?php
// Check if retrieved information exists
if ($reqC && $reqR && $reqRq) {
    // Print retrieved information
   echo "<p style='font-weight: bold; color: #ffffff;'>Client: " . $reqC['firstName'] . " " . $reqC['lastName'] . "</p> <br>";
echo "<p style='font-weight: bold; color: #ffffff;'>Room: " . $reqR['type'] . "</p> <br>";
echo "<p style='font-weight: bold; color: #ffffff;'>Dimensions:" . $reqRq['roomWidth'] . "*" . $reqRq['roomLength'] . "m". "</p> <br>";
echo "<p style='font-weight: bold; color: #ffffff;'>Design category: " . $reqCa['category'] . "</p> <br>";
echo "<p style='font-weight: bold; color: #ffffff;'>Color Preferences: " . $reqRq['colorPreferences'] . "</p><br>";
echo "<p style='font-weight: bold; color: #ffffff;'>Date:" . $reqRq['date'] . "</p> <br>";

}
?>

    </div>
        <div class="content">
            <div class="form">
                
       <form action="consultaionP1.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="idOfCon" value="<?php echo $idOfCon ; ?>">

                <h4 style="color: rgb(83, 56, 13); font-size: 20px;">Consultation:</h4>
                <br>
     
    <textarea rows="3" cols="60" name="TextCons"></textarea>
    <br>
    <br>
    <label style="color: rgb(83, 56, 13); font-size: 20px;"><strong>Upload Image:</strong></label>
    <br>
     
    <input type="file" name="image"  ><br>
    
    <br><br>
    <div class="submit-btn">
        <input type="submit" name="submit" value="Submit">
    </div>
</form>

                <div>
                     
                </div>
               
            </div>
        </div>
    </div>
    <!--footer-->
    <footer class="footer">
        <div class="footercontainer">
          <div class="footerrow">
            
            <div class="footer-col">
            <h4>get help</h4>
              <ul id="ul">
                <li>+9660552778344</li>
                <li>decora@gmail.com</li>
              </ul>
            </div>

            <div class="footer-col">
              <h4>follow us</h4>
            <div class="social">
                <i class="fa-brands fa-twitter" style="color: #ffffff"></i>
                <i class="fa-brands fa-instagram" style="color: #ffffff"></i>
                <i class="fa-brands fa-facebook" style="color: #ffffff"></i>
                <i class="fa-brands fa-linkedin" style="color: #ffffff"></i>
            </div>
            <p id="copyRight">©2023 Decora</p>
            </div>

            <div class="footer-col">
              <img id="logo-footer" src=" images\7779-logo-footer.png" alt="">
            </div>
          </div>
          </div>
        </div>
      </footer>
</body>
</html>

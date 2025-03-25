<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp-Decora</title>
    <link rel="stylesheet" type="text/css" href="signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
</head>
<body>
    <a href="index.php"> <svg id="logo-header" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  zoomAndPan="magnify" viewBox="0 0 341.25 229.499992"  preserveAspectRatio="xMidYMid meet" version="1.0"><defs><g/><clipPath id="9bafd11042"><path d="M 59 4 L 279 4 L 279 224 L 59 224 Z M 59 4 " clip-rule="nonzero"/></clipPath><clipPath id="699b0c5a91"><path d="M 64.179688 0.433594 L 283.136719 9.300781 L 274.269531 228.253906 L 55.316406 219.390625 Z M 64.179688 0.433594 " clip-rule="nonzero"/></clipPath><clipPath id="5ffd22d090"><path d="M 173.65625 4.867188 C 113.195312 2.417969 62.195312 49.449219 59.746094 109.910156 C 57.300781 170.375 104.328125 221.375 164.792969 223.824219 C 225.253906 226.269531 276.253906 179.242188 278.703125 118.777344 C 281.152344 58.316406 234.121094 7.316406 173.65625 4.867188 Z M 173.65625 4.867188 " clip-rule="nonzero"/></clipPath></defs><g clip-path="url(#9bafd11042)"><g clip-path="url(#699b0c5a91)"><g clip-path="url(#5ffd22d090)"><path fill="#801139" d="M 64.179688 0.433594 L 283.136719 9.300781 L 274.269531 228.253906 L 55.316406 219.390625 Z M 64.179688 0.433594 " fill-opacity="1" fill-rule="nonzero"/></g></g></g><g fill="#e5e1dc" fill-opacity="1"><g transform="translate(76.943906, 140.779809)"><g><path d="M 13.265625 -37.808594 L 0.601562 -37.808594 C 0 -37.808594 -0.242188 -37.085938 0.363281 -36.605469 C 2.472656 -35.035156 2.835938 -33.648438 2.835938 -31.476562 L 2.835938 -13.507812 C 2.835938 -11.277344 2.472656 -9.949219 0.363281 -8.382812 C -0.242188 -7.898438 0 -7.117188 0.601562 -7.117188 L 13.265625 -7.117188 C 22.554688 -7.117188 30.152344 -14.050781 30.152344 -22.492188 C 30.152344 -30.933594 22.554688 -37.808594 13.265625 -37.808594 Z M 12.0625 -8.863281 C 10.613281 -21.648438 11.519531 -32.140625 12 -36.121094 C 17.488281 -35.640625 20.804688 -29.851562 20.804688 -22.492188 C 20.804688 -15.136719 17.546875 -9.347656 12.0625 -8.863281 Z M 12.0625 -8.863281 "/></g></g></g><g fill="#e5e1dc" fill-opacity="1"><g transform="translate(108.29031, 140.779809)"><g><path d="M 23.519531 -14.292969 C 21.949219 -12.242188 20.320312 -8.804688 16.582031 -8.804688 L 12.0625 -8.804688 C 11.519531 -13.449219 11.335938 -17.789062 11.277344 -21.648438 L 12.484375 -21.648438 C 16.222656 -21.648438 15.921875 -20.382812 17.488281 -18.273438 C 17.96875 -17.667969 18.753906 -17.851562 18.753906 -18.632812 L 18.753906 -26.351562 C 18.753906 -27.136719 17.96875 -27.316406 17.488281 -26.652344 C 15.921875 -24.605469 16.222656 -23.335938 12.484375 -23.335938 L 11.277344 -23.335938 C 11.335938 -29.246094 11.757812 -33.828125 12 -36.121094 C 13.929688 -36.0625 15.074219 -35.757812 16.523438 -33.167969 C 18.753906 -29.246094 24.484375 -29.367188 24.484375 -33.890625 C 24.484375 -36.90625 20.683594 -37.808594 17.546875 -37.808594 L 0.601562 -37.808594 C 0 -37.808594 -0.242188 -37.085938 0.363281 -36.605469 C 2.472656 -35.035156 2.835938 -33.648438 2.835938 -31.476562 L 2.835938 -13.507812 C 2.835938 -11.277344 2.472656 -9.949219 0.363281 -8.382812 C -0.242188 -7.898438 0 -7.117188 0.601562 -7.117188 L 23.097656 -7.117188 C 24.242188 -7.117188 24.785156 -7.597656 24.785156 -8.804688 L 24.785156 -14.050781 C 24.785156 -14.714844 24 -14.894531 23.519531 -14.292969 Z M 23.519531 -14.292969 "/></g></g></g><g fill="#e5e1dc" fill-opacity="1"><g transform="translate(134.33195, 140.779809)"><g><path d="M 28.402344 -18.816406 C 26.535156 -11.636719 13.507812 -10.011719 10.011719 -20.683594 C 7.777344 -27.558594 9.046875 -34.011719 12.601562 -35.035156 C 15.980469 -36 18.273438 -33.527344 16.101562 -25.628906 C 13.992188 -18.089844 24.722656 -20.261719 27.859375 -24.722656 C 32.203125 -31.054688 24.121094 -37.808594 16.222656 -37.808594 C 7.296875 -37.808594 0 -30.933594 0 -22.492188 C 0 -13.992188 7.296875 -7.117188 16.222656 -7.117188 C 23.214844 -7.117188 29.488281 -12 30.210938 -18.574219 C 30.394531 -19.839844 28.765625 -20.382812 28.402344 -18.816406 Z M 28.402344 -18.816406 "/></g></g></g><g fill="#e5e1dc" fill-opacity="1"><g transform="translate(165.798915, 140.779809)"><g><path d="M16.222656 -37.808594 C 7.296875 -37.808594 0 -30.933594 0 -22.492188 C 0 -13.992188 7.296875 -7.117188 16.222656 -7.117188 C 25.207031 -7.117188 32.503906 -13.992188 32.503906 -22.492188 C 32.503906 -30.933594 25.207031 -37.808594 16.222656 -37.808594 Z M 16.222656 -9.40625 C 12.722656 -9.40625 9.828125 -15.257812 9.828125 -22.492188 C 9.828125 -29.667969 12.722656 -35.519531 16.222656 -35.519531 C 19.78125 -35.519531 22.675781 -29.667969 22.675781 -22.492188 C 22.675781 -15.257812 19.78125 -9.40625 16.222656 -9.40625 Z M 16.222656 -9.40625 "/></g></g></g><g fill="#e5e1dc" fill-opacity="1"><g transform="translate(199.315469, 140.779809)"><g><path d="M 29.003906 -8.625 C 23.820312 -11.941406 22.25 -17.789062 18.453125 -20.261719 C 22.734375 -21.347656 25.808594 -24.785156 25.808594 -28.824219 C 25.808594 -33.769531 21.167969 -37.808594 15.496094 -37.808594 L 0.601562 -37.808594 C 0 -37.808594 -0.242188 -37.085938 0.363281 -36.605469 C 2.472656 -35.035156 2.835938 -33.648438 2.835938 -31.476562 L 2.835938 -13.507812 C 2.835938 -11.277344 2.472656 -9.949219 0.363281 -8.382812 C -0.242188 -7.898438 0 -7.117188 0.601562 -7.117188 L 12.722656 -7.117188 C 13.992188 -7.117188 13.992188 -8.140625 13.328125 -8.625 C 11.578125 -9.949219 11.335938 -15.257812 11.277344 -19.476562 C 11.820312 -19.660156 12.363281 -19.78125 12.785156 -19.78125 C 16.039062 -19.78125 16.703125 -16.101562 17.308594 -13.507812 C 17.910156 -11.277344 18.089844 -9.949219 16.523438 -8.382812 C 16.039062 -7.898438 16.28125 -7.117188 16.945312 -7.117188 L 28.644531 -7.117188 C 29.910156 -7.117188 29.789062 -8.140625 29.003906 -8.625 Z M 17.1875 -28.824219 C 17.1875 -25.207031 14.59375 -22.132812 11.277344 -21.648438 L 11.277344 -22.492188 C 11.277344 -26.292969 11.15625 -33.046875 12.722656 -35.640625 C 15.316406 -34.613281 17.1875 -31.960938 17.1875 -28.824219 Z M 17.1875 -28.824219 "/></g></g></g><g fill="#e5e1dc" fill-opacity="1"><g transform="translate(229.998781, 140.779809)"><g><path d="M 31.539062 -8.382812 C 29.003906 -9.949219 28.824219 -11.277344 28.160156 -13.507812 C 28.039062 -13.75 22.613281 -31.597656 22.554688 -31.839844 C 21.828125 -34.070312 19.476562 -37.808594 15.738281 -37.808594 L 9.890625 -37.808594 C 9.226562 -37.808594 8.804688 -37.085938 9.285156 -36.605469 C 10.855469 -35.035156 10.671875 -33.105469 10.011719 -30.875 L 4.644531 -13.449219 C 3.679688 -10.671875 2.230469 -9.40625 0.421875 -8.382812 C -0.363281 -7.898438 0.0585938 -7.117188 0.664062 -7.117188 L 9.769531 -7.117188 C 10.371094 -7.117188 10.613281 -7.898438 10.132812 -8.382812 C 6.511719 -11.878906 6.933594 -14.894531 7.417969 -16.582031 L 17.910156 -16.582031 C 18.453125 -12.964844 18.511719 -9.828125 17.425781 -8.382812 C 17.066406 -7.839844 17.425781 -7.117188 18.03125 -7.117188 L 31.417969 -7.117188 C 32.019531 -7.117188 32.324219 -7.898438 31.539062 -8.382812 Z M 7.960938 -18.273438 L 12.421875 -32.863281 C 13.6875 -31.71875 16.34375 -24.664062 17.609375 -18.273438 Z M 7.960938 -18.273438 "/></g></g></g></svg></a>


    <img src="images\img1.jpg" alt="" id="img2">
     
    <div class="reg">
        <h1 id="title1">Create Account:</h1>

        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" id="copt" onclick="leftClick()">Client</button>
                <button type="button" class="toggle-btn" id="coptt" onclick="rightClick()">Interior<br> Designer</button>
            </div>
        </div>

        <form method="POST" id="signUpForm" enctype="multipart/form-data">
            <div class="name-fields">
                <label>First Name<br><input type="text" name="FName" class="underline-input" ></label>
                <label>Last Name<br><input type="text" name="LName" class="underline-input"></label>
            </div>
            <div class="email-password-fields">
                <label>Email<br><input type="email" name="email" class="underline-input" value="" ></label>
                <label>Password<br><input type="password" name="pass" class="underline-input" value="" ></label>
            </div>
  
            <div id="interior-designer-fields" style="display: none;">
                <div class="brand-info-title">
                    <h2 class="title3">Brand Information:</h2>
                </div>
                <div class="brand-info">
                    <label>Brand Name<br><input type="text" name="brandName" class="underline-input" ></label>
                    <label>Brand Logo<br><input type="file" name="brandPhoto" ></label>
                </div>
                <p class="title2">Specialty:</p>
                <div class="specialty-checkboxes">
                    <label class="checkbox-container">
                        <input type="checkbox" name="specialty[]" value="222">Modern
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox-container">
                        <input type="checkbox" name="specialty[]" value="224">Country
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox-container">
                        <input type="checkbox" name="specialty[]" value="223">Coastal
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox-container">
                        <input type="checkbox" name="specialty[]" value="221">Bohemian
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div><br>
            

            <button type="submit" id="done" onclick="goToHomepage(event)">Sign Up</button>
            <p id="acc">Already Have An Account?<a href="signIn.php" id="signin">Sign In</a></p>
            
            <?php
             // if the user did not fill(email,pass,firstname,lastname) or the when email is used
            if (isset($_SESSION['error_message'])) {
            echo "<p style='color: red;font-size: smaller;'>" . $_SESSION['error_message'] . "</p>";
            // Unset the error message so it doesn't persist on refresh
            unset($_SESSION['error_message']);
             }   
             ?>
        </form>
    </div>

    <script>
    // Define userType
    var userType = "Client"; // Default user type, adjust as needed

    function leftClick() {
        userType = "Client";
        document.getElementById('interior-designer-fields').style.display = 'none';
        document.getElementById('btn').style.left = '0';
    }

    function rightClick() {
        userType = "Interior Designer";
        document.getElementById('btn').style.left = '110px';
        document.getElementById('interior-designer-fields').style.display = 'block';
    }

    // Function to handle form submission
    function goToHomepage(event) {
        console.log("Button clicked"); // Debugging line
        event.preventDefault(); // Prevent the default form submission
        var form = document.getElementById('signUpForm');
        if (userType === "Client") {
            form.action = "signup_client.php";
            console.log("Form action set to Client"); // Debugging line
        } else if (userType === "Interior Designer") {
            form.action = "signup_designer.php";
            console.log("Form action set to Interior Designer"); // Debugging line
        }
        console.log("Form action is: ", form.action); // Debugging line
        form.submit(); // Submit the form with the updated action
    }
    </script>


    
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMH Technologies Sign Up</title>
    <link rel="stylesheet" href="SignUpPage.css">
</head>

<body>
    <?php
        // Database credentials
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "data_prediction_website";

        // Create a new MySQLi connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // When form submitted, insert values into the database. 
        if (isset($_REQUEST['username'])) {

            // removes backslashes 
            $username = stripslashes($_REQUEST['username']); 
            //escapes special characters in a string 
            $username = mysqli_real_escape_string($conn, $username);

            $email = stripslashes($_REQUEST['email']); 
            $email = mysqli_real_escape_string($conn, $email); 

            $password = stripslashes($_REQUEST['password']); 
            $password = mysqli_real_escape_string($conn, $password);

            $query = "INSERT into `login_table` (username, password, email) VALUES ('$username', '" . md5($password) . "', '$email')";
            $result = mysqli_query($conn, $query);

            if ($result) { 
                /*echo "<div class='modal-overlay' id='modalOverlay'>
                        <div class='modal'> 
                            <h3>You are registered successfully. Click the button to move to the login page.</h3><br/> 
                            <button onclick='redirectToLogin()'>Go to Login</button>
                        </div>
                    </div>
                    <script>
                        document.getElementById('modalOverlay').style.display = 'flex';
                        function redirectToLogin() {
                            window.location.href = 'LoginPage.php';
                        }
                    </script>";*/
                    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                        <script>
                            Swal.fire({
                                title: 'Registration Successful!',
                                text: 'You are registered successfully. Click the button to move to the login page.',
                                icon: 'success',
                                confirmButtonText: 'Go to Login',
                                background: '#333',  // Dark background
                                color: '#fff',  // White text color
                                confirmButtonColor: '#4CAF50',  // Green button color
                                iconColor: '#fff'  // White icon color
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'LoginPage.php';
                                }
                            });
                        </script>";    
            }
            else {
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script>
                        Swal.fire({
                            title: 'Error!',
                            text: 'Your account allready exists. Please try again.',
                            icon: 'error',
                            confirmButtonText: 'OK',
                            background: '#333',  // Dark background
                            color: '#fff',  // White text color
                            confirmButtonColor: '#FF4136',  // Red button color
                            iconColor: '#fff'  // White icon color
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Reload the current page
                                window.location.href = window.location.href;
                            }
                        });
                    </script>";
            }
            
        }
        else {
    ?>

    <div class="container">
        <div class="info-section">
            <h1>Welcome Back To the SMH Technologies.</h1>
            <p>
                In today’s fast-paced digital era, understanding mobile data consumption patterns is crucial for making informed decisions. Our advanced Mobile Data Usage Prediction Platform offers a comprehensive, data-driven solution to analyze, predict, and optimize mobile data usage with precision. This intelligent platform integrates user-friendly analytics, automated insights, and tailored recommendations to empower individuals and businesses. 
            </p>
            <p>
                With just a few simple inputs, users can uncover actionable trends, forecast usage, and explore personalized data packages, ensuring cost-effectiveness and smarter connectivity management.
            </p>
        </div>

        <div class="login-section">
            <div class="login-box">
                <h2>Create Your Account</h2>
                <form action="" method="post">
                    <input type="text" name="username" placeholder="Enter Your New Username" required>
                    <input type="email" name="email" placeholder="Enter Your Email" required>
                    <input type="password" name="password" placeholder="Enter Your New Password" required>
                    <button type="submit"><strong>Sign Up</strong></button>
                    <div class="options">
                        <a href="LoginPage.php">Already have an account? Click here to Login</a>
                        <br>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
</body>
</html>
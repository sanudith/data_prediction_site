<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMH Technologies Login</title>
    <link rel="stylesheet" href="LoginPage.css">
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

        session_start();

        if (isset($_POST['username'])) { 
            $username = stripslashes($_REQUEST['username']); // removes backslashes 
            $username = mysqli_real_escape_string($conn, $username); 
            
            $password = stripslashes($_REQUEST['password']); 
            $password = mysqli_real_escape_string($conn, $password);

            // Check user is exist in the database 
            $query = "SELECT * FROM `login_table` WHERE username='$username' AND password='" . md5($password) . "'";

            $result = mysqli_query($conn, $query) or die(mysqli_error($conn)); 
            $rows = mysqli_num_rows($result);

            if ($rows == 1) { 
                $_SESSION['username'] = $username; 
                // Redirect to home page 
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script>
                        Swal.fire({
                            title: 'Login Successful!',
                            text: 'Welcome to the SMH Data Prediction. Click the button to move to the Home Page.',
                            icon: 'success',
                            confirmButtonText: 'Home Page',
                            background: '#333',  // Dark background
                            color: '#fff',  // White text color
                            confirmButtonColor: '#4CAF50',  // Green button color
                            iconColor: '#fff'  // White icon color
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'index.php';
                            }
                        });
                    </script>"; 
            } 
            else{
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script>
                        Swal.fire({
                            title: 'Error!',
                            text: 'Incorrect Username or Password. Please Try Again.',
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
        else{
    ?>

    <div class="container">
        <div class="info-section">
            <h1>Welcome Back.</h1>
            <p>
                In today’s fast-paced digital era, understanding mobile data consumption patterns is crucial for making informed decisions. Our advanced Mobile Data Usage Prediction Platform offers a comprehensive, data-driven solution to analyze, predict, and optimize mobile data usage with precision. This intelligent platform integrates user-friendly analytics, automated insights, and tailored recommendations to empower individuals and businesses. 
            </p>
            <p>
                With just a few simple inputs, users can uncover actionable trends, forecast usage, and explore personalized data packages, ensuring cost-effectiveness and smarter connectivity management.
            </p>
        </div>

        <div class="login-section">
            <div class="login-box">
                <h2>SMH Technologies</h2>
                <form method="post">
                    <input type="text" name="username" placeholder="Enter Your Username" autofocus="true" required>
                    <input type="password" name="password" placeholder="Enter Your Password" required>
                    <button type="submit"><strong>Login</strong></button>
                    <div class="options">
                        <a href="SignUpPage.php">Don't have an account? Click here to register</a><br/><br/>
                        <a href="index.php">Need to move to Home Page? Click here to move Home</a>
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

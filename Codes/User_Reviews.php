<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry Page</title>
    <link rel="stylesheet" href="UserReviewPage.css">
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
        if (isset($_REQUEST['rating'])) {

            $rev = stripslashes($_REQUEST['rating']); 
            $rev = mysqli_real_escape_string($conn, $rev);

            // removes backslashes 
            $name = stripslashes($_REQUEST['fullname']); 
            //escapes special characters in a string 
            $name = mysqli_real_escape_string($conn, $name);

            $email = stripslashes($_REQUEST['email']); 
            $email = mysqli_real_escape_string($conn, $email); 

            $comment = stripslashes($_REQUEST['usercomment']); 
            $comment = mysqli_real_escape_string($conn, $comment);

            $query = "INSERT into `review_table` (review, fname, email, comment) VALUES ('$rev', '$name', '$email', '$comment')";
            $result = mysqli_query($conn, $query);

            if ($result) { 
                    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                        <script>
                            Swal.fire({
                                title: 'Sucessfully Recorded!',
                                text: 'Thank You For Your Kind Review.',
                                icon: 'success',
                                confirmButtonText: 'Ok',
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
            else {
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script>
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something happened while recording your review. Please try again later.',
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

    <div class="contact-container">
        <button class="close-button" onclick="window.location.href='index.php'">×</button>

        <div class="contact-image"></div>

        <div class="contact-form">
            <h2>Your Review</h2>
            <p>Feel free to drop us your reviews and comments. Your respond will make us strong!</p>
            
            <form action="" method="post">
                <select name="rating" required>
                    <option value="">Select Rating</option>
                    <option value="1">★☆☆☆☆</option>
                    <option value="2">★★☆☆☆</option>
                    <option value="3">★★★☆☆</option>
                    <option value="4">★★★★☆</option>
                    <option value="5">★★★★★</option>
                </select>
                <input type="text" name="fullname" placeholder="Enter Full Name" required>
                <input type="email" name="email" placeholder="Enter Email Address" required>
                <textarea placeholder="Comments..." name="usercomment" required></textarea><br/>
                
                <button type="submit"><strong>Submit →</strong></button>
            </form>
        </div>
    </div>
    <?php
        }
    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Review Page</title>
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
            
            // removes backslashes 
            $name = stripslashes($_REQUEST['fullname']); 
            //escapes special characters in a string 
            $name = mysqli_real_escape_string($conn, $name);

            $email = stripslashes($_REQUEST['email']); 
            $email = mysqli_real_escape_string($conn, $email); 

            $comment = stripslashes($_REQUEST['usercomment']); 
            $comment = mysqli_real_escape_string($conn, $comment);

            $package = stripslashes($_REQUEST['package']); 
            $package = mysqli_real_escape_string($conn, $package);

            $rev = stripslashes($_REQUEST['rating']); 
            $rev = mysqli_real_escape_string($conn, $rev);

            $query = "INSERT into `pack_review` (fname, email, comment, package, review) VALUES ('$name', '$email', '$comment', '$package', '$rev')";
            $result = mysqli_query($conn, $query);

            if ($result) { 
                    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                        <script>
                            Swal.fire({
                                title: 'Successfully Recorded!',
                                text: 'Thank You For Your Review.',
                                icon: 'success',
                                confirmButtonText: 'Ok',
                                background: '#333',
                                color: '#fff',
                                confirmButtonColor: '#4CAF50',
                                iconColor: '#fff'
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
                            text: 'Something went wrong. Please try again.',
                            icon: 'error',
                            confirmButtonText: 'OK',
                            background: '#333',
                            color: '#fff',
                            confirmButtonColor: '#FF4136',
                            iconColor: '#fff'
                        }).then((result) => {
                            if (result.isConfirmed) {
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
            <h2>Package Review</h2>
            <p>Share your experience with the Recommended packages. Your feedback helps us improve!</p>
            
            <form action="" method="post">
                    <input type="text" name="fullname" placeholder="Enter Full Name" required>
                    <input type="email" name="email" placeholder="Enter Email Address" required>
                    <textarea placeholder="Comments..." name="usercomment" required></textarea><br/>
                    <select name="package" required>
                        <option value="">Select The Package You Need to Rate</option>
                        <option value="Mobitel 40 GB Pack">Mobitel 40 GB Package</option>
                        <option value="Dialog 40 GB Pack">Dialog 40 GB Package</option>
                        <option value="Mobitel 45 GB Pack">Mobitel 45 GB Package</option>
                        <option value="Dialog 40 GB Pack">Dialog 40 GB Package</option>
                        <option value="Dialog 20 GB Pack">Dialog 20 GB Packagek</option>
                        <option value="Mobitel 25 GB Pack">Mobitel 25 GB Package</option>
                        <option value="Dialog 30 GB Pack">Dialog 30 GB Package</option>
                        <option value="Dialog 35 GB Pack">Dialog 35 GB Package</option>
                    </select>
                    <select name="rating" required>
                        <option value="">Rate the Selected Package</option>
                        <option value="1">★☆☆☆☆</option>
                        <option value="2">★★☆☆☆</option>
                        <option value="3">★★★☆☆</option>
                        <option value="4">★★★★☆</option>
                        <option value="5">★★★★★</option>
                    </select>
                    <br/><br/>
                <button type="submit"><strong>Submit →</strong></button>
                <br/><br/>
                <button type="button"><strong>View Package Reviews</strong></button>
            </form>
        </div>
    </div>
<?php
        }
?>
</body>
</html>

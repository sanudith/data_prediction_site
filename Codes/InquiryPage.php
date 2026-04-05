<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry Page</title>
    <link rel="stylesheet" href="InquiryPage.css">
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
        if (isset($_REQUEST['fullname'])) {

            // removes backslashes 
            $name = stripslashes($_REQUEST['fullname']); 
            //escapes special characters in a string 
            $name = mysqli_real_escape_string($conn, $name);

            $email = stripslashes($_REQUEST['email']); 
            $email = mysqli_real_escape_string($conn, $email); 

            $tel = stripslashes($_REQUEST['telephone']); 
            $tel = mysqli_real_escape_string($conn, $tel);

            $inquiry = stripslashes($_REQUEST['userinquiry']); 
            $inquiry = mysqli_real_escape_string($conn, $inquiry);

            $query = "INSERT into `inquiry_table` (person_name, email, tel_no, inquiry) VALUES ('$name', '$email', '$tel', '$inquiry')";
            $result = mysqli_query($conn, $query);

            if ($result) { 
                    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                        <script>
                            Swal.fire({
                                title: 'Sucessfully Recorded!',
                                text: 'Your inquiry has recorded. We will come back to you soon!',
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
                            text: 'Something happened while recording your inquiry. Please try again later.',
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
        <div class="contact-form">
            
            <h2>Your Inquiries</h2>
            <p>Feel free to drop us your issue below. We will get back to you soon!</p>
            <form action="" method="post">
                <input type="text" name="fullname" placeholder="Enter Full Name" required>
                <input type="email" name="email" placeholder="Enter Email Address" required>
                <input type="tel" name="telephone" placeholder="Enter Phone Number" pattern="[0-9]{10}" required>
                <textarea placeholder="Your Inquiry..." name="userinquiry" required></textarea><br/><br/>
                <button type="submit">Submit →</button>
            </form>
        </div>
    </div>
    <?php
        }
    ?>
</body>
</html>
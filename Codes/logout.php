<?php 
session_start(); 
// Destroy session 
if(session_destroy()) { 
    // Redirecting To Home Page 
    //header("Location: login.php"); 
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Logout</title>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body style='margin: 0; padding: 0; background-color: #333; color: #fff;'>
        <script>
            Swal.fire({
                title: 'Logout Successful!',
                text: 'Successfully logged out. Thank you & visit again.',
                icon: 'success',
                confirmButtonText: 'OK',
                background: '#333',  // Dark background
                color: '#fff',  // White text color
                confirmButtonColor: '#4CAF50',  // Green button color
                iconColor: '#fff'  // White icon color
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'LoginPage.php';
                }
            });
        </script>
    </body>
    </html>
    "; 
}
?>
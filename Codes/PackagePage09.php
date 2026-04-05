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
else{
    //echo "Db Connection Okay!";
    // Fetch package data from the database
    $sql = "SELECT * FROM `package_details` WHERE `pkg_id` IN (27,30,31,32,39);";
    $result = $conn->query($sql);
}
include("auth_session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Page 01</title>
    <link rel="stylesheet" href="PackagePage.css">
</head>
<body>

<div class="pricing-container">
    <h1 class="pricing-title">Choose Your Perfect Plan</h1>
    <p class="pricing-subtitle">Unlimited Possibilities with Tailored Plans</p>

    <!-- Slider Container -->
    <div class="slider-wrapper">
        <div class="slider" id="slider">
            <!-- Pricing Cards -->
            <?php
                // Generate HTML content for each package card
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <div class="pricing-card">
                            <h2 class="card-title">' . $row["pkg_name"] . '</h2>
                            <p class="card-price">Rs. ' . $row["pkg_price"] . '</p>
                            <p class="card-frequency">Valid For ' . $row["pkg_validity"] . ' Month</p>
                            <ul class="features-list">
                                <li>Anytime Data: ' . $row["anytime_data"] . ' GB</li>
                                <li>Night-time Data: ' . $row["nighttime_data"] . ' GB</li>
                            </ul>
                            <button class="subscribe-btn" onclick="window.location.href=\'' . $row["pkg_link"] . '\'">Check More Details</button>
                        </div>';
                    }
                } 
                else {
                    echo '<p>No packages found.</p>';
                }

                // Close the database connection
                $conn->close();
            ?>
        </div>
    </div>
    <!-- Navigation Arrows -->
    <button class="arrow-btn arrow-left" onclick="moveSlider(-1)">&#9664;</button>
    <button class="arrow-btn arrow-right" onclick="moveSlider(1)">&#9654;</button>

    <!--Closed button in the right top corner-->
    <a href="index.php" class="close-btn" title="Go to Home Page">&#10005;</a>
</div>

<script>
    const slider = document.getElementById("slider");
    const cardWidth = document.querySelector(".pricing-card").offsetWidth;
    const gap = parseFloat(getComputedStyle(slider).gap) || 16;
    const visibleCards = 3;  // Number of visible cards at a time
    let scrollPosition = 0;

    function moveSlider(direction) {
        // Calculate the move amount (width of three cards + gaps)
        const moveAmount = (cardWidth + gap) * visibleCards;

        // Update the scroll position based on the direction
        scrollPosition += direction * moveAmount;

        // Limit scrolling within the bounds
        const maxScroll = slider.scrollWidth - slider.clientWidth;
        if (scrollPosition < 0) scrollPosition = 0;
        if (scrollPosition > maxScroll) scrollPosition = maxScroll;

        // Apply transform for smooth scrolling effect
        slider.style.transform = `translateX(-${scrollPosition}px)`;
    }
</script>

</body>
</html>

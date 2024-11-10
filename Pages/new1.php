<?php
// Include the database connection file
include 'db.php';

// Fetch package data from the database
$sql = "SELECT * FROM package_details";
$result = $conn->query($sql);

// Generate HTML content for each package card
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
        <div class="pricing-card">
            <h2 class="card-title">' . $row["pkg_name"] . '</h2>
            <p class="card-price">Rs. ' . $row["pkg_price"] . '</p>
            <p class="card-frequency">Valid For ' . $row["pkg_validity"] . '</p>
            <ul class="features-list">
                <li>Anytime Data: ' . $row["anytime_data"] . ' GB</li>
                <li>Night-time Data: ' . $row["nighttime_data"] . ' GB</li>
            </ul>
        </div>';
    }
} else {
    echo '<p>No packages found.</p>';
}

// Close the database connection
$conn->close();
?>

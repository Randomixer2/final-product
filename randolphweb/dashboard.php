<?php
session_start();  // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");  // Redirect to login if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swift Aid - Dashboard</title>
    <link rel="stylesheet" href="styles.css"> <!-- Linking to the external CSS file -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="dashboard-container">
        <div class="form-box">
            <h1>Welcome, <?php echo $_SESSION['email']; ?>!</h1>
            <p>Welcome to your Emergency Hotline Dashboard.</p>
            <div class="icon-container">
                <!-- Emergency Hotline icons -->
                <div class="icon">
                    <a href="#">
                        <img src="cross.png" alt="Emergency Ambulance Icon">
                        <p>Ambulance</p>
                    </a>
                </div>
                <div class="icon">
                    <a href="#">
                        <img src="fire.jpg" alt="Fire Department Icon">
                        <p>Fire Department</p>
                    </a>
                </div>
                <div class="icon">
                    <a href="#">
                        <img src="police.jpg" alt="Police Department Icon">
                        <p>Police</p>
                    </a>
                </div>
                <div class="icon">
                    <a href="#">
                        <img src="disaster.png" alt="Disaster Response Icon">
                        <p>Disaster Response</p>
                    </a>
                </div>
                <div class="icon">
                    <a href="#">
                        <img src="posion.png" alt="Poison Control Icon">
                        <p>Poison Control</p>
                    </a>
                </div>
                <div class="icon">
                    <a href="#">
                        <img src="coast.png" alt="Coast Guard Icon">
                        <p>Coast Guard</p>
                    </a>
                </div>
                <div class="icon">
                    <a href="#">
                        <img src="electric.jpg" alt="Electricity Emergency Icon">
                        <p>Electricity Emergency</p>
                    </a>
                </div>
                <div class="icon">
                    <a href="#">
                        <img src="gas.jpg" alt="Gas Leak Hotline Icon">
                        <p>Gas Leak</p>
                    </a>
                </div>
                <div class="icon">
                    <a href="#">
                        <img src="water.png" alt="Water Supply Emergency Icon">
                        <p>Water Supply</p>
                    </a>
                </div>
                <div class="icon">
                    <a href="#">
                        <img src="search.jpg" alt="Search & Rescue Icon">
                        <p>Search & Rescue</p>
                    </a>
                </div>
            </div>
            <a href="logout.php" class="logout-btn">Logout</a>  <!-- Logout link -->
        </div>
    </div>
</body>
</html>

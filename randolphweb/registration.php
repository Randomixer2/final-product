<?php
session_start(); // Start the session

// Include the database connection
require 'db_connect.php';  // Ensure this path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];

    // Validate the input (ensure no fields are empty)
    if (empty($fullname) || empty($email) || empty($location) || empty($contact) || empty($password)) {
        echo "All fields are required.";
    } else {
        // Check if the email already exists in the database
        $stmt = $conn->prepare("SELECT id FROM user WHERE email = ?");
        if ($stmt === false) {
            // Show the error message if prepare() fails
            die("Error preparing email check query: " . $conn->error);
        }
        
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Email is already registered
            echo "This email is already registered.";
        } else {
            // Hash the password before saving to the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare the SQL statement to insert the new user into the database
            $insert_stmt = $conn->prepare("INSERT INTO user (fullname, email, location, contact, password) VALUES (?, ?, ?, ?, ?)");
            if ($insert_stmt === false) {
                // Show the error message if prepare() fails
                die("Error preparing insert query: " . $conn->error);
            }

            // Bind parameters and execute the statement
            $insert_stmt->bind_param("sssss", $fullname, $email, $location, $contact, $hashed_password);

            if ($insert_stmt->execute()) {
                // Registration successful, redirect to login page
                echo "Registration successful! You can now <a href='login.php'>log in</a>.";
            } else {
                // Error during registration
                echo "Error executing insert query: " . $insert_stmt->error;
            }

            $insert_stmt->close();
        }
        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>

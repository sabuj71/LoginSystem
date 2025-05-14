<?php

?><?php
// Start session if needed
session_start();

// Simple hardcoded login data for demo (replace with database check)
$valid_email = $_POST['email'];
$valid_password = $_POST ['password']; // In real app, use hashed passwords

// Initialize variables
$email = $password = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    // Check login
    if (empty($errors)) {
        if ($email === $valid_email && $password === $valid_password) {
            echo "<h2>Login successful!</h2>";
            // Redirect or set session here
        } else {
            echo "<h2>Incorrect email or password.</h2>";
        }
    } else {
        // Display all errors
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>
<?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Collect form data
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $token = $_POST['token'];

    // Call the updateUser function
    if (updatepengguna($id, $username, $password, $role, $token)) {
        // Redirect to the main page after successful update
        header("Location: index.php");
        exit();
    } else {
        // Display an error message if update fails
        echo "Error updating record.";
    }
} else {
    echo "Invalid request";
    exit();
}
?>
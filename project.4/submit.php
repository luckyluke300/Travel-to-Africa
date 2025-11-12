<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "website_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insert into the database using prepared statement
$sql = "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo "Thank you! Your message has been sent.";
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>

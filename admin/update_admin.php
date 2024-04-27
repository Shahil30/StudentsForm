<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "disha_foundation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if data was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newEmail = $_POST['email'];
    $newPassword = $_POST['password']; // Consider hashing the password

    // Validate inputs (basic example, expand as necessary)
    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format'); window.location='welcome.php';</script>";
    } else {
        // Hashing the new password before storing it
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Prepare an UPDATE statement
        $stmt = $conn->prepare("UPDATE admins SET email = ?, password = ? WHERE id = 1"); // Assume 'id = 1' for demonstration
        $stmt->bind_param("ss", $newEmail, $hashedPassword);

        if ($stmt->execute()) {
            echo "<script>alert('Email and password updated successfully.'); window.location='welcome.php';</script>";
        } else {
            echo "<script>alert('Error updating record: " . $stmt->error . "'); window.location='welcome.php';</script>";
        }
        $stmt->close();
    }
}

$conn->close();
?>

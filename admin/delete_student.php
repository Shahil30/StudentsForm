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

// Check if the 'id' GET variable is set
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);  // Ensure the ID is an integer to prevent SQL injection

    // SQL to delete the record
    $sql = "DELETE FROM student_profiles WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error: ID not provided.";
}

$conn->close();

// Redirect back to the dashboard
header("Location: welcome.php");
exit();
?>

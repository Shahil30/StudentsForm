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

// Prepare the update statement
$sql = "UPDATE student_profiles SET 
            student_name=?, dob=?, contact_no=?, address=?, in_disha_since=?, 
            father_name=?, mother_name=?, family_members=?, earning_members=?, 
            school_name=?, class=?, school_timings=?, subjects=?, 
            receiving_sponsorship=?, taking_tuitions=?, tuition_subjects=?, 
            tuition_time=?, tuition_place=?, fees_paid=?, amount_paid=?, 
            part_time_job=?, job_description=?, interests=?, how_help_back=? 
        WHERE id=?";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die('MySQL prepare error: ' . $conn->error);
}

// Bind parameters and execute statement
$stmt->bind_param("sssssiiissssssiisssissssi",
    $_POST['student_name'], $_POST['dob'], $_POST['contact_no'], $_POST['address'], $_POST['in_disha_since'],
    $_POST['father_name'], $_POST['mother_name'], $_POST['family_members'], $_POST['earning_members'],
    $_POST['school_name'], $_POST['class'], $_POST['school_timings'], $_POST['subjects'],
    $_POST['receiving_sponsorship'], $_POST['taking_tuitions'], $_POST['tuition_subjects'],
    $_POST['tuition_time'], $_POST['tuition_place'], $_POST['fees_paid'], $_POST['amount_paid'],
    $_POST['part_time_job'], $_POST['job_description'], $_POST['interests'], $_POST['how_help_back'],
    $_POST['id']);

// Execute the prepared statement
if ($stmt->execute()) {
    echo "Record updated successfully";
    // Redirect back to the dashboard or another appropriate page
    header('Location: welcome.php'); 
    exit();
} else {
    echo "Error updating record: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

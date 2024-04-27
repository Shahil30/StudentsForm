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

// Prepare an INSERT statement
$stmt = $conn->prepare("INSERT INTO student_profiles (student_name, dob, contact_no, address, in_disha_since, father_name, mother_name, family_members, earning_members, school_name, class, school_timings, subjects, receiving_sponsorship, taking_tuitions, tuition_subjects, tuition_time, tuition_place, fees_paid, amount_paid, part_time_job, job_description, interests, how_help_back, form_datetime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");

// Bind parameters
$stmt->bind_param("sssssssiissssiisssidsiss", $student_name, $dob, $contact_no, $address, $in_disha_since, $father_name, $mother_name, $family_members, $earning_members, $school_name, $class, $school_timings, $subjects, $receiving_sponsorship, $taking_tuitions, $tuition_subjects, $tuition_time, $tuition_place, $fees_paid, $amount_paid, $part_time_job, $job_description, $interests, $how_help_back);

// Set parameters and execute
$student_name = $_POST['student_name'];
$dob = $_POST['dob'];
$contact_no = $_POST['contact_no'];
$address = $_POST['address'];
$in_disha_since = $_POST['in_disha_since'];
$father_name = $_POST['father_name'];
$mother_name = $_POST['mother_name'];
$family_members = $_POST['family_members'];
$earning_members = $_POST['earning_members'];
$school_name = $_POST['school_name'];
$class = $_POST['class'];
$school_timings = $_POST['school_timings'];
$subjects = $_POST['subjects'];
$receiving_sponsorship = $_POST['receiving_sponsorship'];
$taking_tuitions = $_POST['taking_tuitions'];
$tuition_subjects = $_POST['tuition_subjects'];
$tuition_time = $_POST['tuition_time'];
$tuition_place = $_POST['tuition_place'];
$fees_paid = $_POST['fees_paid'];
$amount_paid = $_POST['amount_paid'];
$part_time_job = $_POST['part_time_job'];
$job_description = $_POST['job_description'];
$interests = $_POST['interests'];
$how_help_back = $_POST['how_help_back'];

if ($stmt->execute()) {
    echo "<script>alert('Your Records have been saved Successfully, Thank you!!');</script>";
} else {
    echo "<script>alert('Error: Could not save the records.');</script>";
}

$stmt->close();
$conn->close();


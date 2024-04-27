<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Student Data</title>
</head>
<?php require 'nav.php'; ?>
<body>
    
    <div class="container mt-5">

        <h4>Student Data</h4>
        <table class="table table-bordered">
        <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date of Birth</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    <?php include 'fetch_students.php'; ?>
</tbody>

        </table>
    </div>
    <script>
function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this record?")) {
        // Redirect to a PHP file that handles deletion
        window.location.href = "delete_student.php?id=" + id;
    }
}
</script>

</body>
</html>

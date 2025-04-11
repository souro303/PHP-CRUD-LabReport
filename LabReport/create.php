<?php
include "config.php";

// Handle form submission
if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Securely hash password
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO users (firstname, lastname, password, email, phone)
            VALUES ('$firstname', '$lastname', '$password', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        header("Location: view.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New User</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Create New User</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="firstname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="lastname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" name="submit" class="btn btn-success">Create User</button>
                            <a href="view.php" class="btn btn-secondary">View Users</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

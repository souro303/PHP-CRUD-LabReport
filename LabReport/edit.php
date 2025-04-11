<?php
include "config.php";

// Check if the user ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Get user data by ID
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit;
    }
}

// Update user data on form submit
if (isset($_POST['update'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE users SET 
                firstname = '$firstname',
                lastname = '$lastname',
                email = '$email',
                phone = '$phone'
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: view.php");
        exit;
    } else {
        echo "Error updating user: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit User</h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" name="firstname" class="form-control" value="<?= $row['firstname']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="lastname" class="form-control" value="<?= $row['lastname']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $row['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="<?= $row['phone']; ?>" required>
                </div>
                <div class="text-center">
                    <button type="submit" name="update" class="btn btn-success">Update</button>
                    <a href="view.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

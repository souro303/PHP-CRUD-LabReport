<?php
include "config.php";

// Fetch all users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Users</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">User List</h2>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['firstname']}</td>
                                        <td>{$row['lastname']}</td>
                                        <td>{$row['email']}</td>
                                        <td>{$row['phone']}</td>
                                        <td>
                                            <a href='edit.php?id={$row['id']}' class='btn btn-sm btn-warning me-2'>Edit</a>
                                            <a href='delete.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure you want to delete this user?');\">Delete</a>
                                        </td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No users found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="create.php" class="btn btn-primary">Add New User</a>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

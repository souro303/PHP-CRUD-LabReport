<?php
include "config.php";

// Check if the 'id' is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the user
    $sql = "DELETE FROM users WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        $conn->query("SET @count = 0;");
        $conn->query("UPDATE users SET id = @count := @count + 1;");
        $conn->query("ALTER TABLE users AUTO_INCREMENT = 1;");
        
        // Redirect back to the user list
        header("Location: view.php");
        exit;
    } else {
        echo "Error deleting user: " . $conn->error;
    }
} else {
    echo "No user ID specified.";
}
?>

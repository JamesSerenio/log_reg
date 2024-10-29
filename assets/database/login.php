<?php
session_start();
include 'config.php'; // Ensure this path is correct

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the SQL statement to fetch user data
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    
    if ($stmt) { // Check if the statement was prepared successfully
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            // Verify the password
            if (password_verify($password, $user['password'])) { 
                // User found, start session and redirect to landing page
                $_SESSION['user_id'] = $user['user_id']; // Make sure to use the correct field name
                $_SESSION['username'] = $user['username'];

                header("Location: ../../landing.php");  
                exit();
            } else {
                // Invalid password
                echo "<script>alert('Invalid username or password.'); window.history.back();</script>";
            }
        } else {
            // Invalid username
            echo "<script>alert('Invalid username or password.'); window.history.back();</script>";
        }

        $stmt->close(); // Close the prepared statement
    } else {
        // Error preparing the statement
        echo "Error preparing the statement: " . $conn->error;
    }
}

$conn->close(); // Close the database connection
?>

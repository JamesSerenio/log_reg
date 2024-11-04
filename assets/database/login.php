<?php
session_start();
include 'config.php'; 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    
    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) { 
                $_SESSION['user_id'] = $user['user_id']; 
                $_SESSION['username'] = $user['username'];

                header("Location: ../../landing.php");  
                exit();
            } else {
                echo "<script>alert('Invalid username or password.'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Invalid username or password.'); window.history.back();</script>";
        }
        $stmt->close(); 
    } else {
        echo "Error preparing the statement: " . $conn->error;
    }
}
$conn->close();
?>

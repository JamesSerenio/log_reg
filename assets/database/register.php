<?php
session_start();
include 'config.php'; // Ensure this path is correct

// Retrieve form data
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password for security

// Start transaction
$conn->begin_transaction();

try {
    // Prepare and execute the insert statement for the user
    $sql = "INSERT INTO users (fullname, username, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $fullname, $username, $email, $password);

    if (!$stmt->execute()) {
        throw new Exception("Error inserting user: " . $stmt->error);
    }

    // Get the last inserted user ID
    $userId = $stmt->insert_id;

    // Prepare and execute the insert statement for the profile
    $sqlProfile = "INSERT INTO profiles (user_id) VALUES (?)"; // Removed full_name from here
    $stmtProfile = $conn->prepare($sqlProfile);
    $stmtProfile->bind_param("i", $userId);

    if (!$stmtProfile->execute()) {
        throw new Exception("Error inserting profile: " . $stmtProfile->error);
    }

    // Commit the transaction
    $conn->commit();

    $_SESSION['registration_success'] = true;
    header("Location: ../../index.php");
} catch (Exception $e) {
    // Rollback the transaction in case of an error
    $conn->rollback();
    echo "Registration failed: " . $e->getMessage();
} finally {
    $stmt->close();
    if (isset($stmtProfile)) {
        $stmtProfile->close(); // Check if the statement was created
    }
    $conn->close();
}
?>

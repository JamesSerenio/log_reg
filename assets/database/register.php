<?php
session_start();
include 'config.php';


$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 


$conn->begin_transaction();

try {
    $sql = "INSERT INTO users (fullname, username, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $fullname, $username, $email, $password);

    if (!$stmt->execute()) {
        throw new Exception("Error inserting user: " . $stmt->error);
    }

    $userId = $stmt->insert_id;

    $sqlProfile = "INSERT INTO profiles (user_id) VALUES (?)";
    $stmtProfile = $conn->prepare($sqlProfile);
    $stmtProfile->bind_param("i", $userId);

    if (!$stmtProfile->execute()) {
        throw new Exception("Error inserting profile: " . $stmtProfile->error);
    }

    $conn->commit();

    $_SESSION['registration_success'] = true;
    header("Location: ../../index.php");
} catch (Exception $e) {
    $conn->rollback();
    echo "Registration failed: " . $e->getMessage();
} finally {
    $stmt->close();
    if (isset($stmtProfile)) {
        $stmtProfile->close(); 
    }
    $conn->close();
}
?>

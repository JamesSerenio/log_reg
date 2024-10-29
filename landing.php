<?php
session_start();  

include 'assets/database/config.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}


$sql = "SELECT u.user_id, u.username, u.email, u.fullname, p.profile_id 
        FROM users u 
        LEFT JOIN profiles p ON u.user_id = p.user_id 
        UNION 
        SELECT u.user_id, u.username, u.email, u.fullname, p.profile_id 
        FROM users u 
        RIGHT JOIN profiles p ON u.user_id = p.user_id";

$stmtJoin = $conn->prepare($sql);
$stmtJoin->execute();
$joinedResult = $stmtJoin->get_result();
$joinedData = $joinedResult->fetch_all(MYSQLI_ASSOC);
$stmtJoin->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/landing.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Welcome to the Admin Dashboard</h1>

    <h2>Users and Profiles Information</h2>
    <table>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Full Name</th>
            <th>Profile ID</th>
        </tr>
        <?php foreach ($joinedData as $data) : ?>
            <tr>
                <td><?php echo htmlspecialchars($data['user_id']); ?></td>
                <td><?php echo htmlspecialchars($data['username']); ?></td>
                <td><?php echo htmlspecialchars($data['email']); ?></td>
                <td><?php echo htmlspecialchars($data['fullname']); ?></td>
                <td><?php echo htmlspecialchars($data['profile_id']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="logout-button">
        <a href="assets/database/logout.php">Logout</a> 
    </div>
</body>
</html>

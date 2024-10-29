<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="flip-card">
        <div class="flip-card-inner" id="flip-card-inner">
            <!-- Login Section -->
            <div class="flip-card-front">
                <h2>Login</h2>
                <form action="assets/database/login.php" method="post">
                    <div class="input-icon">
                        <input type="text" name="username" placeholder="Username" required>
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="input-icon">
                        <input type="password" name="password" placeholder="Password" required>
                        <i class="fas fa-lock"></i>
                    </div>
                    <button type="submit">Login</button>
                </form>
                <p>Don't have an account? <a href="#" id="flip-to-register">Register</a></p>
            </div>
            
            <!-- Register Section -->
            <div class="flip-card-back">
                <h2>Register</h2>
                <form action="assets/database/register.php" method="post">
                    <div class="input-icon">
                        <input type="text" name="fullname" placeholder="Full Name">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="input-icon">
                        <input type="text" name="username" placeholder="Username" required>
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="input-icon">
                        <input type="email" name="email" placeholder="Email">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="input-icon">
                        <input type="password" name="password" placeholder="Password" required>
                        <i class="fas fa-lock"></i>
                    </div>
                    <button type="submit">Register</button>
                </form>
                <p>Already have an account? <a href="#" id="flip-to-login">Login</a></p>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/script.js"></script>

</body>
</html>

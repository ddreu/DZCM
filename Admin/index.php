<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <div class="login-container">
        <div class="image-section">
            <!-- <img src="images/logo.png" alt="Logo" class="logo">-->

        </div>
        <div class="login-section">
            <div class="home-button">
                <a href="../index.html"><i class="fas fa-arrow-left"></i> Home</a>
            </div>
            <h1>Welcome</h1>
            <p>Log in to your account to continue</p>
            <form action="" method="post">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="name" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="••••••••••••••" required>
                </div>
                <div class="forgot-password">
                    <a href="#">Forgot your password?</a>
                </div>
                <button type="submit" class="login-button">Log In</button>
            </form>

            <div class="social-links">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </div>
</body>

</html>
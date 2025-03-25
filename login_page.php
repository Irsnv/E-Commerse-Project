<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Dummy credentials (replace with database verification)
    $valid_username = "Mirsnv";
    $valid_password = "irsan123";

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION["admin"] = $username;
        header("Location: admin.php"); // Redirect to dashboard
        exit();
    } else {
        $error_message = "Invalid username or password.";
        header("Location: login.php?error=" . urlencode($error_message));
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./styles/login.css">
</head>
<body>

    <div class="container" id="login">
        <h1 class="form-title">Admin Login</h1>

        <form method="post" action="">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" id="username" name="username" required placeholder="Username">
            </div>

            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" required placeholder="Password">
                <i class="fas fa-eye toggle-password" onclick="togglePassword()"></i>
            </div>

            <input type="submit" class="btn" value="Log in" name="LogIn">
            <p><a href="password_recovery.php">Forgot your password?</a></p>
        </form>
    </div>

    <script>
        function togglePassword() {
            let passwordInput = document.getElementById("password");
            let toggleIcon = document.querySelector(".toggle-password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }

        function closeModal() {
            document.getElementById("errorModal").style.display = "none";
        }

        document.addEventListener("click", function () {
            let errorModal = document.getElementById("errorModal");
            if (errorModal) {
                errorModal.style.display = "block";
            }
        });
    </script>

</body>
</html>

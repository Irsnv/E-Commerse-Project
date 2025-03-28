<?php
    session_start();
    include 'db_connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        // SQL query to check if a user with the given email and password exists
        $sql = "SELECT * FROM users WHERE user_email='$email' AND user_password='$password'";
        $result = $conn->query($sql);
        //if a matching user is found, log them in
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['role'] = $row['user_role'];
            $_SESSION['name'] = $row['user_name'];

            // redirect to the admin page after login
            echo "<script>alert('Login successful! Redirecting...'); window.location.href='admin.php';</script>";
        } else {
            echo "<script>alert('Invalid email or password!');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="./styles/login_page.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Login</h2>

        <form method="post">
            <div class="form-group">
                <label>Email</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="email" name="email" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="password" id="password" name="password" class="form-control" required>
                    <div class="input-group-append">
                        <span class="input-group-text toggle-password" onclick="togglePassword()">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div>

    <!-- JavaScript for Password Toggle -->
    <script>
        function togglePassword() {
            let passwordInput = document.getElementById("password");
            let toggleIcon = document.querySelector(".toggle-password i");
            
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
    </script>

</body>
</html>

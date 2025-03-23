<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'Mirsnv' && $password == 'irsan123') {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
        exit();
    } else {
        echo "Invalid Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <div class="container" id="login">
        <h1 class="form-title">Login</h1>
        <form method="post" action="">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" id="username" name="username" required placeholder="Username">

                <label for="username">Username: </label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" required placeholder="Password">

                <label for="password">Password: </label>
            </div>

            <input type="submit" class="btn" value="Log in" name="LogIn">
        </form>
    </div>
</body>
</html>

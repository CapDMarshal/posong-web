<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "
        SELECT user_id, email, password, NULL as admin_id FROM users WHERE email = '$email'
        UNION
        SELECT admin_id as user_id, email, password, admin_id FROM admin WHERE email = '$email'
    ";
    $result = $conn->query($query);

    if ($result) {
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['role'] = isset($user['admin_id']) ? 'admin' : 'user';

                if ($_SESSION['role'] === 'admin') {
                    header("Location: ./admin/admin_dashboard.php");
                } else {
                    header("Location: review.php");
                }
                exit;
            }
        }
        echo "Login gagal, periksa email dan password!";
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quattrocento:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <div class="card-login col-6">
            <div class="left-section col-6">
                <form method="post" action="login.php">
                    <h1>Login ke akun anda</h1>
                    <hr class="col-12" style="height:3px;border-width:2px; opacity:1; color:#1A4D2E; background-color:#1A4D2E;" >
                    <input type="email" name="email" placeholder="Email" required><br>
                    <input type="password" name="password" placeholder="Password" required><br>
                    <button class="basicbtn" type="submit">Login</button>
                </form>
            </div>
            <div class="right-section col-6">
                <h1>Selamat datang</h1>
                <hr class="col-10" style="height:3px;border-width:2px; opacity:1; color:#F2F2F2; background-color:#F2F2F2;" >
                <p>Apakah anda belum punya akun?</p>
                <a class="basicbtn" href="register.php">Sign Up</a>
            </div>
        </div>
    </div>
</body>
</html>
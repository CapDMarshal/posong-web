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
                    header("Location: admin_dashboard.php");
                } else {
                    header("Location: user_dashboard.php");
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

<form method="post" action="login.php">
    <h1>Login ke akun anda</h1>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
    <p>Belum punya akun?<a href="register.php">daftar disini!</a></p>
</form>
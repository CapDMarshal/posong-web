<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
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
    <title>Registrasi</title>
</head>
<body>
    <div class="login-container">
        <div class="card-login col-6">
            <div class="left-section col-6">
                <form method="post" action="register.php">
                    <h1>Registrasi Pengguna</h1>
                    <hr class="col-12" style="height:3px;border-width:2px; opacity:1; color:#1A4D2E; background-color:#1A4D2E;" >
                    <input type="text" name="name" placeholder="Nama" required><br>
                    <input type="email" name="email" placeholder="Email" required><br>
                    <input type="password" name="password" placeholder="Password" required><br>
                    <button class="basicbtn" type="submit">Daftar</button>
                </form>
            </div>
            <div class="right-section col-6">
                <h1>Selamat datang</h1>
                <hr class="col-10" style="height:3px;border-width:2px; opacity:1; color:#F2F2F2; background-color:#F2F2F2;" >
                <p>Sudah punya akun?</p> 
                <a class="basicbtn" href="login.php">Login</a>
            </div>
        </div>
    </div>
</body>
</html>
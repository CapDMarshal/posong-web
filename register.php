<?php
include 'config.php'; // Menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Validasi input
    if (empty($name) || empty($email) || empty($password)) {
        echo "Semua kolom harus diisi!";
    } else {
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Simpan pengguna baru ke database
        $stmt = $conn->prepare("INSERT INTO User (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hashedPassword);
        
        if ($stmt->execute()) {
            echo "Pendaftaran berhasil! Anda dapat login sekarang.";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
    <h1>Registrasi Pengguna</h1>
    <form method="post" action="register.php">
        Nama: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <button type="submit">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="login.php">Login di sini</a>.</p>
</body>
</html>

<?php
session_start();
include 'config.php'; // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id']; // Ambil ID pengguna dari session
    $amount = $_POST['amount']; // Jumlah pembayaran
    $reservationId = $_POST['reservation_id']; // ID reservasi yang terkait

    // Insert data pembayaran ke database
    $stmt = $conn->prepare("INSERT INTO payment (user_id, amount, reservation_id) VALUES (?, ?, ?)");
    $stmt->bind_param("idi", $userId, $amount, $reservationId);
    
    if ($stmt->execute()) {
        echo "Pembayaran berhasil! ID Pembayaran: " . $stmt->insert_id;
    } else {
        echo "Gagal melakukan pembayaran: " . $stmt->error;
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
    <title>Pembayaran</title>
</head>
<body>
    <h1>Pembayaran</h1>
    <form method="post" action="payment.php">
        Jumlah Pembayaran: <input type="number" name="amount" required><br>
        ID Reservasi: <input type="number" name="reservation_id" required><br>
        <button type="submit">Bayar</button>
    </form>
</body>
</html>

<?php
include 'session.php';
include 'config.php';

// Menampilkan daftar reservasi yang belum dikonfirmasi
$query = "SELECT * FROM reservations WHERE reservation_status = 'pending'";
$result = $conn->query($query);

echo "<h1>Konfirmasi Reservasi</h1>";

if ($result) {
    if ($result->num_rows > 0) {
        while($reservation = $result->fetch_assoc()) {
            echo "ID Reservasi: " . $reservation['reservation_id'] . "<br>";
            echo "Nama: " . $reservation['user_name'] . "<br>";
            echo "Email: " . $reservation['user_email'] . "<br>";
            echo "Tanggal: " . $reservation['date'] . "<br>";
            echo "Status: " . $reservation['reservation_status'] . "<br>";
            echo "Jumlah Orang: " . $reservation['people'] . "<br>";
            echo "Bukti Pembayaran: <br><img src='" . $reservation['photo'] . "' alt='Bukti Pembayaran' style='max-width: 500px;'><br>";
            echo "<a href='confirm_reservation.php?confirm=" . $reservation['reservation_id'] . "'>Konfirmasi</a> ";
            echo "<a href='confirm_reservation.php?cancel=" . $reservation['reservation_id'] . "'>Batalkan</a><br><br>";
        }
    } else {
        echo "Tidak ada reservasi yang membutuhkan konfirmasi.";
    }
} else {
    echo "Error executing query: {$conn->error}";
}

// Mengonfirmasi atau membatalkan reservasi berdasarkan URL parameter
if (isset($_GET['confirm'])) {
    $reservation_id = $_GET['confirm'];
    $sql = "UPDATE reservations SET reservation_status = 'confirmed', admin_confirmed_by = {$_SESSION['user_id']}, confirmation_date = NOW() WHERE reservation_id = $reservation_id";
    $conn->query($sql);
    header("Location: confirm_reservation.php");
} elseif (isset($_GET['cancel'])) {
    $reservation_id = $_GET['cancel'];
    $sql = "UPDATE reservations SET reservation_status = 'cancelled' WHERE reservation_id = $reservation_id";
    $conn->query($sql);
    header("Location: confirm_reservation.php");
}
<?php
session_start();
include 'config.php'; // Koneksi ke database

// Menampilkan semua pembayaran
$query = "SELECT * FROM payment JOIN reservations ON payment.reservation_id = reservations.reservation_id";
$result = $conn->query($query);

echo "<h1>Manajemen Pembayaran</h1>";

if ($result) {
    echo "<table border='1'>
    <tr>
        <th>ID Pembayaran</th>
        <th>ID Reservasi</th>
        <th>Bukti Foto</th>
        <th>Tanggal Pembayaran</th>
        <th>Status</th>
        <th>Reservasi ID</th>
        <th>Action</th>
    </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['payment_id']}</td>
            <td>{$row['reservation_id']}</td>
            <td>{$row['proof_photo']}</td>
            <td>{$row['payment_date']}</td>
            <td>{$row['payment_status']}</td>
            <td>{$row['reservation_id']}</td>
            <td>
                <form method='post' action='update_payment.php'>
                    <input type='hidden' name='payment_id' value='{$row['payment_id']}'>
                    <select name='payment_status'>
                        <option value='pending'>Pending</option>
                        <option value='verified'>Verified</option>
                        <option value='failed'>Failed</option>
                    </select>
                    <button type='submit'>Update</button>
                </form>
            </td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "Error executing query: " . $conn->error;
}

$conn->close();
?>
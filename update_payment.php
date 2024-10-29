<?php
session_start();
include 'config.php'; // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $paymentId = $_POST['payment_id'];
    $status = $_POST['payment_status'];

    // Update status pembayaran
    $stmt = $conn->prepare("UPDATE payment SET payment_status = ? WHERE payment_id = ?");
    
    if ($stmt) {
        $stmt->bind_param("si", $status, $paymentId);
        
        if ($stmt->execute()) {
            echo "Status pembayaran berhasil diperbarui!";
        } else {
            echo "Gagal memperbarui status: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Gagal mempersiapkan statement: " . $conn->error;
    }
}

$conn->close();
?>
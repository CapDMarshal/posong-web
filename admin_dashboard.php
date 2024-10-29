<?php
include 'session.php';
requireLogin();
requireAdmin();

echo "<h1>Selamat datang di Admin Dashboard</h1>";
echo "<a href='confirm_reservation.php'>Konfirmasi Reservasi</a><br>";
echo "<a href='manage_voucher.php'>Kelola Voucher</a><br>";
echo "<a href='logout.php'>Logout</a>";
echo "<a href='manage_review.php'>Kelola Review</a>";
echo "<a href='manage_payment.php'>Kelola Pembayaran</a>";
?>

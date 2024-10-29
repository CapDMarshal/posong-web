<?php
include 'session.php';
requireLogin();

echo "<h1>Selamat datang di User Dashboard</h1>";
echo "<a href='reservation.php'>Buat Reservasi</a><br>";
echo "<a href='review.php'>Beri Review</a><br>";
echo "<a href='logout.php'>Logout</a>";
?>

<?php
include 'session.php';
requireLogin();
requireAdmin();
include 'config.php';

echo "<h1>Kelola Voucher</h1>";

// Menampilkan daftar voucher
$query = "SELECT * FROM voucher";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while($voucher = $result->fetch_assoc()) {
        echo "ID Voucher: " . $voucher['voucher_id'] . "<br>";
        echo "Kode: " . $voucher['code'] . "<br>";
        echo "Diskon: " . $voucher['discount_percentage'] . "%<br>";
        echo "Kedaluwarsa: " . $voucher['expiration_date'] . "<br>";
        echo "Status: " . ($voucher['is_active'] ? "Aktif" : "Tidak Aktif") . "<br>";
        echo "<a href='manage_voucher.php?toggle=" . $voucher['voucher_id'] . "'>Aktifkan/Nonaktifkan</a><br><br>";
    }
} else {
    echo "Tidak ada voucher yang tersedia.";
}

// Menambah voucher baru
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'];
    $discount = $_POST['discount'];
    $expiration = $_POST['expiration'];
    $admin_id = $_SESSION['user_id'];

    $sql = "INSERT INTO Voucher (code, discount_percentage, expiration_date, is_active, admin_change)
            VALUES ('$code', $discount, '$expiration', TRUE, $admin_id)";

    if ($conn->query($sql) === TRUE) {
        echo "Voucher berhasil ditambahkan!";
    } else {
        echo "Gagal menambahkan voucher: " . $conn->error;
    }
}

// Mengaktifkan/menonaktifkan voucher
if (isset($_GET['toggle'])) {
    $voucher_id = $_GET['toggle'];
    $sql = "UPDATE Voucher SET is_active = NOT is_active WHERE voucher_id = $voucher_id";
    $conn->query($sql);
    header("Location: manage_voucher.php");
}
?>

<h2>Tambah Voucher Baru</h2>
<form method="post" action="manage_voucher.php">
    Kode Voucher: <input type="text" name="code" required><br>
    Diskon (%): <input type="number" name="discount" required><br>
    Tanggal Kedaluwarsa: <input type="date" name="expiration" required><br>
    <button type="submit">Tambah Voucher</button>
</form>

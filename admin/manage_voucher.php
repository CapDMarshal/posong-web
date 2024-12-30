<?php
include '../session.php';
include '../config.php';

// Menambah voucher baru
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'];
    $discount = $_POST['discount'];
    $expiration = $_POST['expiration'];
    $admin_id = $_SESSION['user_id'];

    $sql = "INSERT INTO Voucher (code, discount_percentage, expiration_date, is_active, admin_change)
            VALUES ('$code', $discount, '$expiration', TRUE, $admin_id)";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin_dashboard.php?page=manage_voucher");
        exit;
    } else {
        echo "Gagal menambahkan voucher: " . $conn->error;
    }
}

// Mengaktifkan/menonaktifkan voucher
if (isset($_GET['toggle'])) {
    $voucher_id = $_GET['toggle'];
    $sql = "UPDATE Voucher SET is_active = NOT is_active WHERE voucher_id = $voucher_id";
    $conn->query($sql);
    header("Location: admin_dashboard.php?page=manage_voucher");
    exit;
}
?>

<h1>Kelola Voucher</h1>

<?php
// Menampilkan daftar voucher
$query = "SELECT * FROM voucher";
$result = $conn->query($query);

if ($result->num_rows > 0) {
?>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th>ID Voucher</th>
                <th>Kode</th>
                <th>Diskon</th>
                <th>Kedaluwarsa</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php while($voucher = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $voucher['voucher_id']; ?></td>
                <td><?php echo $voucher['code']; ?></td>
                <td><?php echo $voucher['discount_percentage']; ?>%</td>
                <td><?php echo $voucher['expiration_date']; ?></td>
                <td><?php echo $voucher['is_active'] ? "Aktif" : "Tidak Aktif"; ?></td>
                <td>
                    <a href='admin_dashboard.php?page=manage_voucher&toggle=<?php echo $voucher['voucher_id']; ?>' class='btn btn-primary btn-sm'>Aktifkan/Nonaktifkan</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php
} else {
    echo "Tidak ada voucher yang tersedia.";
}
?>

<h2>Tambah Voucher Baru</h2>
<form method="post" action="admin_dashboard.php?page=manage_voucher">
    Kode Voucher: <input type="text" name="code" required><br>
    Diskon (%): <input type="number" name="discount" required><br>
    Tanggal Kedaluwarsa: <input type="date" name="expiration" required><br>
    <button type="submit">Tambah Voucher</button>
</form>

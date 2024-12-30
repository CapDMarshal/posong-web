<?php
include '../session.php';
include '../config.php';

// Mengonfirmasi atau membatalkan reservasi berdasarkan URL parameter
if (isset($_GET['confirm'])) {
    $reservation_id = $_GET['confirm'];
    $sql = "UPDATE reservations SET reservation_status = 'confirmed', admin_confirmed_by = {$_SESSION['user_id']}, confirmation_date = NOW() WHERE reservation_id = $reservation_id";
    $conn->query($sql);
    header("Location: admin_dashboard.php?page=confirm_reservation");
    exit;
} elseif (isset($_GET['cancel'])) {
    $reservation_id = $_GET['cancel'];
    $sql = "UPDATE reservations SET reservation_status = 'cancelled' WHERE reservation_id = $reservation_id";
    $conn->query($sql);
    header("Location: admin_dashboard.php?page=confirm_reservation");
    exit;
}

// Filter status
$status_filter = isset($_GET['status']) ? $_GET['status'] : 'pending';

// Menampilkan daftar reservasi berdasarkan filter status
$query = "SELECT * FROM reservations WHERE reservation_status = '$status_filter'";
$result = $conn->query($query);
?>

<h1>Konfirmasi Reservasi</h1>

<form method="get" action="admin_dashboard.php">
    <input type="hidden" name="page" value="confirm_reservation">
    <label for="status">Filter Status:</label>
    <select name="status" id="status" onchange="this.form.submit()">
        <option value="pending" <?php echo $status_filter == 'pending' ? 'selected' : ''; ?>>Pending</option>
        <option value="confirmed" <?php echo $status_filter == 'confirmed' ? 'selected' : ''; ?>>Confirmed</option>
        <option value="cancelled" <?php echo $status_filter == 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
    </select>
</form>

<?php
if ($result) {
    if ($result->num_rows > 0) {
?>
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>ID Reservasi</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Jumlah Orang</th>
                    <th>Bukti Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php while($reservation = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $reservation['reservation_id']; ?></td>
                    <td><?php echo $reservation['user_name']; ?></td>
                    <td><?php echo $reservation['user_email']; ?></td>
                    <td><?php echo $reservation['date']; ?></td>
                    <td><?php echo $reservation['reservation_status']; ?></td>
                    <td><?php echo $reservation['people']; ?></td>
                    <td><img src='<?php echo "../" . $reservation['photo']; ?>' alt='Bukti Pembayaran' style='max-width: 100px;'></td>
                    <td>
                        <?php if ($reservation['reservation_status'] == 'pending') { ?>
                            <a href='admin_dashboard.php?page=confirm_reservation&confirm=<?php echo $reservation['reservation_id']; ?>' class='btn btn-success btn-sm'>Konfirmasi</a>
                            <a href='admin_dashboard.php?page=confirm_reservation&cancel=<?php echo $reservation['reservation_id']; ?>' class='btn btn-danger btn-sm'>Batalkan</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
<?php
    } else {
        echo "Tidak ada reservasi yang ditemukan.";
    }
} else {
    echo "Error executing query: {$conn->error}";
}
?>
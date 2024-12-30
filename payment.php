<?php
include 'config.php';

function isWeekend($date) {
    $timestamp = strtotime($date);
    $day = date('N', $timestamp);
    return ($day >= 6);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservation_id = $_POST['reservation_id'];
    $photoUrl = '';

    // Handle image upload
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'assets/uploads/';
        
        // Check if the uploads directory exists and is writable
        if (!is_dir($uploadDir) || !is_writable($uploadDir)) {
            echo "Directory 'uploads' does not exist or is not writable.";
            exit;
        }

        $uploadFile = $uploadDir . basename($_FILES['photo']['name']);
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
            $photoUrl = $uploadFile;
        } else {
            echo "Gagal mengunggah foto.";
            exit;
        }
    } else {
        echo "Harap unggah bukti pembayaran.";
        exit;
    }

    // Update reservation with the photo URL
    $sql = "UPDATE reservations SET photo = ? WHERE reservation_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("si", $photoUrl, $reservation_id);

        if ($stmt->execute()) {
            echo "Pembayaran berhasil dilakukan!";
        } else {
            echo "Gagal melakukan pembayaran: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Gagal mempersiapkan statement: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card w-50 mx-auto">
            <div class="card-header">
                <h3>Upload Bukti Pembayaran</h3>
            </div>
            <div class="card-body">
                <form id="paymentForm" method="post" action="payment.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="reservation_id">ID Reservasi:</label>
                        <select class="form-control" name="reservation_id" id="reservation_id" required>
                            <option value="">Pilih ID Reservasi</option>
                            <?php
                            $reservation_query = "SELECT reservation_id, user_name FROM reservations WHERE reservation_status = 'pending'";
                            $result = $conn->query($reservation_query);
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['reservation_id'] . "'>" . $row['reservation_id'] . " - " . $row['user_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="modalPhoto">Upload Bukti Pembayaran:</label>
                        <input type="file" class="form-control" name="photo" id="modalPhoto" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $people = $_POST['people'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $room_id = $_POST['room_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $event_type = $_POST['event_type'];

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

    // Insert reservation into the database
    $sql = "INSERT INTO reservations (user_name, user_email, phone_number, room_id, date, time, event_type, reservation_status, photo)
            VALUES (?, ?, ?, ?, ?, ?, ?, 'pending', ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssissss", $name, $email, $phone, $room_id, $date, $time, $event_type, $photoUrl);

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
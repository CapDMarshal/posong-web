<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $room_id = $_POST['room_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $event_type = $_POST['event_type'];

    $sql = "INSERT INTO Reservation (user_name, user_email, phone_number, room_id, date, time, event_type, status)
            VALUES ('$name', '$email', '$phone', $room_id, '$date', '$time', '$event_type', 'pending')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservasi berhasil dibuat!";
    } else {
        echo "Gagal membuat reservasi: " . $conn->error;
    }
}
?>

<form method="post" action="reservation.php">
    Nama: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Telepon: <input type="text" name="phone" required><br>
    ID Ruangan: <input type="number" name="room_id" required><br>
    Tanggal: <input type="date" name="date" required><br>
    Waktu: <input type="time" name="time" required><br>
    Jenis Acara: <input type="text" name="event_type" required><br>
    <button type="submit">Reservasi</button>
</form>

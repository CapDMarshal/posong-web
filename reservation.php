<?php
include 'config.php';
function isWeekend($date)
{
    $timestamp = strtotime($date);
    $day = date('N', $timestamp);
    return ($day >= 6);
}

function updateTotalCapacity($conn, $room_id, $date)
{
    // Initialize total_capacity
    $total_capacity = 0;
    $reservation_count = 0;

    // Check current total capacity for the room on the specified date
    $capacity_query = "SELECT total_capacity FROM rooms WHERE room_id = ?";
    $stmt = $conn->prepare($capacity_query);
    $stmt->bind_param("i", $room_id);
    $stmt->execute();
    $stmt->bind_result($total_capacity);
    $stmt->fetch();
    $stmt->close();

    // Check existing reservations for the room on the specified date
    $reservation_query = "SELECT COUNT(*) FROM reservations WHERE room_id = ? AND date = ?";
    $stmt = $conn->prepare($reservation_query);
    $stmt->bind_param("is", $room_id, $date);
    $stmt->execute();
    $stmt->bind_result($reservation_count);
    $stmt->fetch();
    $stmt->close();

    // Calculate remaining capacity
    $remaining_capacity = $total_capacity - $reservation_count;

    if ($remaining_capacity <= 0) {
        return false; // Room is fully booked
    }

    return true; // Room is available
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $orang = $_POST['people'];
    $phone = $_POST['phone'];
    $room_id = $_POST['room_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $event_type = $_POST['event_type'];

    $room_query = "SELECT price, weekend_price, total_capacity FROM rooms WHERE room_id = ?";
    $stmt = $conn->prepare($room_query);
    $stmt->bind_param("i", $room_id);
    $stmt->execute();
    $stmt->bind_result($price, $weekend_price, $total_capacity);
    $stmt->fetch();
    $stmt->close();

    if (!updateTotalCapacity($conn, $room_id, $date)) {
        echo "Ruangan sudah penuh!";
        exit;
    }

    $is_weekend = isWeekend($date) ? 1 : 0;
    $price = $is_weekend ? $weekend_price : $price;

    $sql = "INSERT INTO reservations (user_name, user_email, phone_number, room_id, date, time, event_type, reservation_status, people, is_weekend, price)
            VALUES ('$name', '$email', '$phone', $room_id, '$date', '$time', '$event_type', 'pending', $orang, $is_weekend, $price)";

    if ($conn->query($sql) === TRUE) {
        echo "Reservasi berhasil dibuat!";
    } else {
        echo "Gagal membuat reservasi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include './assets/layout/head.php'; ?>
    <title>Formulir Reservasi</title>
    <?php include './assets/layout/navbar.php'; ?>
    <div class="content-component marpad">
        <div class="left-title">
            <h1>Camp Biasa</h1>
        </div>
        <div class="img-container" style="width: 100%; height: 550px;">
            <img src="./assets/img/reservcamp.png" alt="camp1" class="card-img" style="height:550px; object-fit:cover;">
        </div>
        <div class="detail-container">
            
        </div>
    </div>
    <form id="reservationForm" method="post" action="reservation.php">
    Nama: <input type="text" name="name" required><br>
    jumlah orang: <input type="number" name="people" required><br>
    Email: <input type="email" name="email" required><br>
    Telepon: <input type="text" name="phone" required><br>
    ID Ruangan: <input type="number" name="room_id" required><br>
    Tanggal: <input type="date" name="date" required><br>
    Waktu: <input type="time" name="time" required><br>
    Jenis Acara: <select name='event_type'>
        <option value='custom'>custom</option>
        <option value='regular'>regular</option>
    </select><br>
    Kode Voucher: <input type="text" name="voucher_code" id="voucherCode"><br>
    <button type="button" id="checkCapacityButton">Cek Sisa Kapasitas</button>
    <span id="capacityResult"></span><br>
    <input type="hidden" name="reservation_status" id="reservationStatus">
    <button type="button" class="btn btn-primary" onclick="submitFormAndShowModal()">Reservasi</button>
</form>
    <?php include './assets/layout/footer.php' ?>


    <!-- Payment Modal -->
    <!-- Payment Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Harap lakukan pembayaran sebesar</h5>
                    <h3 id="paymentAmount"></h3>

                    <form id="paymentForm" method="post" action="payment.php" enctype="multipart/form-data">
                        <input type="hidden" name="name" id="modalName">
                        <input type="hidden" name="people" id="modalPeople">
                        <input type="hidden" name="email" id="modalEmail">
                        <input type="hidden" name="phone" id="modalPhone">
                        <input type="hidden" name="room_id" id="modalRoomId">
                        <input type="hidden" name="date" id="modalDate">
                        <input type="hidden" name="time" id="modalTime">
                        <input type="hidden" name="event_type" id="modalEventType">
                        <label for="modalPhoto">Upload Bukti Pembayaran:</label>
                        <input type="file" name="photo" id="modalPhoto" accept="image/*" required><br>
                        <button type="submit" class="btn btn-primary">Proceed to Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('checkCapacityButton').addEventListener('click', function() {
            var room_id = document.querySelector('input[name="room_id"]').value;
            var date = document.querySelector('input[name="date"]').value;

            if (room_id && date) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'check_capacity.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        var capacityResult = document.getElementById('capacityResult');
                        if (response.success) {
                            capacityResult.textContent = 'Sisa kapasitas: ' + response.remaining_capacity;
                        } else {
                            capacityResult.textContent = 'Error: ' + response.message;
                        }
                    }
                };
                xhr.send('room_id=' + room_id + '&date=' + date);
            } else {
                alert('Please enter both room ID and date.');
            }
        });

        $('#paymentModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var modal = $(this);
            modal.find('#modalName').val($('input[name="name"]').val());
            modal.find('#modalPeople').val($('input[name="people"]').val());
            modal.find('#modalEmail').val($('input[name="email"]').val());
            modal.find('#modalPhone').val($('input[name="phone"]').val());
            modal.find('#modalRoomId').val($('input[name="room_id"]').val());
            modal.find('#modalDate').val($('input[name="date"]').val());
            modal.find('#modalTime').val($('input[name="time"]').val());
            modal.find('#modalEventType').val($('select[name="event_type"]').val());
        });

        function submitFormAndShowModal() {
            var form = document.getElementById('reservationForm');
            var formData = new FormData(form);

            // Perform the form submission via AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'reservation.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = xhr.responseText;
                    if (response.includes('Reservasi berhasil dibuat!')) {
                        // Update the modal with the form data
                        $('#modalName').val($('input[name="name"]').val());
                        $('#modalPeople').val($('input[name="people"]').val());
                        $('#modalEmail').val($('input[name="email"]').val());
                        $('#modalPhone').val($('input[name="phone"]').val());
                        $('#modalRoomId').val($('input[name="room_id"]').val());
                        $('#modalDate').val($('input[name="date"]').val());
                        $('#modalTime').val($('input[name="time"]').val());
                        $('#modalEventType').val($('select[name="event_type"]').val());

                        // Calculate and display the payment amount
                        var room_id = $('input[name="room_id"]').val();
                        var date = $('input[name="date"]').val();
                        var voucher_code = $('input[name="voucher_code"]').val();
                        var xhrPrice = new XMLHttpRequest();
                        xhrPrice.open('POST', 'calculate_price.php', true);
                        xhrPrice.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhrPrice.onreadystatechange = function() {
                            if (xhrPrice.readyState === 4 && xhrPrice.status === 200) {
                                var responsePrice = JSON.parse(xhrPrice.responseText);
                                if (responsePrice.success) {
                                    $('#paymentAmount').text('Rp. ' + responsePrice.final_price);
                                } else {
                                    $('#paymentAmount').text('Error: ' + responsePrice.message);
                                }
                            }
                        };
                        xhrPrice.send('room_id=' + room_id + '&date=' + date + '&voucher_code=' + voucher_code);

                        // Show the modal
                        $('#paymentModal').modal('show');
                    } else {
                        alert('Gagal membuat reservasi: ' + response);
                    }
                }
            };
            xhr.send(formData);
        }
    </script>
</body>

</html>
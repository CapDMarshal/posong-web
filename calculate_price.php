<?php
include 'config.php';

if (isset($_POST['room_id']) && isset($_POST['date'])) {
    $room_id = $_POST['room_id'];
    $date = $_POST['date'];
    $voucher_code = isset($_POST['voucher_code']) ? $_POST['voucher_code'] : '';

    // Check if the date is a weekend
    $timestamp = strtotime($date);
    $day = date('N', $timestamp);
    $is_weekend = ($day >= 6);

    // Fetch price from rooms
    $room_query = "SELECT price, weekend_price FROM rooms WHERE room_id = ?";
    $stmt = $conn->prepare($room_query);
    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'Room query preparation failed: ' . $conn->error]);
        exit;
    }
    $stmt->bind_param("i", $room_id);
    $stmt->execute();
    $stmt->bind_result($price, $weekend_price);
    if (!$stmt->fetch()) {
        $stmt->close();
        echo json_encode(['success' => false, 'message' => 'Fetching room price failed']);
        exit;
    }
    $stmt->close();

    // Determine the final price based on whether it's a weekend
    $final_price = $is_weekend ? $weekend_price : $price;

    // Validate voucher code
    $discount_percentage = 0;
    if (!empty($voucher_code)) {
        $voucher_query = "SELECT discount_percentage FROM voucher WHERE code = ? AND is_active = 1 AND expiration_date >= CURDATE()";
        $stmt = $conn->prepare($voucher_query);
        if (!$stmt) {
            echo json_encode(['success' => false, 'message' => 'Voucher query preparation failed: ' . $conn->error]);
            exit;
        }
        $stmt->bind_param("s", $voucher_code);
        $stmt->execute();
        $stmt->bind_result($discount_percentage);
        if (!$stmt->fetch()) {
            $discount_percentage = 0; // Invalid or expired voucher code
        }
        $stmt->close();
    }

    // Calculate final price with discount
    $final_price = $final_price - ($final_price * ($discount_percentage / 100));

    echo json_encode(['success' => true, 'final_price' => $final_price]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid parameters']);
}
?>
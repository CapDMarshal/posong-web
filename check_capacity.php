<?php
include 'config.php';

if (isset($_POST['room_id']) && isset($_POST['date'])) {
    $room_id = $_POST['room_id'];
    $date = $_POST['date'];

    // Check current total capacity for the room on the specified date
    $capacity_query = "SELECT total_capacity FROM rooms WHERE room_id = ?";
    $stmt = $conn->prepare($capacity_query);
    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'Query preparation failed']);
        exit;
    }
    $stmt->bind_param("i", $room_id);
    $stmt->execute();
    $stmt->bind_result($total_capacity);
    if (!$stmt->fetch()) {
        $stmt->close();
        echo json_encode(['success' => false, 'message' => 'Fetching result failed']);
        exit;
    }
    $stmt->close();

    // Check existing reservations for the room on the specified date
    $reservation_query = "SELECT COUNT(*) FROM reservations WHERE room_id = ? AND date = ?";
    $stmt = $conn->prepare($reservation_query);
    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'Query preparation failed']);
        exit;
    }
    $stmt->bind_param("is", $room_id, $date);
    $stmt->execute();
    $stmt->bind_result($reservation_count);
    if (!$stmt->fetch()) {
        $stmt->close();
        echo json_encode(['success' => false, 'message' => 'Fetching result failed']);
        exit;
    }
    $stmt->close();

    // Calculate remaining capacity
    $remaining_capacity = $total_capacity - $reservation_count;

    if ($remaining_capacity <= 0) {
        echo json_encode(['success' => false, 'message' => 'Room is fully booked']);
    } else {
        echo json_encode(['success' => true, 'remaining_capacity' => $remaining_capacity]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid parameters']);
}
?>
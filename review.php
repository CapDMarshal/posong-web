<?php
include 'session.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservation_id = $_POST['reservation_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO Review (user_id, reservation_id, rating, comment, is_visible)
            VALUES ($user_id, $reservation_id, $rating, '$comment', TRUE)";

    if ($conn->query($sql) === TRUE) {
        echo "Review berhasil ditambahkan!";
    } else {
        echo "Gagal menambahkan review: " . $conn->error;
    }
}
?>

<form method="post" action="review.php">
    ID Reservasi: <input type="number" name="reservation_id" required><br>
    Rating (1-5): <input type="number" name="rating" min="1" max="5" required><br>
    Komentar: <textarea name="comment" required></textarea><br>
    <button type="submit">Beri Review</button>
</form>

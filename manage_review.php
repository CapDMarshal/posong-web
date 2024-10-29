<?php
include 'session.php';
requireLogin();
requireAdmin();
include 'config.php';

echo "<h1>Kelola Review</h1>";

// Menampilkan daftar review
$query = "SELECT Review.review_id, Review.rating, Review.comment, users.name FROM Review JOIN users ON Review.user_id = users.user_id";
$result = $conn->query($query);

if ($result) {
    if ($result->num_rows > 0) {
        while($review = $result->fetch_assoc()) {
            echo "ID Review: " . $review['review_id'] . "<br>";
            echo "User: " . $review['name'] . "<br>";
            echo "Rating: " . $review['rating'] . "<br>";
            echo "Komentar: " . $review['comment'] . "<br>";
            echo "<a href='manage_review.php?delete=" . $review['review_id'] . "'>Hapus</a> ";
            echo "<a href='manage_review.php?toggle_visibility=" . $review['review_id'] . "'>Tampilkan/Sembunyikan</a><br><br>";
        }
    } else {
        echo "Tidak ada review yang tersedia.";
    }
} else {
    echo "Error executing query: " . $conn->error;
}

// Menghapus atau menonaktifkan review
if (isset($_GET['delete'])) {
    $review_id = $_GET['delete'];
    $sql = "DELETE FROM Review WHERE review_id = $review_id";
    $conn->query($sql);
    header("Location: manage_review.php");
    exit;
} elseif (isset($_GET['toggle_visibility'])) {
    $review_id = $_GET['toggle_visibility'];
    $sql = "UPDATE Review SET is_visible = NOT is_visible WHERE review_id = $review_id";
    $conn->query($sql);
    header("Location: manage_review.php");
    exit;
}
<?php
include 'session.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservation_id = $_POST['reservation_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
    $user_id = $_SESSION['user_id'];
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
        echo "Harap unggah foto.";
        exit;
    }

    $sql = "INSERT INTO Review (user_id, reservation_id, rating, comment, photo, is_visible)
            VALUES ($user_id, $reservation_id, $rating, '$comment', '$photoUrl', TRUE)";

    if ($conn->query($sql) === TRUE) {
        echo "Review berhasil ditambahkan!";
        header("Location: documentation.php");
        exit;
    } else {
        echo "Gagal menambahkan review: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include './assets/layout/head.php'; ?>
    <title>Review</title>
<?php include './assets/layout/navbar.php'; ?>

<body>
    <div class="container mt-5">
        <div class="content-component marpad">
            <div class="card w-100 h-75 mx-auto">
                <div class="card-header">
                    <h3>Beri Review</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="review.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="reservation_id">ID Reservasi:</label>
                            <select class="form-control" name="reservation_id" id="reservation_id" required>
                                <option value="">Pilih ID Reservasi</option>
                                <?php
                                $reservation_query = "SELECT reservation_id FROM reservations WHERE reservation_status = 'confirmed'";
                                $result = $conn->query($reservation_query);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['reservation_id'] . "'>" . $row['reservation_id'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating (1-5):</label>
                            <input type="number" class="form-control" name="rating" min="1" max="5" required>
                        </div>
                        <div class="form-group">
                            <label for="comment">Komentar:</label>
                            <textarea class="form-control" name="comment" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="photo">Upload Foto:</label>
                            <input type="file" class="form-control" name="photo" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Beri Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include './assets/layout/footer.php'; ?>
</body>

</html>

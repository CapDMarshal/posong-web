<?php
include 'config.php';
include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include './assets/layout/head.php'; ?>
    <title>Dokumentasi</title>
    <?php include './assets/layout/navbar.php'; ?>
    <div class="content-component marpad">
        <?php
        // Fetch reviews from the database
        $query = "SELECT review_id, rating, comment, photo, users.name FROM review JOIN users ON review.user_id = users.user_id";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            while ($review = $result->fetch_assoc()) {
        ?>
                <div class="card mb-3" style="width: auto; height: auto; margin: 0;">
                    <div class="card-title">
                        <h2>Review</h2>
                    </div>
                    <div class="card-body" style="display: flex; flex-direction: row;">
                        <div class="card-left col">
                            <img src="<?php echo $review['photo']; ?>" alt="review photo" class="card-img" style="width: auto; height: 250px; object-fit: contain;">
                        </div>
                        <div class="card-mid col">
                            <h2>Review Details</h2>
                            <div class="mid-content">
                                <ul>
                                    <li>User: <?php echo $review['name']; ?></li>
                                    <li>Rating: <?php echo $review['rating']; ?></li>
                                    <li>Comment: "<?php echo $review['comment']; ?>"</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "Tidak ada review yang tersedia.";
        }
        ?>
        <div class="text-center mt-4">
            <?php if (isset($_SESSION['user_id'])) { ?>
                <a href="review.php" class="btn btn-primary">Tambahkan Review</a>
            <?php } else { ?>
                <a href="login.php" class="btn btn-primary">Tambahkan Review</a>
            <?php } ?>
        </div>
    </div>
    <?php include './assets/layout/footer.php'; ?>
</body>

</html>
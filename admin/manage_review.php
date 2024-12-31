<?php
include 'config.php';
include 'session.php';

$query = "SELECT review_id, rating, comment, photo, users.name FROM review JOIN users ON review.user_id = users.user_id";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reviews</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include './assets/layout/head.php'; ?>
    <title>Manage Reviews</title>
    <?php include './assets/layout/navbar.php'; ?>
    <div class="content-component marpad">
        <?php
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
    </div>
    <?php include './assets/layout/footer.php'; ?>
</body>

</html>

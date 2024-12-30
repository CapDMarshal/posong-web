<?php
include '../session.php';
include '../config.php';
?>

<h1>Kelola Review</h1>

<?php
// Menampilkan daftar review
$query = "SELECT Review.review_id, Review.rating, Review.comment, Review.photo, Review.is_visible, users.name FROM Review JOIN users ON Review.user_id = users.user_id";
$result = $conn->query($query);

if ($result) {
    if ($result->num_rows > 0) {
?>
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>ID Review</th>
                    <th>User</th>
                    <th>Rating</th>
                    <th>Komentar</th>
                    <th>Foto</th>
                    <th>Visibilitas</th>
                    
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php while($review = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $review['review_id']; ?></td>
                    <td><?php echo $review['name']; ?></td>
                    <td><?php echo $review['rating']; ?></td>
                    <td><?php echo $review['comment']; ?></td>
                    <td><img src="<?php echo "../" . $review['photo']; ?>" alt="review photo" style="width: 100px; height: auto;"></td>
                    <td><?php echo $review['is_visible'] ? "Terlihat" : "Tidak Terlihat"; ?></td>
                    <td>
                        <a href='admin_dashboard.php?page=manage_review&delete=<?php echo $review['review_id']; ?>' class='btn btn-danger btn-sm'>Hapus</a>
                        <a href='admin_dashboard.php?page=manage_review&toggle_visibility=<?php echo $review['review_id']; ?>' class='btn btn-primary btn-sm'>Tampilkan/Sembunyikan</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
<?php
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
    header("Location: admin_dashboard.php?page=manage_review");
    exit;
} elseif (isset($_GET['toggle_visibility'])) {
    $review_id = $_GET['toggle_visibility'];
    $sql = "UPDATE Review SET is_visible = NOT is_visible WHERE review_id = $review_id";
    $conn->query($sql);
    header("Location: admin_dashboard.php?page=manage_review");
    exit;
}
?>
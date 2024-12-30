<?php
include 'session.php';
requireLogin();
requireAdmin();
?>

<?php include './assets/layout/head.php';?>
<title>Admin Dashboard</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar"> <!-- Removed bg-light class -->
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="admin_dashboard.php?page=dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_dashboard.php?page=confirm_reservation">Konfirmasi Reservasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_dashboard.php?page=manage_voucher">Kelola Voucher</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_dashboard.php?page=manage_review">Kelola Review</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    switch ($page) {
                        case 'confirm_reservation':
                            include 'confirm_reservation.php';
                            break;
                        case 'manage_voucher':
                            include 'manage_voucher.php';
                            break;
                        case 'manage_review':
                            include 'manage_review.php';
                            break;
                        case 'dashboard':
                        default:
                            echo "<h1>Selamat datang di Admin Dashboard</h1>";
                            break;
                    }
                } else {
                    echo "<h1>Selamat datang di Admin Dashboard</h1>";
                }
                ?>
            </main>
        </div>
    </div>
</body>
</html>
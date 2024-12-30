<?php
include '../session.php';
requireLogin();
requireAdmin();
?>

<?php include '../assets/layout/head.php';?>
<link rel="stylesheet" href="../assets/style.css">
<title>Admin Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="row">
                <nav class="col-md-2 sidebar" style="position: fixed; height: 100vh; z-index: 111111; padding-top: 15px; ">
                    <div class="sidebar-sticky">
                        <h1 style="padding-left: 10px; color: white;">Admin Dashboard</h1>
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
                                <a class="nav-link" href="../logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="offset-md-2" style="margin-left: 50px; margin-top: 5vh;">
                <?php
                $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
                include $page . '.php';
                ?>
                </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var links = document.querySelectorAll('.nav-link');
            links.forEach(function(link) {
                if (link.href === window.location.href) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>
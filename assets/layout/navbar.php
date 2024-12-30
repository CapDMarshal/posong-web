</head>
<body>
<nav class="navbar">
    <a class="navbar-brand" href="#">
    <img src="./assets/img/posong-logo.png" alt="posong-logo" width="75" height="75">
    </a>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./location.php">Our Location</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./reservation.php">Booking</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./documentation.php">Documentation</a>
        </li>
</nav>

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
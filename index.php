<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wisata Posong Homepage</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quattrocento:wght@400;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./assets/style.css">
    </head>
    <body>
    <nav class="navbar">
        <a class="navbar-brand" href="#">
        <img src="./assets/img/posong-logo.png" alt="posong-logo" width="75" height="75">
        </a>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Our Location</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Facility</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Booking</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Documentation</a>
            </li>
    </nav>
    <div class="content-component">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="./assets/img/carousel1.png" class="d-block w-100" alt="image-posong">
                </div>
                <div class="carousel-item">
                <img src="./assets/img/carousel1.png" class="d-block w-100" alt="image-posong">
                </div>
                <div class="carousel-item">
                <img src="./assets/img/carousel1.png" class="d-block w-100" alt="image-posong">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="welcome-container marpad">
            <h1>Welcome To Posong</h1>
            <p class="cont-text">Posong is a beautiful place located in the middle of the forest. It is a perfect place for you to relax and enjoy the beauty of nature. You can also do some activities such as hiking, camping, and many more. So, what are you waiting for? Come and visit Posong now!</p>
        </div>
        <div class="facility-container marpad">
            <h1>Take a look into our facilities</h1>
            <div class="card-cont">
                <div class="card">
                    <img src="./assets/img/home.png" alt="Image" class="card-image">
                    <div class="card-content">
                        <h2>Akomodasi berupa wood cabin, dan tenda</h2>
                    </div>
                </div>
                <div class="card">
                    <img src="./assets/img/fast-food.png" alt="Image" class="card-image">
                    <div class="card-content">
                        <h2>Foodcourt dengan 45+ pilihan menu</h2>
                    </div>
                </div>
                <div class="card">
                    <img src="./assets/img/camera.png" alt="Image" class="card-image">
                    <div class="card-content">
                        <h2>Tempat foto keluarga dengan pemandangan alam</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="review-container marpad">
            <h1>What people say about Posong</h1>
            <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="./assets/img/review1.png" class="d-block w-100" alt="review">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Widiasmara</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="./assets/img/review1.png" class="d-block w-100" alt="review">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Yanto Kopling</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="./assets/img/review1.png" class="d-block w-100" alt="review">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Reyhan Kanabawi</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </div>
        <footer>
            <br>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Our Location</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Facility</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Booking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Documentation</a>
                </li>
            </ul>
            <div class="icon-social">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-tiktok"></i></a>
            </div>
            <br>
            <p class="footext">Tlahab, RT 12/ RW 02 Kledung, Temanggung, Jawa Tengah 56264</p>
            <p class="footext">Phone : 0823-2277-9949 | Email : zuniyanto58@gmail.com</p>
            <p class="footext">© 2021 Posong. All rights reserved.</p>
        </footer>
    </div>
        <script src="https://kit.fontawesome.com/23bf0493e9.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
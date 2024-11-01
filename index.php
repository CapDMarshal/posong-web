<?php include './assets/layout/head.php';?>
<title>Wisata Posong Homepage</title>
<?php include './assets/layout/navbar.php';?>
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
<?php include './assets/layout/footer.php' ?>
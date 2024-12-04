<?php include './assets/layout/head.php';?>
<title>Wisata Posong Booking</title>
<?php include './assets/layout/navbar.php';?>
<div class="content-component marpad">
    <div class="left-title">
        <h1>Reservasi Acara</h1>
    </div>
    <div class="card" style="width: auto; height: auto; margin: 0;">
        <div class="card-title">
            <h2>Camp Biasa</h2>
        </div>
        <div class="card-bodye" style="display: flex; flex-direction:row;">
            <div class="card-left col">
                <img src="./assets/img/camp1.png" alt="camp1" class="card-img" style="width: auto; height: 250px; object-fit: contain;">
            </div>
            <div class="card-mid col">
                <h2>Fasilitas</h2>
                <div class="mid-content">
                <ul>
                    <li>Area Camping</li>
                    <li>Tiket</li>
                </ul>
                </div>
            </div>
            <div class="card-right col" style="display:flex; flex-direction: column; justify-content: space-between;">
                <div class="mid-content" style="align-self: flex-start;">
                    <h2>Ketentuan</h2>
                    <li>Harga : Rp. 600.000,00 / Paket (10 Orang)</li>
                </div>
                <a style="width: 50%; align-self: flex-end;" href="./reservation.php"><button type="button" style="width: 100%" >Booking</button></a>
            </div>
        </div>
    </div>
</div>
<?php include './assets/layout/footer.php' ?>
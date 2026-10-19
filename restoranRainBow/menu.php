<!DOCTYPE html>
<html>
<head>
    <title>Pawon Rainbow</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

    <!-- JS Files -->
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>  

    <!-- Custom Styles -->
    <style>
        .navbar-nav {
            display: flex;
            justify-content: right; /* Mengatur posisi menu di kanan */
            width: 100%; /* Menggunakan seluruh lebar navbar */
        }

        .navbar-nav > li {
            margin: 0 10px; /* Menambahkan jarak antar menu */
        }

        .navbar-nav .dropdown-menu {
            text-align: left; /* Menyesuaikan dropdown */
        }

        .navbar-nav > li > a {
            color: white !important; /* Warna teks default */
            text-decoration: none;
        }

        .navbar-nav > li > a:focus, 
        .navbar-nav > li.active > a {
            color: rgb(0,103,165) !important; /* Warna teks saat menu aktif */
            background-color: white; /* Latar belakang berubah saat aktif (opsional) */
        }

        .navbar-nav > li > a:hover {
            color: rgb(0, 0, 0) !important; /* Warna teks saat di-hover */
        }
    </style>
</head>
<body>
<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="pw.png" width="100%">
            </div>
        </div>
    </div>
</header>
<nav class="navbar navbar-default">
    
        <ul class="nav navbar-nav" style="background-color: rgb(0,103,165); margin: 0 auto; display: flex; justify-content: right;">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="menu.php">Menu</a></li>
            <li><a href="about.php">Tentang Kami</a></li>
            <li><a href="contact.php">Hubungi Kami</a></li>
        </ul>
  
</nav>
<content id="content">
    <div class="container">
        <h3 align="center"><b>Ingin memesan? Silahkan pesan dengan tekan tombol di bawah ini.</b></h3>
        <p class="lead" align="center">
            <a href="pesan.php">
                <input type="button" value="Pesan" class="btn btn-success btn-lg">
            </a>
        </p>
        <div class="row">
            <div class="col-md-12" style="background-color: rgb(0,103,165)">
                <div class="row">
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <h3 align="center"><b>Makanan</b></h3><hr>
                            <img src="mi.png" class="thumbnail" width="300px" height="200px">	 
                            <h3 align="center"><b>Mie Ayam</b></h3><h3 align="center"><b>Rp.13.000</b></h3>
                            <img src="pktaymkrs.png" class="thumbnail" width="300px" height="200px">	 
                            <h3 align="center"><b>Paket Ayam Kremes</b></h3><h3 align="center"><b>Rp.25.000</b></h3>
                            <img src="sblk.png" class="thumbnail" width="300px" height="200px">	 
                            <h3 align="center"><b>Seblak</b></h3><h3 align="center"><b>Rp.11.000</b></h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <h3 align="center"><b>Minuman</b></h3><hr>
                            <img src="gdf.png" class="thumbnail" width="300px" height="200px">	 
                            <h3 align="center"><b>Good Day Freeze</b></h3><h3 align="center"><b>Rp.8.000</b></h3>
                            <img src="escampur.jpg" class="thumbnail" width="300px" height="200px">	 
                            <h3 align="center"><b>Es Campur Rainbow</b></h3><h3 align="center"><b>Rp.12.000</b></h3>
                            <img src="matca.png" class="thumbnail" width="300px" height="200px">	 
                            <h3 align="center"><b>Matcha</b></h3><h3 align="center"><b>Rp.8.000</b></h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <h3 align="center"><b>Cemilan</b></h3><hr>
                            <img src="Risolmayo.png" class="thumbnail" width="300px" height="200px">	 
                            <h3 align="center"><b>Risol Mayo</b></h3><h3 align="center"><b>Rp.12.000</b></h3>
                            <img src="ota-ota.png" class="thumbnail" width="300px" height="200px">	 
                            <h3 align="center"><b>Otak-Otak</b></h3><h3 align="center"><b>Rp.10.000</b></h3>
                            <img src="pisgor.png" class="thumbnail" width="300px" height="200px">	 
                            <h3 align="center"><b>Pisang Goreng</b></h3><h3 align="center"><b>Rp.10.000</b></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</content>
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p align="center">Kelompok 60 &copy; Pawon Rainbow</p>
            </div>
        </div>
    </div>
</footer>

<!-- Custom Scripts -->
<script>
    $(document).ready(function() {
        $('.navbar-nav > li > a').on('click', function() {
            $('.navbar-nav > li').removeClass('active'); // Hapus active dari semua menu
            $(this).parent().addClass('active'); // Tambahkan active pada menu yang diklik
        });
    });
</script>
</body>
</html>

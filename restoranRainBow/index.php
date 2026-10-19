
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pawon Rainbow</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  	<script type="text/javascript" src="assets/js/jquery.js"></script>
  	<script type="text/javascript" src="assets/js/bootstrap.js"></script>  
</head>
<body>
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
 <!--==============================header=================================-->
<header id="header">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<img src="pw.png" width="100%" >
		</div>
	</div>
</div>
</header>

<nav class="navbar navbar-default">

    <ul class="nav navbar-nav" style="background-color: rgb(0,103,165); margin: 0 auto; display: flex; justify-content: right;">
    <li><a href="login.php">Login Admin</a></li>
    <li class="active"><a href="index.php">Home</a></li>
            <li><a href="menu.php">Menu</a></li>
                    <li><a href="about.php">Tentang Kami</a></li>
                    <li><a href="contact.php">Hubungi Kami</a></li>
                </ul>
            </li>
        </ul>
   
</nav>

<div id="" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
    <script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
      return true;
    }
  </script>
    <div class="modal-footer">
        <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
  </form>
      </div>
    </div>
  </div>
</div>
<!-- end modal daftar -->
<content id="content">
	<div class="container">
		<div id="slideshow" class="carousel slide" data-ride="carousel">
  <!-- Indicators, Ini adalah Tombol BULET BULET dibawah. item ini dapat dihapus jika tidak diperlukan -->
  <ol class="carousel-indicators">
    <li data-target="#slideshow" data-slide-to="0" class="active"></li>
    <li data-target="#slideshow" data-slide-to="1"></li>
    <li data-target="#slideshow" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides, Ini adalah Tempat Gambar-->
  <div class="carousel-inner">
    <div class="item active">
      <img src="sate.png" alt="slideshow"> <!-- Gambar -->
      <div class="carousel-caption"> <!-- Penjelasan -->
        <h3>Sate-Satean</h3>
		<p>dilengkapi dengan berbagai macam sate-satean</p>
      </div>
    </div>
	<div class="item">
      <img src="nasi.png" alt="slideshow"> 
      <div class="carousel-caption"> 
        <h3>Paketan Nasi</h3>
		<p>dengan berbagai macam paket nasi</p>
      </div>
    </div>
	<div class="item">
      <img src="minum.png" alt="slideshow"> 
      <div class="carousel-caption"> 
        <h3>Minuman</h3>
		<p>menjadikan sebagai pelepas dahaga yang menyejukkan </p>
      </div>
    </div>	
   
  </div>

  <!-- Controls, Ini adalah Panah Kanan dan Kiri. -->
  <a class="left carousel-control" href="#slideshow" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#slideshow" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
<hr>
<!-- thumbnail-->
<div class="row">
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<img src="makanan_pembuka.jpg" class="thumbnail" width="315px" height="215px">
		
			<div class="caption"> 
				<h3 align="center"><b>Makanan Pembuka</b></h3>
      		</div>
			hidangan makanan pembuka kami suguhkan untuk memiliki cita rasa yang khas dengan ini dapat membangkitkan selera makanan anda sebelum memakan hidangan utama
		</div>
	</div>

	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<img src="makanan_utama.jpg" class="thumbnail" width="300px" height="200px">

			<div class="caption"> 
				<h3 align="center"><b>Makanan Utama</b></h3>
      		</div>
			makanan hidangan utama cukup bervariasi bukan hanya makanan indonesia yang identik dengan nasi ada juga seblak yang menu dan rasanya sesuai selera anda
		</div>
	</div>

	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<img src="nasi goreng.jpg" class="thumbnail" width="300px" height="200px">

			<div class="caption"> 
				<h3 align="center"><b>Makanan Penutup</b></h3>
      		</div>
			makanan penutup kami sangatlah beragam mulai dari cemilan sampai minuman
		</div>
	</div>
	</div>
</div>
</content>
<!--==============================content=================================-->
<!--==============================footer=================================-->
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p align="center">Kelompok 60 &copy; Pawon Rainbow</p>
			</div>
		</div>
	</div>
</footer>
</body>
</html>
<!--==============================footer=================================-->

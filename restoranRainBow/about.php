<!DOCTYPE html>
<html>
<head>
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
    <li ><a href="index.php">Home</a></li>
            <li><a href="menu.php">Menu</a></li>
                    <li class="active"><a href="about.php">Tentang Kami</a></li>
                    <li><a href="contact.php">Hubungi Kami</a></li>
                </ul>
            </li>
        </ul>
  
</nav>
<content id="content">
	<div class="container">

<div class="row">
  <div class="col-md-12">
    
      
	   <style>
		

        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffffff; /* Latar belakang umum */
            margin: 0;
            padding: 0;
        }

        #content {
            margin: 30px;
        }
        h1 {
			text-align: center;
		}
        h2 {
            font-family: 'Georgia', serif;
            color: #2f4f4f;
        }

        h2 {
            font-size: 28px;
            text-align: center;
            margin-bottom: 20px;
        }

        h3 {
            font-size: 15px;
            text-align: center;
            margin-bottom: 6px;
			
        }

        p {
            line-height: 1.6;
            font-size: 16px;
            color: #2f4f4f;
        }
		.profil-section, .sejarah-section {
    background-color: #f0f8ff; /* Warna latar */
    padding: 20px;            /* Jarak isi ke tepi */
    border: 2px solid #87cefa; /* Garis tepi */
    border-radius: 8px;       /* Sudut melengkung */
    margin: 20px auto;        /* Otomatis rata tengah */
    max-width: 90%;           /* Maksimal lebar */
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Efek bayangan */
    text-align: justify;      /* Rata kiri-kanan */
		}
        /* Profil Section */
        .profil-section {
            background-color: #f0f8ff;
            padding: 20px;
            border: 2px solid #87cefa;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .profil-section p {
            font-size: 18px;
            color: #2f4f4f;
        }

        .profil-section b {
            color: #4682b4;
        }

        /* Sejarah Section */
        .sejarah-section {
            background-color: #f5f5f5;
            padding: 20px;
            border: 2px solid #dcdcdc;
            border-radius: 8px;
            margin-top: 30px;
        }

        .sejarah-section p {
            font-size: 16px;
            color: #696969;
        }

        .sejarah-section b {
            color: #556b2f;
        }
		.lokasi-section {
    background-color: #f0f8ff;
    padding: 20px;
    border: 2px solid #87cefa;
    border-radius: 8px;
    margin-top: 30px;
    text-align: center;
}

.lokasi-section h1 {
    color: #2f4f4f;
    font-family: 'Georgia', serif;
    margin-bottom: 10px;
}

.lokasi-section iframe {
    border-radius: 8px;
}

            hr {
    border: none; /* Menghilangkan border default */
    height: 3px; /* Ketebalan garis */
    background-color: #87cefa; /* Warna garis */
    width: 90%; /* Lebar garis */
    margin: 20px auto; /* Pusatkan garis secara horizontal */
}

    </style>
</head>

<body>

    <content id="content">
        <div class="container">

            <!-- Tentang Kami -->
            <h2><b><h1><span class="glyphicon glyphicon-user"></span></h1>TENTANG KAMI</b></h2><br>

            <!-- Profil -->
            <div class="profil-section">
                <h1><b>Profil</b></h1>
                <p align="center">
                    <b>Pawon Rainbow adalah restoran yang menyajikan pengalaman bersantap di tengah keindahan alam Kuningan. 
                    Terletak di Jalan SMP Bojong, Linggamekar, Cilimus, restoran ini menawarkan suasana yang menenangkan dengan 
                    pemandangan terasering sawah dan Gunung Ciremai yang megah.</b>
                </p>
                <p align="justify">
                    Restoran ini terkenal dengan menu andalan seperti mie ayam, pink lava, dan ayam kremes. Harga yang terjangkau, 
                    mulai dari Rp10.000, membuat Pawon Rainbow menjadi destinasi favorit bagi pelanggan lokal maupun luar kota. 
                    Fasilitas seperti mushola dan live music setiap akhir pekan menambah kenyamanan pengunjung.
                </p>
            </div>

            <!-- Pembatas -->
            <hr>

            <!-- Sejarah -->
            <div class="sejarah-section">
                <h1><b>Sejarah</b></h1>
                <p align="center">
                    Rumah Makan Pawon Rainbow mulai berdiri pada awal Februari 2023 sebagai usaha kecil berbentuk individu di bidang UMKM. 
                    Pada awal operasinya, rumah makan ini memiliki ukuran yang sederhana dengan menu yang terbatas, serta hanya dikelola 
                    oleh satu karyawan, yaitu Mustika Rofi Sudrajat, yang juga merupakan pemilik usaha.
                </p>
                <p align="justify">
                    Dengan seiring berjalannya waktu, Rumah Makan Pawon Rainbow menunjukkan perkembangan yang pesat. Saat ini, rumah makan 
                    tersebut telah memiliki 21 karyawan, ruang usaha yang lebih luas, serta beragam menu makanan. Bahkan, setiap bulan Rumah 
                    Makan Pawon Rainbow secara rutin menghadirkan menu baru untuk menarik pelanggan.
                </p>
                <p align="justify">
                    Di tengah keindahan alam Kuningan, tepatnya di Jalan SMP Bojong, Linggamekar, Cilimus, terdapat sebuah tempat makan yang 
                    bernama Pawon Rainbow. Warung ini mengusung filosofi pedesaan dengan lokasi yang tersembunyi namun menawarkan suasana 
                    yang menenangkan.
                </p>
	 </div>
  </div>
	</div>

	<!-- Lokasi -->
	<div class="lokasi-section" style="background-color: #f0f8ff; padding: 20px; border: 2px solid #87cefa; border-radius: 8px; margin-top: 30px;">
    <h1><b>Alamat dan Lokasi</b></h1>
    <p align="center">
        <span class="glyphicon glyphicon-map-marker" style="color: #4682b4; font-size: 20px; margin-right: 10px;"></span>
        <b>Alamat:</b> Jalan SMP, Bojong, Linggamekar, Kecamatan Cilimus, Kabupaten Kuningan, Jawa Barat 45556
    </p>
    <p align="center">
        <span class="glyphicon glyphicon-map-marker" style="color: #4682b4; font-size: 20px; margin-right: 10px;"></span>
        <b>Lokasi:</b> Dekat terasering sawah dengan pemandangan Gunung Ciremai. 
        <a href="https://maps.app.goo.gl/ACMzb2bVq39xezWK6" target="_blank" style="color: blue">Klik untuk Lihat di Google Maps</a>
		<iframe 
   src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.131197751522!2d108.48479007354325!3d-6.874880067264446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f19000f147ce1%3A0x820a3d6ea913c3d4!2sPawon%20rainbow!5e0!3m2!1sid!2sid!4v1731833674421!5m2!1sid!2sid" 
   width="600" 
   height="450" 
   style="border:0;" 
   allowfullscreen="" 
   loading="lazy" 
   referrerpolicy="no-referrer-when-downgrade">
</iframe>
	</p>
</div>
<p align="center">
<div class="row">
<div class="col-md-12">
	<div class="col-md-4">
		<div class="thumbnail">
		<img src="pawon1 (8).jpeg" width="200%">
		<p align="justify"><b> 
		</div>
	
		<div class="thumbnail">
		<img src="pawon1 (1).jpeg" width="200%">
     <p align="justify"><b> 
	 </div>
	

	<div class="thumbnail">
		<img src="21.png" width="200%">
     <p align="justify"><b> 
	 </div>
</div>

	<div class="">
	<div class="col-md-4">
		<div class="thumbnail">
		<img src="pawon1 (3).jpeg" width="200%">
     <p align="justify"><b> 
	 </div>
	</div>
	<div class="row">
	<div class="col-md-4">
		<div class="thumbnail">
		<img src="pawon1 (5).jpeg" width="200%">
     <p align="justify"><b> 
	 </div>
	</div>
	<div class="">
	<div class="col-md-4">
		<div class="thumbnail">
		<img src="pawon1 (2).jpeg" width="200%">
     <p align="justify"><b> 
	 </div>
	</div>
	<div class="">
	<div class="col-md-4">
		<div class="thumbnail">
		<img src="77.png" width="200%">
     <p align="justify"><b> 
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
				<h3 align="center">Kelompok 60 &copy; Pawon Rainbow</h3>
			</div>
		</div>
	</div>
</footer>
</body>
</html>

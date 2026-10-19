<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pawon";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses penambahan menu
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];

    // Validasi input
    if (!empty($nama) && !empty($harga) && !empty($kategori)) {
        $sql = "INSERT INTO menu (nama, harga, kategori) VALUES ('$nama', '$harga', '$kategori')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Menu berhasil ditambahkan!'); window.location.href = 'tambah_menu.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
<nav class="navbar navbar-default">
    
    <ul class="nav navbar-nav" style="background-color: rgb(0,103,165); margin: 0 auto; display: flex; justify-content: right;">
    <li class="active"><a href="tambah_menu.php">TAMBAH MENU</a></li>
            <li><a href="laporan_penjualan.php">LAPORAN PENJUALAN</a></li>
                    <li><a href="daftar_pesanan.php">DAFTAR PESANAN</a></li>
                    
                </ul>
            </li>
        </ul>
   
</nav>
    <div class="container">
        <h1 class="text-center">Tambah Menu Baru</h1>
        <form method="POST" action="tambah_menu.php">
            <div class="form-group">
                <label for="nama">Nama Menu</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama menu" >
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukkan harga menu" >
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori" class="form-control" >
                    <option value="">-- Pilih Kategori --</option>
                    <option value="SATE-SATEAN">SATE-SATEAN</option>
                    <option value="PAKETAN NASI">PAKETAN NASI</option>
                    <option value="MENU KUAH">MENU KUAH</option>
                    <option value="CEMAL CEMIL">CEMAL CEMIL</option>
                    <option value="TAMBAHAN">TAMBAHAN</option>
                    <option value="MINUMAN">MINUMAN</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Menu</button>
        </form>
    
</body>
</html>

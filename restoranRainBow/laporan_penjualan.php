<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #e0eafc, #cfdef3);
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #0056b3;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        footer {
            text-align: center;
            margin: 20px 0;
            font-size: 0.9em;
            color: #666;
        }
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
<nav class="navbar navbar-default">
    <ul class="nav navbar-nav" style="background-color: rgb(0,103,165); margin: 0 auto; display: flex; justify-content: right;">
        <li><a href="tambah_menu.php" style="color: white;">TAMBAH MENU</a></li>
        <li class="active"><a href="laporan_penjualan.php" style="color: white;">LAPORAN PENJUALAN</a></li>
        <li><a href="daftar_pesanan.php" style="color: white;">DAFTAR PESANAN</a></li>
    </ul>
</nav>

<div class="container">
    <h1>Laporan Penjualan</h1>
    <?php
    // Konfigurasi database
    $host = "localhost"; 
    $username = "root";  
    $password = "";      
    $dbname = "pawon";   

    // Membuat koneksi ke database
    $conn = new mysqli($host, $username, $password, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("<p style='color: red;'>Koneksi gagal: " . $conn->connect_error . "</p>");
    }

    // Query untuk mengambil data laporan penjualan
    $sql = "SELECT id_penjualan, tanggal, Nama_menu, Jumlah, Harga_satuan, Total_harga, Metode_pembayaran FROM laporan_penjualan";
    $result = $conn->query($sql);

    // Menampilkan laporan penjualan dalam tabel HTML
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>
                <th>ID Penjualan</th>
                <th>Tanggal</th>
                <th>Nama Menu</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
                <th>Metode Pembayaran</th>
              </tr>";

        // Menampilkan data setiap baris
        while ($row = $result->fetch_assoc()) {
            // Format data untuk keamanan dan tampilan
            $id_penjualan = htmlspecialchars($row["id_penjualan"]);
            $tanggal = htmlspecialchars($row["tanggal"]);
            $nama_menu = htmlspecialchars($row["Nama_menu"]);
            $jumlah = htmlspecialchars($row["Jumlah"]);
            $harga_satuan = "Rp " . number_format($row["Harga_satuan"], 0, ',', '.');
            $total_harga = "Rp " . number_format($row["Total_harga"], 0, ',', '.');
            $metode_pembayaran = htmlspecialchars($row["Metode_pembayaran"]);

            // Jika metode pembayaran kosong, tambahkan placeholder
            if (empty($metode_pembayaran)) {
                $metode_pembayaran = "<span style='color: red;'>Tidak Ditentukan</span>";
            }

            echo "<tr>
                    <td>$id_penjualan</td>
                    <td>$tanggal</td>
                    <td>$nama_menu</td>
                    <td>$jumlah</td>
                    <td>$harga_satuan</td>
                    <td>$total_harga</td>
                    <td>$metode_pembayaran</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color: gray;'>Tidak ada data laporan penjualan.</p>";
    }

    // Menutup koneksi
    $conn->close();
    ?>
</div>

<footer>
    &copy; 2025 Pawon. All rights reserved.
</footer>
</body>
</html>

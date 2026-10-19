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

// Fungsi untuk mendapatkan menu berdasarkan kategori
function getMenuByCategory($conn, $kategori) {
  
    $sql = "SELECT * FROM menu WHERE kategori = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $kategori);
    $stmt->execute();
    return $stmt->get_result();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script>
        function updateTotal(id, harga) {
            const porsiInput = document.querySelector(`input[name='porsi[${id}]']`);
            const totalInput = document.getElementById(`total_${id}`);
            const porsi = parseInt(porsiInput.value) || 0;
            const totalHarga = porsi * harga;
            totalInput.value = new Intl.NumberFormat('id-ID').format(totalHarga);
        }
    </script>
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
    <header id="header">
        <div class="container">
            <img src="pw.png" width="100%" alt="Header Image">
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

    <div class="container">
        <form action="proses_pesan.php" method="post">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <caption><h4 class="text-center"><b>Form Pembelian</b></h4></caption>
                    <?php
                    $categories = [
                        "SATE-SATEAN", 
                        "PAKETAN NASI", 
                        "MENU KUAH", 
                        "CEMAL CEMIL", 
                        "TAMBAHAN", 
                        "MINUMAN", 
                    
                    ];

                    $no = 1; // Inisialisasi nomor
                    foreach ($categories as $category) {
                        echo "<thead>
                                <tr>
                                    <td colspan='5' class='text-center' style='background-color: #f2f2f2;'>
                                        <b style='color: red;'>$category</b>
                                    </td>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Makanan/Minuman</th>
                                    <th>Harga</th>
                                    <th>Porsi</th>
                                    <th>Total Harga</th>
                                </tr>
                              </thead>
                              <tbody>";
                        
                        $result = getMenuByCategory($conn, $category);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>$no</td>
                                        <td>{$row['nama']}</td>
                                        <td>
                                            Rp.
                                            <input readonly type='text' class='form-control harga' value='" . number_format($row['harga'], 0, ',', '.') . "'>
                                        </td>
                                        <td><br>
                                            <input type='number' name='porsi[{$row['id']}]' class='form-control' value='0' min='0' oninput='updateTotal({$row['id']}, {$row['harga']})'>
                                        </td>
                                        <td>
                                            Rp.
                                            <input readonly type='text' id='total_{$row['id']}' class='form-control' value='0'>
                                        </td>
                                      </tr>";
                                $no++;
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>Belum ada menu untuk kategori ini.</td></tr>";
                        }
                        echo "</tbody>";
                    }
                    ?>
                </table>
            </div>

            <div class="form-group">
                <label for="no_meja">No Meja:</label>
                <input type="text"  name="no_meja" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama Pelanggan:</label>
                <input type="text" id="nama" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
            
                <label for="metode_pembayaran">Metode Pembayaran:</label>
                <select id="metode_pembayaran" name="metode_pembayaran" class="form-control" required>
                    <option value="Cash">Cash</option>
                    <option value="QRIS">QRIS</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Pesan</button>
        </form>
    </div>

    <footer id="footer">
        <div class="container text-center">
            <p>Kelompok 60 &copy; Pawon Rainbow</p>
        </div>
    </footer>
</body>
</html>

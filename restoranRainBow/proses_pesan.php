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

// Fungsi untuk menyimpan data pesanan
function simpanPesanan($conn, $nama_makanan_minuman, $harga, $jumlah, $total_harga, $no_meja, $nama, $metode_pembayaran) {
    $sql = "INSERT INTO pesanan (Nama_makanan_Minuman, Harga, Porsi, Total_harga, NO_MEJA, NAMA, Metode_pembayaran) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siissss", $nama_makanan_minuman, $harga, $jumlah, $total_harga, $no_meja, $nama, $metode_pembayaran);
    $stmt->execute();
}

// Fungsi untuk menyimpan data laporan penjualan
function simpanLaporanPenjualan($conn, $tanggal, $nama_makanan_minuman, $jumlah, $harga, $total_harga, $metode_pembayaran) {
    $sql = "INSERT INTO laporan_penjualan (tanggal, Nama_menu, Jumlah, Harga_satuan, Total_harga, Metode_pembayaran) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiiis", $tanggal, $nama_makanan_minuman, $jumlah, $harga, $total_harga, $metode_pembayaran);
    $stmt->execute();
}

// Tangani aksi hapus
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['no'])) {
    $no = $_GET['no'];

    $deleteSql = "DELETE FROM pesanan WHERE no = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("i", $no);

    if ($stmt->execute()) {
        echo "<script>alert('Pesanan berhasil dihapus'); window.location.href = 'proses_pesan.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus pesanan'); window.location.href = 'proses_pesan.php';</script>";
    }
    $stmt->close();
}

// Tangani form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['no_meja'], $_POST['nama'], $_POST['metode_pembayaran'], $_POST['porsi'])) {
        $no_meja = $_POST['no_meja'];
        $nama = $_POST['nama'];
        $metode_pembayaran = $_POST['metode_pembayaran'];
        $porsi = $_POST['porsi'];
        $tanggal = date("Y-m-d");

        foreach ($porsi as $menu_id => $jumlah) {
            if ($jumlah > 0) {
                $sql_menu = "SELECT * FROM menu WHERE id = ?";
                $stmt_menu = $conn->prepare($sql_menu);
                $stmt_menu->bind_param("i", $menu_id);
                $stmt_menu->execute();
                $result_menu = $stmt_menu->get_result();

                if ($result_menu->num_rows > 0) {
                    $menu = $result_menu->fetch_assoc();
                    $nama_makanan_minuman = $menu['nama'];
                    $harga = $menu['harga'];
                    $total_harga = $harga * $jumlah;

                    // Simpan ke tabel `pesanan` dan `laporan_penjualan`
                    simpanPesanan($conn, $nama_makanan_minuman, $harga, $jumlah, $total_harga, $no_meja, $nama, $metode_pembayaran);
                    simpanLaporanPenjualan($conn, $tanggal, $nama_makanan_minuman, $jumlah, $harga, $total_harga, $metode_pembayaran);

                    if (empty($metode_pembayaran)) {
                        die("Metode pembayaran tidak boleh kosong!");
                    }
                }
            }
        }

        echo "<script>alert('Pesanan berhasil disimpan!'); window.location.href='proses_pesan.php';</script>";
        exit;
    } else {
        echo "<script>alert('Data pesanan tidak lengkap!'); window.location.href='proses_pesan.php';</script>";
    }
}

// Ambil semua data pesanan dari database
$sql = "SELECT * FROM pesanan ORDER BY NAMA, NO_MEJA";
$result = $conn->query($sql);

// Simpan data dalam array untuk diproses
$all_data = [];
while ($row = $result->fetch_assoc()) {
    $all_data[] = $row;
}

// Kelompokkan data berdasarkan pelanggan
$grouped_data = [];
foreach ($all_data as $data) {
    $key = $data['NAMA'] . '|' . $data['NO_MEJA'];
    if (!isset($grouped_data[$key])) {
        $grouped_data[$key] = [
            'nama' => $data['NAMA'],
            'no_meja' => $data['NO_MEJA'],
            'metode_pembayaran' => $data['Metode_pembayaran'],
            'pesanan' => [],
            'total_harga' => 0,
        ];
    }
    $grouped_data[$key]['pesanan'][] = $data;
    $grouped_data[$key]['total_harga'] += $data['Total_harga'];
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Per Pelanggan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background: #fff;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        table th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        table td a {
            text-decoration: none;
            color: #fff;
            padding: 5px 10px;
            background-color: #d9534f;
            border-radius: 5px;
        }
        table td a:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <h2>Pesanan Per Pelanggan</h2>

    <?php foreach ($grouped_data as $group): ?>
        <table>
            <thead>
                <tr>
                    <th>Nama Makanan/Minuman</th>
                    <th>Harga</th>
                    <th>Porsi</th>
                    <th>Total Harga</th>
                    <th>Metode pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($group['pesanan'] as $pesanan): ?>
                    <tr>
                    
                    <td><?= $pesanan['Nama_makanan_Minuman']; ?></td>
                    <td><?= number_format($pesanan['Harga'], 0, ',', '.'); ?></td>
                    <td><?= $pesanan['Porsi']; ?></td>
                    <td><?= number_format($pesanan['Total_harga'], 0, ',', '.'); ?></td>
                    <td><?= $pesanan['Metode_pembayaran']; ?></td>
                    <td>
                    <form action="edit.php" method="post" style="display:inline-block;">
                    <input type="hidden" name="no" value="<?= $data['no'] ?>">
                    <a style="background-color: #007BFF" href="edit.php?no=<?= $pesanan['no']; ?>">Edit
                </a>
    </form>
    <a href="proses_pesan.php?action=delete&no=<?= $pesanan['no']; ?>" 
       onclick="return confirm('Yakin ingin menghapus pesanan ini?')">Hapus</a>
</td>       
                <?php endforeach; ?>
                <tr style="font-weight: bold; background-color: #e9ecef;">
                <td colspan="3" style="text-align:">Pesanan atas nama: <?= $group['nama']; ?></td>
                <td colspan="1" style="text-align:  " ><?= number_format($group['total_harga'], 0, ',', '.'); ?></td>
                <tr>
                <tr style="font-weight: bold; background-color: #e9ecef;">
                <td colspan="3" style="text-align:">No Meja: <?= $group['no_meja']; ?>
                
            </tbody>
        </table>
    <?php endforeach; ?>
    <style>
        /* Gaya untuk tombol */
        button {
            background-color: #007BFF; /* Warna biru */
            color: white; /* Warna teks putih */
            border: none; /* Hilangkan border */
            padding: 10px 20px; /* Padding untuk tombol */
            font-size: 16px; /* Ukuran teks */
            border-radius: 5px; /* Sudut tombol melengkung */
            cursor: pointer; /* Ubah kursor menjadi pointer */
        }

        /* Gaya tombol saat hover */
        button:hover {
            background-color: #0056b3; /* Warna biru yang lebih gelap */
        }
    </style>
    <a href="pesan.php" >
    <button onclick="goBack()">Kembali</button>
    
</body>
</html>

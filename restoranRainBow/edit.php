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

// Ambil data pesanan berdasarkan NO
$no = isset($_GET['no']) ? (int)$_GET['no'] : 0;
$sql = "SELECT * FROM pesanan WHERE no = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $no);
$stmt->execute();
$result = $stmt->get_result();
$pesanan = $result->fetch_assoc();

// Tangani kasus jika data tidak ditemukan
if (!$pesanan) {
    echo "<script>alert('Data pesanan tidak ditemukan!'); window.location.href = 'proses_pesan.php';</script>";
    exit;
}

// Ambil daftar menu dari database
$menuSql = "SELECT * FROM menu";
$menuResult = $conn->query($menuSql);
$menu = [];
while ($row = $menuResult->fetch_assoc()) {
    $menu[] = $row;
}

// Proses update jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $no_meja = $_POST['no_meja'];
    $nama_makanan_minuman = $_POST['nama_makanan_minuman'];
    $porsi = (int)$_POST['porsi'];
    $harga = (int)$_POST['harga'];
    $total_harga = $harga * $porsi;

    $updateSql = "UPDATE pesanan SET Nama_makanan_Minuman = ?, Porsi = ?, Harga = ?, Total_harga = ?, NO_MEJA = ?, NAMA = ? WHERE no = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("siisisi", $nama_makanan_minuman, $porsi, $harga, $total_harga, $no_meja, $nama, $no);

    if ($updateStmt->execute()) {
        echo "<script>alert('Pesanan berhasil diperbarui'); window.location.href = 'proses_pesan.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui pesanan');</script>";
    }
    $updateStmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"], select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        // Update harga otomatis berdasarkan menu yang dipilih
        function updateHarga() {
            const menuSelect = document.getElementById("menu");
            const hargaInput = document.getElementById("harga");
            const selectedOption = menuSelect.options[menuSelect.selectedIndex];
            hargaInput.value = selectedOption.dataset.harga;
        }
    </script>
</head>
<body>
    <form method="POST">
        <h2>Edit Pesanan</h2>
        <label for="nama">Nama Pelanggan:</label>
        <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($pesanan['NAMA']); ?>" required>

        <label for="no_meja">Nomor Meja:</label>
        <input type="text" id="no_meja" name="no_meja" value="<?= htmlspecialchars($pesanan['NO_MEJA']); ?>" required>

        <label for="menu">Nama Makanan/Minuman:</label>
        <select id="menu" name="nama_makanan_minuman" onchange="updateHarga()" required>
            <?php foreach ($menu as $item): ?>
                <option value="<?= $item['nama']; ?>" 
                        data-harga="<?= $item['harga']; ?>" 
                        <?= $item['nama'] === $pesanan['Nama_makanan_Minuman'] ? 'selected' : ''; ?>>
                    <?= $item['nama']; ?> (Rp <?= number_format($item['harga'], 0, ',', '.'); ?>)
                </option>
            <?php endforeach; ?>
        </select>

        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" value="<?= $pesanan['Harga']; ?>" readonly>

        <label for="porsi">Porsi:</label>
        <input type="number" id="porsi" name="porsi" value="<?= $pesanan['Porsi']; ?>" required>

        <button type="submit">Perbarui Pesanan</button>
    </form>
</body>
</html>

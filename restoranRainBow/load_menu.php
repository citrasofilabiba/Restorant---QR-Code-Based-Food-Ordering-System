<?php
$conn = new mysqli("localhost", "root", "", "pawon");
$sql = "SELECT * FROM menu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $no++ . "</td>
            <td>" . $row['nama'] . "</td>
            <td>Rp. " . number_format($row['harga'], 0, ',', '.') . "</td>
            <td><input type='number' min='0' value='0'></td>
            <td>Rp. 0</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='5'>Belum ada menu tersedia</td></tr>";
}
?>

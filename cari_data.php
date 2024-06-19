<?php
include 'koneksi.php';

$npm = isset($_GET['id']) ? mysqli_real_escape_string($koneksi, $_GET['id']) : '';
$nama = isset($_GET['nama']) ? mysqli_real_escape_string($koneksi, $_GET['nama']) : '';
$prodi = isset($_GET['prodi']) ? mysqli_real_escape_string($koneksi, $_GET['prodi']) : '';
$gender = isset($_GET['gender']) ? mysqli_real_escape_string($koneksi, $_GET['gender']) : '';


$query = "SELECT * FROM mahasiswa WHERE 1=1";

if (!empty($npm)) {
    $query .= " AND id LIKE '%$npm%'";
}
if (!empty($nama)) {
    $query .= " AND nama_mahasiswa LIKE '%$nama%'";
}
if (!empty($prodi)) {
    $query .= " AND prodi LIKE '%$prodi%'";
}
if (!empty($gender)) {
    $query .= " AND gender LIKE '%$gender%'";
}

$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Gender</th>
            </tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nama_mahasiswa']}</td>
                <td>{$row['prodi']}</td>
                <td>{$row['gender']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data yang ditemukan";
}

mysqli_close($koneksi);
?>

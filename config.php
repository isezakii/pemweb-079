<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'sistem_pendataan_mahasiswa';

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function getAllMahasiswa($conn) {
    $sql = "SELECT * FROM mahasiswa ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $mahasiswa = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $mahasiswa[] = $row;
        }
    }
    return $mahasiswa;
}

function getMahasiswaById($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);
    $sql = "SELECT * FROM mahasiswa WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}
?>

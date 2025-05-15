<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include "config/db.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    mysqli_query($conn, "INSERT INTO siswa (nis, nama, kelas, jurusan) VALUES ('$nis', '$nama', '$kelas', '$jurusan')");
    header("Location: index.php");
    exit;
}
?>

<h2>Tambah Data Siswa</h2>
<form method="POST">
  NIS <input type="text" name="nis" required><br>
  <br>
  Nama Lengkap <input type="text" name="nama" required><br>
  <br>
  Kelas <input type="text" name="kelas" required><br>
  <br>
  Jurusan <input type="text" name="jurusan" required><br>
  <br>
  <button><a href="index.php">Kembali</a></button>
  <button type="submit">TAMBAH</button>
</form>
<br>


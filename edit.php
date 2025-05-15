<?php
include "config/db.php";
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM siswa WHERE id=$id");
$siswa = mysqli_fetch_assoc($data);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    mysqli_query($conn, "UPDATE siswa SET nis='$nis', nama='$nama', kelas='$kelas', jurusan='$jurusan' WHERE id=$id");
    header("Location: index.php");
}
?>

<h2>Edit Data</h2>
<form method="POST">
  NIS <input type="text" name="nis" value="<?= $siswa['nis'] ?>"><br>
  <br>
  Nama <input type="text" name="nama" value="<?= $siswa['nama'] ?>"><br>
  <br>
  Kelas <input type="text" name="kelas" value="<?= $siswa['kelas'] ?>"><br>
  <br>
  Jurusan <input type="text" name="jurusan" value="<?= $siswa['jurusan'] ?>"><br>
  <br>
  <button type="submit">UPDATE</button>
</form>

<button><a href="index.php">Kembali ke <b>Daftar siswa</b></a></button>
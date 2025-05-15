<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include "config/db.php";


$data = mysqli_query($conn, "SELECT * FROM siswa");
?>



<h2>Daftar Data Siswa</h2>

<h4><button><a href="tambah.php">Tambah data siswa</a></button></h4>
<br>
<table border="1" cellpadding="10">
<tr>
  <th>NO</th><th>NIS</th><th>NAMA LENGKAP</th><th>KELAS</th><th>JURUSAN</th><th>ACTION</th>
</tr>
<?php $no = 1; while ($siswa = mysqli_fetch_assoc($data)) : ?>
<tr>
  <td><?= $no++ ?></td>
  <td><?= $siswa['nis'] ?></td>
  <td><?= $siswa['nama'] ?></td>
  <td><?= $siswa['kelas'] ?></td>
  <td><?= $siswa['jurusan'] ?></td>
  <td>
    <a href="edit.php?id=<?= $siswa['id'] ?>">Edit</a> /
    <a href="hapus.php?id=<?= $siswa['id'] ?>" onclick="return confirm('Yakin?')">Hapus</a>
  </td>
</tr>
<?php endwhile; ?>
</table>
<br>
<button><a href="login.php">Log out</a></button>

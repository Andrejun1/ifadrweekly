<?php 

require 'fungsi.php';

$qmahasiswa = "SELECT * FROM mahasiswa";
$mahasiswas = tampildata($qmahasiswa);
?>  

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Mahasiswa | INFORMATIKA</title>
  </head>
  <body>
    <link rel="stylesheet" href="assets/style/mahasiswa.css" />
    <h1 align="center">INFORMATIKA</h1>
    <center>
      <img
        src="https://ftik.unimus.ac.id/wp-content/uploads/2024/05/LogoUnimustransparant2.png"
        alt="Gambar About"
        width="500"
      />
    </center>
    <table class="table">
      <tr>
          <td><a href="index.php">Home</a></td>
          <td><a href="contact.php">Contact</a></td>
          <td><a href="about.php">About</a></td>
          <td><a href="mahasiswa.php">Data Mahasiswa</a></td>
      </tr>
    </table>

    <h2 align="center">Data Mahasiswa</h2>

    <a href="tambahdata.php" style="display: block; text-align: center; margin-top: 20px">
      <button>
        Tambah Mahasiswa
      </button>
    </a>

    <table class="table">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Program Studi</th>
        <th>Email</th>
        <th>No. HP</th>
        <th>Foto</th>
        <th>Aksi</th>
      </tr>
      <?php $no = 1; ?>
      <?php foreach ($mahasiswas as $row) { ?>
      <tr>
        <td aligh="center"><?php echo $no++; ?></td>
        <td><?php echo $row['nama']; ?></td>
        <td><?php echo $row['nim']; ?></td>
        <td><?php echo $row['prodi']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['no_hp']; ?></td>
        <td><img src="assets/images/<?php echo $row['foto']; ?>" alt="foto" width="60px"></td>
        <td>
          <a href="editdata.php?id=<?php echo $row['id']; ?>">Edit</a> |
          <a href="hapusdata.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
        </td>
      </tr>
      <?php } ?>
    </table>
  </body>
</html>

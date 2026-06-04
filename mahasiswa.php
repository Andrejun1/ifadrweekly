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
      <tr>
        <td aligh="center">1</td>
        <td>Andre Junika Yusuf</td>
        <td>13182420061</td>
        <td>Informatika</td>
        <td>andrejunika05@gmail.com</td>
        <td>089234523523</td>
        <td><img src="assets/images/andre.png" alt="andre" width="60px"></td>
        <td>
          <a href="editdata.php?id=1">Edit</a> |
          <a href="hapusdata.php?id=1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
        </td>
      </tr>
  </body>
</html>

<?php

require 'fungsi.php';

if (isset($_POST['submit'])) {

        if (tambahdata($_POST) > 0) {
            echo "<script>
                    alert('Data berhasil ditambahkan!');
                    window.location.href = 'mahasiswa.php';
                  </script>";
        } else {
            echo "<script>alert('Gagal menambahkan data: " . mysqli_error($koneksi) . "');
            window.location.href = 'mahasiswa.php'
            </script>";
        }
    } 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Data | Informatika</title>
  </head>
  <body>
    <link rel="stylesheet" href="assets/style/tambahdata.css" />
    <h2 align="center">Tambah Data</h2>
    <form action="" method="post">
      <table class="table">
        <tr>
          <td label="Nama">Nama</label></td>
          <td>:</td>
          <td><input type="text" name="nama" id="nama" class="input" required /></td>
        </tr>
        <tr>
          <td label="nim">NIM</label></td>
          <td>:</td>
          <td><input type="text" name="nim" id="nim" class="input" required /></td>
        </tr>

        <tr>
          <td label="prodi">Program Studi</label></td>
          <td>:</td>
          <td><input type="text" name="prodi" id="prodi" class="input" required /></td>
        </tr>

        <tr>
          <td label="email">Email</label></td>
          <td>:</td>
          <td><input type="text" name="email" id="email" class="input" required /></td>
        </tr>

        <tr>
          <td label="no_hp">No. HP</label></td>
          <td>:</td>
          <td><input type="text" name="no_hp" id="no_hp" class="input" required /></td>
        </tr>

        <tr>
          <td label="Foto">Foto</label></td>
          <td>:</td>
          <td><input type="text" name="foto" id="foto" class="input-file" required /></td>
        </tr>

        <tr>
          <td colspan="3" style="text-align: center">
            <button type="submit" name="submit" class="btn">Tambah Data</button>
          </td>
        </tr>
      </table>
    </form>
    <br />
    <br />
    <a href="mahasiswa.php" class="btn">back</a>
  </body>
</html>

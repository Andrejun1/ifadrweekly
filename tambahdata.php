<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Data | Informatika</title>
  </head>
  <body>
    <link rel="stylesheet" href="assets/style/tambahdata.css" />
    <table class="table">
      <tr>
        <td><a href="index.php">Home</a></td>
        <td><a href="contact.php">Contact</a></td>
        <td><a href="about.php">About</a></td>
        <td><a href="mahasiswa.php">Data Mahasiswa</a></td>
      </tr>
    </table>
    <h2 align="center">Tambah Data</h2>
    <form action="mahasiswa.php" method="post">
      <table class="table">
        <tr>
          <td label="Nama">Nama</label></td>
          <td>:</td>
          <td><input type="text" name="nama" id="nama" class="input" /></td>
        </tr>

        <tr>
          <td label="Foto">Foto</label></td>
          <td>:</td>
          <td><input type="file" name="foto" id="foto" class="input-file" /></td>
        </tr>

        <tr>
          <td label="UTS">UTS</label></td>
          <td>:</td>
          <td><input type="number" name="uts" id="uts" class="input" /></td>
        </tr>

        <tr>
          <td label="UAS">UAS</label></td>
          <td>:</td>
          <td><input type="number" name="uas" id="uas" class="input" /></td>
        </tr>

        <tr>
          <td label="Tugas">Tugas</label></td>
          <td>:</td>
          <td><input type="number" name="tugas" id="tugas" class="input" /></td>
        </tr>

        <tr>
          <td colspan="3" style="text-align: center">
            <button type="submit" class="btn">Tambah Data</button>
          </td>
        </tr>
      </table>
    </form>
    <br />
    <br />
    <a href="mahasiswa.php" class="btn">back</a>
  </body>
</html>

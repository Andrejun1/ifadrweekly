<?php
require 'fungsi.php';

// Cek apakah ada parameter id
if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan!'); window.location.href='mahasiswa.php';</script>";
    exit;
}

$id = $_GET['id'];
$data = getdatabyid($id);

if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location.href='mahasiswa.php';</script>";
    exit;
}

if (isset($_POST['submit'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $nim = htmlspecialchars($_POST['nim']);
    $prodi = htmlspecialchars($_POST['prodi']);
    $email = htmlspecialchars($_POST['email']);
    $no_hp = htmlspecialchars($_POST['no_hp']);
    $foto_lama = $data['foto'];

    $result = updatedata($id, $nama, $nim, $prodi, $email, $no_hp, $foto_lama);

    if ($result === true) {
        echo "<script>
                alert('Data berhasil diupdate!');
                window.location.href = 'mahasiswa.php';
              </script>";
    } else {
        echo "<script>alert('$result');</script>";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Data | Informatika</title>
    <link rel="stylesheet" href="assets/style/tambahdata.css" />
  </head>
  <body>
    <table class="table">
      <tr>
        <td><a href="index.php">Home</a></td>
        <td><a href="contact.php">Contact</a></td>
        <td><a href="about.php">About</a></td>
        <td><a href="mahasiswa.php">Data Mahasiswa</a></td>
      </tr>
    </table>
    
    <h2 align="center">Edit Data Mahasiswa</h2>
    
    <form action="" method="post" enctype="multipart/form-data">
      <table class="table">
        <tr>
          <td><label for="nama">Nama</label></td>
          <td>:</td>
          <td><input type="text" name="nama" id="nama" class="input" value="<?php echo $data['nama']; ?>" required /></td>
        </tr>
        <tr>
          <td><label for="nim">NIM</label></td>
          <td>:</td>
          <td><input type="text" name="nim" id="nim" class="input" value="<?php echo $data['nim']; ?>" required /></td>
        </tr>
        <tr>
          <td><label for="prodi">Program Studi</label></td>
          <td>:</td>
          <td><input type="text" name="prodi" id="prodi" class="input" value="<?php echo $data['prodi']; ?>" required /></td>
        </tr>
        <tr>
          <td><label for="email">Email</label></td>
          <td>:</td>
          <td><input type="email" name="email" id="email" class="input" value="<?php echo $data['email']; ?>" required /></td>
        </tr>
        <tr>
          <td><label for="no_hp">No. HP</label></td>
          <td>:</td>
          <td><input type="text" name="no_hp" id="no_hp" class="input" value="<?php echo $data['no_hp']; ?>" required /></td>
        </tr>
        <tr>
          <td><label for="foto">Foto</label></td>
          <td>:</td>
          <td>
            <?php if (!empty($data['foto'])): ?>
                <img src="assets/images/<?php echo $data['foto']; ?>" alt="Foto Lama" width="50px" style="margin-bottom: 5px;"><br>
            <?php endif; ?>
            <input type="file" name="foto" id="foto" class="input-file" accept="image/*" />
            <small>Kosongkan jika tidak ingin mengubah foto</small>
          </td>
        </tr>
        <tr>
          <td colspan="3" style="text-align: center">
            <button type="submit" name="submit" class="btn">Update Data</button>
          </td>
        </tr>
      </table>
    </form>
    
    <br />
    <div style="text-align: center;">
      <a href="mahasiswa.php" class="btn">Kembali</a>
    </div>
  </body>
</html>
<?php
require 'fungsi.php';

// Cek apakah ada parameter id
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Panggil fungsi hapusdata
    if (hapusdata($id)) {
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location.href = 'mahasiswa.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data atau data tidak ditemukan!');
                window.location.href = 'mahasiswa.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID tidak valid!');
            window.location.href = 'mahasiswa.php';
          </script>";
}
?>
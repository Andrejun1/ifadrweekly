<?php

$koneksi = mysqli_connect("localhost", "root", "root", "ifadrweekly");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
function tampildata($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("Query gagal: " . mysqli_error($koneksi));
    }
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahdata($data) {
    global $koneksi;
    $nama = htmlspecialchars($_POST['nama']);
    $nim = htmlspecialchars($_POST['nim']);
    $prodi = htmlspecialchars($_POST['prodi']);
    $email = htmlspecialchars($_POST['email']);
    $no_hp = htmlspecialchars($_POST['no_hp']);
    $foto = htmlspecialchars($_POST['foto']);
      
        $query = "INSERT INTO mahasiswa (nama, nim, prodi, email, no_hp, foto) 
                  VALUES ('$nama', '$nim', '$prodi', '$email', '$no_hp', '$foto')";
        
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
}

function hapusdata($id) {
    global $koneksi;

    $query_select = "SELECT * FROM mahasiswa WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query_select);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $foto = $row['foto'];
        
        // Hapus data dari database
        $query_delete = "DELETE FROM mahasiswa WHERE id = '$id'";
        
        if (mysqli_query($koneksi, $query_delete)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

?>
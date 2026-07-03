<?php

$koneksi = mysqli_connect("localhost", "root", "root", "ifadrweekly");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class AuthSystem {
    public function checkLogin() {
        if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
            header("Location: login.php");
            exit();
        }
    }
    
    public function isLoggedIn() {
        return isset($_SESSION['login']) && $_SESSION['login'] === true;
    }
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

function tambahdata($data, $files) {
    global $koneksi;
    
    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $prodi = htmlspecialchars($data['prodi']);
    $email = htmlspecialchars($data['email']);
    $no_hp = htmlspecialchars($data['no_hp']);
    
    $foto = uploadFoto($files['foto']);
    
    if (!$foto) {
        return false;
    }
    
    $query = "INSERT INTO mahasiswa (nama, nim, prodi, email, no_hp, foto) 
              VALUES ('$nama', '$nim', '$prodi', '$email', '$no_hp', '$foto')";
    
    mysqli_query($koneksi, $query);
    
    return mysqli_affected_rows($koneksi);
}

function uploadFoto($file) {

    $folderTujuan = "assets/images/";
    $ekstensiDiizinkan = ['jpg', 'jpeg', 'png', 'gif'];
    $ukuranMaksimal = 5000000;
    
    if ($file['error'] === 4) {
        echo "<script>alert('Silakan pilih foto terlebih dahulu!');</script>";
        return false;
    }
    
    // Ambil informasi file
    $namaFile = $file['name'];
    $ukuranFile = $file['size'];
    $error = $file['error'];
    $tmpName = $file['tmp_name'];
    
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));
    
    if (!in_array($ekstensiFile, $ekstensiDiizinkan)) {
        echo "<script>alert('Ekstensi file tidak diizinkan! Gunakan jpg, jpeg, png, atau gif.');</script>";
        return false;
    }
    
    if ($ukuranFile > $ukuranMaksimal) {
        echo "<script>alert('Ukuran file terlalu besar! Maksimal 5MB.');</script>";
        return false;
    }
    
    $namaFileBaru = uniqid() . '.' . $ekstensiFile;
    
    if (!file_exists($folderTujuan)) {
        mkdir($folderTujuan, 0777, true);
    }

    if (move_uploaded_file($tmpName, $folderTujuan . $namaFileBaru)) {
        return $namaFileBaru;
    } else {
        echo "<script>alert('Gagal mengupload foto!');</script>";
        return false;
    }
}
function hapusdata($id) {
    global $koneksi;

    $query_select = "SELECT * FROM mahasiswa WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query_select);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $foto = $row['foto'];
        
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



function getdatabyid($id) {
    global $koneksi;
    $query = "SELECT * FROM mahasiswa WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return false;
}

function updatedata($id, $nama, $nim, $prodi, $email, $no_hp, $foto_lama) {
    global $koneksi;
    
    $foto_baru = $foto_lama; 

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $file_name = $_FILES['foto']['name'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        if (in_array($file_extension, $allowed_extensions)) {
            
            if (!empty($foto_lama) && file_exists('assets/images/' . $foto_lama)) {
                unlink('assets/images/' . $foto_lama);
            }

            $new_file_name = uniqid() . '.' . $file_extension;
            $upload_path = 'assets/images/' . $new_file_name;
            
            if (move_uploaded_file($file_tmp, $upload_path)) {
                $foto_baru = $new_file_name;
            } else {
                return "Gagal mengupload foto baru.";
            }
        } else {
            return "Format foto tidak valid!";
        }
    }

    $query = "UPDATE mahasiswa SET 
                nama = '$nama', 
                nim = '$nim', 
                prodi = '$prodi', 
                email = '$email', 
                no_hp = '$no_hp', 
                foto = '$foto_baru' 
              WHERE id = '$id'";

    if (mysqli_query($koneksi, $query)) {
        return true;
    } else {
        return "Gagal update database: " . mysqli_error($koneksi);
    }
}

function register($data)
{
    global $koneksi;
    
    $username = strtolower(stripcslashes($data['username']));
    $password1 = mysqli_real_escape_string($koneksi,$data['password1']);
    $password2 = mysqli_real_escape_string($koneksi,$data['password2']);
    
     $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result))
    {
        echo "<script>alert('Username sudah terdaftar!');</script>";
        return false;
    }
    
    if($password1 !== $password2)
    {
        echo "<script>alert('Konfirmasi password tidak cocok!');</script>";
        return false;
    }

    $password = password_hash($password1, PASSWORD_DEFAULT);
    
    $query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
    mysqli_query($koneksi, $query);
    
    return mysqli_affected_rows($koneksi);
}

function login($data)
{
    global $koneksi;
    
    $username = strtolower(stripcslashes($data['username']));
    $password = mysqli_real_escape_string($koneksi,$data['password']);
    
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
    
    if(mysqli_num_rows($result) === 1)
    {
        $row = mysqli_fetch_assoc($result);
        
        if(password_verify($password, $row['password']))
        {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            
            return true;
        }
        else
        {
            return "Password salah!";
        }
    }
    else
    {
        return "Username tidak ditemukan!";
    }
}
?>
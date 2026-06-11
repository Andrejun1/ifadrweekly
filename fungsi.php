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
?>
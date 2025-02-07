<?php
include ('../koneksi/koneksi.php');

// Check if 'kode_matakuliah' is set in the GET request
if (isset($_GET["kode_matakuliah"])) {
    $kode_matakuliah = $_GET["kode_matakuliah"]; 
    $delMkl = "DELETE FROM matakuliah WHERE kode_matakuliah='$kode_matakuliah'"; 
    $resultMkl = mysqli_query($koneksi, $delMkl); 

    if ($resultMkl) {
        echo "<script>alert('Data MataKuliah Berhasil Dihapus');</script>";
        echo "<script type='text/javascript'>window.location ='matakuliahView.php';</script>";
    } else {
        echo "<script>alert('Data MataKuliah Gagal Dihapus');</script>"; 
        echo "<script type='text/javascript'>window.location='matakuliahView.php';</script>"; 
    }
} else {
    echo "<script>alert('Kode MataKuliah tidak ditemukan.');</script>";
    echo "<script type='text/javascript'>window.location='matakuliahView.php';</script>";
}
?>
<?php
include ('../koneksi/koneksi.php');

if (isset($_GET["matakuliah"])) {
    $getmatakuliah = $_GET["matakuliah"];
    $editMkl = "SELECT * FROM matakuliah WHERE matakuliah = '$getMatakuliah'";
    $resultMkl = mysqli_query($koneksi, $editMkl); 

    if ($resultMkl && mysqli_num_rows($resultMkl) > 0) {
        $dataMkl = mysqli_fetch_array($resultMkl);
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "MataKuliah tidak ditemukan.";
    exit;
}
?>

<h3>UBAH DATA MATAKULIAH</h3>
<br /> <hr /> <br />
<p>
<?php
if (!isset($_POST['submit'])) {
?>

<form enctype="multipart/form-data" method="post">
    <table width="100%" border="0">
    <tr>
    <td width="27%">kode_matakuliah</td>
    <td width="4%">:</td>
    <td width="69%"><input type="text" name="kode_matakuliah" size="30" value="<?php echo $dataMkl['matakuliah']; ?>" readonly="readonly"></td>
</tr>
<tr>
    <td>NAMA MataKuliah</td>
    <td>:</td>
    <td><input name="nama" type="text" id="nama_matakuiah" size="30" value="<?php echo $dataMkl['nama_matakuiah']; ?>" /></td> 
</tr>

<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
    <input id="submit" name="submit" type="submit" value="UBAH">
    </td>
</tr>
</table>
</form>

<?php
} else {
    $kode_matakuliah = $_POST["kode_matakuliah"];
    $nama_matakuiah = $_POST["nama_matakuiah"];

    // Update Data MataKuliah
    $updateMkl = "UPDATE mahasiswa SET nama='$kode_matakuliah', nama_matakuiah='$nama_matakuiah'";
    $queryMkl = mysqli_query($koneksi, $updateMkl); // Corrected the mysqli_query syntax

    if ($queryMkl) {
        echo "<script>alert('Data Berhasil Diubah!');</script>";
        echo "<script type='text/javascript'>window.location='matakuliahView.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah!');</script>";
        echo "<script type='text/javascript'>window.location='matakuliahView.php';</script>";
    }
}
?>
<a href="index.php">&raquo; KEMBALI </a>	
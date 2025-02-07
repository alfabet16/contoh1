<?php
include ('../koneksi/koneksi.php');

// Check if 'nim' is set in the GET request
if (isset($_GET["nim"])) {
    $getNim = $_GET["nim"];
    $editMhs = "SELECT * FROM mahasiswa WHERE nim = '$getNim'";
    $resultMhs = mysqli_query($koneksi, $editMhs); // Corrected the mysqli_query syntax

    if ($resultMhs && mysqli_num_rows($resultMhs) > 0) {
        $dataMhs = mysqli_fetch_array($resultMhs);
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "NIM tidak ditemukan.";
    exit;
}
?>

<h3>UBAH DATA MAHASISWA</h3>
<br /> <hr /> <br />
<p>
<?php
if (!isset($_POST['submit'])) {
?>

<form enctype="multipart/form-data" method="post">
    <table width="100%" border="0">
    <tr>
    <td width="27%">NIM</td>
    <td width="4%">:</td>
    <td width="69%"><input type="text" name="nim" size="30" value="<?php echo $dataMhs['nim']; ?>" readonly="readonly"></td>
</tr>
<tr>
    <td>NAMA</td>
    <td>:</td>
    <td><input name="nama" type="text" id="nama" size="30" value="<?php echo $dataMhs['nama']; ?>" /></td> 
</tr>
<tr>
    <td>JENIS KELAMIN</td>
    <td>:</td>
    <td>
        <label>
        <input type="radio" name="jenis_kelamin" value="Laki-Laki" <?php echo ($dataMhs['jenis_kelamin'] == 'Laki-Laki') ? 'checked' : ''; ?>> Laki-Laki
        </label>
        <label>
        <input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo ($dataMhs['jenis_kelamin'] == 'Perempuan') ? 'checked' : ''; ?>> Perempuan
        </label>
    </td>
</tr>
<tr>
    <td height="50">JURUSAN</td>
    <td>:</td>
    <td>
        <select name="jurusan">
            <option value="<?php echo $dataMhs['jurusan']; ?>"><?php echo $dataMhs['jurusan']; ?></option>
            <option value="">--PILIH--</option>
            <option value="Sistem Informasi">SISTEM INFORMASI</option>
            <option value="Teknik Informatika">TEKNIK INFORMATIKA</option>
            <option value="Teknik Komputer">TEKNIK KOMPUTER</option>
        </select>
    </td>
</tr>
<tr>
    <td>PASSWORD</td>
    <td>:</td> 
    <td><input name="password" type="text" id="password" size="30" value=""></td>
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
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $jurusan = $_POST["jurusan"];
    $jk = $_POST["jk"];
    $password = md5($_POST["password"]); // Removed 'string:' as it's not needed

    // Update Data Mahasiswa
    $updateMhs = "UPDATE mahasiswa SET nama='$nama', jur='$jurusan', password='$password', jk='$jk' WHERE nim='$nim'";
    $queryMhs = mysqli_query($koneksi, $updateMhs); // Corrected the mysqli_query syntax

    if ($queryMhs) {
        echo "<script>alert('Data Berhasil Diubah!');</script>";
        echo "<script type='text/javascript'>window.location='mahasiswaView.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah!');</script>";
        echo "<script type='text/javascript'>window.location='mahasiswaView.php';</script>";
    }
}
?>
<a href="index.php">&raquo; KEMBALI </a>	
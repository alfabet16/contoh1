<?php
include ('../koneksi/koneksi.php');


if (isset($_GET["nilai"])) {
    $getNilai 		= $_GET["nilai"];
    $editNilai 		= "SELECT * FROM nilai WHERE nim = '$getNilai'";
    $resultNilai	= mysqli_query($koneksi, $editNilai); 

    if ($resultNilai && mysqli_num_rows($resultNilai) > 0) {
        $dataNilai = mysqli_fetch_array($resultNilai);
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "NIM tidak ditemukan.";
    exit;
}
?>

<h3>UBAH DATA NILAI MAHASISWA</h3>
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
    <td width="69%"><input type="text" name="nilai" size="30" value="<?php echo $nilai['nim']; ?>" readonly="readonly"></td>
</tr>
<tr>
    <td>NAMA MAHASISWA</td>
    <td>:</td>
    <td><input name="nama" type="text" id="nama mahasiswa" size="30" value="<?php echo $nilai['nama mahasiswa']; ?>" /></td> 
</tr>
 <tr>
        <td>NAMA DOSEN</td>
        <td>:</td>
        <td><input name="dsn" type="text" id="dsn" size="30" value="<?php echo $dataDsn['dsn']; ?>" /></td> 
    </tr>
    <tr>
        <td>NILAI TUGAS</td>
        <td>:</td> 
		 <td><input name="tugas" type="text" id="tugas" size="30" value="<?php echo $nilai['tugas']; ?>" /></td> 
    </tr>
	
	<tr>
        <td>NILAI UTS</td>
        <td>:</td> 
		 <td><input name="uts" type="text" id="uts" size="30" value="<?php echo $nilai['uts']; ?>" /></td> 
    </tr>
	
	<tr>
        <td>NILAI UAS</td>
        <td>:</td> 
		 <td><input name="uas" type="text" id="uas" size="30" value="<?php echo $nilai['uas']; ?>" /></td> 
    </tr>
	
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>
            <input id="submit" name="submit" type="submit" value="UBAH">
        </td>
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
    $nama_mahasiswa = $_POST["nama_mahasiswa"];
    $nama_dosen = $_POST["nama_dosen"];
    $nilai_tugas = $_POST["nilai_tugas"];
    $nilai_uts = $_POST["nilai_uts"];
    $nilai_uas = $_POST["nilai_uas"];
	

    $updateNilai = "UPDATE mahasiswa SET nama_mahasiswa='$nama_mahasiswa', nama_dosen='$nama_dosen', nilai_tugas='$nilai_tugas', nilai_uts='$nilai_uts' nilai_uas='$nilai_uas'";
    $queryNilai = mysqli_query($koneksi, $updateNilai); 

    if ($queryNilai) {
        echo "<script>alert('Data Berhasil Diubah!');</script>";
        echo "<script type='text/javascript'>window.location='nilaiView.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah!');</script>";
        echo "<script type='text/javascript'>window.location='nilaiView.php';</script>";
    }
}
?>
<a href="index.php">&raquo; KEMBALI </a>	
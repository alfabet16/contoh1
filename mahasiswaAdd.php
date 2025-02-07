<?php
include ('../koneksi/koneksi.php');
?>

<h3 style="text-align: center; font-family: 'Droid Sans', sans-serif;">TAMBAH DATA MAHASISWA</h3>
<hr style="border: 1px solid #ccc;" /><br />

<div style="margin: 20px auto; max-width: 600px; font-family: 'Droid Sans', sans-serif;">
<?php
if (!isset($_POST['submit'])) { 
?>
    <form enctype="multipart/form-data" method="post" style="background: #f9f9f9; padding: 20px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <table width="100%" border="0" style="border-collapse: collapse;">
            <tr>
                <td width="30%" style="padding: 10px;">NIM</td>
                <td width="5%">:</td>
                <td width="65%"><input type="text" name="nim" size="30" placeholder="NIM" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></td>
            </tr>

            <tr>
                <td style="padding: 10px;">NAMA</td>
                <td>:</td>
                <td><input name="nama" type="text" id="nama" size="30" placeholder="NAMA" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></td>
            </tr>

            <tr>
                <td style="padding: 10px;">JENIS KELAMIN</td>
                <td>:</td>
                <td>
                    <label>
                        <input type="radio" name="jk" value="Laki-Laki" id="RadioGroup1_0"> Laki - Laki
                    </label>
                    <label style="margin-left: 15px;">
                        <input type="radio" name="jk" value="Perempuan" id="RadioGroup1_1"> Perempuan
                    </label>
                </td>
            </tr>

            <tr>
                <td style="padding: 10px;">JURUSAN</td>
                <td>:</td>
                <td>
                    <select name="jurusan" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        <option value="">-=PILIH=-</option>
                        <option value="Sistem Informasi">SISTEM INFORMASI</option>
                        <option value="Teknik Informatika">TEKNIK INFORMATIKA</option>
                        <option value="Teknik Komputer">TEKNIK KOMPUTER</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td style="padding: 10px;">PASSWORD</td>
                <td>:</td>
                <td><input name="password" type="password" id="password" size="30" placeholder="PASSWORD" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></td>
            </tr>

            <tr>
                <td colspan="3" style="padding: 20px 10px; text-align: center;">
                    <button id="submit" name="submit" type="submit" style="background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">TAMBAH</button>
                </td>
            </tr>
        </table>
    </form>
<?php
} else {
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $jk = $_POST["jk"];
    $jurusan = $_POST["jurusan"];
    $password = md5($_POST["password"]);

    $insertMhs = "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$jk', '$jurusan', '$password')";
    $queryMhs = mysqli_query($koneksi, $insertMhs);

    if ($queryMhs) {
        echo "<script>alert('Data Berhasil Disimpan!')</script>";
        echo "<script type='text/javascript'>window.location ='mahasiswaView.php'</script>";
    } else {
        echo "<script>alert('Data Gagal Disimpan!')</script>";
        echo "<script type='text/javascript'>window.location ='mahasiswaView.php'</script>";
    }
}
?>

<div style="text-align: center; margin-top: 20px;">
    <a href="index.php" style="color: #007bff; text-decoration: none;">&raquo; KEMBALI</a>
</div>
</div>

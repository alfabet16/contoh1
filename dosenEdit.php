<?php
include ('../koneksi/koneksi.php');

// Check if 'nip' is set in the GET request
if (isset($_GET["nip"])) {
    $getNip = $_GET["nip"];
    $editDsn = "SELECT * FROM dosen WHERE nip = '$getNip'";
    $resultDsn = mysqli_query($koneksi, $editDsn);

    if ($resultDsn && mysqli_num_rows($resultDsn) > 0) {
        $dataDsn = mysqli_fetch_array($resultDsn);
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "NIP tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Dosen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h3 {
            text-align: center;
            color: #555;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-spacing: 10px;
        }
        input, select {
            width: 90%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        label {
            font-weight: bold;
        }
        .form-footer {
            text-align: center;
            margin-top: 20px;
        }
        .form-footer a {
            color: #555;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Ubah Data Dosen</h3>
        <?php if (!isset($_POST['submit'])) { ?>
        <form enctype="multipart/form-data" method="post">
            <table>
                <tr>
                    <td><label for="nip">NIP</label></td>
                    <td><input type="text" name="nip" id="nip" value="<?php echo $dataDsn['nip']; ?>" readonly></td>
                </tr>
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td><input type="text" name="nama" id="nama" value="<?php echo $dataDsn['nama']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="kode_matakuliah">Kode Mata Kuliah</label></td>
                    <td><input type="text" name="kode_matakuliah" id="kode_matakuliah" value="<?php echo $dataDsn['kode_matakuliah']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="text" name="password" id="password"></td>
                </tr>
            </table>
            <div class="form-footer">
                <input type="submit" name="submit" value="Ubah">
                <br><br>
                <a href="index.php">&raquo; Kembali</a>
            </div>
        </form>
        <?php } else {
            $nip = $_POST["nip"];
            $nama = $_POST["nama"];
            $kode_matakuliah = $_POST["kode_matakuliah"];
            $password = md5($_POST["password"]);

            $updateDsn = "UPDATE dosen SET nama='$nama', kode_matakuliah='$kode_matakuliah', password='$password' WHERE nip='$nip'";
            $queryDsn = mysqli_query($koneksi, $updateDsn);

            if ($queryDsn) {
                echo "<script>alert('Data Berhasil Diubah!');</script>";
                echo "<script type='text/javascript'>window.location='dosenView.php';</script>";
            } else {
                echo "<script>alert('Data Gagal Diubah!');</script>";
                echo "<script type='text/javascript'>window.location='dosenView.php';</script>";
            }
        } ?>
    </div>
</body>
</html>

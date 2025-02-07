<?php
include('../koneksi/koneksi.php'); // Pastikan file koneksi tersedia
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Dosen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
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
            color: #333;
        }
        form {
            width: 100%;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        table td {
            padding: 10px;
            vertical-align: top;
        }
        input[type="text"], input[type="password"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Tambah Data Dosen</h3>
        <hr>
        <?php
        if (!isset($_POST['submit'])) {
        ?>
        <form enctype="multipart/form-data" method="post">
            <table>
                <tr>
                    <td>NIP</td>
                    <td><input type="text" name="nip" placeholder="Masukkan NIP"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" placeholder="Masukkan Nama"></td>
                </tr>
                <tr>
                    <td>Kode Matakuliah</td>
                    <td><input type="text" name="kode_matakuliah" placeholder="Masukkan Kode Matakuliah"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Masukkan Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input id="submit" name="submit" type="submit" value="TAMBAH">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        } else {
            $nip = $_POST["nip"];
            $nama = $_POST["nama"];
            $kode_matakuliah = $_POST["kode_matakuliah"];
            $password = md5($_POST["password"]); // Mengenkripsi password

            // Query untuk menambahkan data dosen
            $insertDsn = "INSERT INTO dosen (nip, nama, kode_matakuliah, password) VALUES ('$nip', '$nama', '$kode_matakuliah', '$password')";
            $queryDsn = mysqli_query($koneksi, $insertDsn);

            if ($queryDsn) {
                echo "<script>alert('Data Berhasil Disimpan!')</script>";
                echo "<script type='text/javascript'>window.location ='dosenView.php'</script>";
            } else {
                echo "<script>alert('Data Gagal Disimpan!')</script>";
                echo "<script type='text/javascript'>window.location ='dosenView.php'</script>";
            }
        }
        ?>
        <a href="index.php" class="back-link">&raquo; Kembali</a>
    </div>
</body>
</html>

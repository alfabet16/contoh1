<?php
include ('../koneksi/koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mata Kuliah</title>
    <style>
        body {
            body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        h3 {
            text-align: center;
            color: #555;
        }
        form {
            max-width: 500px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 10px;
            vertical-align: middle;
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007BFF;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h3>TAMBAH DATA MATA KULIAH</h3>
    <hr />

    <?php
    if (!isset($_POST['submit'])) { 
    ?>
        <form enctype="multipart/form-data" method="post">
            <table>
                <tr>
                    <td><label for="kode_mtkuliah">KODE MATAKULIAH</label></td>
                    <td><input type="text" name="kode_mtkuliah" id="kode_mtkuliah" placeholder="KODE MATAKULIAH" required></td>
                </tr>
                <tr>
                    <td><label for="nama_matakuliah">NAMA MATAKULIAH</label></td>
                    <td><input type="text" name="nama_matakuliah" id="nama_matakuliah" placeholder="NAMA MATAKULIAH" required></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input id="submit" name="submit" type="submit" value="TAMBAH">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    } else {
        $kode_mtkuliah = $_POST["kode_mtkuliah"];
        $nama_matakuliah = $_POST["nama_matakuliah"];
        
        // Penginputan data mata kuliah
        $insertMkl = "INSERT INTO matakuliah VALUES ('$kode_mtkuliah', '$nama_matakuliah')";
        $queryMkl = mysqli_query($koneksi, $insertMkl);
        
        if ($queryMkl) {
            echo "<script>alert('Data berhasil disimpan!');</script>";
            echo "<script type='text/javascript'>window.location ='matakuliahView.php';</script>";
        } else {
            echo "<script>alert('Data gagal disimpan!');</script>";
            echo "<script type='text/javascript'>window.location ='matakuliahView.php';</script>";
        }
    }
    ?>

    <a href="index.php" class="back-link">&laquo; KEMBALI</a>
</body>
</html>

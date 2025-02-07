<?php
include('../koneksi/koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Nilai Mahasiswa</title>
    <style>
        body {
            body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        h3 {
            color: #007bff;
            text-align: center;
        }
        .container {
            width: 50%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 10px;
            vertical-align: middle;
        }
        select, input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
        .back-link:hover {
            text-decoration: underline;
            color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h3>Tambah Data Nilai Mahasiswa</h3>
    <hr><br>
    <?php
    if (!isset($_POST['submit'])) {
    ?>
    <form enctype="multipart/form-data" method="post">
        <table>
            <tr>
                <td>Nama Mahasiswa</td>
                <td>
                    <select name="mhs" class="form-control">
                        <option value="">=-Pilih-=</option>
                        <?php
                        $queryMhs = "SELECT nim, nama FROM mahasiswa";
                        $resultMhs = mysqli_query($koneksi, $queryMhs);
                        while ($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_NUM)) {
                            echo "<option value='$dataMhs[0]'>$dataMhs[1]</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nama Dosen</td>
                <td>
                    <select name="dsn" class="form-control">
                        <option value="">=-Pilih-=</option>
                        <?php
                        $queryDsn = "SELECT nip, nama FROM dosen";
                        $resultDsn = mysqli_query($koneksi, $queryDsn);
                        while ($dataDsn = mysqli_fetch_array($resultDsn, MYSQLI_NUM)) {
                            echo "<option value='$dataDsn[0]'>$dataDsn[1]</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tugas</td>
                <td><input type="text" name="tugas" placeholder="Nilai Tugas"></td>
            </tr>
            <tr>
                <td>UTS</td>
                <td><input type="text" name="uts" placeholder="Nilai UTS"></td>
            </tr>
            <tr>
                <td>UAS</td>
                <td><input type="text" name="uas" placeholder="Nilai UAS"></td>
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
        $mhs = $_POST["mhs"];
        $dosen = $_POST["dsn"];
        $tugas = $_POST["tugas"];
        $uts = $_POST["uts"];
        $uas = $_POST["uas"];
        
        $insertNilai = "INSERT INTO nilai (nl_tugas, nl_uts, nl_uas, nim, nip) 
                        VALUES ('$tugas', '$uts', '$uas', '$mhs', '$dosen')";
        $queryNilai = mysqli_query($koneksi, $insertNilai);
        
        if ($queryNilai) {
            echo "<script>alert('Data Berhasil Disimpan!');</script>";
            echo "<script>window.location='nilaiView.php';</script>";
        } else {
            echo "<script>alert('Data Gagal Disimpan!');</script>";
            echo "<script>window.location='nilaiView.php';</script>";
        }
    }
    ?>
    <a href="index.php" class="back-link">&raquo; Kembali</a>
</div>

</body>
</html>

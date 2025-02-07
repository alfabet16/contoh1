<?php
include "../koneksi/koneksi.php";

$queryMkl = "SELECT * FROM matakuliah";
$resultMkl = mysqli_query($koneksi, $queryMkl);
$countMkl = mysqli_num_rows($resultMkl);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah</title>
    <style>
        body {
          font-family: 'Droid Sans', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #f5f7fa, #c3cfe2);
            color: #333;
            transition: background 0.5s ease, color 0.5s ease;
        }
        h3 {
            text-align: center;
            color: #555;
        }
        .buttonadm {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
        }
        .buttonadm:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: #555;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        .action-links a {
            margin: 0 5px;
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }
        .action-links a:hover {
            text-decoration: underline;
        }
        .empty-message {
            text-align: center;
            font-style: italic;
            color: #777;
            padding: 20px;
        }
    </style>
</head>
<body>
    <h3>DATA MATA KULIAH</h3>
    <hr />
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="./?adm=matakuliahAdd" class="buttonadm">TAMBAH DATA MATAKULIAH</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>KODE MATAKULIAH</th>
                <th>NAMA MATAKULIAH</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($countMkl > 0) {
                while ($dataMkl = mysqli_fetch_array($resultMkl, MYSQLI_NUM)) {
                    ?>
                    <tr>
                        <td><?php echo $dataMkl[0]; ?></td>
                        <td><?php echo $dataMkl[1]; ?></td>
                        <td class="action-links">
                            <a href="./?adm=matakuliahEdit?kode_mtkul=<?php echo $dataMkl[1]; ?>">Edit</a>
                            <a href="matakuliahDelete.php?kode_mtkul=<?php echo $dataMkl[0]; ?>">Hapus</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='3' class='empty-message'>Belum ada Data Mata Kuliah</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

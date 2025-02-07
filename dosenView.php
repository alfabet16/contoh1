<?php
include('../koneksi/koneksi.php'); // Pastikan file koneksi ada dan benar

$query = "SELECT * FROM dosen"; // Ganti 'dosen' dengan nama tabel yang sesuai
$resultDsn = mysqli_query($koneksi, $query);

if (!$resultDsn) {
    die("Query Error: " . mysqli_error($koneksi));
}

$countDsn = mysqli_num_rows($resultDsn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen</title>
    <style>
        body {
            font-family: 'Droid Sans', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #f5f7fa, #c3cfe2);
            color: #333;
            transition: background 0.5s ease, color 0.5s ease;
        }
        .container {
            width: 80%;
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
        .buttonadm {
            display: inline-block;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .buttonadm:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #4CAF50;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        .actions a {
            margin-right: 10px;
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }
        .actions a:hover {
            text-decoration: underline;
        }
        .empty-message {
            text-align: center;
            font-size: 16px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Data Dosen</h3>
        <a href="./?adm=dosenAdd" class="buttonadm">TAMBAH DATA DOSEN</a>
        <table>
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Kode Matakuliah</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Jika ada data dosen, tampilkan
                if ($countDsn > 0) {
                    while ($dataDsn = mysqli_fetch_array($resultDsn, MYSQLI_ASSOC)) {
                        ?>
                        <tr>
                            <td><?php echo isset($dataDsn['nip']) ? $dataDsn['nip'] : ''; ?></td>
                            <td><?php echo isset($dataDsn['nama']) ? $dataDsn['nama'] : ''; ?></td>
                            <td><?php echo isset($dataDsn['kode_matakuliah']) ? $dataDsn['kode_matakuliah'] : ''; ?></td>
                            <td><?php echo isset($dataDsn['password']) ? $dataDsn['password'] : ''; ?></td>
                            <td class="actions">
                                <a href="./?adm=dosenEdit&nip=<?php echo $dataDsn['nip']; ?>">Edit</a>
                                <a href="dosenDelete.php?nip=<?php echo $dataDsn['nip']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='5' class='empty-message'>Belum ada data dosen.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

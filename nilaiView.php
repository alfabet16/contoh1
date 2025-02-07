<?php
include "../koneksi/koneksi.php";

// Query untuk mendapatkan data nilai
$queryNilai = "SELECT m.nim, m.nama, n.nl_tugas, n.nl_uts, n.nl_uas,  
               (0.2 * n.nl_tugas) + (0.4 * n.nl_uts) + (0.4 * n.nl_uas) AS nilai_akhir, 
               d.nip, d.nama AS dosen_nama
               FROM nilai n 
               LEFT JOIN mahasiswa m ON n.nim = m.nim  
               LEFT JOIN dosen d ON d.nip = n.nip";

$resultNilai = mysqli_query($koneksi, $queryNilai); 
$countNilai = mysqli_num_rows($resultNilai);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai</title>
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
            color: #007bff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .buttonadm {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .buttonadm:hover {
            background-color: #218838;
        }
        .action-links a {
            text-decoration: none;
            color: #007bff;
            margin: 0 5px;
        }
        .action-links a:hover {
            text-decoration: underline;
            color: #0056b3;
        }
    </style>
</head>
<body>

<h3>Data Nilai</h3>
<hr><br>
<a href="./?adm=nilaiAdd" class="buttonadm">Tambah Data Nilai</a>
<br><br>

<table>
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Tugas</th>
        <th>UTS</th>
        <th>UAS</th>
        <th>Nilai Akhir</th>
        <th>Dosen</th>
        <th>Aksi</th>
    </tr>
    <?php
    if ($countNilai > 0) {
        while ($dataNilai = mysqli_fetch_array($resultNilai, MYSQLI_ASSOC)) {
    ?>
    <tr>
        <td><?php echo htmlspecialchars($dataNilai['nim']); ?></td>
        <td><?php echo htmlspecialchars($dataNilai['nama']); ?></td>
        <td><?php echo htmlspecialchars($dataNilai['nl_tugas']); ?></td>
        <td><?php echo htmlspecialchars($dataNilai['nl_uts']); ?></td>
        <td><?php echo htmlspecialchars($dataNilai['nl_uas']); ?></td>
        <td><?php echo number_format($dataNilai['nilai_akhir'], 2); ?></td>
        <td><?php echo htmlspecialchars($dataNilai['dosen_nama']); ?></td>
        <td class="action-links">
            <a href="./?adm=nilaiEdit&nim=<?php echo urlencode($dataNilai['nim']); ?>&nip=<?php echo urlencode($dataNilai['nip']); ?>">Edit</a>
            <a href="mahasiswaDelete.php?nim=<?php echo urlencode($dataNilai['nim']); ?>&nip=<?php echo urlencode($dataNilai['nip']); ?>" 
               onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
        </td>    
    </tr>
    <?php
        }
    } else {
        echo "<tr>
                <td colspan='8' align='center'>Belum ada data mahasiswa.</td>
            </tr>";
    }
    ?>
</table>

</body>
</html>

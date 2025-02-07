<?php
include "../koneksi/koneksi.php";

$queryMhs = "SELECT * FROM mahasiswa";
$resultMhs = mysqli_query($koneksi, $queryMhs);
$countMhs = mysqli_num_rows($resultMhs);
?>

<h3 style="text-align: center; font-family: 'Droid Sans', sans-serif;">DATA MAHASISWA</h3>
<hr style="border: 1px solid #ccc;"/><br />
<div style="text-align: center; margin-bottom: 20px;">
    <a href="./?adm=mahasiswaAdd">
        <button style="background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 5px; font-size: 14px; cursor: pointer;">
            TAMBAH DATA MAHASISWA
        </button>
    </a>
</div>

<table style="width: 100%; border-collapse: collapse; font-family: 'Droid Sans', sans-serif;">
    <thead>
        <tr style="background: #ffc107; color: #002366;">
            <th style="padding: 10px; border: 1px solid #ccc;">NIM</th>
            <th style="padding: 10px; border: 1px solid #ccc;">NAMA</th>
            <th style="padding: 10px; border: 1px solid #ccc;">JENIS KELAMIN</th>
            <th style="padding: 10px; border: 1px solid #ccc;">JURUSAN</th>
            <th style="padding: 10px; border: 1px solid #ccc;">PASSWORD</th>
            <th style="padding: 10px; border: 1px solid #ccc;">AKSI</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if ($countMhs > 0) {
        while ($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_NUM)) {
    ?>
        <tr style="background: #f9f9f9; border: 1px solid #ccc;">
            <td style="padding: 10px; border: 1px solid #ccc; text-align: center;"><?php echo $dataMhs[0]; ?></td>
            <td style="padding: 10px; border: 1px solid #ccc; text-align: center;"><?php echo $dataMhs[1]; ?></td>
            <td style="padding: 10px; border: 1px solid #ccc; text-align: center;"><?php echo $dataMhs[2]; ?></td>
            <td style="padding: 10px; border: 1px solid #ccc; text-align: center;"><?php echo $dataMhs[3]; ?></td>
            <td style="padding: 10px; border: 1px solid #ccc; text-align: center;"><?php echo $dataMhs[4]; ?></td>
            <td style="padding: 10px; border: 1px solid #ccc; text-align: center;">
                <a href="./?adm=mahasiswaEdit" style="background: #007bff; color: white; text-decoration: none; padding: 3px 7px; border-radius: 3px; margin-right: 3px;">Edit</a>
                <a href="mahasiswaDelete.php?nim=<?php echo $dataMhs[0]; ?>" style="background: #dc3545; color: white; text-decoration: none; padding: 3px 7px; border-radius: 3px;">Hapus</a>
            </td>
        </tr>
    <?php
        }
    } else {
        echo "<tr>
                <td colspan='6' style='padding: 20px; text-align: center; background: #f9f9f9;'>
                    <i>Belum ada Data Mahasiswa</i>
                </td>
              </tr>";
    }
    ?>
    </tbody>
</table>

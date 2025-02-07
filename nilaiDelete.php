<?php include ('../koneksi/koneksi.php');
$nim=$_GET["nim"]; 
$delNilai ="DELETE FROM dosen WHERE nip='$nim'"; 
$resultNilai =mysqli_query($koneksi, $delNilai); 
if($resultNilai) 
{
    echo"<script>alert('Data Nilai Berhasil Dihapus') </script>";
    echo"<script type='text/javascript'>window.location ='nilaiView.php'</script>";
    }
    else 
    {   echo"<sript>alert('Data Nilai gagal Dihapus') </script>"; 
        echo"<script type='text/javascript'>window.location='nilaiView.php'</script>"; } 
?>
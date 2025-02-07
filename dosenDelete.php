<?php include ('../koneksi/koneksi.php');
$nim=$_GET["nim"]; 
$delDsn ="DELETE FROM dosen WHERE nip='$nip'"; 
$resultDsn =mysqli_query($koneksi, $delDsn); 
if($resultDsn) 
{
    echo"<script>alert('Data Dosen Berhasil Dihapus') </script>";
    echo"<script type='text/javascript'>window.location ='dosenView.php'</script>";
    }
    else 
    {   echo"<sript>alert('Data Dosen gagal Dihapus') </script>"; 
        echo"<script type='text/javascript'>window.location='dosenView.php'</script>"; } 
?>
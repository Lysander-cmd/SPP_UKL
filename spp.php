<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Data SPP</title>
</head>
<body>
    <!-- Panggil script header -->
    <?php require_once("header.php"); ?>
    <!-- Isi Konten -->
    <h3>SPP</h3>
    <p><a class = "btn btn-primary btn-sm" href="tambah_spp.php">Tambah Data</a></p>
    <table class="table table-bordered table-striped" cellspacing="0" border="1" cellpadding="5">
        <tr>
            <td>No. </td>
            <td>Tahun</td>
            <td>Nominal</td>
            <td>Aksi</td>
        </tr>
<?php
// Kita Konfigurasi Pagging disini
$totalDataHalaman = 5;
$data = mysqli_query($db, "SELECT * FROM spp");
$hitung = mysqli_num_rows($data);
$totalHalaman = ceil($hitung / $totalDataHalaman);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;
// Konfigurasi Selesai
// Kita panggil tabel spp
$sql = mysqli_query($db, "SELECT * FROM spp ORDER BY tahun ASC LIMIT $dataAwal, $totalDataHalaman");
$no = 1;
while($r = mysqli_fetch_assoc($sql)){ ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $r['tahun']; ?></td>
            <td><?= "Rp. " . $r['nominal']; ?></td>
            <td><a class ="btn btn-danger btn-sm"  href="?hapus&id=<?= $r['id_spp']; ?>">Hapus</a> | 
                <a class ="btn btn-warning btn-sm" href="editspp.php?id=<?= $r['id_spp']; ?>">Edit</a</td>
        </tr>
<?php $no++; } ?>
    </table>
<!-- Tampilkan tombol halaman -->
<?php for($i=1; $i <= $totalHalaman; $i++): ?>
        <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
<?php endfor; ?>
<!-- Selesai -->
    <hr />
</body>
</html>
<?php
// Tombol Hapus ditekan
if(isset($_GET['hapus'])){
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM spp WHERE id_spp='$id'");
    if($hapus){
        header("location: spp.php");
    }else{
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');
        </script>";
    }
}
?>
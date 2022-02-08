<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php require_once("header.php"); ?>

<div class="container">
	<div class="page-header">
<h2> DATA SISWA SMK TELKOM MALANG</h2>
	</div>
<a class="btn btn-primary " href="tambah_transaksi.php">TAMBAH DATA</a>
 <br/> <br>
 <table class="table table-bordered table-striped">
 	<tr>
 		<th>NO</th>
 		<th>NAMA PETUGAS</th>
 		<th>NAMA SISWA</th>
 		<th>Tgl/Bulan/Tahun dibayar</th>
 		<th>Tahun / Nominal harus dibayar</th>
 		<th>Jumlah yang dibayar</th>
 		<th>STATUS</th>
		<th>AKSI</th>
 	</tr>
     <?php
$totalDataHalaman = 5;
$data = mysqli_query($db, "SELECT * FROM pembayaran");
$hitung = mysqli_num_rows($data);
$totalHalaman = ceil($hitung / $totalDataHalaman);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;
// Kita panggil tabel pembayaran
// Setelah kita panggil, JOIN tabel yang ter relasi ke tabel pembayaran
$sql = mysqli_query($db, "SELECT * FROM pembayaran
JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas 
JOIN siswa ON pembayaran.nisn = siswa.nisn
JOIN spp ON pembayaran.id_spp = spp.id_spp
ORDER BY tgl_bayar ASC LIMIT $dataAwal, $totalDataHalaman");
$no = 1;
while($r = mysqli_fetch_assoc($sql)){ ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $r['nama_petugas']; ?></td>
            <td><?= $r['nama']; ?></td>
            <td><?= $r['tgl_bayar'] . "/" . $r['bulan_dibayar'] . "/" . $r['tahun_dibayar']; ?></td>
            <td><?= $r['tahun'] . " | Rp. " . $r['nominal']; ?></td>
            <td><?= $r['jumlah_bayar']; ?></td>
            <td>
<?php
// Jika jumlah bayar sesuai dengan yang harus dibayar maka Status LUNAS
if($r['jumlah_bayar'] >= $r['nominal']){ ?>
                <font style="color: darkgreen; font-weight: bold;">LUNAS</font>

<?php }else{ ?>                             BELUM LUNAS <?php } ?> </td>
            <td>
<?php
// Jika siswa ingin membayar lunas sisa pembayaran
if($r['jumlah_bayar'] >= $r['nominal']){ echo "-";
}else{ ?>
    <a class = "btn btn-success btn-sm" href="?lunas&id=<?= $r['id_pembayaran']; ?>">BAYAR LUNAS</a>
<?php } ?>  
<a class="btn btn-danger btn-sm" href="?hapus&id=<?= $r['id_pembayaran'] ?>">HAPUS</a>
</td>
        </tr>
<?php $no++; } ?>
 </table>
 <p align="center" style="font-family: arial; color: red; size: 10px;">Menghapus Data Siswa Maka Akan menghapus Data Pembayaran dan data tagihan Siswa pada tabel SPP</p>
 </div>
 <?php

if(isset($_GET['lunas'])){
    $id = $_GET['id'];
    $ambilData = mysqli_query($db, "SELECT * FROM pembayaran JOIN spp ON pembayaran.id_spp=spp.id_spp 
                                    WHERE id_pembayaran = '$id'");
    $row = mysqli_fetch_assoc($ambilData);
    $sisa = $row['nominal'] - $row['jumlah_bayar'];
    $hasil = $row['jumlah_bayar'] + $sisa;
    $update = mysqli_query($db, "UPDATE pembayaran SET jumlah_bayar='$hasil' WHERE id_pembayaran='$id'");
    if($update){?>
        <meta http-equiv="refresh" content="0; url=transaksi.php">
        <?php
    }
}
?>
</body>
</html>
<?php
// Tombol Hapus ditekan
if(isset($_GET['hapus'])){
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM pembayaran WHERE id_pembayaran='$id'");
    if($hapus){?>
       <meta http-equiv="refresh" content="0; url=transaksi.php">
	   <?php
    }else{
        echo "<script>alert('Maaf, terjadi kesalahan ketika menghapus');
        </script>";
    } 
}
?>
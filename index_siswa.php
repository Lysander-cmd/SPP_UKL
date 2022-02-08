<?php
session_start();
require_once("koneksi.php");
// Jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
if(!isset($_SESSION['nisn'])){
    header("location: login_siswa.php");
}else{
    // Jika sudah dibuatkan sesi maka akan kita masukkan kedalam variabel
    $nisn = $_SESSION['nisn'];
}
$siswa = mysqli_query($db, "SELECT * FROM siswa 
JOIN kelas ON siswa.id_kelas=kelas.id_kelas 
WHERE nisn='$nisn'");
$dta = mysqli_fetch_assoc($siswa);
$pembayaran = mysqli_query($db, "SELECT * FROM pembayaran 
JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas 
JOIN spp ON pembayaran.id_spp = spp.id_spp
WHERE nisn='$nisn'
ORDER BY tgl_bayar");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<?php include 'headersiswa.php';?>;
<div class="container">
	<div class="page-header">
<h2 align = "center">SELAMAT DATANG DI WEB SPP</h2>
<br>

	</div>
 
<div class="panel panel-info">
	<div class="panel-heading">
<h3 align = "center">BIODATA SISWA</h3>
</div>
<div class="panel panel-body">
	<table class="table table-bordered table-striped">
		<tr>
			<td>NISN</td>
			<td><?= $dta['nisn'] ?></td>
		</tr>
		<tr>
			<td>NIS</td>
			<td><?= $dta['nis'] ?></td>
		</tr>
		<tr>
			<td>Nama Siswa</td>
			<td><?= $dta['nama'] ?></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td><?= $dta['nama_kelas'] ?></td>
		</tr>
		<tr>
			<td>kompetensi keahlian</td>
			<td><?= $dta['jurusan'] ?></td>
		</tr>
	</table>
</div>
</div>

<div class="panel panel-info">
	<div class="panel-heading">
        <br>
        <br>
        <br>
<h3 align = "center">Riwayat Tagihan SPP Siswa</h3>
</div>
<div class="panel-body ">
	<table class="table table-bordered table-striped">
<tr>
	<th>NO</th>
	<th>Tanggal Bayar</th>
	<th>Pembayaran Melalui</th>
	<th>Tahun SPP | Nominal yang harus dibayar</th>
	<th>jumlah yang sudah dibayar</th>
	<th>Status</th>
	<!-- <th>Aksi</th> -->
	
</tr>
<?php 
$no=1;
while($sq = mysqli_fetch_assoc($pembayaran)){ ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $sq['tgl_bayar'] . " - " . $sq['bulan_dibayar'] . " - "  .
                        $sq['tahun_dibayar']; ?></td>
                <td><?= $sq['nama_petugas']; ?></td>
                <td><?= $sq['tahun'] . " | Rp. " . $sq['nominal']; ?></td>
                <td><?= "Rp. " . $sq['jumlah_bayar']; ?></td>
<?php
if($sq['jumlah_bayar'] == $sq['nominal']){ ?>
                <td><font style="color: darkgreen; font-weight: bold;">LUNAS</font></td>
                
<?php }else{ ?> <td>BELUM LUNAS</td>
                
<?php } ?>
            </tr>
<?php $no++; }?>
        </table>

    
</div>
</div>

<p style="color: red;">Pembayaran dilakukan dengan cara mencari tagihan siswa berdasarkan NIS </p>


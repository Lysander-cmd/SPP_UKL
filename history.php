<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>History Pembayaran</title>
</head>
<body>
    <?php require_once("header.php");?>
    <h3>History Pembayaran Siswa</h3>
    <form action="" method="POST" autocomplete="off">
        Cari siswa <input type="text" name="nisn" placeholder="Cari berdasarkan NISN" autofocus>
        <button type="submit" name="cari">Cari</button>
    </form>
<?php
if(isset($_POST['cari'])){
    $nisn = $_POST['nisn'];
    $biodataSiswa = mysqli_query($db,"SELECT * FROM siswa 
    JOIN kelas ON siswa.id_kelas=kelas.id_kelas 
    WHERE nisn='$nisn'");

    $historyPembayaran = mysqli_query($db,"SELECT * FROM pembayaran 
    JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas 
    JOIN spp ON pembayaran.id_spp=spp.id_spp 
    WHERE nisn='$nisn'
    ORDER BY tgl_bayar");
    $r_siswa=mysqli_fetch_assoc($biodataSiswa);

?>
<hr />
<h3>Biodata Siswa</h3>
<table cellpadding="5">
    <tr>
        <td>NISN</td>
        <td>:</td>
        <td><?=$r_siswa['nisn'];?></td>
    </tr>
    <tr>
        <td>NIS</td>
        <td>:</td>
        <td><?=$r_siswa['nis'];?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?=$r_siswa['nama'];?></td>
        <td></td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td>:</td>
        <td><?=$r_siswa['nama_kelas']." | ".$r_siswa['jurusan'];?></td>
    </tr>
        

</table>
<table cellpadding="5" cellspacing="0" border="1">
            <tr>
                <td>No. </td>
                <td>Tanggal Pembayaran</td>
                <td>Pembayaran Melalui</td>
                <td>Tahun SPP | Nominal yang harus dibayar</td>
                <td>Jumlah yang sudah dibayar</td>
                <td>Status</td>
                <td>Aksi</td>
            </tr>
<?php 
$no=1;
while($r_trx = mysqli_fetch_assoc($historyPembayaran)){ ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $r_trx['tgl_bayar'] . "/" . $r_trx['bulan_dibayar'] . "/" .
                        $r_trx['tahun_dibayar']; ?></td>
                <td><?= $r_trx['nama_petugas']; ?></td>
                <td><?= $r_trx['tahun'] . " | Rp. " . $r_trx['nominal']; ?></td>
                <td><?= "Rp. " . $r_trx['jumlah_bayar']; ?></td>
<?php
if($r_trx['jumlah_bayar'] == $r_trx['nominal']){ ?>
                <td><font style="color: darkgreen; font-weight: bold;">LUNAS</font></td>
                <td>-</td>
<?php }else{ ?> <td>BELUM LUNAS</td>
                <td><a class="btn btn-success btn-sm" href="transaksi.php?lunas&id=<?= $r_trx['id_pembayaran']; ?>">
                BAYAR LUNAS</a></td>
<?php } ?>
            </tr>
<?php $no++; }?>
        </table>
        <?php } ?>
        <hr/>
</body>
</html>
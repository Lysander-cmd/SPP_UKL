<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>CRUD DATA SISWA</title>
    </head>
    <body>
        <?php require_once("header.php");?>
        <h3>Siswa</h3>
        <p><a class = "btn btn-primary btn-sm" href ="tambah_siswa.php">Tambah Data</a></p>
        <table class="table table-bordered table-striped" cellspacing="0" border ="1" cellpadding="h">
            <tr>
                <td>No.</td>
                <td>NISN.</td>
                <td>NIS.</td>
                <td>Nama Siswa.</td>
                <td>Kelas</td>
                <td>Alamat</td>
                <td>No. Telepon</td>
                <td>Aksi</td>
            </tr>
            <?php
            $sql = mysqli_query($db,"SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas");
            $no = 1;
            while($r = mysqli_fetch_assoc($sql)){?>
            <tr>
                <td><?=$no ?></td>
                <td><?=$r['nisn'];?></td>
                <td><?=$r['nis'];?></td>
                <td><?=$r['nama']; ?></td>
                <td><?=$r['nama_kelas']."|".$r['jurusan']; ?></td>
                <td><?=$r['alamat']; ?></td>
                <td><?=$r['no_tlp']; ?></td>
                <td><a class ="btn btn-danger btn-sm" href="?hapus&nisn=<?=$r['nisn'];?>">Hapus </a>|<a class = "btn btn-warning btn-sm" href="editsiswa.php?nisn=<?=$r['nisn'];?>">Edit </a></td>
            </tr>
            <?php $no++;}?>
        </table>
        <hr />
    </body>
</html>
<?php
if(isset($_GET['hapus'])){
    $nisn = $_GET['nisn'];
    $hapus = mysqli_query($db,"DELETE FROM siswa WHERE nisn='$nisn'");
    if($hapus){
        ?>
		<meta http-equiv="refresh" content="0; url=siswa.php">
		<?php
    }else{
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');</script>";
    }
}
 <?php
session_start();
require_once("koneksi.php");

if(!isset($_SESSION['username'])){
    header("location: login.php");
}else{
    // Jika sudah dibuatkan sesi maka akan kita masukkan kedalam variabel
    $username = $_SESSION['username'];
}
?>
<?php include 'header.php';?>  
<style >
	.btn{
		margin-bottom: 10px;
	}
</style>
<div class="container">
	<div class="page-header">
<h3> DATA KELAS WEB SPP</h3>
	</div>
<a class="btn btn-primary " href="tambah_kelas.php">TAMBAH DATA</a>
<?php
	?>
<table class="table table-bordered table-striped" cellspacing="0" border ="1" cellpadding="h">
 	<tr style = "text-align : center">
 		<td>NO</td>
 		<td>NAMA KELAS</td>
 		<td>KOMPETENSI KEAHLIAN</td>
        <td>ANGKATAN</td>
		<td>AKSI</td>
 	</tr>
 	<?php 
 	
	$data = mysqli_query($db,"SELECT * FROM kelas ORDER BY nama_kelas");	
 	$i=1; 
 	while($dta = mysqli_fetch_assoc($data) ):
 	 ?>
 	 <tr>
 	 	<td width="40px" align="center"><?= $i; ?></td>
 	 	<td align="center"><?= $dta['nama_kelas'] ?></td>
 	 	<td><?= $dta['jurusan'] ?></td>
          <td><?= $dta['angkatan'] ?></td>  
 	 	<td width="160px">
 	 		<a class="btn btn-warning btn-sm" href="editkelas.php?id=<?= $dta['id_kelas'] ?>">EDIT</a> 
 	 		<a class="btn btn-danger btn-sm" href="?hapus&id=<?= $dta['id_kelas'] ?>">HAPUS</a>
 	 	</td>
 	 </tr>
 	 <?php $i++;  ?>
 	<?php endwhile; ?>
 </table>
</body>
</div>
</html>
<?php
// Tombol Hapus ditekan
if(isset($_GET['hapus'])){
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM kelas WHERE id_kelas='$id'");
    if($hapus){?>
		<meta http-equiv="refresh" content="0; url=kelas.php">
		<?php
    }else{
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');
        </script>";
    }
}
?> 
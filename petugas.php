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
<h3> DATA PETUGAS WEB SPP</h3>
	</div>
<a class="btn btn-primary " href="tambah_petugas.php">TAMBAH DATA</a>
<?php
	?>
<table class="table table-bordered table-striped" cellspacing="0" border ="1" cellpadding="h">

 	<tr style = "text-align : center" >
 		<th>NO</th>
 		<th>ID</th>
 		<td>NAMA ADMIN</td>
		<td>AKSI</td>
 	</tr>
</center>
 	<?php 
 	include 'koneksi.php';
	$data = mysqli_query($db,"SELECT * FROM petugas ORDER BY id_petugas ASC");	
 	$i=1; 
 	while($dta = mysqli_fetch_assoc($data) ):
 	 ?>
 	 <tr>
 	 	<td width="40px" align="center"><?= $i; ?></td>
 	 	<td align="center"><?= $dta['id_petugas'] ?></td>
 	 	<td><?= $dta['nama_petugas'] ?></td>
 	 	<td width="160px">
 	 		<a class="btn btn-warning btn-sm  " href="editpetugas.php?id=<?= $dta['id_petugas'] ?>">EDIT</a> 
 	 		<a class="btn btn-danger btn-sm" href="?hapus&id=<?= $dta['id_petugas'] ?>" onclick ="return confirm('apakah anda yakin ingin menghapus data admin? ')">HAPUS</a>
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
    $hapus = mysqli_query($db, "DELETE FROM petugas WHERE id_petugas='$id'");
    if($hapus){?>
		<meta http-equiv="refresh" content="0; url=petugas.php">
		<?php
    }else{
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');
        </script>";
    }
}
?>
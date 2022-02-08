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

<div class="container">
	<div class="page-header">
<h2 >TAMBAH DATA PETUGAS</h2>
</div>
<form action="" method="post">
<table class="table ">
	<tr>
		<td>Username</td>
		<td>
			<input class="form-control" type="text" name="user" placeholder="Masukan Username">
		</td>
	</tr>
	<tr>
		<td>Password</td>
		<td>
			<input class="form-control" type="Password" name="pass" placeholder="Masukan Password">
		</td>
	</tr>
	<tr>
		<td>Nama Lengkap</td>
		<td>
			<input class="form-control" type="text" name="nama" placeholder="Masukan Nama Lengkap">
		</td>
	</tr>
	<tr>
		<td>Level</td>
		<td>
			<input class="form-control" type="text" name="level" placeholder="Petugas / Administrator">
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<button class="btn btn-success" type="submit" name="simpan">SIMPAN</button>
		</td>
	</tr>
</table>
</form>

<?php
 if(isset($_POST['simpan'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $nama = $_POST['nama'];
    $level = $_POST['level'];
    $simpan = mysqli_query($db, "INSERT INTO petugas VALUES(NULL, '$user', '$pass', '$nama', '$level')");
        if($simpan){
            header("location: petugas.php");
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
}
?>
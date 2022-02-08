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
<h2 >TAMBAH DATA KELAS</h2>
</div>
<form action="" method="post">
<table class="table ">
	<tr>
		<td>NAMA KELAS</td>
		<td>
			<input class="form-control" type="text" name="kelas" placeholder="Masukan kelas">
		</td>
	</tr>
	<tr>
		<td>KOMPETENSI KEAHLIAN</td>
		<td>
			<input class="form-control" type="text" name="jurusan" placeholder="Masukan jurusan">
		</td>
	</tr>
    <tr>
        <td>ANGKATAN</td>
        <td>
            <input class="form-control" type="text" name="angkatan" placeholder="Masukan angkatan">
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
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $angkatan = $_POST['angkatan'];
    $simpan = mysqli_query($db, "INSERT INTO kelas VALUES(NULL, '$kelas', '$jurusan', '$angkatan')");
        if($simpan){
            header("location: kelas.php");
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
}
?>
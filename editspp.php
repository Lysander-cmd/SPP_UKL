<?php
require_once("require.php");
$id = $_GET['id'];
$kelas = mysqli_query($db, "SELECT * FROM spp WHERE id_spp='$id'");
?>
<?php include 'header.php';?>;

<div class="container">
	<div class="page-header">
<h2 >TAMBAH SPP</h2>
</div>
<form action="" method="POST">
<table class="table ">
	<tr>
		<td>TAHUN</td>
		<td>
			<input class="form-control" type="text" name="tahun" placeholder="Masukan tahun">
		</td>
	</tr>
	<tr>
		<td>NOMINAL</td>
		<td>
			<input class="form-control" type="text" name="nominal" placeholder="Masukan nominal">
		</td>
	
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
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];
    $simpan = mysqli_query($db, "UPDATE  spp SET tahun = '$tahun', nominal = '$nominal'");
        if($simpan){?>
			<meta http-equiv="refresh" content="0; url=spp.php">
			<?php
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
}
?>
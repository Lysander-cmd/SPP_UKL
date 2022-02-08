<?php
require_once("require.php");
$id = $_GET['id'];
$kelas = mysqli_query($db, "SELECT * FROM petugas WHERE id_petugas='$id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit data kelas</title>
</head>
<body>
<?php include 'header.php';?>;  
<?php
while($row = mysqli_fetch_assoc($kelas)){?>
<form action="" method="post">
<table class="table ">
    <input type="hidden" name = "id" value ="<?= $row['id_petugas'];?>">
	<tr>
		<td>NAMA ADMIN</td>
		<td>
			<input class="form-control" type="text" name="nama" value="<?= $row['nama_petugas']; ?>">
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
<?php } ?>

<?php
 if(isset($_POST['simpan'])){
    // $id = $_POST ['id']
    $nama = $_POST['nama'];
    $simpan = mysqli_query($db, "UPDATE petugas SET nama_petugas='$nama' WHERE petugas.id_petugas = '$id' ");
        if($simpan){?>
			<meta http-equiv="refresh" content="0; url=petugas.php">
			<?php
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
}
?>
    
</body>
</html>
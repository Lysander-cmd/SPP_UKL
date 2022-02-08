<?php
require_once("require.php");
$id = $_GET['id'];
$kelas = mysqli_query($db, "SELECT * FROM kelas WHERE id_kelas='$id'");
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
    <input type="hidden" name = "id" value ="<?= $row['id_kelas'];?>">
	<tr>
		<td>NAMA KELAS</td>
		<td>
			<input class="form-control" type="text" name="kelas" value="<?= $row['nama_kelas']; ?>">
		</td>
	</tr>
	<tr>
		<td>KOMPETENSI KEAHLIAN</td>
		<td>
			<input class="form-control" type="text" name="jurusan" value="<?= $row['jurusan']; ?>">
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
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $simpan = mysqli_query($db, "UPDATE  kelas SET nama_kelas='$kelas' , jurusan = '$jurusan' 
                        WHERE kelas.id_kelas = '$id'");
        if($simpan){?>
			<meta http-equiv="refresh" content="0; url=kelas.php">
			<?php
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
}
?>
    
</body>
</html>
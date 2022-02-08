<?php 
require_once("require.php");
$nisn = $_GET['nisn'];
$siswa = mysqli_query($db, "SELECT * FROM siswa WHERE nisn = '$nisn'");
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
while($row = mysqli_fetch_assoc($siswa)){?>
<form action="" method="POST">
<table class="table ">
    <input type="hidden" name = "nisn" value ="<?= $row['nisn'];?>">

	<tr>
		<td>NAMA SISWA</td>
		<td>
			<input class="form-control" type="text" name="nama" value="<?= $row['nama']; ?>">
		</td>
	</tr>
	<tr>
    <td>Kelas</td>
 			<td>
 				<select class="form-control" name="kelas" required>
 					<option value="" selected >-pilih kelas-</option>
 					<?php 
 					$data = mysqli_query($db ,"SELECT * FROM kelas ");
 					while($dta = mysqli_fetch_assoc($data)){
 					 ?>
 					 <option value="<?= $dta['id_kelas']; ?>"><?= $dta['nama_kelas']; ?></option>
 					 <?php 
 					}
 					?>
 				</select>
 			</td>
             <tr>
 			<td>Alamat</td>
 			<td>
 				<input class="form-control" type="text" name="alamat" placeholder="alamat" >
 			</td>
 		</tr>
         <tr>
 			<td>No Telp</td>
 			<td>
 				<input class="form-control" type="text" name="no_tlp" placeholder="No Telp" >
 			</td>
 		</tr>
	
	<tr>
		<td></td>
		<td>
			<button class="btn btn-success" type="submit" name="simpan">SIMPAN DATA</button>
		</td>
	</tr>
</table>
</form>
<?php } ?>

<?php
 if(isset($_POST['simpan'])){
    // $id = $_POST ['id']
    $NISN = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas= $_POST['kelas'];
    $alamat= $_POST['alamat'];
    $telp= $_POST['no_tlp'];
    
    $simpan = mysqli_query($db, "UPDATE  siswa SET  nama = '$nama' , 
							id_kelas = '$kelas', alamat = '$alamat', no_tlp = '$telp'
                        WHERE siswa.nisn = '$NISN'");
        if($simpan){?>
            <meta http-equiv="refresh" content="0; url=siswa.php">
            <?php
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
}
?>
    
</body>
</html>
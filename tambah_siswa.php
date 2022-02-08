<?php
require_once("require.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset-"UTF-8">
    <title>Tambah siswa</title>
</head>

<body>
    <?php require("header.php"); ?>
    <h3>Tambah siswa</h3>
    <form action="" method="POST">
        <table cellpading="5">
            <tr>
                <td>NISN : </td>
                <td><input type="text" name="nisn"></td>
            </tr>
            <tr>
                <td>NIS :</td>
                <td><input type="text" name="nis"></td>
            </tr>
            <tr>
                <td>Nama : :</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Kelas| Jurusan: :</td>
                <td><select name="kelas">
                        <?php
                        $kelas =  mysqli_query($db, "SELECT * FROM kelas");
                        while ($r = mysqli_fetch_assoc($kelas)) { ?>
                            <option value="<?= $r['id_kelas']; ?>"><?= $r['nama_kelas'] . "| " . $r['jurusan']; ?></option>
                        <?php } ?>
                    </select></td>
            </tr>
            <tr>
                <td>Alamat : </td>
                <td><input type = "text" name="alamat"></td>
            </tr>
            <tr>
                <td>No.Telepon</td>
                <td><input type ="tel" name="no"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name ="simpan">Simpan</button></td>
            </tr>
        </table>
    </form>
    <hr />
</body>

</html>
<?php
// Proses Simpan
if(isset($_POST['simpan'])){
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $no_tlp= $_POST['no'];
    $simpan = mysqli_query($db, "INSERT INTO siswa VALUES
    ('$nisn', '$nis', '$nama', '$kelas', '$alamat', '$no_tlp')");
        if($simpan){
            header("location: siswa.php");
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
}
?>
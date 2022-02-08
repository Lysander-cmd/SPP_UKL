<?php

require_once("require.php");

// Tombol Hapus ditekan
if(isset($_GET['hapus'])){
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM pembayaran WHERE id_pembayaran='$id'");
    if($hapus){?>
       <meta http-equiv="refresh" content="0; url=transaksi.php">
	   <?php
    }else{
        echo "<script>alert('Maaf, terjadi kesalahan ketika menghapus');
        </script>";
    } 
}
?>
<?php
session_start();
require_once("koneksi.php");
if(!isset($_SESSION['username'])){
    header("location: login.php");

}else{
    $username =$_SESSION['username'];
}
?>
<html>
    <head>
        <title>Aplikasi pembayaran spp</title>
    </head>
    <body>
        <?php require_once("header.php");?>
        <h3>Selamat datang, <?=$username;?></h3>
        <br />
        Silahkan dikelola dengan baik
        <hr /> 
    </body>
</html>

<!DOCTYPE html>
<html>


	
	  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>HALAMAN UTAMA</title>

    <!-- Bootstrap core CSS -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

  </head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container">
    <a class="navbar-brand" href="./">WEB SPP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSuportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span ></span>
      <span></span>
      <span></span>
      <span></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarSuportedContent">
      <ul class="navbar-nav ml-auto">
      <?php
$panggil = mysqli_query($db, "SELECT * FROM petugas WHERE username = '$username'");
$hasil = mysqli_fetch_assoc($panggil);
if($hasil['level'] == "admin"){ ?>
        <li class ="nav-item active"><a class="nav-link " href="./">HOME</a></li>
        <li class = "nav-item active"><a class="nav-link " href="siswa.php">DATA SISWA</a></li>
        <li class = "nav-item active"><a class="nav-link " href="petugas.php">DATA PETUGAS</a></li>
        <li class = "nav-item active"><a class="nav-link " href="kelas.php">DATA KELAS</a></li>
        <li class = "nav-item active"><a class="nav-link " href="spp.php">DATA SPP</a></li>
        <li class = "nav-item active"><a class="nav-link " href="transaksi.php">TRANSAKSI</a></li>
        <li class = "nav-item active"><a class="nav-link " href="history.php">HISTORY</a></li>
        <li class = "nav-item active"><a class="nav-link " href="logout.php">LOGOUT</a></li>

<?php
}else{ ?>
<li class = "nav-item active"><a class="nav-link " href="transaksi.php">TRANSAKSI</a></li>
        <li class = "nav-item active"><a class="nav-link " href="history.php">HISTORY</a></li>
        <li class = "nav-item active"><a class="nav-link " href="logout.php">LOGOUT</a></li>
<?php }?>
</ul>

    
    </div>
  </div>
 
</nav>


</body>
</html>

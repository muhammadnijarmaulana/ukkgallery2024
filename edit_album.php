<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit Album</title>
    <!-- Tautan ke Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tautan ke file CSS tambahan Anda jika ada -->
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1  class="mt-4 mb-4 text-center">Halaman Edit Album</h1>
        <p  class="mt-4 mb-4 text-center">Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
        
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="album.php">Album</a></li>
            <li class="nav-item"><a class="nav-link" href="foto.php">Foto</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>

        <form action="update_album.php" method="post">
            <?php
                include "koneksi.php";
                $albumid=$_GET['albumid'];
                $sql=mysqli_query($conn,"select * from album where albumid='$albumid'");
                while($data=mysqli_fetch_array($sql)){
            ?>
            <input type="text" name="albumid" value="<?=$data['albumid']?>" hidden>
            <div class="form-group">
                <label for="namaalbum">Nama Album</label>
                <input type="text" class="form-control" id="namaalbum" name="namaalbum" value="<?=$data['namaalbum']?>">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?=$data['deskripsi']?>">
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
            <?php
                }
            ?>
        </form>
    </div>

    <!-- Skrip JavaScript Bootstrap (opsional, hanya jika Anda menggunakannya) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

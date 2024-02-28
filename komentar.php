<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
        exit(); // Pastikan keluar setelah mengarahkan pengguna ke halaman login
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Komentar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /*Tambahkan gaya khusus di sini jika diperlukan*/
        .container {
            margin-top: 50px;
        }
        .table-responsive {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1  class="mt-4 mb-4 text-center">Halaman Komentar</h1>
        <?php if(isset($_SESSION['namalengkap'])): ?>
        <p  class="mt-4 mb-4 text-center">Selamat datang <b><?= $_SESSION['namalengkap'] ?></b></p>
        <?php endif; ?>
        
        <ul  class="nav nav-pills justify-content-center">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="album.php">Album</a></li>
                <li class="nav-item"><a class="nav-link" href="foto.php">Foto</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>

        <form action="tambah_komentar.php" method="post">
            <?php
                include "koneksi.php";
                if(isset($_GET['fotoid'])) {
                    $fotoid=$_GET['fotoid'];
                    $sql=mysqli_query($conn,"select * from foto where fotoid='$fotoid'");
                    while($data=mysqli_fetch_array($sql)){
            ?>
            <input type="text" name="fotoid" value="<?= $data['fotoid'] ?>" hidden>
           
            <div class="table-responsive">
            <div class="card mt-4">
            <div class="card-header bg-primary text-white">
               Tambah Komentar
            </div>
                <table class="table">
                    <tr>
                        <td>Judul</td>
                        <td><input type="text" name="judulfoto" value="<?= $data['judulfoto'] ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td><input type="text" name="deskripsifoto" value="<?= $data['deskripsifoto'] ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Foto</td>
                        <td><img src="gambar/<?= $data['lokasifile'] ?>" width="200px"></td>
                    </tr>
                    <tr>
                        <td>Komentar</td>
                        <td><input type="text" name="isikomentar" class="form-control"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Tambah" class="btn btn-primary"></td>
                    </tr>
                </table>
            </div>
            <?php
                    }
                }
            ?>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Komentar</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "koneksi.php";
                        $userid=$_SESSION['userid'];
                        $sql=mysqli_query($conn,"select * from komentarfoto,user where komentarfoto.userid=user.userid");
                        while($data=mysqli_fetch_array($sql)){
                    ?>
                        <tr>
                            <td><?= $data['komentarid'] ?></td>
                            <td><?= $data['namalengkap'] ?></td>
                            <td><?= $data['isikomentar'] ?></td>
                            <td><?= $data['tanggalkomentar'] ?></td>
                            <td><a href="hapus_komentar.php?komentarid=<?=$data['komentarid']?>" class="btn btn-danger">Hapus</a></td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

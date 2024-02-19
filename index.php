<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
            background-color: #f8f9fa;
        }
        .nav-item {
            margin-right: 10px;
        }
        .table-responsive {
            margin-top: 20px;
        }
        /* Stylize table */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        th {
            background-color: #f2f2f2;
        }
        /* Style buttons */
        .btn {
            margin-right: 5px;
        }
        /* Responsiveness for images */
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
        h1 {
            color: #333;
        }
        .nav-link {
            color: #007bff;
        }
        .nav-link:hover {
            color: #0056b3;
        }
        .btn-primary, .btn-danger, .btn-secondary {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4 text-center">Halaman Landing</h1>
        <?php
            session_start();
            if(!isset($_SESSION['userid'])){
        ?>
            <ul class="nav justify-content-end">
                <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            </ul>
        <?php
            } else {
        ?>   
            <p class="text-center">Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
            
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="album.php">Album</a></li>
            <li class="nav-item"><a class="nav-link" href="foto.php">Foto</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>

        <?php
            }
        ?>

        <div class="table-responsive mt-4">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Uploader</th>
                        <th>Jumlah Like</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "koneksi.php";
                        $sql=mysqli_query($conn,"select * from foto,user where foto.userid=user.userid");
                        while($data=mysqli_fetch_array($sql)){
                    ?>
                        <tr>
                            <td><?=$data['fotoid']?></td>
                            <td><?=$data['judulfoto']?></td>
                            <td><?=$data['deskripsifoto']?></td>
                            <td><img src="gambar/<?=$data['lokasifile']?>" width="200px" class="img-fluid"></td>
                            <td><?=$data['namalengkap']?></td>
                            <td>
                                <?php
                                    $fotoid=$data['fotoid'];
                                    $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                                    echo mysqli_num_rows($sql2);
                                ?>
                            </td>
                            <td>
                                <a href="like.php?fotoid=<?=$data['fotoid']?>" class="btn btn-primary">Like</a>
                                <a href="unlike.php?fotoid=<?=$data['fotoid']?>" class="btn btn-danger">Unlike</a>
                                <a href="komentar.php?fotoid=<?=$data['fotoid']?>" class="btn btn-secondary">Komentar</a>
                            </td>
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

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
    <title>Halaman Album</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4 text-center">Halaman Album</h1>
        <p class="mt-4 text-center">Selamat datang <b><?php echo isset($_SESSION['namalengkap']) ? $_SESSION['namalengkap'] : ''; ?></b></p>
        
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link active" href="album.php">Album</a></li>
            <li class="nav-item"><a class="nav-link" href="foto.php">Foto</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>

        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                Tambah Album
            </div>
            <div class="card-body">
                <form action="tambah_album.php" method="post">
                    <div class="form-group">
                        <label for="namaalbum">Nama Album</label>
                        <input type="text" class="form-control" id="namaalbum" name="namaalbum" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header bg-success text-white">
                Daftar Album
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Tanggal dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "koneksi.php";
                            $userid=$_SESSION['userid'];
                            $sql=mysqli_query($conn,"select * from album where userid='$userid'");
                            $nomor= 1;                            
                            while($data=mysqli_fetch_array($sql)){
                        ?>
                                <tr>
                                    <td><?php echo $nomor++?></td>
                                    <td><?php echo $data['namaalbum']; ?></td>
                                    <td><?php echo $data['deskripsi']; ?></td>
                                    <td><?php echo $data['tanggaldibuat']; ?></td>
                                    <td>
                                        <a href="hapus_album.php?albumid=<?php echo $data['albumid']; ?>" class="btn btn-danger">Hapus</a>
                                        <a href="edit_album.php?albumid=<?php echo $data['albumid']; ?>" class="btn btn-warning">Edit</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

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
    <title>Halaman Foto</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4 text-center">Halaman Foto</h1>
        <p class="mt-4 text-center">Selamat datang <b><?php echo isset($_SESSION['namalengkap']) ? $_SESSION['namalengkap'] : ''; ?></b></p>
        
        <ul  class="nav nav-pills justify-content-center">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="album.php">Album</a></li>
            <li class="nav-item"><a class="nav-link active" href="foto.php">Foto</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>

        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                Tambah Foto
            </div>
            <div class="card-body">
                <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="judulfoto">Judul</label>
                        <input type="text" class="form-control" id="judulfoto" name="judulfoto">
                    </div>
                    <div class="form-group">
                        <label for="deskripsifoto">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsifoto" name="deskripsifoto">
                    </div>
                    <div class="form-group">
                        <label for="lokasifile">Lokasi File</label>
                        <input type="file" class="form-control-file" id="lokasifile" name="lokasifile">
                    </div>
                    <div class="form-group">
                        <label for="albumid">Album</label>
                        <select class="form-control" id="albumid" name="albumid">
                            <?php
                                include "koneksi.php";
                                $userid=$_SESSION['userid'];
                                $sql=mysqli_query($conn,"select * from album where userid='$userid'");
                                while($data=mysqli_fetch_array($sql)){
                            ?>
                                    <option value="<?php echo $data['albumid']; ?>"><?php echo $data['namaalbum']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header bg-success text-white">
                Daftar Foto
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Unggah</th>
                            <th>Lokasi File</th>
                            <th>Album</th>
                            <th>Disukai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "koneksi.php";
                            $userid=$_SESSION['userid'];
                            $sql=mysqli_query($conn,"select * from foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
                            while($data=mysqli_fetch_array($sql)){
                        ?>
                                <tr>
                                    <td><?php echo $data['fotoid']; ?></td>
                                    <td><?php echo $data['judulfoto']; ?></td>
                                    <td><?php echo $data['deskripsifoto']; ?></td>
                                    <td><?php echo $data['tanggalunggah']; ?></td>
                                    <td>
                                        <img src="gambar/<?php echo $data['lokasifile']; ?>" width="200px" class="img-thumbnail">
                                    </td>
                                    <td><?php echo $data['namaalbum']; ?></td>
                                    <td>
                                        <?php
                                            $fotoid=$data['fotoid'];
                                            $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                                            echo mysqli_num_rows($sql2);
                                        ?>
                                    </td>
                                    <td>
                                        <a href="hapus_foto.php?fotoid=<?php echo $data['fotoid']; ?>" class="btn btn-danger">Hapus</a>
                                        <a href="edit_foto.php?fotoid=<?php echo $data['fotoid']; ?>" class="btn btn-warning">Edit</a>
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
</html

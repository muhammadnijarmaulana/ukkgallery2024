<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1  class="mt-4 text-center">Halaman Home</h1>
        <?php
            session_start();
            if(isset($_SESSION['userid']) && isset($_SESSION['namalengkap'])) {
        ?>
                <p class="mt-4 text-center">Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
        <?php
            } else {
        ?>
                <p class="mt-4 text-center">Silakan <a href="login.php">login</a> untuk mengakses halaman ini.</p>
        <?php
            }
        ?>
        
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="album.php">Album</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="foto.php">Foto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

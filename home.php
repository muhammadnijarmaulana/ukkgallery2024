<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 50px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        p {
            font-size: 18px;
            text-align: center;
            margin-bottom: 20px;
        }
        .nav {
            justify-content: center;
        }
        .nav-item {
            margin-right: 10px;
        }
        .nav-link {
            color: #007bff;
        }
        .nav-link:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Halaman Home</h1>
        <?php
            session_start();
            if(isset($_SESSION['userid']) && isset($_SESSION['namalengkap'])) {
        ?>
                <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
        <?php
            } else {
        ?>
                <p>Silakan <a href="login.php">login</a> untuk mengakses halaman ini.</p>
        <?php
            }
        ?>
        
        <ul class="nav">
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

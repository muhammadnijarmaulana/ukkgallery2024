<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['userid'])){
    // Pengguna harus login untuk memberikan like
    header("location:index.php");
} else {
    $fotoid = $_GET['fotoid'];
    $userid = $_SESSION['userid'];

    // Periksa apakah pengguna sudah memberikan like pada foto ini sebelumnya
    $sql = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");

    if(mysqli_num_rows($sql) == 1){
        // Pengguna sudah memberikan like pada foto ini sebelumnya
        header("location:index.php");
    } else {
        $tanggallike = date("Y-m-d");
        // Tidak perlu menyertakan kolom 'likeid' karena itu diatur sebagai auto-increment
        mysqli_query($conn, "INSERT INTO likefoto (fotoid, userid, tanggallike) VALUES ('$fotoid', '$userid', '$tanggallike')");
        header("location:index.php");
    }
}
?>

<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['userid'])){
    // Pengguna harus login untuk melakukan unlike
    header("location:index.php");
} else {
    $fotoid = $_GET['fotoid'];
    $userid = $_SESSION['userid'];

    // Periksa apakah pengguna sudah memberikan like pada foto ini sebelumnya
    $sql = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");

    if(mysqli_num_rows($sql) == 0){
        // Pengguna belum memberikan like pada foto ini sebelumnya
        // Anda bisa memberikan pesan atau melakukan tindakan lain, sesuai kebutuhan
        header("location:index.php");
    } else {
        // Lakukan proses unlike
        mysqli_query($conn, "DELETE FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
        header("location:index.php");
    }
}
?>

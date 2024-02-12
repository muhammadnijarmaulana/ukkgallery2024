<?php
    include "koneksi.php";
    session_start();

    $namaalbum=$_POST['namaalbum'];
    $deskripsi=$_POST['deskripsi'];
    $tanggaldibuat=date("Y-m-d");
    $userid=$_SESSION['userid'];

    $sql=mysqli_query($conn,"insert into album (namaalbum, deskripsi, tanggaldibuat, userid) values('$namaalbum','$deskripsi','$tanggaldibuat','$userid')");

    header("location:album.php");
?>
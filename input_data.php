<?php
    include "koneksi.php";
    session_start();
    if (!$_SESSION['isLoggedIn']) {
        header("Location: login.php");
        exit();
    }

    $judul = $_POST['judul'];
    $tahun = $_POST['tahun'];

    $dbh= $koneksi->prepare("INSERT INTO buku (judul,tahun,created_by,created_at) VALUES (?,?,?,?)");

    $dbh->execute([$judul,$tahun,$_SESSION['userid'],date("Y-m-d H:i:s")]);

    header("Location:home.php")
?>
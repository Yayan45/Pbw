<?php

include "koneksi.php";
session_start();

if (!$_SESSION['isLoggedIn']) {
    header("Location : login.php");
}

$id = $_POST['id'];
$tahun = $_POST['tahun'];
$judul = $_POST['judul'];

"UPDATE buku SET judul = ?, tahun = ?, updated_by= ?, updated_at = ? WHERE id = ?";

$dbh = $koneksi->prepare("UPDATE buku SET judul = ?, tahun = ?, updated_by= ?, updated_at = ? WHERE id = ?");
$dbh->execute([$judul, $tahun, $_SESSION['userid'], date("Y-m-d H:i:s"), $id]);

header("Location: home.php");
exit;

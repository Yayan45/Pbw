<?php

include "koneksi.php";
session_start();

if (!$_SESSION['isLoggedIn']) {
  header("Location: login.php");
  exit;
}

$id = $_GET['id'];

$dbh = $koneksi->prepare("SELECT * FROM buku WHERE id = ?");
$dbh->execute([$id]);

if ($dbh->rowCount() == 1) {
  $data = $dbh->fetch(PDO::FETCH_ASSOC);
?>
  <form method="POST" action="aksiedit.php" class="container" autocomplete="off">
    <h1 class="mt-5">Masukan Data Buku</h1>
    <div class="form-group">
      <label for="judul">Judul</label>
      <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $data['judul'] ?>">
    </div>
    <div class="form-group">
      <label for="tahun">Tahun Terbit</label>
      <input type="text" class="form-control" name="tahun" value="<?php echo $data['tahun'] ?>">
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Tambahkan input hidden untuk ID -->
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
<?php
} else {
  echo "<script>alert('Data Tidak Di Temukan')</script>";
  header("Location: home.php");
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Input Data</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body>

</body>

</html>
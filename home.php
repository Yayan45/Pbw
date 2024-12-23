<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
}
// echo "Sugeng Rawuh, ", $_SESSION['username'], " - ", $_SESSION['userid'];
echo "<script>alert('Sugeng Rawuh " . $_SESSION['username'], " - ", $_SESSION['userid'] . "');</script>";

echo "<br>";
echo "<br>";
include "koneksi.php"
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas-Week-10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>



    <div class="container">
        <h1 class="text-center">Data Buku</h1>
        <a href="input.php" class="btn btn-success mb-3">Tambah Data</a>
        <a href="logout.php"> <button class="btn btn-danger mb-3">keluar</button></a>
        <?php
        $dbh = $koneksi->query("SELECT * FROM buku Where isdel = 0");

        ?>
        <div class="row">
            <table class="table table-bordered" border="1">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($bukus = $dbh->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $no ?></th>
                            <td><?php echo $bukus['judul'] ?></td>
                            <td><?php echo $bukus['tahun'] ?></td>
                            <td>
                                <a class="btn btn-primary" href="edit.php?id=<?php echo $bukus['id'] ?>">Edit</a>
                                <a class="btn btn-danger" href="delete.php?id=<?php echo $bukus['id'] ?>">Hapus</a>

                            </td>
                        </tr>

                    <?php

                        $no++;
                    }
                    ?>
                </tbody>
            </table>


        </div>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
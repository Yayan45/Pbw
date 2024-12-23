<?php
    include "koneksi.php";

    $email = $_POST['email'];
    $password = $_POST['password'];


    $dbh = $koneksi->query("SELECT * FROM users WHERE email ='".$email."' AND active = 1");


    if($dbh->rowCount()== 1)
    {
        $users = $dbh->fetch(PDO::FETCH_ASSOC);
        if(password_verify($password,$users['password']))
        {
            session_start();
            $_SESSION['username'] = $users['username'];
            $_SESSION['userid'] = $users['id'];
            $_SESSION['isLoggedIn'] = true;
            header("location: home.php");

             echo "<script>alert('monggo pinarak ".$users['username']."');</script>";
        }
        else{
            echo "<script>alert('Password mu rx bener ".$users['username']."');</script>";
        }
    }

?>
<?php

try{
    $koneksi = new PDO("mysql:host=localhost;
    dbname=akademik",'root','');
}
catch(PDOException $e){
    echo "Koneksi gk nyambung bro", $e->getMessage();
}


?>
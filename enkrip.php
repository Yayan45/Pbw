<?php

    echo "enkripsi menggunakan md5"; echo "<br>";
    echo md5('123');

    echo "<br>";
    echo "<br>";
    
    echo "enkripsi menggunakan sha1"; echo "<br>";
    echo sha1('123');
    
    echo "<br>";
    echo "<br>";
    
    echo PASSWORD_HASH('123', PASSWORD_DEFAULT);
    
    echo "<br>";

    echo password_verify('123',
    '$2y$10$6liWFdVBjNwxj2QptB9FKOGLvFEZ38OK0hneamlxueD4yqRwxr332');
?>
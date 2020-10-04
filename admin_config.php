<?php
    define('DB_SERVER', 'localhost:3306');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'neepco_database');

     $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    // $db = mysqli_connect('localhost:3306', 'root', '', 'neepco_database');
    if($db === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>
<?php 

    $host = 'localhost';
    $user = 'root';
    $password = '123456';
    $dbname = 'pdoposts';

    // Set DSN (Data Source Name)
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

    // Create a PDO instance
    $pdo = new PDO($dsn, $user, $password);

?>
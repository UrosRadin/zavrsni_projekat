<?php
    $servername = "127.0.0.1";
    $username = "mysql-94484-0.cloudclusters.net";
    $password = "pqXib2LB";
    $dbname = "blog";

    try {
        $connection = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
?>
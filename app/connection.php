<?php

    $host = "db"; // Le host est le nom du service, présent dans le docker-compose.yml
    $dbname = "test";
    $charset = "utf8";
    $port = "3306";

    try {
        $pdo = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=$charset;port=$port","root", "root",
        );
}catch (PDOException $e) {
echo $e;
    }
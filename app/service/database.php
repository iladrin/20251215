<?php

function getDbConnection(): PDO
{
    static $connection = null;

    if ($connection === null) {
        $dsn = 'mysql:host=localhost;dbname=training;charset=utf8mb4';

        try {
            $connection = new PDO($dsn, 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (\PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    return $connection;
}

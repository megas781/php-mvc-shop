<?php

class Database {

    public static function getPdoConnection()
    {
        $params = include(ROOT . '/config/db_config.php');
        $host = $params['host'];
        $dbhame = $params['dbname'];
        $user = $params['user'];
        $password = $params['password'];

        $dsn = "mysql:host=$host;dbname=$dbhame";

        $pdo = new PDO($dsn, $user, $password);

        return $pdo;
    }

}
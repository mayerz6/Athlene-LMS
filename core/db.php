<?php
require __DIR__ . "/config.php";



class DBConnect {
    /* Instantiation of the DATABASE Class used to structure
    processes & procedures associated within database
    CRUD operations. */
    
    public static function getInstance($config){
        $dsn = "mysql:host={$config['database']['hostname']};dbname={$config['database']['database']};charset=utf8";
        try { $pdo = new PDO($dsn, $config['database']['username'], $config['database']['password']); echo "Successful Connection!"; }
        catch(PDOException $e) { echo $e->getMessage(); }

        return $pdo;
    }

}

$db1 = new DBConnect;

$db1->getInstance($config);

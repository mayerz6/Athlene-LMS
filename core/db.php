<?php
require __DIR__ . "/config.php";

$dsn = "mysql:host={$config['database']['hostname']};dbname={$config['database']['database']}";

try { $pdo = new PDO($dsn, $config['database']['username'], $config['database']['password']); echo "Successful Connection!"; }
catch(PDOException $e) { echo $e->getMessage(); }

class db {
/* Instantiation of the DATABASE Class used to structure
processes & procedures associated within database
CRUD operations. */

}
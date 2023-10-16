<?php
require __DIR__ . "/config.php";

/**
 *  Database
 * 
 *  A connection to the database
 */

class DBConnect {

    private $db;
    public $dbInstance = null;

    /** Constructor METHOD needed */
    function __construct($config)
    {
        if(!$this->dbInstance){
           $this->dbInstance = $this->getInstance($config);
        }
    }

    /**
     * Instantiation of the DATABASE Object used to structure
     * processes & procedures associated within database
     * CRUD operations. 
     */
    public function getInstance($config){
        $dsn = "mysql:host={$config['database']['hostname']};dbname={$config['database']['database']};charset=utf8";
        try { 
            $pdo = new PDO($dsn, $config['database']['username'], $config['database']['password']); 
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //self::$dbInstance = $pdo;
            return $pdo;
            // echo "Successful Connection!"; 
        } catch(PDOException $e) { echo "Failed to connect to database - " . $e->getMessage(); exit; }

    }

}


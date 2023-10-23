<?php
require __DIR__ . "/config.php";

/**
 *  Database
 * 
 *  A connection to the database
 */

class DBConnect {

    private $db;
<<<<<<< HEAD
    private static $dbInstance = null;
=======
    public $dbInstance = null;
>>>>>>> main

    /** Constructor METHOD needed */
    function __construct($config)
    {
<<<<<<< HEAD
        if(!self::$dbInstance){
            $this->getInstance($config);
=======
        if(!$this->dbInstance){
           $this->dbInstance = $this->getInstance($config);
>>>>>>> main
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
<<<<<<< HEAD
            self::$dbInstance = $pdo;
=======
            //self::$dbInstance = $pdo;
            return $pdo;
>>>>>>> main
            // echo "Successful Connection!"; 
        } catch(PDOException $e) { echo "Failed to connect to database - " . $e->getMessage(); exit; }

    }

<<<<<<< HEAD
    public static function fetchSubjects(){
        $query = "select * from tutors";
    }

=======
>>>>>>> main
}


<?php
require __DIR__ . "/config.php";

/**
 *  Database
 * 
 *  A connection to the database
 */

class DBConnect {

    private $db;

    /** Constructor METHOD needed */


    /**
     * Instantiation of the DATABASE Object used to structure
     * processes & procedures associated within database
     * CRUD operations. 
     */
    public function getInstance($config){
        $dsn = "mysql:host={$config['database']['hostname']};dbname={$config['database']['database']};charset=utf8";
        try { $pdo = new PDO($dsn, $config['database']['username'], $config['database']['password']); echo "Successful Connection!"; }
        catch(PDOException $e) { echo "Failed to connect to database - " . $e->getMessage(); }

        return $pdo;
    }

    public function fetchStudents($conn){
        $query = "select * from students";
        // $records = $this->db->query($query);
        $records = $conn->query($query);
        if($records === false) :
            // var_dump($this->db->errorInfo());    
            var_dump($conn->errorInfo());    
            return false;  
        else :
            $students = $records->fetchAll(PDO::FETCH_ASSOC);
            return $students;
        endif;

    }

    public static function fetchSubjects(){
        $query = "select * from tutors";
    }

}


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
        try { 
            $pdo = new PDO($dsn, $config['database']['username'], $config['database']['password']); 
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
            // echo "Successful Connection!"; 
        } catch(PDOException $e) { echo "Failed to connect to database - " . $e->getMessage(); exit; }

    }

    public function fetchStudentRecords($conn){
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

    public function fetchStudentRecord($conn, $id, $column){

        $query = "select $column from students where student_id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        if($stmt->execute()){
            return $stmt->fetch();
        }
    }

    public function addStudent($record, $conn){
        $query = "insert into students";
        $query .= "('firstname', 'lastname', 'email, 'contact')";
        $query .= "VALUES({$record['firstname']}, {$record['lastname']},";
        $query .= "{$record['email']}, {$record['mobile']})";

        $exec = $conn->query($query);

        if($exec === false) :
            // var_dump($this->db->errorInfo());    
            var_dump($conn->errorInfo());    
            return false;  
        else :
            return true;
        endif;
    }

    public static function fetchSubjects(){
        $query = "select * from tutors";
    }

}


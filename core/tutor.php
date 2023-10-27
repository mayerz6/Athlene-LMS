<?php

class Tutor{

    private static $dbInstance;
    private $tutor_id;
    private $firstnamr;
    private $lastname;
    private $email;
    private $mobile;
    private $password;
    private $pwd_salt;

    function __construct()
    {
        // if(isset($conn)):
        // self::$dbInstance = $conn;
        // endif;
    }

    public function fetchTutorRecords($conn){
        self::$dbInstance = $conn;
        $query = "select * from tutors";
        $records = self::$dbInstance->query($query);
        if($records === false) :
            var_dump(self::$dbInstance->errorInfo());
                return false;
        else :
            $tutors = $records->fetchAll(PDO::FETCH_ASSOC);
                return $tutors;
        endif;
    }

    public function addTutor($record, $conn){
        self::$dbInstance = $conn;
        $query = "insert into tutors";
        $query .= "(firstname, lastname, email, mobile) ";
        $query .= "VALUES('{$record['firstname']}', '{$record['lastname']}', ";
        $query .= "'{$record['email']}', '{$record['mobile']}');";

        // $exec = $conn->query($query);
        if(self::$dbInstance->query($query) === false) :
            // var_dump($this->db->errorInfo());    
            var_dump(self::$dbInstance->errorInfo());    
            return false;  
        else :
            return true;
        endif;
    }

    
}
<?php

class Topic{
    public static $dbInstance;
    private $tutor_id;
    private $firstname;
    private $lastname;
    private $email;
    private $mobile;
    private $password;
    private $password_salt;
    private $course_id;

    function __construct($conn)
    {
        
    }

    public function addTopic($record, $conn){
        self::$dbInstance = $conn;
        $query = "insert into topics";
        $query .= "(title, description, course_id, tutor_id) ";
        $query .= "VALUES('{$record['title']}', '{$record['description']}', ";
        $query .= "'6', '2');";

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
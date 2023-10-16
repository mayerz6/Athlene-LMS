<?php

class Course{

    private static $dbInstance;
    private $course_id;
    private $title;
    private $description;
    private $start_date;
    private $end_date;
    private $tutor_id;

    function __construct($conn)
    {
        if(isset($conn)):
        self::$dbInstance = $conn;
        endif;
    }

    public function fetchCourseRecords(){
        $query = "select * from courses";
        $records = self::$dbInstance->query($query);
        if($records === false) :
            var_dump(self::$dbInstance->errorInfo());
                return false;
        else :
            $tutors = $records->fetchAll(PDO::FETCH_ASSOC);
                return $tutors;
        endif;
    }

    public function addCourse($record){
        $query = "insert into courses";
        $query .= "(title, description, tutor_id) ";
        $query .= "VALUES('{$record['title']}', '{$record['description']}', ";
        $query .= "'{$record['tutor_id']}');";

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
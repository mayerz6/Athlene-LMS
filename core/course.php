<?php

class Course{

    private static $dbInstance;
    public $course_id;
    public $title;
    public $description;
    public $start_date;
    public $end_date;
    public $tutor_id;

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

    public function fetchCourseRecordsById($id){
    /* Traditional engagement with DB via FETCH_ASSOC functionality */
        $query = "select * from courses
                    where course_id = " . $id;
        $records = self::$dbInstance->query($query);
       
        if($records === false) :
            var_dump(self::$dbInstance->errorInfo());
            return false;
        else:
            return $records->fetchAll(PDO::FETCH_ASSOC);
        endif;
    }

    static protected function objectInstantiate($record){
        $object = new self;
        foreach($record as $property => $value){
            if(property_exists($object, $property)){
                $object->$property = $value;
            }
        }
        return $object;
    }

    public function fetchCourseRecordById($id){
        $query = "SELECT * FROM courses WHERE course_id = :id";
        $stmt = self::$dbInstance->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
       // $stmt->setFetchMode(PDO::FETCH_CLASS, 'Course');
        
        // Specify the class for FETCH_CLASS
        try {
            if ($stmt->execute()) {
                // Fetch the result into the 'Course' class
               // return $stmt->fetchAll(PDO::FETCH_ASSOC);
               while($record = $stmt->fetch()){
                    $object_array[] = self::objectInstantiate($record);
               }
               $stmt->free();
               return $object_array;
                /* Conversion from ASSOCIATIVE ARRAY to OBJECT containing table
                records */
            }
        } catch (PDOException $e) {
            // Handle any exceptions
            echo $e->getMessage();
        }
        
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
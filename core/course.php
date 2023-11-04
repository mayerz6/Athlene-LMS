<?php

class Course{

    private static $dbInstance;
    private static $db_columns = ['course_id', 'title', 'description', 'start_date', 'end_date', 'tutor_id'];
    public $course_id;
    public $title;
    public $description;
    public $start_date;
    public $end_date;
    public $tutor_id;

    function __construct($args=[])
    {
     $this->title = $args['title'] ?? '';
     $this->description = $args['description'] ?? '';
     $this->start_date = $args['start_date'] ?? '';
     $this->end_date = $args['end_date'] ?? '';
     $this->tutor_id = $args['tutor_id'] ?? '';
     self::$dbInstance = $args['dbConnect'] ?? '';

    }

    public function fetchCourseRecords($conn){
        self::$dbInstance = $conn;
        $query = "select * from courses limit 5";
        $records = self::$dbInstance->query($query);
        if($records === false) :
            var_dump(self::$dbInstance->errorInfo());
                return false;
        else :
            $tutors = $records->fetchAll(PDO::FETCH_ASSOC);
                return $tutors;
        endif;
    }

    public static function lastId(){
        $query = "SELECT course_id FROM courses ORDER BY course_id DESC LIMIT 1";
        $records = self::$dbInstance->query($query);
        if($records === false) :
            var_dump(self::$dbInstance->errorInfo());
            return false;
        else :
            $id = $records->fetchAll(PDO::FETCH_ASSOC);
            return $id[0]['course_id'];
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

    public function fetchCourseRecordById($id, $conn){
        self::$dbInstance = $conn;
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
             //while($record = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    $object_array[] = self::objectInstantiate($record);
               }
              // $stmt->free();
               return $object_array;
                /* Conversion from ASSOCIATIVE ARRAY to OBJECT containing table
                records */
            }
        } catch (PDOException $e) {
            // Handle any exceptions
            echo $e->getMessage();
        }
        
    }

    public function addCourse(){

        $query = "insert into courses";
        $query .= "(title, description, tutor_id) ";
        $query .= "VALUES('{$this->title}', '{$this->description}', ";
        $query .= "'{$this->tutor_id}');";

        // $exec = $conn->query($query);
        if(self::$dbInstance->query($query) === false) :
            // var_dump($this->db->errorInfo());    
            var_dump(self::$dbInstance->errorInfo());    
            return false;  
        else :
            // return true;
            return self::lastId();
        endif;
    }


}
<?php

class Student{

    function __construct()
    {
        
    }

    
    public function fetchStudentRecords(){
        $query = "select * from students";
        // $records = $this->db->query($query);
        $records = self::$dbInstance->query($query);
        if($records === false) :
            // var_dump($this->db->errorInfo());    
            var_dump(self::$dbInstance->errorInfo());    
            return false;  
        else :
            $students = $records->fetchAll(PDO::FETCH_ASSOC);
            return $students;
        endif;

    }

    public function fetchStudentRecord($id, $column){

        $query = "select $column from students where student_id = :id";
        $stmt = self::$dbInstance->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function addStudent($record){
        $query = "insert into students";
        $query .= "(firstname, lastname, email) ";
        $query .= "VALUES('{$record['firstname']}', '{$record['lastname']}', ";
        $query .= "'{$record['email']}');";

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
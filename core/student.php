<?php
// require_once("./core/db.php");

class Student{

    private static $dbInstance;
    public $student_id;
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $password;
    public $pwd_salt;
    public $enrollment_date;
    public $subject;

    function __construct($args=[])
    {
        $this->student_id = $args['student_id'] ?? '';
        $this->firstname = $args['firstname'] ?? '';
        $this->lastname = $args['lastname'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->mobile = $args['mobile'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->pwd_salt = $args['pwd_salt'] ?? '';
        $this->enrollment_date = $args['enrollment_date'] ?? '';
        $this->subject = $args['subject'] ?? '';
        self::$dbInstance = $args['dbConnect'] ?? '';
        // if(isset($conn)):
        // self::$dbInstance = $conn;
        // endif;
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

    
    public function fetchStudentRecords(){
       // self::$dbInstance = $conn;
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

    public function fetchStudentRecordById($id, $conn){
        $query = "SELECT * from students where student_id = :id";
        $stmt = self::$dbInstance->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        try{
            if($stmt->execute()){
                while($record = $stmt->fetch()){
                    $object_array[] = self::objectInstantiate($record);
                }
                return $object_array;
            }
        } catch(PDOException $e){
            echo $e->getMessage();
        }
      
    }

    public function addStudent($record, $conn){
        $query = "insert into students";
        $query .= "(firstname, lastname, email, mobile, subject) ";
        $query .= "VALUES('{$record['firstname']}', '{$record['lastname']}', ";
        $query .= "'{$record['email']}', '{$record['mobile']}', '{$record['subject']}');";

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
<?php
// require_once("./core/db.php");

class Student{

    private static $dbInstance;
    public $student_id;
    public $firstname;
    public $lastname;
    public $subject;
    public $email;
    public $mobile;
    public $password;
    public $pwd_salt;
    public $enrollment_date;

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

    public static function lastId(){
        $query = "SELECT student_id FROM students ORDER BY student_id DESC LIMIT 1";
        $records = self::$dbInstance->query($query);
        if($records === false) :
            var_dump(self::$dbInstance->errorInfo());
            return false;
        else :
            $id = $records->fetchAll(PDO::FETCH_ASSOC);
            return $id[0]['student_id'];
        endif;

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

    public function fetchStudentRecordById($id){
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

    public function addStudent(){
        $query = "insert into students";
        $query .= "(firstname, lastname, email, mobile, subject) ";
        $query .= "VALUES('{$this->firstname}', '{$this->lastname}', ";
        $query .= "'{$this->email}', '{$this->mobile}', '{$this->subject}');";

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
<?php

class Tutor{

    private static $dbInstance;
    private $tutor_id;
    private $firstname;
    private $lastname;
    private $email;
    private $mobile;
    private $password;
    private $pwd_salt;

    public function __construct($args=[])
    {   
        $this->tutor_id = $args['tutor_id'] ?? '';
        $this->firstname = $args['firstname'] ?? '';
        $this->lastname = $args['lastname'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->mobile = $args['mobile'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->pwd_salt = $args['pwd_salt'] ?? '';
        self::$dbInstance = $args['dbConnect'] ?? '';
        // if(isset($conn)):
        // self::$dbInstance = $conn;
        // endif;
    }

    public function __set($name, $value) { $this->$name = $value; }

    public function __get($name) { return $this->$name; }

    public function __destruct()
    {
       // var_dump('Destroying instance of ' . get_class());
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

    public function fetchTutorRecordById($id){
        $query = "SELECT * from tutors where tutor_id = :id";
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

    public static function getTutorIdByName($name){
       // self::$dbInstance = $conn;
        $query = "SELECT tutor_id FROM tutors WHERE firstname like CONCAT( '%',:name,'%')";
        $stmt = self::$dbInstance->prepare($query);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
      //  $stmt->execute();
       // return $stmt->fetch();
        try{
            if($stmt->execute()){
                 while($record = $stmt->fetch()){
                    $object_array[] = self::objectInstantiate($record);
                    //return "Successful Query";
                     return $object_array;
                 }
            }
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function addTutor(){
        //self::$dbInstance = $conn;
        $query = "insert into tutors";
        $query .= "(firstname, lastname, email, mobile) ";
        $query .= "VALUES('{$this->firstname}', '{$this->lastname}', ";
        $query .= "'{$this->email}', '{$this->mobile}');";

        // $exec = $conn->query($query);
        if(self::$dbInstance->query($query) === false) :
            // var_dump($this->db->errorInfo());    
            var_dump(self::$dbInstance->errorInfo());    
            return false;  
        else :
            return self::lastId();
        endif;
    }

    public static function lastId(){
        $query = "SELECT tutor_id FROM tutors ORDER BY tutor_id DESC LIMIT 1";
        $records = self::$dbInstance->query($query);
        if($records === false) :
            var_dump(self::$dbInstance->errorInfo());
            return false;
        else :
            $id = $records->fetchAll(PDO::FETCH_ASSOC);
            return $id[0]['tutor_id'];
        endif;

    }

    
}
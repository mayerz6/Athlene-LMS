<?php include("./core/db.php"); ?>
<?php include("./core/student.php"); ?>
<?php require_once("./regions/header.php"); ?>

<?php

if(isset($_POST['submit'])) :
    // Must TEST for empty FORM fields via 
     extract($_POST);
    
     $conn = new DBConnect($config);
     
     $record['firstname'] = $firstname;
     $record['lastname'] = $lastname;
     $record['email'] = $email;
     $record['mobile'] = $mobile;
     $record['subject'] = $courseId;
     $record['enrollment_date'] = $date ?? date("m/d/Y");
     $record['dbConnect'] = $conn->dbInstance;

     $student = new Student($record);
     /* CourseID ==> Tutelage Subject Name */
        // var_dump($record);
    
    $res = $student->addStudent();
      // echo $student->addStudent($record) ? "Record successfully stored within the database" : "Failed to load record into database";
      if($res) :
            header("Location: ./view-student.php?id=" . $res );
      else:
        echo $res;
      endif;
  
else: 
    echo "**** Please ensure ALL required fields have been provided ****";
endif;  

?>


<section>
    <div id="screen">
         <h1>Athlene Academics LMS | Add Student Records</h1>
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset>
                <legend>Enter requisite student information below</legend>
                <br>
            <label for="firstname">Student Firstname</label><br>
            <input type="text" name="firstname" id="firstname" /><br>
            <label for="lastname">Student Surname</label><br>
            <input type="text" name="lastname" id="lastname" /><br>
            <label for="email">Primary Email Address</label><br>
            <input type="email" name="email" id="email" /><br>
            <label for="mobile">Primary Mobile Number</label><br>
            <input type="tel" name="mobile" id="mobile" /><br>
            <label for="date">Enrollment Date</label><br>
            <input type="date" name="date" id="date" /><br><br>
            <label for="courseId">Lessons Subject</label><br><br>
            <select id="tCourse" name="courseId" id="courseId">
                <option value="maths">Mathematics</option>
                <option value="english-lit">English Literature</option>
                <option value="english-lan">English Language</option>
                <option value="it">Information Technology</option>
            </select>
            <br><br>
            <input type="submit" name="submit" value="register" />
            </fieldset>
        </form> 
    </div>
</section>



<?php require_once("./regions/footer.php"); ?>
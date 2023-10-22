<?php include("./core/db.php"); ?>
<?php include("./core/student.php"); ?>
<?php require_once("./regions/header.php"); ?>

<?php

if(isset($_POST['submit'])) :
    // var_dump($_POST);
     extract($_POST);
    
        $conn = new DBConnect($config);
        $topic = new Student($conn->dbInstance);

        $record['firstname'] = $firstname;
        $record['lastname'] = $lastname;
        $record['email'] = $email;
        $record['mobile'] = $mobile;
        $record['subject'] = $courseId;
        /* CourseID ==> Tutelage Subject Name */
       // var_dump($record);

        if($topic->addStudent($record)) :
            echo "Record successfully stored within the database";
        else:
            echo "Failed to load record into database";
        endif;

endif;  

?>


<section>
    <div id="screen">
         <h1>Athlene Academics LMS | Add Student Records</h1>
        <?php //print_r($_SERVER); ?>
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
            <input type="tel" name="mobile" /><br>
            <label for="courseId">Lessons Subject</label><br>
            <select id="tCourse" name="courseId">
                <option value="maths">Mathematics</option>
                <option value="english-lit">English Literature</option>
                <option value="english-lan">English Language</option>
                <option value="it">Information Technology</option>
            </select>

            <input type="submit" name="submit" value="register" />
            </fieldset>
        </form> 
    </div>
</section>



<?php require_once("./regions/footer.php"); ?>
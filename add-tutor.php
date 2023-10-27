<?php include("./core/db.php"); ?>
<?php include("./core/tutor.php"); ?>
<?php require_once("./regions/header.php"); ?>

<?php

    if(isset($_POST['submit'])) :
        extract($_POST);
        $conn = new DBConnect($config);
        
        $record['firstname'] = $firstname;
        $record['lastname'] = $lastname;
        $record['email'] = $email;
        $record['mobile'] = $mobile;
        $record['dbConnect'] = $conn->dbInstance;
        var_dump($record);
        
        $tutor = new Tutor($record);
      // echo $stud->addTutor($conn->dbInstance) ? "Recorded stored within the database" : "Failed to input record data";
       if($tutor->addTutor()) :
        $_SESSION['tutor_id'] =  $tutor->addTutor();

        header('Location: ./view-tutor.php?id=/' . $_SESSION['tutor_id']);
       endif;
        // if($stud->addTutor($record, $conn->dbInstance)) :
        //     echo "Recorded stored within the database";
        // else :
        //     echo "Failed to input record data";
        // endif;
    endif;
?>  



<section>
    <div id="screen">
    <h1>Athlene Academics LMS | Tutor Registration | Managing Your Students Now!</h1>

        <form action="add-tutor.php" method="post">
            <fieldset>
                <legend>Enter requisite tutor information below</legend>
                <br>
            <label for="firstname">First Name</label><br>
            <input type="text" name="firstname" required /><br>
            <label for="lastname">Last Name</label><br>
            <input type="text" name="lastname" required /><br>
            <label for="email">Email Address</label><br>
            <input type="text" name="email" required /><br><br>
            <label for="mobile">Mobile Number</label><br>
            <input type="number" name="mobile" id="mobile" /><br><br>
            <label for="day">Start Date</label><br>
            <input type="text" name="day" id="day" placeholder="day" required /> 
            <input type="text" month="month" placeholder="month" required /> 
            <input type="text" month="year" placeholder="year" required /> <br>
            </label><br><label for="courseId">Subject being Taught</label><br><br>
            <select id="tCourse" name="courseId" id="courseId">
                <option value="maths">Mathematics</option>
                <option value="english-lit">English Literature</option>
                <option value="english-lan">English Language</option>
                <option value="it">Information Technology</option>
            </select>
            <br><br>
            <input type="submit" name="submit" value="register" required />
            </fieldset>
        </form> 
    </div>
</section>


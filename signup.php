<?php include("./core/db.php"); ?>
<?php include("./core/student.php"); ?>
<?php $title = "Account Registration | Learning At Your Pace"; ?>

<?php require_once("./regions/header.php"); ?>

<?php
    if(isset($_POST['submit'])) :
        extract($_POST);
            $conn = new DBConnect($config);
            $stud = new Student($conn->dbInstance);
            
            $record['firstname'] = $firstname;
            $record['lastname'] = $lastname;
            $record['email'] = $email;
           

            if($stud->addStudent($record)) :
                echo "Recorded stored within the database";
            else :
                echo "Failed to input record data";
            endif;
    endif;
 ?>
<section>
    <div id="screen">
        <h1>Athlene Academics LMS | Student Registration | Start Developing Now!</h1>
        <form action="signup.php" method="post">
            <fieldset>
                <legend><small>Enter requisite information below</small></legend>
            <label for="firstname">First Name</label><br>
            <input type="text" name="firstname" id="firstname" /><br>
            <label for="lastname">Last Name</label><br>
            <input type="text" name="lastname" id="lastname" /><br>
            <label for="email">Email Address</label><br>
            <input type="text" name="email" id="email" /><br><br>
            <label for="mobile">Contact Number</label><br>
            <input type="text" name="mobile" id="mobile" /><br><br>

            <input type="submit" name="submit" value="register" />
            </fieldset>
        </form> 
    </div>
</section>

<?php require_once("./regions/footer.php"); ?>
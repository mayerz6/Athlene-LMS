<?php include("./core/db.php"); ?>
<?php include("./core/tutor.php"); ?>
<?php require_once("./regions/header.php"); ?>

<?php

    if(isset($_POST['submit'])) :
        extract($_POST);
        $conn = new DBConnect($config);
        $stud = new Tutor($conn->dbInstance);

        $record['firstname'] = $firstname;
        $record['lastname'] = $lastname;
        $record['email'] = $email;
        $record['mobile'] = $mobile;
       
        if($stud->addTutor($record)) :
            echo "Recorded stored within the database";
        else :
            echo "Failed to input record data";
        endif;
    endif;
?>  



<section>
    <div id="screen">
    <h1>Athlene Academics LMS | Tutor Registration | Managing Your Students Now!</h1>
<<<<<<< HEAD
        <?php //print_r($_SERVER); ?>
        <form action="add-tutor.php" method="post">
=======
        <form action="add-tutor.php" method="post">
            <fieldset>
                <legend>Enter requisite tutor information below</legend>
                <br>
>>>>>>> dev-student-page
            <label for="firstname">First Name</label><br>
            <input type="text" name="firstname" /><br>
            <label for="lastname">Last Name</label><br>
            <input type="text" name="lastname" /><br>
            <label for="email">Email Address</label><br>
            <input type="text" name="email" /><br><br>
            <label for="mobile">Mobile Number</label><br>
            <input type="text" name="mobile" /><br><br>
            <input type="submit" name="submit" value="register" />
<<<<<<< HEAD
=======
            </fieldset>
>>>>>>> dev-student-page
        </form> 
    </div>
</section>



<?php require_once("./regions/footer.php"); ?>
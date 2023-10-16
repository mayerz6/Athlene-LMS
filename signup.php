<?php require_once("./regions/header.php"); ?>
<?php require_once("./core/db.php"); ?>

<?php
    if(isset($_POST['submit'])) :
        extract($_POST);
            $db1 = new DBConnect($config);
            // $conn = $db1->getInstance($config);
           // echo $firstname . " " . $lastname . " : " . $email;
            $record['firstname'] = $firstname;
            $record['lastname'] = $lastname;
            $record['email'] = $email;
           

            if($db1->addStudent($record)) :
                echo "Recorded stored within the database";
            else :
                echo "Failed to input record data";
            endif;
    endif;
 ?>
<section>
    <div id="screen">
        <h1>Athlene Academics LMS | Account Registration | Start Developing Now!</h1>
        <?php //print_r($_SERVER); ?>
        <form action="signup.php" method="post">
            <label for="firstname">First Name</label><br>
            <input type="text" name="firstname" /><br>
            <label for="lastname">Last Name</label><br>
            <input type="text" name="lastname" /><br>
            <label for="email">Email Address</label><br>
            <input type="text" name="email" /><br><br>
            <input type="submit" name="submit" value="register" />
            <!-- <button><a href="tel:12462319428">Create Account</a></button> -->
        </form> 
    </div>
</section>

<?php require_once("./regions/footer.php"); ?>
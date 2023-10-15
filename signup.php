<?php require_once("./regions/header.php"); ?>
<?php require_once("./core/db.php"); ?>

<?php
    if(isset($_POST['submit'])) :
        extract($_POST);
        echo $firstname . " " . $lastname . " : " . $email;
    endif;
 ?>
<section>
    <div id="screen">
        <h1>Athlene Academics LMS | Account Registration | Start Developing Now!</h1>
        <?php //print_r($_SERVER); ?>
        <form action="signup.php" method="post">
            <input type="text" name="firstname" />
            <input type="text" name="lastname" />
            <input type="text" name="email" />
            <input type="submit" name="submit" value="register" />
            <!-- <button><a href="tel:12462319428">Create Account</a></button> -->
        </form> 
    </div>
</section>

<?php require_once("./regions/footer.php"); ?>
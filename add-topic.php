<?php include("./core/db.php"); ?>
<?php include("./core/topic.php"); ?>
<?php require_once("./regions/header.php"); ?>

<?php

if(isset($_POST['submit'])) :
    // var_dump($_POST);
     extract($_POST);
    
        $conn = new DBConnect($config);
        $topic = new Topic($conn->dbInstance);

        $record['title'] = $title;
        $record['description'] = $description;
        $record['courseId'] = $courseId;

       // var_dump($record);

        if($topic->addTopic($record)) :
            echo "Record successfully stored within the database";
        else:
            echo "Failed to load record into database";
        endif;

endif;  

?>


<section>
    <div id="screen">
         <h1>Athlene Academics LMS | Add Course Topic</h1>
        <?php //print_r($_SERVER); ?>
<<<<<<< HEAD
        <form action="add-topic.php" method="post">
=======
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset>
                \<legend>Enter requisite Course information below</legend>
>>>>>>> dev-student-page
            <label for="title">Topic Name</label><br>
            <input type="text" name="title" /><br>
            <label for="description">Topic Description</label><br>
            <input type="text" name="description" /><br>
            <label for="courseId">Topic Course</label><br>
            <select id="tCourse" name="courseId">
                <option value="trig">Trigonometry</option>
                <option value="ca">Consumer Arithmetic</option>
                <option value="stats">Statistics</option>
                <option value="algebra">Algebra</option>
            </select>

            <input type="submit" name="submit" value="register" />
<<<<<<< HEAD
            <!-- <button><a href="tel:12462319428">Create Account</a></button> -->
=======
            </fieldset>
>>>>>>> dev-student-page
        </form> 
    </div>
</section>



<?php require_once("./regions/footer.php"); ?>
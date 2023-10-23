<?php include("./core/db.php"); ?>
<?php include("./core/course.php"); ?>
<?php require_once("./regions/header.php"); ?>

<section>
    <div id="screen">
    <h1>Athlene Academics LMS | Tutor Registration | Managing Your Students Now!</h1>



<?php

if(isset($_GET['id'])):
    extract($_GET);
    
    $conn = new DBConnect($config);
    $course = new Course($conn->dbInstance);

        $record = $course->fetchCourseRecordById($id); 
        if($record):
            echo var_dump($record);
             ?>
             <br>
             <br>
             <br>
            <span><?php echo $record[0]["start_date"]; ?></span>
            <span> : </span>
            <span><?php echo $record[0]["title"]; ?></span>
            <p><?php echo $record[0]["description"]; ?></p>
            <!-- <pre>
                <?php // var_dump($record); ?>
            </pre> -->
    <?php
        endif;
endif;
?>
    </div>
</section>


<?php require_once("./regions/footer.php"); ?>

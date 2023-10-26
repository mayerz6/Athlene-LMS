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
    $course = new Course();

        $records = $course->fetchCourseRecordById($id, $conn->dbInstance); 
        if($records):
            print_r($records);
             ?>
             <br>
             <br>
             <br>
             <?php foreach($records as $record) : ?>
            <span><?php echo $record->start_date; ?></span>
            <span> : </span>
            <span><?php echo $record->title; ?></span>
            <p><?php echo $record->description; ?></p>
               <?php endforeach; 
        endif;
endif;
?>
    </div>
</section>


<?php require_once("./regions/footer.php"); ?>

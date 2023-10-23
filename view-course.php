<?php include("./core/db.php"); ?>
<?php include("./core/course.php"); ?>
<?php require_once("./regions/header.php"); ?>


<?php

if(isset($_GET['id'])):
    extract($_GET);
    
    $conn = new DBConnect($config);
    $course = new Course($conn->dbInstance);

        $record = $course->fetchCourseRecordById($id); 
        if($record):
            echo $record->title;
        endif;
        // var_dump($record);

endif;
?>

<pre>
    <?php print_r($record); ?>
</pre>

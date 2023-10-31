<?php include("./core/db.php"); ?>
<?php include("./core/student.php"); ?>
<?php require_once("./regions/header.php"); ?>

<section>
    <div id="screen">
    <h1>Athlene Academics LMS | Tutor Registration | Managing Your Students Now!</h1>



<?php

if(isset($_GET['id'])):
   extract($_GET);
    
    $conn = new DBConnect($config);
    $record['dbConnect'] = $conn->dbInstance;
    
    $student = new Student($record);

        $records = $student->fetchStudentRecordById($id); 
        if($records):
            print_r($records);
             ?>
             <br>
             <br>
             <br>
             <?php foreach($records as $record) : ?>
            <span><?php echo $record->firstname; ?></span>
            <span> : </span>
            <span><?php echo $record->lastname; ?></span>
            <p><?php echo $record->enrollment_date; ?></p>
               <?php endforeach; 
        endif;
endif;
?>
    </div>
</section>


<?php require_once("./regions/footer.php"); ?>

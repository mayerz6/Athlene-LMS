<?php include("./core/db.php"); ?>
<?php include("./core/tutor.php"); ?>
<?php require_once("./regions/header.php"); ?>

<section>
    <div id="screen">
    <h1>Athlene Academics LMS | Tutor Registration | Managing Your Tutors Now!</h1>



<?php

if($_SESSION(['tutor_id'])):
   // extract($_GET);
    
    $conn = new DBConnect($config);
    $record['dbConnect'] = $conn->dbInstance;
    $tutor = new Tutor($record);

        $records = $tutor->fetchTutorRecordById($_SESSION['tutor_id']); 
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
            <p><?php echo $record->mobile; ?></p>
               <?php endforeach; 
        endif;
endif;
?>
    </div>
</section>


<?php require_once("./regions/footer.php"); ?>

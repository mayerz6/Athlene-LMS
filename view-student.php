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

        $records = $student->fetchStudentRecordById((int) $_GET['id']); 
        if($records):
          //  print_r($records);
             ?>
             <br>
             <h2>Athlene Academics Student Profile</h2>
             <?php foreach($records as $record) : ?>
            <span><?php echo $record->firstname; ?></span>
            <span><?php echo $record->lastname; ?></span><br>
            <span>Contact Info: Email: <?php echo $record->email; ?> | Mobile: <?php echo $record->mobile; ?>  </span>
            <p><?php echo $record->enrollment_date; ?></p>
               <?php endforeach; 
        endif;
endif;
?>
    </div>
</section>


<?php require_once("./regions/footer.php"); ?>

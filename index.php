
<?php require_once("./regions/header.php"); ?>
<?php require_once("./core/db.php"); ?>

<section>
    <div id="screen">
    <?php      
        $db1 = new DBConnect;
        $conn = $db1->getInstance($config);
        ?>
            <h1>Athlene Academics LMS | Customized Learning For You!</h1>
        <form><button><a href="tel:12462319428">Enrol Now!</a></button></form> 
    </div>
</section>

    <?php $students = $db1->fetchStudentRecords($conn); ?>
    <?php foreach($students as $student) : ?>
       <div class="student-block">
           <span><?= $student['firstname']; ?></span>
           <span><?= $student['lastname']; ?></span>
       </div> 

<?php endforeach;?>
<?php require_once("./regions/footer.php"); ?>
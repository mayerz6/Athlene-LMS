<?php include("./core/db.php"); ?>
<?php include("./core/tutor.php"); ?>
<?php include("./core/course.php"); ?>
<?php require_once("./regions/header.php"); ?>

<section>
    <div id="screen">
    <?php      
        $conn = new DBConnect($config);
        $courseObject = new Course();
        $tutorObject = new Tutor();
    ?>
            <h1>Athlene Academics LMS | Customized Learning For You!</h1>
        <form><button><a href="tel:12462319428">Enrol Now!</a></button></form> 
    </div>
</section>

    <h4>Available Courses</h4> 
    <?php $courses = $courseObject->fetchCourseRecords($conn->dbInstance); ?>
    <?php foreach($courses as $course) : ?>
       <div class="course-listings">
           <span><?php echo $course['title']; ?></span>
           <span> - </span>
           <span><?php $course['start_date']; ?></span>
       </div> 
    <?php endforeach; ?>
       
       <h4>Available Tutors</h4>
    <?php $tutors = $tutorObject->fetchTutorRecords($conn->dbInstance); ?>
    <?php foreach($tutors as $tutor) : ?>
       <div class="course-listings">
           <span><?= $tutor['firstname']; ?></span>
           <span><?= $tutor['lastname']; ?></span>
       </div> 
    <?php endforeach; ?>

<?php require_once("./regions/footer.php"); ?>
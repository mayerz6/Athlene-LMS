<?php include("./core/db.php"); ?>
<?php include("./core/course.php"); ?>
<?php include("./core/tutor.php"); ?>
<?php require_once("./regions/header.php"); ?>

<?php

    if(isset($_POST['submit'])):
        
        extract($_POST);
        $conn = new DBConnect($config);
        
        $record['title'] = $course_title;
        $record['description'] = $course_description;
        $record['start_date'] = $start_date;
        $record['end_date'] = $end_date;
        $record['tutor_id'] = $tutorName;
        $record['dbConnect'] = $conn->dbInstance;
        
        $course = new Course($record);
        $res = $course->addCourse();

        if($course->addCourse()) :
     
             header('Location: ./view-course.php?id=' . $res);
        endif;

    endif;

?>

<section>
    <div id="screen">
        <h1>Athlene Academics LMS | Add Course Info</h1>
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset>
                <legend>Enter requisite student information below</legend>
                <br>
                <label for="course_title">Course Name</label><br>
            <input type="text" name="course_title" id="course_title" required /><br>
            <label for="course_code">Course Code</label><br>
            <input type="text" name="lastname" id="course_code" required /><br>
            <label for="course_description">Course Description/Overview</label><br>
            <textarea name="course_description" id="course_description" rows="4" cols="50"></textarea><br><br>
            <label for="course_tutor">Assigned Tutor</label><br>
            <select id="tutorName" name="tutorName" id="tutorName">
                <option value="unassigned">Select Tutor</option>
                <option value="maths">Larry Mayers</option>
                <option value="english-lit">Nicole Corbin</option>
                <option value="english-lan">Charles Barkley</option>
                <option value="it">Ryan Reynolds</option>
            </select>
            <br><br>
            <label for="start_time">Date Officially Offered</label><br>
            <input type="datetime" name="start_date" id="start_date" /><br>
            <label for="start_time">Date Officially Closed</label><br>
            <input type="datetime" name="end_date" id="end_date" /><br>
            <br><br>
            <input type="submit" name="submit" value="register" />
            </fieldset>
        </form>
    </div>
</section>



<?php require_once("./regions/footer.php");
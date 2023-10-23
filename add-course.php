<?php include("./core/db.php"); ?>
<?php include("./core/course.php"); ?>
<?php require_once("./regions/header.php"); ?>

<?php

    if(isset($_POST['submit'])):
        //extract($_POST);

        var_dump($_POST);

    endif;

?>

<section>
    <div id="screen">
        <h1>Athlene Academics LMS | Add Course Info</h1>
        <form>
            <fieldset>
                <legend>Enter requisite student information below</legend>
                <br>
                <label for="course_title">Course Name</label><br>
            <input type="text" name="course_title" id="course_title" required /><br>
            <label for="course_code">Course Code</label><br>
            <input type="text" name="lastname" id="course_code" required /><br>
            <label for="course_description">Course Description/Overview</label><br>
            <input type="textarea" name="course_description" id="course_description" /><br>
            <label for="course_tutor">Assigned Tutor</label><br><br>
            <select id="tCourse" name="courseId" id="courseId">
                <option value="maths">Larry Mayers</option>
                <option value="english-lit">Nicole Corbin</option>
                <option value="english-lan">Charles Barkley</option>
                <option value="it">Ryan Reynolds</option>
            </select>
            <br><br>
            <label for="start_time">Date Officially Offered</label><br>
            <input type="datetime" name="start_time" id="start_time" /><br>
            
            <input type="submit" name="submit" value="register" />
            </fieldset>
        </form>
    </div>
</section>



<?php require_once("./regions/footer.php");
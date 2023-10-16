<?php include("./core/student.php"); ?>
        <?php include("./regions/header.php"); ?>

            <?php $stud = new Student($config); ?>
            <?php if(isset($_SESSION['id'])) :  ?>
            <?php $student = $stud->fetchStudentRecord($_SESSION['id'], "firstname"); ?>
            <?php else :?>
            <?php $student = null; ?>
            <?php endif; ?>
            <section>
                <div id="screen">
                    <h1>Athlene Academics - Student Management Dashboard</h1>
                    <?php htmlspecialchars($student['firstname']); ?>

                <small>Please review your students progress below.</small>
            </div>
            </section>

            <?php include("./regions/footer.php"); ?>
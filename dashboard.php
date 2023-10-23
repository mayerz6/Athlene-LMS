<<<<<<< HEAD
=======
<?php include("./core/student.php"); ?>
>>>>>>> main
        <?php include("./regions/header.php"); ?>
        <?php include("./core/db.php"); ?>

<<<<<<< HEAD
            <?php $db = new DBConnect($config); ?>
            <?php if(isset($_SESSION['id'])) :  ?>
            <?php $student = $db->fetchStudentRecord($conn, $_SESSION['id'], "firstname"); ?>
=======
            <?php $stud = new Student($config); ?>
            <?php if(isset($_SESSION['id'])) :  ?>
            <?php $student = $stud->fetchStudentRecord($_SESSION['id'], "firstname"); ?>
>>>>>>> main
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
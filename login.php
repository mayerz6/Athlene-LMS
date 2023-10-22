<?php require_once("./regions/header.php"); ?>
<?php require_once("./core/db.php"); ?>

<?php 

    if(isset($_POST['submit'])):
        var_dump($_POST);
        echo "<br />";
        echo $_SERVER['PHP_SELF'];
        echo "<br />";
        echo $_POST['username'];
        echo "<br />";
        echo $_POST['password'];
        header("location: dashboard.php");
    endif;
?>

<section>
    <div id="screen">
        <h1>Athlene Academics - Account Login Portal</h1>
            <h4>Secure Authorized Access ONLY</h4>
            <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
                <fieldset>
                    <legend><small>Log in to view your custom learning resources!</small></legend>
                    <br>
                    <label for="username">Enter your account username</label><br>
                    <input type="username" name="username" placeholder="Account Username" /><br><br>
                   <label for="password">Enter your secure password:</label><br>
                   <input type="password" name="password" placeholder="Account Password" /><br>
                    <hr>
                   <input type="submit" name="submit" />
                   <!-- <input type="" name="reset" /> -->
                </fieldset>
            </form>
    </div>
</section>

<?php require_once("./regions/footer.php"); ?>
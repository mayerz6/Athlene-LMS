<?php require_once("./core/db.php"); ?>
<?php require_once("./core/auth.php"); ?>
<?php require_once("./regions/header.php"); ?>


<?php 

 
    if(isset($_POST['submit'])):
        extract($_POST);
    
        $auth = new Auth();

        $record['username'] = $username;
        $record['password'] = $password;
   
    endif;
?>

<section>
    <div id="screen">
        <h1>Athlene Academics - Account Login Portal</h1>
            <h4>Secure Authorized Access ONLY</h4>
            <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
                <fieldset>
                    <legend><small>Log in to view your custom learning resources!</small></legend>
                    <label for="username">Enter your account username:</label><br>
                    <input type="username" name="username" id="username" placeholder="Account Username" required /><br><br>
                   <label for="password">Enter your secure password:</label><br>    
                   <input type="password" name="password" id="password" placeholder="Account Password" required /><br><br>
                    <hr />
                   <input type="submit" name="submit" />
                   <!-- <input type="" name="reset" /> -->
                </fieldset>
            </form>
    </div>
</section>

<?php require_once("./regions/footer.php"); ?>
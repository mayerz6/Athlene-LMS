<?php

    $nav_links = [
        'homepage' => '../index.php',
        'about' => '../about.php',
        'contact' => '../contact.php',
        'services' => '../services.php',
        'resources' => '../resources.php',
        'account' => '../login.php',
        'registration' => '../signup.php',
        'booklist' => '../booklist.php',
        'lms' => '../lms.php',
    ];


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <title>Athlene Academics Learning Management System</title>
                <link rel="stylesheet" href="../css/styles.css" type="text/css">
                    </head>
    <body>
    <div id="mainPan">
        <div id="leftPan">
            <header>
                <nav>
                    <ul class="one">
                        <li><a href="<?= $nav_links["homepage"] ?>">Home</a></li>
                        <!-- <li><a href="<?= $nav_links["about"] ?>">About Us</a></li> -->
                        <li><a href="<?= $nav_links["contact"] ?>">Contact Us</a></li>
                        <!-- <li><a href="<?= $nav_links["services"] ?>">Our Services</a></li> -->
                        <!-- <li><a href="<?= $nav_links["resources"] ?>">Resources</a></li> -->
                        <!-- <li><a href="<?= $nav_links["lms"] ?>">LMS</a></li> -->
                        <li><a href="<?= $nav_links["account"] ?>">Account</a></li>
                        <li><a href="<?= $nav_links["registration"] ?>">Join</a></li>
                    </ul>
                    <div id="fastformPan">
                        <!-- <form action="#" method="get" class="formone">
                            <h2>search</h2>
                            <select name="category" id="category">
                            <option>CATAGORY</option>
                            </select>
                            <select name="author" id="author">
                            <option>AUTHOR</option>
                            </select>
                            <label>English</label>
                            <input name="search" type="radio" class="check" value="search" />
                            <label>French</label>
                            <input name="search" type="radio" class="check" value="French" />
                            <div id="submitPan">
                            <input type="submit" class="input" value="SEARCH" />
                            </div>
                        </form> -->
                    </div>
                </nav>
            </header>
        </div>
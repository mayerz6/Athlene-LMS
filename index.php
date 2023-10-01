<?php

    $nav_links = [
        'homepage' => '/',
        'about' => '/about',
        'contact' => '/contact',
        'services' => '/services',
        'resources' => '/resources',
        'account' => '/acount-login',
        'booklist' => '/booklist',
        'lms' => '/lms',
    ];


?>

<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Athlene Academics Learning Management System</title>
            <link rel="stylesheet" href="./css/styles.css" type="text/css">
                    </head>
    <body>
    <div id="mainPan">
        <div id="leftPan">
            <header>
                <nav>
                    <ul class="one">
                        <li><a href="<?= $nav_links["homepage"] ?>">Home</a></li>
                        <li><a href="<?= $nav_links["about"] ?>">About Us</a></li>
                        <li><a href="<?= $nav_links["contact"] ?>">Contact Us</a></li>
                        <li><a href="<?= $nav_links["services"] ?>">Our Services</a></li>
                        <li><a href="<?= $nav_links["resources"] ?>">Resources</a></li>
                        <li><a href="<?= $nav_links["lms"] ?>">LMS</a></li>
                        <li><a href="<?= $nav_links["account"] ?>">Account</a></li>
                    </ul>
                    <div id="fastformPan">
                        <form action="#" method="get" class="formone">
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
                        </form>
                    </div>
                </nav>
            </header>
        </div>
        <section>
            <div id="screen">
                <h1>Athlene Academics LMS | Customized Learning For You!</h1>
                   <form><button><a href="tel:12462319428">Enrol Now!</a></button></form> 
            </div>
        </section>
        <footer>
              <div id="footerPan">
                    <ul>
                        <li><a href="#">home</a>| </li>
                        <li><a href="#">about us</a>| </li>
                        <li><a href="#">services</a>| </li>
                        <li><a href="#">univercity</a>| </li>
                        <li><a href="#">books</a>| </li>
                        <li><a href="#">discount</a>| </li>
                        <li><a href="#">realeses</a>| </li>
                        <li><a href="#">contact</a> </li>
                    </ul>
                    <p class="copyright">&copy; Athlene Academics | All right reserved <?= date('Y'); ?>.</p>
                    <!-- <ul class="templateworld">
                    <li>design by:</li>
                    <li><a href="http://www.templateworld.com" target="_blank">Template World</a></li>
                    </ul> -->
                  
                </div>
        </footer>
        </div>
    </body>
</html>
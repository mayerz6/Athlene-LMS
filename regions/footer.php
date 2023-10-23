<?php

    $nav_links = [
        'homepage' => '../index.php',
        'about' => '../about.php',
        'contact' => '../contact.php',
        'services' => '../services.php',
        'resources' => '../resources.php',
        'account' => '../login.php',
        'registration' => '../signup.php',
        'lms' => '../lms.php',
    ];


?>

<footer>
              <div id="footerPan">
                    <ul>
                        <li><a href="<?= $nav_links["homepage"]; ?>">Home</a>| </li>
                        <!-- <li><a href="<?= $nav_links["about"]; ?>">About Us</a>| </li> -->
                        <li><a href="<?= $nav_links["contact"]; ?>">Contact</a> </li>
                        <!-- <li><a href="<?= $nav_links["services"]; ?>">Our Services</a>| </li> -->
                        <!-- <li><a href="<?= $nav_links["resources"]; ?>">Resources</a>| </li> -->
                        <!-- <li><a href="<?= $nav_links["lms"]; ?>">LMS</a>| </li> -->
                        <li><a href="<?= $nav_links["account"]; ?>">Account</a>| </li>
                        <li><a href="<?= $nav_links["registration"]; ?>">Join</a>| </li>
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
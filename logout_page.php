<?php
    session_start();
    session_destroy(); //destroy all session data (logs the user out)
    header("Location: login_page.php");
    exit();
?>

<?php
    ob_start();
    session_start();
    if (isset($_SESSION['tUser'])) {
        header ('location: login.php');
    }
?>
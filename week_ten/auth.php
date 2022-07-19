<?php
// access the current session
session_start();

if (empty($_SESSION['id'])) {
    header('Location:restricted.php');
    exit();
}

?>
<?php
session_start();
if($_SESSION['admin_email']){
    session_destroy();
    header("location: ./login");
}



?>

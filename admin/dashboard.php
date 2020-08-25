<?php
session_start();

if(!$_SESSION['admin_email']){
    header("location: ./login");
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style.min.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="icon" href="../Assets/favicon.png" sizes="16x16" type="image/png">
    <title>Admine page</title>
</head>
<body>
    <div class="divLogOut"><button class="logOut" onclick="location.href='./logout.php'">Logout</button>
    <h1 class="dash-title">Welcome to Dashboard Admin</h1>
    </div>
    <div class="carte">
        <div class="carte__mycarte" onclick="location.href='./Portfolio'">
            <h1 class="carte__titleCart">Portfolio</h1>
            <img class="carte__myImage" src="../Assets/portfolio.png" alt="portfolio">
        </div>
        <div class="carte__mycarte" onclick="location.href='./About'">
            <h1 class="carte__titleCart">About</h1>
            <img class="carte__myImage" src="../Assets/about.png" alt="propos">
        </div>
        <div class="carte__mycarte" onclick="location.href='./mailbox.php'">
            <h1 class="carte__titleCart">Mailbox</h1>
            <img class="carte__myImage" src="../Assets/server.png" alt="propos">
        </div>
    </div>

 
<script src="../js/script.js"></script>   
</body>
</html>
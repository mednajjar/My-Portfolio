<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/accueil.css">
    <link rel="stylesheet" href="css/style.min.css"> 
    <link rel="icon" href="Assets/favicon.png" sizes="16x16" type="image/png">
    <title>Welcome to my portfolio</title>
</head>

<body onload="typeWriter()">
    <!--------------------------------------------** M E N u **----------------------------------------------->
    <nav>
        <div class="logo">
            <img class="logo__logo" src="./Assets/mylogo2.png" alt="">
        </div>

        <ul class="navMenu">
            <li><a class="active" href="home">Acceuil</a></li>
            <li><a href="portfolio">Portfolio</a></li>
            <li><a href="propos">À propos</a></li>
            <li><a href="contact">Contact</a></li>
        </ul>
        <div class="burger">
            <div class="burger__line1"></div>
            <div class="burger__line2"></div>
            <div class="burger__line3"></div>
        </div>
    </nav>
    <!-----------------------------------** F I N - M E N U **---------------------------------------->
    <!-------------------------------** H E A D E R - H E R O **-------------------------------------->
    <div class="blocHeader">
        <div class="blocHeader__TextHeader">
            <h1 id="myTitle" class="blocHeader__titleHeader">Bonjour, je suis MOHAMMED NAJJAR,</h1>
        </div>
        <div class="blocHeader__paraHeader">
            <p class="blocHeader__paragraph" id="para">et je suis un auto-entrepreneur travailler sur des projets de clients dans certaines agences numériques marocaines et des clients individuels. J'ai un ensemble diversifié de compétences, allant de la conception, au html et css, javascript et php, wordpress et prestashop.</p>
        </div>

        <div class="blocBtn">
            <input class="blocBtn__Btn1" type="submit" value="Mes Projets" onclick="location.href='portfolio';">
            <input class="blocBtn__Btn2" type="submit" value="Devis gratuit" onclick="location.href='contact';">
        </div>
    </div>

    <!---------------------------** F I N - H E A D E R - H E R O **---------------------------------->
    

    <script src="./js/script.js"></script>
</body>

</html>
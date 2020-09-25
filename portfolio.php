<?php

include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/portfolio.css"> -->
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="icon" href="Assets/favicon.png" sizes="16x16" type="image/png">
    <title>Welcome to my portfolio</title>
</head>

<body>
    <!--------------------------------------------** M E N u **----------------------------------------------->
    <nav>
        <div class="logo">
            <img class="logo__logo" src="./Assets/mylogo2.png" alt="">
        </div>

        <ul class="navMenu">
            <li><a href="home">Acceuil</a></li>
            <li><a class="active" href="portfolio">Portfolio</a></li>
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
    <div class="sectionPortfolio">

        <h1 class="sectionPortfolio__title">Mes Projet</h1>
        <div class="myGrid">
        <?php
       
            $query = $db->query("SELECT * FROM portfolio ORDER BY port_id LIMIT 5");
                if($query->rowCount() > 0){
                  while($row = $query->fetch(PDO::FETCH_ASSOC)){
                      $port_img = 'uploads/'.$row["port_img"];
                      $port_title = $row["port_title"];
                      $port_url = $row["port_url"];
                      $port_desc = $row["port_desc"];
               
                     
        echo "<div class='blocproject'>
        <div class='imgProjet'>
                <img class='imgProjet__image' src='$port_img' alt='image'>
            </div>
            <div class='informationProjet'>
                <h1 class='informationProjet__titleSite'><a href='$port_url' target='_blank'>$port_title</a></h1>
                <p class='informationProjet__description'>$port_desc</p>
            </div>
            </div>";
        }
        }else{
        ?>
        </div>
        <p class="">No data found...</p>
        <?php
            }
        ?>
        </div>       
    </div>

    <!---------------------------** F I N - H E A D E R - H E R O **---------------------------------->
    <footer>
        <div class="myfooter">
            <div class="myfooter__footerContact">
                <ul>
                    <li><h2 class="titleContactList">Contact info</h2></li>
                    <li><div class="listContact"><h4>Tel :</h4><p class="listContact__paraContact">+212606587853</p></div></li>
                    <li><div class="listContact"><h4>Adress :</h4><p class="listContact__paraContact">Qu Abcd N°09, Youssoufia</p></div></li>
                    <li><div class="listContact"><h4>E-mail :</h4><p class="listContact__paraContact">Najjarmedd@gmail.com</p></div></li>
                </ul>

            </div>
            <div class="myfooter__footerMedia">
                <ul>
                    <li><h2 class="titleContactList">Social media</h2></li>
                    <il><img class="myfooter__mediaIcon" src="./Assets/facebook.png" alt="facebook" onclick="location.href='https://facebook.com'"></il>
                    <il><img class="myfooter__mediaIcon" src="./Assets/linkedin.png" alt="linkdin" onclick="location.href='https://linkedin.com'"></il>
                    <il><img class="myfooter__mediaIcon" src="./Assets/twitter.png" alt="twitter" onclick="location.href='https://www.twitter.com'"></il>
                    <il><img class="myfooter__mediaIcon" src="./Assets/whatsapp.png" alt="whatsapp" onclick="location.href='https://wa.me/0606587853'"></il>
                </ul>

            </div>
            
        </div>
        <div class="footercopyright">
                <p>copyright © 2020 - created by Mohammed Najjar</p>
        </div>
    </footer>

    <script src="./js/script.js"></script>
</body>

</html>
<?php

include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/propos.css"> -->
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
            <li><a href="portfolio">Portfolio</a></li>
            <li><a class="active" href="propos">À propos</a></li>
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
    <div class="sectionPropos">
    <h1 class='sectionPropos__titlePortfolio'>web désigner et développeur full-stack</h1>
    <?php
       
       
       $sql = $db->query("SELECT * FROM images ORDER BY img_id DESC LIMIT 1");
          
            if($sql->rowCount() > 0){
                while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                $img_path = 'uploads/'.$row["img_path"];
                echo "
                <div class='sectionPropos__image'><img src='$img_path' alt='image à propos'></div>";

             
                }
            }
                $query = $db->query("SELECT * FROM propos ORDER BY pro_id LIMIT 3");
                if($query->rowCount() > 0){
                    while($row = $query->fetch(PDO::FETCH_ASSOC)){
                    
                    $pro_title = $row["pro_title"];
                    $port_desc = $row["pro_desc"];
                    echo "<div class='sectionPropos__description'>
                            <h2 class='sectionPropos__titledesc'>$pro_title</h2>
                            <p class='sectionPropos__myDescription'>$port_desc</p> 
                            </div>";
                }
            }

    
       
        
    ?>   
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
<?php
    if(isset($_POST['submit']))
    {
        $fullname = htmlspecialchars(stripslashes(trim($_POST['fullname']))); // Get Name value from HTML Form
        $email = htmlspecialchars(stripslashes(trim($_POST['email']))); // Get Email Value
        $sujet = htmlspecialchars(stripslashes(trim($_POST['sujet']))); // Get Subject value
        $msg = htmlspecialchars(stripslashes(trim($_POST['message']))); // Get Message Value
        
        if(!preg_match("/^[A-Za-z .'-]+$/", $fullname)){
            $name_error = 'Invalid full name';
          }
          if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
            $email_error = 'Invalid email';
          }
          if(!preg_match("/^[A-Za-z .'-]+$/", $sujet)){
            $subject_error = 'Invalid sujet';
          }
          if(strlen($msg) === 0){
            $message_error = 'Your message should not be empty';
          }
         
        $to = "najjarmedd@gmail.com"; // You can change here your Email
        $subject = "'$fullname' has been sent a mail"; // This is your subject
         
        // HTML Message Starts here
        $message ="
        <html>
            <body>
                <table style='width:600px;'>
                    <tbody>
                        <tr>
                            <td style='width:150px'><strong>Name: </strong></td>
                            <td style='width:400px'>$fullname</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Email ID: </strong></td>
                            <td style='width:400px'>$email</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Mobile No: </strong></td>
                            <td style='width:400px'>$sujet</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Message: </strong></td>
                            <td style='width:400px'>$msg</td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </html>
        ";
        // HTML Message Ends here
         
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 
        // More headers
        $headers .= 'From: Admin <najjarmedd@gmail.com>' . "\r\n"; // Give an email id on which you want get a reply. User will get a mail from this email id
        // $headers .= 'Cc: najjarmedd@gmail.com' . "\r\n"; // If you want add cc
        // $headers .= 'Bcc: najjarmedd@gmail.com' . "\r\n"; // If you want add Bcc
        
         
        if(mail($to,$subject,$message,$headers)&& !isset($name_error) && !isset($subject_error) && !isset($email_error) && !isset($message_error)){
            // Message if mail has been sent
            echo "<script>
                    alert('Mail has been sent Successfully.');
                </script>";
        }
 
        else{
            // Message if mail has been not sent
            echo "<script>
                    alert('Email failed to sent');
                </script>";
        }
       
    }
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="icon" href="Assets/favicon.png" sizes="16x16" type="image/png">
    <title>Welcome to my portfolio</title>
</head>

<body onload="typeWriter()">
    <!--------------------------------------------** M E N u **----------------------------------------------->
    <nav>
        <div class="logo">
            <img class="logo__logo" src="/Assets/mylogo2.png" alt="">
        </div>

        <ul class="navMenu">
            <li><a href="index.php">Acceuil</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li><a href="propos.php">À propos</a></li>
            <li><a class="active" href="contact.php">Contact</a></li>
        </ul>
        <div class="burger">
            <div class="burger__line1"></div>
            <div class="burger__line2"></div>
            <div class="burger__line3"></div>
        </div>
    </nav>
    <!-----------------------------------** F I N - M E N U **---------------------------------------->
    <!-------------------------------** H E A D E R - H E R O **-------------------------------------->
    <div class="sectionContact">
        <div class="sectionContact__content">
            <h1 class="sectionContact__title">Contact us</h1>
            <h3 class="sectionContact__paragraphe">Je vous répondrai dans les plus brefs délais</h3>
        </div>


        <div class="formContact">
            <form class="contactForm" action="contact.php" method="POST">
                
                <label for="" class="contactForm__labelName"> Nom et prénom :</label>
                
                <input type="text" class="contactForm__fname" name="fullname" placeholder="Nom et prénom...">
                <p class="contactForm__alertmsg"><?php if(isset($name_error)) echo $name_error; ?></p>

                <label for="" class="contactForm__labelName">Mail :</label>

                <input type="text" class="contactForm__email" name="email" placeholder="E-mail...">
                <p class="contactForm__alertmsg"><?php if(isset($email_error)) echo $email_error; ?></p>

                <label for="" class="contactForm__labelName">Sujet :</label>

                <input type="text" class="contactForm__sujet" name="sujet" placeholder="Sujet...">
                <p class="contactForm__alertmsg"><?php if(isset($subject_error)) echo $subject_error; ?></p>

                <label for="" class="contactForm__labelName">Message :</label>

                <textarea class="contactForm__message" name="message" placeholder="Message..."></textarea>
                <p class="contactForm__alertmsg"><?php if(isset($message_error)) echo $message_error; ?></p>

                <input class="contactForm__sendBtn" type="submit" value="Envoyer" name="submit">
            </form>
        </div>
    </div>

    <!---------------------------** F I N - H E A D E R - H E R O **---------------------------------->


    <script src="/js/script.js"></script>
</body>

</html>
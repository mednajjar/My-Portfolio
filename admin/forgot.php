<?php
include '../config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/forgot.css">
    <link rel="stylesheet" href="../css/style.min.css">
    <link rel="icon" href="Assets/favicon.png" sizes="16x16" type="image/png">
    <title>Admine page</title>
</head>
<body>
<?php
$er="";
if(isset($_POST['send'])){
   $email = htmlspecialchars($_POST['email']) ;
   $secret = htmlspecialchars($_POST['secret']);
    $query = $db->query("SELECT * FROM admin");
        if($query->rowCount() > 0){
           while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $admin_email = $row['admin_email'];
            $pass = $row['admin_pass'];
            $admin_secret = $row['admin_secret'];
       
            if($admin_email == $email && $admin_secret == $secret){  
            if(!preg_match("/^[A-Za-z .'-]+$/", $secret)){
                $secret_error = 'Invalid answer';
              }
              if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
                $email_error = 'Invalid email';
              }
               
            $to = "$email"; // You can change here your Email
            $subject = "Mednajjar.tk has been sent a mail"; // This is your subject
             
            // HTML Message Starts here
            $message ="
            <html>
                <body>
                    <table style='width:600px;'>
                        <tbody>
                            <tr>
                                <td style='width:150px'><strong>Your Password is :</strong></td>
                                <td style='width:400px'>$pass</td>
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
            
             
            if(mail($to,$subject,$message,$headers)&& !isset($subject_error)&& !isset($secret_error) && !isset($email_error)){
                // Message if mail has been sent
             
                echo '<script>alert("Password has been sent Successfully.")</script>';
                header("location: ./login");
              
                  
            }  
           }else{
                // Message if mail has been not sent
               
                echo '<script>alert("Your email or password was false! please check againe.")</script>';
                  
                }
        }
           
        }

     } 
     
                // $_SESSION['admin_email']=$email;
                //     header("location: ./Dashboard");
                //     exit();
                
            
       
    

?>
     <div class="blocForgot">
        <h2 class="textCenter">Fill the blank below to receive your password by email</h2>
            <div class="forgot-form">
           
                <form class="formForgot" action="" method="post">
                <label>E-mail :</label>     
                    <div class="formForgot__group">
                        
                        <input type="email" class="form-Control" name="email" placeholder="E-mail.." required="required">
                        <p class="contactForm__alertmsg"><?php if(isset($email_error)) echo $email_error; ?></p>
                    </div>
                    <label>What is your favorit city name?</label>
                    <div class="formForgot__group">
                        
                        <input type="password" class="form-Control" name="secret" placeholder="Answer.." required="required">
                        <p class="contactForm__alertmsg"><?php if(isset($secret_error)) echo $secret_error; ?></p>
                    </div>
                    
                    <div class="formForgot__groupe">
                        <input type="submit" class="btnSend" name="send" value="Send">
                    </div> 
                    <div class="mytextCenter"><a href="./login">Go to login page</a></div>      
                </form>
                
            </div>
    </div>
    
</body>
</html>
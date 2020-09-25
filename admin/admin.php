<?php
session_start();
include '../config.php';


if(isset($_POST['login'])){
   $email = htmlspecialchars($_POST['email']) ;
   $pass = htmlspecialchars($_POST['password']);
   $hash = sha1($pass);
    $query = $db->query("SELECT * FROM admin WHERE admin_email='$email' AND admin_pass='$hash' ");
        if($query->rowCount() > 0){
                
                $_SESSION['admin_email']=$email;
                    header("location: ./Dashboard");
                    exit();
                
            
        }else{
            echo '<script>alert("Your email or password wrong!")</script>';
            
        }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/style.min.css">
    <link rel="icon" href="Assets/favicon.png" sizes="16x16" type="image/png">
    <title>Admine page</title>
</head>
<body>
        
            <div class="login-form">
                <form class="formGroup" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <h2 class="text-center">Admin</h2>       
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btnLogin" name="login">Log in</button>
                    </div>
                    <div class="passforgot">
                    <p><a class="passforgot__checkMyPass" href="./forgot">Forgot your password?</a></p>
                    </div>       
                </form>
            </div>
    
</body>
</html>
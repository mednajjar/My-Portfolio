<?php
session_start();
include '../config.php';
if(!$_SESSION['admin_email']){
    header("location: ./admin.php");
    
}
$errmsg = "";

if(isset($_POST['Add'])){
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $title = $_POST['title'];
    $url = $_POST['url'];
    $description = $_POST['description'];
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    

    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 2000000){
                $fileDestination = '../uploads/'.$fileName;
               if(move_uploaded_file($fileTmpName, $fileDestination)){
                    
                    $insert = $db->query("INSERT into portfolio (port_img, port_title, port_url, port_desc) VALUES ('".$fileName."', '".$title."', '".$url."', '".$description."')");
                    // header("location: homepage.php?uploadsuccess");
                    $errmsg = "Your project is loaded with successful";

               }else{
                    $errmsg = "Your file cannot uploaded to the server!";
               }
                
                
            }else{
                $errmsg = "Your image is bigger than 2MB!";
            }
        }else{
            $errmsg = "There was an error uploading your image!";
        }

    }else{
        $errmsg = "Please upload image of type jpg, jpeg, png or gif!";
    }
}
// ________________________________________________** propos **______________________________________________________
$error = "";

if(isset($_POST['upload'])){
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    

    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 2000000){
                $fileDestination = '../uploads/'.$fileName;
               if(move_uploaded_file($fileTmpName, $fileDestination)){
                    
                    $insert = $db->query("INSERT into images (img_path) VALUES ('".$fileName."')");
                
                    // header("location: homepage.php?uploadsuccess");
                    $error = "Your project is loaded with successful";

               }else{
                    $error = "Your file cannot uploaded to the server!";
               }
                
                
            }else{
                $error = "Your image is bigger than 2MB!";
            }
        }else{
            $error = "There was an error uploading your image!";
        }

    }else{
        $error = "Please upload image of type jpg, jpeg, png or gif!";
    }
}
// ------------------------------------------------






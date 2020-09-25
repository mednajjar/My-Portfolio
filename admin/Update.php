<?php
include '../config.php';

$id=$_GET['id'];
$error ="";
$sql = 'SELECT * FROM portfolio WHERE port_id=:id';
$stmt = $db->prepare($sql);
$stmt->execute([':id' => $id]);
$info = $stmt->fetch(PDO::FETCH_OBJ);
$err = "";
if(isset($_POST['Update'])){

    
    if(isset($_POST['image']) && isset($_POST['title']) && isset($_POST['myurl']) && isset($_POST['descr'])){
        $image = $_POST['image'];
        $title = $_POST['title'];
        $url = $_POST['myurl'];
        $desc = $_POST['descr'];           
                $stmt = $db->prepare("UPDATE portfolio SET port_img = :image, port_title = :title, port_url = :myurl, port_desc= :descr WHERE port_id=:id AND admin_id=1");
                $stmt -> execute(array(
                        'id'=>"$id",
                        'image'=>"$image",
                        'title'=>"$title",
                        'myurl'=>"$url",
                        'descr'=>"$desc"
                ));
                   
                    $err = "Your informations is updated successfuly";
                    header("location: ./portfoliopage.php");

     }else{
        $err = "please try again!";
    
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/portfoliopage.css">
    <link rel="stylesheet" href="../css/propospage.css">
    <link rel="stylesheet" href="../css/style.min.css">
    <link rel="icon" href="Assets/favicon.png" sizes="16x16" type="image/png">
    <title>Admine page</title>
</head>
<body id="bodypropos">
    <nav class="navbar"><ul><il><a href="./Dashboard">Dashboard</a></il><il><a href="./Portfolio">Portfolio</a></il><il><a href="./About">A propos</a></il><il><a href="./mailbox">Mailbox</a></il><il><a href="./logout.php">Logout</a></il></ul></nav>
        <div class="portfolioPage">

            <h2 class="portfolioPage__titleTop">Ajouter nouveau projet</h2>

            <div class="formPortfolio">
                <p class="formPortfolio__alertRecep"><?php  echo $error; ?></p>

                <form class="projectForm" action="" method="POST" enctype="multipart/form-data">
    
                    <label for="" class="projectForm__labelName"> Image path :</label>
                    <input value="<?= $info->port_img ?>" type="text" class="projectForm__proTitle" name="image">

                    <label for="" class="projectForm__labelName"> Title :</label>
                    <input value="<?= $info->port_title ?>" type="text" class="projectForm__proTitle" name="title">

                    <label for="" class="projectForm__labelName">Url :</label>
                    <input value="<?= $info->port_url ?>" type="text" class="projectForm__proUrl" name="myurl">
            

                    <label for="" class="projectForm__labelName">Description :</label>
                    <textarea class="projectForm__description" name="descr"><?php echo $info->port_desc; ?></textarea>

                    <input class="projectForm__sendBtn sendBtnUpd" type="submit" value="Update" name="Update">
                </form>
            </div>
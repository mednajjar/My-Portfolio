<?php

session_start();
include '../config.php';
if(!$_SESSION['admin_email']){
    header("location: ./admin.php");
    
}

$id=$_GET['id'];

$sql = 'SELECT * FROM propos WHERE pro_id=:id';
$stmt = $db->prepare($sql);
$stmt->execute([':id' => $id]);
$info = $stmt->fetch(PDO::FETCH_OBJ);
$err = "";
if(isset($_POST['update'])){

    
    if(isset($_POST['title']) && isset($_POST['descr'])){
        $title = $_POST['title'];
        $desc = $_POST['descr'];           
                $stmt = $db->prepare("UPDATE propos SET pro_title = :title, pro_desc= :descr WHERE pro_id=:id");
                $stmt -> execute(array(
                        'id'=>"$id",
                        'title'=>"$title",
                        'descr'=>"$desc"
                ));
                   
                    $err = "Your informations is updated successfuly";
                    header("location: ./propospage.php");

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
    <link rel="stylesheet" href="../css/propospage.css">
    <link rel="stylesheet" href="../css/style.min.css">
    <link rel="icon" href="../Assets/favicon.png" sizes="16x16" type="image/png">
    <title>Admine page</title>

</head>
<body id="bodypropos">
    <nav class="navbar"><ul><il><a href="./Dashboard">Dashboard</a></il><il><a href="./Portfolio">Portfolio</a></il><il><a href="./About">A propos</a></il><il><a href="./mailbox">Mailbox</a></il><il><a href="./logout.php">Logout</a></il></ul></nav>
<div class="addProposInfo">
            <h1 class="addProposInfo__titleinf">Mis a jour les informations</h1>
            <p class="proposPage__titleTop"><?php  echo $err; ?></p>
            <!-- -----------------------------------------** Add info Form**------------------------------------------------- -->
            <form class="uploadInfoForm" action="" method="POST">
                <label for="" class="uploadInfoForm__labelName"> Title :</label>
                <input value="<?= $info->pro_title; ?>" type="text" class="uploadInfoForm__proTitle" name="title" placeholder="Title..." required>           

                <label for="" class="uploadInfoForm__labelName">Description :</label>
                <textarea class="uploadInfoForm__description" name="descr" placeholder="Description..." required><?php echo "$info->pro_desc"; ?> </textarea>

                <input class="uploadInfoForm__addBtn" type="submit" value="UPDATE" name="update" onclick="return confirm('Are you sure you want to update this entry?')">
            </form>
        </div>
</body>
</html>
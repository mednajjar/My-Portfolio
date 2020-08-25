<?php
include '../config.php';
include '../upload.php';
if(!$_SESSION['admin_email']){
    header("location: ./login");
    
}

// -----------------------------------------** delete from propos table **------------------------------------------

   
// // -----------------------------------------** delete from image table **------------------------------------------------
// if(isset($_POST['del'])){
//     foreach($_POST['check'] as $value){
//         $stmt = $db->prepare("DELETE FROM images WHERE img_id=:img_id");
//         $stmt->bindParam('img_id',$value);
//         $stmt->execute();
//     }
// }
// -------------------------------------------** Add to propos table **---------------------------------------------------
$err = "";
if(isset($_POST['Add'])){

    $title = $_POST['title'];
    $desc = $_POST['desc'];

    if(!empty($_POST['title']) && !empty($_POST['desc'])){
                    
                $stmt = $db->prepare("INSERT INTO propos (pro_title, pro_desc) VALUES (:pro_title, :pro_desc)");
                $stmt -> execute(array(
                        'pro_title'=>"$title",
                        'pro_desc'=>"$desc"
                ));
                    // header("location: homepage.php?uploadsuccess");
                    $err = "Your informations is loaded with successful";

     }else{
        $err = "please try again!";
    
    }
}

// ------------------------------------------------------------------------------------------------------------------------
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
    <title>About sitting</title>

</head>
<body id="bodypropos">
<nav class="navbar"><ul><il><a href="./Dashboard">Dashboard</a></il><il><a href="./Portfolio">Portfolio</a></il><il><a class="active" href="./About">A propos</a></il><il><a href="./mailbox">Mailbox</a></il><il><a href="./logout.php">Logout</a></il></ul></nav>
        <div class="proposPage">
            <h2 class="proposPage__titleTop">Gérer les données de la page à propos</h2>
        
            
                <p class="proposPage__titleTop"><?php  echo $error; ?></p>
            <!-- ---------------------------------------** Upload image Form**----------------------------------------------- -->
                <form class="uploadForm" action="" method="POST" enctype="multipart/form-data">
                <h3 class="uploadForm__titleUpload">Upload header image</h3>
                    <label class="uploadForm__uploadFile">
                        <input type="file" name="file">
                    </label>
                    <input class="uploadForm__upBtn" type="submit" value="Upload" name="upload">
                </form>
            
           
            <!-- ----------------------------------** Display image header from images table **----------------------- -->
            <div class="blocImgPropos">
                <h1 class="blocImgPropos__headerTitle">Header image</h1>
            <?php 
                
                $query = $db->query("SELECT * FROM images ORDER BY img_id DESC LIMIT 1");
                    if($query->rowCount() > 0){
                        while($row = $query->fetch(PDO::FETCH_ASSOC)){
                            $img_path = '../uploads/'. $row["img_path"];
                        
            ?>                
                            <div class='blocImgPropos__imageHeader'><img class='blocImgPropos__headerImg' src='<?php echo $img_path ; ?>' alt='image propos'></div>  
            <?php
                        }
                    }
            ?>
           
            </div>
            <!------------------------------------** Display images table **--------------------------------------  -->
            <div class="dataPropos">
                <h2 class="dataPropos__titlePropos">Table des images</h2>
                <form id="proposForm" class="form1" method="POST">
                    <table id="proposTable">
                            <tr>
                                <th>Id</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                    <?php 
                
                            $sql = 'SELECT * FROM images';
                            $stmt = $db->prepare($sql);
                            $stmt->execute();
                            $don = $stmt->fetchAll(PDO::FETCH_OBJ);
                                foreach($don as $info){
                    ?>            
                            <tr>
                                    
                                    <td><?= $info->img_id ?></td>
                                    <td><?= $info->img_path ?></td>
                                    <td><a class='dataPropos__deleteBtn' href='./erase.php?id=<?= $info->img_id ?>' onclick="return confirm('Are you sure do you want to delete it?')">DELETE</a></td>
                                </tr>  
                    <?php
                                }    
                            // else{
                            //     echo "<p class='dataPropos__titlePropos'> No such file found !</p>";
                            // }
                    ?>
                    </table>
                            
                </form>
            </div>
 
       
        <!-- --------------------------------------------** Display propos table**------------------------------------------------- -->
        <div class="addProposInfo">
            <h1 class="addProposInfo__titleinf">Ajouter les informations</h1>
            <p class="proposPage__titleTop"><?php  echo $err; ?></p>
            <!-- -----------------------------------------** Add info Form**------------------------------------------------- -->
            <form class="uploadInfoForm" action="" method="POST">
                <label for="" class="uploadInfoForm__labelName"> Title :</label>
                <input type="text" class="uploadInfoForm__proTitle" name="title" placeholder="Title..." required>           

                <label for="" class="uploadInfoForm__labelName">Description :</label>
                <textarea class="uploadInfoForm__description" name="desc" placeholder="Description..." required></textarea>

                <input class="uploadInfoForm__addBtn" type="submit" value="Add" name="Add">
            </form>
        </div>
        <div class="dataPropos">
            <h2 class="dataPropos__titlePropos">Table de données</h2>
            <form class="form2" method="POST">
                <table id="proposTable2">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                <?php 
            
                // $query = $db->query("SELECT * FROM propos ORDER BY pro_id");
                //     if($query->rowCount() > 0){
                //         while($row = $query->fetch(PDO::FETCH_ASSOC)){
                //             $pro_id= $row["pro_id"];
                //             $pro_title = $row["pro_title"];
                //             $pro_desc = $row["pro_desc"];
                $sql = 'SELECT * FROM propos';
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $don = $stmt->fetchAll(PDO::FETCH_OBJ);
                    foreach($don as $info){
                    ?>        
                       <tr>
                        
                                <td><?= $info->pro_id ;?></td>
                                <td><?= $info->pro_title ;?></td>
                                <td><?= $info->pro_desc ;?></td>
                                <td>

                                <label class="labelBtns" ><a class="btnFrm colorRed" href="./delete.php?id=<?= $info->pro_id ?>" onclick="return confirm('Are you sure you want to delete this entry!')">DELETE</a>
                               <a class="btnFrm colorBlue" href="./edit.php?id=<?= $info->pro_id ?>">EDIT</a></label>
                                
                                </td>

                            </tr>    
            <?php
                    }
                        
                ?>
                
                
                
            
      
                   
            </form>
        </div>
        

    </div>
    
    
   
<script src="../js/script.js"></script>      
</body>
</html>
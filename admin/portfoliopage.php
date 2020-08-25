<?php

include '../upload.php';
if(!$_SESSION['admin_email']){
    header("location: ./login");
 
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
    <link rel="icon" href="../Assets/favicon.png" sizes="16x16" type="image/png">
    <title>Portfolio sitting</title>
</head>
<body id="bodypropos">
    <nav class="navbar"><ul><il><a href="./dashboard.php">Dashboard</a></il><il><a class="active" href="./Portfolio">Portfolio</a></il><il><a href="./About">A propos</a></il><il><a href="./mailbox">Mailbox</a></il><il><a href="./logout.php">Logout</a></il></ul></nav>
        <div class="portfolioPage">

            <h2 class="portfolioPage__titleTop">Ajouter nouveau projet</h2>
            <p class="portfolioPage__titleTop"><?php echo $errmsg; ?></p>

            <div class="formPortfolio">
                
                <form class="projectForm" action="" method="POST" enctype="multipart/form-data">
                <b class="formPortfolio__titleUpload">Upload project image</b>
                    <label class="projectForm__uploadFile">
                        
                            <input type="file" name="file">
                    </label>

                    <label for="" class="projectForm__labelName"> Title :</label>
                    <input type="text" class="projectForm__proTitle" name="title" placeholder="Title..." required>

                    <label for="" class="projectForm__labelName">Url :</label>
                    <input type="text" class="projectForm__proUrl" name="url" placeholder="Url..." required>
            

                    <label for="" class="projectForm__labelName">Description :</label>
                    <textarea class="projectForm__description" name="description" placeholder="Description..." required></textarea>

                    <input class="projectForm__sendBtn" type="submit" value="Add" name="Add">
                </form>
            </div>

            <div class="dataPortfolio">
                <h2 class="titlePortfolio">Table de données</h2>
                <form class="form1" method="POST">
                    <table id="portfolioTable">
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Url</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                            <?php   
                                $sql = 'SELECT * FROM portfolio';
                                $stmt = $db->prepare($sql);
                                $stmt->execute();
                                $don = $stmt->fetchAll(PDO::FETCH_OBJ);
                                    foreach($don as $info){
                            ?>        
                                <tr>
                                    <td><?= $info->port_id ;?></td>
                                    <td><?= $info->port_img ;?></td>
                                    <td><?= $info->port_title ;?></td>
                                    <td><?= $info->port_url ;?></td>
                                    <td><?= $info->port_desc ;?></td>
                                    <td>

                                <label class="labelBtns" ><a class="btnFrm colorRed" href="./supprimer.php?id=<?= $info->port_id ?>" onclick="return confirm('Are you sure you want to delete this entry!')">DELETE</a>
                               <a class="btnFrm colorBlue" href="./Update.php?id=<?= $info->port_id ?>">EDIT</a></label>
                                
                                </td>

                                </tr>    
                            <?php
                                }
                        
                            ?> 
                    </table>
                </form>
            </div>
                          
      
<script src="../js/script.js"></script>     
</body>
</html>
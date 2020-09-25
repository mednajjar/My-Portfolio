<?php

include '../config.php';

$id = $_GET['id'];

$sql = 'DELETE FROM propos WHERE pro_id=:id AND admin_id=1';

$stmt = $db->prepare($sql);

if($stmt->execute(['id'=>$id])){
    header("location: ./propospage.php");
}


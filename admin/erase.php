<?php

include '../config.php';

$id = $_GET['id'];

$sql = 'DELETE FROM images WHERE img_id=:id';

$stmt = $db->prepare($sql);

if($stmt->execute(['id'=>$id])){
    header("location: ./About");
}
<?php

include '../config.php';

$id = $_GET['id'];

$sql = 'DELETE FROM portfolio WHERE port_id=:id AND admin_id=1';

$stmt = $db->prepare($sql);

if($stmt->execute(['id'=>$id])){
    header("location: ./portfoliopage.php");
}
<?php
$dsn = 'mysql:host=localhost; dbname=myportfolio';
$user = 'root';
$pass = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8',
);

try{
    $db = new PDO($dsn, $user, $pass, $options);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connection seccess";
    
}
catch(PDOExeption $e)
{
    echo 'Failed!' . $e->getMessage();
}
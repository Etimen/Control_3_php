<?php
$host ='localhost';
$port = 3306;
$dbname = 'gestion_cars';
$user = 'root';
$password = '@theANGLEolife#05';


$dsn = "mysql:host={$host};port={$port};dbname={$dbname}";

try{
    $pdo = new PDO ($dsn,$user,$password);
    //echo 'Connected successfuly';
}catch(PDOException $e){
    echo 'Connection Failed :' . $e->getMessage();
}
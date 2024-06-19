<?php 
require 'database.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $statement = $pdo->prepare("DELETE FROM cars WHERE id = :id");
    $statement->execute([
    ':id' => $id
]);

header('Location: cars.php');
exit;
}
<?php 
require 'database.php';
if($_SERVER['REQUEST_METHOD'] ==  'POST'){
    $usedb = $pdo ->prepare('USE gestion_cars');
    $usedb->execute();
    $statement = $pdo -> prepare('UPDATE cars SET name = :name , brand = :brand, year = :year , date_debut = :date_debut, date_fin = :date_fin WHERE id = :id');
    $statement -> execute([
    ':name' => $_POST['name'],
    ':brand' => $_POST['brand'] ,
    ':year' => $_POST['year'],
    ':date_debut' => $_POST['date_debut'],
    ':date_fin' => $_POST['date_fin']
    ]);
    header('Location:cars.php');
}

?>
<?php
require 'database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($_POST['name']) || empty($_POST['brand']) || empty($_POST['year'])
     || empty($_POST['date_debut']) || empty($_POST['date_fin'])){

        echo '<script>alert("Veuillez remplir tous les champs.")</script>';
        
    }else{
        $usedb = $pdo ->prepare('USE gestion_cars');
        $usedb->execute();
        $statement = $pdo -> prepare('INSERT INTO cars (name, brand, year, date_debut, date_fin) 
        value (:name , :brand , :year , :date_debut , :date_fin)');
        $statement -> execute([
            ':name' => $_POST['name'],
            ':brand' => $_POST['brand'] ,
            ':year' => $_POST['year'],
            ':date_debut' => $_POST['date_debut'],
            ':date_fin' => $_POST['date_fin']
        ]);
        header("Location: cars.php");
        exit;
    }
       
    
}
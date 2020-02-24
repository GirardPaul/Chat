<?php


$bdd = new PDO('mysql:host=localhost:3308;dbname=chat', 'root', '');

if(!empty($_POST['user'])){
    
    $user = $_POST['user'];

    $ajout = "INSERT INTO user (user) VALUES ('$user')";
    $req = $bdd->query($ajout);
}
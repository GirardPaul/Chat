<?php
 $bdd = new PDO('mysql:host=localhost:3308;dbname=chat', 'root', '');

if(!empty($_POST['pseudo']) AND !empty($_POST['message'])){

    $pseudo = $_POST['pseudo'];
    $message = $_POST['message'];

    $req_chat = "INSERT INTO messages (id_user, message) VALUES ('$pseudo', '$message')";

    $req = $bdd->query($req_chat);
}
 

?>

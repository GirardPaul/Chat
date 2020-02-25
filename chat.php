<?php
session_start();

if(empty($_SESSION['utilisateur']))
{
    header("location:connexion.php");
}
else{

 $bdd = new PDO('mysql:host=localhost:3308;dbname=chat', 'root', '');


 
if(!empty($_POST['message'])){


    $session =  $_SESSION['utilisateur'];
    $req_id = $bdd->query("SELECT id FROM user WHERE user = '$session'");
    while ($log=$req_id->fetch())
            {
                $pseudo = $log['id'];
           }
    
    

    $message = $_POST['message'];

    $req_chat = "INSERT INTO messages (id_user, message) VALUES ('$pseudo', '$message')";

    $req = $bdd->query($req_chat);
}
 
}
?>

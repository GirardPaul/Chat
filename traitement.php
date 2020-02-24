<?php

$bdd = new PDO('mysql:host=localhost:3308;dbname=chat', 'root', '');



$req = "SELECT m.id as mid, id_user, message, u.id as uid, user 
FROM messages m
JOIN user u
ON u.id = id_user";

$exe = $bdd->query($req);

while($list=$exe->fetch()){

   echo '<p>'.$list['user'].' : '.$list['message'].'</p>';
}

?>
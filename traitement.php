<?php
session_start();
if(empty($_SESSION['utilisateur']))
{
    header("location:connexion.php");

}
else{
$bdd = new PDO('mysql:host=localhost:3308;dbname=chat', 'root', '');



$req = "SELECT m.id as mid, id_user, message, u.id as uid, user, date, time 
FROM messages m
JOIN user u
ON u.id = id_user
ORDER BY m.id ASC";

$exe = $bdd->query($req);

while($list=$exe->fetch()){

   if($list['user'] == $_SESSION['utilisateur']){

      echo '<li class="in">
                                <div class="chat-img">
                                    <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                                </div>
                                <div class="chat-body">
                                    <div class="chat-message">
                                        <h5>'.$list['user'].'</h5>
                                        <p>'.$list['message'].'</p>
                                    </div>
                                </div>
                            </li>';
   }
   else{
      echo '<li class="out">
      <div class="chat-img">
          <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar6.png">
      </div>
      <div class="chat-body">
          <div class="chat-message">
              <h5>'.$list['user'].'</h5>
              <p>'.$list['message'].'</p>
          </div>
      </div>
  </li>';
   }
}
}
?>
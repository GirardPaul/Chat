<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <title>Chat</title>
</head>

<body>


    <div class="user">

        <form id="inscription" action="" method="POST">

            <input type="text" name="user" placeholder="Pseudo" id="user">

            <input type="submit" id="envoyer" value="Ajouter">

        </form>

    </div>






    <div class="chat">

        <div id="contenu">



        </div>


        <form action="" method="POST">

            <?php

             $bdd = new PDO('mysql:host=localhost:3308;dbname=chat', 'root', '');
             $req_user = $bdd->query("SELECT * FROM user");

             echo "<select id='pseudo' name='pseudo'>";
             while ($list_user=$req_user->fetch()){
                 echo "<option value='".$list_user['id']."'>".$list_user['user']."</option>";
             }
             echo "</select>";
            ?>

            <textarea name="message" id="message" placeholder="Message" cols="30" rows="10"></textarea>

            <input type="submit" name="submit" id="submit" value="Envoyer">

            
 
        </form>


    
 
    </div>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>

$('#envoyer').click(function(){


let user = encodeURIComponent($('#user').val() ); // on sécurise les données

if(user != ""){ // on vérifie que les variables ne sont pas vides
    $.ajax({
        url : "user.php", // on donne l'URL du fichier de traitement
        type : "POST", // la requête est de type POST
        data : "user=" + user  // et on envoie nos données
    });


}
});
    

    $('#submit').click(function(){


let pseudo = encodeURIComponent($('#pseudo').val() ); // on sécurise les données
let message = encodeURIComponent($('#message').val() );

if(pseudo != "" && message != ""){ // on vérifie que les variables ne sont pas vides
    $.ajax({
        url : "chat.php", // on donne l'URL du fichier de traitement
        type : "POST", // la requête est de type POST
        data : "pseudo=" + pseudo + "&message=" + message // et on envoie nos données
    });


}
});

window.onload = function(){
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    document.getElementById("contenu").innerHTML =
    this.responseText;
  }
};
xhttp.open("GET", "traitement.php", true);
xhttp.send();
}

</script>




</body>

</html>
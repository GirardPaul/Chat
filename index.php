<?php
session_start();

if(empty($_SESSION['utilisateur']))
{
    header("location:connexion.php");

}
else{

    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">




<link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="perso.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="style.css">

    <style>


.centrer{
    position: absolute;
  top: 50%; left: 50%;
  transform: translate(-50%, -50%);
}
.buttons {
margin: 3px 0 0 20px;

}
.buttons .button {
width: 16px;
height: 16px;
border-radius: 50%;
display: inline-block;
margin-right: 10px;
position: relative;
}
.buttons .button {
background-color: #df221be7;
}
.buttons .button.minimize {
background-color: #F7BB3A;
}
.buttons .button.maximize {
background-color: #18AE1A;
}

.far {
    font-family: "Font Awesome 5 Free" !important;


    font-weight: 400 !important;

    -moz-osx-font-smoothing: grayscale !important;
    -webkit-font-smoothing: antialiased !important;
    display: inline-block !important;
    font-style: normal !important;
    font-variant: normal !important;
    text-rendering: auto !important;
    line-height: 1 !important;
}
.date{
    font-size: 6px !important;
}
.txt{
    font-size: 14px !important;
}
    </style>

    <title>Document</title>
</head>

<body>

<button id="test" type="button">tttt</button>

    <div class="container content">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 centrer">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">Messenger
                            <div class="buttons">
                            <a class="button" href="logout.php"></a>
                            <div class="button minimize"></div>
                            <div class="button maximize"></div>
                            </div>
                    </div>
                    <div class="card-body height3">
                        <ul class="chat-list">

                        </ul>

                        <form class="w-100" action="chat.php" method="POST">
                        <div class="d-flex justify-content-center align-items-center md-form">
                        <input id="message" name="message" type="text" length="10" class="form-control">
                        <label for="input-char-counter">Saisir votre message : </label>
                        <button class="far fa-paper-plane" style="border: none; background-color: transparent; font-size: 25px;" type="submit" name="submit" id="submit" value=" "></button>
                        </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php

}

?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <script>
    
   



function load(){
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    document.querySelector(".chat-list").innerHTML =
    this.responseText;
    let chat_scroll = document.querySelector('.chat-list');
    chat_scroll.scrollBy(0, 100005000);
  }
};
xhttp.open("GET", "traitement.php", true);
xhttp.send();
}




window.onload = function(){
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    document.querySelector(".chat-list").innerHTML =
    this.responseText;
    let chat_scroll = document.querySelector('.chat-list');
    chat_scroll.scrollBy(0, 10005000);
 
}};
  
xhttp.open("GET", "traitement.php", true);

xhttp.send();
}




    $('#submit').click(function(e){
e.preventDefault();
// on sécurise les données
let message = encodeURIComponent($('#message').val());

if(message != ""){ // on vérifie que les variables ne sont pas vides
    $.ajax({
        url : "chat.php", // on donne l'URL du fichier de traitement
        type : "POST", // la requête est de type POST
        data : "message=" + message // et on envoie nos données
    });
    $('#message').val(' ');
}
load()
});






</script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.12.0/js/mdb.min.js"></script>
</body>

</html>
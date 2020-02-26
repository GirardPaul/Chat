<?php
session_start();

if(empty($_SESSION['utilisateur']))
{
    header("location:connexion.php");

}
else{

    setcookie("user", $_SESSION['utilisateur']);
    ?>
 <!DOCTYPE html>
<html lang="en" class="full-height">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

  <style>

.centrer{
    position: absolute;
  top: 50%; left: 50%;
  transform: translate(-50%, -50%);
}

.btn-outline-info {
    color: #f0373a !important;
    background-color: transparent !important;
    border: 2px solid #f0373a !important;
}
.info-color {
    background-color: #f0373a !important;
}
.mt-4 {
    margin-top: 2.5rem!important;
}
a{
    color: #f0373a !important;
    float: right !important;
}
#submit{
    color: black !important;
}
textarea{

    padding: 10px;
}

body{
    background-color: white;
}
label{
    color:  #f0373a !important;
}
.form-check-input[type="checkbox"]:checked+label:before, label.btn input[type="checkbox"]:checked+label:before {
    border-right: 2px solid  #f0373a;
    border-bottom: 2px solid  #f0373a;
}
.contenu{
    width: 500px !important;
    height: 250px !important;
   border: none !important;
    margin-bottom: 10px !important; 
    overflow-y :scroll !important;
    overflow-x :hidden !important;
    padding: 10px !important;
}
.txt-left{
    text-align: left !important;
}
.txt-right{
    text-align: right !important;

}

</style>
    <title>Chat</title>
</head>

<body>

        <a id="test" onclick="remove()" href="logout.php" title="Deconnexion"><i class="fas fa-times fa-2x"></i></a>


   <div class="container centrer">

   <div class="row flex-column justify-content-center align-items-center">

        <div class="contenu">

        </div>


        <form action="" method="POST">

            <textarea name="message" class="form-control z-depth-1" id="message" placeholder="Message" cols="30" rows="10"></textarea>

            <button type="button" name="submit" id="submit" class="btn btn-outline-danger waves-effect">Envoyer</button>
<!-- 
            <input type="button" name="submit" id="submit" value="Envoyer"> -->

        </form>

   

    </div>
    
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

    <script>
    
   



function load(){
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    document.querySelector(".contenu").innerHTML =
    this.responseText;
  }
};
xhttp.open("GET", "traitement.php", true);
xhttp.send();
}




window.onload = function(){
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    document.querySelector(".contenu").innerHTML =
    this.responseText;

    

    let text = document.querySelectorAll(".txt-left");
    let alltxt = Array.from(text);
    let test = document.getElementById('test');
    let user = Cookies.get('user');
  
    

    alltxt.forEach(element => {


        let x = element.textContent;
    

        if(x.includes(user) == false){
            element.classList.toggle("txt-right");
        }
        
        

   
    });
   
  }
};
xhttp.open("GET", "traitement.php", true);
xhttp.send();
}


    $('#submit').click(function(){

// on sécurise les données
let message = encodeURIComponent($('#message').val());

if(message != ""){ // on vérifie que les variables ne sont pas vides
    $.ajax({
        url : "chat.php", // on donne l'URL du fichier de traitement
        type : "POST", // la requête est de type POST
        data : "message=" + message // et on envoie nos données
    });
}
load()
});

function remove(){
    document.cookie = "user= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
}

</script>



<?php

}

?>
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.12.0/js/mdb.min.js"></script>
</body>

</html>
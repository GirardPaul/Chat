<?php
session_start();

$bdd = new PDO("mysql:host=localhost:3308;dbname=chat;", "root", "");

    if(isset($_POST['user']) AND isset($_POST['mdp'])){

            $user = ($_POST['user']);
            $mdp = md5($_POST['mdp']);

            $req = $bdd->query("SELECT * FROM user WHERE user = '$user' AND mdp = '$mdp'");
            while ($log=$req->fetch())
            {
                $_SESSION['utilisateur'] = $user;
                header("location:index.php");
            }
        }
        if(!empty($_SESSION['utilisateur'])){
            header("location:index.php");
        }

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
}
input.form-control{
    background-color: transparent !important;
    border-bottom-color: #f0373a !important;
    box-shadow: none !important;
}
input.form-control:active{
    background-color: transparent !important;
    border-bottom-color: #f0373a !important;
}
input.form-control:focus{
    background-color: transparent !important;
    border-bottom-color: #f0373a !important;
}
input.form-control:hover{
    background-color: transparent !important;
    border-bottom-color: #f0373a !important;
}

body{
    background-color: rgba(240,55,58,0.9);
}
label{
    color:  #f0373a !important;
}
.form-check-input[type="checkbox"]:checked+label:before, label.btn input[type="checkbox"]:checked+label:before {
    border-right: 2px solid  #f0373a;
    border-bottom: 2px solid  #f0373a;
}


</style>
    <title>Connexion</title>
</head>

<body>

<div class="card w-25 centrer">

  <h5 class="card-header info-color white-text text-center py-4">
    <strong>Connexion</strong>
  </h5>

  <!--Card content-->
  <div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form class="text-center" style="color: #757575;" action="" method="post">

      <!-- Utilisateur -->
      <div class="md-form mt-4">
        <input type="text" name="user" class="form-control">
        <label>Utilisateur</label>
      </div>

      <!-- MDP -->
      <div class="md-form mt-4">
        <input type="password" name="mdp" id="materialLoginFormPassword" class="form-control">
        <label for="materialLoginFormPassword">Mot de passe</label>
      </div>

      <div class="d-flex justify-content-around">
        <div>
          <!-- Se souvenir -->
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
            <label class="form-check-label" for="materialLoginFormRemember">Se souvenir de moi</label>
          </div>
        </div>
      </div>

      <!-- Sign in button -->
      <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Se connecter</button>

      <!-- Register -->
      <p>Pas encore membre ?
        <a href="inscription.php">S'enregistrer</a>
      </p>


    </form>
    <!-- Form -->

  </div>

</div>

<script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>
</body>
</html>




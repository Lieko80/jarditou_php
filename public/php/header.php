<?php
require "script_connexion.php";
// je pose mes conditions pour l'affichage des informations et liens vers d'autre page
if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") 
{
  $admin = true;
  $user = false;
}
 else if (isset($_SESSION['role']) && $_SESSION['role'] == "user") 
{
  $admin = false;
  $user = true;
}
 else 
{
  $admin = false;
  $user = false;
};
if ($admin || $user) 
{
$db = connexionBase();
$requete = $db->prepare('SELECT * FROM `users`');


$requete->execute();
$resultat = $requete->fetch(PDO::FETCH_OBJ);
};
?>

<header>
<!--test logo+text-->
        <div>
                <div class="row mt-3">
                    <div class="col-3"><img id="logo" src="public/img/jarditou_logo.jpg" class="img-fluid" alt="logo jarditou"></div>
                    <div class="col"><h2 id="tout" class="text-right pr-5">Tout le jardin</h2></div>
                </div>
            </div>
<!--navbar jarditou-->
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
                <a id="jarditou.com" class="navbar-brand" href="#">Jarditou.com</a>
<!-- Toggler/collapsibe Button -->
                        <button id="button" class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                        </button>   
                        <div class="collapse navbar-collapse" id="collapsibleNavbar">
<!--repartition auto-->
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="liste.php">Tableau</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Formulaire</a>
                                </li>
                            </ul>
<!--bouton recherche-->
                        <div>
                            <form class="form-inline my-2 my-lg-0">
                                <input id="recherche" class="form-control mr-sm-2" type="search" placeholder="Votre promotion" aria-label="Rechercher">
                                <button id="btnrecherche" class="btn btn-outline-success my-2 my-sm-0 " type="submit">Rechercher</button>
                            </form>
                        </div> 

                        </div>
                        <!--pour le bouton de connexion deconnexion et fenetre de connexion-->
                          <?php if (!$admin || !$user) 
                                if ($user || $admin) { ?>
<!-- bouton de deconnexion -->
                          <form method="POST" action="">
                            <button class="btn btn-outline-danger ml-1  " name="deconnexion" id="deconnexion" type="submit" value="deconnexion">
                            Déconnexion</button>
                          </form>
                          <?php } else { ?>
                        <div class="">
<!-- bouton de qui permet de d'ouvrir un effondrer pour la connexion au site  -->
                          <span class="navbar-text"></span>
                          <button class="btn btn-outline-danger " id="btnco" name="formconn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                          Connexion</button>
                        </div>
                        <?php } ?>                                                
      </nav>
      <!-- Voici mon formulaire de connxion au site qui determinera avec une autre page PHP qu'elle est leurs roles -->
      <form action="" method="POST">
        <div class="collapse" id="collapseExample">
          <div class="card card-body navbar-light bg-light">
            <div class="form-row">
              <div class="form-group col-6"><!--case identifiant-->
                <label for="login"> Identifiant :</label>
                <input type="text" id="login" name="login" class="form-control" value="">
              </div>
              <div class="form-group col-6"><!--case mot de passe-->
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" class="form-control" value="">
              </div>
            </div><!--bouton pour aller au formulaire d'inscription-->
            <input type="submit" id="connexion" name="connexion" class="btn btn-outline-success" value="connecter">
            <a href="formulaire_register.php" class="btn btn-outline-warning mt-2">S'incrire</a>
          </div>
        </div>
      </form>
      <img src="public/img/promotion.jpg" class="img-fluid mx-auto d-block" alt="promotion">

</header>
            
<?php  //test script en fonction un peu galere marche mais sans hasher le mot de passe
require_once "connexion_bdd.php";
// Je démarre une nouvelle session
session_start();


$connexion = false;

if (isset($_POST["deconnexion"])) 
{
  $_SESSION["role"] = "";
  $connexion = false;
  header("Location: liste.php");
};
if (isset($_POST["connexion"])) 
{

    // ce sont mes RegEx pour mot de passe et Identifiant
    $viden = "/(^[0-9A-Za-zéèêâîïëûçŒœæ\_\-]+$)/";
    $vpass = "/(^[0-9A-Za-zéèêâîïëûçŒœæ\.\_\-]+$)/";
    $iden = $_POST["login"];
    $pass = hash('sha256', $_POST["password"]);
      
    // je commence a verifier l'identifiant rentrer par l'utilisateur
    // si il est correcte par rapport au RegEx
    if (isset($_POST["login"])) 
    {
      if (preg_match($viden, $iden)) 
      {
        echo "";
      } else if (empty($iden)) 
      {
        echo "login pas ok";
      } else {
        echo "login pas ok";
      }
    }
    // puis je verifie le mot de passe par rapport au RegEx
    if (isset($pass)) 
    {
      if (preg_match($vpass, $pass)) 
      {
        echo "";
      } else if (empty($pass)) 
      {
        echo "password pas ok";
      } else {
        echo "password ok";
      }
    }

  {
  $connexion = true;
  }
}


// Je fais en sorte que chaque utilisateur est son propre role en verifiant dans ma base de donnée

if ($connexion == true) 
{
  if ($_SESSION["role"]=="") 
  {
  function connection()
  {
    $pass = hash('sha256', $_POST["password"]);

    // Je me connecte a la base de donnée
    $login = (string) $_POST["login"];
    $db = connexionBase();
    // Je fais une requete pour recuperer les informations de ma table users 
    $requete = $db->prepare('SELECT * FROM `users` WHERE `users`.`login`=:login');
    $requete->bindValue(":login", $login);
    $requete->execute();
    $reslog = $requete->fetch(PDO::FETCH_OBJ);
    // j'attribut une variable a chaque OBJ de ma table
    $reslogi = $reslog->login;
    $respass = $reslog->password;
    $resrole = $reslog->role;
    //  J'attribut a une variable golable $_SESSION un role pour pouvoir gerer mes autres pages PHP
    if ($resrole == "admin" && $respass == $pass) 
    {
      $_SESSION["role"] = "admin";
      echo '<script>alert("Vous etes connecté!")</script>';
    } 
    else if ($resrole == "client" && $respass == $pass) 
    {
      $_SESSION["role"] = "user";
      echo '<script>alert("Vous etes connecté!")</script>';
    }
    return $reslogi;
  }
  connection();
  $connecter=true;
}
}
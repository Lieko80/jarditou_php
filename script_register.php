<?php
 // ce sont mes RegEx pour mot de passe et Identifiant
  $viden = "/(^[0-9A-Za-zéèêâîïëûçŒœæ\_\-]+$)/";
  $vpass = "/(^[0-9A-Za-zéèêâîïëûçŒœæ\&\/\%\@\.\_\-]+$)/";

//cette phase permet de ne pas charger les boucle a l'appel de la page avec les champs vides
  if (isset($_POST["confpasswd"])) 
  {
    $iden = $_POST["Identifiant"];
    $pass = $_POST["passwd"];
    $cpas = $_POST["confpasswd"];
  }
  else
  {
    return;
  }

//appel a la base de donner pour comparer les identifiant
  require_once "connexion_bdd.php";
  $db = connexionBase(); // Appel de la fonction de connexion 
  $req = $db->query("SELECT login FROM users WHERE login='$iden'");
  $chk_pseudo = $req->fetch(PDO::FETCH_ASSOC);
  
  
//verif si le pseudo n'existe pas deja dans la base users
  if(!empty($_POST) && $chk_pseudo == '1' || $chk_pseudo > '1')
  {
    $pasok["ErrSID"] =  "Ce pseudo existe déjà !";
    $check01=false;
  }
  else
  { 
    $check01=true;
  }




  // je commence a verifier l'identifiant rentrer par l'utilisateur
  //  etsi il est correcte par rapport au RegEx
  if (isset($_POST["Identifiant"])) 
  {
    if (preg_match($viden, $iden)) 
    {
      $check02=true;
    } else if (empty($iden)) 
    {

      $pasok["ErrSID"] = "Entrez un identifiant" ;
      $check02=false;

    } else 
    {
      $pasok["ErrSID"] = "Identifiant incorrect" ;
      $check02=false;

    }
  }

  // puis je verifie le mot de passe par rapport au RegEx
  if (isset($_POST["passwd"])) 
  {
    if (preg_match($vpass, $pass)) 
    {
      $check03=true;
    } else if (empty($pass)) 
    {
      $pasok["ErrSPW"] = "Entrez un mot de passe" ;
      $check03=false;

    } else 
    {
      $pasok["ErrSPW"] = "Mot de passe incorrect" ;
      $check03=false;

    }
  }

    // pour finir je verifie le mot de passe a confirmer par rapport au RegEx
    // et si il est semblable au precedent
  if (isset($_POST["confpasswd"])) 
  {
    if (preg_match($vpass, $cpas) && ($cpas == $pass)) 
    {
      $check04=true;
    } else if (empty($cpas)) 
    {
      $pasok["ErrSCPW"] = "Rentrer de nouveau le mot de passe" ;
      $check04=false;

    } else 
    {
      $pasok["ErrSCPW"] = "le mot de passe ne correspond pas" ;
      $check04=false;

    }
  }

  if(isset($_POST['captcha']))
  {
    if($_POST['captcha']==$_SESSION['code'])
    {
      $check05=true;
    } 
    else 
    {
      $pasok["Errcap"] = "Code incorrect" ;
      $check05=false;

    }
}


if ($check01==true and $check02==true and $check03==true and $check04==true and $check05==true)
{
/*verif et envoie des donner d'inscription*/


    $user = [];
    if (isset($_POST["Identifiant"]))
      $user["ide"] = $_POST["Identifiant"];
    if (isset($_POST["passwd"]))
      $user["pas"] = $_POST["passwd"];
    if (isset($_POST["confpasswd"]))
      $user["con"] = $_POST["confpasswd"];

    $user["rol"] = 'client';


    //envoie a la data users
      require_once "connexion_bdd.php";
      $db = connexionBase();
      $requete = $db->prepare('INSERT INTO `users` (`login`, `password`, `role`) VALUES (:login, :password, :role)');
      $requete->bindValue(':login', $user["ide"]);
      $requete->bindValue(':password', hash('sha256', $user["con"]));
      $requete->bindValue(':role', $user["rol"]);
      $result = $requete->execute();
    
      
    
    
  
  echo '<script>alert("Vous etes enregistré!")</script>';
  echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
}
else
{
  
  echo '<script>alert("recommencer il y a une erreur")</script>';
  
};



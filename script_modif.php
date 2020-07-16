<?php
  // Je recupere mes variables 
  $id = $_POST["ID"];
  $ref = $_POST["reference"];
  $cat = $_POST["categorie"];
  $lib = $_POST["libelle"];
  $des = $_POST["description"];
  $pri = $_POST["prix"];
  $sto = $_POST["stock"];
  $cou = $_POST["couleur"];
  //variable pour l'image
  $fichier = basename($_FILES['fichier']['name']);
  $taille_maxi = 500000;
  $taille = filesize($_FILES['fichier']['tmp_name']);
  $extensions = array('.png', '.gif', '.jpg', '.jpeg');
  $extension = strrchr($_FILES['fichier']['name'], '.');



  // Je déclare mes RegEx 
  $vref = "/^[0-9A-Za-z\-]{1,10}+$/";
  $vnum = "/(^[0-9]+$)/";
  $vdes = "/(^[0-9A-Za-zéèêâîïëûçŒœæ\.\,\-\s]+$)/";
  $vpri = "/(^[0-9]+(\.[0-9]{1,2})?$)/";



//reference 01
    if (preg_match($vref, $ref)) 
    {
      $check01 = true;
    }
    else
    {
      echo "reference pas ok","<br>";
      $check01 = false;
    }
 
  require_once "connexion_bdd.php";
  $db = connexionBase(); // Appel de la fonction de connexion 
  $pseudo= addslashes($_POST['reference']);// debroussaillage des caractere qui doivent l'etre
  $req = $db->query("SELECT pro_ref FROM produits WHERE pro_ref='$ref'");
  $chk_ref = $req->fetch(PDO::FETCH_ASSOC);
  
 



//libelle 03
    if (preg_match($vdes, $lib)) 
  {  
    $check03 = true;
  }
  else
  {
    echo "libelle pas ok","<br>";
    $check03 = false;
  }

//description 04
    if (preg_match($vdes, $des)) 
  { 
    $check04 = true;
  }
  else
  {
    echo "description pas ok","<br>";
    $check04 = false;
  }

    
//prix 05
    if (preg_match($vpri, $pri)) 
  {  
    $check05 = true;
  }
  else
  {
    echo "prix pas ok","<br>";
    $check05 = false;
  }


//stock 06
    if (preg_match($vnum, $sto)) 
  { 
    $check06 = true;
  }
  else
  {
    echo "stock pas ok","<br>";
    $check06 = false;
  }

//couleur 07
    if (preg_match($vdes, $cou)) 
  {  
    $check07 = true;
  }
  else
  {
    echo "couleur pas ok","<br>";
    $check07 = false;
  }

//import image 08
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
$erreur = '';
$check08 = false;
}
if($taille>$taille_maxi)
{
$erreur = 'Le fichier est trop gros...';
$check08 = false;
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
if(move_uploaded_file($_FILES['fichier']['tmp_name'], "public/img/$id$extension")) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
{
echo 'UPLOAD EFFECTUE AVEC SUCCES !';
$check08 = true;
}
else //Sinon (la fonction renvoie FALSE).
{
echo 'ECHEC DE L\'UPLOAD !';
$check08 = false;
}
}
else
{
echo $erreur;
$check08 = false;
}


  
// si tout les check sont a true j'envoie la suite pour la requete d'envoie a ma base de donnee
if ($check01==true and $check03==true and $check04==true and $check05==true and $check06==true and $check07==true)
{

    // j'insert les infos recuperer par le formulaire de modif dans un tableau $modif
    // avec leurs caracteristique
    $modif = [];
    if (isset($_POST["ID"]))
      $modif["ID"] = (int) $_POST["ID"];
    if (isset($_POST["reference"]))
      $modif["ref"] = $_POST["reference"];
    if (isset($_POST["categorie"]))
      $modif["cat"] = (int) $_POST["categorie"];
    if (isset($_POST["libelle"]))
      $modif["lib"] = $_POST["libelle"];
    if (isset($_POST["description"]))
      $modif["des"] = $_POST["description"];
    if (isset($_POST["prix"]))
      $modif["pri"] = (float) $_POST["prix"];
    if (isset($_POST["stock"]))
      $modif["sto"] = (int) $_POST["stock"];
    if (isset($_POST["couleur"]))
      $modif["cou"] = $_POST["couleur"];
    if (isset($_POST["modif"]) || empty($_POST["modif"]))
      $modif["mod"] = date("Y-m-d H:i:s");
    if (isset($_POST["bloque"]))
    $modif["blq"] = $_POST["bloque"];
    if (isset($extension))
    $prod["ext"] = substr($extension,1);//je retire le point devant l'extension de la photo pour l'integrer a la base de donnee


    // je prepare une requete que je demanderai d'executer avec les informations recuperer plus haut

    $db = connexionBase();
    $requete = $db->prepare('UPDATE `produits` SET pro_ref=:pro_ref, pro_cat_id=:pro_cat_id, pro_libelle=:pro_libelle, pro_description=:pro_description, pro_prix=:pro_prix, pro_stock=:pro_stock, pro_couleur=:pro_couleur, pro_photo=:pro_photo, pro_d_modif=:pro_d_modif, pro_bloque=:pro_bloque WHERE `produits`.pro_id=:pro_id');
    $requete->bindValue(":pro_id", $modif["ID"]);
    $requete->bindValue(":pro_ref", $modif["ref"]);
    $requete->bindValue(":pro_cat_id", $modif["cat"]);
    $requete->bindValue(":pro_libelle", $modif["lib"]);
    $requete->bindValue(":pro_description", $modif["des"]);
    $requete->bindValue(":pro_prix", $modif["pri"]);
    $requete->bindValue(":pro_stock", $modif["sto"]);
    $requete->bindValue(":pro_couleur", $modif["cou"]);
    $requete->bindValue(":pro_photo", $prod["ext"]);
    $requete->bindValue(":pro_d_modif", $modif["mod"]);
    $requete->bindValue(":pro_bloque", $modif["blq"]);
    $requete->execute();

    echo "<script type='text/javascript'>document.location.replace('liste.php');</script>";

}
else
{
  echo "game over";
}


?>
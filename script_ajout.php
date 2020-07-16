<?php
// Je déclare mes RegEx 
$vref = "/^[0-9A-Za-z\-]{1,10}$/";
$vnum = "/(^[0-9]+$)/";
$vdes = "/(^[0-9A-Za-zéèêâîïëûçŒœæ\.\,\-\s]+$)/";
$vpri = "/(^[0-9]+(\.[0-9]{1,2})?$)/";
$vext = "/(^[a-z]{3}$)/";

if (isset($_POST["reference"])) 
{
  // Je recupere mes variables 
$id = $_POST["id"];
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

}
else
{
  return;
}


//reference 01
if (preg_match($vref, $ref)) 
{
  $check01 = true;
}
else
{
  $pasok["Errreference"] =  "Rentrez une reference valide entre 1 et 10 caracteres";
  $check01 = false;
}
//connexion a la base pour la verification de la reference existante ou non 
require_once "connexion_bdd.php";
$db = connexionBase(); // Appel de la fonction de connexion 
$pseudo= addslashes($_POST['reference']);// debroussaillage des caractere qui doivent l'etre
$req = $db->query("SELECT pro_ref FROM produits WHERE pro_ref='$ref'");
$chk_ref = $req->fetch(PDO::FETCH_ASSOC);
  
//verif si la reference  n'existe pas deja dans la base produits
if(!empty($_POST) && $chk_ref == '1' || $chk_ref > '1')
{
  $pasok["Errreference"] =  "Cette reference existe déjà !";
  $check10=false;
}
else
{ 
  $check10=true;
}


//libelle 03
if (preg_match($vdes, $lib)) 
{  
$check03 = true;
}
else
{
  $pasok["Errlibelle"] =  "Rentrez un libelle valide";
  $check03 = false;
}

//description 04
if (preg_match($vdes, $des)) 
{ 
$check04 = true;
}
else
{
  $pasok["Errdescription"] =  "Rentrez une description valide";
  $check04 = false;
}


//prix 05
if (preg_match($vpri, $pri)) 
{  
  $check05 = true;
}
else
{
  $pasok["Errprix"] =   "Rentrez un prix valide ex: 99.99";
  $check05 = false;
}


//stock 06
if (preg_match($vnum, $sto)) 
{ 
  $check06 = true;
}
else
{
  $pasok["Errstock"] =   "Rentrez un stock valide";
  $check06 = false;
}

//couleur 07
if (preg_match($vdes, $cou)) 
{  
  $check07 = true;
}
else
{
  $pasok["Errcouleur"] =   "Rentrez une couleur valide ex: Noir";
  $check07 = false;
}




//import image 09
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
  $pasok["Errextension"] =  'Vous devez uploader un fichier de type png, gif, jpg, jpeg,...';
  $check09 = false;
}
if($taille>$taille_maxi)
{
  $pasok["Errextension"] =  'Le fichier est trop gros...';
  $check09 = false;
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
if(move_uploaded_file($_FILES['fichier']['tmp_name'], "public/img/$id$extension")) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
{
  $check09 = true;
}
else //Sinon (la fonction renvoie FALSE).
{
  $pasok["Errextension"] =  'ECHEC DE L\'UPLOAD !';
  $check09 = false;
}
}

//je check si tout mes if sont true donc verifier et bon avant de passer a l'envoie a la base de donner
if ($check01==true and $check03==true and $check04==true and $check05==true and $check06==true and $check07==true and $check09==true and $check10==true)
{

  //import de donner en tableau
  $prod = [];
  if (isset($_POST["id"]))
    $prod["ID"] = $_POST["id"];
  if (isset($_POST["reference"]))
    $prod["ref"] = $_POST["reference"];
  if (isset($_POST["categorie"]))
    $prod["cat"] = (int) $_POST["categorie"];
  if (isset($_POST["libelle"]))
    $prod["lib"] = $_POST["libelle"];
  if (isset($_POST["description"]))
    $prod["des"] = $_POST["description"];
  if (isset($_POST["prix"]))
    $prod["pri"] = (float) $_POST["prix"];
  if (isset($_POST["stock"]))
    $prod["sto"] = (int) $_POST["stock"];
  if (isset($_POST["couleur"]))
    $prod["cou"] = $_POST["couleur"];
  if (isset($_POST["ajout"]))
    $prod["ajo"] = date("Y-m-d H:i:s");
  if (isset($_POST["modif"]) || empty($_POST["modif"]))
    $prod["mod"] = NULL;
  if (isset($_POST["bloque"]))
    $prod["blo"] = (int) $_POST["bloque"];
  if (isset($extension))
    $prod["ext"] = substr($extension,1);//je retire le point devant l'extension de la photo pour l'integrer a la base de donnee



//envoie des donner en preparant la requete
  require_once "connexion_bdd.php";
  $db = connexionBase();
  $requete = $db->prepare('INSERT INTO `produits` (`pro_id`, `pro_ref`, `pro_cat_id`, `pro_libelle`, `pro_description`, `pro_prix`, `pro_stock`, `pro_couleur`, `pro_photo`, `pro_d_ajout`, `pro_d_modif`, `pro_bloque`) VALUES
  (:pro_id, :pro_ref, :pro_cat_id, :pro_libelle, :pro_description, :pro_prix, :pro_stock, :pro_couleur, :pro_photo, :pro_d_ajout, :pro_d_modif, :pro_bloque);');
  $requete->bindValue(":pro_id",$prod["ID"]);
  $requete->bindValue(":pro_ref", $prod["ref"]);
  $requete->bindValue(":pro_cat_id", $prod["cat"]);
  $requete->bindValue(":pro_libelle", $prod["lib"]);
  $requete->bindValue(":pro_description", $prod["des"]);
  $requete->bindValue(":pro_prix", $prod["pri"]);
  $requete->bindValue(":pro_stock", $prod["sto"]);
  $requete->bindValue(":pro_couleur", $prod["cou"]);
  $requete->bindValue(":pro_photo", $prod["ext"]);
  $requete->bindValue(":pro_d_ajout", $prod["ajo"]);
  $requete->bindValue(":pro_d_modif", $prod["mod"]);
  $requete->bindValue(":pro_bloque", $prod["blo"]);
  $result = $requete->execute();

  echo '<script>alert("Ajout effectuer")</script>';
  echo "<script type='text/javascript'>document.location.replace('liste.php');</script>";

}
else
{
  echo '<script>alert("recommencer il y a une erreur")</script>';
}


?>


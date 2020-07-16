<!--suppression de la ligne et de la photo correspondante-->
<?php
    require ("connexion_bdd.php");
    $db = connexionBase();
    $idProduit = $_POST["sup"];/* suppression en fontion de l'ide detail selectionner par le sup */
    $idphoto = $_POST["supph"];/* recup extension photo*/
    unlink("public/img/$idProduit.$idphoto");/*delete photo dans le dossier correspondant*/
    $requete = $db->prepare ("DELETE FROM produits WHERE pro_id = $idProduit");
    $result = $requete->execute();

    /*renvoie a la page liste si suppression ok*/
    header("Location: liste.php");
?>
    

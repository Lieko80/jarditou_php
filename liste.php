<!--appel raccourcie pour l'entete des pages-->
<?php include("public/php/entete.php");?>
<!--titre de la page-->        
    <title>Liste</title>
    <body>
    <div class="container">
<!--appel raccourcie pour le head des pages-->
<?php include("public/php/header.php");?>  

    
     <?php   
     $db = connexionBase(); // Appel de la fonction de connexion     
     $requete = "SELECT * FROM produits where pro_id";
     $result = $db->query($requete);    
     if (!$result) 
     {
         $tableauErreurs = $db->errorInfo();
         echo $tableauErreur[2]; 
         die("Erreur dans la requête");
     }
     
     if ($result->rowCount() == 0) 
     {
        // Pas d'enregistrement
        die("La table est vide");
     }
     ?>

<!--premiere ligne de mon tableau pour definir les noms-->
<div>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>           
                <th>Photo</th>
                <th>ID</th>
                <th>Référence</th>
                <th>Libellé</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Couleur</th>
                <th>Ajout</th>
                <th>Modif</th>
                <th>Bloqué</th>
            </tr>
        </thead>
        <tbody>
            
<!--import depuis la base de donner pour le tableau-->
     <?php while($produit = $result->fetch(PDO::FETCH_OBJ)) : ?>
    <tr>
       <td><?php echo '<img src="public/img/',($produit->pro_id),".",($produit->pro_photo),'"alt="',($produit->pro_id),'" height="60" />'; ?></td>
       <!--affichage de la photo en utilisant le pro_id et le pro_photo pour definir le type-->
       <td><?php echo $produit->pro_id; ?></td>
       <td><?php echo $produit->pro_ref; ?></td>
       <!--creation d'un lien pour ouvrir une nouvelle page en utilisant l'id de l'article selectionner-->
       <td><?php echo '<a href="detail.php?pro_id='.$produit->pro_id.'">'.$produit->pro_libelle.'</a>'; ?></td>
       <td><?php echo $produit->pro_prix; ?></td>
       <td><?php echo $produit->pro_stock; ?></td>
       <td><?php echo $produit->pro_couleur; ?></td>
       <td><?php echo $produit->pro_d_ajout; ?></td>
       <td><?php echo $produit->pro_d_modif; ?></td>
       <td><?php if($produit->pro_bloque==1){echo "oui";}if($produit->pro_bloque==0){echo "non";}; ?></td>
        <!--change le 1 et le 0 de la table de donner en oui ou non pour afficher clairement les element bloquer-->
     </tr>
     <?php endwhile; ?><!--fin de la boucle while-->
    </tbody>
    </table>
</div>
 



<!--appel raccourcie pour le footer des pages-->
<?php include("public/php/footer.php");?>

</div>
<!--appel raccourcie pour le pieds de page des pages-->
<?php include("public/php/piedsdepage.php");?>
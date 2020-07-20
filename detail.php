<!--appel raccourcie pour l'entete des pages-->
<?php include("public/php/entete.php");?>
<!--titre de la page-->        
    <title>Details</title>
    <body>
    <div class="container">
<!--appel raccourcie pour le head des pages-->
<?php include("public/php/header.php");?>        

<?php   

     $db = connexionBase(); // Appel de la fonction de connexion
     $pro_id = $_GET["pro_id"];
     $requete = "SELECT * FROM produits inner join categories on cat_id=pro_cat_id where pro_id=".$pro_id;
     $result = $db->query($requete); 
     $produit = $result->fetch(PDO::FETCH_OBJ);        
     ?>

<form action="formulaire_modif.php" method="POST">
        <fieldset>
<!--ID-->
                <div class="form-group mx-2">
                    <label for="id"> ID: </label>
                    <input type="text" id="id" name="id" class="form-control"value="<?php echo $produit->pro_id; ?>" readonly>
                </div>
<!--Référence-->
                <div class="form-group mx-2">
                    <label for="id"> Référence: </label>
                    <input type="text" id="ref" name="ref" class="form-control"value="<?php echo $produit->pro_ref; ?>" readonly>
                </div>
<!--Categorie-->
                <div class="form-group mx-2">
                    <label for="id"> Categorie: </label>
                    <input type="text" id="Catev" name="Catev" class="form-control"value="<?php echo $produit->cat_nom; ?>" readonly>
                    <input type="text" id="Cate" name="Cate" class="form-control"value="<?php echo $produit->pro_cat_id; ?>" hidden><!--hidden me permet de reporter le numero de categorie sur la page de modification tout en affichant le nom de la ctaegorie-->
                </div>
<!--Libellé-->
                <div class="form-group mx-2">
                    <label for="id"> Libellé: </label>
                    <input type="text" id="Lib" name="Lib" class="form-control"value="<?php echo $produit->pro_libelle; ?>" readonly>
                </div>
<!--Description-->
                <div class="form-group mx-2">
                    <label for="id"> Description: </label>
                    <textarea name="description" class="form-control" id="description" readonly><?php echo $produit->pro_description; ?></textarea>
                </div>
<!--Prix-->
                <div class="form-group mx-2">
                    <label for="id"> Prix: </label>
                    <input type="text" id="Prix" name="Prix" class="form-control"value="<?php echo $produit->pro_prix; ?>" readonly>
                </div>
<!--Stock-->
                <div class="form-group mx-2">
                    <label for="id"> Stock: </label>
                    <input type="text" id="Stock" name="Stock" class="form-control"value="<?php echo $produit->pro_stock; ?>" readonly>
                </div>
<!--Couleur-->
                <div class="form-group mx-2">
                    <label for="id"> Couleur: </label>
                    <input type="text" id="Coul" name="Coul" class="form-control"value="<?php echo $produit->pro_couleur; ?>" readonly>
                </div>
<!--photo-->
                <div class="form-group mx-2">
                    <input type="text" id="photo" name="photo" class="form-control"value="<?php echo $produit->pro_photo; ?>" hidden>
                </div>
                <div class="form-group mx-2">
                    <label for="id"> Photo: </label>
                    <a class="mx-2"><?php echo '<img src="public/img/',($produit->pro_id),".",($produit->pro_photo),'"alt="',($produit->pro_id),'" height="60" />'; ?></a>
                </div>

<!--produit bloquer-->
                <div class="form-group mx-2">
                    <label for="id"> Produit bloquer: </label>
                    <input type="text" id="dbloque" name="dbloque" class="form-control"value="<?php if($produit->pro_bloque==1){echo "oui";}if($produit->pro_bloque==0){echo "non";}; ?>" readonly>
                </div>
<!--date ajout , modif-->
                    <div class="form-group">
					<label for="ajout" name="ajout">Date d'ajout : <?php echo $produit->pro_d_ajout; ?></label><br>
					
					<label for="modif" name="modifi">Date de modification : <?php echo $produit->pro_d_modif; ?></label><br>
					</div>

<!--bouton modif-->
                <?php if($admin){ ?>
                    <button type="submit" value="modif" class="btn btn-outline-dark mx-2" id="modif" name="modif" >Modifier</button>
                <?php } ?>
        </fieldset>
        
</form>
<div class="form-inline mx-2 my-4">
<!--bouton ajout-->  
<?php if($admin){ ?>
    <form id="ajout" action="formulaire_ajout.php" method="POST" class="position-relative" >
        <button type="" value="ajout" class="btn btn-outline-dark" id="ajout" name="ajout">Ajouter</button>
    </form>

<!--bouton supprimer-->
    <form id="suppr" action="blanc.php" method="POST" class="position-relative mx-2" >
	    <input type="text" id="sup" name="sup" value="<?php echo $produit->pro_id; ?>" hidden>
        <input type="text" id="supph" name="supph" value="<?php echo $produit->pro_photo; ?>" hidden>
	    <button type="submit" id="supprimer" name="supprimer" value="supprimer" class="btn btn-outline-danger">Supprimer</button>
    </form>
<?php } ?>    
    <button type="button" value="back" onClick="history.go(-1)" class="btn btn-outline-success" id="back" name="back">Retour</button>

    

</div>

<!--appel raccourcie pour le footer des pages-->
<?php include("public/php/footer.php");?>

</div>
<script src="public/js/supp.js"></script>
<!--appel raccourcie pour le pieds de page des pages-->
<?php include("public/php/piedsdepage.php");?>
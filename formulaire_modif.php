<!--appel raccourcie pour l'entete des pages-->
<?php include("public/php/entete.php");?>
<!--titre de la page-->        
    <title>Modification</title>
    <body>
    <div class="container">
<!--appel raccourcie pour le head des pages-->
<?php include("public/php/header.php");?>         

<?php   
     $db = connexionBase(); // Appel de la fonction de connexion
     $requete = "SELECT * FROM categories";
     $result = $db->query($requete); 
     $produit = $result->fetch(PDO::FETCH_OBJ);        
     ?>

<form action="script_modif.php" method="POST" enctype="multipart/form-data">
<fieldset>
<!--ID-->
                <div class="form-group mx-2">
                    <label for="id"> ID: </label>
                    <input type="text" id="ID" name="ID" class="form-control"value="<?php echo $_POST["id"]; ?>" readonly>
                </div>
<!--Référence-->
                <div class="form-group mx-2">
                    <label for="id"> Référence: </label>
                    <input type="text" id="reference" name="reference" class="form-control"value="<?php echo $_POST["ref"]; ?>" >
                    <p id="Errreference" class="text-danger"></p>
                </div>
<!--Categorie-->
                <div class="form-group mx-2">
                <label for="categorie"> Categorie: </label>
                <select name="categorie" id="categorie" class="form-control">
                <?php while($produit = $result->fetch(PDO::FETCH_OBJ)) : ?>
                <option value=<?php echo $produit->cat_id; ?>><?php echo ($_POST["Catev"]),"->", $produit->cat_nom; ?></option>
                <?php endwhile; ?><!--code qui sera envoyer                recuperation categorie fichier precedent et selection de la categorie definitive-->
                </select>
                </div>

<!--Libellé-->
                <div class="form-group mx-2">
                    <label for="id"> Libellé: </label>
                    <input type="text" id="libelle" name="libelle" class="form-control"value="<?php echo $_POST["Lib"]; ?>" >
                    <p id="Errlibelle" class="text-danger"></p>
                </div>
<!--Description-->
                <div class="form-group mx-2">
                    <label for="id"> Description: </label>
                    <textarea name="description" class="form-control" id="description" ><?php echo $_POST["description"]; ?></textarea>
                    <p id="Errdescription" class="text-danger"></p>
                </div>
<!--Prix-->
                <div class="form-group mx-2">
                    <label for="id"> Prix: </label>
                    <input type="text" id="prix" name="prix" class="form-control"value="<?php echo $_POST["Prix"]; ?>" >
                    <p id="Errprix" class="text-danger"></p>
                </div>
<!--Stock-->
                <div class="form-group mx-2">
                    <label for="id"> Stock: </label>
                    <input type="text" id="stock" name="stock" class="form-control"value="<?php echo $_POST["Stock"]; ?>" >
                    <p id="Errstock" class="text-danger"></p>
                </div>
<!--Couleur -->
                <div class="form-group mx-2">
                    <label for="id"> Couleur: </label>
                    <input type="text" id="couleur" name="couleur" class="form-control"value="<?php echo $_POST["Coul"]; ?>" >
                    <p id="Errcouleur" class="text-danger"></p>
                </div>
<!--photo et bouton parcourir input type text-->
                <div class="form-group mx-2">
                <label for="id"> Photo: </label>
                <a class="mx-2"><?php echo '<img src="public/img/',($_POST["id"]),".",($_POST["photo"]),'"alt="',($_POST["id"]),'" width="120" />'; ?></a>->
                <!-- bouton parcourir-->
                <img src="" id='preview' alt="" width="120">
                <input type="file"  name="fichier" id="fichier" onchange="previewImage(event);">
                <small id="Errextension" class="text-danger"><?php if (isset($pasok['Errextension'])) echo $pasok['Errextension']; ?></small>

                </div>


<!--bloque bouton radio non relier au fichier detail-->
                <div class="form">
                <label class="col-form-label" for="bloque">Produit bloqué:</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" name="bloque" id="bloque1" value="1" <?php if($_POST["dbloque"]=="oui"){echo "checked";} ?>>
                    <label class="custom-control-label" for="bloque1">Oui</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" name="bloque" id="bloque0" value="0" <?php if($_POST["dbloque"]=="non"){echo "checked";} ?>>
                    <label class="custom-control-label" for="bloque0">Non</label>
                </div>
                </div>



<!--bouton update-->
<button type="submit" value="update" class="btn btn-outline-success" id="update" name="update">Envoyer</button>
<button type="reset" value="Annuler" class="btn btn-outline-primary">Annuler</button>


</fieldset>
</form>

<!--appel raccourcie pour le footer des pages-->
<?php include("public/php/footer.php");?>

</div>
<script src="public/js/apimg.js"></script>
<script src="public/js/modif.js"></script>
<!--appel raccourcie pour le pieds de page des pages-->
<?php include("public/php/piedsdepage.php");?>
<!--appel raccourcie pour l'entete des pages-->
<?php if(file_exists("public/php/entete.php")){
    include("public/php/entete.php");} 
else{
     echo "voir chemin entete.php";
    }?>
<!--titre de la page-->        
    <title>Ajout</title>
    <body>
    <div class="container">
<!--appel raccourcie pour le head des pages-->
<?php if(file_exists("public/php/header.php")){
    include("public/php/header.php");} 
else{
     echo "voir chemin header.php";
    }?>   

<?php   
    require "script_ajout.php";
    $db = connexionBase(); // Appel de la fonction de connexion
    $requete = "SELECT * FROM categories";
    $result = $db->query($requete); 
    $produit = $result->fetch(PDO::FETCH_OBJ);

    //trouver dernier id enregistrer pour mettre le prochain a la suite
    $req = $db ->query ('SELECT max(pro_id) FROM produits')->fetchColumn();
    ?>

<form action="" method="POST" enctype="multipart/form-data">
        <fieldset>
<!--ID-->
                <div class="form-group mx-2">
                    <label for="id"> ID: </label>
                    <input type="text" id="id" name="id" class="form-control"value="<?php echo $req+1; ?>" readonly>
                </div>

<!--Référence-->
                <div class="form-group mx-2">
                    <label for="reference"> Référence: </label>
                    <input type="text" id="reference" name="reference" class="form-control"value="" >
                    <small id="Errreference" class="text-danger"><?php if (isset($pasok['Errreference'])) echo $pasok['Errreference']; ?></small>
                    <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
                </div>
<!--Categorie-->

                <div class="form-group mx-2">
                <label for="categorie"> Categorie: </label>
                <select name="categorie" id="categorie" class="form-control">
                <?php while($produit = $result->fetch(PDO::FETCH_OBJ)) : ?>
                <option value=<?php echo $produit->cat_id; ?>><?php echo $produit->cat_nom; ?></option>
                <?php endwhile; ?>
                </select>
                </div>

<!--Libellé-->
                <div class="form-group mx-2">
                    <label for="id"> Libellé: </label>
                    <input type="text" id="libelle" name="libelle" class="form-control"value="" >
                    <small id="Errlibelle" class="text-danger"><?php if (isset($pasok['Errlibelle'])) echo $pasok['Errlibelle']; ?></small>
                    <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
                </div>
<!--Description-->
                <div class="form-group mx-2">
                    <label for="id"> Description: </label>
                    <textarea name="description" class="form-control" id="description" ></textarea>
                    <small id="Errdescription" class="text-danger"><?php if (isset($pasok['Errdescription'])) echo $pasok['Errdescription']; ?></small>
                    <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
                </div>
<!--Prix-->
                <div class="form-group mx-2">
                    <label for="id"> Prix: </label>
                    <input type="text" id="prix" name="prix" class="form-control"value="" >
                    <small id="Errprix" class="text-danger"><?php if (isset($pasok['Errprix'])) echo $pasok['Errprix']; ?></small>
                    <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
                </div>
<!--Stock-->
                <div class="form-group mx-2">
                    <label for="id"> Stock: </label>
                    <input type="text" id="stock" name="stock" class="form-control"value="" >
                    <small id="Errstock" class="text-danger"><?php if (isset($pasok['Errstock'])) echo $pasok['Errstock']; ?></small>
                    <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
                </div>
<!--Couleur-->
                <div class="form-group mx-2">
                    <label for="id"> Couleur: </label>
                    <input type="text" id="couleur" name="couleur" class="form-control"value="" >
                    <small id="Errcouleur" class="text-danger"><?php if (isset($pasok['Errcouleur'])) echo $pasok['Errcouleur']; ?></small>
                    <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
                </div>
                
<!--extension photo-->
                <div class="form-group mx-2">
                    <input type="text" id="extension" name="extension" class="form-control"value="" hidden>
                    <input type="file"  name="fichier" id="fichier">
                    <small id="Errextension" class="text-danger"><?php if (isset($pasok['Errextension'])) echo $pasok['Errextension']; ?></small>
                    <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
                </div>
<!--bloque bouton radio non relier au fichier detail-->
                <div class="form">
                <label class="col-form-label mx-2" for="bloque">Produit bloqué:</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" name="bloque" id="bloque1" value="1" >
                    <label class="custom-control-label" for="bloque1">Oui</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" name="bloque" id="bloque0" value="0"  >
                    <label class="custom-control-label" for="bloque0">Non</label>
                </div>
                <small id="Errbloquer" class="text-danger"><?php if (isset($pasok['Errbloquer'])) echo $pasok['Errbloquer']; ?></small>
                    <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
                </div>

<!--bouton ajout-->
                <button type="submit" value="ajout" class="btn btn-outline-success mx-2" id="ajout" name="ajout" >Ajouter</button>
                
        </fieldset>
</form>


<!--appel raccourcie pour le footer des pages-->
<?php if(file_exists("public/php/footer.php")){
    include("public/php/footer.php");} 
else{
     echo "voir chemin footer.php";
    }?>

</div>
<script src="public/js/ajout.js"></script>
<!--appel raccourcie pour le pieds de page des pages-->
<?php if(file_exists("public/php/piedsdepage.php")){
    include("public/php/piedsdepage.php");} 
else{
     echo "voir chemin piedsdepage.php";
    }?>
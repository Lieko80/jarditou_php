<!--appel raccourcie pour l'entete des pages-->
<?php if(file_exists("public/php/entete.php")){
    include("public/php/entete.php");} 
else{
     echo "voir chemin entete.php";
    }?>
<!--titre de la page-->        
    <title>Formulaire</title>
    <body>
    <div class="container">
<!--appel raccourcie pour le head des pages-->
<?php if(file_exists("public/php/header.php")){
    include("public/php/header.php");} 
else{
     echo "voir chemin header.php";
    }?>        

<?php
require "script_formulaire.php";
?>


<!--formulaire-->        
<div class="text-danger">
      <small><strong>* Ces champs sont obligatoire</strong></small>
    </div>
    <form action="" method="POST">
        <fieldset>
            <legend>Vos coordonnées</legend>
                <!--nom-->
                <div class="form-group mx-2">
                    <label for="nom"> Votre nom*: </label>
                    <input type="text" id="nom" name="nom" class="form-control">
                    <small id="Errnom" class="text-danger"><?php if (isset($pasok['Errnom'])) echo $pasok['Errnom']; ?></small>
                    <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
                </div>
                <!--prénom-->
                <div class="form-group mx-2">
                    <label for="prenom"> Votre prénom*: </label>
                    <input type="text" name="prenom" class="form-control" id="prenom">
                    <small id="Errprenom" class="text-danger"><?php if (isset($pasok['Errprenom'])) echo $pasok['Errprenom']; ?></small>
                    <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
                </div>
            <!--sexe-->
            <div class="form-row mx-2">
                <label class="col-form-label">Sexe*:</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" name="sexe" id="feminin" value="femme">
                    <label class="custom-control-label" for="feminin">Féminin</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" name="sexe" id="masculin" value="homme">
                    <label class="custom-control-label" for="masculin">Masculin</label>
                </div>
            </div>
            <small  id="Errsexe" class="text-danger mx-2"><?php if (isset($pasok['Errsexe'])) echo $pasok['Errsexe']; ?></small>
            <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
            <!--date-->
            <div class="form-group mx-2">
                <label for="naissance"> Date de naissance*: </label>
                <input type="date" id="naissance" name="naissance" class="form-control">
                <small id="Errnaissance" class="text-danger"><?php if (isset($pasok['Errnaissance'])) echo $pasok['Errnaissance']; ?></small>
                <small id="Errdatenaissance" class="text-danger"><?php if (isset($pasok['Errdatenaissance'])) echo $pasok['Errdatenaissance']; ?></small>
                <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
            </div>
            <!--CP-->
            <div class="form-group mx-2">
                <label for="code"> Code Postal*: </label>
                <input type="text" id="code" name="code" class="form-control">
                <small id="Errcode" class="text-danger"><?php if (isset($pasok['Errcode'])) echo $pasok['Errcode']; ?></small>
                <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
            </div>
            <!--adresse-->
            <div class="form-group mx-2">
                <label for="adresse"> Adresse: </label>
                <input type="text" id="adresse" class="form-control" name="adresse" placeholder="123 rue du deve">
                <small id="Erradrs" class="text-danger"><?php if (isset($pasok['Erradrs'])) echo $pasok['Erradrs']; ?></small>
                <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
            </div>
            <!--ville-->
            <div class="form-group mx-2">
                <label for="ville"> Ville: </label>
                <input type="text" id="ville" name="ville" class="form-control">
                <small id="Errville" class="text-danger"><?php if (isset($pasok['Errville'])) echo $pasok['Errville']; ?></small>
                <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
            </div>
            <!--mail-->
            <div class="form-group mx-2">
                <label for="mail"> Email*: </label>
                <input type="text" id="mail" class="form-control" name="email" placeholder="dave.loper@afpa.fr">
                <small id="Errmail" class="text-danger"><?php if (isset($pasok['Errmail'])) echo $pasok['Errmail']; ?></small>
                <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
            </div>
        </fieldset>
        <fieldset>
            <legend>Votre demande</legend>
            <!--sujet-->
            <div class="form-row mx-2">
                <label for="sujet"> Sujet*: </label>
                <select name="sujet[]" id="sujet" class="form-control">
                    <option value="sujet">Sujet</option>
                    <option value="commandes">Mes commandes</option>
                    <option value="produit">Question sur un produit</option>
                    <option value="reclamation">Reclamation</option>
                    <option value="autres">Autres</option>
                </select>
                <small id="Errsujet" class="text-danger"><?php if (isset($pasok['Errsujet'])) echo $pasok['Errsujet']; ?></small>
                <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
            </div>
            <!--question-->
            <div class="form-group mx-2">
                <label for="question"> Votre question*: </label>
                <textarea class="form-control" name="question" id="question" cols="20" rows="3"></textarea>
                <small id="Errquestion" class="text-danger"><?php if (isset($pasok['Errquestion'])) echo $pasok['Errquestion']; ?></small>
                <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
            </div>
        </fieldset>
        <div class="custom-control custom-checkbox mx-2">
            <input class="custom-control-input" name="accept" type="checkbox" id="accepte">
            <label class="custom-control-label" for="accepte">J'accepte le traitement informatique de ce formulaire.</label>
            <small id="Erraccpt" class="text-danger"><?php if (isset($pasok['Erraccpt'])) echo $pasok['Erraccpt']; ?></small>
            <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
        </div>
        <hr>
        <div class="form-group mx-2">
            <button type="submit" value="Envoyer" id="envoi" class="btn btn-outline-primary" >Envoyer</button>
            <button type="reset" value="Annuler" class="btn btn-outline-primary">Annuler</button>
        </div>
    </form>
    
<!--appel raccourcie pour le footer des pages-->
<?php if(file_exists("public/php/footer.php")){
    include("public/php/footer.php");} 
else{
     echo "voir chemin footer.php";
    }?>

</div>
<script src="public/js/script.js"></script>
<!--appel raccourcie pour le pieds de page des pages-->
<?php if(file_exists("public/php/piedsdepage.php")){
    include("public/php/piedsdepage.php");} 
else{
     echo "voir chemin piedsdepage.php";
    }?>
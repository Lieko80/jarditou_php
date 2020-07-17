<!--appel raccourcie pour l'entete des pages-->
<?php if(file_exists("public/php/entete.php")){
    include("public/php/entete.php");} 
else{
     echo "voir chemin entete.php";
    }?>
<!--titre de la page-->        
    <title>Register</title>
    <body>
    <div class="container">
<!--appel raccourcie pour le head des pages-->
<?php if(file_exists("public/php/header.php")){
    include("public/php/header.php");} 
else{
     echo "voir chemin header.php";
    }?>   


    

<?php
require "script_register.php";
require_once "recaptchalib.php";

?>

<div class="row">
  <div class="col-lg-8 col-sm-6">
    <div class="text-danger mt-3">
      <small><strong>* Ces champs sont obligatoire</strong></small>
    </div>
    <form id="FSign" action="" method="POST" class="mt-3">
      <div class="form-group col-10">
        <label for="Identifiant">Entrez un identifiant : *</label>
        <input type="text" name="Identifiant" id="Identifiant" class="form-control form-control-sm" data-toggle="tooltip" data-placement="right" title="Entrez un nom d'utilisateur.">
        <small id="ErrSID" class="form-text text-danger"><?php if (isset($pasok['ErrSID'])) echo $pasok['ErrSID']; ?></small>
        <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
        </div>
      <div class="form-group col-10">
        <label for="passwd">Entrez un mot de passe : *</label>
        <input type="password" name="passwd" id="passwd" class="form-control form-control-sm" data-toggle="tooltip" data-placement="right" title="Entrez une combinaison d'au moins 6 caractères pouvant contenir de la ponctuation (_, ., etc).">
        <small id="ErrSPW" class="form-text text-danger"><?php if (isset($pasok['ErrSPW'])) echo $pasok['ErrSPW']; ?></small>
        <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
        </div>
      <div class="form-group col-10">
        <label for="confpasswd"> Comfirmez le mot de passe : *</label>
        <input type="password" name="confpasswd" id="confpasswd" class="form-control form-control-sm" data-toggle="tooltip" data-placement="right" title="Saisissez à nouveau votre mot de passe pour confirmer.">
        <small id="ErrSCPW" class="form-text text-danger"><?php if (isset($pasok['ErrSCPW'])) echo $pasok['ErrSCPW']; ?></small>
        <!--renvoie les erreur du fichier js et du fichier php correspondant aux verification-->
      </div>
      <!--case pour le captcha-->  
      <div class="g-recaptcha mx-3" data-sitekey="6LdxGbIZAAAAANx8Gm8hDdD111CFCW4RsocdI-A6"></div>
      <small id="Errcaptcha" class="form-text text-danger mx-3"><?php if (isset($pasok['Errcaptcha'])) echo $pasok['Errcaptcha']; ?></small>

      <!-------------------------->
      <button type="submit" class="btn btn-success ml-4 mt-3" id="sign">Valider</button>
  </div>
  </form>
</div>


<!--appel raccourcie pour le footer des pages-->
<?php if(file_exists("public/php/footer.php")){
    include("public/php/footer.php");} 
else{
     echo "voir chemin footer.php";
    }?>
<script src='https://www.google.com/recaptcha/api.js?hl=fr'></script>
</div>
<!--appel raccourcie pour le pieds de page des pages-->
<?php if(file_exists("public/php/piedsdepage.php")){
    include("public/php/piedsdepage.php");} 
else{
     echo "voir chemin piedsdepage.php";
    }?>
    
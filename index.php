<!--appel raccourcie pour l'entete des pages-->
<?php if(file_exists("public/php/entete.php")){
    include("public/php/entete.php");} 
else{
     echo "voir chemin entete.php";
    }?>
<!--titre de la page-->        
    <title>Jarditou</title>
    <body>
    <div class="container">
<!--appel raccourcie pour le head des pages-->
<?php if(file_exists("public/php/header.php")){
    include("public/php/header.php");} 
else{
     echo "voir chemin header.php";
    }?>  

<!-- paragraphe-->
    <div id="para" class="row mx-auto border-bottom border-left shadow bg-white">
        <div class="col-12 col-lg-8 col-xl-8 ml-3 mt-1">
            <h2><strong>L'entreprise</strong></h2>
            <p>Notre entreprise familiale met tout son savoir-faire à votre disposition dans le domaine du jardin et du paysagisme.</p>
            <p>Créée il y a 70 ans, notre entreprise vend fleurs, arbustes, matériel à main et motorisés.</p>
            <p>Implantés à Amiens, nous intervenons dans tout le département de la Somme : Albert, Doullens, Péronne, Abbeville, Corbie.</p>
            <h2><strong>Qualité</strong></h2>
            <p>Nous mettons à votre disposition un service personnalisé, avec 1 seul interlocuteur durant tout votre projet.</p>
            <p>Vous serez séduit par notre expertise, nos compétences et notre sérieux.</p>
            <h2><strong>Devis gratuit</strong></h2>
            <p>Vous pouvez bien sûr contacter pour de plus amples informations ou pour une demande d’intervention. Vous souhaitez un devis ? Nous vous le réalisons gratuitement.</p>
        </div>
        <div class="col bg-warning"><p class="text-center pt-2">[COLONNE DROITE]</p></div>
    </div>


<!--appel raccourcie pour le footer des pages-->
<?php if(file_exists("public/php/footer.php")){
    include("public/php/footer.php");} 
else{
     echo "voir chemin footer.php";
    }?>

</div>
<!--appel raccourcie pour le pieds de page des pages-->
<?php if(file_exists("public/php/piedsdepage.php")){
    include("public/php/piedsdepage.php");} 
else{
     echo "voir chemin piedsdepage.php";
    }?>
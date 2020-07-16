
<?php

/*regex*/
$alpha = '/(^[A-Za-zéèêâîïëûçŒœæ\-\s]+$)/';
$quest = '/(^[A-Za-z0-zéèêâîïëûçŒœæ\-\s]+$)/';
$adresse = '/(^[0-9]+[A-za-zéèêâîïëûçŒœæ\-\s]+$)/';
$mail = '/(^[A-Za-z0-9éèêâîïëûçŒœæ\-_\.]+@{1}[a-zéèêâîïëûçŒœæ\-_]+[\.]{1}[a-z]+$)/';
$date = '/(^[1-2][0-9][0-9][0-9][\-]{1}[0-1][0-9]+[\-]{1}[0-3][0-9]+$)/';
$code = '/(^([0-9]{5})$)/';
$alphaN = '/(^[A-Za-zéèêâîïëûçŒœæ\-\s]+$)|^$/';


if (isset($_POST["nom"])) 
{
/*variable*/
$nom=($_POST['nom']);
$prenom=($_POST['prenom']);
$naissance=($_POST['naissance']);
$cp=($_POST['code']);
$adrs=($_POST['adresse']);
$ville=($_POST['ville']);
$email=($_POST['email']);
$question=($_POST['question']);

}
else
{
  return;
}

function age($naissance)/*calcule age en fonction de la date rentrer et la date du jour*/
{
  return (int) ((time() - strtotime($naissance)) / 3600 / 24 / 365);
}
 




/*nom 01*/
if(preg_match($alpha,$nom))
{
    $check01 = true;
}
else
{
    $pasok["Errnom"] = "Rentrez un nom valide";
    $check01 = false;
}

/*prenom 02*/
if(preg_match($alpha,$prenom))
{
    $check02 = true;
}
else
{
    $pasok["Errprenom"] = "Rentrez un prenom valide";
    $check02 = false;
}

/*sexe 03*/
if(!isset($_POST['sexe']))
{
    $pasok["Errsexe"] = "Veuillez selecionner un sexe";
    $check03 = false;
}
else
{
    $sexe=($_POST['sexe']);
    $check03 = true;
}

/*date 04*/
$date=date('Y-m-d');
if(empty($naissance))
    {
        $pasok["Errnaissance"] = "Choisissez une date de naissance";
        $check04 = false;
    }
else
{
        if($naissance>$date)
        {
            $pasok["Errdatenaissance"] = "La date rentrer n'est pas valide";
            $check04 = false;
        }
        else
        {
            if(((age($naissance))<120)and((age($naissance))>1))
            {
            $check04 = true;
            }
            else
            {
                $pasok["Errdatenaissance"] = "Vous n'etes pas cencer avoir cet age";
                $check04 = false;
            }
        }
}

/*code postal 05*/
if(!empty($cp))
{
    if(preg_match($code,$cp))
    {
        $check05 = true;
    }
    else
    {
        $pasok["Errcode"] = "Rentrez un code postal valide";
        $check05 = false;
    }
}
else
{
    $check05 = true;
}

/*adresse 06*/
if(preg_match($adresse,$adrs))
{
    $check06 = true;
}
else
{
    $pasok["Erradrs"] = "Rentrez une adresse valide";
    $check06 = false;
}

/*ville 07*/
if(!empty($ville))
{
    if(preg_match($alpha,$ville))
    {
        $check07 = true;
    }
    else
    {
        $pasok["Errville"] = "Rentrez une ville valide";
        $check07 = false;
    }
}
else
{
    $check07 = true;
}

/*email 08*/
if(preg_match($mail,$email))
{
    $check08 = true;
}
else
{
    $pasok["Errmail"] = "Rentrez un email valide";
    $check08 = false;
}

/*sujet 09*/
foreach (($_REQUEST['sujet']) as $sujet)
{
    if($sujet == "sujet")
    {
        $pasok["Errsujet"] = "veuillez selectionner un sujet";
        $check09 = false;
    }
    else
    {
        $check09 = true;
    }
}

/*question 10*/
if(preg_match($quest,$question))
{
    $check10 = true;
}
else
{
    $pasok["Errquestion"] = "Veuillez poser votre question";
    $check10 = false;
}

/*case traitement 11*/
if (isset($_POST['accept']))
{
    $check11 = true;
}
else
{
    $pasok["Erraccpt"] = 'Vous n\'avez pas coché la case.';
    $check11 = false;
}

/* verification globale pour affichage des donnee si tout est true*/
if ($check01==true and $check02==true and $check03==true and $check04==true and $check05==true and $check06==true and $check07==true and $check08==true and $check09==true and $check10==true and $check11==true)
{

    echo '<script>alert("Formulaire de demande envoyer")</script>';
}
else
{
  echo '<script>alert("recommencer il y a une erreur")</script>';
}

?>

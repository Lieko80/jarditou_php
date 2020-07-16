//verif formaulaire contact
var check = document.getElementById("envoi");
check.addEventListener("click", function Vcontact(event) {
//variables 
    var nom = document.getElementById("nom").value;
    var prenom =document.getElementById("prenom").value;
    var sexem = document.getElementById("masculin").checked;
    var sexef = document.getElementById("feminin").checked;
    var naiss = document.getElementById("naissance").value;
    birthDate= new Date(naiss);
    var ladate=new Date();
    var CP = document.getElementById("code").value;
    var adrs = document.getElementById("adresse").value;
    var city = document.getElementById("ville").value;
    var email = document.getElementById("mail").value;
    var sujet = document.getElementById("sujet").value;
    var question = document.getElementById("question").value;
    var accpt =document.getElementById("accepte").checked;


//RegEx 
    var alpha = /(^[A-Za-zéèêâîïëûçŒœæ\-\s]+$)/;
    var quest = /(^[A-Za-z0-zéèêâîïëûçŒœæ\-\s]+$)/;
    var adresse = /(^[0-9]+[A-za-zéèêâîïëûçŒœæ\-\s]+$)|^$/;
    var mail = /(^[A-Za-z0-9éèêâîïëûçŒœæ\-_\.]+@{1}[a-zéèêâîïëûçŒœæ\-_]+[\.]{1}[a-z]+$)/;
    var date = /(^[1-2][0-9][0-9][0-9][\-]{1}[0-1][0-9]+[\-]{1}[0-3][0-9]+$)/;
    var code = /(^([0-9]{5})$)/;
    var alphaN = /(^[A-Za-zéèêâîïëûçŒœæ\-\s]+$)|^$/;//facultatif

// nom 01
    if(!alpha.test(nom))
    {
        document.getElementById("Errnom").textContent="Cette zone est obligatoire. Utilisez que des caractères alphabétiques.";
        event.preventDefault();
    }
    else
    {
        document.getElementById("Errnom").textContent="";
    }
// premon 02
    if(!alpha.test(prenom))
    {
        document.getElementById("Errprenom").textContent="Cette zone est obligatoire. Utilisez que des caractères alphabétiques.";
        event.preventDefault();
    }
    else
    {
        document.getElementById("Errprenom").textContent="";
    }
// date verif naissance 03
    if (birthDate>ladate)
    {
        document.getElementById("Errdatenaissance").textContent="Etes vous sure de votre date de naissance ?";
        event.preventDefault();
        return false;
    }
    else
    {
        document.getElementById("Errdatenaissance").textContent="";
    }

// date 04

    if (!date.test(naiss))
    {
        document.getElementById("Errnaissance").textContent="Cette zone est obligatoire. Date de naissance non valide.";
        event.preventDefault();
    }
    else
    {
        document.getElementById("Errnaissance").textContent="";
    }
// cp 05
    if(!code.test(CP))
    {
        document.getElementById("Errcode").textContent="Utilisez que des caractères numeriques.";
        event.preventDefault();
    }
    else
    {
        document.getElementById("Errcode").textContent="";
    }
// addresse
    if(!adresse.test(adrs))
    {
        document.getElementById("Erradrs").textContent="Adresse incorrect.";
        event.preventDefault();
    }
    else
    {
        document.getElementById("Erradrs").textContent="";
    }
// ville
    if(!alphaN.test(city))
    {
        document.getElementById("Errville").textContent="Utilisez que des caractères alphabétiques.";
        event.preventDefault();
    }
    else
    {
        document.getElementById("Errville").textContent="";
    }
// mail 06
    if(!mail.test(email))
    {
        document.getElementById("Errmail").textContent="Cette zone est obligatoire. Adresse mail non valide.";
        event.preventDefault();
    }
    else
    {
        document.getElementById("Errmail").textContent="";
    }
// question 07
    if((!quest.test(question)))
    {
        document.getElementById("Errquestion").textContent="Cette zone est obligatoire.";
        event.preventDefault();
    }
    else
    {
        document.getElementById("Errquestion").textContent="";
    }
// sexe 08
    if(sexem==false && sexef==false)
    {
        document.getElementById("Errsexe").textContent="Cette zone est obligatoire. Selectionnez votre sexe.";
        event.preventDefault();
    }
    else
    {
        document.getElementById("Errsexe").textContent="";
    }
// sujet 09
    if(sujet=="sujet")
    {
        document.getElementById("Errsujet").textContent="Cette zone est obligatoire. Sélectionnez un sujet.";
        event.preventDefault();
    }
    else
    {
        document.getElementById("Errsujet").textContent="";
    }
// accepte 10
    if(!accpt==true)
    {
        document.getElementById("Erraccpt").textContent="Vous devez accepter en cochant.";
        event.preventDefault();
    }
    else
    {
        document.getElementById("Erraccpt").textContent="";
    }
});








//verif formaulaire modification d'article
var check = document.getElementById("update");
check.addEventListener("click", function Vajout(event) {
    var ref = document.getElementById("reference").value;
    var lib = document.getElementById("libelle").value;
    var descrip = document.getElementById("description").value;
    var prix = document.getElementById("prix").value;
    var stock = document.getElementById("stock").value;
    var couleur = document.getElementById("couleur").value;

// Je déclare mes RegEx 
var vref = /(^[0-9A-Za-z\-]{1,10}$)/;
var vnum = /(^[0-9]+$)/;
var vdes = /(^[0-9A-Za-zéèêâîïëûçŒœæ\.\,\-\s]+$)/;
var vpri = /(^[0-9]+(\.[0-9]{1,2})?$)/;

// reference
if(!vref.test(ref))
{
    document.getElementById("Errreference").textContent="Cette zone est obligatoire. Maximum 10 caractere sans espaces.";
    event.preventDefault();
}
else
{
    document.getElementById("Errreference").textContent="";
}

// libelle
if(!vdes.test(lib))
{
    document.getElementById("Errlibelle").textContent="Cette zone est obligatoire.";
    event.preventDefault();
}
else
{
    document.getElementById("Errlibelle").textContent="";
}

// description
if(!vdes.test(descrip))
{
    document.getElementById("Errdescription").textContent="Cette zone est obligatoire.";
    event.preventDefault();
}
else
{
    document.getElementById("Errdescription").textContent="";
}

// prix
if(!vpri.test(prix))
{
    document.getElementById("Errprix").textContent="Cette zone est obligatoire.exemple: 20.00";
    event.preventDefault();
}
else
{
    document.getElementById("Errprix").textContent="";
}

// stock
if(!vnum.test(stock))
{
    document.getElementById("Errstock").textContent="Cette zone est obligatoire.";
    event.preventDefault();
}
else
{
    document.getElementById("Errstock").textContent="";
}

// couleur
if(!vdes.test(couleur))
{
    document.getElementById("Errcouleur").textContent="Cette zone est obligatoire.exemple: Rouge.";
    event.preventDefault();
}
else
{
    document.getElementById("Errcouleur").textContent="";
}
vext




});
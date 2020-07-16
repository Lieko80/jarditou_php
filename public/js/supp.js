//suppression article de la liste
var checksupp = document.getElementById("supprimer");
var form = document.getElementById("suppr");
checksupp.addEventListener("click", function suppri(event) {
  event.preventDefault();
  var ques = confirm("Etes-vous sur de vouloir supprimer ce produit?");
  if (ques) {
    form.submit();
    alert("Le produit est supprimé!");
  }
  else {
    alert("Le produit n'est pas supprimé");
  };
});
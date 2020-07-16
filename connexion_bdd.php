<?php
function connexionBase()
{
   // Paramètre de connexion serveur
   $host = "localhost";
   $login= "root";  // Votre loggin d'accès au serveur de BDD 
   $password="";    // Le Password pour vous identifier auprès du serveur
   $base = "jarditou";  // La bdd avec laquelle vous voulez travailler 

   try 
   {
    $db = new PDO('mysql:host=' .$host. ';port=3308;charset=utf8;dbname=' .$base, $login, $password);    return $db;
    } // liste idetentifiant plus changement de port
    catch (Exception $e) 
    {//echo en cas d'erreur de connexion
        echo 'Erreur : ' . $e->getMessage() . '<br>';
        echo 'N° : ' . $e->getCode() . '<br>';
        die('Connexion au serveur impossible.');
    } 
}
?>
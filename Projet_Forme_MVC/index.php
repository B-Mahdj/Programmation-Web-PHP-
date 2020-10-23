<?php

session_start ();

if(count ($_GET) == 0){
    if ((!isset($_SESSION['profil'])) || count($_GET)==0)	{               //personne non connectee
        require("./vue/accueil.tpl"); //charge la page d'accueil
    }
    else{ //personne connectee 
        require("./vue/accueil_connecte.tpl");//charge page pour personne connectee 
    }
}

else {
    if (isset($_GET['controle']) && isset ($_GET['action'])) {
        $controle = $_GET['controle'];   //cas d'un appel à index.php 
        $action =  $_GET['action'];	//avec les 2 paramètres controle et action
    }
    require ('./controle/' . $controle . '.php');
    $action(); // On exécute la fonction dont le nom est dans la variable $action
}

?>


<?php

if(count ($_GET) == 0){
    require("./vue/accueil.tpl");
}
else {
    if (isset($_GET['controle']) && isset ($_GET['action'])) {
        $controle = $_GET['controle'];   //cas d'un appel à index.php 
        $action =  $_GET['action'];	//avec les 2 paramètres controle et action
    }
    //echo ('controle : ' . $controle . ' et <br/> action : ' . $action);	
    require ('./controle/' . $controle . '.php');
    $action(); // On exécute la fonction dont le nom est dans la variable $action
}

?>


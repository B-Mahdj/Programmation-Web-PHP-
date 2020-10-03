<?php 
/*controleur c1.php :
  fonctions-action de gestion (c1)
*/

function a11() {
	//require ("./modele/m1.php");	//accès aux fcts modèle de m1.php
	
	require ("./vue/layout/layout.tpl"); //layout lançant le template de vue du service
}

function a12() {
	//require ("./modele/m1.php");	//accès aux fcts modèle de m1.php

	$id= isset($_GET['id'])?$_GET['id']:0;   //$id vaut 0 ou $_GET['id'] si défini
	
	if ($id<>0)
		require ("./vue/layout/layout.tpl"); //layout lançant le template de vue du service
	else 
		header('Location:index.php?controle=c1&action=a11') ; //forcer le navigateur à lancer un autre service (c1.a11)
}
?>

<?php 
/*controleur c1.php :
  fonctions-action de gestion (c1)
*/

function a11() {
	require ("./modele/m1.php");	//accès aux fcts modèle de m1.php

echo 'Je suis bien dans laction a11';
		//définition de variables PHP utiles pour le template
	
	require ("./vue/c1/a11.tpl"); //basiquement, template de vue du service
}

function a12() {
	require ("./modele/m1.php");	
	echo 'Je suis bien dans laction a12';
	require ("./vue/c1/a12.tpl"); //template de vue du service
}

?>

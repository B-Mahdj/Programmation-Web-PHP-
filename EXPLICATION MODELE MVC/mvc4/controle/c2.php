<?php 
/*controleur c2.php :
  fonctions-action de gestion (c2) 
*/

function a21() {
	require ("modele/m2.php"); 	
	$bool = m21(); //
	
	require ("./vue/layout/layout.tpl"); //layout lançant le template de vue du service
											//la vue exploite $bool
}
<?php 
/*Fonctions-modèle réalisant la gestion d'une table de la base,
** ou par extension un même ensemble de tables. 
** Cette gestion est invoquée dans les actions d'un contrôleur, 
** comme c2.
*/

	//echo ("Penser à modifier les paramètres de connect.php avant l'inclusion du fichier <br/>");
	require ("connect.php") ; //connexion $link à MYSQL et sélection de la base
	

function m21() {
		//faire une  requête SQL 
		
		//test
		$bool =  rand(0,1); //entier soit 0 soit 1 aléatoirement
		return $bool;
}


?>

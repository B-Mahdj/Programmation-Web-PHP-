<?php 
/*Fonctions-modèle réalisant la gestion d'une table de la base,
** ou par extension gérant un ensemble de tables. 
** Les appels à ces fcts se fp,t dans c1.
*/

	//echo ("Penser à modifier les paramètres de connect.php avant l'inclusion du fichier <br/>");
	require ("modele/connect.php") ; //connexion MYSQL et sélection de la base, $link défini
	

function m11() { 
	//faire une  requête SQL 
}

function m12($id) {
	//faire une  requête SQL

	if ($id<=1) 
		return true;
	else 
		return false;
	}

?>

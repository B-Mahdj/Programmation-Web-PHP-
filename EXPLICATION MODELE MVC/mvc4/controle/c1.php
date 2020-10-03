<?php 
/*controleur c1.php :
  fonctions-action de gestion (c1)
*/

function a11() {
	require ("./modele/m1.php");	//accès aux fcts modèle de m1.php

	require ("./vue/layout/layout.tpl"); //layout lançant le template de vue du service
}


function a12() {  //affichage du profil d'un utilisateur, suivant son identifiant donné en paramètre
	
	require ("./modele/m1.php");	//accès aux fcts modèle de m1.php
	$id=isset($_GET['id'])?$_GET['id']:0;
	
	$bool = m12($id,$profil);  //$profil : sortie de m12() définie comme array() ou null
	
	require ("./vue/layout/layout.tpl"); //layout lançant le template de vue du service
}


function a13() {
	require ("./modele/m1.php");	//accès aux fcts modèle de m1.php
	$role=isset($_GET['role'])?$_GET['role']:'etu';
	$bool = m13($role,$listeU);  //$listeU : sortie de m13() définie comme array() ou null

	require ("./vue/layout/layout.tpl"); //layout lançant le template de vue du service
}
?>

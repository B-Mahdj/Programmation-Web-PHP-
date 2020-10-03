<?php 
/*Fonctions-modèle réalisant la gestion d'une table de la base,
** ou par extension gérant un ensemble de tables. 
** Les appels à ces fcts se fp,t dans c1.
*/

	
function m11($id,&$profil) {
	//faire une requète SQL
}

	
function m12($id,&$profil) { 
	require ("modele/connectBD.php") ; 
	
	$sql = "select * from utilisateur where id_nom='%s'";
	
	$i = mysqli_real_escape_string ($link,$id);
	$req = sprintf ($sql, $i);
	$res = mysqli_query ($link,$req) or 
		die ("erreur de requête SQL : <br/>" . $req );	
	if (mysqli_num_rows($res)>0) {
		$profil = mysqli_fetch_assoc($res);
		return true; //$profil est un tableau représentant un tuple
	}
	else {
		$profil=null;	
		return false;
	}	
}

function m13($role,&$listeU) {
	require ("modele/connectBD.php") ; 
	
	$sql = "select id_nom, nom, prenom, email from utilisateur where role='%s'";
	$r = mysqli_real_escape_string ($link,$role);
	$req = sprintf ($sql, $r);
	$res = mysqli_query ($link,$req) or 
		die ("erreur de requête SQL : <br/>" . $req );	
	if (mysqli_num_rows($res)>0) {
		while (($u = mysqli_fetch_assoc($res)) and (isset($u)))  
			$listeU[] = $u;
		return true;   //$listeU est un tableau de tableau représentant un ensemble de tuples
						//exploitable comme un tableau à 2 dimensions
	}
	else {
		$listeU=null;
		return false;
	}	

}


?>

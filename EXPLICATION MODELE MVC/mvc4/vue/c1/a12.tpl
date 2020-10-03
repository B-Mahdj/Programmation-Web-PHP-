
<?php 		//echo ("<br/> IHM de l'action a12."); 

	if (! isset($profil)) {
		echo ("Pas de profil. Fournir svp un identifiant valide.");
	}
	else {
		echo ("<br/><br/>  Profil de l'utilisateur <b>" . $profil['nom'] . "</b>: ");
		
		//echo ("<pre>"); print_r($profil); echo ("</pre>"); 
		
		echo ("<ul>");
		foreach ($profil as $c => $v) 
			echo ("<li> $c : $v </li>" );   //note : $v=$profil[$c]
		echo ("</ul>");
		
		
	}
	
	


?>  


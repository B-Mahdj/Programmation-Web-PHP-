
<?php 		//echo ("<br/> IHM de l'action a12."); 


	if (! isset($role)) {
		echo ("Pas de role. Fournir svp un role valide.");
	}
	else if (! isset($listeU)) {
		echo ("Pas d'utilisateur pour ce role.");
	}
	

	
	
	if (isset($role) and isset($listeU)) {
		echo ("<br/><br/>  Liste des utilisateurs du role <b>" . $role . "</b>: <br/>");
		
		//echo ("<pre>"); print_r($listeU); echo ("</pre>"); 
		
		
		echo ("<table>");
		
			foreach ($listeU[0] as $c => $v)  //affichage de l'entete
					echo ("<th> $c </th>" );   
				
			foreach ($listeU as $u) {		//affichage d'un tuple par ligne
				echo ("<tr>");
				foreach ($u as $v) {
					$w = htmlspecialchars(utf8_encode($v));
					echo ("<td> $w </td>" ); 
				}
				echo ("</tr>");
			}	
			
		echo ("</table>");
		
		
	}
	

?>  


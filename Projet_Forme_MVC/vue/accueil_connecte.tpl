<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Projet PWEB</title>
	</head>
	
	<body>
        
		<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
			<a class="navbar-brand">Application loueur de voitures</a>
            <a class="btn btn-outline-success my-2 my-sm-0" href="index.php?controle=entreprise&action=affichage_locations_session">Affichage Locations Actuelles</a>
            <a class="btn btn-outline-success my-2 my-sm-0" href="index.php?controle=entreprise&action=deconnexion" role="button">Deconnexion</a>  
		</nav>
		<div class="jumbotron jumbotron-fluid" style="background-color: #42B3F3">
			<div class="container">
				<h1 class="display-2">Venez louer une voiture de votre choix dès maintenant !</h1>
				<hr class="my-4">
				<h5>Veuillez réserver une voiture à la fois.</p>
			</div>
		</div>
        
		<div class=container>
			<div class="row">
				<?php
				require_once("controle/voiture.php");
				$ligne = afficher_voiture_dispo();
				$taille = sizeof($ligne);
				$i = 0;
				if($taille != 0){
					while($i<$taille){
				   echo "<div class='col-md-4'>
							<div class='card' style='width: 18rem;'>
								<img width='286' height='160' src='images/".$ligne[$i]['photo']."' class='card-img-top' alt='...'>
								<div class='card-body'>
									<h4 class='card-title'>".$ligne[$i]['type']."</h4>";
							if(!is_null($ligne[$i]['caract'])){
								$caract = json_decode($ligne[$i]['caract']);
							if(!empty($caract->{'moteur'})){
								echo "<h6 class='card-title'>".$caract->{'moteur'}. "</h6>";
							}
							if(!empty($caract->{'vitesse'})){
								echo "<h6 class='card-title'>".$caract->{'vitesse'}. "</h6>";
							}
							if(!empty($caract->{'places'})){
								echo "<h6 class='card-title'>".$caract->{'places'}." places</h6>";
							}
							}
							echo "<hr><form action='index.php?controle=voiture&action=reservation_voiture&param1=$i' method='post'>
							<h5>Date Debut</h5>
							<input name='datedebut' type='date'><br/>
							<h5>Date Fin</h5>
							<input  name='datefin' type='date'><br/>
							<input class='btn btn-primary' type= 'submit'  value='Louer la Voiture'>
							</form>
							</div>
						</div>
					</div>";
					$i++;
					}
				}
				else{ //Aucune Voiture n'est disponible pour la location
					echo "Aucune voiture est disponible actuellement";
				}
				?> 
			</div>
		</div>				
	</body>
	
</html>
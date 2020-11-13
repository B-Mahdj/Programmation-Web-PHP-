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
            <a class="btn btn-outline-success my-2 my-sm-0" href="index.php?controle=entreprise&action=deconnexion" role="button">Deconnexion</a>  
		</nav>
		<div class = "formulaire">
			<div class="jumbotron jumbotron-fluid" style="background-color: #42B3F3">
				<div class="container">
					<h1 class="display-2" style="text-align:center">Affichage Voiture</h1>
				</div>
			</div>
				
			<?php
				require_once("controle/voiture.php");
				$ligne = afficher_voiture();
				$taille = sizeof($ligne);
				$i = 0;
			?>
				
			<div class = "caracteristiques">
			<?php
				
				while($i<$taille){
					echo "
					<div class='container' style='font-size:50px; border:solid; text-align:block;'>
						<div class='row'>
							<div class='col-md-2' style='border:solid'>
								<h4 style='text-align:center'>Type voiture</>
							</div>
							<div class='col-md-2' style='border:solid'>
								<h4 style='text-align:center'>Type énergie</>
							</div>
							<div class='col-md-2' style='border:solid'>
								<h4 style='text-align:center'>Vitesse</>
							</div>
							<div class='col-md-2' style='border:solid'>
								<h4 style='text-align:center'>Places</>
							</div>
							<div class='col-md-3' style='border:solid'>
								<h4 style='text-align:center'>Image</>
							</div>
							<div class='col-md-1' style='border:solid'>
								<h4 style='text-align:center; font-size:15px'>Supprimer</>
							</div>
						</div>
					</div>";
					echo "<div class='container' style='margin-bottom:100px; font-size:25px; border:solid; text-align:block;'>
						<div class='row'>";
					/*Afficher caractéristiques*/
					echo "<div class='col-md-2' style='border:solid'>
							<p style='text-align:center'>".$ligne[$i]['type']. "</></div>";
							
						$caract = json_decode($ligne[$i]['caract']);
						
					echo"<div class='col-md-2' style='border:solid'>";
					if(!empty($caract->{'moteur'})){
						echo "<p style='text-align:center'>".$caract->{'moteur'}."</>";
					}
					echo"</div>";
					
					echo"<div class='col-md-2' style='border:solid'>";
					if(!empty($caract->{'vitesse'})){
						echo "<p style='text-align:center'>".$caract->{'vitesse'}."</>";
					}
					echo"</div>";
					
					echo"<div class='col-md-2' style='border:solid'>";
					if(!empty($caract->{'places'})){
						echo "<p style='text-align:center'>".$caract->{'places'}."</>";
					}
					echo"</div>";
					/*Afficher Image*/
					echo "<div class='col-md-3' style='border:solid'>	
						<img src='images/".$ligne[$i]['photo']."' style='width:100%; height:100%' >
						</div>
						<div class='col-md-1' style='border:solid'>
						<a href='index.php?controle=voiture&action=suppression_voiture&param1=$i'><img class ='delete' src='vue/icons/delete.svg' style='width:50px; height:125px'/></a>
						</div>
						</div>
						</div>";
					$i++;
				 }
			?>
				
			</div>
				
			<br>
			
			<div class="row justify-content-md-center" style="padding-bottom: 200px">
				<div class = "lien">
					<a class="btn btn-secondary" href="index.php?controle=voiture&action=ajouter_voiture">Ajout Voiture</a>
					<a class="btn btn-secondary" href="index.php?controle=entreprise&action=affichage_locations">Affichage Locations Entreprises</a>
				</div>
			</div>			

		</div>
	</body>
</html>
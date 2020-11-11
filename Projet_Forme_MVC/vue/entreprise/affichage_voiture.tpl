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
            <a class="btn btn-outline-success my-2 my-sm-0" href="index.php?controle=entreprise&action=deconnexion" role="button">Deconnexion</a> 
		</nav>
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-2">Venez louer une voiture de votre choix dès maintenant !</h1>
			</div>
		</div>
        
		
        <?php
        require_once("controle/voiture.php");
        $ligne = afficher_voiture_louer_byEntreprise($_SESSION['profil']);
        $taille = sizeof($ligne);
        $i = 0;
        if($taille != 0){
            while($i<$taille){
            /*Afficher caractéristiques*/
            echo $ligne[$i]['type'];
            if(!is_null($ligne[$i]['caract'])){
                $caract = json_decode($ligne[$i]['caract']);
            if(!empty($caract->{'moteur'})){
                echo $caract->{'moteur'}. " ";
            }
            if(!empty($caract->{'vitesse'})){
                echo $caract->{'vitesse'}. " ";
            }
            if(!empty($caract->{'places'})){
                echo $caract->{'places'};
            }
            }
            /*Afficher Image*/
            echo "<img width='286' height='160' src='images/".$ligne[$i]['photo']."' >";
            $i++;
            }
        }
        else{ //Aucune Voiture n'est disponible pour la location
            echo "Aucune voiture est disponible actuellement";
        }
        ?>   
	</body>
	
</html>
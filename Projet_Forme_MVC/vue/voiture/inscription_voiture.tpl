<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
	<title>Identification voiture</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

	<body>

		<div class = "formulaire">
			<nav class="navbar navbar-light" style="background-color: #e3f2fd">
				<a class="navbar-brand">Application loueur de voitures</a>
			</nav>
			
		<!--<form action="index.php?controle=voiture&action=ajouter_voiture" method="post" enctype="multipart/form-data">
			Type de la Voiture
			<input 	 name="type" 	type="text"><br/>
			Type Energie (Optionnel)
			<input 	 name="energie" 	type="text "><br/>
			Type Vitesse (Optionnel)
			<input 	 name="vitesse" 	type="text "><br/>
			Nombre de places (Optionnel)
			<input 	 name="nb_place" 	type="text "><br/>
			Photo
			<input   name="photo" type="file"><br/> 
			<input type= "submit"  value="Valider">
		</form>-->

			<div class = "formulaire">
				<div class="jumbotron jumbotron-fluid">
					<div class="container">
						<h1 class="display-2" style="text-align:center">Ajout Voiture</h1>
					</div>
				</div>
				<form action="index.php?controle=voiture&action=ajouter_voiture" method="post" enctype="multipart/form-data">
					<div class="row justify-content-md-center">
						<div class="form-group col-md-6">
						  <label>Type de la voiture</label>
						  <input name="type" type="text" class="form-control">
						</div>
					</div>
					<div class="row justify-content-md-center">
						<div class="form-group col-md-6">
						  <label>Type énergie (Optionnel)</label>
						  <input name="energie" type="text" class="form-control">
						</div>
					</div>
					<div class="row justify-content-md-center">
						<div class="form-group col-md-6">
						  <label>Type vitesse (Optionnel)</label>
						  <input name="vitesse" type="text" class="form-control">
						</div>
					</div>
					<div class="row justify-content-md-center">
						<div class="form-group col-md-6">
						  <label>Nombre de places (Optionnel)</label>
						  <input name="nb_place" type="text" class="form-control">
						</div>
					</div>
					<div class="row justify-content-md-center">
						<div class="form-group col-md-6">
						  <label>Photo</label>
						  <input name="photo" type="file">
						</div>
					</div>
					<div class="row justify-content-md-center" style="padding-top: 50px">
						<button type="submit" value="Valider" class="btn btn-primary btn-lg" >Valider</button>
					</div>
				</form>
			</div>  
		</div>
		<div class="row justify-content-md-center" style="padding-top: 50px">
			<div class = "lien">
				<a class="btn btn-secondary" href = "index.php?controle=entreprise&action=accueil_loueur" role="button">Retour au site</a>
			</div>
		</div>

	</body>

</html>


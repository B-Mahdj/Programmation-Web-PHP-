<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Connexion</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

<body>

	<nav class="navbar navbar-light" style="background-color: #e3f2fd">
			<a class="navbar-brand">Application loueur de voitures</a>
	</nav>
	
	<div class = "formulaire">
		<div class="jumbotron jumbotron-fluid" style="background-color: #42B3F3">
			<div class="container">
				<h1 class="display-2" style="text-align:center">Connexion</h1>
			</div>
		</div>
		<form action="index.php?controle=entreprise&action=connexion" method="post">
			<div class="row justify-content-md-center">
				<div class="form-group col-md-6">
				  <label for="inputName">Nom</label>
				  <input name="nom" type="text" value ="Nom" class="form-control">
				</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="form-group col-md-6">
				  <label for="inputPassword4">Mot de passe</label>
				  <input name="mdp" type="password" value = "Mot de passe" class="form-control">
				</div>
			</div>
			<div class="row justify-content-md-center" style="padding-top: 50px">
				<button type="submit" value="Valider" class="btn btn-primary btn-lg" >Se connecter</button>
			</div>
		</form>
		<div class="row justify-content-md-center" style="padding-top: 50px">
			<div class = "lien">
				<a class="btn btn-secondary" href = "index.php" role="button">Retour au site</a>
				<a class="btn btn-secondary" href = "index.php?controle=entreprise&action=inscription" role="button">S'inscrire</a>
			</div>
		</div>

	</div>
    
</body>

</html>

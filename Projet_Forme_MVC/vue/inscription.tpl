<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>identification</title>
  <link rel="stylesheet" href="./vue/styleCSS/style_inscription.css">
</head>

<body>

<div class = "formulaire">
    
<h3> Inscription </h3>
    
<form action="index.php?controle=entreprise&action=inscription" method="post">
    <input 	name="nom" 	type="text " value = "Nom"><br/>
	<input  name="mdp"  type="password" value = "Mot de passe"><br/> 
	<input  name="email"  type="text" value = "E-mail"><br/> 
    <input type= "submit"  value="Valider">
</form>

<div class = "lien">
<a href = "index.php">Retour au site</a>
<a href = "index.php?controle=entreprise&action=connexion">Se connecter</a>
</div>
    
</div>

</body>

</html>

<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Connexion</title>
  <link rel="stylesheet" href="./vue/styleCSS/style_connexion.css">
</head>

<body>
<div class = "formulaire">
<h3>Connexion</h3>
<form action="index.php?controle=entreprise&action=connexion" method="post">
    Date Debut
    <input 	name="datedebut" 	type="text"><br/>
    Date Fin
	<input  name="datefin"  type="text"><br/> 
    <input type= "submit"  value="Valider">
</form>

<div class = "lien">
<a href = "index.php">Retour au site</a>
</div>

</div>
    
</body>

</html>

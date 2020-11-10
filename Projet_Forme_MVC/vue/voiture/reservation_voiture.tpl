<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Location Voiture</title>
  <link rel="stylesheet" href="./vue/styleCSS/style_connexion.css">
</head>

<body>
<div class = "formulaire">
<h3>Location Voiture</h3>
<?php $param1 = $_GET['param1']?>
<form action="index.php?controle=voiture&action=reservation_voiture&param1=<?php $param1 ?>" method="post">
    Date Debut
    <input 	name="datedebut" type="date"><br/>
    Date Fin
	<input  name="datefin"  type="date" ><br/> 
    <input type= "submit"  value="Valider">
</form>

<div class = "lien">
<a href = "index.php">Retour au site</a>
</div>

</div>
    
</body>

</html>

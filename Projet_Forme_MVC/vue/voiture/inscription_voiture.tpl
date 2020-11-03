<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>identification</title>
  <link rel="stylesheet" href="./vue/styleCSS/style_inscription_voiture.css">
</head>

<body>

<div class = "formulaire">
    
<h3>Ajout Voiture</h3>
    
<form action="index.php?controle=voiture&action=ajouter_voiture" method="post" enctype="multipart/form-data">
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
</form>

<div class = "lien">
<a href = "index.php?controle=entreprise&action=accueil_loueur">Retour au site</a>
</div>
    
</div>

</body>

</html>


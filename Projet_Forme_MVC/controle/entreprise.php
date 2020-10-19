<?php 
	/*controleur entreprise.php :
		fonctions-action de gestion des entreprise
	*/

function inscription(){
     
     require("vue/inscription.tpl");
    
    
     if((sizeof($_POST)) > 0){
        require("modele/entrepriseBD.php");
        $validite = True;
        $nom = $_POST['nom'];
        $mdp = $_POST['mdp'];
        $email = $_POST['email'];


    //Vérifier que les données rentrées sont valides et initialisées

        //Données initialisées

        if(!isset($nom) || !is_null($nom)){
            echo 'Veuillez rentrer un nom'; $validite = FALSE;
        }  
        if(!isset($mdp) || !is_null($mdp)){
            echo 'Veuillez rentrer un mot de passe'; $validite = FALSE;
        }    
        if(!isset($email) || !is_null($email)){
            echo 'Veuillez rentrer un email'; $validite = FALSE;
        }

        //Données valides

        if (!is_string($nom)){
            echo 'Veuillez rentrer un nom valide'; $validite = FALSE;
        }
        if (!is_string($mdp)){
            echo 'Veuillez rentrer un mot de passe valide'; $validite = FALSE;
        }
        if (!is_string($email)){
            echo 'Veuillez rentrer un email valide'; $validite = FALSE;
        }
            
        //Cryptage mdp via fonction sha1()
        $mdp = sha1($mdp);
    
        if($validite == true){
            inscriptionBD($nom, $mdp, $email);
        }
     }
}

function connexion(){
    require("vue/connexion.tpl");
    
    if((sizeof($_POST)) > 0){
    require("modele/entrepriseBD.php");
    
        $validite = True;

        $nom = $_POST['nom'];
        $mdp = $_POST['mdp'];


    //Vérifier que les données rentrées sont valides et initialisées

        //Données initialisées

        if(!isset($nom) || !is_null($nom)){
            echo 'Veuillez rentrer un nom'; $validite = FALSE;
        }  
        if(!isset($mdp) || !is_null($mdp)){
            echo 'Veuillez rentrer un mot de passe'; $validite = FALSE;
        }    
            
        //Données valides

        if (!is_string($nom)){
            echo 'Veuillez rentrer un nom valide'; $validite = FALSE;
        }
        if (!is_string($mdp)){
            echo 'Veuillez rentrer un mot de passe valide'; $validite = FALSE;
        }
    
        if($validite == true){
            $co = connexionBD($nom, $mdp);
            if($co == true){
                echo 'Connexion réussie';
                //Se connecter sur le site en tant qu'inscrit
            }
            else{
                echo "Mauvais mot de passe";
            }
        }
    }
 }


















?>
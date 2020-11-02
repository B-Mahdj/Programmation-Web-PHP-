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

        if(!isset($nom) || is_null($nom)){
            echo 'Veuillez rentrer un nom'; $validite = FALSE;
        }  
        if(!isset($mdp) || is_null($mdp)){
            echo 'Veuillez rentrer un mot de passe'; $validite = FALSE;
        }    
        if(!isset($email) || is_null($email)){
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
            $profil = null;
            inscriptionBD($nom, $mdp, $email, $profil);
            $_SESSION['profil'] = $profil;
            $nexturl = "index.php?controle=entreprise&action=accueil_connecte";
            header("Location:" . $nexturl);//charge page pour personne connectee 
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

        if(!isset($nom) || is_null($nom)){
            echo 'Veuillez rentrer un nom'; $validite = FALSE;
        }  
        if(!isset($mdp) || is_null($mdp)){
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
            $profil = null;
            if($nom == "root"){ /*Cas unique de tentative en tant que loueur*/
                $co = connexionBDLoueur($nom, $mdp, $profil);
                $_SESSION['profil'] = $profil;
                if($co == true){
                    $nexturl = "index.php?  controle=entreprise&action=accueil_loueur";
				    header("Location:" . $nexturl);
                }
                else{
                    echo "Mauvais mot de passe";
                }
            }
            else {
                $co = connexionBD($nom, $mdp, $profil); 
                $_SESSION['profil'] = $profil;
                if($co == true){
                    $nexturl = "index.php?  controle=entreprise&action=accueil_connecte";
				    header("Location:" . $nexturl);
                }
                else{
                    echo "Mauvais mot de passe";
                }
            }
        }
    }
 }

function accueil_connecte(){
    require("vue/accueil_connecte.tpl");
}

function accueil(){
    require("vue/accueil.tpl");
}

function deconnexion(){
    unset($_SESSION['profil']);
    $nexturl = "index.php?controle=entreprise&action=accueil";
    header("Location:" . $nexturl);
}

function accueil_loueur(){
    require("vue/accueil_loueur.tpl");
    /*Accueil du loueur ou il pourra réaliser ses propres services*/
}


















?>
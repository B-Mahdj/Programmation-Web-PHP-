    <?php 

    require("inscription.tpl");
        //Formulaire Inscription
    
        if((sizeof($_POST)) > 0){

        $validite = True;

        $nom = $_POST['nom'];
        $mdp = $_POST['mdp'];
        $email = $_POST['email'];


    //Vérifier que les données rentrées sont valides et initialisées

        //Données initialisées

        if(!isset($nom)){
            echo 'Veuillez rentrer un nom'; $validite = FALSE;
        }  
        if(!isset($mdp)){
            echo 'Veuillez rentrer un mot de passe'; $validite = FALSE;
        }    
        if(!isset($email)){
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


    //Vérifier que Utilisateur n'est pas déjà inscrit 
        require("connectSQL.php");
        if(verif_ident($nom, $pdo)){
            echo "L'utilisateur rentré existe déjà"; $validite = FALSE;
        }


    //INSERTION des Données

        if ($validite == True){

            $req = $pdo->prepare('INSERT INTO entreprise (nom, mdp, email) VALUES(:nom, :mdp, :email)');
            $req->execute(array(
                'nom' => $nom,
                'mdp' => $mdp,
                'email' => $email
            ));

            echo 'Vous avez bien été inscris';
        }
 }

    //Function verification identité

    function verif_ident($nom, $pdo){
        $stm = $pdo->prepare("SELECT * FROM entreprise WHERE nom=?");
        $stm->execute([$nom]);
        $b = $stm->fetch();
        if($b) { //nom existe
            return true;
        }
        else {
            return false;
        }
    }
        
    ?>


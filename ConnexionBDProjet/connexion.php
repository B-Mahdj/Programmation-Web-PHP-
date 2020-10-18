    <?php 

    require("connexion.tpl");
        //Formulaire Inscription
    
        if((sizeof($_POST)) > 0){

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
            
        //Vérifier que l'utilisateur existe bien
        require("connectSQL.php");
        if (!verif_ident($nom, $pdo)){
            echo "Votre nom d'utilisateur n'existe pas dans la base de données"; $validite = FALSE;
        }

    //Verification des Données

        if ($validite == True){
            $mdp_sha1 = sha1($mdp);
            
            $sql = "SELECT mdp FROM entreprise WHERE nom=:nom";
            $stm = $pdo->prepare($sql);
            $stm ->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stm->execute();
            $mdp_bd = $stm->fetch();
            
            if($mdp_sha1==$mdp_bd["mdp"]){
                echo 'Connexion réussie';
                //Se connecter sur le site en tant qu'inscrit
            }
            else{
                echo "Mauvais mot de passe";
            }
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


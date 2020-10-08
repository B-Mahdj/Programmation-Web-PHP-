    <?php 

    require("inscription.tpl");
        //Formulaire Inscription
    
        if((sizeof($_POST)) > 0){

        $validite = True;

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $num = $_POST['num'];
        $email = $_POST['email'];


    //Vérifier que les données rentrées sont valides et initialisées

        //Données initialisées

        if(!isset($nom)){
            echo 'Veuillez rentrer un nom'; $validite = FALSE;
        }
        if(!isset($prenom)){
            echo 'Veuillez rentrer un prenom'; $validite = FALSE;
        }    
        if(!isset($num)){
            echo 'Veuillez rentrer un num'; $validite = FALSE;
        }    
        if(!isset($email)){
            echo 'Veuillez rentrer un email'; $validite = FALSE;
        }

        //Données valides

        if (!is_string($nom)){
            echo 'Veuillez rentrer un nom valide'; $validite = FALSE;
        }
        if (!is_string($prenom)){
            echo 'Veuillez rentrer un nom valide'; $validite = FALSE;
        }
        if (!is_int($num)){
            echo 'Veuillez rentrer un numero valide'; $validite = FALSE;
        }
        if (!is_string($email)){
            echo 'Veuillez rentrer un email valide'; $validite = FALSE;
        }


    //Vérifier que Utilisateur n'est pas déjà inscrit 

           /*if(! verif_ident($nom, $prenom, $num, $email)){
               echo "L'utilisateur rentré existe déjà"; $validite = FALSE;
           }*/


    //INSERTION des Données

        if ($validite == True){
            try{
                $bdd = new PDO('mysql:host=localhost; dbname=econtact; charset = utf8', 'root', 'root');  
            }
            catch (Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }

            $req = $bdd->prepare('INSERT INTO utilisateur (nom, prenom, num, email) VALUES(:nom, :prenom, :num, :email)');
            $req->execute(array(
                'nom' => $nom,
                'prenom' => $prenom,
                'num' => $num,
                'email' => $email
            ));

            echo 'Vous avez bien été inscris';
        }
 }

    //Function verification identité

    function verif_ident($nom, $prenom, $num, $email){
        /*Vérifier l'identité de la personne 
        Voir : ident.php sur le COMMUN quand retour IUT*/
    }
        
    ?>


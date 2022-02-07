
<?php  

  if (isset($_POST['valide'])) {

        $entreprise = htmlspecialchars($_POST['entreprise']);
        $ville = htmlspecialchars($_POST['ville']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $titre = htmlspecialchars($_POST['titre']);
        $description = htmlspecialchars($_POST['description']);
        $categorie = htmlspecialchars($_POST['categorie']);
        $prix = htmlspecialchars($_POST['prix']);

        if (!empty($_POST['entreprise']) && !empty($_POST['ville']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['categorie']) && !empty($_POST['prix'])) {
           
          if (isset($_SESSION['nom']) && isset($_SESSION['id_user'])) {

            $nom = $_SESSION['nom'];
            $id = $_SESSION['id_user'];
            $dateajout = date('Y-m-d');
            $descriptions = strlen($_POST['description']);
            
            $reqtitre = $bdd->prepare("SELECT titre FROM campagnes WHERE titre=?");
                $reqtitre->execute(array($titre));
                $titexist = $reqtitre->rowCount();
                if ($titexist == 0) {
             
            if ($descriptions > 10) {

             if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                    $taille_max = 10000000;
                    $extensions_valides = array('jpg', 'jpeg', 'png', 'gif');
                    if ($_FILES['image']['size'] <= $taille_max) {
                      $extensionsUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
                      if (in_array($extensionsUpload, $extensions_valides)) {
                        $chemin = "images2/campagnes/".$titre.".".$extensionsUpload;
                        $deplacement = move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
                        if ($deplacement) {
                
                 $req = $bdd->prepare("INSERT INTO campagnes(auteur, dates, entreprise, localisation, titre, description, categorie, prix, email, phone, id_auteur, image) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
                            $req->execute(array($nom,$dateajout,$entreprise,$ville,$titre,$description,$categorie,$prix,$email,$phone,$id,$titre.".".$extensionsUpload));
                          
                            $success="Votre annonce a bien été ajouté sur notre plateforme !!";
                             
                                   }
                             else{
                                  $error = "Erreur pendant l'importation de votre image veillez renommer votre image";
                                  }
                                }
                                else{
                                 $error = "Votre photo doit être au format jpg, jpeg, png ou gif";
                                 }
                               }
                            else{
                                 $error = "Votre photo de profil ne doit pas dépasser 10Mo";
                             }
                          }
                          else{
                            $error = "Veillez inserer une image pour votre annonce !!";
                          }
                        }
                        else {
                            $error = "Votre description doit avoir au moins 10 caractères";
                        }
                        }
                      else {
                         $error = "Une annonce à déjà ce titre veillez en choisir une autre !!";
                      }
                    }
                    else{
                        $error = "Connectez-vous pour Ajouter des annonces";
                    } 
                }
                else{
                    $error = "Veillez remplir tout les champs";
                }
         }

 ?>
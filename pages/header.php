
<?php  
session_start();
?>

<?php 
include('pages/config.php');

if (isset($_POST['valideconnexion'])) {
        $email = htmlspecialchars($_POST['email']);
        if (!empty($_POST['email'] && !empty($_POST['pwd']))) {
            $pwd = sha1($_POST['pwd']);
            $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE email=? AND password=?");
            $requser->execute(array($email,$pwd));
            $userexist = $requser->rowCount();
            if ($userexist == 1) {
                $userinfo = $requser->fetch();
                $_SESSION['id_user'] = $userinfo['id'];
                $_SESSION['nom'] = $userinfo['nom'];
                $_SESSION['prenom'] = $userinfo['prenom'];
                $_SESSION['email'] = $userinfo['email'];
                $_SESSION['phone'] = $userinfo['phone'];
                $_SESSION['avatar'] = $userinfo['image'];
                $_SESSION['pwd2'] = $userinfo['password'];
                $_SESSION['fonction'] = $userinfo['fonction'];

                if ( $_SESSION['fonction'] == "administrateur") {
                  header('Location: admin.php');
                }else{
                  header('Location: campagne.php');
                }
            }
            else{
                $error = "Adresse mail ou mot de passe incorrect";
            }
        }
        else {
            $error = "Veuillez remplir tout les champs";
        }
    }


   if (isset($_POST['valideinscription'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $pwd1 = htmlspecialchars($_POST['pwd']);

        if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['phone'])  && !empty($_POST['pwd']) && !empty($_POST['passconfirm'])) {
            $pwd = sha1($_POST['pwd']);
            $passconfirm = sha1($_POST['passconfirm']);

            $len_pwd = strlen($_POST['pwd']);

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $reqmail = $bdd->prepare("SELECT email FROM utilisateurs WHERE email=?");
                $reqmail->execute(array($email));
                $mailexist = $reqmail->rowCount();
                if ($mailexist == 0) {
                    if ($pwd == $passconfirm) {
                        if ($len_pwd >= 4) {

                    if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
                    $taille_max = 10000000;
                    $extensions_valides = array('jpg', 'jpeg', 'png', 'gif');
                    if ($_FILES['avatar']['size'] <= $taille_max) {
                      $extensionsUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                      if (in_array($extensionsUpload, $extensions_valides)) {
                        $chemin = "images2/users/".$prenom.".".$extensionsUpload;
                        $deplacement = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                        if ($deplacement) {

                            $req = $bdd->prepare("INSERT INTO utilisateurs(nom, prenom, email, phone, password, image) VALUES(?,?,?,?,?,?)");
                            $req->execute(array($nom,$prenom,$email,$phone,$pwd,$prenom.".".$extensionsUpload));
                           $_SESSION['email'] = $email; 
                           $_SESSION['pwd'] = $pwd1;
                           
                           //header("Location: connexion.php");
                            $success="Inscription Réussie veuillez-vous connecter !!";

                                 }
                                 else{
                                  $error = "Erreur pendant l'importation de votre image";
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
                            $error = "Veuillez inserer un photo de profil !!";
                          }
                        }
                        else {
                            $error = "Votre mot de passe ne doit pas avoir moins de 4 caractères";
                        }
                    }
                    else{
                        $error = "Les mots de passe ne coïncident pas";
                    }
                }
                else{
                    $error = "Cette adresse mail à déjà été utilisé Veuillez en utiliser une autre";
                }
            }
            else{
                $error = "Veuillez saisir une adresse mail valide";
            }
        }
        else{
            $error = "Veuillez remplir tout les champs";
        }
     }



if (isset($_POST['valide3'])) {

   $mes = htmlspecialchars($_POST['comment']);

    if (!empty($_POST['comment'])){

      if( isset($_SESSION['nom']) && isset($_SESSION['avatar'])){

    $nom = $_SESSION['nom'];
    $img = $_SESSION['avatar'];
    $id = $_SESSION['id_user'];
    $dateajout = date('Y-m-d', time('H:i:s'));

    $req = $bdd->prepare("INSERT INTO commentaire(auteur, message, dates, image, id_auteurs) VALUES(?,?,?,?,?)");
    $req->execute(array($nom,$mes,$dateajout,$img,$id));
    $success1 = "Commentaire ajouté avec succès";
   }
   else
   {
    $error1 = " Veuillez-vous connecter pour ajouter un commentaire !!";
   }
 }else
   {
    $error1 = " Veuillez remplir le champ du commentaire !!";
   }
}



    if (isset($_POST['send'])) {

      if (isset($_SESSION['nom']) && isset($_SESSION['email'])) {

        $mail = htmlspecialchars($_POST['mail']);
        $req = $bdd->prepare("INSERT INTO newsletter (auteur,email,email_auteur,phone_auteur) VALUES (?,?,?,?)");
        $req->execute(array( $_SESSION['nom'],$mail,$_SESSION['email'], $_SESSION['phone']));
        $success2 = "Votre adresse email a été prise en compte pour la newsletter !!";
      }
      else{
        $error2 = "Veuillez-vous connecter pour vous inscrire dans la newsletter !!";
      }
    }


  if (isset($_POST['search']) && !empty($_POST['Rechercher'])) {
     header('Location: search.php?search='.$_POST['Rechercher']);
  }

 ?>


<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <img src="images/loader.gif" alt="#" />
        </div>
    </div>
    <!-- end loader -->
    <!-- END LOADER -->

    <!-- Start header -->
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img style="width: 300px;" src="images2/epub+.PNG" alt="image"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link active" href="index.php">Accueil</a></li>
                        <li><a class="nav-link" href="about.php">A&nbsp;Propos</a></li>
                        <li><a class="nav-link" href="campagne.php">Annonces</a></li>
                 <li class="nav-item submenu dropdown"><a href="#" class="nav-link dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="true"aria-expanded="false">Plus</a>
                  <ul class="dropdown-menu">
                     <li class="nav-item">
                      <a class="nav-link" href="forum.php">Forum</a
                      >
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="shop.php">Boutique</a>
                    </li>
                    <?php 
                      if (isset($_SESSION['id_user'])) {
                   ?>
                    <li class="nav-item">
                      <a class="nav-link" href="profil.php?id=<?= $_SESSION['id_user']; ?>">Mon Compte</a>
                    </li>
                <?php 
                }
              ?>
                   <?php 
                       if ( isset($_SESSION['fonction']) && $_SESSION['fonction'] == "administrateur") {
                   ?>
                    <li class="nav-item">
                      <a class="nav-link" href="admin.php">Administration</a>
                    </li>
                  <?php 
                }
              ?>
                  </ul>
                </li>
              <!--?php 
            if (isset($_SESSION['id_user'])) {
              ?-->
              <!--li><button type="button" class="btn btn-primary" style="color: #fff;" href="#" data-toggle="modal" data-target="#modalParametre">Paramètre</button>
              </li-->
        <!--?php 
            }
              ?--> 

          <li>
              <?php if (isset($_SESSION['id_user'])) {
                                             
              echo "<a class='nav-link' style=' cursor: pointer' data-toggle='modal' data-target='#modalDeconnexion' >Deconnexion</a>";
               }else{ echo "<a class='nav-link' style=' cursor: pointer'  data-toggle='modal' data-target='#modallogin' >Connexion</a>"; } ?>
            </li>
            
        <li><a class="nav-link" href="contact.php">Contact</a></li>
                <?php
              if (isset($_SESSION['id_user'])) {
                ?>
                  <li>
                    <!--a class="nav-link" href="profil.php?id=< ! ?= $_SESSION['id_user']; ? >"-->
                      <a class="nav-link" href="profil.php?id=<?= $_SESSION['id_user']; ?>"><img src="images2/users/<?php if($_SESSION['avatar']==NULL){echo 'profil.png';} else{ echo $_SESSION['avatar'];} ?>" style="width: 50px; height: 50px; border-radius: 100px;" alt="img"/></a>
                    </a>
                  </li>
                <?php
              }
            ?>
           </ul>
                </div>
                <!--div class="search-box">
                    <input type="text" class="search-txt" placeholder="Rechercher">
                    <a class="search-btn">
                        <img src="images/search_icon.png" alt="#" />
                    </a>
                </div-->

            </div>
        </nav>
    </header>
    <!-- End header -->

 <?php if (isset($_SESSION['id_user'])): ?>

    <!-- ModalParametre -->
<div class="modal fade" id="modalParametre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Paramètre</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <a href="profil.php?id=<?= $_SESSION['id_user']; ?>" class="btn btn-primary">Mon Profil</a>
          <hr>
          <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalDeconnexion">Deconnexion</a> 
          <a href="#" data-dismiss="modal" class="btn btn-dark">Fermer</a>
        </div>
    </div>
  </div>
</div>

<!-- ModalDeconnection -->
<div class="modal fade" id="modalDeconnexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Déconnexion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Êtes vous sûr de vouloir vous déconnecté ?
          <hr />
          <a href="deconnexion.php" class="btn btn-danger">Oui</a>
          <a href="#" data-dismiss="modal" class="btn btn-info">Non</a>
        </div>
    </div>
  </div>
</div>

<?php endif ?>



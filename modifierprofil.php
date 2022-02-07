<?php include('style/style.php') ?>
<?php include('pages/header.php') ?>

<?php 
  
 if (isset($_POST['validemod'])) {

        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $iduser = $_SESSION['id_user'];
        $pwd1 = sha1($_POST['apwd']);;

        if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['apwd']) && !empty($_POST['pwd']) && !empty($_POST['passconfirm'])) {
            $pwd = sha1($_POST['pwd']);
            $passconfirm = sha1($_POST['passconfirm']);
            $len_pwd = strlen($_POST['pwd']);

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            if ($_SESSION['pwd2'] == $pwd1) {

                    if ($pwd == $passconfirm) {
                        if ($len_pwd >= 4) {

                  if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
                    $taille_max = 10000000;
                    $extensions_valides = array('jpg', 'jpeg', 'png', 'gif');
                    if ($_FILES['avatar']['size'] <= $taille_max) {
                      $extensionsUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                      if (in_array($extensionsUpload, $extensions_valides)) {
                        $chemin = "images2/users/".$_SESSION['id_user'].".".$extensionsUpload;
                        $deplacement = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                        if ($deplacement) {

                            $req = $bdd->prepare("UPDATE utilisateurs SET nom=?, prenom=?, email=?, phone=?, password=?, image=? WHERE id=? ");
                            $req->execute(array($nom,$prenom,$email,$phone,$pwd,$_SESSION['id_user'].".".$extensionsUpload,$iduser));
                           $_SESSION['email'] = $email;
                            $success="Vos parametres ont bien été modifié et seront mises à jour lors de votre prochaine connexion !!";

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
                            $error = "Veillez inserer un photo de profil !!";
                          }
                        }
                        else {
                            $error = "Le mot de passe ne doit pas avoir moins de 4 caractères";
                        }
                    }
                    else{
                        $error = "Les mots de passe ne coïncident pas";
                     }
                 }
                 else{
                     $error = "Impossible de modifier ce profil car l'ancien mot de passe est incorrect !!";
                  }
                 }
              else{
                $error = "Veillez saisir une adresse mail valide";
            }
        }
        else{
            $error = "Veillez remplir tout les champs";
        }
     }
 ?>

<?php if (isset($_SESSION['id_user']) ){ ?> 

<!-- section -->
	
	<section class="inner_banner">
	  <div class="container">
	      <div class="row">
		      <div class="col-12"><br><br><br>
		      	<p style="text-align: center; color: #fff; font-size: 25px; font-weight: bold;" >Modification du profil de <?php  if(isset($_SESSION['prenom'])) {echo $_SESSION['prenom'];} ?></p>
            
             <?php if (isset($error)) {
                                    echo '<div class="alert alert-danger" style="font-size:20px; text-align:center;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$error.'</div>';
                                } ?>
                                <?php if (isset($success)) {
                                    echo '<div class="alert alert-success"  style="font-size:20px; text-align:center;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$success.'</div>';
                                } ?>
				 </div>
			  </div>
		  </div>
	  </div>
	</section>
	
	<!-- end section -->

<br><br>
<h3 style="text-align: center; font-size: 20px;" ><?php  if(isset($_SESSION['nom'])) {echo $_SESSION['nom'];} ?> vous etes sur le point de modifier les parametres de votre profil.</h3>

<div class="mod">

              <form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data" >
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Nom</label><input class="form-control" name="nom" placeholder="Votre nom" value="<?php  if(isset($_SESSION['nom'])) {echo $_SESSION['nom'];} ?>" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Prénom</label><input class="form-control" name="prenom" placeholder="Votre prénom" value="<?php  if(isset($_SESSION['prenom'])) {echo $_SESSION['prenom'];} ?>" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Adresse Email</label><input class="form-control" name="email" id="email" placeholder="Votre email" value="<?php  if(isset($_SESSION['email'])) {echo $_SESSION['email'];} ?>" type="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Téléphone</label><input class="form-control" name="phone" id="mobile" placeholder="Votre téléphone" value="<?php  if(isset($_SESSION['phone'])) {echo $_SESSION['phone'];} ?>" type="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" name="apwd" placeholder="Entrer votre ancien mot de passe" id="password" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                   <input class="form-control" name="pwd" id="passconfirm" placeholder="Entrer votre nouveau mot de passe" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                  <input class="form-control" name="passconfirm" id="passconfirm" placeholder="Confirmer votre nouveau mot de passe"  type="password">
                                </div>
                            </div>
                             <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Photo de profil</label><input class="form-control" name="avatar" id="avatar" placeholder="Photo de profile" value="<?php  if(isset($_SESSION['avatar'])) {echo $_SESSION['avatar'];} ?>" type="file">
                                </div>
                            </div>
                          
                            <div class="row">                           
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="validemod">
                                        Modifier
                                    </button>
                                    <button type="reset" class="btn btn-success">
                                        Recommencer</button>
                                </div>
                            </div>
                        </form>
                </div>

<br><br><br>

<?php include('java/javas.php') ?>
<?php include('pages/footer.php') ?>

<?php 
       }
       else{
        header('Location: index.php');
       }
    ?>

<style type="text/css">
	.mod{
		position: relative;
		left: 290px;
		width: 60%;
		height: 650px;
	}


</style>
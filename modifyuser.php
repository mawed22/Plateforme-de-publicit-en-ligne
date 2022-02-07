<?php include('style/style.php') ?>
<?php include('pages/header.php') ?>

<?php 
   
   $idu = $_GET['id']; 

 if (isset($_POST['valideuser'])) {

        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $role = htmlspecialchars($_POST['role']);

        if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['role']) && !empty($_POST['pwd']) && !empty($_POST['passconfirm'])) {
            $pwd = sha1($_POST['pwd']);
            $passconfirm = sha1($_POST['passconfirm']);
            $len_pwd = strlen($_POST['pwd']);

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    if ($pwd == $passconfirm) {
                        if ($len_pwd >= 4) {

                  if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
                    $taille_max = 10000000;
                    $extensions_valides = array('jpg', 'jpeg', 'png', 'gif');
                    if ($_FILES['avatar']['size'] <= $taille_max) {
                      $extensionsUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                      if (in_array($extensionsUpload, $extensions_valides)) {
                        $chemin = "images2/users/".$idu.".".$extensionsUpload;
                        $deplacement = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                        if ($deplacement) {

                            $req = $bdd->prepare("UPDATE utilisateurs SET nom=?, prenom=?, email=?, phone=?, fonction=?, password=?, image=? WHERE id=? ");
                            $req->execute(array($nom,$prenom,$email,$phone,$role,$pwd,$idu.".".$extensionsUpload,$idu));
                            $success="Les parametres du compte ont bien été modifié !!";

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
                $error = "Veillez saisir une adresse mail valide";
            }
          }
        else{
            $error = "Veillez remplir tout les champs";
        }
     }
 ?>

<?php 
     if ( isset($_SESSION['fonction']) && $_SESSION['fonction'] == "administrateur") {
              ?>

<!-- section -->
	
	<section class="inner_banner">
	  <div class="container">
	      <div class="row">
		      <div class="col-12"><br><br><br>
		      	<p style="text-align: center; color: #fff; font-size: 25px; font-weight: bold;" >Modification d'un profil</p>
            
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
<h2 style="text-align: center;" ><?php  if(isset($_SESSION['nom'])) {echo $_SESSION['nom'];} ?> vous etes sur le point de modifier les parametres du profil d'un utilisateur.</h2>

<div class="mod">

    <?php 
     
     $req = $bdd->query("SELECT * FROM utilisateurs WHERE id = '$idu' ");
     while ($row = $req->fetch()) {

     ?>

              <form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data" >
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Nom</label><input class="form-control" name="nom" value="<?php echo $row['nom']; ?>" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Prénom</label><input class="form-control" name="prenom" value="<?php echo $row['prenom']; ?>" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Adresse Email</label><input class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>" type="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Téléphone</label><input class="form-control" name="phone" id="mobile" value="<?php echo $row['phone']; ?>" type="phone">
                                </div>
                            </div>
                            
                            <!--div class="form-group">
                                <div class="col-sm-12" >
                                    <select class="form-control" name="role"  value="< ! ?php echo $row['fonction']; ?>" >
                                        <option disabled selected> Choissez une fonction</option>
                                        <option>administrateur</option>
                                        <option>agent</option>
                                        <option>utilisateur</option>
                                    </select>
                                </div>
                            </div><br><br-->

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Fonction </label><input class="form-control" name="role" id="mobile" value="<?php echo $row['fonction']; ?>" type="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Mot de passe</label><input class="form-control" name="pwd" value="<?php echo $row['password']; ?>" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Confimation mot de passe</label><input class="form-control" name="passconfirm" id="passconfirm" value="<?php echo $row['password']; ?>"type="password">
                                </div>
                            </div>
                             <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Photo de profil</label><input class="form-control" name="avatar" id="avatar" value="<?php echo $row['image']; ?>" type="file">
                                </div>
                            </div>
                          
                            <div class="row">                           
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="valideuser">
                                        Modifier
                                    </button>
                                    <button type="reset" class="btn btn-success">
                                        Recommencer</button>
                                    <a class="btn btn-dark"  href="admin.php">
                                        Annuler</a>
                                </div>
                            </div>
                        </form>
                    <?php 
                }
                     ?>
                </div>

<br><br><br><br>



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
		height: 700px;
	}


</style>
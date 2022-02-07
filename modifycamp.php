<?php include('style/style.php') ?>
<?php include('pages/header.php') ?>

<?php 
   
   $idu = $_GET['id'];

 if (isset($_POST['validecamp'])) {


        $entreprise = htmlspecialchars($_POST['entreprise']);
        $ville = htmlspecialchars($_POST['ville']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $titre = htmlspecialchars($_POST['titre']);
        $description = htmlspecialchars($_POST['description']);
        $categorie = htmlspecialchars($_POST['categorie']);
        $prix = htmlspecialchars($_POST['prix']);
        $dates = htmlspecialchars($_POST['dates']);

        if (!empty($_POST['entreprise']) && !empty($_POST['ville']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['categorie']) && !empty($_POST['prix']) && !empty($_POST['dates'])) {
           
            $descriptions = strlen($_POST['description']);

             
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
                
                 $req = $bdd->prepare("UPDATE campagnes SET dates=?, entreprise=?, localisation=?, titre=?, description=?, categorie=?, prix=?, email=?, phone=?, image=? WHERE id='$idu' ");
                            $req->execute(array($dates,$entreprise,$ville,$titre,$description,$categorie,$prix,$email,$phone,$titre.".".$extensionsUpload));
                            $success="Les informations de l'annonce ont bien été modifié !!";
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
		      	<p style="text-align: center; color: #fff; font-size: 25px; font-weight: bold;" >Modification d'une annonce</p>
            
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
<h2 style="text-align: center;" ><?php  if(isset($_SESSION['nom'])) {echo $_SESSION['nom'];} ?> vous etes sur le point de modifier les informations d'une annonce publicitaire.</h2>

<div class="mod">

    <?php 
     
     $req = $bdd->query("SELECT * FROM campagnes WHERE id = '$idu' ");
     while ($row = $req->fetch()) {

     ?>

     <form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Nom de l'entreprise</label><input class="form-control" name="entreprise"  value="<?php echo $row['entreprise']; ?>" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                  <label>Localisation</label><input class="form-control" name="ville" value="<?php echo $row['localisation']; ?>" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Adresse email</label><input class="form-control" name="email"  value="<?php echo $row['email']; ?>" type="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Téléphone</label><input class="form-control" name="phone" id="mobile" value="<?php echo $row['phone']; ?>" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Titre de l'annonce</label><input class="form-control" name="titre" id="mobile" value="<?php echo $row['titre']; ?>" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Description du bien ou du service</label><textarea class="form-control" name="description" id="desc" placeholder="<?php echo $row['description']; ?>" type="text"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                   <label>Catégorie du bien ou du service</label><input class="form-control" name="categorie"value="<?php echo $row['categorie']; ?>" type="text">
                                </div>
                            </div>
                             <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Prix du bien ou du service</label><input class="form-control" name="prix" value="<?php echo $row['prix']; ?>" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Date d'ajout du bien ou du service</label><input class="form-control" name="dates"  value="<?php echo $row['dates']; ?>" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Image du bien ou du service</label><input class="form-control"name="image" value="<?php echo $row['image']; ?>" type="file">
                                </div>
                            </div>
                          
                            <div class="row">                           
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="validecamp">
                                       Modifier
                                    </button>
                                    <button type="reset" class="btn btn-success">
                                        Recommencer</button>
                                        <a class="btn btn-dark"  href="allcamp.php">
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
		height: 900px;
	}


</style>
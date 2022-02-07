<?php include('style/style.php') ?>
<?php include('pages/header.php') ?>

<?php  

if (isset($_POST['valide1'])) {

        $entreprise = htmlspecialchars($_POST['entreprise']);
        $ville = htmlspecialchars($_POST['ville']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $titre = htmlspecialchars($_POST['titre']);
        $description = htmlspecialchars($_POST['description']);
        $categorie = htmlspecialchars($_POST['categorie']);
        $prix = htmlspecialchars($_POST['prix']);
        $nom_auteur=htmlspecialchars($_POST['nom']);
        $id_auteur=htmlspecialchars($_POST['id']); 

        if (!empty($_POST['entreprise']) && !empty($_POST['ville']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['categorie']) && !empty($_POST['prix']) && !empty($_POST['nom']) && !empty($_POST['id'])) {

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
                            $req->execute(array($nom_auteur,$dateajout,$entreprise,$ville,$titre,$description,$categorie,$prix,$email,$phone,$id_auteur,$titre.".".$extensionsUpload));
                           //$_SESSION['email'] = $email;
                            $success="Vous avez ajouté une nouvelle publication la plate forme !!";
                             //header('location: campagne.php');
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
                    $error = "Veillez remplir tout les champs";
                }
            }
  

    if(isset($_GET['delete'])){
             if ($id = $_GET['delete']) {
                $bdd->query("DELETE FROM campagnes WHERE id = '$id' ") or die($bdd->error());
                $success = "L'annonce a été supprimé avec succès!!";
                } else {
                 $error = "Une erreur s'est produite !!";
                }
          }

//Récupérer le nombre d'enregistrement dans la table
  $count=$bdd->prepare("SELECT count(id) as cpt FROM campagnes ");
  $count->setFetchMode(PDO::FETCH_ASSOC);
  $count->execute();
  $tcount=$count->fetchAll();

  //pagination
  @$page = $_GET['page'];
  if (empty($page)) {
    $page = 1;
  }
  $nbe = 5;
  $nbpage= ceil($tcount[0]["cpt"]/$nbe);  
  $debut = ($page-1)*$nbe;


?>

<?php 
     if ( isset($_SESSION['fonction']) && $_SESSION['fonction'] == "administrateur") {
              ?>


<!-- section -->
	
	<section class="inner_banner">
	  <div class="container">
	      <div class="row">
		      <div class="col-12">
			     <div class="full">
				      <h3 style="position: relative; top: 40px;">Bienvenue dans la page administration</h3>
				 </div>
			  </div>
		  </div>
	  </div>
	</section>
	
	<!-- end section -->


<div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="admin.php">
                  <span data-feather="home"></span>
                  Nos utilisateurs <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="allcamp.php">
                  <span data-feather="file"></span>
                  Nos Campagnes
                </a>
              </li>
             <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  Nos Agents
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  Nos Articles
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span> Autres</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="allcom.php">
                  <span data-feather="file-text"></span>
                  Les Commentaires
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="allcont.php">
                  <span data-feather="file-text"></span>
                  Les Contacts
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="allnews.php">
                  <span data-feather="file-text"></span>
                  Newsletter
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Plus de <?php echo $tcount[0]["cpt"]; ?>
 annonces publicitaires</h1>
            <?php if (isset($error)) {
                                    echo '<div class="alert alert-danger" style="font-size:20px; text-align:center;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$error.'</div>';
                                } ?>
                                <?php if (isset($success)) {
                                    echo '<div class="alert alert-success"  style="font-size:20px; text-align:center;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$success.'</div>';
                                    } ?>
          <div class="btn-toolbar mb-2 mb-md-0">
  				<nav class="navbar navbar-light bg-light justify-content-between">
  				<form class="form-inline">
   				 <input class="form-control mr-sm-2" type="search" placeholder="Entrer la categorie recherché" aria-label="Search">
   				 <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
  				</form>
				</nav>
            </div>
          </div>
          <a class="btn btn-primary" style="color: #fff; " href="#" data-toggle="modal" data-target="#ajout">Ajouté une publication</a>
          <h1 style="text-align: center;">Les publications disponibles sur la plateforme</h1>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Identifiant</th>
                  <th>Auteur de la campagne</th>
                  <th>Titre de la campagne</th>
                  <th>Localisation</th>
                  <th>Entreprise</th>
                  <th>Catégorie</th>
                  <th>Prix</th>
                  <th>Date de publication</th>
                  <th>Action 1</th>
                  <th>Action 2</th>
                </tr>
              </thead>
              <?php 
                //$req = $bdd->query('SELECT * FROM campagnes ORDER BY id ASC LIMIT $debut,$nbe');
              $req = $bdd->prepare("SELECT * FROM campagnes ORDER BY id ASC LIMIT $debut,$nbe ");
              $req->setFetchMode(PDO::FETCH_ASSOC);
              $req->execute();
                while ($res = $req->fetch()) {
                  ?>
              <tbody>
                <tr>
                  <td><?php echo $res['id']; ?></td>
                  <td><?php echo $res['auteur']; ?></td>
                  <td><?php echo $res['titre']; ?></td>
                  <td><?php echo $res['localisation']; ?></td>
                  <td><?php echo $res['entreprise']; ?></td>
                  <td><?php echo $res['categorie']; ?></td>
                  <td><?php echo $res['prix']; ?></td>
                  <td><?php echo $res['dates']; ?></td>
                   <td><?php echo '<a class="btn btn-success" style="color: #fff; " href="modifycamp.php?id='.$res['id'].'">'?>Modifier</a></td>
                  <td><?php echo '<a class="btn btn-danger" style="color: #fff; " href="?delete='.$res['id'].'">'?>Supprimer</a></td>
                   </tr>
                <?php 

                }
                 ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    
<br>
 <nav aria-label="...">
 <ul class="pagination pagination-lg justify-content-center">
  
   <?php for($i=1; $i<= $nbpage; $i++){
      if ($page == $i) {
        echo "<a style='background-color: #007bff; color: #fff;' class='page-link' href='?page=$i'>$i</a>&nbsp;&nbsp;";
      }
      else{
        echo "<a  class='page-link' href='?page=$i'>$i</a>";
      }
      
    } ?>
  
  </ul>
</nav>
<br>
<br>

   <!-- Button trigger modal -->


<!-- Modal -->
    <div class="modal fade" id="ajout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header tit-up">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <h4  style="text-align: center;">AJOUTE UNE NOUVELLE</h4>
            <div class="modal-body customer-box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li><a class="btn btn-primary" href="#Login" data-toggle="tab">Ajout Publication</a></li>
                </ul><br>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="Login">
                      <form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" name="entreprise" placeholder="Entrer le nom de votre entreprise" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                   <select class="form-control" name="ville" >
                                        <option disabled selected> Choissez votre ville</option>
                                        <option>Douala</option>
                                        <option>Yaoundé</option>
                                        <option>Bafoussam</option>
                                        <option>Kribi</option>
                                        <option>Ebolowa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" name="email"  placeholder="Entrer l'adresse mail de l'entreprise" type="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" name="phone" id="mobile" placeholder="Entrer un numéro de téléphone" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" name="titre" id="mobile" placeholder="Entrer le titre de publication" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="description" id="desc" placeholder="Donner une descriptionde votre publication" type="text"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <select class="form-control" name="categorie">
                                        <option disabled selected> Choissez la catégorie de votre produit ou service</option>
                                        <option>Electronique</option>
                                        <option>Informatique</option>
                                        <option>Offre Emplois-Stages</option>
                                        <option>formations-Education</option>
                                        <option>Immobilier</option>
                                        <option>Loisirs-Sports</option>
                                        <option>Accessoires de mode</option>
                                        <option>Beauté-Santé</option>
                                        <option>Autres</option>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control"name="prix"  placeholder="Entrer le prix de votre service ou produit" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control"name="image"  placeholder="Entrer une image du service ou du produit" type="file">
                                </div>
                            </div>
                          
                            <div class="row">                           
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="valide">
                                       Publier
                                    </button>
                                    <button type="reset" class="btn btn-success">
                                        Recommencer</button>
                                        <button type="button" class="btn btn-dark"  data-dismiss="modal">
                                        Fermer</button>
                                </div>
                            </div>
                        </form>                    </div>
                    
                </div>
            </div>
            
        </div>
      </div>
    </div>

<!--End Modal -->


<?php include('java/javas.php') ?>
<?php include('pages/footer.php') ?>

<?php 
       }
       else{
        header('Location: index.php');
       }
    ?>
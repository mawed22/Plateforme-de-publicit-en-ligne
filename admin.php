<?php include('style/style.php') ?>
<?php include('pages/header.php') ?>

<?php 

if (isset($_POST['valideajoutuser'])) {
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

                            $success="Vous avez créée un nouveau compte utilisateur !!";

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
                $error = "Veillez saisir une adresse mail valide";
            }
        }
        else{
            $error = "Veillez remplir tout les champs";
        }
     }

     if(isset($_GET['delete'])){
             if ($id = $_GET['delete']) {
                $bdd->query("DELETE FROM utilisateurs WHERE id = '$id' ") or die($bdd->error());
                $success = "Le compte  a été supprimé avec succès !!";
                }else {
            $error = "Impossible de supprimer ce compte !!";
          } 
        }

//Récupérer le nombre d'enregistrement dans la table
  $count=$bdd->prepare("SELECT count(id) as cpt FROM utilisateurs ");
  $count->setFetchMode(PDO::FETCH_ASSOC);
  $count->execute();
  $tcount=$count->fetchAll();

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
                  Nos Utilisateurs <span class="sr-only">(current)</span>
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
            <h1 class="h2">Plus de   <?php echo $tcount[0]["cpt"]; ?>  utilisateurs </h1>
            <?php if (isset($error)) {
                                    echo '<div class="alert alert-danger" style="font-size:20px; text-align:center;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$error.'</div>';
                                } ?>
                                <?php if (isset($success)) {
                                    echo '<div class="alert alert-success"  style="font-size:20px; text-align:center;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$success.'</div>';
                                    } ?>
            <div class="btn-toolbar mb-2 mb-md-0">
          
  				<nav class="navbar navbar-light bg-light justify-content-between">
  				<form class="form-inline">
   				 <input class="form-control mr-sm-2" type="search" placeholder="Entrer le nom recherché" aria-label="Search">
   				 <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
  				</form>
				</nav>
            </div>
          </div>
          <a class="btn btn-primary" style="color: #fff; " href="#" data-toggle="modal" data-target="#ajout">Ajouté un utilisateur</a>
          <h1 style="text-align: center;">Utilisateurs de la plateforme</h1>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Identifiant</th>
                  <th>Noms</th>
                  <th>Adresse mail</th>
                  <th>Fonction</th>
                  <th>Action 1</th>
                  <th>Action 2</th>
                </tr>
              </thead>
              <?php
              $req = $bdd->prepare("SELECT * FROM utilisateurs ORDER BY id ASC LIMIT $debut,$nbe ");
              $req->setFetchMode(PDO::FETCH_ASSOC);
              $req->execute();
                while ($res = $req->fetch()) {
                  ?>
              <tbody>
                <tr>
                  <td><?php echo $res['id']; ?></td>
                  <td><?php echo $res['nom']; ?></td>
                  <td><?php echo $res['email']; ?></td>
                  <td><?php echo $res['fonction']; ?></td>
                  <td><?php echo '<a class="btn btn-success" style="color: #fff; " href="modifyuser.php?id='.$res['id'].'">'?>Modifier</a></td>
                  <td><?php echo '<a class="btn btn-danger" style="color: #fff; " href="?delete='.$res['id'].'"> Supprimer</a>'?></td>
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
<br><br><br> 
   <!-- Button trigger modal -->

<!-- Modal -->
    <div class="modal fade" id="ajout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header tit-up">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <h4  style="text-align: center;">AJOUTE UN UTILISATEUR</h4>
            <div class="modal-body customer-box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li><a class="btn btn-primary" href="#Login" data-toggle="tab">Ajout utilisateur</a></li>
                </ul><br>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="Login">
                     <form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data" >
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" name="nom" placeholder="Votre nom" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" name="prenom"  placeholder="Votre prénom" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" name="email" id="email" placeholder="Votre email" type="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" name="phone" id="mobile" placeholder="Votre téléphone" type="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" name="pwd" id="password" placeholder="Votre mot de passe" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" name="passconfirm" id="passconfirm" placeholder="Confirmez votre mot de passe" type="password">
                                </div>
                            </div>
                             <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" name="avatar" id="avatar" placeholder="Photo de profile" type="file">
                                </div>
                            </div>
                          
                            <div class="row">                           
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="valideajoutuser">
                                        Ajouter
                                    </button>
                                    <button type="reset" class="btn btn-success">
                                        Recommencer</button>
                                    <button type="button" class="btn btn-dark"  data-dismiss="modal">
                                        Fermer</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
        //$error = "Attention vous n'avez le droit d'accès à cette page !!";
       }
    ?>


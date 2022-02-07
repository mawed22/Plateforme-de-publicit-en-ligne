<?php include('style/style.php') ?>
<?php include('pages/header.php') ?>

<?php 

     if(isset($_GET['delete'])){
             if ($id = $_GET['delete']) {
                $bdd->query("DELETE FROM commentaire WHERE id = '$id' ") or die($bdd->error());
                $success = "Le commentaire a été supprimé avec succès !!";
                }else {
            $error = "Impossible de supprimer ce commentaire !!";
          } 
        }
 //Récupérer le nombre d'enregistrement dans la table
  $count=$bdd->prepare("SELECT count(id) as cpt FROM commentaire ");
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
            <h1 class="h2">Plus de <?php echo $tcount[0]["cpt"]; ?> commentaires </h1>
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
          <h1 style="text-align: center;">Commentaires disponibles sur la plateforme</h1>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Identifiant</th>
                  <th>Noms</th>
                  <th>Commentaire</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php
              $req = $bdd->prepare("SELECT * FROM commentaire ORDER BY id ASC LIMIT $debut,$nbe ");
              $req->setFetchMode(PDO::FETCH_ASSOC);
              $req->execute();
                while ($res = $req->fetch()) {
                  ?>
              <tbody>
                <tr>
                  <td><?php echo $res['id']; ?></td>
                  <td><?php echo $res['auteur']; ?></td>
                  <td><?php echo $res['message']; ?></td>
                  <td><?php echo $res['dates']; ?></td>
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
<br><br><br>
   <!-- Button trigger modal -->

<?php include('java/javas.php') ?>
<?php include('pages/footer.php') ?>

<?php 
       }
       else{
        header('Location: index.php');
        //$error = "Attention vous n'avez le droit d'accès à cette page !!";
       }
    ?>
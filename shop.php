<?php include('pages/config.php') ?>
<?php include('style/style.php') ?>
<?php include('pages/header.php') ?>
<!--?php include('style/style2.php') ?-->

<?php 


   //Récupérer le nombre d'enregistrement dans la table
  $count=$bdd->prepare("SELECT count(id_prod) as cpt FROM boutique ");
  $count->setFetchMode(PDO::FETCH_ASSOC);
  $count->execute();
  $tcount=$count->fetchAll();

 ?>
<!-- section -->
	
	<section class="inner_banner">
	  <div class="container">
	      <div class="row">
		      <div class="col-12">
		      	<div class="full"><br><br><br><br>
			     	<p style="text-align: center; color: #fff; font-size: 25px; font-weight: bold;" >Espace Boutique</p>
				 </div>
			  </div>
		  </div>
	  </div>
	</section>
	
	<!-- end section -->

<!-- end section -->
<div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
             <ul class="nav flex-column">
              <li class="nav-item">
                  <span class="nav-link active" data-feather="home"></span><br>
                  <h4> Nos différents articles</h4><!--span class="sr-only">(current)</span-->
                  <hr>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file"></span>
                  Ordinateurs
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  Chaussures
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                 Vetements
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                 Autres
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Liste des articles </h1>
            <div>
                <a class="primary-btn" style="margin-top: 20px" href="#"><span> Ajouter un article</span><i class="ti-arrow-right ml-1"></i></a>
                    </div>
            
            <div class="btn-toolbar mb-2 mb-md-0">
          
          <nav class="navbar navbar-light bg-light justify-content-between">
          <form class="form-inline" method="POST">
           <input class="form-control mr-sm-2" type="search" placeholder="Entrer une catégorie" aria-label="Search" name="Rechercher">
           <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">Rechercher</button>
          </form>
        </nav>
            </div>
          </div>
          <!--h1 style="text-align: center;">Utilisateurs de la plateforme</-->
          <div class="table-responsive">

             <!--================ Start Popular Courses Area =================-->
    <div class="popular_courses">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <!--h2 class="mb-3"> Aucun article disponible </h2-->
              <h3 style="text-align: center; font-size: 30px;">
                 <?php echo $tcount[0]["cpt"]; ?> article disponible pour le moment.
              </h3>
            </div>
          </div>
        </div>
        
            
      </div>
    </div>
    <!--================ End Popular Courses Area =================-->
          </div>
        </main>
      </div>
    </div>
    <div>

 <br><br><br><br><br>


<?php include('java/javas.php') ?>
<?php include('pages/footer.php') ?>
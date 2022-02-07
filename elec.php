<?php include('style/style.php') ?>
<?php include('pages/header.php') ?>
<!--?php include('style/style2.php') ?-->

<?php 
include('pages/config.php');
include('pages/newannonce.php');

     //Récupérer le nombre d'enregistrement dans la table
  $count=$bdd->prepare("SELECT count(id) as cpt FROM campagnes WHERE categorie= 'Electronique' ");
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
                  <p style="text-align: center; color: #fff; font-size: 25px; font-weight: bold;" >Nos Annonces</p>
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
      </div>
    </section>
    
    <!-- end section -->
<div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
             <ul class="nav flex-column">
              <li class="nav-item">
                  <span class="nav-link active" data-feather="home"></span><br>
                  <h4> Nos différentes catégories</h4><!--span class="sr-only">(current)</span-->
                  <hr>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="elec.php">
                  <span data-feather="file"></span>
                  Electronique
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="info.php">
                  <span data-feather="file"></span>
                  Informatique
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="emploi.php">
                  <span data-feather="shopping-cart"></span>
                  Offre Emplois/Stage
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="format.php">
                  <span data-feather="shopping-cart"></span>
                 Formations/Education
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="immob.php">
                  <span data-feather="shopping-cart"></span>
                 Immobilier
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="loisirs.php">
                  <span data-feather="shopping-cart"></span>
                  Loisirs/Sports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="mode.php">
                  <span data-feather="shopping-cart"></span>
                 Accessoires de mode
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="sante.php">
                  <span data-feather="shopping-cart"></span>
                 Beauté/Santé
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="older.php">
                  <span data-feather="shopping-cart"></span>
                 Autres
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Liste des annonces </h1>
            <div style="">
                <?php if (isset($_SESSION['id_user'])) {
                                             
              echo '<a class="primary-btn" data-toggle="modal" data-target="#login" style="margin-top: 20px" href="#" ><span> Nouvelle Annonce</span><i class="ti-arrow-right ml-1"></i></a>';
               }else{ echo "<a class='primary-btn' href='connexion.php'><span> Nouvelle Annonce</span><i class='ti-arrow-right ml-1'></i></a>"; } ?>
            </div>
            
            <div class="btn-toolbar mb-2 mb-md-0">
          
          <nav class="navbar navbar-light bg-light justify-content-between">
          <<form class="form-inline" method="POST">
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
              <h2 class="mb-3">  <?php echo $tcount[0]["cpt"]; ?> annonces dans la catégorie Electronique </h2>
              <p>
                Il s'agit de toutes les annonces de la catégorie Electronique disponibles sur ePUB+.
              </p>
            </div>
          </div>
        </div>
        
            
        <div class="row">
          <!-- single course -->
          <div class="col-lg-12">
            <div class="owl-carousel active_course">
            <?php 
         $slt = $bdd->query("SELECT * FROM campagnes WHERE categorie= 'Electronique' ");

         while($se=$slt->fetch()){

         ?> 
              <div class="single_course">
                <div class="course_head">
                <?php echo '<a  href="affich.php?cat='.$se["categorie"].'&id='.$se["id"].'&titre='.$se["titre"].'">'?><?php echo '<img class="img-fluid" style="height:300px; width:400px;"  src="images2/campagnes/'.$se['image'].'" alt="" />'; ?></a> 
                 <div class="ribbon">
                   <div class="txt">
                  <?php echo $se["prix"]; ?>
                   </div>
                   </div>
                </div>
                <div class="course_content">
                  <span class="tag mb-4 d-inline-block"><?php echo $se["entreprise"]; ?></span>
                  <h4 class="mb-3">
                    <?php echo '<a  href="affich.php?cat='.$se["categorie"].'&id='.$se["id"].'&titre='.$se["titre"].'">'?><?php echo $se["categorie"]; ?></a>
                  </h4>
                  <p style="text-align: left;">
                    <?php echo $se["titre"]; ?>
                  </p>
                  <div
                    class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4"
                  >
                    <div class="authr_meta">
                      <img src="img/courses/author1.png" alt="" />
                      <span class="d-inline-block ml-2"><i class="ti-location-pin"></i><?php echo $se["localisation"]; ?></span>
                    </div>
                    <div class="mt-lg-0 mt-3">
                      <!--span class="meta_info mr-4">
                        <a href="#"> <i class="ti-user mr-2"></i>25 </a>
                      </span-->
                      <span class="meta_info"
                        ><a href="#"> <i class="ti-timer"></i><?php echo $se["dates"]; ?> </a></span
                      >
                    </div>
                  </div>
                </div>
              </div>
         <?php 
         }

          ?>
          
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


 <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header tit-up">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <h4  style="text-align: center;">NOUVELLE PUBLICATION</h4>
            <div class="modal-body customer-box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li><a class="btn btn-warning" href="#Registration" data-toggle="tab">Publication</a></li>
                </ul><br>
                <!-- Tab panes -->
                    <div class="tab-pane" id="Registration">
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
                                    <label>Image du produit/service</label><input class="form-control"name="image"  placeholder="Entrer une image du service ou du produit" type="file">
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
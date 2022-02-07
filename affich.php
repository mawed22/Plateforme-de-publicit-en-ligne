

<?php include('style/style.php') ?>
<?php include('pages/header.php') ?>
<?php include('pages/config.php') ?>


  <?php 
  $ctg=$_GET['cat']; 
  $id=$_GET['id'];
  $titre=$_GET['titre'];

  //Récupérer le nombre d'enregistrement dans la table
  $count=$bdd->prepare("SELECT count(id) as cpt FROM campagnes WHERE categorie='$ctg' ");
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
                  <p style="text-align: center; color: #fff; font-size: 25px; font-weight: bold;" > <?php echo $titre; ?></p>
                 </div>
              </div>
          </div>
      </div>
    </section><br><br>

    <!-- section -->
    <div class="section tabbar_menu">
       <div class="container">
          <div class="row">
              <div class="col-md-12">
                 <div class="tab_menu">
                    <img src="images2/im8.GIF " style=" position: relative; left: 100px; width: 840px; height: 109px;">
                 </div>
              </div>
          </div>
       </div>
    </div>
    <!-- end section -->

    <div class="mod">
        <br>
         <?php 
         $slt = $bdd->prepare("SELECT * FROM campagnes WHERE id =? ");
         $slt->execute(array($id));

         while($se=$slt->fetch()){

         ?> 
         <h3><?php echo $se['titre']; ?></h3>
         <h4>Publié par <i class="ti-user"></i><?php echo $se['auteur']; ?>&emsp;&emsp;<i class="ti-timer"></i>Le <?php echo $se["dates"]; ?></h4> <hr>

        <div class="h_blog_img">
               <?php echo '<img class="img-fluid" style="height:350px; width:600px;"  src="images2/campagnes/'.$se['image'].'" alt="" />'; ?>
            </div>
               <div>
                    <a class="primary-btn" data-toggle="modal" data-target="#exampleModalCenter" style="margin-top: 20px" href="#"><span> Contactez l'annonceur</span><i class="ti-arrow-right ml-1"></i></a>

                    <span style="color: #333; font-size: 20px; position: relative; left: 100px; top: 5px;"><i class="ti-mobile"></i>&emsp;<?php echo $se['phone']; ?></span>
                    <span style="color: #333; font-size: 20px; position: relative; left: 200px; top: 5px;"><i class="ti-email "></i>&emsp;<?php echo $se['email']; ?></span>
<!-- Modal -->
     <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h4 style="text-align: center;">Contacts de l'annonceur</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
           </button>
      </div>
      <div class="modal-body">
       <h5>Contactez l'annonceur par téléphone</h5>
     <p><a href="#" role="button" class="btn btn-success popover-test" title="Popover title" data-content="Popover body content is set in this attribute.">Phone</a>&emsp;<i class="ti-mobile"></i> <span style="color: #333; font-size: 22px;"> <?php echo $se['phone']; ?></span></p><hr> 
     <h5>Contactez l'annonceur par mail</h5>
     <p><a href="#" role="button" class="btn btn-primary popover-test" title="Popover title" data-content="Popover body content is set in this attribute.">@ Email</a>&emsp;<i class="ti-email "></i> <span style="color: #333; font-size: 22px;"><?php echo $se['email']; ?></span> </p> 
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<!--End Modal-->
              </div> 

            <hr>
                <div style="width: 60%; height: 300px ; color: #333;">
                    <?php echo $se['description']; ?><br>
                </div>
            <span style="color: #fff; font-size: 20px;" class="btn btn-primary"><i class="ti-home"></i>&emsp;<?php echo $se['entreprise']; ?></span>
            <span style="color: #fff; font-size: 20px; position: relative; left: 60px;" class="btn btn-success"><i class="ti-shopping-cart ">&emsp;</i><?php echo $se['prix']; ?></span>
          <span style="color: #fff; font-size: 20px; position: relative; left: 120px;" class="btn btn-warning"><i class="ti-package ">&emsp;</i><?php echo $se['categorie']; ?></span>


          <?php   if ( isset($_SESSION['fonction']) && @$_SESSION['fonction'] == "administrateur" OR @$_SESSION['fonction'] == "agent") { 
           echo '<span style="color: #fff; font-size: 20px; position: relative; left: 180px;" class="btn btn-dark" data-toggle="modal" data-target="#Partager" ><i class="ti-sharethis">&emsp;</i>Partager</span>';
           }
           else{
            echo '';
           }
         ?>

         <!-- Modal -->
     <div class="modal fade" id="Partager" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h4 style="text-align: center;">Partager l'annonce sur vos reseaux sociaux</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
           </button>
      </div>
      <div class="modal-body">
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="elfsight-app-1e3d2373-466e-465b-a9b4-69047d652068"></div>
       <!--h5>Partager l'annonce sur facebook</h5>
     <p><a href="#" role="button" class="btn btn-success popover-test" title="Popover title" data-content="Popover body content is set in this attribute.">Phone</a>&emsp;<i class="ti-mobile"></i> <span style="color: #333; font-size: 22px;"> <!?php echo $se['phone']; ?></span></p><hr> 
     <h5>Partager l'annonce sur instagram</h5>&emsp;<i class="ti-facebook"></i>
     <p><a href="#" role="button" class="btn btn-primary popover-test" title="Popover title" data-content="Popover body content is set in this attribute.">@ Email</a>&emsp;<i class="ti-email "></i> <span style="color: #333; font-size: 22px;"><!?php echo $se['email']; ?></span> </p--> 
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<!--End Modal-->


          <!--span style=" position: relative; left: 150px;" ><i class="bi /span>bi-cloud-arrow-down"></i></span--> 
                <hr>
                <?php 
                } ?>
           </div><br><br><br>
  <!--================ Start Popular Courses Area =================-->
    <div class="popular_courses">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h3 class="mb-3"><?php echo $tcount[0]["cpt"]; ?> annonces simillaires</h3>
              <p>
                Il s'agit de toutes les annonces de la catégorie <?php echo $ctg; ?>  disponibles sur la  plateforme
              </p>
            </div>
          </div>
        </div><br><br>
        
            
        <div class="row">
          <!-- single course -->
          <div class="col-lg-12">
            <div class="owl-carousel active_course">
        <?php 
         $slt = $bdd->prepare("SELECT * FROM campagnes WHERE categorie =? ");
         $slt->execute(array($ctg));

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
                  <!--span class="price"></span-->
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
                        ><a href="#"><i class="ti-timer"></i><?php echo $se["dates"]; ?></a></span
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


<!--================ Start Testimonial Area =================-->
    <div class="bll">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Ce que disent nos clients</h2>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="testi_slider owl-carousel">


          <?php 
          $requser = $bdd->query('SELECT * FROM  commentaire ');
          while ($resultat = $requser->fetch()) {
            ?>
            <!--div class="testi_item"-->
              <div class="row">
                <div class="col-lg-4 col-md-6">
                <?php echo '<img style="border-radius: 100px; width: 100px; height: 100px;" src="images2/users/'.$resultat['image'].'" alt="" />'; ?> 
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    <h5><?php echo $resultat['auteur']; ?></h5>
                    <p style="max-height: 200px;">
                       <?php echo $resultat['message']; ?> 
                    </p>
                  </div>
                </div>
              </div>
            <!--/div-->
            <?php
          }
          ?>
          </div>
        </div>
      </div>
    </div><br><br><br><br>
    <!--================ End Testimonial Area =================-->
 
 
    <style type="text/css">
    .mod{
        position: relative;
        left: 290px;
        width: 70%;
        height: 900px;
    }
</style>
<?php include('java/javas.php') ?>
<?php include('pages/footer.php') ?>
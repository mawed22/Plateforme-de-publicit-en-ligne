
<?php include('style/style.php') ?>
<!--?php include('style/style2.php') ?-->
<?php include('pages/header.php') ?>

<?php 
if (isset($_SESSION['id_user'])) {
   
 }else{
  include('pages/slider.php');
 }
 ?>

<?php 

   //Récupérer le nombre d'enregistrement dans la table
  $count=$bdd->prepare("SELECT count(id) as cpt FROM campagnes ");
  $count->setFetchMode(PDO::FETCH_ASSOC);
  $count->execute();
  $tcount=$count->fetchAll();

 ?>

	<div class="section tabbar_menu">
	   <div class="container">
	      <div class="row">
		      <div class="col-md-12">
			     <div class="tab_menu">
				    <img src="images2/im1.gif " style="width: 1040px; height: 109px;">
				 </div>
			  </div>
		  </div>
	   </div>
	</div>
	<!-- end section -->
  
     <?php if (isset($error)) {
                                    echo '<div class="alert alert-danger" style="font-size:20px; text-align:center;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$error.'</div>';
                                } ?>
                                <?php if (isset($success)) {
                                    echo '<div class="alert alert-success"  style="font-size:20px; text-align:center;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$success.'</div>';
                                } ?>
	<!-- section -->
    <div class="section margin-top_50">
        <div class="container">
            <div class="row">
                <div class="col-md-6 layout_padding_2">
                    <div class="full">
                        <div class="heading_main text_align_left">
						   <h2><span>Bienvenue sur</span> ePUB+</h2>
                        </div>
						<div class="full">
						  <p>ePUB+ est une plateforme de publicité en ligne permettant de faire la promotion des articles, annonces... afin de faire connaitre les biens ou services permettant aux utilisateurs de trouver facilement les produits ou services dont ils ont besoins.  </p>
						</div>
						<div class="full">
						   <a class="hvr-radial-out button-theme" href="about.php"> Lire plus</a>
						</div>
                    </div>
                </div>
				<div class="col-md-6">
                    <div class="full">
                        <img style="width: 540px; height: 300px;" src="images2/agence2.JPG" alt="#" />
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- end section -->

<!-- Start Widgets cookies -->
 <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-5e97a0d3-2c7a-4d46-af64-0540d45affe7"></div>
	<!--End Widgets cookies -->


	<!-- section -->
    <div class="section margin-top_50 silver_bg">
        <div class="container">
            <div class="row">
			    <div class="col-md-6">
                    <div class="full float-right_img">
                        <img  style="width: 582px; height: 380px;" src="images2/pub4.JPG" alt="#" />
                    </div>
                </div>
                <div class="col-md-6 layout_padding_2">
                    <div class="full">
                        <div class="heading_main text_align_left">
						   <h2>Plus de <?php echo $tcount[0]["cpt"]; ?><span> annonces</h2>
                        </div>
						<div class="full">
						  <p>La publicité en ligne (ou e-publicité) désigne toute action visant à promouvoir un produit, service (économie), une marque ou une organisation auprès d’un groupe d’internautes et/ou de mobinautes contre une rémunération. La publicité en ligne est de deux types : Display (bannières) et Search (liens promotionnels). La publicité en ligne permet la transposition sur Internet de la publicité traditionnelle dans les médias à travers les plateforme ou les réseaux sociaux.Elle permet à l’internaute d’acheter immédiatement via des liens (en cliquant sur des bannières).</p>
						</div>
						<!--div class="full">
						   <a class="hvr-radial-out button-theme" href="#">Apply</a>
						</div-->
          </div>
        </div>
			</div>
    </div>
  </div><br><br>
	<!-- end section -->
    
	<!--================ Start Popular Courses Area =================-->
    <div class="popular_courses">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Nouvelles publications</h2>
              <p>
                Ces annonces ont été recemment ajouté sur la plate-forme
              </p>
            </div>
          </div>
        </div>
        
            
        <div class="row">
          <!-- single course -->
          <div class="col-lg-12">
            <div class="owl-carousel active_course">
        <?php 
         $slt = $bdd->query("SELECT * FROM campagnes ORDER BY id DESC LIMIT 9");

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
    <!--/div-->
    <!--================ End Popular Courses Area =================-->

    <!--================ Start Testimonial Area =================-->
    <div class="bll">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Ce que disent nos clients <br>
                 
                 <?php if (isset($_SESSION['id_user'])) {
                                             
              echo '<a class="contact_bt" style="position:relative; left: 100px;" href="#" data-toggle="modal" data-target="#login2"><span>Commentaire</span></a>';
               }else{ echo '<a class="contact_bt" style="position:relative; left: 100px;" href="connexion.php"><span>Commentaire</span></a>'; } ?>


                <!--a class="contact_bt" style="position:relative; left: 100px;" href="#" data-toggle="modal" data-target="#login2"><span>Commentaire</span></a--></h2><br>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="testi_slider owl-carousel">


          <?php 
          $requser = $bdd->query('SELECT * FROM  commentaire ORDER BY id DESC LIMIT 10');
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
    </div>
    <?php if (isset($error1)) {
                        echo '<div class="alert alert-danger" style="font-size:20px; text-align:center;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$error1.'</div>';
                    } ?>
                    <?php if (isset($success1)) {
                        echo '<div class="alert alert-success"  style="font-size:20px; text-align:center;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$success1.'</div>';
                    } ?>
    
    <!--================ End Testimonial Area =================-->

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="login2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header tit-up">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <h4  style="text-align: center;">AJOUTER UN COMMENTAIRE</h4>
            <div class="modal-body customer-box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li><a class="btn btn-primary" href="#Login2" data-toggle="tab">Commentaire</a></li>
                </ul><br>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="Login2">
                        <form role="form" enctype="multipart/form-data" class="form-horizontal" method="POST" action="">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="comment" id="desc" placeholder="Ajouter votre commentaire ici" type="text"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-info" name="valide3">
                                        Envoyer
                                    </button>
                                    <button type="reset" class="btn btn-success">Recommencer</button>
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
    </div>

<!--End Modal -->

   <!--?php include('java/javas2.php') ?-->
   <?php include('java/javas.php') ?>
   <?php include('pages/footer.php') ?>
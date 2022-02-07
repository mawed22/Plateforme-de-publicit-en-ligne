<?php include('style/style.php') ?>
<?php include('pages/header.php') ?>

<?php 
 $ids=$_SESSION['id_user'];
 //Récupérer le nombre d'enregistrement dans la table
  $count=$bdd->prepare("SELECT count(id) as cpt FROM campagnes WHERE id_auteur = '$ids' ");
  $count->setFetchMode(PDO::FETCH_ASSOC);
  $count->execute();
  $tcount=$count->fetchAll();
 ?>
 
	<?php if (isset($_SESSION['id_user']) ){ ?>	
 

	<!-- section -->
	
	<section class="inner_banner">
	  <div class="container">
	      <div class="row">
		      <div class="col-12">
			     <div class="full"><br><br><br><br>
                  <p style="text-align: center; color: #fff; font-size: 25px; font-weight: bold;" >Bienvenue <?php  if(isset($_SESSION['prenom'])) {echo $_SESSION['prenom'];} ?></p>
				 </div>
			  </div>
		  </div>
	  </div>
	</section>
	<div class="mod">
		<br>
		<div class="h_blog_img">
              <img class="img-fluid" src="images2/users/<?php if($_SESSION['avatar']==NULL){echo 'profil.png';} else{ echo $_SESSION['avatar'];} ?>"  style="width: 80px; height: 80px; border-radius: 160px;" alt="img"/>
              <a href="#" style="position: relative; left: 450px;" class="btn btn-danger" data-toggle="modal" data-target="#modalDeconnexion">Deconnexion<i class="ti-arrow-left ml-1"></i></a>
            </div>
                <h4>Salut <?php echo $_SESSION['prenom']; ?></h4>
                <p>
                  Ici vous aurez toutes les informations relatives à votre compte.
                </p>
                <p>
                  Exprimez vous sur notre forum afin de vous familiariser avec les autres utilisateurs.
                </p>
                <a class="primary-btn" href="forum.php">
                  Forum ePUB+ <i class="ti-arrow-right ml-1"></i>
                </a>
                <a class="primary-btn" style="margin-top: 20px" href="campagne.php">
                  Passer une nouvelle annonce<i class="ti-arrow-right ml-1"></i>
                </a>
                <hr><br>
                <h3>Informations personnelles</h3>
                <span style="color: #333;">Votre Nom: &emsp; <?php echo $_SESSION['nom']; ?></span><br>
                <span style="color: #333;">Votre Prénom: &emsp; <?php echo $_SESSION['prenom']; ?></span><br>
                <span style="color: #333;">Votre Fonction:&emsp; <?php echo $_SESSION['fonction']; ?></span><br>
                <span style="color: #333;">Votre Adresse email:&emsp; <?php echo $_SESSION['email']; ?></span><br>
                <span style="color: #333;">Votre Numéro de téléphone:&emsp; <?php echo $_SESSION['phone']; ?></span><br>
                <span style="color: #333;">Nombre d'annonces publiées:&emsp; <span style=" font-size: 20px;" class="btn btn-warning"><?php  echo $tcount[0]["cpt"];?></span></span>
                <a class="primary-btn"  style="position: relative; left: 80px;" href="modifierprofil.php?id=<?= $_SESSION['id_user']; ?>">
                  Modifier Profil<i class="ti-arrow-right ml-1"></i></a><br>
                <hr>
           </div><br><br><br><br><br><br><br><br>
  <!--================ Start Popular Courses Area =================-->
    <div class="popular_courses">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h3 class="mb-3">Vos différentes annonces</h3>
              <p>
                Il s'agit de toutes les annonces que vous avez ajouté sur notre plateforme
              </p>
            </div>
          </div>
        </div><br><br>
        
            
        <div class="row">
          <!-- single course -->
          <div class="col-lg-12">
            <div class="owl-carousel active_course"> 
        <?php 
         $slt = $bdd->prepare("SELECT * FROM campagnes WHERE id_auteur =? ");
         $slt->execute(array($_SESSION['id_user']));

         while($se=$slt->fetch()){

         ?> 

               <div class="single_course">
                <div class="course_head">
                 <?php echo '<img class="img-fluid" style="height:300px; width:400px;"  src="images2/campagnes/'.$se['image'].'" alt="" />'; ?> 
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


<!--================ Start Testimonial Area =================-->
    <div class="bll">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h3 class="mb-3">Vos différents commentaires</h3>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="testi_slider owl-carousel">


          <?php 
         $requser = $bdd->prepare("SELECT * FROM commentaire WHERE id_auteurs =? ");
         $requser->execute(array( $_SESSION['id_user']));

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
            </div>
            <?php
          }
          ?>
          </div>
        </div>
      </div>
    </div><br><br><br>
    <!--================ End Testimonial Area =================-->
 
    <!--================ End About Area =================-->

    <style type="text/css">
	.mod{
		position: relative;
		left: 290px;
		width: 50%;
		height: 400px;
	}
</style>
<?php include('java/javas.php') ?>
<?php include('pages/footer.php') ?>

<?php 
       }
       else{
        header('Location: index.php');
       }
    ?>
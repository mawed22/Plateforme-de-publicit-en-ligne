<?php 

//Récupérer le nombre d'enregistrement dans la table
  $count=$bdd->prepare("SELECT count(id) as cpt FROM campagnes ");
  $count->setFetchMode(PDO::FETCH_ASSOC);
  $count->execute();
  $tcount=$count->fetchAll();

  //Récupérer le nombre d'enregistrement dans la table
  $count2=$bdd->prepare("SELECT count(id) as cpt FROM utilisateurs ");
  $count2->setFetchMode(PDO::FETCH_ASSOC);
  $count2->execute();
  $tcount2=$count2->fetchAll();

?>

<!-- Start Banner -->
    <div class="ulockd-home-slider">
        <div class="container-fluid">
            <div class="row">
                <div class="pogoSlider" id="js-main-slider">
                    <div class="pogoSlider-slide" style="background-image:url(images2/im1.jpg);">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slide_text">
                                        <div  style="z-index: 5;background-color:rgba(0, 0, 0, 0.5);border-color:rgba(0, 0, 0, 0.50);">
                                        <h3><span span class="theme_color">Bienvenue sur ePUB+</span><br><span style="font-size: 30px">Postez vos articles et vos annonces ici.</span></h3>
                                        <h4><span style="font-size: 25px">
                                   <?php if (isset($_SESSION['fonction'])) {
                                      if (  $_SESSION['fonction'] == "administrateur") {
                                            echo "Vous etes connecté en tant que Administrateur";
                                          }else{ 
                                          echo "Vous etes connecté en tant que Utilisateur";
                                          }
                                    } ?></span></h4>
                                        </div>
                                        <br>
                    <div class="full center">
										    <?php if (isset($_SESSION['id_user'])) {
                                             
                                 echo "<span class='contact_bt' style='background-color : #002347; color: #fff; cursor: pointer' data-toggle='modal' data-target='#modalDeconnexion' >Se Deconnecter</span>";
                                }else{ echo "<span class='contact_bt' style=' color: #fff; cursor: pointer' data-toggle='modal' data-target='#modallogin' >Se Connecter</span>"; } ?>
									             	</div>
                                    </div>
                                </div>
                        <?php if (isset($error)) {
                                    echo '<div class="alert alert-danger" style="font-size:20px; text-align:center;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$error.'</div>';
                                } ?>
                                <?php if (isset($success)) {
                                    echo '<div class="alert alert-success"  style="font-size:20px; text-align:center;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$success.'</div>';
                                } ?>
                            </div>
                        </div>
                    </div>
                    <div class="pogoSlider-slide" style="background-image:url(images2/im2.jpg);">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slide_text">
                                      <div  style="z-index: 5;background-color:rgba(0, 0, 0, 0.5);border-color:rgba(0, 0, 0, 0.50);">
                                        <h3><span span class="theme_color">Sur cette plate-forme</span><br><span style="font-size: 30px"> Déja plus de <?php echo $tcount2[0]["cpt"]; ?> utilisateurs sur ePUB+.</span></h3>
                                        <h4><span style="font-size: 25px">
                                    <?php if (isset($_SESSION['fonction'])) {
                                      if (  $_SESSION['fonction'] == "administrateur") {
                                            echo "Vous etes connecté en tant que Administrateur";
                                          }else{ 
                                          echo "Vous etes connecté en tant que Utilisateur";
                                          }
                                    } ?></span></h4>
                                        </div>
                                        <br>
                                        <div class="full center">

                                           <?php if (isset($_SESSION['id_user'])) {
                                             
                                 echo "<span class='contact_bt' style='background-color : #002347; color: #fff; cursor: pointer' data-toggle='modal' data-target='#modalDeconnexion' >Se Deconnecter</span>";
                                }else{ echo "<span class='contact_bt' style=' color: #fff; cursor: pointer' data-toggle='modal' data-target='#modallogin' >Se Connecter</span>"; } ?>

										             <!--a class="contact_bt" href="courses.html">Start a Course</a-->
										                </div>
                                    </div>
                                </div>
                                <?php if (isset($error)) {
                                    echo '<div class="alert alert-danger" style="font-size:20px; text-align:center;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$error.'</div>';
                                } ?>
                                <?php if (isset($success)) {
                                    echo '<div class="alert alert-success"  style="font-size:20px; text-align:center;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$success.'</div>';
                                } ?>
                            </div>
                        </div>
                    </div>
                    <div class="pogoSlider-slide" style="background-image:url(images2/im6.jpg);">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slide_text">
                                      <div  style="z-index: 5;background-color:rgba(0, 0, 0, 0.5);border-color:rgba(0, 0, 0, 0.50);">
                                        <h3><span span class="theme_color">Bienvenue sur ePUB+</span><br><span style="font-size: 30px">Nous avons déja plus de <?php echo $tcount[0]["cpt"]; ?> annonces publicitaires disponibles.</span></h3>
                                        <h4><span style="font-size: 25px">
                                   <?php if (isset($_SESSION['fonction'])) {
                                      if (  $_SESSION['fonction'] == "administrateur") {
                                            echo "Vous etes connecté en tant que Administrateur";
                                          }else{ 
                                          echo "Vous etes connecté en tant que Utilisateur";
                                          }
                                    } ?></span></h4>
                                        </div>
                                        <br>
                                        <div class="full center">
                                            <?php if (isset($_SESSION['id_user'])) {
                                             
                                            echo "<span class='contact_bt' style='background-color : #002347; color: #fff; cursor: pointer' data-toggle='modal' data-target='#modalDeconnexion' >Se Deconnecter</span>";
                                          }else{ echo "<span class='contact_bt' style=' color: #fff; cursor: pointer' data-toggle='modal' data-target='#modallogin' >Se Connecter</span>";} ?>
                                        </div>
                                    </div>
                                </div>
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
                <!-- .pogoSlider -->
            </div>
        </div>
    </div>
    <!-- End Banner -->



 
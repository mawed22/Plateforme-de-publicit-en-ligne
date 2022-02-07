 

	<div class="section tabbar_menu">
	   <div class="container">
	      <div class="row">
		      <div class="col-md-12">
			     <div class="tab_menu">
				    <img src="images2/im2.gif " style="width: 1040px; height: 109px;">
				 </div>
			  </div>
		  </div>
	   </div>
	</div>
	<!-- end section -->
 <!-- Start Footer -->
    <footer class="footer-box">
        <div class="container">
	
		   <div class="row">
		   
		      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
			     <div class="footer_blog">
				    <div class="full margin-bottom_30">
					   <img style="position: relative; left: -150px; width: 400px; height: 80px;" src="images2/epub+.PNG" alt="#" />
					 </div>
					 <div class="full white_fonts">
					    <p>ePUB+ est une plateforme de publicité en ligne mise à la disposition de toute personne qui souhaite faire connaitre ses biens et services au grand public. </p>
					 </div>
				 </div>
			  </div>
			  
			  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
			       <div class="footer_blog footer_menu white_fonts">
						    <h3>Les Liens</h3>
						    <ul> 
							  <li><a href="about.php">> A Propos</a></li>
							  <li><a href="campagne.php">> Annonces</a></li>
							  <li><a href="shop.php">> Boutique</a></li>
							  <li><a href="forum.php">> Forum</a></li>
							  <li><a href="contact.php">> Contact</a></li>
							</ul>
						 </div>
				 </div>
				 
				 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
				 <div class="footer_blog full white_fonts">
						     <h3>Newsletter</h3>
							 <p>Inscrivez-vous à notre newslleter pour recevoir toutes les nouvelles actualités de la plateforme par mail.</p>
							 <div class="newsletter_form">
							    <form method="POST">
								   <input type="email" placeholder="Votre adresse mail" name="mail" required />
								   <button type="submit" name="send">Envoyer</button>
								</form>
							 </div>
						 </div>
					</div>	 
			  
			  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
				 <div class="footer_blog full white_fonts">
						     <h3>Contactez Nous</h3>
							 <ul class="full">
							   <li><img src="images/i5.png"><span>Bonamoussadi,Douala<br>Cameroun</span></li>
							   <li><img src="images/i6.png"><span>LoginOpen@gmail.com</span></li>
							   <li><img src="images/i7.png"><span>(+237) 696365041 / 653703702</span></li>
							 </ul>
						 </div>
					</div>	
				</div>
            </div>
            <?php if (isset($error2)) {
                                    echo '<div class="alert alert-danger" style="font-size:20px; text-align:center;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$error2.'</div>';
                                } ?>
                                <?php if (isset($success2)) {
                                    echo '<div class="alert alert-success"  style="font-size:20px; text-align:center;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$success2.'</div>';
                                } ?>
    </footer>
    <!-- End Footer -->

    <div class="footer_bottom">
        <div class="containe">
            <div class="row">
                <div class="col-12">
                    <p class="crp"> Copyrights &copy; <script>document.write(new Date().getFullYear());</script> By Mawed</p>
                </div>
            </div>
        </div>
    </div>

    <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>


 <!-- Modal -->
    <div class="modal fade" id="modallogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header tit-up">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <h4  style="text-align: center;">CONEXION / INSCRIPTION</h4>
            <div class="modal-body customer-box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li><a class="btn btn-primary" href="#modallogin2" data-toggle="tab">Connexion</a></li>&emsp;
                    <li><a class="btn btn-warning" href="#modalRegistration" data-toggle="tab">Inscription</a></li>
                </ul><br>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="modallogin2">
                        <form role="form" enctype="multipart/form-data" class="form-horizontal" method="POST" action="">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" name="email" id="email1" placeholder="Votre email" type="email" value="<?php if(isset($_SESSION['email'])) {echo $_SESSION['email'];} ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" name="pwd" id="Password1" placeholder="Mot de passe" type="password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-info" name="valideconnexion">
                                        Se Connecter
                                    </button>
                                    <button type="button" class="btn btn-dark"  data-dismiss="modal">
                                        Fermer</button>
                                    <a class="for-pwd" href="javascript:;"> Mot de passe oublié ?</a>
                                </div>
                            </div>
                         <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="dropdownCheck">
                             <label class="form-check-label" style="text-align: center;" for="dropdownCheck"> Se souvenir de moi</label>
                          </div>
                               
                            <?php if (isset($error)) {
                                    echo '<div class="alert alert-danger" style="font-size:20px; text-align:center;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$error.'</div>';
                                } ?>
                                <?php if (isset($success)) {
                                    echo '<div class="alert alert-success"  style="font-size:20px; text-align:center;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$success.'</div>';
                                } ?>
                        </form>
                    </div>
                    <div class="tab-pane" id="modalRegistration">
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
                                    <label>Photo de profil</label><input class="form-control" name="avatar" id="avatar" placeholder="Photo de profile" type="file">
                                </div>
                            </div>
                          
                            <div class="row">                           
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="valideinscription">
                                        S'incrire
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

    <style type="text/css">
    	
.quick-link
{
 right: 0;
 bottom: 0;
 top: 550px;
 position: fixed;

}
    </style>
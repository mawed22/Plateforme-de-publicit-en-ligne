<?php include('pages/header.php') ?>
<?php include('style/style.php') ?>

<?php 

if (isset($_POST['envoyer'])) {

     if (isset($_SESSION['nom'])) {
       
       $nom = htmlentities($_POST['name']);
       $mail = htmlspecialchars($_POST['email']);
       $phone = htmlspecialchars($_POST['phone']);
       $msg = htmlspecialchars($_POST['message']);

       $mgs2 = strlen($_POST['message']);

       if ($mgs2 > 10) {
        
        $req = $bdd->prepare("INSERT INTO contact (nom,email,phone,message,nom_auteur) VALUES (?,?,?,?,?)");
        $req->execute(array($nom,$mail,$phone,$msg,$_SESSION['nom']));

        $success = "Vos informtions ont été enregistré nous vous contacterons bientot !!";
       }
       else{
         $error = "Votre message doit avoir plus de 10 caratères !!";
       }
     }
     else{
      $error = "Veuillez-vous connecter pour nous contacter";
     }
    
   }

 ?>


  <!-- section -->
	
	<section class="inner_banner">
	  <div class="container">
	      <div class="row">
		      <div class="col-12">
			     <div class="full"><br><br><br><br>
			     	<p style="text-align: center; color: #fff; font-size: 25px; font-weight: bold;" >Nous Contacter</p>
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
	</section><br><br>
	<!-- end section -->

	<!-- section -->
	<div class="section tabbar_menu">
	   <div class="container">
	      <div class="row">
		      <div class="col-md-12">
			     <div class="tab_menu">
				    <img src="images2/im4.gif " style="width: 1040px; height: 109px;">
				 </div>
			  </div>
		  </div>
	   </div>
	</div>
	<!-- end section -->
   
	<!-- section -->
    <div class="section layout_padding contact_section" style="background:#f6f6f6;">
        <div class="container">
        	<p style="text-align: center; font-size: 20px;">Veulliez remplir le formulaire de contact pour nous joindre afin de nous donner votre avis et vos remarques sur nos produits et services.</p>
               <div class="row">
                 <div class="col-lg-8 col-md-8 col-sm-12">
				    <div class="full float-right_img">
				    	<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3979.6814098095547!2d9.735910649009424!3d4.085129897014955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1spetit%20terrain%20%C3%A0%20proximit%C3%A9%20de%20Bonamoussadi%2C%20Douala!5e0!3m2!1sfr!2scm!4v1616358585938!5m2!1sfr!2scm" width="700" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        <!--img src="images/img10.png" alt="#"-->
                    </div>
                 </div>
				 <div class="col-lg-4 col-md-4 col-sm-12">
				    <div class="contact_form">
					    <form  method="POST" >
						   <fieldset>
						       <div class="full field">
							      <input type="text" placeholder="Votre Nom" name="name" required />
							   </div>
							   <div class="full field">
							      <input type="email" placeholder="Votre Adresse email" name="email" required />
							   </div>
							   <div class="full field">
							      <input type="text" placeholder="Votre numéro de téléphone" name="phone" required />
							   </div>
							   <div class="full field">
							      <textarea style="max-height: 140px;" placeholder="Entrer votre message ici..." name="message" required ></textarea>
							   </div>
							   <div class="full field">
							      <div class="center"><button type="submit" name="envoyer">Envoyer</button></div>
							   </div>
						   </fieldset>
						</form>
					</div>
                 </div>
               </div>			  
           </div>
        </div>
	<!-- end section -->

    <?php include('java/javas.php') ?>
   <?php include('pages/footer.php') ?>
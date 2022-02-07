<?php include('style/style.php') ?>
<?php include('pages/header.php') ?>


<!-- section -->
	
	<section class="inner_banner">
	  <div class="container">
	      <div class="row">
		      <div class="col-12"><br><br><br>
		      	<p style="text-align: center; color: #fff; font-size: 25px; font-weight: bold;" >Connexion</p>
            
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
	</section>
	
	<!-- end section -->

<br><br>
<h3 style="text-align: center; font-size: 20px;" >connectez-vous et profitez de tous nos services.</h3>

<div class="mod">

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
                                    </button>&nbsp; 
                                    <button type="reset" class="btn btn-success">
                                        Recommencer</button>&nbsp;&nbsp;
                                    <a class="for-pwd" href="inscription.php"><span style="font-size: 15px;">Incrivez-vous.</span> </a>
                                </div>
                            </div>
                         <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="dropdownCheck">
                             <label class="form-check-label" style="text-align: center;" for="dropdownCheck"> Se souvenir de moi</label>
<!--html>
  <head>
    <title>reCAPTCHA demo: Simple page</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body>
    <form action="?" method="POST">
      <div class="g-recaptcha" data-sitekey="your_site_key"></div>
      <br/>
      <input type="submit" value="Submit">
    </form>
  </body>
</html-->

                          </div>
                               
                        </form>
                </div>

<br><br><br>

<?php include('java/javas.php') ?>
<?php include('pages/footer.php') ?>


<style type="text/css">
	.mod{
		position: relative;
		left: 290px;
		width: 60%;
		height: 250px;
	}


</style>
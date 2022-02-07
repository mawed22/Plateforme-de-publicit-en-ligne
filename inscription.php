<?php include('style/style.php') ?>
<?php include('pages/header.php') ?>




<!-- section -->
	
	<section class="inner_banner">
	  <div class="container">
	      <div class="row">
		      <div class="col-12"><br><br><br>
		      	<p style="text-align: center; color: #fff; font-size: 25px; font-weight: bold;" >Inscription nouvel utilisateur</p>
            
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
<h3 style="text-align: center; font-size: 20px;" >Inscrivez-vous et profitez de tous nos services.</h3>

<div class="mod">

              <form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data" >
                            <div class="form-group">
                                <div class="col-sm-12">
                                  <input class="form-control" name="nom" placeholder="Votre nom" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                   <input class="form-control" name="prenom" placeholder="Votre prénom" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                   <input class="form-control" name="email" id="email" placeholder="Votre email" type="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" name="phone" id="mobile" placeholder="Votre numéro de téléphone" type="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                   <input class="form-control" name="pwd" id="passconfirm" placeholder="Entrer un mot de passe" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                  <input class="form-control" name="passconfirm" id="passconfirm" placeholder="Confirmer votre nouveau mot de passe"  type="password">
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
                                        Recommencer</button>&nbsp;&nbsp;
                                    <a class="for-pwd" href="connexion.php" ><span style="font-size: 15px;">Se connecter.</span> </a>
                                </div>
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
		height: 450px;
	}


</style>
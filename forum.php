<?php include('pages/header.php') ?>
<?php include('style/style.php') ?>
<?php include('style/style2.php') ?>


<?php

include('pages/config.php');

 if (isset($_POST['valide'])) {
        
     if (isset($_POST['title']) && isset($_POST['message'])) {

        if (isset($_SESSION['nom']) && isset($_SESSION['id_user'])) {

    	    $nom = $_SESSION['nom'];
            $id = $_SESSION['id_user'];
            $img = $_SESSION['avatar'];
            $dateajout = date('Y-m-d', time('h:i:s'));

        $title=$_POST['title'];
        $message=$_POST['message'];
        $messages = strlen($_POST['message']);

        if ($messages >= 10) 
     {

     $req = $bdd->prepare("INSERT INTO posts(titre,message,auteur,id_auteur,dates,image) VALUES(?,?,?,?,?,?)");
          $req->execute(array($title,$message,$nom,$id,$dateajout,$img));

        $success = "Votre post a bien été ajouter sur le forum";
    }
    else{
    $error = "Votre message doit avoir plus de 10 caracteres !!";
    }
  }else{
    $error = "Connectez-vous pour pouvoir discuter sur le forum";
  }  
}else{
    $error = "Veillez remplir tous les champs";
  }
}
 //Récupérer le nombre d'enregistrement dans la table
  $count=$bdd->prepare("SELECT count(id_post) as cpt FROM posts ");
  $count->setFetchMode(PDO::FETCH_ASSOC);
  $count->execute();
  $tcount=$count->fetchAll();

  //pagination
  @$page = $_GET['page'];
  if (empty($page)) {
    $page = 1;
  }
  $nbe = 5;
  $nbpage= ceil($tcount[0]["cpt"]/$nbe);  
  $debut = ($page-1)*$nbe;

?>

 <!-- section -->
    
    <section class="inner_banner">
      <div class="container">
          <div class="row">
              <div class="col-12">
                 <div class="full"><br><br><br><br>
                    <p style="text-align: center; color: #fff; font-size: 25px; font-weight: bold;" >Forum de discussion</p>
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
    <br><br>
    <h2  style=" text-align: center; font-size: 30px;">Bienvenue <?php if(isset($_SESSION['prenom'])) {echo $_SESSION['prenom'];} ?> sur le forum de discussion de ePUB+<br>Ce forum a près de <?php echo $tcount[0]["cpt"]; ?>
 discussions</h2>
<br>

   <div class="full center">
    <?php if (isset($_SESSION['id_user'])) {
                                             
              echo '<a class="primary-btn"  style="position: relative; left: 20px; font-size: 18px;" lass="btn btn-primary" href="test/#" data-toggle="modal" data-target="#login"><span> Nouveau post</span></a>';
               }else{ echo '<a class="primary-btn"  style="position: relative; left: 20px; font-size: 18px;" lass="btn btn-primary" href="connexion.php"><span>Nouveau post</span></a>'; } ?>
     <!--a class="primary-btn"  style="position: relative; left: 20px; font-size: 18px;" lass="btn btn-primary" href="test/#" data-toggle="modal" data-target="#login"><span> Nouveau post</span></a-->
         </div>
  <!-- Contenedor Principal -->
    <div class="comments-container">
        <h1>Posts</h1>

        <ul id="comments-list" class="comments-list">
        	<?php
              $req = $bdd->prepare("SELECT * FROM posts ORDER BY id_post DESC LIMIT $debut,$nbe ");
              $req->setFetchMode(PDO::FETCH_ASSOC);
              $req->execute();
                while ($res = $req->fetch()) {
                  ?>
            <li>
                <div class="comment-main-level">
                    
                    <!-- Avatar -->
                    <div class="comment-avatar"><?php echo '<img  src="images2/users/'.$res['image'].'" alt="" />'; ?> </div>
                    <!-- Contenedor del Comentario -->
                    <div class="comment-box">
                        <div class="comment-head">
                            <h6 class="comment-name by-author"><a href="http://creaticode.com/blog"><?php echo $res['auteur']; ?></a></h6>
                            <span><?php echo $res['dates']; ?></span>
                            <i class="fa fa-reply"></i>
                            <i class="fa fa-heart"></i>
                        </div>
                        <div class="comment-content" style="color : gray">
                            <?php echo $res['titre']; ?>
                        </div>
                        <div class="comment-content">
                            <?php echo $res['message']; ?>
                        </div>
                    </div>
                    <br>
                    <?php 
                   }

                    ?>

                </div>
                <!-- Respuestas de los comentarios -->
                <ul class="comments-list reply-list">

                </ul>
            </li>

    </div>

<br>
 <nav aria-label="...">
 <ul class="pagination pagination-lg justify-content-center">
  
    <?php for($i=1; $i<= $nbpage; $i++){
      if ($page == $i) {
        echo "<a style='background-color: #007bff; color: #fff;' class='page-link' href='?page=$i'>$i</a>&nbsp;&nbsp;";
      }
      else{
        echo "<a  class='page-link' href='?page=$i'>$i</a>";
      }
      
    } ?>
  
  </ul>
</nav>
<br><br><br>

<!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header tit-up">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <h4  style="text-align: center;">Nouveau Post</h4>
            <div class="modal-body customer-box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li><a class="btn btn-warning" href="#Registration" data-toggle="tab">Forum</a></li>
                </ul><br>
                <!-- Tab panes -->
                    <div class="tab-pane" id="Registration">
                        <form role="form" class="form-horizontal" method="POST">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" name="title" placeholder="Entrer le titre de votre post" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="message" id="desc" placeholder="Entrer votre message" type="text"></textarea>
                                </div>
                            </div>
                           
                            <div class="row">                           
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="valide">
                                       Publier
                                    </button>
                                    <button type="reset" class="btn btn-success">
                                        Recommencer</button>
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">
                                        Fermer</button>
                                </div>
                            </div>

                           <?php if (isset($error)) {
                                    echo '<div class="alert alert-danger" style="font-size:20px; text-align:center;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$error.'</div>';
                                } ?>
                                <?php if (isset($success)) {
                                    echo '<div class="alert alert-success"  style="font-size:20px; text-align:center;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$success.'</div>';
                                } ?>
                        </form>
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
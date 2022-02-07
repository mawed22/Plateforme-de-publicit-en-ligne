<?php 
  //$bdd = new PDO ("mysql:host=localhost;dbname=epub+;charset=utf8",'root','');
 # $bdd = new PDO ("mysql:host=localhost;dbname=epub+;charset=utf8",'root','');
   #   $bdd->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); //les noms seront en caracteres magiscule
     # $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//precise la ligne exact de l'erreur

   try{
        $bdd = new PDO('mysql:host=localhost;dbname=epub;charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); //les noms seront en caracteres magiscule
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }

      catch(Exception $e){

      die('Une erreur est survenue');
      }
      
 
 ?>


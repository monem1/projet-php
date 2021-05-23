<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit(); 
  }
?>
<?php
 
 // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
 if(!isset($_SESSION["login"]))
 {
   header("Location: login.php");
   exit(); 
 }

?>

<!DOCTYPE html>
<html>
 <head>
    <title>SUIVIE FACTURES</title>
<link href="../../css/bootstrap.min.css" rel="stylesheet">

 <!--<link rel="stylesheet" href="../style.css" />   --> 
 </head>


 <body>

<div class="container">

<center>
<fieldset>
    <legend>Bienvenue <?php echo $_SESSION['login']; ?>!</legend>
    <p>************************************************</p>


    <a href="gestion_agents/gestion_agents.php" >      GESTION DES AGENTS         </a> |  
    <a href="gestion_fournisseurs/gestion_fournisseurs.php" >      GESTION DES FOURNISSEURS         </a> | 
    <a href="gestion_reclamations.php" >    GESTION DES RECLAMATIONS          </a> | 
    <a href="gestion_factures.php" >    GESTION DES FACTURES            </a> 
    <br>
    <br>
    <br>
    <a href="../logout.php">Déconnexion</a>

<fieldset> 
</div>

</body>
</html>
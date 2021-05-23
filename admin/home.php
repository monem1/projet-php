<?php
 session_start(); // Initialiser la session
 // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
 if(!isset($_SESSION["login"]))
 {
   header("Location: ../login.php");
   exit(); 
 }

?>

<!DOCTYPE html>
<html>
 <head>
    <title>SUIVIE FACTURES</title>
 <link rel="stylesheet" href="../style.css" />  
 </head>


 <body>

<div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['login']; ?>!</h1>
    <p>************************************************</p>

    <a href="gestion_agents/gestion_agents.php" >      GESTION DES AGENTS         </a> |  
    <a href="gestion_fournisseurs/gestion_fournisseurs.php" >      GESTION DES FOURNISSEURS         </a> | 
    <a href="../service_ND.php" >    GESTION DES RECLAMATIONS          </a> | 
    <a href="gestion_factures.php" >    GESTION DES FACTURES            </a> 
    <br>
    <br>
    <br>
    <a href="../logout.php">Déconnexion</a>
    
</div>

</body>
</html>
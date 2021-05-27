<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit(); 
  }
?>
<!DOCTYPE html>
<html>
<?php require('../pages/header.php') ?>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php require('../pages/sidebaragent.php') ;?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
			 <!-- Topbar -->
			 <?php require('../pages/navbar.php');?>
                <!-- End of Topbar -->
<?php
require('../connexion/config.php');



if (isset( $_REQUEST['Societe'] ))
{  
  $societe = stripslashes($_REQUEST['Societe']);
  $societe = mysqli_real_escape_string($conn, $societe);
  
} 
  
else


{
?>



<br>
<br>
<div class="container">

<form  action="affichier_facture.php" method="post">
  <h1>ETAT DE VOS FACTURES</h1>      

<br>
<label class="control-label" style="text-align: left;">ENTREZ NOM SOCIETE </label>
 

  <br>

<div class="form-group"> 
<input type="text"class="form-control" name="Societe"placeholder="societe"required />
</div> 
                 <br><br>
<div class="form-group">  
    <input type="submit" name="submit" value="CHERCHER " class="btn btn-primary" />
</div>

 
</fieldset>
</form>
</div>

<?php } ?>
</body>
</html>




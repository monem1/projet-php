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
                <div class="container-fluid"> 
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><h2>Bienvenue <?php echo $_SESSION['login']; ?><samp>sur</samp> l'espace de attt pour suivie l'etat de vos vacture</h6>
                </div>
                </div>
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
<h1 class="box-title">Entrez nom de societe</h1>
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="affichier_facture.php" method="POST">
<div class="input-group">
<input type="text" class="form-control bg-light border-0 small" placeholder="votre nom de societe ... "
                                aria-label="Search" aria-describedby="basic-addon2" name="Societe">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
</div>
</form>
<hr>
<a href="../logout.php" class ="btn btn_info" >Quittez</a>
<?php } ?>
</div>
    </div>
    <!-- End of Main Content -->
    
    <!-- Footer -->
    <?php require('../pages/footer.php');?>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Prêt à partir?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../login.php">Logout</a>
        </div>
    </div>
</div>
</div>
</body>
</html> 



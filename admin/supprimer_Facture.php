<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit(); 
  }
?>
<?php require('../connexion/config.php');
    $id = 0;
    if ( !empty($_GET['id']) ) 
    {
        $id = $_REQUEST['id'];
    }
     
        if ( !empty($_POST)) 
        {
          $id = $_POST['id'];
        // delete data
       $result=mysqli_query($conn, "DELETE FROM factures WHERE id=$id");
      header("Location: gestion_factures.php");
         
        }

?>
<!DOCTYPE html>
<html>
<?php require('../pages/header.php');?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require('../pages/sidebar.php') ;?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require('../pages/navbar.php');?>
                <!-- End of Topbar -->
                <div class="container-fluid">
                        <h3>Supprimer une Facture</h3>   
                      <form  class="user" method="POST" action="supprimer_factures.php">
                         <input type="hidden" name="id" value="<?php echo $id;?>"/>
                         <p class="alert alert-error">Etes vous sur de supprimer la facture ?</p>
                            <div class="form-group row">
                                       <div class="col-sm-6 mb-3 mb-sm-0">
                                        <button type="submit" class="btn btn-danger btn-user btn-block">Oui</button>
                                        <a class="btn btn-secondary btn-user btn-block" href="gestion_factures.php">Non</a>
                                       </div>
                            </div>
                      </form>
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
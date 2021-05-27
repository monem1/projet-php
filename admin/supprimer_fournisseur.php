<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: ../../login.php");
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
       $result=mysqli_query($conn, "DELETE FROM fournisseurs WHERE idf=$id");
header("Location: gestion_fournisseurs.php");
         
            }
?>
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
                        <h3>Supprimer Fournisseur</h3>   
                      <form  class="user" method="POST" action="supprimer_fournisseur.php">
                         <input type="hidden" name="id" value="<?php echo $id;?>"/>
                         <p class="alert alert-error">Etes vous sur de supprimer le fournisseur ?</p>
                            <div class="form-group row">
                                       <div class="col-sm-6 mb-3 mb-sm-0">
                                        <button type="submit" class="btn btn-danger btn-user btn-block">Oui</button>
                                        <a class="btn btn-secondary btn-user btn-block" href="gestion_fournisseurs.php">Non</a>
                                       </div>
                            </div>
                      </form>
                </div>
            </div>
            
<!-- Footer -->
<?php require('../pages/footer.php')?>
            <!-- End of Footer -->
            </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
<?php require('../pages/formlogout.php')?>

  </body>
</html>
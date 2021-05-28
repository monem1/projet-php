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
<body>
<?php
require('../connexion/config.php');

if(isset($_POST['add']))
{
$login = $_POST['login'];
$societe =$_POST['societe'];
$password =$_POST['password'];
      if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM fournisseurs WHERE login='$login'")) !=0 )
      {
        echo '<div class="sucess">
        "Ce Login est déjà utilisé par un autre utilisateur, veuillez en choisir un autre svp." <br>
        cliquez ici pour Retourner  <a href="gestion_fournisseurs.php">Retour</a> '  ;
      } 
      else 
      {
        $query = "INSERT into `fournisseurs` (login, societe,  password) VALUES ('$login', '$societe', '$password ')";
        $result = mysqli_query($conn, $query);
                  if($result)
                  {
                    header("Location: gestion_fournisseurs.php");
                  }
      } 
}
else
{

?>
<h1 class="box-title">Ajouter un fournisseur</h1> 
                      <form class="user" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="login" name="login" required>
                                    </div>
                                </div>
                                    <div class="form-group row">
                                      <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="societe" name="societe" required>
                                      </div>
                                    </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="submit" name="add" class="btn btn-primary btn-user btn-block" value="ajouter un utilisateur">
                                    <a href="gestion_fournisseurs.php" class ="btn btn_info">Retournez-vous ici</a>
                                    </div>
                                </div>
                      </form>
                      

<?php 
}
?>
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
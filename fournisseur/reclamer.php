<?php
session_start();  // Initialiser la session

// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION["login"])) {
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
        <?php require('../pages/sidebaragent.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require('../pages/navbar.php'); ?>
                <!-- End of Topbar -->
                <div class="container-fluid">


                    <!-- End of Main Content -->
                    <div class="sucess">
                        <h1>Bienvenue <?php echo $_SESSION['login']; ?>!</h1><br>
                        <?php echo "Service Non Disponible Pour Le Moment";   ?>
                    </div>
                    <div>
                        <a href="../login.php" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-flag"></i>
                            </span>
                            <span class="text">Reconnectez</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require('../pages/footer.php') ?>
            <!-- End of Footer -->
        </div>
    </div>
  <?php require('../pages/formlogout.php') ?>

</body>

</html>
<?php
session_start();  // Initialiser la session
  
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>suivie factures</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require('pages/sidebar.php') ;?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require('pages/navbar.php');?>
                <!-- End of Topbar -->
                <div class="container-fluid">
           
            
            <!-- End of Main Content -->
    <div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['login']; ?>!</h1><br>
<?php  echo "Service Non Disponible Pour Le Moment";   ?>
    </div>
    <div>
        <a href="admin/home.php"  class="btn btn-primary btn-icon-split">
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
 <?php require('pages/footer.php')?>
            <!-- End of Footer -->
         </div>
         <?php require('pages/formlogout.php')?>
  </body>
</html>
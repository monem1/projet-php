 <?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header('Location: login.php');
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
     <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
     <!-- Custom styles for this template-->
     <link href="css/sb-admin-2.min.css" rel="stylesheet">
 </head>

 <body id="page-top">
     <!-- Page Wrapper -->
     <div id="wrapper">
         <!-- Sidebar -->
         <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <img src="img/images.jpeg" alt="" height="50">
        <div class="sidebar-brand-text mx-3">A<samp>T</samp>TT</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
         <!-- End of Sidebar -->
         <!-- Content Wrapper -->
         <div id="content-wrapper" class="d-flex flex-column">
             <!-- Main Content -->
             <div id="content">
                 <!-- Topbar -->
                 <?php require('pages/navbarpasser.php'); ?>
                 <div class="container-fluid">
                     <?php
                        require('connexion/config.php');

                        $ordonnanceur = '';

                        if (isset($_POST['update'])) {
                            $id = $_POST['id'];
                            $ordonnanceur = $_POST['Ordonnanceur'];
                            //updating the table
                            $result = mysqli_query($conn, "UPDATE factures SET 
          Ordonnanceur='$ordonnanceur' WHERE id=$id");
                            header("Location: agents/Agent_TRI.php");
                        }



                        ?>
                     <?php

                        $id = $_GET['id'];

                        //selecting data associated with this particular id
                        $result = mysqli_query($conn, "SELECT * FROM factures WHERE id=$id");

                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $ordonnanceur = $row['Ordonnanceur'];
                        }

                        ?>
                     <?php

                        $ordo  = mysqli_query($conn, "SELECT fonction From agents WHERE type LIKE 'O%' ORDER BY fonction")
                        ?>
                     <form class="user" method="POST">
                         <div class="form-group row">
                             <div class="col-sm-6 mb-3 mb-sm-0" id="app">
                                 <h1 class="box-title">Vos ordonnancement</h1>
                                 <label class="btn btn-primary" >Ordonnanceur  </label>
                                 <span>{{sorce}}</span>
                                 <div class="form-group">
                                 
                                     <select class="form-control " name="Ordonnanceur" id="type" v-model="sorce" required>
                                         <option disabled selected>*******</option>
                                         <?php
                                            while ($d = mysqli_fetch_array($ordo, MYSQLI_ASSOC)) {
                                            ?>
                                             <option><?php echo '<td>' . $d['fonction'] . '</td>'; ?> </option>
                                         <?php } ?>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
                                 </div>
                                 <div class="form-group">
                                     <input type="submit" class="btn btn-primary btn-user btn-block" name="update" value="Envoyez la Facture ">
                                     <legend>Pas maintenant?</legend>
                                     <a href="agents/Agent_TRI.php" class="btn btn_info">Retournez-vous ici</a>
                                 </div>
                     </form>
                 </div>
             </div>
             <!-- End of Main Content -->

             <!-- Footer -->
             <?php require('pages/footer.php'); ?>
             <!-- End of Footer -->

         </div>
         <!-- End of Content Wrapper -->

     </div>
     <!-- End of Page Wrapper -->

     <!-- Scroll to Top Button-->
     <?php require('pages/formlogout.php') ?>
     <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                sorce: ''

            }
        })
        </script>
 </body>

 </html>